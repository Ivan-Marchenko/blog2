<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsController extends AbstractController
{

    #[Route('/contact-us', name: 'contactus',methods:['POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        $successMessage = null;

        if($form->isSubmitted() && $form->isValid()){
            /** @var  $contactForm */
            $contactForm = $form->getData();

            //TODO: send email
            $successMessage = 'Message was successfully sent!';

        }

        return $this->renderForm('widget/contact_us.twig', [
            'form'=>$form,
            'successMessage'=>$successMessage,
        ]);
    }
}
