<?php
$request_uri = 'https://ipfind.co';
$ip_address = $this->input->ip_address();
$auth = 'YOUR_API_KEY_HERE';
$url = $request_uri . "?ip=" . $ip_address;
$document = file_get_contents($url);
$result = json_decode($document);
?>