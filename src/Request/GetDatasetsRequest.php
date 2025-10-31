<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 获取知识库列表请求
 */
final class GetDatasetsRequest extends ApiRequest
{
    public function __construct(
        private readonly ?string $keyword = null,
        /** @var array<string>|null */
        private readonly ?array $tagIds = null,
        private readonly int $page = 1,
        private readonly int $limit = 20,
        private readonly bool $includeAll = false,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets';
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
            'include_all' => $this->includeAll,
        ];

        if (null !== $this->keyword) {
            $query['keyword'] = $this->keyword;
        }

        if (null !== $this->tagIds && [] !== $this->tagIds) {
            $query['tag_ids'] = implode(',', $this->tagIds);
        }

        return [
            'query' => $query,
        ];
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    /**
     * @return array<string>|null
     */
    public function getTagIds(): ?array
    {
        return $this->tagIds;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function isIncludeAll(): bool
    {
        return $this->includeAll;
    }
}
