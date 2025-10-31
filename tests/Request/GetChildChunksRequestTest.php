<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetChildChunksRequest;

/**
 * @internal
 */
#[CoversClass(GetChildChunksRequest::class)]
final class GetChildChunksRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetChildChunksRequest('dataset-123', 'document-456', 'segment-789');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetChildChunksRequest('dataset-123', 'document-456', 'segment-789');

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetChildChunksRequest('dataset-123', 'document-456', 'segment-789');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('query', $options);
        self::assertIsArray($options['query']);
        self::assertArrayHasKey('page', $options['query']);
        self::assertArrayHasKey('limit', $options['query']);
        self::assertSame(1, $options['query']['page']);
        self::assertSame(20, $options['query']['limit']);
    }
}
