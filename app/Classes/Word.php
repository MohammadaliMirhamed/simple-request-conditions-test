<?php

namespace App\Classes;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class Word
{

    public function __construct(
        private string $first_word,
        private string $second_word
    ) {
    }

    /**
     * get the first word
     * 
     * @return string
     */
    public function getFirstWord() :string
    {
        return $this->first_word;
    }

    /**
     * get the second word
     * 
     * @return string
     */
    public function getSecondWord() :string
    {
        return $this->second_word;
    }

    /**
     * get the first word length
     * 
     * @return int
     */
    public function getFirstWordLength() :int
    {
        return strlen($this->first_word);
    }

    /**
     * get the second word length
     * 
     * @return int
     */
    public function getSecondWordLength() :int
    {
        return strlen($this->second_word);
    }

    /**
     * get the first word character at the given index
     * 
     * @return string
     */

    public function getFirstWordCharAtIndex(int $index) :string
    {
        return $this->first_word[$index];
    }

    /**
     * get the second word character at the given index
     * 
     * @return string
     */
    public function getSecondWordCharAtIndex(int $index) :string
    {
        return $this->second_word[$index];
    }

    /**
     * concatenate the first word with the second word
     * 
     * @param  string $separator
     * @return string
     */
    public function doConcatenater(string $separator = '') :string
    {
        return $this->first_word . $separator . $this->second_word;
    }
    
}