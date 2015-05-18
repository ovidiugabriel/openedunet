<?php

class Hyperlink {
  public function __construct($href, $text) {
    $this->href = $href;
    $this->text = $text;
  }
  
  public function __toString() {
    return '<a href="'.$this->href.'">'.$this->text.'</a>';
  }
}
