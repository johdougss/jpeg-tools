<?php
namespace JpegTools;


class JpegTools
{
    const PATH_BIN = __DIR__ . '/../bin';

    /**
     * @param $in
     * @param $out
     * @param array $options
     * @return string
     * @see https://github.com/danielgtaylor/jpeg-archive
     */
    public function recompress($in, $out, $options = ['-m smallfry'])
    {
        $this->getPathBin();
        $options = implode(' ', $options);
        $exec = $this->normalizePath($this->getPathBin()) . ' ' . $options . ' ' . $this->normalizePath($in) . ' ' . $this->normalizePath($out);
        $result = exec($exec);
        return $result;
    }

    private function getPathBin()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
            return self::PATH_BIN . '/jpeg-recompress.exe';
        else
            return self::PATH_BIN . '/jpeg-recompress';
    }

    private function normalizePath($path)
    {
        return str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
    }
}