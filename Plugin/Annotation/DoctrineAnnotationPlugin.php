<?php

namespace Drenso\PhanExtensions\Plugin\Annotation;

require_once 'Base/AnnotationPlugin.php';

use Drenso\PhanExtensions\Plugin\Annotation\Base\AnnotationPlugin;
use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;

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

/**
 * Class DoctrineAnnotationVisitor
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class DoctrineAnnotationVisitor extends AnnotationVisitor
{
  /**
   * {@inheritdoc}
   */
  protected $classAnnotationsToCheck = [
      'ORM',
  ];

  /**
   * {@inheritdoc}
   */
  protected $propertyAnnotationsToCheck = [
      'ORM',
  ];
}

// Every plugin needs to return an instance of itself at the
// end of the file in which its defined.
return new DoctrineAnnotationPlugin();
