<?php

class ResponseTest extends TestCase {

	/**
	 * @test
	 */
	public function isIndexReachable()
	{
		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
