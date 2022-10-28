<?php

declare(strict_types=1);

namespace App\Service;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OrderService
{
    private string $url = "https://dc98dbb.dizycommerce.com.br/index.php";
    private string $path = "/rest/V1/orders/";

    public function getToken(string $bearerToken): JsonResponse
    {
        $client = HttpClient::create();
        $response = $client ->request(
            'GET',
            $this->url.$this->path,
            [
                'auth_bearer' => $bearerToken,
                'query' => [
                    'searchCriteria[filterGroups][0][filters][0][field]' => 'customer_email',
                    'searchCriteria[filterGroups][0][filters][0][value]' => '',
                    'searchCriteria[filterGroups][0][filters][0][conditionType]' => 'neq'
                ],
            ],
        );
        $statusCode = $response->getStatusCode();

        $content = $response->toArray();

        return new JsonResponse($content,$statusCode);
    }
}