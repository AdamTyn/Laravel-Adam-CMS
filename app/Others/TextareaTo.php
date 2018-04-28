<?php 

function TextareaTo(string $value)
{
	$pattern = array(
        '/ /',//半角下空格
        '/\r\n/',//window 下换行符
        '/##/',
    );
    $replace = array('&nbsp;','<br>','<p>');
    return preg_replace($pattern, $replace,$value);
}