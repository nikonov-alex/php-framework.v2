<?php

namespace NikonovAlex\Framework\HTTP;

/**
 * @psalm-type Status = int<100, 599>
 * @psalm-type Headers = array<string, scalar>
 * @psalm-immutable
 */
class Response {
	
	/** @var Status */
	private $_status;
	
	/** @var string */
	private $_body;
	
	/** @var Headers */
	private $_headers;
	
	/**
	 * @param Status $status
	 * @param string $body
	 * @param Headers $headers
	 * @return Response
	 */
	function __construct( $status, $body = '', $headers = [] ) {
		$this->_status = $status;
		$this->_body = $body;
		$this->_headers = $headers;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return Status
	 */
	public function status() {
		return $this->_status;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return string
	 */
	public function body() {
		return $this->_body;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return Headers
	 */
	public function headers() {
		return $this->_headers;
	}
}