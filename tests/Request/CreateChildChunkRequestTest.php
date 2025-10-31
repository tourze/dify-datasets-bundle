<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\CreateChildChunkRequest;

/**
 * @internal
 */
#[CoversClass(CreateChildChunkRequest::class)]
final class CreateChildChunkRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new CreateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'content');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new CreateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'content');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new CreateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'content');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }

    public function testGetters(): void
    {
        $request = new CreateChildChunkRequest('dataset-123', 'document-456', 'segment-789', 'content');

        self::assertSame('dataset-123', $request->getDatasetId());
        self::assertSame('document-456', $request->getDocumentId());
        self::assertSame('segment-789', $request->getSegmentId());
        self::assertSame('content', $request->getContent());
    }
}
