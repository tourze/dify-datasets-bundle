<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\CreateDatasetRequest;

/**
 * @internal
 */
#[CoversClass(CreateDatasetRequest::class)]
final class CreateDatasetRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new CreateDatasetRequest('Test Dataset');

        self::assertSame('/datasets', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new CreateDatasetRequest('Test Dataset');

        self::assertSame('POST', $request->getRequestMethod());
    }

    public function testRequestWithMinimalParameters(): void
    {
        $request = new CreateDatasetRequest('Test Dataset');

        self::assertSame('Test Dataset', $request->getName());
        self::assertNull($request->getDescription());
        self::assertSame('high_quality', $request->getIndexingTechnique());
        self::assertSame('only_me', $request->getPermission());
        self::assertSame('vendor', $request->getProvider());
    }

    public function testRequestWithAllParameters(): void
    {
        $request = new CreateDatasetRequest(
            name: 'Test Dataset',
            description: 'Test Description',
            indexingTechnique: 'economy',
            permission: 'all_team_members',
            provider: 'custom',
            externalKnowledgeApiId: 'api-123',
            externalKnowledgeId: 'knowledge-456',
            embeddingModel: 'text-embedding-ada-002',
            embeddingModelProvider: 'openai',
            retrievalModel: ['key' => 'value']
        );

        self::assertSame('Test Dataset', $request->getName());
        self::assertSame('Test Description', $request->getDescription());
        self::assertSame('economy', $request->getIndexingTechnique());
        self::assertSame('all_team_members', $request->getPermission());
        self::assertSame('custom', $request->getProvider());
        self::assertSame('api-123', $request->getExternalKnowledgeApiId());
        self::assertSame('knowledge-456', $request->getExternalKnowledgeId());
        self::assertSame('text-embedding-ada-002', $request->getEmbeddingModel());
        self::assertSame('openai', $request->getEmbeddingModelProvider());
        self::assertSame(['key' => 'value'], $request->getRetrievalModel());
    }

    public function testRequestOptionsWithMinimalParameters(): void
    {
        $request = new CreateDatasetRequest('Test Dataset');
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
        self::assertArrayHasKey('headers', $options);
        self::assertArrayHasKey('json', $options);
        self::assertSame(['Content-Type' => 'application/json'], $options['headers']);

        $expectedJson = [
            'name' => 'Test Dataset',
            'indexing_technique' => 'high_quality',
            'permission' => 'only_me',
            'provider' => 'vendor',
        ];

        self::assertSame($expectedJson, $options['json']);
    }

    public function testRequestOptionsWithOptionalParameters(): void
    {
        $request = new CreateDatasetRequest(
            name: 'Test Dataset',
            description: 'Test Description',
            embeddingModel: 'text-embedding-ada-002'
        );

        $options = $request->getRequestOptions();
        self::assertIsArray($options);
        self::assertArrayHasKey('json', $options);
        $json = $options['json'];

        self::assertIsArray($json);
        self::assertArrayHasKey('description', $json);
        self::assertArrayHasKey('embedding_model', $json);
        self::assertSame('Test Description', $json['description']);
        self::assertSame('text-embedding-ada-002', $json['embedding_model']);
    }
}
