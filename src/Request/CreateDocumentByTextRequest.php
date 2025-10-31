<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 从文本创建文档请求
 */
final class CreateDocumentByTextRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $name,
        private readonly string $text,
        private readonly string $indexingTechnique = 'high_quality',
        private readonly string $docForm = 'text_model',
        private readonly string $docLanguage = 'Chinese',
        /** @var array<string, mixed>|null */
        private readonly ?array $processRule = null,
        /** @var array<string, mixed>|null */
        private readonly ?array $retrievalModel = null,
        private readonly ?string $embeddingModel = null,
        private readonly ?string $embeddingModelProvider = null,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/document/create-by-text';
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
            'text' => $this->text,
            'indexing_technique' => $this->indexingTechnique,
            'doc_form' => $this->docForm,
            'doc_language' => $this->docLanguage,
        ];

        // 可选参数
        if (null !== $this->processRule) {
            $body['process_rule'] = $this->processRule;
        }

        if (null !== $this->retrievalModel) {
            $body['retrieval_model'] = $this->retrievalModel;
        }

        if (null !== $this->embeddingModel) {
            $body['embedding_model'] = $this->embeddingModel;
        }

        if (null !== $this->embeddingModelProvider) {
            $body['embedding_model_provider'] = $this->embeddingModelProvider;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getIndexingTechnique(): string
    {
        return $this->indexingTechnique;
    }

    public function getDocForm(): string
    {
        return $this->docForm;
    }

    public function getDocLanguage(): string
    {
        return $this->docLanguage;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getProcessRule(): ?array
    {
        return $this->processRule;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getRetrievalModel(): ?array
    {
        return $this->retrievalModel;
    }

    public function getEmbeddingModel(): ?string
    {
        return $this->embeddingModel;
    }

    public function getEmbeddingModelProvider(): ?string
    {
        return $this->embeddingModelProvider;
    }
}
