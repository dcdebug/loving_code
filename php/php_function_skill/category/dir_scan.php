<?php
//ini_set("xdebug.default_enable",false);
function showFiles( $dir,  &$allFiles)
{
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $allFiles[] = $path;
        } else if ($value != "." && $value != "..") {
           showFiles($path, $allFiles);
            $allFiles[] = $path;
        }

    }
    return;
}
$files = [];

showFiles('/usr/bin/', $files);

foreach ($files as $file) {
    //echo $file . PHP_EOL;
    file_put_contents("./index.txt",$files.PHP_EOL);
}