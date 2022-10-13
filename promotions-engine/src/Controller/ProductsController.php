<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'products.lowestPrice', methods: 'GET')]
    public function lowestPrice(Request $request, int $id, SerializerInterface $serializer): Response
    {
        if ($request->headers->has('Force-Fail')) {
            $ERROR_CODE = $request->headers->get('Force-Fail');
            return new JsonResponse(
                ['error' => 'Promotions Engine failure message'],
                $ERROR_CODE

            );
        }
        // dd($serializer);
        $lowestPriceEnquiry = $serializer->deserialize(
            $request->getContent(),
            LowestPriceEnquiry::class,
            'json'
        );
        dd($lowestPriceEnquiry);

        return $this->json([
            'quantity' => 5,
            'request_location' => "UK",
            'voucher_code' => 'OU812',
            'request_date' => '2022-04-04',
            'product_id' => $id,
            'discounted_price' => 50,
            'promotion_id' => 3,
            'promotion_name' => 'Black Friday half price sale',
        ]);
    }
}
