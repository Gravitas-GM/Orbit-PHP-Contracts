<?php

	namespace Gravitas\Orbit\Contracts\Clients\Hub\Models;

	use Gravitas\Orbit\Contracts\Permission;

	class HubUser {
		public int $id;
		public HubAccount $account;
		public string $firstName;
		public string $lastName;
		public string $emailAddress;

		/**
		 * @var Permission[]
		 */
		public array $permissions;
	}
