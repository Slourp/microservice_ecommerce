<?php

namespace App\DTO;

use App\Filter\PromotionFilterInterface;

class LowestPriceFilter implements PromotionFilterInterface
{
	public function apply(PromotionEnquiryInterface $enquiry): PromotionEnquiryInterface
	{
		$enquiry
			// ->setproductId($id)
			->setDiscountedPrice(50)
			->setPrice(100)
			->setPromotionId(3)
			->setPromotionName('Black Friday Half sale');

		return $enquiry;
	}
}
