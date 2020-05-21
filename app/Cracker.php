<?php

namespace App;

class Cracker
{   

    private $key;
    private $alphabet;

    public function __construct(string $key)
    {   
        $this->key = preg_split('//u', str_replace(' ', '', $key), -1, PREG_SPLIT_NO_EMPTY);
        $this->alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']; //range('a', 'z) would be better
    }


    public function decrypt(string $string) 
    {
        $split = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY); // string split that deal with unicodes - /mb_str_split
        $array = [];
        foreach ($split as $letter) {
            if ($letter === " ") {
                array_push($array, " ");
            } else {
                array_push($array, array_search($letter, $this->key));
            }
        }
        $answer = "";
        foreach ($array as $index) {
            if($index === " ") {
                $answer .= " ";
            } else {
                $answer .= $this->alphabet[$index];
            }
        }
        return $answer;
    }
    
}