<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
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

        $entity = new Contact();

        $form = $this->createForm(
            'appbundle_contacttype',
            $entity,
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
                $em->persist($entity);
                $em->flush();

                $data = array(
                    'username' => $entity->getName(),
                    'email' => $entity->getEmail(),
                    'text' => $entity->getText()
                );

                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact FEEL')
                    ->setFrom('feellighting.fr@gmail.com')
                    ->setTo('dregnier.feel@orange.fr')
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


    /**
     * Galerie Page
     */
    public function galeryAction()
    {

        return $this->render(
            'AppBundle:App:galery.html.twig'
        );
    }

    /**
     * Tools Conversion Page
     */
    public function toolsConversionAction()
    {

        return $this->render(
            'AppBundle:App:toolsconversion.html.twig'
        );
    }

    /**
     * Tools Faisceau Page
     */
    public function toolsFaisceauAction()
    {

        return $this->render(
            'AppBundle:App:toolsfaisceau.html.twig'
        );
    }

    /**
     * Tools Bilan Page
     */
    public function toolsBilanAction()
    {

        return $this->render(
            'AppBundle:App:toolsbilan.html.twig'
        );
    }

}