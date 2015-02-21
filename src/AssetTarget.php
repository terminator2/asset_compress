<?php
namespace AssetCompress;

/**
 * Represents a single asset build target.
 *
 * Is created from configuration data and defines all the
 * properties and aspects of an asset build target.
 */
class AssetTarget
{
    protected $path;
    protected $files;
    protected $filters;
    protected $themed;

    /**
     * @param string $path The output path or the asset target.
     * @param array $files An array of AssetCompress\File\FileInterface
     * @param array $filters An array of filter names for this target.
     * @param bool $themed Whether or not this file should be themed.
     */
    public function __construct($path, $files = [], $filters = [], $themed = false)
    {
        $this->path = $path;
        $this->files = $files;
        $this->filters = $filters;
        $this->themed = $themed;
    }

    public function isThemed()
    {
        return $this->themed;
    }

    public function files()
    {
        return $this->files;
    }

    public function outputDir()
    {
        return dirname($this->path);
    }

    public function name()
    {
        return basename($this->path);
    }

    public function filterNames()
    {
        return $this->filters;
    }

    public function modifiedTime()
    {
        if (file_exists($this->path)) {
            return filemtime($this->path);
        }
        return 0;
    }
}
