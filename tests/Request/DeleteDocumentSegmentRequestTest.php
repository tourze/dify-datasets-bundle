<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\DeleteDocumentSegmentRequest;

/**
 * @internal
 */
#[CoversClass(DeleteDocumentSegmentRequest::class)]
final class DeleteDocumentSegmentRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new DeleteDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new DeleteDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');

        self::assertSame('DELETE', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new DeleteDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertEmpty($options);
    }

    public function testGetters(): void
    {
        $request = new DeleteDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');

        self::assertSame('dataset-123', $request->getDatasetId());
        self::assertSame('document-456', $request->getDocumentId());
        self::assertSame('segment-789', $request->getSegmentId());
    }
}
