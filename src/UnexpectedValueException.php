<?php

namespace FigTree\Exceptions;

use Throwable;
use UnexpectedValueException as PHPUnexpectedValueException;
use FigTree\Exceptions\Concerns\HasSeverity;
use FigTree\Exceptions\Contracts\{
	SevereExceptionInterface,
	LocatableExceptionInterface,
};

/**
 * Exception thrown if a value does not match with a set of values.
 * Typically this happens when a function calls another function and expects the return value
 * to be of a certain type or value not including arithmetic or buffer related errors.
 */
class UnexpectedValueException extends PHPUnexpectedValueException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception thrown if a value does not match with a set of values.
	 * Typically this happens when a function calls another function and expects the return value
	 * to be of a certain type or value not including arithmetic or buffer related errors.
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
	public function setLocation(string $file, int $line): LocatableExceptionInterface
	{
		if (file_exists($file)) {
			$this->file = $file;
			$this->line = max(0, $line);
		}

		return $this;
	}
}
