<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 从文档获取块请求
 */
final class GetDocumentSegmentsRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly ?string $keyword = null,
        private readonly ?string $status = null,
        private readonly int $page = 1,
        private readonly int $limit = 20,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/segments';
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
        $query = [
            'page' => $this->page,
            'limit' => $this->limit,
        ];

        if (null !== $this->keyword) {
            $query['keyword'] = $this->keyword;
        }

        if (null !== $this->status) {
            $query['status'] = $this->status;
        }

        return [
            'query' => $query,
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

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }
}
