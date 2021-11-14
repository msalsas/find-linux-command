<?php

namespace App\Service;

use App\Entity\FindFiles;
use App\Entity\FindText;

class FindCommandService
{
    public function getFindFilesCommand(FindFiles $findFiles)
    {
        $nameArg = $findFiles->getIgnoreTextCase() ? "-iname" : "-name";
        $path = $findFiles->getPath() ?? '.';
        $filename = $findFiles->getFilename();
        $command = "find $path";

        if ($maxDepth = $findFiles->getMaxDepth()) {
            $command .= " -maxdepth $maxDepth";
        }

        $command .= " $nameArg \"$filename\" -type f";

        return $command;
    }

    public function getFindTextCommand(FindText $findText)
    {
        $findFilesCommand = $this->getFindFilesCommand($findText);

        $text = $findText->getText();

        return "$findFilesCommand -print0 | xargs -0 grep \"$text\" --no-messages";
    }
}