<?php

namespace FigTree\Exceptions;

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
