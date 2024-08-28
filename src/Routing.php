<?php

namespace NikonovAlex\Framework\Routing;
use \NikonovAlex\Framework\HTTP;

/**
 * @psalm-type Method = 'GET'|'HEAD'|'POST'|'PUT'|'DELETE'|'CONNECT'|'OPTIONS'|'TRACE'|'PATCH'
 * @psalm-type RequestHandler = callable(HTTP\Request): HTTP\Response
 * @psalm-type Route = array<Method, RequestHandler>
 * @psalm-type Router = array<non-empty-string, Route>
 * @param Router $router
 * @param HTTP\Request $request
 * @return HTTP\Response
 */
function matchRoute( array $router, HTTP\Request $request ): HTTP\Response {
	return array_key_exists( $request->path, $router )
		&& array_key_exists( $request->method, $router[$request->path] )
		? $router[$request->path][$request->method]( $request )
		:  new HTTP\Response( 404 );
}