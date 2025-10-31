<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 向文档添加块请求
 */
final class AddDocumentSegmentsRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        /** @var array<array{content: string, answer?: string, keywords?: array<string>}> */
        private readonly array $segments,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/segments';
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
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'segments' => $this->segments,
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

    /**
     * @return array<array{content: string, answer?: string, keywords?: array<string>}>
     */
    public function getSegments(): array
    {
        return $this->segments;
    }
}
