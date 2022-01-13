<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/product", name="product_")
     */
class ProductController extends AbstractController
{
    /**
     * @Route("", name="all")
     */
    public function all(): Response
    {
        return $this->render('product/all.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
