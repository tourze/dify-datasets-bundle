<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\UpdateDocumentByTextRequest;

/**
 * @internal
 */
#[CoversClass(UpdateDocumentByTextRequest::class)]
final class UpdateDocumentByTextRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new UpdateDocumentByTextRequest('dataset-123', 'document-456');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new UpdateDocumentByTextRequest('dataset-123', 'document-456');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new UpdateDocumentByTextRequest('dataset-123', 'document-456');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }
}
