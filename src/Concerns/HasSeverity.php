<?php

namespace FigTree\Exceptions\Concerns;

trait HasSeverity
{
	protected int $severity = E_ERROR;

	/**
	 * Get the PHP severity level associated with the Exception.
	 *
	 * @return integer
	 */
	public function getSeverity(): int
	{
		return $this->severity;
	}
}
