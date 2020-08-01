<?php


namespace Acme\Service;

use Acme\Service\Contract\FileServiceInterface;
use Illuminate\Support\Facades\Storage;


/**
 * Class FileService
 * @package Acme\Service
 */
class FileService implements FileServiceInterface
{

    /**
     * @param string $file
     * @return string
     */
    public function get(string $file): string
    {
        return Storage::get($file);
    }

    /**
     * @param string $file
     * @param string $contents
     * @return bool
     */
    public function put(string $file, string $contents): bool
    {
        return Storage::put($file, $contents);
    }

    /**
     * @param string $file
     * @return bool
     */
    public function exists(string $file): bool
    {
        return Storage::exists($file);
    }

}
