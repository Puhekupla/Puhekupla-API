<?php

$puhekupla_api_base_url = 'https://content.puhekupla.com/api/v1/';
$puhekupla_api_key = ''; // YOUR API KEY HERE

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $puhekupla_api_base_url . "badges");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'X-PUHEKUPLA-APIKEY: ' . $puhekupla_api_key,
    )
);
$data = curl_exec($ch);
$data = json_decode($data, true);

echo "<ul>";
foreach ($data['result'] as $badge) {
    if ($badge['status'] == "active") {
        echo '<li><img title="' . $badge['name'] . ' (' . $badge['code'] . ')" src="' . $badge['image'] . '"></li>';
    }
}
echo "</ul>";
