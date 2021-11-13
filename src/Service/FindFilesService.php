<?php


namespace App\Service;


use App\Entity\FindFiles;

class FindFilesService
{
    public function getFindFilesCommand(FindFiles $findFiles)
    {
        $nameArg = $findFiles->getIgnoreTextCase() ? "-iname" : "-name";
        $path = $findFiles->getPath() ?? '.';
        $filename = $findFiles->getFilename();
        $command = "find $path $nameArg $filename";

        if ($maxDepth = $findFiles->getMaxDepth()) {
            $command .= " -maxdepth $maxDepth";
        }

        return $command;
    }
}