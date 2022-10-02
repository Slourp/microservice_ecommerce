<?php

namespace App\DTO\LowestPriceEnquery;

use App\DTO\LowestPriceEnquery\LowestPriceEnqueryInterface;

class LowestPriceEnquiry implements LowestPriceEnqueryInterface

{

	private ?int $productId;

	private ?int $quantity = 1;

	private ?string $requestLocation;

	private ?string $voucherCode;

	private ?string $requestDate;

	private ?int $price;

	private ?int $discountedPrice;

	private ?int $promotionId;

	private ?string $promotionName;

	// /**
	//  * @return Product|null
	//  */
	// public function getProduct()
	// {
	// 	return $this->product;
	// }

	// /**
	//  * @param Product|null $product
	//  */
	// public function setProduct($product): self
	// {
	// 	$this->product = $product;
	// 	return $this;
	// }

	/**
	 * @return int|null
	 */
	public function getQuantity(): ?int
	{
		return $this->quantity;
	}

	/**
	 * @param int|null $quantity
	 */
	public function setQuantity(?int $quantity): self
	{
		$this->quantity = $quantity;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getRequestLocation(): ?string
	{
		return $this->requestLocation;
	}

	/**
	 * @param string|null $requestLocation
	 */
	public function setRequestLocation(?string $requestLocation): self
	{
		$this->requestLocation = $requestLocation;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getVoucherCode(): ?string
	{
		return $this->voucherCode;
	}

	/**
	 * @param string|null $voucherCode
	 */
	public function setVoucherCode(?string $voucherCode): self
	{
		$this->voucherCode = $voucherCode;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getRequestDate(): ?string
	{
		return $this->requestDate;
	}

	/**
	 * @param string|null $requestDate
	 */
	public function setRequestDate(?string $requestDate): self
	{
		$this->requestDate = $requestDate;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getPrice(): ?int
	{
		return $this->price;
	}

	/**
	 * @param int|null $price
	 */
	public function setPrice(?int $price): self
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getDiscountedPrice(): ?int
	{
		return $this->discountedPrice;
	}

	/**
	 * @param int|null $discountedPrice
	 */
	public function setDiscountedPrice(?int $discountedPrice): self
	{
		$this->discountedPrice = $discountedPrice;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getPromotionId(): ?int
	{
		return $this->promotionId;
	}

	/**
	 * @param int|null $promotionId
	 */
	public function setPromotionId(?int $promotionId): self
	{
		$this->promotionId = $promotionId;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPromotionName(): ?string
	{
		return $this->promotionName;
	}

	/**
	 * @param string|null $promotionName
	 */
	public function setPromotionName(?string $promotionName): self
	{
		$this->promotionName = $promotionName;
		return $this;
	}

	public function serialize()
	{
		return get_object_vars($this);
	}

	public function unserialize($data)
	{
		return get_object_vars($this);
	}
}
