<?php

namespace NikonovAlex\Framework\Web;
use \NikonovAlex\Framework\HTTP;

/**
 * @return \NikonovAlex\Framework\HTTP\Request
 */
function makeRequest(): HTTP\Request {
	return new HTTP\Request(
		parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ),
		$_SERVER['REQUEST_METHOD'],
		$_GET,
		file_get_contents( 'php://input' )
	);
}

/**
 * @param \NikonovAlex\Framework\HTTP\Response $response
 * @return void
 */
function printResponse( HTTP\Response $response ): void {
	http_response_code( $response->status );
	foreach ( $response->headers as $name => $value ) {
		header( "$name:$value" );
	}
	echo $response->body;
}

/**
 * @psalm-type RequestHandler = callable(\NikonovAlex\Framework\HTTP\Request): \NikonovAlex\Framework\HTTP\Response
 * @param RequestHandler $requestHandler
 * @return void
 */
function handleRequest( callable $requestHandler ): void {
	printResponse(
		$requestHandler(
			makeRequest()));
}