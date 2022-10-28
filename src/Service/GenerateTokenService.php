<?php

declare(strict_types=1);

namespace App\Service;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;

class GenerateTokenService
{
    private string $url = "https://dc98dbb.dizycommerce.com.br/index.php";
    private string $path = "/rest/V1/integration/admin/token";
    private string $user = "testefullstack";
    private string $pass = "8cjmbx1r";

    public function getToken(string $user, string $pass): JsonResponse
    {
        $client = HttpClient::create();
        $response = $client ->request(
            'POST',
            $this->url.$this->path,
            [
                'json' => [
                    'username'=> $user,
                    'password'=> $pass
                ],
            ]
        );
        $statusCode = $response->getStatusCode();
        $content = $response->getContent();
        $content= str_replace("\"","",$content);

        return new JsonResponse(['token' => $content], $statusCode);
    }
}