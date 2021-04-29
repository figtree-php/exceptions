<?php

namespace FigTree\Exceptions\Tests;

use FigTree\Exceptions\{
	Exception,
	HeadersSentException,
	InvalidClassException,
	InvalidDirectoryException,
	InvalidFileException,
	InvalidPathException,
	OutputSentException,
	UnexpectedTypeException,
	UnreadablePathException,
};

class ExceptionTest extends AbstractTestCase
{
	/**
	 * @small
	 */
	public function testException()
	{
		$message = 'Test Exception';

		$exc = new Exception($message, 1, new Exception());

		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testHeadersSentException()
	{
		$exc = new HeadersSentException(2, new Exception());

		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals('Headers already sent.', $exc->getMessage());
		$this->assertEquals(2, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testInvalidClassException()
	{
		$exc = new InvalidClassException('FakeClass', 4, new Exception());

		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals('FakeClass is not a valid class name.', $exc->getMessage());
		$this->assertEquals(4, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testInvalidDirectoryException()
	{
		$exc = new InvalidDirectoryException('/foo/bar/file.txt', 5, new Exception());

		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals('Path /foo/bar/file.txt is not a directory.', $exc->getMessage());
		$this->assertEquals(5, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testInvalidFileException()
	{
		$exc = new InvalidFileException('/foo/bar', 6, new Exception());

		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals('Path /foo/bar is not a file.', $exc->getMessage());
		$this->assertEquals(6, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testInvalidPathException()
	{
		$exc = new InvalidPathException('/foo/bar', 7, new Exception());

		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals("Path /foo/bar does not exist.", $exc->getMessage());
		$this->assertEquals(7, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testOutputSentException()
	{
		$exc = new OutputSentException(8, new Exception());

		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals('Output already sent.', $exc->getMessage());
		$this->assertEquals(8, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	/**
	 * @small
	 */
	public function testUnexpectedTypeException()
	{
		$expected = 'string';
		$actual = 1;

		$exc = new UnexpectedTypeException($actual, $expected, 9, new Exception());

		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals('Expected value of type string; integer given.', $exc->getMessage());
		$this->assertEquals(9, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}

	public function testUnreadablePathException()
	{
		$exc = new UnreadablePathException('/foo/bar', 10, new Exception());

		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals('/foo/bar is not readable.', $exc->getMessage());
		$this->assertEquals(10, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
	}
}
