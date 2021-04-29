<?php

namespace FigTree\Exceptions;

use Exception as PHPException;
use FigTree\Exceptions\Concerns\{
	HasSeverity,
	SetsLocation,
};
use FigTree\Exceptions\Contracts\SevereExceptionInterface;

class Exception extends PHPException implements SevereExceptionInterface
{
	use HasSeverity;
	use SetsLocation;

	/**
	 * Exception severity level.
	 *
	 * @var int
	 */
	protected int $severity = E_ERROR;
}
