<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 获取知识库的文档列表请求
 */
final class GetDocumentsRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly ?string $keyword = null,
        private readonly int $page = 1,
        private readonly int $limit = 20,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents';
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

        return [
            'query' => $query,
        ];
    }

    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
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
