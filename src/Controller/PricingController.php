<?php

namespace App\Controller;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanFeature;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class PricingController extends AbstractController
{
    #[Route('/pricing', name: 'app_pricing')]
    public function index(PersistenceManagerRegistry $doctrine): Response
    {
        return $this->render('pricing/index.html.twig', [
            'pricing_plans'=>$doctrine->getRepository(PricingPlan::class)->findAll(),
            'features'=>$doctrine->getRepository(PricingPlanFeature::class)->findAll(),
        ]);
    }
}
