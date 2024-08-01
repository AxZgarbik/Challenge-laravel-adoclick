<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ApiConnector;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;

class ApiConnectorTest extends TestCase
{
    public function testFetchDataReturnsDataOnSuccess()
    {
        // Simular una respuesta exitosa
        $mock = new MockHandler([
            new Response(200, [], json_encode(['data' => 'success'])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $connector = new ApiConnector($client, 'http://example.com');
        $response = $connector->fetchData();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('count', $response);
        $this->assertEquals(1427, $response['count']);
        $this->assertArrayHasKey('entries', $response);
        $this->assertIsArray($response['entries']);
    }

}