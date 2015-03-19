<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\AdvertRepository;
use OC\PlatformBundle\Entity\Categorie;
use OC\PlatformBundle\Entity\Commande;
use OC\PlatformBundle\Entity\Compose;
use OC\PlatformBundle\Entity\Demandereappro;
use OC\PlatformBundle\Entity\Ingredient;
use OC\PlatformBundle\Entity\Manager;
use OC\PlatformBundle\Entity\Menu;
use OC\PlatformBundle\Entity\Preparation;
use OC\PlatformBundle\Entity\Produit;
use OC\PlatformBundle\Entity\Restaurant;
use OC\PlatformBundle\Entity\Simple;
use OC\PlatformBundle\Repository\ProduitRepository;
use Doctrine\ORM\EntityRepository;



class AdvertController extends Controller
{

    public function indexAction()
    {
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
    'listAdverts' => array()));
    }

    public function menuAction()
    {

        $menu = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('OCPlatformBundle:Menu');

        $men = $menu->findAll();

        $categorie= $this->getDoctrine()
            ->getManager()
            ->getRepository('OCPlatformBundle:Categorie');

        $cat=$categorie->findAll();


        return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
        'menu'=>$men,
        'cate'=>$cat));
    }


    public function produitAction()
    {
        $produit = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('OCPlatformBundle:Produit');

        $prod = $produit->findAll();

        $categorie= $this->getDoctrine()
                        ->getManager()
                        ->getRepository('OCPlatformBundle:Categorie');

        $cat=$categorie->findAll();

        return $this->render('OCPlatformBundle:Advert:produit.html.twig',
            array('produits'=> $prod,
            'cate'=>$cat));
    }

    public function hamburgerAction(){
        $produit = $this->getDoctrine()
            ->getManager()
            ->getRepository('OCPlatformBundle:Produit');

        $prod = $produit->findAll();

        return $this->render('OCPlatformBundle:Advert:hamburger.html.twig',
            array('produits'=> $prod));
    }

    public function dessertAction(){
        $prod = $this->get('doctrine')
            ->getRepository('OCPlatformBundle:Produit')
            ->findAll();

        return $this->render('OCPlatformBundle:Advert:dessert.html.twig',
            array('produits'=> $prod));
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

    public function ajouterAction($id){
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');
        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
        }else{
            if ($this->getRequest()->query->get('qte') != null)
                $panier[$id] =$this->getRequest()->query->get('qte');
            else
                $panier[$id] = 1;
        }
        $session->set('panier',$panier);

    return $this->redirect($this->generateUrl('oc_platform_panier'));

    }

    public function panierAction(){

        $session = $this->getRequest()->getSession();
        //$session->remove('panier');
        //die();
        if (!$session->has('panier')) $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('OCPlatformBundle:Produit')->findArray(array_keys($session->get('panier')));
        //var_dump($session->get('panier'));
        //die();
        return $this->render('OCPlatformBundle:Advert:panier.html.twig', array('produits'=>$produits,
                                                                                'panier' => $session->get('panier')));
    }

    public function supprimerAction($id){

        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');

        if(array_key_exists($id, $panier)){
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('oc_platform_panier'));
    }

    public function paiementAction(){

        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');

        /*for ($i=1; $i<=40;$i++){
            if(array_key_exists($i, $panier)){
                $article= new Commande();
                $article-> addIdproduit($i);

                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
            }

        }*/


        foreach($panier as $article){
           //var_dump($session->get('panier'));
            //die();
            $article= new Commande();
            $id=$article.getIdproduit();
            $article-> addidproduit($id);

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return new Response("ça marche");
        }



    }


/*public function panierAction(){

        $comm = $this->getDoctrine()
            ->getManager()
            ->getRepository('OCPlatformBundle:Commande');

        $com = $comm->findAll();

        return $this->render('OCPlatformBundle:Advert:panier.html.twig',
            array('commande'=> $com));
    }*/

    /**
     * @Route("/", name="cart")

    public function panierAction()
    {
        // get the cart from  the session
        $session = $this->getRequest()->getSession();
        // $cart = $session->set('cart', '');
        $cart = $session->get('cart', array());

        // $cart = array_keys($cart);
        // print_r($cart); die;

        // fetch the information using query and ids in the cart
        if( $cart != '' ) {

            $em = $this->getDoctrine()->getEntityManager();
            foreach( $cart as $id => $quantity ) {
                $product[] = $em->getRepository('OCPlatformBundle:Produit')->findById($id);
    }

            if( !isset( $product ) )
            {
                return $this->render('OCPlatformBundle:Advert:panier.html.twig', array(
                    'empty' => true,
                ));
            }



            return $this->render('OCPlatformBundle:Advert:panier.html.twig',     array(
                'product' => $product,
            ));
        } else {
            return $this->render('OCPlatformBundle:Advert:panier.html.twig',     array(
                'empty' => true,
            ));
        }
    }


    /**
     * @Route("/add/{id}", name="cart_add")
     */
    /*public function addAction($id)
    {
        // fetch the cart
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('OCPlatformBundle:Produit')->find($id);
        //print_r($product->getId()); die;
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart', array());


        // check if the $id already exists in it.
        if ( $product == NULL ) {
            $this->get('session')->setFlash('notice', 'This product is not     available in Stores');
            return $this->redirect($this->generateUrl('cart'));
        } else {
            if( isset($cart[$id]) ) {

                $qtyAvailable = $product->getQuantity();

                if( $qtyAvailable >= $cart[$id + 1] ) {
                    $cart[$id] = $cart[$id] + 1;
                } else {
                    $this->get('session')->setFlash('notice', 'Quantity     exceeds the available stock');
                    return $this->redirect($this->generateUrl('cart'));
                }
            } else {
                // if it doesnt make it 1
                $cart = $session->get('cart', array());
                $cart[$id] = 1;
            }

            $session->set('cart', $cart);
            return $this->redirect($this->generateUrl('cart'));

        }
    }*/


    /**
     * @Route("/remove/{id}", name="cart_remove")
     */
   /*public function removeAction($id)
    {
        // check the cart
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart', array());

        // if it doesn't exist redirect to cart index page. end
        if(!$cart) { $this->redirect( $this->generateUrl('cart') ); }

        // check if the $id already exists in it.
        if( isset($cart[$id]) ) {
            // if it does ++ the quantity
            $cart[$id]= '0';
            unset($cart[$id]);
            //echo $cart[$id]['quantity']; die();
        } else {
            $this->get('session')->setFlash('notice', 'Go to hell');
            return $this->redirect( $this->generateUrl('cart') );
        }

        $session->set('cart', $cart);

        // redirect(index page)
        $this->get('session')->setFlash('notice', 'This product is Remove');
        return $this->redirect( $this->generateUrl('cart') );
    }*/

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
