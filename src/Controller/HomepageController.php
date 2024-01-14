<?php

namespace App\Controller;

use App\Entity\Posts;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;


class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(PersistenceManagerRegistry $doctrine, PaginatorInterface $paginator, Request $request): Response
    {
        $post= $doctrine->getRepository(Posts::class)->findAll();

        $post= $paginator->paginate($post, $request->get('page',1), 2);

        return $this->render('homepage/index.html.twig', [
            'posts'=>$post,
        ]);
    }
}
