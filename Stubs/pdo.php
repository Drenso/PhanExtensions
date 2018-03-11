<?php

/**
 * These constants only serve to silence some of phan's false positives.
 * This should not be used anywhere other than in the static analysis.
 */
class PDO
{
  const FETCH_NUM = -1;
  const FETCH_COLUMN = -1;
  const FETCH_UNIQUE = -1;
}
