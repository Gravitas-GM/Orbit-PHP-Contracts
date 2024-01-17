<?php
	namespace Gravitas\Orbit\Contracts\Security\Voters;

	use Gravitas\Orbit\Contracts\Permission;
	use Gravitas\Orbit\Contracts\PermissionAwareInterface;
	use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

	class PermissionVoter extends AbstractVoter {
		public function supportsAttribute(string $attribute): bool {
			return Permission::tryFrom($attribute) !== null;
		}

		public function supportsType(string $subjectType): bool {
			return $subjectType === 'string';
		}

		protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool {
			$user = $token->getUser();

			if (!($user instanceof PermissionAwareInterface))
				return false;

			// Safety: We can directly convert to an enum variant because supportsAttribute() checks the conversion
			//         this method is invoked.
			return $user->isAllowed(Permission::from($attribute));
		}
	}
