<?php

$file="demo.csv";
$csv= file_get_contents($file);
$array = array_map("str_getcsv", explode("\n", $csv));
$json = json_encode($array);
var_dump($json);



?>