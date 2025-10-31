<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 获取文档详情请求
 */
final class GetDocumentRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly string $metadata = 'all',
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId;
    }

    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * @return array<string, mixed>
     */
    public function getRequestOptions(): array
    {
        return [
            'query' => [
                'metadata' => $this->metadata,
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

    public function getMetadata(): string
    {
        return $this->metadata;
    }
}
