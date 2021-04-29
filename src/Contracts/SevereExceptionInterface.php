<?php

namespace FigTree\Exceptions\Contracts;

use Throwable;

interface SevereExceptionInterface extends Throwable
{
	/**
	 * Get the PHP severity level associated with the Exception.
	 *
	 * @return integer
	 */
	public function getSeverity(): int;
}
