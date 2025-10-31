<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 更新文档中的块请求
 */
final class UpdateDocumentSegmentRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly string $segmentId,
        /** @var array{content: string, answer?: string, keywords?: array<string>, enabled?: bool, regenerate_child_chunks?: bool} */
        private readonly array $segment,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/segments/' . $this->segmentId;
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
                'segment' => $this->segment,
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

    /**
     * @return array{content: string, answer?: string, keywords?: array<string>, enabled?: bool, regenerate_child_chunks?: bool}
     */
    public function getSegment(): array
    {
        return $this->segment;
    }
}
