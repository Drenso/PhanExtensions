<?php

namespace Drenso\PhanExtensions\Helper;

use Phan\CodeBase;
use Phan\Language\Context;
use Phan\Language\FQSEN\FullyQualifiedClassName;
use Phan\PluginV2\PluginAwarePostAnalysisVisitor;
use const ast\flags\USE_NORMAL;

class NamespaceChecker
{

  /**
   * Default php types which need to be skipped
   *
   * @var array
   */
  private static $phpTypes = [
      'array',
      'bool',
      'boolean',
      'double',
      'float',
      'int',
      'null',
      'object',
      'string',
  ];

  /**
   * @param PluginAwarePostAnalysisVisitor $visitor
   * @param CodeBase $codeBase
   * @param Context $context
   * @param string $name
   * @param string $issueType
   * @param string $issueMessageFmt
   */
  public static function checkVisitor(PluginAwarePostAnalysisVisitor $visitor, CodeBase $codeBase, Context $context,
                                      string $name, string $issueType, string $issueMessageFmt)
  {
    if (!self::doCheck($codeBase, $context, $name)) {
      $visitor->emit($issueType, $issueMessageFmt, [$name]);
    }
  }

  /**
   * @param CodeBase $codeBase
   * @param Context $context
   * @param string $name
   * @return bool
   */
  private static function doCheck(CodeBase $codeBase, Context $context, string $name)
  {

    // Filter for false positives
    if ($name === "" || $name === "[]") return true;
    if (in_array($name, self::$phpTypes)) return true;

    try {
      // Check for map to avoid exceptions
      // This only works if the name is actually namespaced by a use statement
      if ($context->hasNamespaceMapFor(USE_NORMAL, $name)) {
        // Add usage of this annotation to the namespace map
        // See https://github.com/phan/phan/pull/1467
        $context->getNamespaceMapFor(USE_NORMAL, $name);
        return true;
      }

      // Check whether the class is known in the current namespace (which does not require an explicit import)
      $fqc = FullyQualifiedClassName::make($context->getNamespace(), $name);
      if ($codeBase->hasClassWithFQSEN($fqc)) {
        return true;
      }
    } catch (\AssertionError $e) {
      // Do nothing, simply ignore
      return true;
    }

    return false;
  }
}
