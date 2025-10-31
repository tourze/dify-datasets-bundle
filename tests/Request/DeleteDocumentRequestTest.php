<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\DeleteDocumentRequest;

/**
 * @internal
 */
#[CoversClass(DeleteDocumentRequest::class)]
final class DeleteDocumentRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new DeleteDocumentRequest('dataset-123', 'document-456');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new DeleteDocumentRequest('dataset-123', 'document-456');

        self::assertSame('DELETE', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new DeleteDocumentRequest('dataset-123', 'document-456');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertEmpty($options);
    }

    public function testGetters(): void
    {
        $request = new DeleteDocumentRequest('dataset-123', 'document-456');

        self::assertSame('dataset-123', $request->getDatasetId());
        self::assertSame('document-456', $request->getDocumentId());
    }
}
