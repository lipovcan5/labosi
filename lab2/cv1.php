<?php
$row = 1;
$count=0;
if (($handle = fopen("example.csv", "r")) !== FALSE) {
    while ($count <=20) {
    	$data = fgetcsv($handle, 1000, ",");
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
            list($user, $pass, $iud, $grid, $extra, $id) = explode(";", $data[c]);
            echo $user;
            echo $pass;
            echo $iud;
            echo $grid;
            echo $extra;
            echo $id;
            echo "<br>";
        }
        $count++;
    }
    fclose($handle);
}
?>