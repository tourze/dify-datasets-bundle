<?php

declare(strict_types=1);

namespace Tourze\DifyDatasetsBundle\Tests\Request;

use PHPUnit\Framework\Attributes\CoversClass;
use HttpClientBundle\Tests\Request\RequestTestCase;
use Tourze\DifyDatasetsBundle\Request\GetEmbeddingModelsRequest;

/**
 * @internal
 */
#[CoversClass(GetEmbeddingModelsRequest::class)]
final class GetEmbeddingModelsRequestTest extends RequestTestCase
{
    public function testRequestHasCorrectPath(): void
    {
        $request = new GetEmbeddingModelsRequest();

        self::assertStringContainsString('/workspaces/current/models', $request->getRequestPath());
    }

    public function testRequestHasCorrectMethod(): void
    {
        $request = new GetEmbeddingModelsRequest();

        self::assertSame('GET', $request->getRequestMethod());
    }

    public function testRequestOptions(): void
    {
        $request = new GetEmbeddingModelsRequest();
        $options = $request->getRequestOptions();

        self::assertIsArray($options);
    }
}
