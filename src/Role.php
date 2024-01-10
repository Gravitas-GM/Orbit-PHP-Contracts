<?php
	namespace Gravitas\Orbit\Contracts;

	final class Role {
		// An application-wide admin; can do anything, in any account.
		public const Admin = "ROLE_ADMIN";

		// A regular user of the application.
		public const User = "ROLE_USER";

		// An automated service user; like an Admin, can do anything in any account.
		public const Service = "ROLE_SERVICE";

		private function __construct() {}
	}
