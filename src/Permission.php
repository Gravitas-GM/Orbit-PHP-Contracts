<?php
	namespace Gravitas\Orbit\Contracts;

	enum Permission: string {
		// Allows a user to do anything. This is a dangerous permission to grant.
		case Admin = "admin";

		// Allows a user to manage quiz-related tasks, such as questions and tags.
		case ManageQuiz = "manage quiz";

		// Allows a user to manage other users.
		case ManageUser = "manage user";

		// Allows a user to manage account settings.
		case ManageAccount = "manage account";

		public function isAllowed(Permission $permission, array $permissions): bool {
			return in_array(static::Admin, $permissions) || in_array($permission, $permissions);
		}
	}
