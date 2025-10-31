<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 从知识库检索块请求
 */
final class RetrieveDatasetRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $query,
        /** @var array<string, mixed>|null */
        private readonly ?array $retrievalModel = null,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/retrieve';
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
        $body = [
            'query' => $this->query,
        ];

        if (null !== $this->retrievalModel) {
            $body['retrieval_model'] = $this->retrievalModel;
        }

        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $body,
        ];
    }

    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getRetrievalModel(): ?array
    {
        return $this->retrievalModel;
    }
}
