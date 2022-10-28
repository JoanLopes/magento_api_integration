<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\GenerateTokenService;
use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminTokenController extends AbstractController
{
    #[Route('/admin/token', name: 'app_admin_token')]
    public function index(Request $request): Response
    {
        $arrayReq = $request->toArray();
        $generateToken = new GenerateTokenService();
        return $generateToken->getToken($arrayReq['username'], $arrayReq['password']);
    }

}
