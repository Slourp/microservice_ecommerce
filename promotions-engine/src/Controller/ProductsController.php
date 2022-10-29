<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use App\Filter\PromotionFilterInterface;
use App\Service\Serializer\DTOSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'products.lowestPrice', methods: 'GET')]
    public function lowestPrice(
        Request $request,
        int $id,
        DTOSerializer $serializer,
        PromotionFilterInterface $promotionFilter
    ): Response {
        if ($request->headers->has('Force-Fail')) {
            $ERROR_CODE = $request->headers->get('Force-Fail');
            return new JsonResponse(
                ['error' => 'Promotions Engine failure message'],
                $ERROR_CODE

            );
        }

        /**
         * @var LowestPriceEnquiry
         */
        $lowestPriceEnquiry = $serializer->deserialize(
            $request->getContent(),
            LowestPriceEnquiry::class,
            'json'
        );



        $modifiedPriceEnquiry = $promotionFilter->apply($lowestPriceEnquiry);

        // $lowestPriceEnquiry
        //     ->setproductId($id)
        //     ->setDiscountedPrice(50)
        //     ->setPrice(100)
        //     ->setPromotionId(3)
        //     ->setPromotionName('Black Friday Half sale');

        $responseContent = $serializer->serialize($modifiedPriceEnquiry, 'json');


        return new Response($responseContent, 200);
    }
}
