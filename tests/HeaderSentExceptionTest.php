<?php
/**
 * HeaderSentExceptionTest.php
 * @author      Marc-André Appel <marc-andre@hybride-conseil.fr>
 * @copyright   2018 Hybride Conseil
 * @license     http://opensource.org/licenses/MIT MIT
 * @link        https://www.hybride-conseil.fr
 * @created     20/06/2018
 */

namespace MarcAndreAppel\HttpStatus\tests;

use PHPUnit\Framework\TestCase;

class HeaderSentExceptionTest extends TestCase
{
	protected $dummyClass;

	public function setUp()
	{
		$this->dummyClass = new class() {
			public function throwError(string $message)
			{
				$e = "MarcAndreAppel\HttpStatus\Exceptions\HeaderSentException";
				throw new $e($message);
			}
		};
	}

	/** @test */
	public function thrown_exception_returns_message()
	{
		$this->expectException("MarcAndreAppel\HttpStatus\Exceptions\HeaderSentException");
		$test = $this->dummyClass->throwError("Error message");
	}
}
