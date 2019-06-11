<?php

namespace Drenso\PhanExtensions\Helper;

use Phan\CodeBase;
use Phan\Language\Context;
use Phan\Language\FQSEN\FullyQualifiedClassName;
use Phan\Language\Type;
use Phan\Language\Type\GenericArrayType;
use Phan\Language\Type\TemplateType;
use Phan\Language\UnionType;
use Phan\PluginV3;
use Phan\PluginV3\PluginAwarePostAnalysisVisitor;

class NamespaceChecker
{
  /**
   * @param PluginAwarePostAnalysisVisitor $visitor
   * @param CodeBase $codeBase
   * @param Context $context
   * @param string $unionTypeString
   * @param string $issueType
   * @param string $issueMessageFmt
   */
  public static function checkVisitor(PluginAwarePostAnalysisVisitor $visitor, CodeBase $codeBase, Context $context,
                                      string $unionTypeString, string $issueType, string $issueMessageFmt)
  {
    foreach (self::getMissingClasses($codeBase, $context, $unionTypeString) as $typeFQSEN) {
      $visitor->emit($issueType, $issueMessageFmt, [(string)$typeFQSEN]);
    }
  }

  /**
   * @param PluginV3 $plugin
   * @param CodeBase $codeBase
   * @param Context $context
   * @param string $unionTypeString
   * @param string $issueType
   * @param string $issueMessageFmt
   */
  public static function checkPlugin(PluginV3 $plugin, CodeBase $codeBase, Context $context,
                                     string $unionTypeString, string $issueType, string $issueMessageFmt)
  {
    foreach (self::getMissingClasses($codeBase, $context, $unionTypeString) as $typeFQSEN) {
      $plugin->emitIssue($codeBase, $context, $issueType, $issueMessageFmt, [(string)$typeFQSEN]);
    }
  }

  // yields a list of 0 or more types which are missing. Those may or may not have leading '\'es.
  private static function getMissingClasses(CodeBase $code_base, Context $context, string $unionTypeString) : \Generator {
    if (!$unionTypeString) {
      return;
    }
    // Filter for false positives
    // TODO: Use parameterFromCommentLine instead, which invokes UnionType::fromStringInContext for us.

    // This passed the regex, so fromStringInContext shouldn't throw
    $unionType = UnionType::fromStringInContext($unionTypeString, $context, Type::FROM_PHPDOC);

    // This check is based on \Phan\Analysis\ParameterTypesAnalyzer
    foreach ($unionType->getTypeSet() as $type) {
      // TODO: Handle ArrayShapeType
      while ($type instanceof GenericArrayType) {
        $type = $type->genericArrayElementType();
      }
      if ($type->isNativeType() ||($type->isSelfType() | $type->isStaticType())) {
        continue;
      }
      if ($type instanceof TemplateType) {
        // should be impossible, $context is a class declaration's context, not inside a method.
        continue;
      }
      // Should always be a class name
      $type_fqsen = $type->asFQSEN();
      if ($type_fqsen instanceof FullyQualifiedClassName && !$code_base->hasClassWithFQSEN($type_fqsen)) {
        yield $type_fqsen;
      }
    }
  }
}
