<?php

class play_mvc_results_Status implements play_mvc_Result{
	public function __construct($status, $content = null) { if(!php_Boot::$skip_constructor) {
		if($content === null) {
			$content = "";
		}
	}}
	const BAD_REQUEST = 400;
	const CREATED = 201;
	const FORBIDDEN = 403;
	const INTERNAL_SERVER_ERROR = 500;
	const MOVED_PERMANENTLY = 301;
	const NO_CONTENT = 204;
	const NOT_FOUND = 404;
	const OK = 200;
	const SEE_OTHER = 303;
	const TEMPORARY_REDIRECT = 307;
	const UNAUTHORIZED = 401;
	function __toString() { return 'play.mvc.results.Status'; }
}
