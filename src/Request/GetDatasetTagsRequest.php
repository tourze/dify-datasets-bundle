<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 获取知识库类型标签请求
 */
final class GetDatasetTagsRequest extends ApiRequest
{
    public function getRequestPath(): string
    {
        return '/datasets/tags';
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
