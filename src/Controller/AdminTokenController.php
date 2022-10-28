<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\GenerateTokenService;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\Routing\Annotation\Route;

class AdminTokenController extends AbstractController
{
    #[Route('/admin/token', name: 'app_admin_token')]
    public function index(Request $request): Response
    {
        $arrayReq = $request->toArray();
        $session = new Session(new NativeSessionStorage(), new AttributeBag());
        $generateToken = new GenerateTokenService();
        $arr = $generateToken->getToken($arrayReq['username'], $arrayReq['password']);
        $session->set('token', $arr[0]);

        return new JsonResponse("{$arrayReq['username']}", $arr[1]);
    }
}
