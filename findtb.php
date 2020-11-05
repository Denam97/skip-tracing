<?php
include("config.php");
$tb=$_GET['tb'];


 $sql = "SELECT * FROM $tb";
    
    //execute query 
    $result = @mysqli_query( $conn,$sql);

    function cleanData(&$str) 
    {
        if ($str == 't')
            $str = 'TRUE';
        if ($str == 'f')
            $str = 'FALSE';
        if (preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
            $str = "'$str";
        }
        if (strstr($str, '"'))
        $str = '"' . str_replace('"', '""', $str) . '"';
}

// tb for download
$tb = $tb. ".csv";
header("Content-Disposition: attachment; filename=\"$tb\"");
header("Content-Type: text/csv;");
$out = fopen("php://output", 'w');
$flag = false;

while ($row = mysqli_fetch_assoc($result))
{
    if (!$flag) 
        {
        // display field/column names as first row 
        fputcsv($out, array_keys($row), ',', '"'); $flag = true; 
        }
    array_walk($row, 'cleanData');
    // insert data into database from here
    fputcsv($out, array_values($row), ',', '"');
}
fclose($out);
exit;
//end

?>