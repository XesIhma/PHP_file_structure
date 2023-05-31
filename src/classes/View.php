<?php

namespace App\Classes;
class View {
  private $filePath;
  private $content;

  public function __construct($filePath) {
    $this->filePath = dirname(__FILE__)."/../views/".$filePath.".html";
    $this->content = '';
  }

  public function render($data = []) {
    extract($data);

    if (!is_file($this->filePath)) {
      throw new \Exception("View file not found: " . $this->filePath);
    }

    $this->content = file_get_contents($this->filePath);
    
    $offset = mb_stripos($this->content, '@extends');
    if (!(is_null($offset))) $this->wrapContent($offset);

    foreach ($data as $key => $value) {
      $placeholder = '{{ $' . $key . ' }}';
      //if (strpos($key, '->')){}
      $this->content = str_replace($placeholder, $value, $this->content);
    }

    echo $this->content;
  }


  private function wrapContent($offset){
    $wrapperStart = $offset + 12;
    $wrapperEnd = mb_stripos($this->content, ' )', $wrapperStart) +2;
    $length = $wrapperEnd - $wrapperStart;
    $wrapperPath = substr($this->content, $wrapperStart, $length);
    $this->content = str_replace('@extends( '. $wrapperPath . ' )', '', $this->content);
    
    $wrapperPath = dirname(__FILE__)."/../views/".$wrapperPath.".html";
    if (!is_file($wrapperPath)) {
      throw new \Exception("Template file not found: " . $wrapperPath);
    }
    
    $wrapper = file_get_contents($wrapperPath);
    $this->content = str_replace('@content', $this->content, $wrapper); 
    
  }



}

?>