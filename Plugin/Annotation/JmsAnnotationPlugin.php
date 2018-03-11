<?php declare(strict_types=1);

namespace Drenso\PhanExtensions\Plugin\Annotation;

require_once 'Base/AnnotationPlugin.php';

use Drenso\PhanExtensions\Plugin\Annotation\Base\AnnotationPlugin;
use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;

/**
 * Class JmsAnnotationPlugin
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class JmsAnnotationPlugin extends AnnotationPlugin
{
  /**
   * {@inheritdoc}
   */
  public static function getPostAnalyzeNodeVisitorClassName(): string
  {
    return JmsAnnotationVisitor::class;
  }
}

/**
 * Class JmsAnnotationVisitor
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class JmsAnnotationVisitor extends AnnotationVisitor
{
  /**
   * {@inheritdoc}
   */
  protected $classAnnotationsToCheck = [
      'JMS',
  ];

  /**
   * {@inheritdoc}
   */
  protected $methodAnnotationsToCheck = [
      'Secure',
  ];

  /**
   * {@inheritdoc}
   */
  protected $propertyAnnotationsToCheck = [
      'JMS',
  ];
}

// Every plugin needs to return an instance of itself at the
// end of the file in which its defined.
return new JmsAnnotationPlugin();
