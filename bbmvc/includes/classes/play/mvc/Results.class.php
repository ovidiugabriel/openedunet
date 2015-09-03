<?php

/** 
 * @package play.mvc
 */
class play_mvc_Results {
	public function __construct(){}
	
	/**
	 * @proto static public badRequest(?content:String):play.mvc.results.Status 
	 */
	static function badRequest($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::BAD_REQUEST, $content);
	}
	
	/** 
	 * @proto static public created(?content:String):play.mvc.results.Status
	 */
	static function created($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::CREATED, $content);
	}
	
	/** 
	 * @proto static public forbidden(?content:String):play.mvc.results.Status
	 */
	static function forbidden($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::FORBIDDEN, $content);
	}
	
	/** 
	 * @proto static public found(url:String):play.mvc.results.Status
	 */
	static function found($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::FOUND, $url);
	}
	
	/** 
	 * @proto static public internalServerError(?content:String):play.mvc.results.Status
	 */
	static function internalServerError($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::INTERNAL_SERVER_ERROR, $content);
	}
	
	/** 
	 * @proto static public movedPermanently(url:String):play.mvc.results.Redirect
	 */
	static function movedPermanently($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::MOVED_PERMANENTLY, $url);
	}
	
	/** 
	 * @proto static public noContent():play.mvc.results.Status
	 */
	static function noContent() {
		return new play_mvc_results_Status(play_mvc_results_Status::NO_CONTENT, null);
	}
	
	/** 
	 * @proto static public notFound(?content:String):play.mvc.results.Status
	 */
	static function notFound($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::NOT_FOUND, null);
	}
	
	/** 
	 * @proto static public ok(?content:String):play.mvc.results.Status
	 */
	static function ok($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::OK, null);
	}
	
	/** 
	 * @proto static public redirect(url:String):play.mvc.results.Redirect
	 */
	static function redirect($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::FOUND, $url);
	}
	
	/** 
	 * @proto static public seeOther(url:String):play.mvc.results.Redirect
	 */
	static function seeOther($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::SEE_OTHER, $url);
	}
	
	/** 
	 * @proto static public status(status:Int, content:String):play.mvc.results.Status
	 */
	static function status($status, $content = null) {
		return new play_mvc_results_Status($status, $content);
	}
	
	/** 
	 * @proto static public temporaryRedirect(url:String):play.mvc.results.Redirect
	 */
	static function temporaryRedirect($url) {
		return new play_mvc_results_Redirect(play_mvc_results_Redirect::TEMPORARY_REDIRECT, $url);
	}
	
	/**
	 * @proto static public unauthorized(?content:String):play.mvc.results.Status
	 */
	static function unauthorized($content = null) {
		return new play_mvc_results_Status(play_mvc_results_Status::UNAUTHORIZED, null);
	}
	function __toString() { return 'play.mvc.Results'; }
}
