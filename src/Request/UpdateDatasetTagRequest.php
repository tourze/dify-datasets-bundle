<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 修改知识库类型标签名称请求
 */
final class UpdateDatasetTagRequest extends ApiRequest
{
    public function __construct(
        private readonly string $tagId,
        private readonly string $name,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/tags';
    }

    public function getRequestMethod(): string
    {
        return 'PATCH';
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
                'name' => $this->name,
            ],
        ];
    }

    public function getTagId(): string
    {
        return $this->tagId;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
