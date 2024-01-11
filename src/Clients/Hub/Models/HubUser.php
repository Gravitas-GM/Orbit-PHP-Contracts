<?php
	namespace Gravitas\Orbit\Contracts\Clients\Hub\Models;

	class HubUser {
		public int $id;

		public HubAccount $account;

		public string $firstName;

		public string $lastName;

		public string $emailAddress;

		/**
		* @var \Gravitas\Orbit\Contracts\Permission[]
		*/
		public array $permissions;

	}