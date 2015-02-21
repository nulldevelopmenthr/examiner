<?php
namespace Tests\Integration\NullDev\Examiner\FileSystem;

use NullDev\Examiner\PhpFileLoader;

/**
 * Class FileLoaderTest.
 */
class PhpFileLoaderTest extends \PHPUnit_Framework_TestCase
{
    protected $loader;

    public function setUp()
    {
        $this->loader = new PhpFileLoader();
    }

    /**
     * @dataProvider getTestFiles
     */
    public function testParser($fileName)
    {
        $result = $this->loader->load($fileName);

        $this->assertTrue($result);
    }

    public function getTestFiles()
    {
        return [
            [EXAMINER_TESTDATA_PATH.'Examiner/Calculator/SimpleCalculator.php'],
            [EXAMINER_TESTDATA_PATH.'Examiner/Calculator/AdvancedCalculator.php'],
            [EXAMINER_TESTDATA_PATH.'Examiner/Calculator/BasicCalculator.php'],
            [EXAMINER_TESTDATA_PATH.'Examiner/Calculator/FinalCalculator.php'],
            [EXAMINER_TESTDATA_PATH.'Examiner/Calculator/AbstractCalculator.php'],
        ];
    }
}
