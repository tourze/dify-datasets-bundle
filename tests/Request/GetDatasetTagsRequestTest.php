<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDatasetTagsRequest;

/**
 * @internal
 */
#[CoversClass(GetDatasetTagsRequest::class)]
final class GetDatasetTagsRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDatasetTagsRequest();

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDatasetTagsRequest();

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDatasetTagsRequest();
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertEmpty($options);
    }
}
