<?php

namespace Drenso\PhanExtensions\Visitor\Annotation;

/**
 * Class VichAnnotationVisitor
 *
 * {@inheritdoc}
 *
 * @author BobV
 */
class VichAnnotationVisitor
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
