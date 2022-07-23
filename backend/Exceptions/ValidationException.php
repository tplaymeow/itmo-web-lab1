<?php

abstract class ValidationExceptionCoordinate {
    const X = 0;
    const Y = 1;
    const R = 2;
}

final class ValidationException extends Exception
{    
    public function __construct($coordinateTypes)
    {
        $message = 'Неверное значение для полей:';
        foreach ($coordinateTypes as &$type) {
            if($type == ValidationExceptionCoordinate::X)
            {
                $message = $message . ' X';
            }
            if($type == ValidationExceptionCoordinate::Y)
            {
                $message = $message . ' Y';
            }
            if($type == ValidationExceptionCoordinate::R)
            {
                $message = $message . ' R';
            }
        }

        parent::__construct($message, 0);        
    }
}
