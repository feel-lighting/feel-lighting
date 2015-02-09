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

                $user = $this->get('security.context')->getToken()->getUser();

                $this->displaySuccess('views.app.contact.success');
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                $tmp = $form->getData();
                $data = array(
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                    'text' => $tmp['text']
                );

                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact FEEL')
                    ->setFrom('feellighting.fr@gmail.com')
                    //->setFrom('zimzim62000@gmail.com')
                    ->setTo('dregnier.feel@orange.fr')
                    //->setTo('zimzim62000@gmail.com')
                    ->setBcc('zimzim62000@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'AppBundle:App:email.txt.twig',
                            $data
                        )
                    );
                $this->get('mailer')->send($message);

                return $this->redirect(
                    $this->generateUrl('app_contact')
                );
            }
        }

        return $this->render(
            'AppBundle:App:contact.html.twig',
            array('form' => $form->createView())
        );
    }

}