<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\CreateDatasetTagRequest;

/**
 * @internal
 */
#[CoversClass(CreateDatasetTagRequest::class)]
final class CreateDatasetTagRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new CreateDatasetTagRequest('Test Tag');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new CreateDatasetTagRequest('Test Tag');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new CreateDatasetTagRequest('Test Tag');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }

    public function testGetters(): void
    {
        $request = new CreateDatasetTagRequest('Test Tag');

        self::assertSame('Test Tag', $request->getName());
    }
}
