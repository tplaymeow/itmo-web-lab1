<?php

final class Coordinates
{
    public $x;
    public $y;
    public $r;

    public function __construct($x, $y, $r)
    {
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }

    public function __equals($other): bool
    {
        return 
        ($this->x == $other->x) and
        ($this->y == $other->y) and
        ($this->r == $other->r);
    }

    public function __toString()
    {
        return "({$this->x}, {$this->y}, {$this->r})";
    }

}
