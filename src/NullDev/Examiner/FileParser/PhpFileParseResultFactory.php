<?php

namespace NullDev\Examiner\FileParser;

class PhpFileParseResultFactory
{
    /**
     * Returns new instance of PhpFileParseResult;.
     *
     * @return PhpFileParseResult
     */
    public function create()
    {
        return new PhpFileParseResult();
    }
}
