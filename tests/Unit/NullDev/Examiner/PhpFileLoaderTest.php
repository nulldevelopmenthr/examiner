<?php
namespace Tests\Unit\NullDev\Examiner\FileSystem;

use NullDev\Examiner\PhpFileLoader;

class PhpFileLoaderTest extends \PHPUnit_Framework_TestCase
{

    public function testLoaderUnknownFile()
    {
        $loader = new PhpFileLoader();

        $this->setExpectedException('Exception');

        $loader->load('some-unexisting-file.txt');
    }

    public function testLoader()
    {
        $loader = new PhpFileLoader();

        $result = $loader->load(__FILE__);

        $this->assertTrue($result);
    }
}
