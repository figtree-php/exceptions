<?php

namespace FigTree\Exceptions;

use Exception as PHPException;
use FigTree\Exceptions\Concerns\HasSeverity;
use FigTree\Exceptions\Contracts\SevereExceptionInterface;

class Exception extends PHPException implements SevereExceptionInterface
{
	use HasSeverity;

	/**
	 * Exception severity level.
	 *
	 * @var int
	 */
	protected int $severity = E_ERROR;

	/**
	 * If required, set the file and line where the Exception was thrown.
	 *
	 * @param string $file
	 * @param int $line
	 *
	 * @return $this
	 */
	public function onFileLine(string $file, int $line)
	{
		if (file_exists($file)) {
			$this->file = $file;
			$this->line = max(0, $line);
		}

		return $this;
	}
}
