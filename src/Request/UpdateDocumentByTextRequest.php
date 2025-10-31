<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Request;

use HttpClientBundle\Request\ApiRequest;

/**
 * 用文本更新文档请求
 */
final class UpdateDocumentByTextRequest extends ApiRequest
{
    public function __construct(
        private readonly string $datasetId,
        private readonly string $documentId,
        private readonly ?string $name = null,
        private readonly ?string $text = null,
        /** @var array<string, mixed>|null */
        private readonly ?array $processRule = null,
    ) {
    }

    public function getRequestPath(): string
    {
        return '/datasets/' . $this->datasetId . '/documents/' . $this->documentId . '/update-by-text';
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
        $body = [];

        if (null !== $this->name) {
            $body['name'] = $this->name;
        }

        if (null !== $this->text) {
            $body['text'] = $this->text;
        }

        if (null !== $this->processRule) {
            $body['process_rule'] = $this->processRule;
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

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getProcessRule(): ?array
    {
        return $this->processRule;
    }
}
