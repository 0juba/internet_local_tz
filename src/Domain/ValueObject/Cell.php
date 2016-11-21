<?php

namespace ChessDomain\ValueObject;

class Cell 
{
    private $x;
    private $y;

    public static function create($x, $y)
    {
        return new static($x, $y);
    }

    private function __construct($x, $y) 
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }
}
