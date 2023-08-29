<?php

namespace App\Controller;

use App\Helpers\MarkdownHelper;
use App\Repository\PostRepository;
use cebe\markdown\Markdown;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'post')]
    public function index(PostRepository $repository,MarkdownHelper $helper): Response

    {
        $posts =$repository->findAll();
        $parsePosts = $helper->parse($posts);



        return $this->render('post/index.html.twig', [
            'posts' => $parsePosts
        ]);
    }
}
