<?php

namespace App\Entity;

class FindText extends FindFiles
{
    private $text;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }
}