<?php
	namespace Gravitas\Orbit\Contracts\Clients;

	class Expr implements ExprInterface {
		protected function __construct(
			protected string $key,
			protected mixed $value,
		) {}

		public static function and(Expr ...$exprs): static {
			$value = [];

			foreach ($exprs as $expr)
				$value[$expr->getKey()] = $expr->getValue();

			return new static('$and', $value);
		}

		public static function or(Expr ...$exprs): static {
			$value = [];

			foreach ($exprs as $expr)
				$value[] = [$expr->getKey() => $expr->getValue()];

			return new static('$or', $value);
		}

		public static function eq(string $field, mixed $value): static {
			return new static($field, $value);
		}

		public static function neq(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$neq' => $value,
				],
			);
		}

		public static function in(string $field, array $values): static {
			return new static(
				$field,
				[
					'$in' => $values,
				],
			);
		}

		public static function nin(string $field, array $values): static {
			return new static(
				$field,
				[
					'$nin' => $values,
				],
			);
		}

		public static function gt(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$gt' => $value,
				],
			);
		}

		public static function gte(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$gte' => $value,
				],
			);
		}

		public static function lt(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$lt' => $value,
				],
			);
		}

		public static function lte(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$lte' => $value,
				],
			);
		}

		public static function like(string $field, string $pattern): static {
			return new static(
				$field,
				[
					'$like' => $pattern,
				],
			);
		}

		public static function nlike(string $field, string $pattern): static {
			return new static(
				$field,
				[
					'$nlike' => $pattern,
				],
			);
		}

		public static function exists(string $field, bool $check): static {
			return new static(
				$field,
				[
					'$exists' => $check,
				],
			);
		}

		public static function size(string $field, array|int $value): static {
			return new static(
				$field,
				[
					'$size' => $value,
				],
			);
		}

		public static function contains(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$contains' => $value,
				],
			);
		}

		public static function ncontains(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$ncontains' => $value,
				],
			);
		}

		public function getKey(): string {
			return $this->key;
		}

		public function getValue(): mixed {
			return $this->value;
		}
	}
