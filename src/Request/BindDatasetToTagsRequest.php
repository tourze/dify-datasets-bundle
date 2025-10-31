<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 将数据集绑定到知识库类型标签请求
 */
final class BindDatasetToTagsRequest extends ApiRequest
{
    public function __construct(
        private readonly string $targetId,
        /** @var array<string> */
        private readonly array $tagIds,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/tags/binding';
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
                'target_id' => $this->targetId,
                'tag_ids' => $this->tagIds,
            ],
        ];
    }

    public function getTargetId(): string
    {
        return $this->targetId;
    }

    /**
     * @return array<string>
     */
    public function getTagIds(): array
    {
        return $this->tagIds;
    }
}
