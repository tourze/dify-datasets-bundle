<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\UpdateDocumentSegmentRequest;

/**
 * @internal
 */
#[CoversClass(UpdateDocumentSegmentRequest::class)]
final class UpdateDocumentSegmentRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new UpdateDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789', ['content' => 'test content']);

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new UpdateDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789', ['content' => 'test content']);

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new UpdateDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789', ['content' => 'test content']);
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
        self::assertArrayHasKey('json', $options);
        self::assertIsArray($options['json']);
        self::assertArrayHasKey('segment', $options['json']);
        self::assertSame(['content' => 'test content'], $options['json']['segment']);
    }
}
