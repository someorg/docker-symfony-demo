<?php

namespace MyNameSpace\MyBundle\Controller; 

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MyNameSpace\MyBundle\Entity\CMS;

class DefaultController extends Controller
{

    /**
     * @Route("/set_cms" , name="set_cms")
     */
    public function set_cms(Request $request)
    {

        $cms = $this->getDoctrine()->getRepository('MyNameSpaceMyBundle:CMS')->findAll()[0];

        $form = $this->createFormBuilder($cms)
           ->add('heading', 'text')
           ->add('image', 'text')
           ->add('link', 'text')
           ->add('save', 'submit', array('label' => 'Set CMS'))
           ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $em->persist($cms);
         $em->flush();
         $this->get('session')->getFlashBag()->add('mybundle-notice', 'Page updated.');
         return $this->redirect($this->generateUrl('get_cms'));
         return new Response("blah");
        }
     
        $build['form'] = $form->createView();
        return $this->render('MyNameSpaceMyBundle:Default:cms_edit.html.twig', $build );
    }

    /**
     * @Route("/get_cms" , name="get_cms")
     */
    public function get_cmsAction()
    {
        $cms = $this->getDoctrine()->getRepository('MyNameSpaceMyBundle:CMS')->findAll();
        
  	$build['cms'] = $cms[0]; 
        return $this->render('MyNameSpaceMyBundle:Default:cms_view.html.twig', $build );
    }
}
