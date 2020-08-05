<?php
/*
 * This file is part of the Bit64 GeoNames library
 *
 * Copyright (c) 2020 Bit 64 Solutions (Pty) Ltd (https://bit64.co)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bit64\GeoNames\Exception;

/**
 * @author Warren Heyneke
 */
class RemoteApiException extends GeoNamesException {

	protected $method, $uri, $options;

	public function __construct(
		string $method, string $uri, array $options = [],
		string $message, int $code = 0, \Throwable $previous = null
	) {
		parent::__construct($message, $code, $previous);
	}

	public function getMethod(): string {
		return $this->method;
	}

	public function getUri(): string {
		return $this->uri;
	}

	public function getRequestOptions(): array {
		return $this->options;
	}

}
