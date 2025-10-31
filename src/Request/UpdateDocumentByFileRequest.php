<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 用文件更新文档请求
 */
final class UpdateDocumentByFileRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly string $data,
        private readonly string $filePath,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/update-by-file';
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

    /**
     * @return array<string, mixed>
     */
    public function getRequestOptions(): array
    {
        return [
            'multipart' => [
                [
                    'name' => 'data',
                    'contents' => $this->data,
                ],
                [
                    'name' => 'file',
                    'contents' => fopen($this->filePath, 'r'),
                    'filename' => basename($this->filePath),
                ],
            ],
        ];
    }

    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}
