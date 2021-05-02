<?php

namespace FigTree\Exceptions;

use Throwable;

/**
 * Exception thrown when a class does not exist.
 */
class InvalidClassException extends LogicException
{
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
}
