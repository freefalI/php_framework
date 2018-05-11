<?php

function output($templateName, $dataArr = [])
{

    $fileName = "app/views/" . $templateName .".html";
    $fileNameOfParsed = "app/views/" . $templateName . "_parsed.html";
//parsing file
//    $file = fopen($fileName, 'r');
//    $text = fread($file, filesize($fileName));
//    fclose($file);
//    echo $text;

    $content = file($fileName);
    foreach ($content as &$string) {

        $string = str_replace('{{', '<?= ', $string);
        $string = str_replace('}}', ' ?>', $string);
        $i = 0;
        $ch = ' ';
        while ($ch == ' ') {
            $i++;
            $ch = $string[$i];
        }
        if ($string[$i] == "@") {
            $string = str_replace('@', '<?php ', $string);
            $string = str_replace(array("\r", "\n"), "", $string);
            $string .= " ?>\n";
        }
    }


    $content = implode('', $content);
    $file = fopen($fileNameOfParsed, 'w');
    fwrite($file, $content);
    fclose($file);


    extract($dataArr, EXTR_SKIP);
    ob_start();
    require $fileNameOfParsed;
    return ob_get_clean();
}

// function launch()
// {
//     $students = Student::select()->execute();
// //    echo output('student', ['name' => 'andrew', 'users' => ['hello' => 1, 'abc' => 2]]);
//     echo output('student', ['students' => $students]);
// }
