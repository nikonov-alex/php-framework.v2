<?php

namespace NikonovAlex\Framework\HTTP;

/**
 * @psalm-type Method = 'GET'|'HEAD'|'POST'|'PUT'|'DELETE'|'CONNECT'|'OPTIONS'|'TRACE'|'PATCH'
 * @psalm-type QueryParams = array<int|non-empty-string, non-empty-array<int|non-empty-string, array<int|non-empty-string, mixed>|string>|string>
 * @psalm-immutable
 */
class Request {
	
	/** @var non-empty-string */
	private $_path;
	
	/** @var Method */
	private $_method;
	
	/** @var QueryParams */
	private $_queryParams;
	
	/** @var string */
	private $_body;
		
	/**
	 * @param non-empty-string $path
	 * @param Method $method
	 * @param QueryParams $queryParams
	 * @param string $body
	 * @return Request
	 */
	function __construct( $path, $method, $queryParams, $body ) {
		$this->_path = $path;
		$this->_method = $method;
		$this->_queryParams = $queryParams;
		$this->_body = $body;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return non-empty-string
	 */
	public function path() {
		return $this->_path;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return Method
	 */
	public function method() {
		return $this->_method;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return QueryParams
	 */
	public function queryParams() {
		return $this->_queryParams;
	}
	
	/**
	 * @psalm-mutation-free
	 * @return string
	 */
	public function body() {
		return $this->_body;
	}
}