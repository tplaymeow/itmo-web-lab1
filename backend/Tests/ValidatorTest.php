<?php
use PHPUnit\Framework\TestCase;

require_once('Models/Coordinates.php');
require_once('Exceptions/ValidationException.php');
require_once('Utils/Validator.php');

final class ValidatorTest extends TestCase {

    // X Validation

    public function testXGreater()
    {
        try
        {
            $result = Validator::validated(6, 0, 1);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }

        $this->assertEquals($result, 'Неверное значение для полей: X');
    }

    public function testXLess()
    {
        try
        {
            $result = Validator::validated(-4, 0, 1);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }

        $this->assertEquals($result, 'Неверное значение для полей: X');
    }

    public function testXFloat()
    {
        try
        {
            $result = Validator::validated(2.5, 0, 1);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }

        $this->assertEquals($result, 'Неверное значение для полей: X');
    }

    public function testXAllValid()
    {
        $this->assertEquals(
            array(
                Validator::validated(-3, 0, 1),
                Validator::validated(-2, 0, 1),
                Validator::validated(-1, 0, 1),
                Validator::validated(0, 0, 1),
                Validator::validated(1, 0, 1),
                Validator::validated(2, 0, 1),
                Validator::validated(3, 0, 1),
                Validator::validated(4, 0, 1),
                Validator::validated(5, 0, 1)
            ),
            array(
                new Coordinates(-3, 0, 1),
                new Coordinates(-2, 0, 1),
                new Coordinates(-1, 0, 1),
                new Coordinates(0, 0, 1),
                new Coordinates(1, 0, 1),
                new Coordinates(2, 0, 1),
                new Coordinates(3, 0, 1),
                new Coordinates(4, 0, 1),
                new Coordinates(5, 0, 1)
            )
        );
    }

    // Y Validation

    public function testYGreater()
    {
        try
        {
            $result = Validator::validated(0, 3.1, 1);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }
    
          $this->assertEquals($result, 'Неверное значение для полей: Y');
    }
    
    public function testYLess()
    {
        try
        {
            $result = Validator::validated(0, -5.01, 1);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }

        $this->assertEquals($result, 'Неверное значение для полей: Y');
    }

    public function testYSomeValid()
    {
        $this->assertEquals(
            array(
                Validator::validated(0, -5, 1),
                Validator::validated(0, -4.8, 1),
                Validator::validated(0, -2, 1),
                Validator::validated(0, 0.1, 1),
                Validator::validated(0, 2, 1),
                Validator::validated(0, 2.5, 1),
                Validator::validated(0, 0, 1),
                Validator::validated(0, 3, 1),
                Validator::validated(0, -1.1, 1)
            ),
            array(
                new Coordinates(0, -5, 1),
                new Coordinates(0, -4.8, 1),
                new Coordinates(0, -2, 1),
                new Coordinates(0, 0.1, 1),
                new Coordinates(0, 2, 1),
                new Coordinates(0, 2.5, 1),
                new Coordinates(0, 0, 1),
                new Coordinates(0, 3, 1),
                new Coordinates(0, -1.1, 1)
            )
        );
    }

    // R Validation

    public function testRGreater()
    {
        try
        {
            $result = Validator::validated(0, 0, 3.5);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }
    
          $this->assertEquals($result, 'Неверное значение для полей: R');
    }
    
    public function testRLess()
    {
        try
        {
            $result = Validator::validated(0, 0, 0);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }

        $this->assertEquals($result, 'Неверное значение для полей: R');
    }

    public function testRBetweenValid()
    {
        try
        {
            $result = Validator::validated(0, 0, 2.75);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }

        $this->assertEquals($result, 'Неверное значение для полей: R');
    }

    public function testRAllValid()
    {
        $this->assertEquals(
            array(
                Validator::validated(0, 0, 1),
                Validator::validated(0, 0, 1.5),
                Validator::validated(0, 0, 2),
                Validator::validated(0, 0, 2.5),
                Validator::validated(0, 0, 3),
            ),
            array(
                new Coordinates(0, 0, 1),
                new Coordinates(0, 0, 1.5),
                new Coordinates(0, 0, 2),
                new Coordinates(0, 0, 2.5),
                new Coordinates(0, 0, 3),
            )
        );
    }

    // Multiple

    public function testXYInvalid()
    {
        try
        {
            $result = Validator::validated(-10, -10, 2.5);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }
    
          $this->assertEquals($result, 'Неверное значение для полей: X Y');
    }

    public function testYRInvalid()
    {
        try
        {
            $result = Validator::validated(0, -10, 2.6);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }
    
          $this->assertEquals($result, 'Неверное значение для полей: Y R');
    }

    public function testXRInvalid()
    {
        try
        {
            $result = Validator::validated(-10, 0.6, 2.666);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }
    
          $this->assertEquals($result, 'Неверное значение для полей: X R');
    }

    public function testXYRInvalid()
    {
        try
        {
            $result = Validator::validated(-10, 11, 2.666);
        }
        catch(ValidationException $e)
        {
            $result = $e->getMessage();
        }
    
          $this->assertEquals($result, 'Неверное значение для полей: X Y R');
    }
}