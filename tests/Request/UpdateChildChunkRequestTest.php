<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\UpdateChildChunkRequest;

/**
 * @internal
 */
#[CoversClass(UpdateChildChunkRequest::class)]
final class UpdateChildChunkRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new UpdateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'chunk-abc', 'Test content');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new UpdateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'chunk-abc', 'Test content');

        self::assertSame('PATCH', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new UpdateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'chunk-abc', 'Test content');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }
}
