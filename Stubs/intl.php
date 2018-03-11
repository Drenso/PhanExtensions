<?php

/**
 * These constants only serve to silence some of phan's false positives.
 * This should not be used anywhere other than in the static analysis.
 */
class IntlDateFormatter {
  const FULL = 0;
  const LONG = 1;
  const MEDIUM = 2;
  const SHORT = 3;
  const NONE = -1;
  const GREGORIAN = 1;
  const TRADITIONAL = 0;

  public static function create($locale, $datetype, $timetype, $timezone = null, $calendar = null, $pattern = null) { }
}
