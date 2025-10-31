<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 解绑数据集和知识库类型标签请求
 */
final class UnbindDatasetFromTagRequest extends ApiRequest
{
    public function __construct(
        private readonly string $targetId,
        private readonly string $tagId,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/tags/unbinding';
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
                'tag_id' => $this->tagId,
            ],
        ];
    }

    public function getTargetId(): string
    {
        return $this->targetId;
    }

    public function getTagId(): string
    {
        return $this->tagId;
    }
}
