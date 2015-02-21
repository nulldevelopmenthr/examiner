<?php
namespace NullDev\Examiner\Tests\Unit;

use NullDev\Examiner\ReflectionClassGenerator;

class ReflectionClassGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testNothing()
    {
        $generator = new ReflectionClassGenerator();

        $result = $generator->generate(get_class($this));

        $this->assertInstanceOf('ReflectionClass', $result);

        $this->assertEquals(get_class($this), $result->getName());
    }
}
