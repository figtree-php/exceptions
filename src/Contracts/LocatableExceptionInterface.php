<?php

namespace FigTree\Exceptions\Contracts;

interface LocatableExceptionInterface
{
	/**
	 * If required, set the file and line where the Exception was thrown.
	 *
	 * @param string $file
	 * @param int $line
	 *
	 * @return $this
	 */
	public function setLocation(string $file, int $line): LocatableExceptionInterface;
}
