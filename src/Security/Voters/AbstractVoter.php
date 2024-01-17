<?php
	namespace Gravitas\Orbit\Contracts\Security\Voters;

	use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
	use Symfony\Component\Security\Core\Authorization\Voter\CacheableVoterInterface;
	use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

	/**
	 * Adapted from {@see Voter}. A simplified base voter implementation that relies on
	 * {@see CacheableVoterInterface::supportsAttribute()} and {@see CacheableVoterInterface::supportsType()} to enforce
	 * which types get passed to {@see self::vote()} (and in turn {@see static::voteOnAttribute()}).
	 *
	 * Since Symfony won't call a voter using arguments that don't pass those two cache functions, we can safely assume
	 * that the values we're receiving are of the type we expect.
	 */
	abstract class AbstractVoter implements VoterInterface, CacheableVoterInterface {
		public function __construct(
			protected int $defaultVote = self::ACCESS_DENIED,
		) {}

		public function vote(TokenInterface $token, mixed $subject, array $attributes): int {
			foreach ($attributes as $attribute) {
				if ($this->voteOnAttribute($attribute, $subject, $token))
					return self::ACCESS_GRANTED;
			}

			return $this->defaultVote;
		}

		protected abstract function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool;
	}
