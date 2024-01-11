<?php

	namespace Gravitas\Orbit\Contracts\Clients;

	interface QueryInterface {
		/**
		 * Adds a new expression to the `and` block of the query.
		 *
		 * @param ExprInterface $expr
		 *
		 * @return $this
		 */
		public function and(ExprInterface $expr): static;

		/**
		 * Adds a new expression to the `or` block of the query.
		 *
		 * @param ExprInterface $expr
		 *
		 * @return $this
		 */
		public function or(ExprInterface $expr): static;

		/**
		 * @return array
		 */
		public function getQuery(): array;
	}
