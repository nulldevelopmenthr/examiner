<?php

namespace NullDev\Examiner\FileParser;

class PhpFileParser
{
    protected $factory;

    public function __construct($factory)
    {
        $this->factory = $factory;
    }

    public function parse($fileName)
    {
        if (!is_file($fileName)) {
            throw new \Exception('Unknown file ' . $fileName);
        }

        $result = $this->factory->create();

        $content = file_get_contents($fileName);

        $perLineList = explode("\n", $content);

        $patternNamespaceDetection = '/^namespace (?<namespace>.*);/i';
        $patternClassDetection     = '/^(final |)class (?<className>[^\s]+)/i';

        foreach ($perLineList as $perLine) {

            if (preg_match($patternNamespaceDetection, $perLine, $matches)) {
                $result->setNamespace($matches['namespace']);
            }
            if (preg_match($patternClassDetection, $perLine, $matches)) {
                $result->setClassName($matches['className']);
            }
        }

        return $result;
    }
}
