<?php declare(strict_types=1);

namespace Drenso\PhanExtensions\Plugin\Annotation\Base;

require_once __DIR__ . '/AnnotationVisitor.php';

use Phan\PluginV2;
use Phan\PluginV2\PostAnalyzeNodeCapability;

/**
 * Class AnnotationPlugin
 *
 * The plugin class defines which visitor is used for PostAnalysis
 *
 * @author BobV
 */
abstract class AnnotationPlugin extends PluginV2 implements PostAnalyzeNodeCapability
{
}
