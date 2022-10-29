<?php

namespace App\Service\Serializer;


use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class DTOSerializer implements SerializerInterface
{
	private SerializerInterface $serializer;

	public function __construct()
	{
		// dd("test");

		$this->serializer = new Serializer(
			[new ObjectNormalizer(
				nameConverter: new CamelCaseToSnakeCaseNameConverter()
			)],
			[new JsonEncoder()]
		);
	}

	public function serialize(mixed $data, string $format, array $context = []): string
	{
		return $this->serializer->serialize($data, $format, $context);
	}

	public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
	{
		$dto = $this->serializer->deserialize($data, $type, $format, $context);

		return $dto;
	}
}
