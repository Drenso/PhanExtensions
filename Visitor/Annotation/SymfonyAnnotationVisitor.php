<?php

namespace Drenso\PhanExtensions\Visitor\Annotation;

use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;


/**
 * Class SymfonyAnnotationVisitor
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class SymfonyAnnotationVisitor extends AnnotationVisitor
{
  /**
   * {@inheritdoc}
   */
  protected $classAnnotationsToCheck = [
      'Assert',
  ];

  /**
   * {@inheritdoc}
   */
  protected $methodAnnotationsToCheck = [
      'Secure',
      'Template',
  ];

  /**
   * {@inheritdoc}
   */
  protected $propertyAnnotationsToCheck = [
      'Assert',
  ];
}
