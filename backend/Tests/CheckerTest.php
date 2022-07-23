<?php
use PHPUnit\Framework\TestCase;

require_once('Models/Coordinates.php');
require_once('Utils/Checker.php');

final class CheckerTest extends TestCase {
    public function testQuarter1()
    {
        $coordinates = new Coordinates(1, 3.0, 2.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(2, 2.1, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(5, 0.1, 1.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(1, 3.0, 1.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);
    }

    public function testQuarter2()
    {
        $coordinates = new Coordinates(3, -0.1, 2.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(1, -4.5, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(2, -2.4, 2.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(1, -0.1, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(4, -3.1, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);   

        $coordinates = new Coordinates(3, -3.0, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);  
    }

    public function testQuarter3()
    {
        $coordinates = new Coordinates(-1, -1.11, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(-1, -1.12, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(-1, -0.7, 2.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(-2, -0.7, 2.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);
    }

    public function testQuarter4()
    {
        $coordinates = new Coordinates(-1, 0.5, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(-1, 0.1, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(-1, 2.1, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);
    }

    public function testZeroCoordinates()
    {
        $coordinates = new Coordinates(0, 0.0, 1.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 0.0, 1.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 0.0, 2.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 0.0, 2.5);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 0.0, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);
    }

    public function testXAxis()
    {
        $coordinates = new Coordinates(-2, 0.0, 2.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(-1, 0.0, 2.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(2, 0.0, 2.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(4, 0.0, 2.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);
    }

    public function testYAxis()
    {
        $coordinates = new Coordinates(0, -3.2, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);

        $coordinates = new Coordinates(0, -3.0, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 0, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 1.5, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, true);

        $coordinates = new Coordinates(0, 1.7, 3.0);
        $result = Checker::check($coordinates);
        $this->assertEquals($result, false);
    }
}