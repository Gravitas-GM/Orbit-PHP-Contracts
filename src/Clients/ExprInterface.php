<?php

	namespace Gravitas\Orbit\Contracts\Clients;

	interface ExprInterface {
		/**
		 * Returns the key of this expression, usually the name of the field being evaluated.
		 *
		 * @return string
		 */
		public function getKey(): string;

		/**
		 * Returns the expression being evaluated against the key, e.g. `['$lte' => 10]`.
		 *
		 * @return mixed
		 */
		public function getValue(): mixed;
	}
