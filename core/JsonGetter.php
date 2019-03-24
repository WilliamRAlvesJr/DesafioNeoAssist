<?php

class JsonGetter {
    public static function getData($tickets) {
        $json       = file_get_contents($tickets);           
        $json_data  = json_decode($json, JSON_UNESCAPED_UNICODE); 
        return $json_data;
    }
}

