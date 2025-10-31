<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\DependencyInjection;

use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tourze\DifyDatasetsBundle\DependencyInjection\DifyDatasetsExtension;
use Tourze\PHPUnitSymfonyUnitTest\AbstractDependencyInjectionExtensionTestCase;
use Tourze\SymfonyDependencyServiceLoader\AutoExtension;

/**
 * @internal
 */
#[CoversClass(DifyDatasetsExtension::class)]
final class DifyDatasetsExtensionTest extends AbstractDependencyInjectionExtensionTestCase
{
    private DifyDatasetsExtension $extension;

    private ContainerBuilder $container;

    protected function setUp(): void
    {
        parent::setUp();

        $this->extension = new DifyDatasetsExtension();
        $this->container = new ContainerBuilder();

        // Set required parameters for AutoExtension
        $this->container->setParameter('kernel.environment', 'test');
        $this->container->setParameter('kernel.debug', true);
        $this->container->setParameter('kernel.cache_dir', sys_get_temp_dir());
        $this->container->setParameter('kernel.logs_dir', sys_get_temp_dir());
        $this->container->setParameter('kernel.project_dir', __DIR__ . '/../../');
    }

    public function testLoadWithEmptyConfigs(): void
    {
        $this->extension->load([], $this->container);

        $this->assertGreaterThan(0, count($this->container->getDefinitions()));
    }

    public function testLoadWithNonEmptyConfigs(): void
    {
        $configs = [
            ['some_config' => 'value'],
        ];

        $this->extension->load($configs, $this->container);

        $this->assertGreaterThan(0, count($this->container->getDefinitions()));
    }

    public function testLoadSetsCorrectAutowiring(): void
    {
        $this->extension->load([], $this->container);

        $definitions = $this->container->getDefinitions();

        // Check that autowiring is enabled for bundle services
        foreach ($definitions as $id => $definition) {
            if (str_starts_with($id, 'Tourze\DifyDatasetsBundle\\')) {
                $this->assertTrue($definition->isAutowired(), "Service {$id} should be autowired");
            }
        }
    }

    public function testLoadSetsCorrectAutoconfiguration(): void
    {
        $this->extension->load([], $this->container);

        $definitions = $this->container->getDefinitions();

        // Check that autoconfiguration is enabled for bundle services
        foreach ($definitions as $id => $definition) {
            if (str_starts_with($id, 'Tourze\DifyDatasetsBundle\\')) {
                $this->assertTrue($definition->isAutoconfigured(), "Service {$id} should be autoconfigured");
            }
        }
    }

    public function testLoadMultipleCalls(): void
    {
        $this->extension->load([], $this->container);
        $firstCount = count($this->container->getDefinitions());

        // Loading again should not duplicate services
        $this->extension->load([], $this->container);
        $secondCount = count($this->container->getDefinitions());

        $this->assertEquals($firstCount, $secondCount);
    }

    public function testExtensionInheritsFromCorrectClass(): void
    {
        $this->assertInstanceOf(
            AutoExtension::class,
            $this->extension
        );
    }

    public function testLoadDoesNotThrowException(): void
    {
        $this->expectNotToPerformAssertions();

        $this->extension->load([], $this->container);
        $this->extension->load([['key' => 'value']], $this->container);
        $this->extension->load([[], ['another' => 'config']], $this->container);
    }

    public function testGetConfigDir(): void
    {
        $reflection = new \ReflectionClass($this->extension);
        $method = $reflection->getMethod('getConfigDir');
        $method->setAccessible(true);

        $configDir = $method->invoke($this->extension);

        $this->assertIsString($configDir);
        $this->assertStringEndsWith('/Resources/config', $configDir);
    }
}
