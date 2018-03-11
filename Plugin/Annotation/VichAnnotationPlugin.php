<?php declare(strict_types=1);

namespace Drenso\PhanExtensions\Plugin\Annotation;

use Drenso\PhanExtensions\Plugin\Annotation\Base\AnnotationPlugin;
use Drenso\PhanExtensions\Visitor\Annotation\VichAnnotationVisitor;

/**
 * Class VichAnnotationPlugin
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class VichAnnotationPlugin extends AnnotationPlugin
{
  /**
   * {@inheritdoc}
   */
  public static function getPostAnalyzeNodeVisitorClassName(): string
  {
    return VichAnnotationVisitor::class;
  }
}

// Every plugin needs to return an instance of itself at the
// end of the file in which its defined.
return new VichAnnotationPlugin();
