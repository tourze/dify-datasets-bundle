<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\UpdateDocumentByFileRequest;

/**
 * @internal
 */
#[CoversClass(UpdateDocumentByFileRequest::class)]
final class UpdateDocumentByFileRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new UpdateDocumentByFileRequest('dataset-123', 'document-456', '{"test": "data"}', __FILE__);

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new UpdateDocumentByFileRequest('dataset-123', 'document-456', '{"test": "data"}', __FILE__);

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new UpdateDocumentByFileRequest('dataset-123', 'document-456', '{"test": "data"}', __FILE__);
        $options = $request->getRequestOptions();

        self::assertArrayHasKey('multipart', $options);
        self::assertIsArray($options['multipart']);
    }
}
