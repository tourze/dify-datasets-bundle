<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 获取可用的嵌入模型请求
 */
final class GetEmbeddingModelsRequest extends ApiRequest
{
    public function getRequestPath(): string
    {
        return '/workspaces/current/models/model-types/text-embedding';
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
        return [];
    }
}
