<?php

namespace FigTree\Exceptions\Tests;

use Throwable;
use FigTree\Exceptions\{
	Contracts\LocatableExceptionInterface,
	Contracts\SevereExceptionInterface,
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

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new Exception($message, 1, new Exception()))
			->onFileLine($file, $line);;

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testHeadersSentException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new HeadersSentException(2, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Headers already sent.', $exc->getMessage());
		$this->assertEquals(2, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testInvalidClassException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new InvalidClassException('FakeClass', 4, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('FakeClass is not a valid class name.', $exc->getMessage());
		$this->assertEquals(4, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testInvalidDirectoryException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new InvalidDirectoryException('/foo/bar/file.txt', 5, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Path /foo/bar/file.txt is not a directory.', $exc->getMessage());
		$this->assertEquals(5, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testInvalidFileException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new InvalidFileException('/foo/bar', 6, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Path /foo/bar is not a file.', $exc->getMessage());
		$this->assertEquals(6, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testInvalidPathException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new InvalidPathException('/foo/bar', 7, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals("Path /foo/bar does not exist.", $exc->getMessage());
		$this->assertEquals(7, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testOutputSentException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new OutputSentException(8, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Output already sent.', $exc->getMessage());
		$this->assertEquals(8, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testUnexpectedTypeException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new UnexpectedTypeException(1, 'string', 9, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Expected value of type string; integer given.', $exc->getMessage());
		$this->assertEquals(9, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	public function testUnreadablePathException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new UnreadablePathException('/foo/bar', 10, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('/foo/bar is not readable.', $exc->getMessage());
		$this->assertEquals(10, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}
}
