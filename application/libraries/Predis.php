<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Predis
{
	protected $CI;
	protected $client;

	public function __construct()
	{
		// Parameters passed using a named array:
		$this->client = new Predis\Client([
			'scheme' => 'tcp',
			'host'   => '127.0.0.1',
			'port'   => 6379,
		]);
	}

	public function getClient()
	{
		return $this->client;
	}
}
