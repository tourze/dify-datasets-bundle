<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDocumentRequest;

/**
 * @internal
 */
#[CoversClass(GetDocumentRequest::class)]
final class GetDocumentRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDocumentRequest('dataset-123', 'document-456');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDocumentRequest('dataset-123', 'document-456');

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDocumentRequest('dataset-123', 'document-456');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('query', $options);
        self::assertIsArray($options['query']);
        self::assertArrayHasKey('metadata', $options['query']);
        self::assertSame('all', $options['query']['metadata']);
    }
}
