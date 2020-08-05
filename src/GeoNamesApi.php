<?php
/*
 * This file is part of the Bit64 GeoNames library
 *
 * Copyright (c) 2020 Bit 64 Solutions (Pty) Ltd (https://bit64.co)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bit64\GeoNames;

use Bit64\GeoNames\Exception\RemoteApiException;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Warren Heyneke
 */
class GeoNamesApi {

	protected $api = 'http://api.geonames.org';

	public $charset;
	public $lang;
	public $username;

	public function __construct(array $configs = []) {
		@list(
			$this->charset,
			$this->lang,
			$this->username,
		) = [
			$configs['charset'] ?? 'UTF8',
			$configs['lang'] ?? 'en',
			$configs['username'] ?? 'demo',
		];
	}

	public function get(array $params): array {
		return $this->json('GET', '/getJSON', ['query' => $params]);
	}

	public function search(array $params): array {
		return $this->json('GET', '/searchJSON', ['query' => $params]);
	}

	protected function getClient(array $options = []): Client {
		return new Client(array_merge(['base_uri' => $this->api], $options));
	}

	protected function buildQuery(array $query = []): array {
		$options = [
			'charset' => $this->charset,
			'lang' => $this->lang,
			'username' => $this->username,
		];
		return array_merge($options, $query);
	}

	protected function request(string $method, string $uri, array $options = []): ResponseInterface {

		try {
			$options['query'] = preg_replace(
				'/%5B[0-9]+%5D/', '', http_build_query(
					$this->buildQuery($options['query'] ?? [])
				)
			);
			$response = $this->getClient()->request($method, $uri, $options);
		}
		catch (\Exception $e) {
			throw new RemoteApiException($method, $uri, $options, $e->getMessage(), 0, $e);
		}

		return $response;
	}

	protected function json(string $method, string $uri, array $options = []): array {

		$response = $this->request($method, $uri, $options);
		$data = @json_decode($response->getBody(), true);

		if (JSON_ERROR_NONE !== ($code = @json_last_error())) {
			throw new RemoteApiException($method, $uri, $options, "JSON parse error", $code);
		}

		if (1 === count($data) && !empty($msg = $data['status']['message'] ?? null)) {
			throw new RemoteApiException($method, $uri, $options, $msg, $data['status']['value'] ?? 0, null);
		}

		return $data;
	}

}
