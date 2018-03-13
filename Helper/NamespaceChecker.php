<?php

namespace Drenso\PhanExtensions\Helper;

use Phan\CodeBase;
use Phan\Language\Context;
use Phan\PluginV2;
use Phan\PluginV2\PluginAwarePostAnalysisVisitor;
use const ast\flags\USE_NORMAL;

class NamespaceChecker
{

  /**
   * @param PluginAwarePostAnalysisVisitor $visitor
   * @param Context $context
   * @param string $name
   * @param string $issueType
   * @param string $issueMessageFmt
   */
  public static function checkVisitor(PluginAwarePostAnalysisVisitor $visitor, Context $context, string $name, string $issueType, string $issueMessageFmt)
  {
    if (!self::doCheck($context, $name)) {
      $visitor->emit($issueType, $issueMessageFmt, [$name]);
    }
  }

  /**
   * @param PluginV2 $plugin
   * @param CodeBase $codeBase
   * @param Context $context
   * @param string $name
   * @param string $issueType
   * @param string $issueMessageFmt
   */
  public static function checkPlugin(PluginV2 $plugin, CodeBase $codeBase, Context $context, string $name, string $issueType, string $issueMessageFmt)
  {
    if (!self::doCheck($context, $name)) {
      $plugin->emitIssue($codeBase, $context, $issueType, $issueMessageFmt, [$name]);
    }
  }

  /**
   * @param Context $context
   * @param string $name
   * @return bool
   */
  private static function doCheck(Context $context, string $name)
  {
    try {
      // Check for map to avoid exceptions
      if ($context->hasNamespaceMapFor(USE_NORMAL, $name)) {
        // Add usage of this annotation to the namespace map
        // See https://github.com/phan/phan/pull/1467
        $context->getNamespaceMapFor(USE_NORMAL, $name);
        return true;
      }
    } catch (\AssertionError $e) {
      // Do nothing, simply ignore
      return true;
    }

    return false;
  }
}
