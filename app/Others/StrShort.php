<?php

function StrShort(string $str, int $start, int $length)
{
    $len    = $length + $start;
    $newStr = $tmp = '';
    for ($i = $start; $i < $len; ++$i) {
        $tmp = substr($str, $i, 1);
        if (ord($tmp) > 0xa0) {// 中文字符
            $newStr .= substr($str, $i, 3);
            $i+=2;
        } else {// 英文字符
            $newStr .= $tmp;
        }
    }
    return $newStr.'...';
}
