<?php

namespace FigTree\Exceptions\Tests;

use PHPUnit\Framework\TestCase;
use FigTree\Exceptions\Tests\Concerns\ReadsTestData;

abstract class AbstractTestCase extends TestCase
{
	use ReadsTestData;

	public function __construct()
	{
		parent::__construct();

		$this->setDataDir(__DIR__ . '/Data');
	}
}
