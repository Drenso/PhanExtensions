<?php

/**
 * These constants only serve to silence some of phan's false positives.
 * This should not be used anywhere other than in the static analysis.
 */
define('CURLOPT_URL', -1);
define('CURLOPT_POST', -1);
define('CURLOPT_HTTPHEADER', -1);
define('CURLOPT_RETURNTRANSFER', -1);
define('CURLOPT_SSL_VERIFYPEER', -1);
define('CURLOPT_POSTFIELDS', -1);
define('CURLOPT_HEADER', -1);
define('CURLOPT_CUSTOMREQUEST', -1);
define('CURLOPT_FOLLOWLOCATION', -1);
define('CURLOPT_SSL_VERIFYHOST', -1);
define('CURLOPT_TIMEOUT', -1);
define('CURLOPT_COOKIEJAR', -1);
define('CURLOPT_COOKIEFILE', -1);
define('CURLOPT_COOKIESESSION', -1);
define('CURLOPT_USERAGENT', -1);
define('CURLOPT_USERPWD', -1);
