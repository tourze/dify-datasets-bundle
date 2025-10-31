<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDatasetBoundTagsRequest;

/**
 * @internal
 */
#[CoversClass(GetDatasetBoundTagsRequest::class)]
final class GetDatasetBoundTagsRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDatasetBoundTagsRequest('dataset-123');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDatasetBoundTagsRequest('dataset-123');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDatasetBoundTagsRequest('dataset-123');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertEmpty($options);
    }
}
