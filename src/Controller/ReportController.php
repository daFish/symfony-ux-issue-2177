<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

#[AsController]
#[Route('/report')]
final class ReportController
{
    public function __construct(private Environment $environment)
    {
    }

    public function __invoke(): Response
    {
        return new Response($this->environment->render('report/index.html.twig'));
    }
}
