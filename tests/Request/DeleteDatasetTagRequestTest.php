<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\DeleteDatasetTagRequest;

/**
 * @internal
 */
#[CoversClass(DeleteDatasetTagRequest::class)]
final class DeleteDatasetTagRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new DeleteDatasetTagRequest('tag-123');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new DeleteDatasetTagRequest('tag-123');

        self::assertSame('DELETE', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new DeleteDatasetTagRequest('tag-123');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }

    public function testGetters(): void
    {
        $request = new DeleteDatasetTagRequest('tag-123');

        self::assertSame('tag-123', $request->getTagId());
    }
}
