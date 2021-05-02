<?php

namespace FigTree\Exceptions;

use Throwable;

/**
 * Exception thrown when a path is expected to be a file but is not a file.
 */
class InvalidFileException extends RuntimeException
{
	/**
	 * Exception thrown when a path is expected to be a file but is not a file.
	 *
	 * @param string $path The path being checked as a file.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $path, int $code = 0, Throwable $previous = null)
	{
		$this->severity = E_RECOVERABLE_ERROR;

		$message = sprintf('Path %s is not a file.', $path);

		parent::__construct($message, $code, $previous);
	}
}
