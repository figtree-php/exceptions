<?php

namespace FigTree\Exceptions;

use Throwable;
use RuntimeException;
use FigTree\Exceptions\Contracts\{
	SevereExceptionInterface,
	LocatableExceptionInterface,
};
use FigTree\Exceptions\Concerns\HasSeverity;

/**
 * Exception thrown when a path is expected to be a directory but is not a directory.
 */
class InvalidDirectoryException extends RuntimeException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception thrown when a path is expected to be a directory but is not a directory.
	 *
	 * @param string $path The path being checked as a directory.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $path, int $code = 0, Throwable $previous = null)
	{
		$this->severity = E_RECOVERABLE_ERROR;

		$message = sprintf('Path %s is not a directory.', $path);

		parent::__construct($message, $code, $previous);
	}

	/**
	 * If required, set the file and line where the Exception was thrown.
	 *
	 * @param string $file
	 * @param int $line
	 *
	 * @return $this
	 */
	public function onFileLine(string $file, int $line): LocatableExceptionInterface
	{
		if (file_exists($file)) {
			$this->file = $file;
			$this->line = max(0, $line);
		}

		return $this;
	}
}
