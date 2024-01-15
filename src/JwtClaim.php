<?php
	namespace Gravitas\Orbit\Contracts;

	final class JwtClaim {
		// The ID of the user identified by the token; not present for service users.
		public const Id = "id";

		// A unix timestamp indicating when the token is no longer valid.
		public const Expiration = "exp";

		// A unix timestamp indicating when the token was generated.
		public const IssuedAt = "iat";

		// A unix timestamp indicating when the token becomes valid.
		public const NotBefore = "nbf";

		// The ID of the account the user belongs to; not present for service users.
		public const Account = "accountId";

		// An array of permission strings indicating what actions the user may perform; not present for service users.
		public const Permissions = "permissions";

		private function __construct() {}
	}
