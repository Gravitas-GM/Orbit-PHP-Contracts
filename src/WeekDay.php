<?php
	namespace Gravitas\Orbit\Contracts;

	enum WeekDay: int {
		public const FORMAT_CHAR = 'w';

		case Sunday = 0;
		case Monday = 1;
		case Tuesday = 2;
		case Wednesday = 3;
		case Thursday = 4;
		case Friday = 5;
		case Saturday = 6;
	}