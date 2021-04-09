<?php
    function url($url){
        // fix url
        return "http://".$_SERVER['HTTP_HOST']."/project/".$url;
    
    
    }
?>