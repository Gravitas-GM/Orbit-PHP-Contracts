<?php
	namespace Gravitas\Orbit\Contracts\Clients\Hub\Models;

	class HubDepartment {
		public int $id;

		public string $name;

		public bool $allowSplitReporting;

		/**
		* @var HubUser[]
		*/
		public array $members;

	}
