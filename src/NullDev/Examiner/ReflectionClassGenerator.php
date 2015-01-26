<?php

namespace NullDev\Examiner;

class ReflectionClassGenerator
{

    public function generate($class)
    {
        return new \ReflectionClass($class);
    }
}
