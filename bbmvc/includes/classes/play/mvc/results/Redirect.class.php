<?php

class play_mvc_results_Redirect implements play_mvc_Result{

	const FOUND = 302;
	const MOVED_PERMANENTLY = 301;
	const SEE_OTHER = 303;
	const TEMPORARY_REDIRECT = 307;
	
	/** 
	 * @proto public new(status:Int, url:String)
	 */
	public function __construct($status, $url) {
		
	}
	
	function __toString() { return 'play.mvc.results.Redirect'; }
}
