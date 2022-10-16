<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MicroPostRepository $posts): Response
    {
        $post = new MicroPost();
        $post->setTitle('hello');
        $post->setContent('Hello comment ça va');
        $post->setCreatedAt(new DateTimeImmutable());

        $comment = new Comment();
        $comment->setText('Wow');
        //$comment->setMicroPost($post);
        $post->addComment($comment);
        $posts->save($post, true);

        return $this->render('home/index.html.twig');
    }
}
