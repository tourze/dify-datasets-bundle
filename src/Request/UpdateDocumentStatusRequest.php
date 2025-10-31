<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 更新文档状态请求
 */
final class UpdateDocumentStatusRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $action,
        /** @var array<string> */
        private readonly array $documentIds,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/status/' . $this->action;
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
                'document_ids' => $this->documentIds,
            ],
        ];
    }

    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array<string>
     */
    public function getDocumentIds(): array
    {
        return $this->documentIds;
    }
}
