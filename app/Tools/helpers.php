<?php

function makeEnglishNumber ($string) {
    $string = str_replace("۰",0,  $string);
    $string = str_replace("۱",1,  $string);
    $string = str_replace("۲",2,  $string);
    $string = str_replace("۳",3,  $string);
    $string = str_replace("۴",4,  $string);
    $string = str_replace("۵",5,  $string);
    $string = str_replace("۶",6,  $string);
    $string = str_replace("۷",7,  $string);
    $string = str_replace("۸",8,  $string);
    $string = str_replace("۹",9,  $string);
    return $string;
}