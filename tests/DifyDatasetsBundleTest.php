<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Tourze\DifyDatasetsBundle\DifyDatasetsBundle;
use Tourze\PHPUnitSymfonyKernelTest\AbstractBundleTestCase;

/**
 * @internal
 */
#[CoversClass(DifyDatasetsBundle::class)]
#[RunTestsInSeparateProcesses]
final class DifyDatasetsBundleTest extends AbstractBundleTestCase
{
    // AbstractBundleTestCase provides comprehensive Bundle testing
    // No additional tests needed for this simple Bundle
}
