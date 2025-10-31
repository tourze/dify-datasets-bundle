<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDocumentSegmentRequest;

/**
 * @internal
 */
#[CoversClass(GetDocumentSegmentRequest::class)]
final class GetDocumentSegmentRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDocumentSegmentRequest('dataset-123', 'document-456', 'segment-789');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
    }
}
