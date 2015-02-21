<?php
namespace Tests\Unit\NullDev\Examiner\FileSystem\FileParser;

use Mockery as m;
use NullDev\Examiner\FileParser\PhpFileParser;

class PhpFileParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParser()
    {
        $mockResult = m::mock();
        $mockResult->shouldReceive('setNamespace')->once()->with('Tests\Unit\NullDev\Examiner\FileSystem\FileParser');
        $mockResult->shouldReceive('setClassName')->once()->with('PhpFileParserTest');

        $mockFactory = m::mock();
        $mockFactory->shouldReceive('create')->once()->andReturn($mockResult);

        $parser = new PhpFileParser($mockFactory);

        $result = $parser->parse(__FILE__);

        $this->assertEquals($mockResult, $result);
    }

    public function testParserUnknownFile()
    {
        $parser = new PhpFileParser(m::mock());

        $this->setExpectedException('Exception');

        $parser->parse('some-unexisting-file.txt');
    }
}
