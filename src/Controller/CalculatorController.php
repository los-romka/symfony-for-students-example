<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator", methods={"GET"})
     */
    public function index()
    {
        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }

    /**
     * @Route("/calculator", name="calculator_process", methods={"POST"})
     */
    public function process(Request $request)
    {
        if (!$request->request->has('a') || !$request->request->has('b')) {
            return $this->render('calculator/error.html.twig', [
                'message' => 'нет a или b'
            ]);
        }

        $a = $request->request->getInt('a');
        $b = $request->request->getInt('b');

        $sum = $a + $b;

        return $this->render('calculator/index.html.twig', [
            'sum' => $sum
        ]);
    }
}
