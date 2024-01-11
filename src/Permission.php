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

		// Allows a user to manage survey settings for the account.
		case ManageSurvey = "manage survey";


		/**
		 * Returns `true` if the variant is granted by the `$permissions` set.
		 *
		 * A permission is considered "granted" if the user has the {@see self::Admin} permission, or if the permission
		 * being tested is present in the set.
		 *
		 * @param array $permissions
		 *
		 * @return bool
		 */
		public function isGrantedBy(array $permissions): bool {
			return in_array(self::Admin, $permissions) || in_array($this, $permissions);
		}
	}
