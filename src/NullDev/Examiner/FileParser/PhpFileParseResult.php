<?php

namespace NullDev\Examiner\FileParser;

class PhpFileParseResult
{
    protected $namespace;
    protected $className;

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param mixed $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function getFullyQualifiedClassName()
    {
        if (null === $this->getClassName()) {
            return null;
        }

        if ($this->getNamespace()) {
            return $this->getNamespace().'\\'.$this->getClassName();
        }

        return $this->getClassName();
    }
}
