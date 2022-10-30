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

    public function getOrder(string $bearerToken, $direction, $field): JsonResponse
    {

        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            $this->url . $this->path,
            [
                'auth_bearer' => $bearerToken,
                'query' => $this->getQuery($direction, $field)
            ],
        );
        $statusCode = $response->getStatusCode();

        $content = $response->toArray();

        return new JsonResponse($content, $statusCode);
    }

    private function getQuery($direction, $field)
    {
        $query = [
            'searchCriteria[filterGroups][0][filters][0][field]' => 'customer_email',
            'searchCriteria[filterGroups][0][filters][0][value]' => '',
            'searchCriteria[filterGroups][0][filters][0][conditionType]' => 'neq',
        ];
        if($direction != '' && $field != ''){
            $query['searchCriteria[sortOrders][0][direction]']= $direction;
            $query['searchCriteria[sortOrders][0][field]']= $field;
        }
        return $query;
    }
}