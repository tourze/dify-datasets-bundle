<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\DeleteDatasetRequest;

/**
 * @internal
 */
#[CoversClass(DeleteDatasetRequest::class)]
final class DeleteDatasetRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new DeleteDatasetRequest('dataset-123');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new DeleteDatasetRequest('dataset-123');

        self::assertSame('DELETE', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new DeleteDatasetRequest('dataset-123');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertEmpty($options);
    }

    public function testGetters(): void
    {
        $request = new DeleteDatasetRequest('dataset-123');

        self::assertSame('dataset-123', $request->getDatasetId());
    }
}
