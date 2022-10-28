<?php

declare(strict_types=1);

namespace App\Service;
use Symfony\Component\HttpClient\HttpClient;

class GenerateTokenService
{
    private string $url = "https://dc98dbb.dizycommerce.com.br/index.php";
    private string $path = "/rest/V1/integration/admin/token";

    public function getToken(string $user, string $pass): array
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

        return [$content, $statusCode];
    }
}