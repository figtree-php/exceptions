<?php

namespace FigTree\Exceptions;

use Throwable;
use LogicException;
use FigTree\Exceptions\Contracts\SevereExceptionInterface;
use FigTree\Exceptions\Concerns\HasSeverity;

/**
 * Exception thrown when a factory class is being configured to generate an incompatible class.
 */
class InvalidFactoryClassException extends LogicException implements SevereExceptionInterface
{
	use HasSeverity;

	protected int $severity = E_ERROR;

	/**
	 * Exception thrown when a factory class is being configured to generate an incompatible class.
	 *
	 * @param string $factoryClass The name of the factory class being configured.
	 * @param string $expectedClass The name of the expected class or interface being generated.
	 * @param string $inputClass The name of the actual class or interface of which an attempt was made to generate.
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	public function __construct(string $factoryClass, string $expectedClass, string $inputClass, int $code = 0, Throwable $previous = null)
	{
		$message = sprintf('%s can only generate implementations of %s not %s.', $factoryClass, $expectedClass, $inputClass);

		parent::__construct($message, $code, $previous);
	}
}
