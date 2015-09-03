<?php

class play_mvc_results_Status implements play_mvc_Result {
	
	# https://www.playframework.com/documentation/2.4.x/api/java/play/mvc/Results.Status.html

	/** 
	 * @param integer $status see play.api.mvc.results.Status
	 * @proto public new(status:Int, content:String)
	 */
	public function __construct($status, $content) {
		
	}
	
	function __toString() { return 'play.mvc.results.Status'; }
}
