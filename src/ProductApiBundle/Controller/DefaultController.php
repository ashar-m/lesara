<?php

namespace ProductApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use ProductApiBundle\Entity\Product;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/")
     */
    /*public function indexAction()
    {
        return $this->render('ProductApiBundle:Default:index.html.twig');
    }*/

    public function showAction()
    {
        $restresult = $this->getDoctrine()->getRepository('ProductApiBundle:Product')->findAll();
        if ($restresult === null) {
            return new View("No Product Exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

    public function getAction()
    {
        $restresult = $this->getDoctrine()->getRepository('ProductApiBundle:Product')->findAll();
        if ($restresult === null) {
            return new View("No Product Exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

    public function saveAction(Request $request)
    {
        print_r($request->getContent());
        $parametersAsArray = [];
        if ($content = $request->getContent()) {
            $parametersAsArray = json_decode($content, true);
        }

        $productObj = new Product();
        $productSku = $parametersAsArray['sku'];
        $productName = $parametersAsArray['name'];
        $productPrice = $parametersAsArray['price']['value'];
        $productCurrency = $parametersAsArray['price']['currency'];
        if(empty($productSku) || empty($productName))
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $productObj->setProductSku($productSku);
        $productObj->setProductDetail($productName);
        $productObj->setProductPrice($productPrice);
        $productObj->setProductCurrency($productCurrency);
        $em = $this->getDoctrine()->getManager();
        $em->persist($productObj);
        $em->flush();
        return new View("Product Informatin Added successfully", Response::HTTP_OK);
    }

    public function convertAction()
    {
        $endpoint = 'latest';
        $access_key = '67697904779ebbfbc86e21cf4b8790a4';

        $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);

        $exchangeRates = json_decode($json, true);
        print_r($exchangeRates);die;

        echo $exchangeRates['rates']['CNY'];
    }
}
