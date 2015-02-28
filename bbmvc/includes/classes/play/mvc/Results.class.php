<?php

class play_mvc_Results {
	public function __construct(){}
	static function badRequest() {
		return new play_mvc_results_Status(play_mvc_results_Status::BAD_REQUEST, null);
	}
	static function created() {
		return new play_mvc_results_Status(play_mvc_results_Status::CREATED, null);
	}
	static function forbidden() {
		return new play_mvc_results_Status(play_mvc_results_Status::FORBIDDEN, null);
	}
	static function found($url) {
		return new play_mvc_results_Redirect();
	}
	static function internalServerError() {
		return new play_mvc_results_Status(play_mvc_results_Status::INTERNAL_SERVER_ERROR, null);
	}
	static function movedPermanently() {
		return new play_mvc_results_Redirect();
	}
	static function noContent() {
		return new play_mvc_results_Status(play_mvc_results_Status::NO_CONTENT, null);
	}
	static function notFound() {
		return new play_mvc_results_Status(play_mvc_results_Status::NOT_FOUND, null);
	}
	static function ok() {
		return new play_mvc_results_Status(play_mvc_results_Status::OK, null);
	}
	static function redirect() {
		return new play_mvc_results_Redirect();
	}
	static function seeOther() {
		return new play_mvc_results_Redirect();
	}
	static function status($status, $content = null) {
		if($content === null) {
			$content = "";
		}
		return new play_mvc_results_Status($status, null);
	}
	static function temporaryRedirect() {
		return new play_mvc_results_Redirect();
	}
	static function unauthorized() {
		return new play_mvc_results_Status(play_mvc_results_Status::UNAUTHORIZED, null);
	}
	function __toString() { return 'play.mvc.Results'; }
}
