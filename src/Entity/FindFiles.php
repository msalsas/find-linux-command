<?php

namespace App\Entity;

class FindFiles
{
    private $filename;
    private $path;
    private $maxDepth;
    private $ignoreTextCase;

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename): void
    {
        $this->filename = $filename;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path): void
    {
        $this->path = $path;
    }

    public function getMaxDepth()
    {
        return $this->maxDepth;
    }

    public function setMaxDepth($maxDepth): void
    {
        $this->maxDepth = $maxDepth;
    }

    public function getIgnoreTextCase()
    {
        return $this->ignoreTextCase;
    }

    public function setIgnoreTextCase($ignoreTextCase): void
    {
        $this->ignoreTextCase = $ignoreTextCase;
    }
}