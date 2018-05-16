<?php
$curl = curl_init();
$name = $_POST['name']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$address = $_POST['address']; 
$city = $_POST['city']; 
$state = $_POST['state']; 
$zip = $_POST['zip']; 
$comments = $_POST['comments']; 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"personalizations\": [\n    {\n      \"to\": [\n        {\n          \"email\": \"scottruitt@gmail.com\"\n        }\n      ],\n      \"subject\": \"New kitten request from velvacattery.com\"\n    }\n  ],\n  \"from\": {\n    \"email\": \"velva@velvacattery.com\"\n  },\n  \"content\": [\n    {\n      \"type\": \"text/html\",\n      \"value\": \"Name: $name<br />Email: $email<br />Phone: $phone<br />Address: $address<br />City: $city<br />State: $state<br />Zip: $zip<br /></br>Comments: $comments\"\n    }\n  ]\n}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer [SG API key]",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
header('Location: thanks.php');
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>