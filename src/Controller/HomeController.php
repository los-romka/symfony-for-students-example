<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/my_home", name="home")
     */
    public function index(UserRepository $userRepository, PostRepository $postRepository)
    {
        $users = $userRepository->findAll();
        $posts = $postRepository->findAll();

        return $this->render('home/index.html.twig', [
            'users' => $users,
            'posts' => $posts
        ]);
    }
}
