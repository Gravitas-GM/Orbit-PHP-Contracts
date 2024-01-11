<?php

	namespace Gravitas\Orbit\Contracts\Clients;

	class Query implements QueryInterface {
		public function __construct(
			protected array $query = [],
		) {}

		public function and(ExprInterface $expr): static {
			$this->query[$expr->getKey()] = $expr->getValue();
			return $this;
		}

		public function or(ExprInterface $expr): static {
			if (!isset($this->query['$or']))
				$this->query['$or'] = [];

			$this->query['$or'][] = [$expr->getKey() => $expr->getValue()];

			return $this;
		}

		public function getQuery(): array {
			// TODO: Implement getQuery() method.
		}
	}
