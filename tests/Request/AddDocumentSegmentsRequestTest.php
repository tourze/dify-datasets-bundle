<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use HttpClientBundle\Tests\Request\RequestTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Tourze\DifyDatasetsBundle\Request\AddDocumentSegmentsRequest;

/**
 * @internal
 */
#[CoversClass(AddDocumentSegmentsRequest::class)]
final class AddDocumentSegmentsRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $segments = [['content' => 'Test content']];
        $request = new AddDocumentSegmentsRequest('dataset-123', 'document-456', $segments);

        self::assertSame('/datasets/dataset-123/documents/document-456/segments', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $segments = [['content' => 'Test content']];
        $request = new AddDocumentSegmentsRequest('dataset-123', 'document-456', $segments);

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestWithBasicSegments(): void
    {
        $segments = [['content' => 'Test content']];
        $request = new AddDocumentSegmentsRequest('dataset-123', 'document-456', $segments);

        self::assertSame('dataset-123', $request->getDatasetId());
        self::assertSame('document-456', $request->getDocumentId());
        self::assertSame($segments, $request->getSegments());
    }

    public function testRequestWithComplexSegments(): void
    {
        $segments = [
            [
                'content' => 'Test content 1',
                'answer' => 'Test answer 1',
                'keywords' => ['keyword1', 'keyword2'],
            ],
            [
                'content' => 'Test content 2',
                'keywords' => ['keyword3'],
            ],
        ];
        $request = new AddDocumentSegmentsRequest('dataset-123', 'document-456', $segments);

        self::assertSame($segments, $request->getSegments());
    }

    public function testRequestOptions(): void
    {
        $segments = [['content' => 'Test content']];
        $request = new AddDocumentSegmentsRequest('dataset-123', 'document-456', $segments);
        $options = $request->getRequestOptions();

        self::assertArrayHasKey('headers', $options);
        self::assertArrayHasKey('json', $options);
        self::assertSame(['Content-Type' => 'application/json'], $options['headers']);
        self::assertSame(['segments' => $segments], $options['json']);
    }
}
