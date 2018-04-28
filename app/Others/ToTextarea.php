<?php 

function ToTextarea(string $value,bool $type=false)
{
	$pattern = array(
        '/&nbsp;/',
        '/<br>/',
        '/<p>/',
        '/<\/p>/',
    );
    if ($type) {
    	$replace = array('','','##','');
    }else{
    	$replace = array('','','','');
    }
    
    return preg_replace($pattern, $replace,$value);
}