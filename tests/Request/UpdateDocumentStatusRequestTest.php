<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\UpdateDocumentStatusRequest;

/**
 * @internal
 */
#[CoversClass(UpdateDocumentStatusRequest::class)]
final class UpdateDocumentStatusRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new UpdateDocumentStatusRequest('dataset-123', 'enable', ['doc-456', 'doc-789']);

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new UpdateDocumentStatusRequest('dataset-123', 'enable', ['doc-456', 'doc-789']);

        self::assertSame('PATCH', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new UpdateDocumentStatusRequest('dataset-123', 'enable', ['doc-456', 'doc-789']);
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
        self::assertArrayHasKey('json', $options);
        self::assertIsArray($options['json']);
        self::assertArrayHasKey('document_ids', $options['json']);
        self::assertSame(['doc-456', 'doc-789'], $options['json']['document_ids']);
    }
}
