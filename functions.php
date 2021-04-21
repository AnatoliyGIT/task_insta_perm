<?php
function debug_to_text_file($data, $data_name)
{
    $file = 'console-log.txt';
    if (is_object($data)) {
        $data = get_object_vars($data);
    }
    if (is_array($data)) {
        $arr = [$data_name => $data];
        foreach ($arr as $key0 => $value0) {
            if (is_object($value0)) {
                $value0 = get_object_vars($value0);
            }
            file_put_contents($file, '[' . $key0 . '](array)' . PHP_EOL, FILE_APPEND | LOCK_EX);
            $content0 = '';
            foreach ($value0 as $key1 => $value1) {
                if (is_object($value1)) {
                    $value1 = get_object_vars($value1);
                }
                if (is_array($value1)) {
                    file_put_contents($file, '   [' . $key1 . '](array)' . PHP_EOL, FILE_APPEND | LOCK_EX);
                    $content1 = '';
                    foreach ($value1 as $key2 => $value2) {
                        if (is_object($value2)) {
                            $value2 = get_object_vars($value2);
                        }
                        $content1 .= '      [' . $key2 . ']=' . $value2 . PHP_EOL;
                    }
                    file_put_contents($file, $content1, FILE_APPEND | LOCK_EX);
                } else {
                    $content0 .= '   [' . $key1 . ']=' . $value1 . PHP_EOL;
                }
            }
            file_put_contents($file, $content0, FILE_APPEND | LOCK_EX);
        }
    } else {
        file_put_contents($file, $data_name . ' - ' . $data . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
    file_put_contents($file, '--------------------------------------------------' . PHP_EOL, FILE_APPEND | LOCK_EX);
}