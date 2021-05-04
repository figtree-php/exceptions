<?php

namespace FigTree\Exceptions\Tests;

use Throwable;
use FigTree\Exceptions\{
	Contracts\LocatableExceptionInterface,
	Contracts\SevereExceptionInterface,
	BadFunctionCallException,
	BadMethodCallException,
	DomainException,
	Exception,
	HeadersSentException,
	InvalidArgumentException,
	InvalidClassException,
	InvalidDirectoryException,
	InvalidFileException,
	InvalidPathException,
	LengthException,
	LogicException,
	OutOfBoundsException,
	OutOfRangeException,
	OutputSentException,
	RangeException,
	RuntimeException,
	UnexpectedTypeException,
	UnexpectedValueException,
	UnreadablePathException,
};

class ExceptionTest extends AbstractTestCase
{
	/**
	 * @small
	 */
	public function testBadFunctionCallException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new BadFunctionCallException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\BadFunctionCallException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testBadMethodCallException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new BadMethodCallException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\BadMethodCallException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testDomainException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new DomainException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\DomainException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new Exception($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\Exception::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
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

		$exc = (new HeadersSentException(1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\LogicException::class, $exc);
		$this->assertInstanceOf(LogicException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Headers already sent.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testInvalidArgumentException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new InvalidArgumentException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\InvalidArgumentException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
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

		$exc = (new InvalidClassException('FakeClass', 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\LogicException::class, $exc);
		$this->assertInstanceOf(LogicException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('FakeClass is not a valid class name.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
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

		$exc = (new InvalidDirectoryException('/foo/bar/file.txt', 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\RuntimeException::class, $exc);
		$this->assertInstanceOf(RuntimeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Path /foo/bar/file.txt is not a directory.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
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

		$exc = (new InvalidFileException('/foo/bar', 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\RuntimeException::class, $exc);
		$this->assertInstanceOf(RuntimeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Path /foo/bar is not a file.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
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

		$exc = (new InvalidPathException('/foo/bar', 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\RuntimeException::class, $exc);
		$this->assertInstanceOf(RuntimeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals("Path /foo/bar does not exist.", $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testLengthException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new LengthException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\LengthException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testLogicException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new LogicException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\LogicException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testOutOfBoundsException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new OutOfBoundsException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\OutOfBoundsException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testOutOfRangeException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new OutOfRangeException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\OutOfRangeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
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

		$exc = (new OutputSentException(1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\LogicException::class, $exc);
		$this->assertInstanceOf(LogicException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Output already sent.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testRangeException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new RangeException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\RangeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testRuntimeException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new RuntimeException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\RuntimeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
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

		$exc = (new UnexpectedTypeException(1, 'string', 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\LogicException::class, $exc);
		$this->assertInstanceOf(LogicException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('Expected value of type string; integer given.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testUnexpectedValueException()
	{
		$message = 'Test Exception';

		$file = __FILE__;
		$line = __LINE__;

		$exc = (new UnexpectedValueException($message, 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\UnexpectedValueException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals($message, $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}

	/**
	 * @small
	 */
	public function testUnreadablePathException()
	{
		$file = __FILE__;
		$line = __LINE__;

		$exc = (new UnreadablePathException('/foo/bar', 1337, new Exception()))
			->onFileLine($file, $line);

		$this->assertInstanceOf(Throwable::class, $exc);
		$this->assertInstanceOf(\RuntimeException::class, $exc);
		$this->assertInstanceOf(RuntimeException::class, $exc);
		$this->assertInstanceOf(SevereExceptionInterface::class, $exc);
		$this->assertInstanceOf(LocatableExceptionInterface::class, $exc);

		$this->assertEquals('/foo/bar is not readable.', $exc->getMessage());
		$this->assertEquals(1337, $exc->getCode());
		$this->assertInstanceOf(Exception::class, $exc->getPrevious());
		$this->assertEquals(E_RECOVERABLE_ERROR, $exc->getSeverity());
		$this->assertEquals($file, $exc->getFile());
		$this->assertEquals($line, $exc->getLine());
	}
}
