<?php

final class ParametersExtractor
{
    public static function extractXFrom($jsonObject)
    {
        $string = $jsonObject['x'];
        if(is_numeric($string) and (int)$string == $string)
        {
            return (int)$string;
        }
        return null;
    }

    public static function extractYFrom($jsonObject)
    {
        $string = $jsonObject['y'];
        if(is_numeric($string))
        {
            return (float)$string;
        }
        return null;
    }

    public static function extractRFrom($jsonObject)
    {
        $string = $jsonObject['r'];
        if(is_numeric($string))
        {
            return (float)$string;
        }
        return null;
    }
}