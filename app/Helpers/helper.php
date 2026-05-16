<?php

/**
 * Execute a cURL GET request.
 *
 * @param string     $url
 * @param array|null $queryParams Query string parameters
 * @param array      $options     Additional cURL options
 *
 * @return string
 *
 * @throws RuntimeException
 */
function getCurlData(string $url, ?array $queryParams = null, array $options = []): string
{
    // Build final URL with query parameters
    if (!empty($queryParams)) {
        $separator = str_contains($url, '?') ? '&' : '?';
        $url .= $separator . http_build_query($queryParams);
    }

    $defaultOptions = [
        CURLOPT_URL            => $url,
        CURLOPT_HEADER         => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ];

    $ch = curl_init();

    curl_setopt_array($ch, $options + $defaultOptions);

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        $errno = curl_errno($ch);

        if (PHP_VERSION_ID < 80500) {
            curl_close($ch);
        }

        throw new RuntimeException("cURL Error ({$errno}): {$error}");
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (PHP_VERSION_ID < 80500) {
        curl_close($ch);
    }

    if ($httpCode >= 400) {
        throw new RuntimeException("HTTP request failed with status code {$httpCode}");
    }

    return $response;
}

/**
 * Send a POST request using cURL.
 *
 * @param string     $url         Target URL
 * @param array|null $postData    Data to send in the request body
 * @param array      $options     Additional cURL options
 *
 * @return string
 *
 * @throws RuntimeException
 */
function curlPost(string $url, ?array $postData = null, array $options = []): string
{
    $defaultOptions = [
        CURLOPT_URL            => $url,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => !empty($postData)
            ? http_build_query($postData)
            : '',
        CURLOPT_HEADER         => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_FORBID_REUSE   => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ];

    $ch = curl_init();

    curl_setopt_array($ch, $options + $defaultOptions);

    $response = curl_exec($ch);

    if ($response === false) {
        throw new RuntimeException(
            sprintf(
                'cURL Error (%d): %s',
                curl_errno($ch),
                curl_error($ch)
            )
        );
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode >= 400) {
        throw new RuntimeException(
            "HTTP request failed with status code {$httpCode}"
        );
    }

    return $response;
}


/**
 * Format a timestamp in UTC timezone.
 *
 * @param string $format
 * @param int    $timestamp
 *
 * @return string
 *
 * @throws Exception
 */
function dateUtc(string $format, int $timestamp): string
{
    $dateTime = new DateTime("@{$timestamp}");
    $dateTime->setTimezone(new DateTimeZone('UTC'));

    return $dateTime->format($format);
}


