<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{





    public function indexAction()
    {
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
    'listAdverts' => array()));
    }

    public function menuAction()
    {
    return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
    'listAdverts' => array()));
    }


    public function produitAction()
    {
        return $this->render('OCPlatformBundle:Advert:produit.html.twig', array(
            'listAdverts' => array()));
    }

    public function blogAction($page)
    {
        return $this->render('OCPlatformBundle:Advert:blog.html.twig', array(
            'listAdverts' => array()));
    }

    public function contactAction()
    {
        return $this->render('OCPlatformBundle:Advert:contact.html.twig');
    }

 /*   public function viewAction($id)
    {
        return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id));
    }





    public function addAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 5)));
        }
        return $this->render('OCPlatformBundle:Advert:edit.html.twig');
    }





    public function deleteAction($id)
    {
        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
    }





    public function menuAction()
    {
         $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développpeur Symfony2'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );
        return $this->render('OCPlatformBundle:Advert:menu.html.twig', array
        ('listAdverts' => $listAdverts ));
    }





    public function indexAction($page)
    {
    $listAdverts = array(
        array(
            'title' => 'Recherche développpeur Symfony2',
            'id'    => 1,
            'author' => 'Alexandre'
            'content' => 'Nous recherchons un développpeur Symfony2 débutant sur Lyon.'
            'date' => new \Datetime()),
        array(
            'title' => 'Mission de webmaster',
            'id'    => 2,
            'author' => 'Hugo'
            'content' => 'Nous recherchons un webmaster capable de maintenir un site internet'
            'date' => new \Datetime()),
        array(
            'title' => 'Offre de stage webdesigner',
            'id'    => 3,
            'author' => 'Mathieu'
            'content' => 'Nous proposon un poste de webdesigner.'
            'date' => new \Datetime())
        );
        return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }*/
}

?>
