<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\RetrieveDatasetRequest;

/**
 * @internal
 */
#[CoversClass(RetrieveDatasetRequest::class)]
final class RetrieveDatasetRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new RetrieveDatasetRequest('dataset-123', 'test query');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new RetrieveDatasetRequest('dataset-123', 'test query');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new RetrieveDatasetRequest('dataset-123', 'test query');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
        self::assertArrayHasKey('json', $options);
        self::assertIsArray($options['json']);
        self::assertArrayHasKey('query', $options['json']);
        self::assertSame('test query', $options['json']['query']);
    }
}
