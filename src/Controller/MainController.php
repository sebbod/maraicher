<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="main_")
 */
class MainController extends AbstractController
{
    /**
     * @Route("",name="home")
     * @return void
     */
    public function home():Response{
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/phpinfo",name="phpinfo")
     * @return void
     */
    public function phpinfo(){
        echo phpinfo();
        die();
    }




}