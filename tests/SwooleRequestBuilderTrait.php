<?php

namespace Imefisto\PsrSwoole\Testing;

use OpenSwoole\Http\Request as SwooleRequest;

trait SwooleRequestBuilderTrait
{
    private function buildSwooleRequest(
        $uri,
        $method = 'get',
        $postBody = null
    ) {
        $swooleRequest = new MockedRequest;
        $swooleRequest->server = [
            'request_method' => $method,
            'request_uri' => $uri,
            'server_protocol' => 'HTTP/1.1',
        ];
        $swooleRequest->header = [
            'host' => 'localhost:9501'
        ];
        $swooleRequest->post = $postBody;

        return $swooleRequest;
    }

    private function mockRawContent($swooleRequest)
    {
        if (empty($swooleRequest->post)) {
            return false;
        }

        return http_build_query($swooleRequest->post);
    }
}
