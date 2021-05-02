<?php

namespace FigTree\Exceptions;

use Throwable;
use LogicException;
use FigTree\Exceptions\Contracts\{
	SevereExceptionInterface,
	LocatableExceptionInterface,
};
use FigTree\Exceptions\Concerns\HasSeverity;

/**
 * Exception thrown when a class does not exist.
 */
class InvalidClassException extends LogicException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception thrown when a class does not exist.
	 *
	 * @param string $inputClass The class being checked for existence.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $inputClass, int $code = 0, Throwable $previous = null)
	{
		$message = sprintf('%s is not a valid class name.', $inputClass);

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
