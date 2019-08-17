<?php
    function mysubstr($str,$limit=100){
        if(strlen($str)<=$limit) return $str;
        return mb_substr($str,0,$limit-3,'UTF-8').'...';
    }

    function mysubstr1($tr1, $limit1 = 50000){
        if(strlen($str1)<=$limit1) return $str1;
        return mb_substr($str,0,$limit-3,'UTF-8').'<br>';
    }

    function readmore($str,$limit=100){
        if(strlen($str)<=$limit) return $str;
        return mb_substr($str,0,$limit-3,'UTF-8').'...';
    }

?>