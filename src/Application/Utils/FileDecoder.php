<?php
declare(strict_types=1);
namespace App\Utils;

class FileDecoder
{
    public function decodeJsonFile(string $filepath): array
    {
        return json_decode(file_get_contents($filepath), true);
    }
}
