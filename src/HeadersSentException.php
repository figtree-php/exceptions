<?php

namespace FigTree\Exceptions;

use Throwable;
use LogicException;
use FigTree\Exceptions\Contracts\SevereExceptionInterface;
use FigTree\Exceptions\Concerns\HasSeverity;

/**
 * Exception thrown when headers have already been sent when attempting to emit HTTP content.
 */
class HeadersSentException extends LogicException implements SevereExceptionInterface
{
	use HasSeverity;

	protected int $severity = E_ERROR;

	/**
	 * Exception thrown when headers have already been sent when attempting to emit HTTP content.
	 *
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	
	public function __construct(int $code = 0, Throwable $previous = null)
	{
		$message = 'Headers already sent.';

		parent::__construct($message, $code, $previous);
	}
}
