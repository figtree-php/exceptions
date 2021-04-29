<?php

namespace FigTree\Exceptions\Tests\Concerns;

use FigTree\Exceptions\Core\Context;

trait GetsContext
{
	protected function getContext(): Context
	{
		return new Context(dirname(dirname(__DIR__)));
	}
}
