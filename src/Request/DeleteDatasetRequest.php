<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 删除知识库请求
 */
final class DeleteDatasetRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId;
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
}
