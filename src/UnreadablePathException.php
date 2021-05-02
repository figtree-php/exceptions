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
 * Exception thrown when a path is not readable.
 */
class UnreadablePathException extends RuntimeException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception thrown when a path is not readable.
	 *
	 * @param string $filename Path for which an attempt was made to read the file.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $filename, int $code = 0, Throwable $previous = null)
	{
		$this->severity = E_RECOVERABLE_ERROR;

		$message = sprintf('%s is not readable.', $filename);

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
