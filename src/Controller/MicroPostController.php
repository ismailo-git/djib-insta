<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Form\MicroPostType;
use App\Repository\MicroPostRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'micro_post')]
    public function index(MicroPostRepository $posts): Response
    {

        return $this->render('micro_post/index.html.twig', [

            'posts' => $posts->findAll()
        ]);
    }

    #[Route('/micro-post/{post}', name: 'micro_post_show')]
    public function show(MicroPost $post): Response
    {

        return $this->render('micro_post/show.html.twig', [

            'post' => $post
        ]);
    }

    #[Route('/micro-post/add', name: 'micro_post_add', priority: 2)]
    public function add(Request $request, MicroPostRepository $posts): Response
    {
        $microPost = new MicroPost();
        $form = $this->createForm(MicroPostType::class, $microPost);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();
            $post->setCreatedAt(new DateTimeImmutable());
            $posts->save($post, true);

            //Add Flash
            $this->addFlash('success', 'Your microPost has been added');

            //Redirect to the home page
            return $this->redirectToRoute('micro_post');
        }

        return $this->render('micro_post/add.html.twig', [

            'form' => $form->createView()
        ]);
    }

    #[Route('/micro-post/{post}/edit', name: 'micro_post_edit')]
    public function edit(MicroPost $post, Request $request, MicroPostRepository $posts): Response
    {

        $form = $this->createForm(MicroPostType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post = $form->getData();
            $posts->save($post, true);

            //Add Flash
            $this->addFlash('success', 'Your microPost has been updated');

            //Redirect to the home page
            return $this->redirectToRoute('micro_post');
        }

        return $this->render('micro_post/edit.html.twig', [

            'form' => $form->createView()
        ]);
    }
}
