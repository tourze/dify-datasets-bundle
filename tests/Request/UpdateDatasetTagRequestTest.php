<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\UpdateDatasetTagRequest;

/**
 * @internal
 */
#[CoversClass(UpdateDatasetTagRequest::class)]
final class UpdateDatasetTagRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new UpdateDatasetTagRequest('tag-123', 'New Tag Name');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new UpdateDatasetTagRequest('tag-123', 'New Tag Name');

        self::assertSame('PATCH', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new UpdateDatasetTagRequest('tag-123', 'New Tag Name');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }
}
