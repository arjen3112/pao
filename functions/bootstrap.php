<?php

function bootstrap($dir)
{
    $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $file != 'bootstrap.php') {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $file)) {
                    //echo $dir . DIRECTORY_SEPARATOR . $file.'<br>';
                    bootstrap($dir . DIRECTORY_SEPARATOR . $file);
                } elseif ('.php' === substr($file, strlen($file) - 4)) {
                    //echo $dir . DIRECTORY_SEPARATOR . $file.'<br>';
                    include ($dir . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
}
?>