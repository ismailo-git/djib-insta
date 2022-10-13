<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
	private array $messages = [

		['message' => 'Hello', 'created' => '2022/10/13'],
		['message' => 'Hi', 'created' => '2022/08/13'],
		['message' => 'Bye!', 'created' => '2021/05/13']
	];

	#[Route('/{limit<\d+>?3}', name: "app_home")]
	public function index(int $limit): Response
	{
		return $this->render('hello/index.html.twig', [

			'messages' => $this->messages,
			'limit' => $limit
		]);
	}

	#[Route('/messages/{id<\d+>}', name: 'app_show')]
	public function showOne(int $id): Response
	{
		return $this->render('hello/show.html.twig', [
			'message' => $this->messages[$id]
		]);
	}
}
