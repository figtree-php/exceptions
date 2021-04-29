<?php

namespace FigTree\Exceptions;

use Throwable;
use RuntimeException;
use FigTree\Exceptions\Contracts\SevereExceptionInterface;
use FigTree\Exceptions\Concerns\{
	HasSeverity,
	SetsLocation,
};

/**
 * Exception thrown when a path is expected to be a directory but is not a directory.
 */
class InvalidDirectoryException extends RuntimeException implements SevereExceptionInterface
{
	use HasSeverity;
	use SetsLocation;

	protected int $severity = E_RECOVERABLE_ERROR;

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
	}
}
