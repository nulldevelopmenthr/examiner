<?php
namespace Tests\Integration\NullDev\Examiner\FileSystem\FileParser;

use NullDev\Examiner\FileParser\PhpFileParser;
use NullDev\Examiner\FileParser\PhpFileParseResultFactory;

/**
 * Class FileParserTest.
 */
class PhpFileParserTest extends \PHPUnit_Framework_TestCase
{
    protected $parser;

    public function setUp()
    {
        $factory = new PhpFileParseResultFactory();

        $this->parser = new PhpFileParser($factory);
    }

    /**
     * @dataProvider getTestFiles
     */
    public function testParser($fileName, $className)
    {
        $result = $this->parser->parse($fileName);

        $this->assertEquals($className, $result->getFullyQualifiedClassName());
    }

    public function getTestFiles()
    {
        return [
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Calculator/SimpleCalculator.php',
                'Examiner\Calculator\SimpleCalculator',
            ],
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Calculator/AdvancedCalculator.php',
                'Examiner\Calculator\AdvancedCalculator',
            ],
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Calculator/BasicCalculator.php',
                'Examiner\Calculator\BasicCalculator',
            ],
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Calculator/FinalCalculator.php',
                'Examiner\Calculator\FinalCalculator',
            ],
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Calculator/AbstractCalculator.php',
                null,
            ],
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Phone/FeaturePhone/Nokia3320.php',
                'Examiner\Phone\FeaturePhone\Nokia3320',
            ],
            [
               EXAMINER_TESTDATA_PATH.'Examiner/Phone/SmartPhone/Apple/Iphone4.php',
                'Examiner\Phone\SmartPhone\Apple\Iphone4',
            ],
        ];
    }
}
