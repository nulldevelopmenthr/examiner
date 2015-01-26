<?php
namespace Tests\Unit\NullDev\Examiner\FileSystem\FileParser;

use NullDev\Examiner\FileParser\PhpFileParseResultFactory;

class PhpFileParseResultFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $factory = new PhpFileParseResultFactory();

        $result = $factory->create();

        $this->assertInstanceOf('NullDev\Examiner\FileParser\PhpFileParseResult', $result);

    }
}
