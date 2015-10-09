<?php

require '../VowelRemoval.php';

class VowelRemovalTest extends PHPUnit_Framework_TestCase
{
    private $vowelRemoval;

    public function setUp()
    {
        $this->vowelRemoval = new VowelRemoval();
    }

    public function testShouldStripVowelsFromString()
    {
        $string = "Vital Remains";
        $cleanString = $this->vowelRemoval->execute($string);

        $this->assertEquals('Vtl Rmns', $cleanString);
    }

    public function testShouldStripVowelsFromArrayOfStrings()
    {
        $strings = ['Vital Remains', 'Kreator'];

        $cleanStrings = $this->vowelRemoval->execute($strings);

        $this->assertEquals(2, count($cleanStrings));
        $this->assertEquals('Vtl Rmns', $cleanStrings[0]);
        $this->assertEquals('Krtr', $cleanStrings[1]);
    }

    public function testShouldAcceptUppercasedString()
    {
        $strings = ['BABE', 'BIBOBU'];

        $cleanStrings = $this->vowelRemoval->execute($strings);

        $this->assertEquals(2, count($cleanStrings));
        $this->assertEquals('BB', $cleanStrings[0]);
        $this->assertEquals('BBB', $cleanStrings[1]);
    }

    public function testShouldAcceptNumbers()
    {
        $strings = [12, 'a1b2e3'];
        $cleanStrings = $this->vowelRemoval->execute($strings);

        $this->assertEquals(2, count($cleanStrings));
        $this->assertEquals(12, $cleanStrings[0]);
        $this->assertEquals('1b23', $cleanStrings[1]);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldNotAcceptBlankStrings()
    {
        $string = "";
        $cleanString = $this->vowelRemoval->execute($string);
    }
}
