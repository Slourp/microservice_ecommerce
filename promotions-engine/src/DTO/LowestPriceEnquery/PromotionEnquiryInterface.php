<?php

namespace App\DTO\LowestPriceEnquery;

use Serializable;

interface PromotionEnquiryInterface extends Serializable
{
	public function getProduct();

	public function setPromotionId(int $promotionId);

	public function setPromotionName(string $promotionName);
}
