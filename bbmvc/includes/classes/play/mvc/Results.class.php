<?php

class play_mvc_Results {
	public function __construct(){}
	
	/**
	 * @proto static public badRequest(?content:Dynamic): play.mvc.results.Status 
	 */
	static function badRequest($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::BAD_REQUEST, $content);
	}
	static function created($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::CREATED, $content);
	}
	static function forbidden($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::FORBIDDEN, $content);
	}
	static function found($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::FOUND, $url);
	}
	static function internalServerError($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::INTERNAL_SERVER_ERROR, $content);
	}
	static function movedPermanently($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::MOVED_PERMANENTLY, $url);
	}
	static function noContent() {
		return new play_mvc_results_Status(play_mvc_results_Status::NO_CONTENT, null);
	}
	static function notFound($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::NOT_FOUND, null);
	}
	static function ok($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::OK, null);
	}
	static function redirect($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::FOUND, $url);
	}
	static function seeOther($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::SEE_OTHER, $url);
	}
	static function status($status, $content = null) {
		return new play_mvc_results_Status($status, $content);
	}
	static function temporaryRedirect($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::TEMPORARY_REDIRECT, $url);
	}
	static function unauthorized($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::UNAUTHORIZED, null);
	}
	function __toString() { return 'play.mvc.Results'; }
}
