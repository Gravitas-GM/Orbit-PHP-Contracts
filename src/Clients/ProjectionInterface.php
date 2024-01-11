<?php

	namespace Gravitas\Orbit\Contracts\Clients;

	interface ProjectionInterface {
		const DEFAULT_MATCH_KEY = '_default';

		/**
		 * Marks the given `$field` as included in the projection.
		 *
		 * @param string $field
		 *
		 * @return $this
		 */
		public function include(string $field): static;

		/**
		 * Marks the given `$field` as excluded in the projection.
		 *
		 * @param string $field
		 *
		 * @return $this
		 */
		public function exclude(string $field): static;

		/**
		 * Sets the default match behavior for the projection.
		 *
		 * If not specified or `null`, the default behavior is to examine the first element in the projection, and infer
		 * the default match behavior to be the opposite of that element's value. For example, if the first element is
		 * an include, then by default all fields that are NOT listed in the projection will be excluded.
		 *
		 * @param bool|null $default
		 *
		 * @return $this
		 */
		public function default(?bool $default): static;

		/**
		 * Sets the key to use for the default match behavior field. If not set, implementations should fall back on the
		 * value of {@see static::DEFAULT_MATCH_KEY}.
		 *
		 * @param string|null $defaultMatchKey
		 *
		 * @return $this
		 */
		public function setDefaultMatchKey(?string $defaultMatchKey): static;

		/**
		 * Returns the full projection as a flattened array, including the default match behavior field.
		 *
		 * @return array
		 */
		public function build(): array;
	}
