<?php

function output($templateName, $dataArr = [],$includeHeaderAndFooter=true)
{

    $fileName = "app/views/" . $templateName .".php";
    $fileNameOfParsed = "app/views/cashed/" . $templateName . ".php";
//parsing file
//    $file = fopen($fileName, 'r');
//    $text = fread($file, filesize($fileName));
//    fclose($file);
//    echo $text;
   echo $content;

    $content = file($fileName);
    // echo "<--";
    // var_dump($content);
    // echo "-->";
    foreach ($content as &$string) {

        $string = str_replace('{{', '<?= ', $string);
        $string = str_replace('}}', ' ?>', $string);
        $i = -1;
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

//    var_dump($content);

    $content = implode('', $content);
    $file = fopen($fileNameOfParsed, 'w');
    fwrite($file, $content);
    fclose($file);


    extract($dataArr, EXTR_SKIP);
    ob_start();
    if($includeHeaderAndFooter)
    require "app/views/header.php";
    require $fileNameOfParsed;
    if($includeHeaderAndFooter)
    require "app/views/footer.php";
    
    return ob_get_clean();
}

// function launch()
// {
//     $students = Student::select()->execute();
// //    echo output('student', ['name' => 'andrew', 'users' => ['hello' => 1, 'abc' => 2]]);
//     echo output('student', ['students' => $students]);
// }
