<?php

namespace Task\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction() 
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('TaskBlogBundle:Post')->findAll();

        if(!$posts) {
            throw $this->createNotFoundException('Posts not found.');
        }
        
        return $this->render(
            'TaskBlogBundle:Page:index.html.twig',
            array("posts" => $posts)
        );
    }
    
    
    public function loginAction()
    {
        return $this->render('TaskBlogBundle:Page:login.html.twig');
    }
}
