<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

$consumerKey = getenv('MPESA_CONSUMER_KEY');
$consumerSecret = getenv('MPESA_CONSUMER_SECRET');
$environment = strtolower((string) getenv('MPESA_ENVIRONMENT')) === 'production'
    ? 'production'
    : 'sandbox';

$baseUrl = $environment === 'production'
    ? 'https://api.safaricom.co.ke'
    : 'https://sandbox.safaricom.co.ke';

if (!$consumerKey || !$consumerSecret) {
    echo json_encode([
        'success' => false,
        'message' => 'Consumer Key or Consumer Secret is missing from Render.'
    ]);
    exit;
}

$credentials = base64_encode($consumerKey . ':' . $consumerSecret);

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => "Authorization: Basic {$credentials}\r\n",
        'ignore_errors' => true,
        'timeout' => 20,
    ],
]);

$url = $baseUrl . '/oauth/v1/generate?grant_type=client_credentials';

$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo json_encode([
        'success' => false,
        'message' => 'Could not connect to Safaricom Daraja.'
    ]);
    exit;
}

$data = json_decode($response, true);

if (!is_array($data)) {
    echo json_encode([
        'success' => false,
        'message' => 'Safaricom returned an invalid response.',
        'raw_response' => $response
    ]);
    exit;
}

if (isset($data['access_token'])) {
    echo json_encode([
        'success' => true,
        'message' => 'Daraja authentication successful.',
        'environment' => $environment
    ]);
    exit;
}

echo json_encode([
    'success' => false,
    'message' => 'Daraja authentication failed.',
    'response' => $data
]);
