<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\BindDatasetToTagsRequest;

/**
 * @internal
 */
#[CoversClass(BindDatasetToTagsRequest::class)]
final class BindDatasetToTagsRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new BindDatasetToTagsRequest('dataset-123', ['tag1', 'tag2']);

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new BindDatasetToTagsRequest('dataset-123', ['tag1', 'tag2']);

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new BindDatasetToTagsRequest('dataset-123', ['tag1', 'tag2']);
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }

    public function testGetters(): void
    {
        $request = new BindDatasetToTagsRequest('dataset-123', ['tag1', 'tag2']);

        self::assertSame('dataset-123', $request->getTargetId());
        self::assertSame(['tag1', 'tag2'], $request->getTagIds());
    }
}
