<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 从文件创建文档请求
 */
final class CreateDocumentByFileRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $data,
        private readonly string $filePath,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/document/create-by-file';
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

    public function getData(): string
    {
        return $this->data;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}
