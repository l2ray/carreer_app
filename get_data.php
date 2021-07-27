<?php

$company = $_GET['company'];

function curlRequest($endpoint){

    $url = "http://localhost/career-app/admin/public/api/$endpoint";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $companies = curl_exec($ch);
    curl_close($ch);

    return json_decode($companies, true);
}


$departments = curlRequest("companies/$company");
// echo "you have successfully get data from $company";
// exit;
echo json_encode($departments);

exit;
echo "you have successfully get data from $company";


