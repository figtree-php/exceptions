<?php

namespace FigTree\Exceptions;

use Throwable;
use InvalidArgumentException as PHPInvalidArgumentException;
use FigTree\Exceptions\Concerns\HasSeverity;
use FigTree\Exceptions\Contracts\{
	SevereExceptionInterface,
	LocatableExceptionInterface,
};

class InvalidArgumentException extends PHPInvalidArgumentException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception thrown when headers have already been sent when attempting to emit HTTP content.
	 *
	 * @param string $message The Exception message to throw.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->severity = E_ERROR;
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
