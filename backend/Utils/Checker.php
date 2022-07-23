<?php

final class Checker
{
    public static function check($coordinates)
    {
        $x = $coordinates->x;
        $y = $coordinates->y;
        $r = $coordinates->r;

        if ($x > 0 and $y > 0)
        {
            return false;
        }
        else if($x >= 0 and $y <= 0)
        {
            return ($x <= $r) and (-$y <= $r);
        }
        else if($x <= 0 and $y <= 0)
        {
            return pow($x, 2) + pow($y, 2) <= pow($r / 2, 2);
        }
        else // ($x <= 0 and $y >= 0)
        {
            return -$x + $y <= $r / 2;
        }
    }
}