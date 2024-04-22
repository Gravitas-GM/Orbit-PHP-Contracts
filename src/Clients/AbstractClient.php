<?php

	namespace Gravitas\Orbit\Contracts\Clients;

	use Symfony\Component\Serializer\SerializerInterface;
	use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
	use Symfony\Contracts\HttpClient\HttpClientInterface;
	use Symfony\Contracts\HttpClient\ResponseInterface;

	abstract class AbstractClient {
		protected const METHOD_GET = 'GET';

		public function __construct(
			protected HttpClientInterface $client,
			protected SerializerInterface $serializer,
			protected string $responseFormat = 'json',
		) {}

		/**
		 * @template T of object
		 *
		 * @param class-string<T>   $class
		 * @param ResponseInterface $response
		 *
		 * @return T
		 * @throws ExceptionInterface {@see ResponseInterface::getContent()}
		 */
		protected function deserialize(string $class, ResponseInterface $response): mixed {
			return $this->serializer->deserialize($response->getContent(), $class, $this->responseFormat);
		}

		/**
		 * @template T of object
		 *
		 * @param class-string<T>   $innerClass
		 * @param ResponseInterface $response
		 *
		 * @return T[]
		 * @throws ExceptionInterface {@see ResponseInterface::getContent()}
		 */
		protected function deserializeArray(string $innerClass, ResponseInterface $response): mixed {
			return $this->serializer->deserialize($response->getContent(), $innerClass . '[]', $this->responseFormat);
		}

		protected function buildOptions(?ProjectionInterface $projection = null, ?QueryInterface $query = null): array {
			$options = ['query' => []];

			if ($projection)
				$options['query']['p'] = json_encode($projection->build());

			if ($query)
				$options['query']['q'] = json_encode($query->getQuery());

			return $options;
		}
	}
