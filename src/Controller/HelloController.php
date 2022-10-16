<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{


	#[Route('/{limit<\d+>?3}', name: "app_home")]
	public function index(): Response
	{
		return $this->render('hello/index.html.twig');
	}

	#[Route('/messages/{id<\d+>}', name: 'app_show')]
	public function showOne(int $id): Response
	{
		return $this->render('hello/show.html.twig', [
			'message' => $this->messages[$id]
		]);
	}
}
