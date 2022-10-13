<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquery\LowestPriceEnquiry;
use App\Service\Serializer\DTOSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Serializer\SerializerInterface;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'products.lowestPrice', methods: 'POST')]
    public function lowestPrice(Request $request, int $id, DTOSerializer $serializer): Response
    {
        if ($request->headers->has('Force-Fail')) {
            $ERROR_CODE = $request->headers->get('Force-Fail');
            return new JsonResponse(
                ['error' => 'Promotions Engine failure message'],
                $ERROR_CODE

            );
        }

        /**
         * @var LowestPriceEnquiry $lowestPriceEnquiry
         */
        $lowestPriceEnquiry = $serializer->deserialize(
            $request->getContent(),
            LowestPriceEnquiry::class,
            'json'
        );


        $lowestPriceEnquiry
            ->setDiscountedPrice(50)
            ->setPrice(50)
            ->setPromotionId(3)
            ->setPromotionName('Black Friday half price sale');

        $response = $serializer->serialize($lowestPriceEnquiry, 'json');

        return new Response($response, 200);
    }
}
