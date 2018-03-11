<?php

namespace Drenso\PhanExtensions\Visitor\Annotation;

use Drenso\PhanExtensions\Visitor\Annotation\Base\AnnotationVisitor;

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
  protected $propertyAnnotationsToCheck = [
      'JMS',
  ];
}
