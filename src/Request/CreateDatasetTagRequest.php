<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 创建新的知识库类型标签请求
 */
final class CreateDatasetTagRequest extends ApiRequest
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/tags';
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
                'name' => $this->name,
            ],
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
