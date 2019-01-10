<?php

namespace AppBundle\Controller;

use AppBundle\Product;
use AppBundle\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                dump($product);
                exit;
            }

            print_r("\nNum errors: ".count($form->getErrors(true)));
            print_r("\nIs valid: ".($form->isValid() ? 'Yes' : 'No'));
            foreach ($form->getErrors(true) as $idx => $error) {
                print_r("\nError $idx: ".$error->getMessage());
            }
            exit;
        }

        return new Response('Form not submitted.');
    }
}
