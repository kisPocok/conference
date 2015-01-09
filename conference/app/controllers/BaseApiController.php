<?php

class BaseApiController extends Controller
{
	/**
	 * @param mixed $data
	 * @param int $code
	 * @return mixed
	 */
	public function response($data, $code = 200)
	{
		$response = array(
			'meta' => array(
				'code' => $code
			),
			'response' => $data,
		);
		return Response::json($response);
	}

	/**
	 * @param string $message
	 * @param int $code
	 * @param string $type
	 * @return mixed
	 */
	public function fail($message, $code = 400, $type = 'unknown')
	{
		$response = array(
			'meta' => array(
				'code'        => $code,
				'errorType'   => $type,
				'errorDetail' => $message,
			),
			'response' => array(),
		);
		return Response::json($response);
	}

}
