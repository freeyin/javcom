<?php

/**
 * @version 1.0
 * 压缩、解压缩类
 */
class Zip
{
    /**
     * 打包
     * @param $path
     * @param $save
     */
    public static function archive($path, $save)
    {
        $zip = new ZipArchive();
        if ($zip->open($save, ZipArchive::OVERWRITE) === true) {
            self::addZip($path, $zip);
            $zip->close();
        }
    }

    /**
     * 添加文件或文件夹到zip对象
     * @param string $path
     * @param ZipArchive $zip
     */
    private static function addZip($path, $zip)
    {
        $handler = opendir($path);
        while (($file = readdir($handler)) !== false) {
            if ($file != '.' && $file != '..') {
                if (is_dir($path . DIRECTORY_SEPARATOR . $file)) {
                    self::addZip($path . DIRECTORY_SEPARATOR . $file, $zip);
                } else {
                    $zip->addFile($path . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
        closedir($handler);
    }

    /**
     * 解压文件
     * @param string $file 压缩文件路径
     * @param string $path 解压路径，为空则以文件名为路径
     */
    public static function extra($file, $path = null)
    {
        if (!isset($path)) {
            $array = explode('.', $file);
            $path = reset($array);
        }

        $zip = new ZipArchive();
        if ($zip->open($file) === true) {
            $zip->extractTo($path);
            $zip->close();
        }
    }
}