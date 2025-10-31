<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDocumentIndexingStatusRequest;

/**
 * @internal
 */
#[CoversClass(GetDocumentIndexingStatusRequest::class)]
final class GetDocumentIndexingStatusRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDocumentIndexingStatusRequest('dataset-123', 'batch-456');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDocumentIndexingStatusRequest('dataset-123', 'batch-456');

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDocumentIndexingStatusRequest('dataset-123', 'batch-456');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
    }
}
