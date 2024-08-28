<?php

namespace NikonovAlex\Framework\HTTP;

/**
 * @psalm-type Status = int<100, 599>
 * @psalm-type Headers = array<string, scalar>
 * @psalm-immutable
 */
readonly class Response {

	function __construct(
		/**
		 * @var Status
		 * @readonly
		 */
		public int $status,
		
		/**
		 * @var string
		 * @readonly
		 */
		public string $body = '',
		
		/**
		 * @var Headers
		 * @readonly
		 */
		public array $headers = [ ]
	) { }
}