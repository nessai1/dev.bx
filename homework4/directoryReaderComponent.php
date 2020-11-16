<?php


function scanFolder($fl)
{
    $res['isReadable'] = is_readable($fl);
    $res['isWritable'] = is_writable($fl);

    return $res;
}

function scanFile($fl)
{
    $res['isReadable'] = is_readable($fl);
    $res['isWritable'] = is_writable($fl);
    $res['size'] = filesize($fl);

    return $res;
}


function getDirectoryStatus($path)
{
    $dir = @opendir($path);

    if (!$dir)
    {
        return null;
    }

    $returnDir = ['dirs' => [], 'files' => []];
    while ($fl = readdir($dir))
    {
        if (in_array($fl, ['.','..']))
        {
            continue;
        }
        $checkPath = $path.'\\'.$fl;
        if (is_dir($checkPath))
        {
            $returnDir['dirs'][$fl] = scanFolder($checkPath);
        }
        elseif (is_file($checkPath))
        {
            $returnDir['files'][$fl] = scanFile($checkPath);
        }

    }
    closedir($dir);
    return $returnDir;
}