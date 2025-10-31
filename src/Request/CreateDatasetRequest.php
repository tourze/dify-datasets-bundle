<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 创建空知识库请求
 */
final class CreateDatasetRequest extends ApiRequest
{
    public function __construct(
        private readonly string $name,
        private readonly ?string $description = null,
        private readonly string $indexingTechnique = 'high_quality',
        private readonly string $permission = 'only_me',
        private readonly string $provider = 'vendor',
        private readonly ?string $externalKnowledgeApiId = null,
        private readonly ?string $externalKnowledgeId = null,
        private readonly ?string $embeddingModel = null,
        private readonly ?string $embeddingModelProvider = null,
        /** @var array<string, mixed>|null */
        private readonly ?array $retrievalModel = null,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets';
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
        $body = [
            'name' => $this->name,
            'indexing_technique' => $this->indexingTechnique,
            'permission' => $this->permission,
            'provider' => $this->provider,
        ];

        // 可选参数
        if (null !== $this->description) {
            $body['description'] = $this->description;
        }

        if (null !== $this->externalKnowledgeApiId) {
            $body['external_knowledge_api_id'] = $this->externalKnowledgeApiId;
        }

        if (null !== $this->externalKnowledgeId) {
            $body['external_knowledge_id'] = $this->externalKnowledgeId;
        }

        if (null !== $this->embeddingModel) {
            $body['embedding_model'] = $this->embeddingModel;
        }

        if (null !== $this->embeddingModelProvider) {
            $body['embedding_model_provider'] = $this->embeddingModelProvider;
        }

        if (null !== $this->retrievalModel) {
            $body['retrieval_model'] = $this->retrievalModel;
        }

        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $body,
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getIndexingTechnique(): string
    {
        return $this->indexingTechnique;
    }

    public function getPermission(): string
    {
        return $this->permission;
    }

    public function getProvider(): string
    {
        return $this->provider;
    }

    public function getExternalKnowledgeApiId(): ?string
    {
        return $this->externalKnowledgeApiId;
    }

    public function getExternalKnowledgeId(): ?string
    {
        return $this->externalKnowledgeId;
    }

    public function getEmbeddingModel(): ?string
    {
        return $this->embeddingModel;
    }

    public function getEmbeddingModelProvider(): ?string
    {
        return $this->embeddingModelProvider;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getRetrievalModel(): ?array
    {
        return $this->retrievalModel;
    }
}
