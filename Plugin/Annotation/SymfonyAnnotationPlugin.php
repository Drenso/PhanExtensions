<?php declare(strict_types=1);

namespace Drenso\PhanExtensions\Plugin\Annotation;

require_once __DIR__ . '/Base/AnnotationPlugin.php';

use Drenso\PhanExtensions\Plugin\Annotation\Base\AnnotationPlugin;
use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;

/**
 * Class SymfonyAnnotationPlugin
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class SymfonyAnnotationPlugin extends AnnotationPlugin
{
  /**
   * {@inheritdoc}
   */
  public static function getPostAnalyzeNodeVisitorClassName(): string
  {
    return SymfonyAnnotationVisitor::class;
  }
}

/**
 * Class SymfonyAnnotationVisitor
 *
 * {@inheritdoc}
 *
 * @suppress PhanUnreferencedClass
 *
 * @author BobV
 */
class SymfonyAnnotationVisitor extends AnnotationVisitor
{
  /**
   * {@inheritdoc}
   * @suppress PhanUnreferencedProtectedProperty (unused in base class?)
   * @suppress PhanUnreferencedPublicProperty (This is needed to suppress this in phan 0.12.2)
   */
  protected $exceptions = [
      'Annotation',
      'Target',
      'SuppressWarnings'
  ];
}

// Every plugin needs to return an instance of itself at the
// end of the file in which its defined.
return new SymfonyAnnotationPlugin();
