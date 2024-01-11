<?php
	namespace Gravitas\Orbit\Contracts\Clients;

	class Projection implements ProjectionInterface {
		public function __construct(
			protected array $fields = [],
			protected ?bool $defaultMatchBehavior = null,
			protected ?string $defaultMatchBehaviorKey = null,
		) {}

		public function include(string ...$fields): static {
			foreach ($fields as $field)
				$this->fields[$field] = true;

			return $this;
		}

		public function exclude(string ...$fields): static {
			foreach ($fields as $field)
				$this->fields[$field] = false;

			return $this;
		}

		public function default(?bool $default): static {
			$this->defaultMatchBehavior = $default;
			return $this;
		}

		public function setDefaultMatchKey(?string $defaultMatchKey): static {
			$this->defaultMatchBehaviorKey = $defaultMatchKey;
			return $this;
		}

		public function build(): array {
			$fields = $this->fields;

			if ($this->defaultMatchBehavior !== null)
				$fields[$this->defaultMatchBehaviorKey ?? static::DEFAULT_MATCH_KEY] = $this->defaultMatchBehavior;

			return $fields;
		}
	}
