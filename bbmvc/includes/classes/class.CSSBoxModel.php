<?php 

class CSSBoxModel {
  private $width;
  private $height;

  public $left;
  public $top;

  // Padding
  public $paddingBottom;
  public $paddingLeft;
  public $paddingRight;
  public $paddingTop;

  // Border
  public $borderBottomWidth;
  public $borderLeftWidth;
  public $borderRightWidth;
  public $borderTopWidth;

  // BorderRadius
  public $borderTopLeftRadius;
  public $borderTopRightRadius;
  public $borderBottomLeftRadius;
  public $borderBottomRightRadius;
	
  // Margin
  public $marginBottom;
  public $marginLeft;
  public $marginRight;
  public $marginTop;
  
  public function width($width = null) {
  	if (null !== $width) {
  		$this->width = (float) $width;
  	}
  	return (float) $this->width;
  }
  
  public function height($height = null) {
  	if (null !== $height) {
  		$this->height = (float) $height;
  	}
  	return (float) $this->height;
  }
}
