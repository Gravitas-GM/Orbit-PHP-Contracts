<?php
	namespace Gravitas\Orbit\Contracts\Clients\Hub;

	use Gravitas\Orbit\Contracts\Clients\AbstractClient;
	use Gravitas\Orbit\Contracts\Clients\Hub\Models\HubAccount;
	use Gravitas\Orbit\Contracts\Clients\Hub\Models\HubUser;
	use Gravitas\Orbit\Contracts\Clients\ProjectionInterface;
	use Gravitas\Orbit\Contracts\Clients\QueryInterface;
	use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;

	class HubClient extends AbstractClient {
		/**
		 * @param ProjectionInterface|null $projection
		 * @param QueryInterface|null      $query
		 *
		 * @return HubUser[]
		 * @throws ExceptionInterface {@see static::deserializeArray()}
		 */
		public function users(ProjectionInterface $projection = null, QueryInterface $query = null): array {
			$response = $this->client->request(static::METHOD_GET, '/users', $this->buildOptions($projection, $query));
			return $this->deserializeArray(HubUser::class, $response);
		}

		/**
		 * @param int                      $id
		 * @param ProjectionInterface|null $projection
		 *
		 * @return HubUser|null
		 * @throws ExceptionInterface {@see static::deserialize()}
		 */
		public function user(int $id, ProjectionInterface $projection = null): ?HubUser {
			$response = $this->client->request(static::METHOD_GET, '/users/' . $id, $this->buildOptions($projection));

			if ($response->getStatusCode() === 404)
				return null;

			return $this->deserialize(HubUser::class, $response);
		}

		/**
		 * @param ProjectionInterface|null $projection
		 * @param QueryInterface|null      $query
		 *
		 * @return HubAccount[]
		 * @throws ExceptionInterface {@see static::deserializeArray()}
		 */
		public function accounts(ProjectionInterface $projection = null, QueryInterface $query = null): array {
			$response = $this->client->request(
				static::METHOD_GET,
				'/accounts',
				$this->buildOptions($projection, $query),
			);

			return $this->deserializeArray(HubAccount::class, $response);
		}

		/**
		 * @param int                      $id
		 * @param ProjectionInterface|null $projection
		 *
		 * @return HubAccount|null
		 * @throws ExceptionInterface {@see static::deserialize()}
		 */
		public function account(int $id, ProjectionInterface $projection = null): ?HubAccount {
			$response = $this->client->request(
				static::METHOD_GET,
				'/accounts/' . $id,
				$this->buildOptions($projection),
			);

			if ($response->getStatusCode() === 404)
				return null;

			return $this->deserialize(HubAccount::class, $response);
		}
	}
