<?php
	namespace Gravitas\Orbit\Contracts;

	interface PermissionAwareInterface {
		/**
		 * Returns `true` if the object is allowed to perform the action described by `$permission`.
		 *
		 * @param Permission $permission
		 *
		 * @return bool
		 */
		public function isAllowed(Permission $permission): bool;
	}
