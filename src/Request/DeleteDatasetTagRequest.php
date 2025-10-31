<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 删除知识库类型标签请求
 */
final class DeleteDatasetTagRequest extends ApiRequest
{
    public function __construct(
        private readonly string $tagId,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/tags';
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
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tag_id' => $this->tagId,
            ],
        ];
    }

    public function getTagId(): string
    {
        return $this->tagId;
    }
}
