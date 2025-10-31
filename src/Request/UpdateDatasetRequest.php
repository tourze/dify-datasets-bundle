<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 更新知识库请求
 */
final class UpdateDatasetRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly ?string $name = null,
        private readonly ?string $description = null,
        private readonly ?string $indexingTechnique = null,
        private readonly ?string $permission = null,
        private readonly ?string $embeddingModelProvider = null,
        private readonly ?string $embeddingModel = null,
        /** @var array<string, mixed>|null */
        private readonly ?array $retrievalModel = null,
        /** @var array<string>|null */
        private readonly ?array $partialMemberList = null,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId;
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
        $body = [];

        // 可选参数
        if (null !== $this->name) {
            $body['name'] = $this->name;
        }

        if (null !== $this->description) {
            $body['description'] = $this->description;
        }

        if (null !== $this->indexingTechnique) {
            $body['indexing_technique'] = $this->indexingTechnique;
        }

        if (null !== $this->permission) {
            $body['permission'] = $this->permission;
        }

        if (null !== $this->embeddingModelProvider) {
            $body['embedding_model_provider'] = $this->embeddingModelProvider;
        }

        if (null !== $this->embeddingModel) {
            $body['embedding_model'] = $this->embeddingModel;
        }

        if (null !== $this->retrievalModel) {
            $body['retrieval_model'] = $this->retrievalModel;
        }

        if (null !== $this->partialMemberList) {
            $body['partial_member_list'] = $this->partialMemberList;
        }

        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $body,
        ];
    }

    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getIndexingTechnique(): ?string
    {
        return $this->indexingTechnique;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function getEmbeddingModelProvider(): ?string
    {
        return $this->embeddingModelProvider;
    }

    public function getEmbeddingModel(): ?string
    {
        return $this->embeddingModel;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getRetrievalModel(): ?array
    {
        return $this->retrievalModel;
    }

    /**
     * @return array<string>|null
     */
    public function getPartialMemberList(): ?array
    {
        return $this->partialMemberList;
    }
}
