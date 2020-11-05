<?php
set_time_limit(3000);
include('config.php');


$ttable = stripcslashes($_POST['tn']);
$table = json_decode($ttable);

if ($conn->query("DELETE FROM `raw`") !== true) {
    echo "Error:  =>" .  $conn->error;
}

if ($conn->query("DELETE FROM `raw_file`") !== true) {
    echo "Error: =>" .  $conn->error;
}
if ($conn->query("DELETE FROM `raw_data`") !== true) {
    echo "Error: =>" . $conn->error;
}

for ($j = 0; $j < sizeof($table); $j++) {

    if ($conn->query($table[$j])  !== TRUE) {
        echo "Error: Pls select all column headers =>" . $table[$j] . "<br>" . $conn->error;
    }
}

if ($conn->query("INSERT INTO raw_file (SELECT LIST_NAME, FIRST_NAME, LAST_NAME, ADDRESS, CITY, STATE, ZIP_CODE, MAILING_ADDRESS, MAILING_CITY, MAILING_STATE, MAILING_ZIP, PHONE_1, PHONE_1_TYPE, PHONE_2, PHONE_2_TYPE, PHONE_3, PHONE_3_TYPE, PHONE_4, PHONE_4_TYPE, PHONE_5, PHONE_5_TYPE, PHONE_6, PHONE_6_TYPE, PHONE_7, PHONE_7_TYPE, PHONE_8, PHONE_8_TYPE, PHONE_9, PHONE_9_TYPE, PHONE_10, PHONE_10_TYPE FROM raw WHERE EXISTS (SELECT seller.property_address FROM seller WHERE seller.property_address LIKE CONCAT('%', ADDRESS, '%')))") !== true) {
    echo "Error: =>" . $conn->error;
}

if ($conn->query("INSERT INTO raw_data (SELECT LIST_NAME, FIRST_NAME, LAST_NAME, ADDRESS, CITY, STATE, ZIP_CODE, MAILING_ADDRESS, MAILING_CITY, MAILING_STATE, MAILING_ZIP, PHONE_1, PHONE_1_TYPE, PHONE_2, PHONE_2_TYPE, PHONE_3, PHONE_3_TYPE, PHONE_4, PHONE_4_TYPE, PHONE_5, PHONE_5_TYPE, PHONE_6, PHONE_6_TYPE, PHONE_7, PHONE_7_TYPE, PHONE_8, PHONE_8_TYPE, PHONE_9, PHONE_9_TYPE, PHONE_10, PHONE_10_TYPE FROM raw WHERE NOT EXISTS (SELECT seller.property_address FROM seller WHERE seller.property_address LIKE CONCAT('%', ADDRESS, '%')))") !== true) {
    echo "Error:  =>" . $conn->error;
}

$conn->close();
?>