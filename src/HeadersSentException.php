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
 * Exception thrown when headers have already been sent when attempting to emit HTTP content.
 */
class HeadersSentException extends LogicException implements SevereExceptionInterface, LocatableExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception thrown when headers have already been sent when attempting to emit HTTP content.
	 *
	 * @param int $code The Exception code.
	 * @param \Throwable $previous The previous throwable used for the exception chaining.
	 */
	
	public function __construct(int $code = 0, Throwable $previous = null)
	{
		$message = 'Headers already sent.';

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
