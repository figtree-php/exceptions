<?php

namespace FigTree\Exceptions;

use Throwable;
use LogicException as PHPLogicException;
use FigTree\Exceptions\Concerns\HasSeverity;
use FigTree\Exceptions\Contracts\{
	SevereExceptionInterface,
	LocatableExceptionInterface,
};

/**
 * Exception that represents error in the program logic.
 * This kind of exception should lead directly to a fix in your code.
 */
class LogicException extends PHPLogicException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception that represents error in the program logic.
	 * This kind of exception should lead directly to a fix in your code.
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
