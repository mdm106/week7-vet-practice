<?php

namespace App;

class Cracker
{   

    private $key;
    private $alphabet;

    public function __construct(string $key)
    {   
        $this->key = preg_split('//u', str_replace(' ', '', $key), -1, PREG_SPLIT_NO_EMPTY);
        $this->alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    }


    public function translateWord(string $string) 
    {
        $split = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY); // string split that deal with unicodes
        $array = [];
        foreach ($split as $letter) {
            array_push($array, array_search($letter, $this->key));
        }
        $answer = "";
        foreach ($array as $index) {
            $answer .= $this->alphabet[$index];
        }
        return $answer;
    }
    
    
    public function decrypt(string $string)
    {   
        $words = explode(' ', $string);
        $final = "";
        foreach ($words as $word) {
            $final .= $this->translateWord($word);
            $final .= " ";
        }
        return rtrim($final);
        
    }
}