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
 * Exception thrown when a path does not exist.
 */
class InvalidPathException extends RuntimeException implements SevereExceptionInterface
{
	use HasSeverity;
	use SetsLocation;

	protected int $severity = E_RECOVERABLE_ERROR;

	/**
	 * Exception thrown when a path does not exist.
	 *
	 * @param string $path The path being checked for existence.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $path, int $code = 0, Throwable $previous = null)
	{
		$message = sprintf('Path %s does not exist.', $path);

		parent::__construct($message, $code, $previous);
	}
}
