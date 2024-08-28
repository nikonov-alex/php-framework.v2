<?php

namespace NikonovAlex\Framework\HTTP;

/**
 * @psalm-type Method = 'GET'|'HEAD'|'POST'|'PUT'|'DELETE'|'CONNECT'|'OPTIONS'|'TRACE'|'PATCH'
 * @psalm-type QueryParams = array<int|non-empty-string, non-empty-array<int|non-empty-string, array<int|non-empty-string, mixed>|string>|string>
 * @psalm-immutable
 */
readonly class Request {
		
	function __construct(
		/**
		 * @var non-empty-string
		 * @readonly
		 */
		public string $path,
		
		/**
		 * @var Method
		 * @readonly
		 */
		public string $method,
		
		/**
		 * @var QueryParams
		 * @readonly
		 */
		public array $queryParams,
		
		/**
		 * @var string
		 * @readonly
		 */
		public string $body
	) { }
}