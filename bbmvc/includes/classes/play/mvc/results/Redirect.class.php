<?php

class play_mvc_results_Redirect implements play_mvc_Result {
	
	# https://www.playframework.com/documentation/2.4.x/api/java/play/mvc/Results.Redirect.html

	/** 
	 * @param integer $status see play.mvc.http.Status
	 * @param string $url 
	 * @proto public new(status:Int, url:String)
	 */
	public function __construct($status, $url) {
		
	}
	
	function __toString() { return 'play.mvc.results.Redirect'; }
}
