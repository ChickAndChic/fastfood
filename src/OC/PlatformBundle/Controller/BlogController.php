<?php

// src/OC/PlatformBundle/Controller/BlogController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction()
    {
        $content = $this
        ->get('templating')
        ->render('OCPlatformBundle:Advert:index.html.twig', array('nom'=>'Byebye !'));
        return new Response($content);
    }
}

?>
