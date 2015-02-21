<?php
namespace Tests\Unit\NullDev\Examiner\FileSystem\FileParser;

use NullDev\Examiner\FileParser\PhpFileParseResult;

class PhpFileParseResultTest extends \PHPUnit_Framework_TestCase
{
    public function testGettersAndSettersUsingNamespace()
    {
        $parseResult = new PhpFileParseResult();

        $parseResult->setNamespace('Name\Space');
        $parseResult->setClassName('ClassName');

        $this->assertEquals('Name\Space', $parseResult->getNamespace());
        $this->assertEquals('ClassName', $parseResult->getClassName());
        $this->assertEquals('Name\Space\ClassName', $parseResult->getFullyQualifiedClassName());
    }

    public function testGettersAndSettersWithoutNamespace()
    {
        $parseResult = new PhpFileParseResult();

        $parseResult->setClassName('ClassName');

        $this->assertEquals(null, $parseResult->getNamespace());
        $this->assertEquals('ClassName', $parseResult->getClassName());
        $this->assertEquals('ClassName', $parseResult->getFullyQualifiedClassName());
    }

    public function testGettersAndSettersWithoutSettingAnythingIn()
    {
        $parseResult = new PhpFileParseResult();

        $this->assertEquals(null, $parseResult->getNamespace());
        $this->assertEquals(null, $parseResult->getClassName());
        $this->assertEquals(null, $parseResult->getFullyQualifiedClassName());
    }

    public function testGettersAndSettersOnlyNamespaceFound()
    {
        $parseResult = new PhpFileParseResult();

        $parseResult->setNamespace('Name\Space');

        $this->assertEquals('Name\Space', $parseResult->getNamespace());
        $this->assertEquals(null, $parseResult->getClassName());
        $this->assertEquals(null, $parseResult->getFullyQualifiedClassName());
    }
}
