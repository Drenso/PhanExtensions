<?php declare(strict_types=1);

namespace Drenso\PhanExtensions\Plugin\Annotation\Base;

require_once __DIR__ . '/AnnotationVisitor.php';

use Phan\PluginV3;
use Phan\PluginV3\PostAnalyzeNodeCapability;

/**
 * Class AnnotationPlugin
 *
 * The plugin class defines which visitor is used for PostAnalysis
 *
 * @author BobV
 */
abstract class AnnotationPlugin extends PluginV3 implements PostAnalyzeNodeCapability
{
}
