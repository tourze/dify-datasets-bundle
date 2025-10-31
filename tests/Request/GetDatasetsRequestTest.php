<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDatasetsRequest;

/**
 * @internal
 */
#[CoversClass(GetDatasetsRequest::class)]
final class GetDatasetsRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDatasetsRequest('dataset-123');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDatasetsRequest('dataset-123');

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDatasetsRequest('dataset-123');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('query', $options);
        self::assertIsArray($options['query']);
        self::assertArrayHasKey('page', $options['query']);
        self::assertArrayHasKey('limit', $options['query']);
        self::assertArrayHasKey('include_all', $options['query']);
        self::assertArrayHasKey('keyword', $options['query']);
        self::assertSame('dataset-123', $options['query']['keyword']);
    }
}
