<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 删除文档中的块请求
 */
final class DeleteDocumentSegmentRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly string $segmentId,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/segments/' . $this->segmentId;
    }

    public function getRequestMethod(): string
    {
        return 'DELETE';
    }

    /**
     * @return array<string, mixed>
     */
    public function getRequestOptions(): array
    {
        return [];
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
}
