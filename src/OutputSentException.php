<?php

namespace FigTree\Exceptions;

use Throwable;
use LogicException;
use FigTree\Exceptions\Contracts\SevereExceptionInterface;
use FigTree\Exceptions\Concerns\{
	HasSeverity,
	SetsLocation,
};

/**
 * Exception thrown when output has already been sent when attempting to emit an HTTP header.
 */
class OutputSentException extends LogicException implements SevereExceptionInterface
{
	use HasSeverity;
	use SetsLocation;

	protected int $severity = E_ERROR;

	/**
	 * Exception thrown when output has already been sent when attempting to emit an HTTP header.
	 *
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(int $code = 0, Throwable $previous = null)
	{
		$message = 'Output already sent.';

		parent::__construct($message, $code, $previous);
	}
}
