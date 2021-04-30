<?php

namespace FigTree\Exceptions\Concerns;

trait SetsLocation
{
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
			if (property_exists($this, 'file')) {
				$this->file = $file;
			}
			if (property_exists($this, 'line')) {
				$this->line = max(0, $line);
			}
		}

		return $this;
	}
}
