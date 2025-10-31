<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\CreateDocumentByTextRequest;

/**
 * @internal
 */
#[CoversClass(CreateDocumentByTextRequest::class)]
final class CreateDocumentByTextRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new CreateDocumentByTextRequest('dataset-123', 'Test Document', 'Test content');

        self::assertStringContainsString('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new CreateDocumentByTextRequest('dataset-123', 'Test Document', 'Test content');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new CreateDocumentByTextRequest('dataset-123', 'Test Document', 'Test content');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertIsArray($options['headers']);
        self::assertArrayHasKey('Content-Type', $options['headers']);
        self::assertSame('application/json', $options['headers']['Content-Type']);
    }

    public function testGetters(): void
    {
        $request = new CreateDocumentByTextRequest('dataset-123', 'Test Document', 'Test content');

        self::assertSame('dataset-123', $request->getDatasetId());
        self::assertSame('Test Document', $request->getName());
        self::assertSame('Test content', $request->getText());
    }
}
