<?php

require_once('Models/Coordinates.php');
require_once('Exceptions/ValidationException.php');

final class Validator
{
    public static function validated($x, $y, $r)
    {
        $invalidCoordinateTypes = array();

        if(!in_array($x, array(-3, -2, -1, 0, 1, 2, 3, 4, 5)))
        {
            array_push($invalidCoordinateTypes, ValidationExceptionCoordinate::X);
        }
        if($y < -5 or $y > 3)
        {
            array_push($invalidCoordinateTypes, ValidationExceptionCoordinate::Y);
        }
        if(!in_array($r, array(1.0, 1.5, 2.0, 2.5, 3.0)))
        {
            array_push($invalidCoordinateTypes, ValidationExceptionCoordinate::R);
        }

        if(count($invalidCoordinateTypes) > 0)
        {
            throw new ValidationException($invalidCoordinateTypes);
        }

        return new Coordinates($x, $y, $r);
    }
}
