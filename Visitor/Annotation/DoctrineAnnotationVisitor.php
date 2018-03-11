<?php

namespace Drenso\PhanExtensions\Visitor\Annotation;

use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;

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
