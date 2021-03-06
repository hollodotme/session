<?php declare(strict_types = 1);
/**
 * Copyright (c) 2016 Holger Woltersdorf & Contributors
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 */

namespace IceHawk\Session\Tests\Unit\Fixtures;

use IceHawk\Session\Interfaces\MapsSessionData;

/**
 * Class DataMapper
 * @package IceHawk\Session\Tests\Unit\Fixtures
 */
final class DataMapper implements MapsSessionData
{
	/** @var string */
	private $prefix;

	public function __construct( string $prefix )
	{
		$this->prefix = $prefix;
	}

	public function toSessionData( $value )
	{
		return $this->prefix . $value;
	}

	public function fromSessionData( $sessionData )
	{
		$prefixQuoted = preg_quote( $this->prefix, '#' );

		return preg_replace( "#^{$prefixQuoted}#", '', $sessionData );
	}
}
