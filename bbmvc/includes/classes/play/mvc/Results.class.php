<?php

/** 
 * @package play.mvc
 * @uuid {6cde001b-166b-40f2-a11c-1651f17e0e2c}
 */
class play_mvc_Results {
	public function __construct(){}
	
	/**
	 * @proto static public badRequest(?content:String):play.mvc.results.Status 
	 */
	static function badRequest($content = null) {
		return self::status(play_mvc_http_Status::BAD_REQUEST, $content);
	}
	
	/** 
	 * @proto static public created(?content:String):play.mvc.results.Status
	 */
	static function created($content = null) {
		return self::status(play_mvc_http_Status::CREATED, $content);
	}
	
	/** 
	 * @proto static public forbidden(?content:String):play.mvc.results.Status
	 */
	static function forbidden($content = null) {
		return self::status(play_mvc_http_Status::FORBIDDEN, $content);
	}
	
	/** 
	 * @proto static public found(url:String):play.mvc.results.Status
	 */
	static function found($url) {
		return self::status(play_mvc_http_Status::FOUND, $url);
	}
	
	/** 
	 * @proto static public internalServerError(?content:String):play.mvc.results.Status
	 */
	static function internalServerError($content = null) {
		return self::status(play_mvc_http_Status::INTERNAL_SERVER_ERROR, $content);
	}
	
	/** 
	 * @proto static public movedPermanently(url:String):play.mvc.results.Redirect
	 */
	static function movedPermanently($url) {
		return new play_mvc_results_Redirect(play_mvc_http_Status::MOVED_PERMANENTLY, $url);
	}
	
	/** 
	 * @proto static public noContent():play.mvc.results.Status
	 */
	static function noContent() {
		return self::status(play_mvc_http_Status::NO_CONTENT, null);
	}
	
	/** 
	 * @proto static public notFound(?content:String):play.mvc.results.Status
	 */
	static function notFound($content = null) {
		return self::status(play_mvc_http_Status::NOT_FOUND, null);
	}
	
	/** 
	 * @proto static public ok(?content:String):play.mvc.results.Status
	 */
	static function ok($content = null) {
		return self::status(play_mvc_http_Status::OK, null);
	}
	
	/** 
	 * @proto static public redirect(url:String):play.mvc.results.Redirect
	 */
	static function redirect($url) {
		return new play_mvc_results_Redirect(play_mvc_http_Status::FOUND, $url);
	}
	
	/** 
	 * @proto static public seeOther(url:String):play.mvc.results.Redirect
	 */
	static function seeOther($url) {
		return new play_mvc_results_Redirect(play_mvc_http_Status::SEE_OTHER, $url);
	}
	
	/** 
	 * @proto static public status(status:Int, content:String):play.mvc.results.Status
	 */
	static function status($status, $content = null) {
		// KEEP
		return new play_mvc_results_Status($status, $content);
	}
	
	/** 
	 * @proto static public temporaryRedirect(url:String):play.mvc.results.Redirect
	 */
	static function temporaryRedirect($url) {
		return new play_mvc_results_Redirect(play_mvc_http_Status::TEMPORARY_REDIRECT, $url);
	}
	
	/**
	 * @proto static public unauthorized(?content:String):play.mvc.results.Status
	 */
	static function unauthorized($content = null) {
		return self::status(play_mvc_http_Status::UNAUTHORIZED, null);
	}
	function __toString() { return 'play.mvc.Results'; }
}
