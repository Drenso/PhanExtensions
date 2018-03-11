<?php

/**
 * These constants only serve to silence some of phan's false positives.
 * This should not be used anywhere other than in the static analysis.
 */
define('AF_INET', -1);
define('SOCK_STREAM', -1);
define('SOL_TCP', -1);
define('SOL_SOCKET', -1);
define('SO_RCVTIMEO', -1);
define('MSG_EOF', -1);
