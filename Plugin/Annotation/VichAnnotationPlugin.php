<?php declare(strict_types=1);

namespace Drenso\PhanExtensions\Plugin\Annotation;

require_once 'Base/AnnotationPlugin.php';

use Drenso\PhanExtensions\Plugin\Annotation\Base\AnnotationPlugin;
use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;

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

/**
 * Class VichAnnotationVisitor
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class VichAnnotationVisitor extends AnnotationVisitor
{
  /**
   * {@inheritdoc}
   */
  protected $classAnnotationsToCheck = [
      'Vich',
  ];

  /**
   * {@inheritdoc}
   */
  protected $propertyAnnotationsToCheck = [
      'Vich',
  ];
}

// Every plugin needs to return an instance of itself at the
// end of the file in which its defined.
return new VichAnnotationPlugin();
