<?php

namespace FigTree\Exceptions;

use Throwable;

/**
 * Exception thrown when a value is not of an expected type.
 */
class UnexpectedTypeException extends LogicException
{
	/**
	 * Exception thrown when a value is not of an expected type.
	 *
	 * @param mixed $value Actual value.
	 * @param string $expected The name of the expected type.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct($value, string $expected, int $code = 0, Throwable $previous = null)
	{
		$message = sprintf(
			'Expected value of type %s; %s given.',
			$expected,
			(is_object($value) ? get_class($value) : gettype($value))
		);

		parent::__construct($message, $code, $previous);
	}
}
