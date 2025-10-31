<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\CreateDocumentByFileRequest;

/**
 * @internal
 */
#[CoversClass(CreateDocumentByFileRequest::class)]
final class CreateDocumentByFileRequestTest extends RequestTestCase
{
    private string $tempFile;

    protected function setUp(): void
    {
        // Create a temporary file for testing
        $this->tempFile = tempnam(sys_get_temp_dir(), 'test');
        file_put_contents($this->tempFile, 'test content');
    }

    protected function tearDown(): void
    {
        // Clean up temporary file
        if (file_exists($this->tempFile)) {
            unlink($this->tempFile);
        }
    }

    public function testRequestHasCorrectPath(): void
    {
        $request = new CreateDocumentByFileRequest('dataset-123', 'test data', $this->tempFile);

        self::assertSame('/datasets/dataset-123/document/create-by-file', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new CreateDocumentByFileRequest('dataset-123', 'test data', $this->tempFile);

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new CreateDocumentByFileRequest('dataset-123', 'test data', $this->tempFile);
        $options = $request->getRequestOptions();

        self::assertArrayHasKey('multipart', $options);
        self::assertIsArray($options['multipart']);
        self::assertCount(2, $options['multipart']);
    }

    public function testGetters(): void
    {
        $request = new CreateDocumentByFileRequest('dataset-123', 'test data', $this->tempFile);

        self::assertSame('dataset-123', $request->getDatasetId());
        self::assertSame('test data', $request->getData());
        self::assertSame($this->tempFile, $request->getFilePath());
    }
}
