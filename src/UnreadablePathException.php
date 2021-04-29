<?php

namespace FigTree\Exceptions;

use Throwable;
use RuntimeException;
use FigTree\Exceptions\Contracts\SevereExceptionInterface;
use FigTree\Exceptions\Concerns\HasSeverity;

/**
 * Exception thrown when a path is not readable.
 */
class UnreadablePathException extends RuntimeException implements SevereExceptionInterface
{
	use HasSeverity;

	protected int $severity = E_RECOVERABLE_ERROR;

	/**
	 * Exception thrown when a path is not readable.
	 *
	 * @param string $filename Path for which an attempt was made to read the file.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $filename, int $code = 0, Throwable $previous = null)
	{
		$message = sprintf('%s is not readable.', $filename);

		parent::__construct($message, $code, $previous);
	}
}
