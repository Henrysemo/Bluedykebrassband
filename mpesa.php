<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

function respond(bool $success, string $message, int $statusCode = 200): never
{
    http_response_code($statusCode);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    respond(true, 'M-Pesa endpoint is available.');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Method not allowed.', 405);
}

$payload = json_decode(file_get_contents('php://input'), true);

if (!is_array($payload)) {
    respond(false, 'Invalid request.', 400);
}

// Daraja sends the payment result to this same endpoint after the prompt is handled.
if (isset($payload['Body']['stkCallback'])) {
    respond(
        true,
        json_encode($payload['Body']['stkCallback'], JSON_UNESCAPED_SLASHES)
    );
}

$amount = filter_var($payload['amount'] ?? null, FILTER_VALIDATE_INT);
$phone = preg_replace('/\D+/', '', (string) ($payload['phone'] ?? ''));

if ($amount === false || $amount < 1 || $amount > 150000) {
    respond(false, 'Enter a valid amount between KES 1 and KES 150,000.', 422);
}

if (str_starts_with($phone, '0')) {
    $phone = '254' . substr($phone, 1);
}

if (!preg_match('/^254[17]\d{8}$/', $phone)) {
    respond(false, 'Enter a valid Kenyan M-Pesa phone number.', 422);
}

$consumerKey = getenv('MPESA_CONSUMER_KEY');
$consumerSecret = getenv('MPESA_CONSUMER_SECRET');
$shortcode = getenv('MPESA_SHORTCODE');
$passkey = getenv('MPESA_PASSKEY');
$callbackUrl = getenv('MPESA_CALLBACK_URL');
$environment = strtolower((string) getenv('MPESA_ENVIRONMENT')) === 'production' ? 'production' : 'sandbox';

if (!$consumerKey || !$consumerSecret || !$shortcode || !$passkey || !$callbackUrl) {
    respond(false, 'M-Pesa payments are not configured yet. Please contact the band directly.', 503);
}

$baseUrl = $environment === 'production'
    ? 'https://api.safaricom.co.ke'
    : 'https://sandbox.safaricom.co.ke';

function requestJson(string $url, string $method, array $headers = [], ?string $body = null): array
{
    $options = [
        'http' => [
            'method' => $method,
            'ignore_errors' => true,
            'timeout' => 20,
            'header' => implode("\r\n", $headers),
        ],
    ];

    if ($body !== null) {
        $options['http']['content'] = $body;
    }

    $response = file_get_contents($url, false, stream_context_create($options));
    $decoded = json_decode($response ?: '', true);

    return is_array($decoded) ? $decoded : [];
}

$tokenResponse = requestJson(
    $baseUrl . '/oauth/v1/generate?grant_type=client_credentials',
    'GET',
    ['Authorization: Basic ' . base64_encode($consumerKey . ':' . $consumerSecret)]
);
$accessToken = $tokenResponse['access_token'] ?? null;

if (!$accessToken) {
    respond(false, 'M-Pesa authentication failed. Please try again later.', 502);
}

$timestamp = date('YmdHis');
$password = base64_encode($shortcode . $passkey . $timestamp);
$stkResponse = requestJson(
    $baseUrl . '/mpesa/stkpush/v1/processrequest',
    'POST',
    [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ],
    json_encode([
        'BusinessShortCode' => $shortcode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phone,
        'PartyB' => $shortcode,
        'PhoneNumber' => $phone,
        'CallBackURL' => $callbackUrl,
        'AccountReference' => 'Instruments Project',
        'TransactionDesc' => 'Support for Blue Dyke instruments',
    ], JSON_THROW_ON_ERROR)
);

if (($stkResponse['ResponseCode'] ?? null) !== '0') {
    respond(false, $stkResponse['errorMessage'] ?? $stkResponse['ResponseDescription'] ?? 'M-Pesa could not start the payment.', 502);
}

respond(true, 'Check your phone and enter your M-Pesa PIN to complete the support payment.');
