<?php

namespace NullDev\Examiner;

class PhpFileLoader
{
    public function load($fileName)
    {
        if (!is_file($fileName)) {
            throw new \Exception('Unknown file '.$fileName);
        }

        include_once $fileName;

        return true;
    }
}
