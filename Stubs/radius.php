<?php

/**
 * These constants only serve to silence some of phan's false positives.
 * This should not be used anywhere other than in the static analysis.
 */
define('RADIUS_ACCESS_REQUEST', -1);
define('RADIUS_SERVICE_TYPE', -1);
define('RADIUS_FRAMED', -1);
define('RADIUS_FRAMED_PROTOCOL', -1);
define('RADIUS_PPP', -1);
define('RADIUS_USER_NAME', -1);
define('RADIUS_USER_PASSWORD', -1);
define('RADIUS_ACCESS_ACCEPT', 'DEFINED ELSEWHERE');
