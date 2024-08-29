<?php
	namespace Gravitas\Orbit\Contracts\Clients\Points;

	use Gravitas\Orbit\Contracts\Clients\AbstractClient;
	use Symfony\Component\Serializer\SerializerInterface;
	use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
	use Symfony\Contracts\HttpClient\HttpClientInterface;

	class PointsClient extends AbstractClient {
		public function __construct(
			HttpClientInterface $orbitPointsClient,
			SerializerInterface $serializer,
			string $responseFormat = 'json',
		) {
			parent::__construct($orbitPointsClient, $serializer, $responseFormat);
		}

		/**
		 * Claims points from a source for the given user, returning `true` if the points were claimed.
		 *
		 * @param int    $userId
		 * @param string $pointSourceId
		 *
		 * @return bool
		 * @throws ExceptionInterface {@see static::deserialize()}
		 */
		public function claimForUser(int $userId, string $pointSourceId): bool {
			$response = $this->client->request(
				static::METHOD_PUT,
				sprintf('/points/%d/claim/%s', $userId, $pointSourceId),
			);

			return $response->getStatusCode() === 204;
		}
	}
