<?php

namespace AppBundle\Controller;

use ZIMZIM\ToolsBundle\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;


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
            'AppBundle:App:about.html.twig'
        );
    }


    /**
     * Mention page
     */
    public function mentionAction()
    {

        return $this->render(
            'AppBundle:App:mention.html.twig'
        );
    }


    /**
     * Terms & Conditions page
     */
    public function termsAndConditionsAction()
    {

        return $this->render(
            'AppBundle:App:termsandconditions.html.twig'
        );
    }


    /**
     * Terms & Conditions page
     */
    public function contactAction(Request $request)
    {

        $form = $this->createForm(
            'appbundle_contacttype',
            null,
            array(
                'action' => $this->generateUrl('app_contact'),
                'method' => 'POST',
            )
        );

        if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $this->displaySuccess('views.app.contact.success');
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirect(
                    $this->generateUrl('app_contact')
                );
            }
        }

        return $this->render(
            'AppBundle:App:contact.html.twig', array('form' => $form->createView())
        );
    }

}