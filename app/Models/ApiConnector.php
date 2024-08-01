<?php

namespace App\Models;

use GuzzleHttp\Client;

class ApiConnector
{
    protected $client;
    protected $baseUrl = 'http://web.archive.org/web/20240403172734if_/https://api.publicapis.org/entries';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchData()
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl);

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents(), true);
            } else {
                // Manejo de respuestas con códigos de estado diferentes a 200
                return [
                    'error' => true,
                    'status' => $response->getStatusCode(),
                    'message' => 'La solicitud no fue exitosa.',
                ];
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            // Manejo de excepciones lanzadas por Guzzle
            return [
                'error' => true,
                'message' => 'Error al realizar la solicitud: ' . $e->getMessage(),
            ];
        } catch (\Exception $e) {
            // Manejo de cualquier otra excepción
            return [
                'error' => true,
                'message' => 'Error inesperado: ' . $e->getMessage(),
            ];
        }
    }
}