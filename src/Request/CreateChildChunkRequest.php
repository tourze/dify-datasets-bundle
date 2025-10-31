<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 创建子块请求
 */
final class CreateChildChunkRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly string $segmentId,
        private readonly string $content,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/segments/' . $this->segmentId . '/child_chunks';
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
                'content' => $this->content,
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

    public function getSegmentId(): string
    {
        return $this->segmentId;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
