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
	 * @param string $file File name where the Exception is being thrown.
	 * @param int $line File line where the Exception is being thrown.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	
	public function __construct(string $file = null, int $line = null, int $code = 0, Throwable $previous = null)
	{
		$message = (is_null($file))
			? 'Headers already sent.'
			: sprintf('Headers already sent @ %s:%d.', $file, $line ?? 0);

		parent::__construct($message, $code, $previous);
	}
}
