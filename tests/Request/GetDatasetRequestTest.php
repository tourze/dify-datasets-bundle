<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetDatasetRequest;

/**
 * @internal
 */
#[CoversClass(GetDatasetRequest::class)]
final class GetDatasetRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetDatasetRequest('dataset-123');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetDatasetRequest('dataset-123');

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetDatasetRequest('dataset-123');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertEmpty($options);
    }
}
