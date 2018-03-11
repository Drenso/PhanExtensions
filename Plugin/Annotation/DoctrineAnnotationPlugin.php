<?php

namespace Drenso\PhanExtensions\Plugin\Annotation;

use Drenso\PhanExtensions\Plugin\Annotation\Base\AnnotationPlugin;
use Drenso\PhanExtensions\Visitor\Annotation\DoctrineAnnotationVisitor;

/**
 * Class DoctrineAnnotationPlugin
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class DoctrineAnnotationPlugin extends AnnotationPlugin
{
  /**
   * {@inheritdoc}
   */
  public static function getPostAnalyzeNodeVisitorClassName(): string
  {
    return DoctrineAnnotationVisitor::class;
  }
}

// Every plugin needs to return an instance of itself at the
// end of the file in which its defined.
return new DoctrineAnnotationPlugin();
