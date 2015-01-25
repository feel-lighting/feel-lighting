<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as MainController;


/**
 * Category controller.
 *
 */
class AppController extends MainController
{

    /**
     * About page
     */
    public function aboutAction()
    {

        return $this->render(
            'AppBundle:App:about.html.twig');
    }



    /**
     * Mention page
     */
    public function mentionAction()
    {

        return $this->render(
            'AppBundle:App:mention.html.twig');
    }



    /**
     * Terms & Conditions page
     */
    public function termsAndConditionsAction()
    {

        return $this->render(
            'AppBundle:App:termsandconditions.html.twig');
    }
}