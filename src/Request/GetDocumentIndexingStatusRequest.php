<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 获取文档嵌入状态（进度）请求
 */
final class GetDocumentIndexingStatusRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $batch,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->batch . '/indexing-status';
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
        return [];
    }

    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    public function getBatch(): string
    {
        return $this->batch;
    }
}
