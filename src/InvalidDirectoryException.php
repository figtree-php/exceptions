<?php

namespace FigTree\Exceptions;

use Throwable;

/**
 * Exception thrown when a path is expected to be a directory but is not a directory.
 */
class InvalidDirectoryException extends RuntimeException
{
	/**
	 * Exception thrown when a path is expected to be a directory but is not a directory.
	 *
	 * @param string $path The path being checked as a directory.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $path, int $code = 0, Throwable $previous = null)
	{
		$message = sprintf('Path %s is not a directory.', $path);

		parent::__construct($message, $code, $previous);

		$this->severity = E_RECOVERABLE_ERROR;
	}
}
