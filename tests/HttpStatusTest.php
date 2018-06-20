<?php
/**
 * HttpStatusTest.php
 * @author      Marc-André Appel <marc-andre@hybride-conseil.fr>
 * @copyright   2018 Hybride Conseil
 * @license     http://opensource.org/licenses/MIT MIT
 * @link        https://www.hybride-conseil.fr
 * @created     19/06/2018
 */

namespace MarcAndreAppel\HttpStatus\tests;

use MarcAndreAppel\HttpStatus\HttpStatusTrait;
use MarcAndreAppel\HttpStatus\HttpStatus;
use PHPUnit\Framework\TestCase;

class HttpStatusTest extends TestCase
{
	protected $traitClass;

	public function setUp()
	{
		parent::setUp();

		$this->traitClass = new class() {
			use HttpStatusTrait;
		};
		$_SERVER["SERVER_PROTOCOL"] = 'HTTP/1.1';
	}

	public function tearDown()
	{
		parent::tearDown();

		unset($_SERVER["SERVER_PROTOCOL"]);
	}

	/** @test */
	public function returns_an_object()
	{
		$return = $this->traitClass->httpCode(100);
		$this->assertInternalType('object', $return, "Returned value must be an object");
	}

	/** @test */
	public function returned_object_is_instance_of()
	{
		$return = $this->traitClass->httpCode(100);
		$this->assertInstanceOf(HttpStatus::class, $return, "Object must be type of 'HttpStatusModel'");
	}

	/** @test */
	public function returned_object_contains_statusCode()
	{
		$return = $this->traitClass->httpCode(100);
		$this->assertObjectHasAttribute('code', $return, "Contains the attribute 'statusCode'");
	}

	/** @test */
	public function attribute_statusCode_contains_value()
	{
		$code = 302;
		$return = $this->traitClass->httpCode($code);
		$this->assertEquals($code, $return->code, "Attribute value equals $code");
	}

	/** @test */
	public function returned_object_contains_attributes()
	{
		$return = $this->traitClass->httpCode(100);
		$this->assertObjectHasAttribute('message', $return, "Contains the attribute 'message'");
		$this->assertObjectHasAttribute('title', $return, "Contains the attribute 'title'");
	}

	/** @test */
	public function object_accepts_overriding_argument_message()
	{
		$message = "Overriding message";
		$return = $this->traitClass->httpCode(100, array("message" => $message));
		$this->assertEquals($message, $return->message, "Second argument in array → key 'message' gets returned as attribute");
	}

	/** @test */
	public function object_accepts_overriding_argument_title()
	{
		$title = "BAD REQUEST TITLE";
		$return = $this->traitClass->httpCode(400, array("title" => $title));
		$this->assertEquals($title, $return->title, "Second argument in array → key 'title' gets returned as attribute");
	}

	/** @test */
	public function object_returns_correct_defaults()
	{
		$return = $this->traitClass->httpCode(100);
		$this->assertEquals('Continue', $return->title, "Returns the value 'Continue' for the code 100");

		$return = $this->traitClass->httpCode(404);
		$this->assertEquals('Not Found', $return->title, "Returns the value 'Not Found' for error code 404");
	}

	/** @test */
	public function object_throws_error_with_wrong_parameter()
	{
		$this->expectException(\OutOfBoundsException::class);
		$this->traitClass->httpCode(600);
	}

	/** @test */
	public function object_throws_error_with_no_parameter()
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->traitClass->httpCode();
	}

	/** @test */
	public function returns_title_but_empty_message()
	{
		$return = $this->traitClass->httpCode(100);
		$this->assertEquals("Continue", $return->title);
		$this->assertNull($return->message);
	}

	/** @test */
	public function phpunit_test_throws_exception_header_method()
	{
		$this->expectException("MarcAndreAppel\HttpStatus\Exceptions\HeaderSentException");
		$this->traitClass->httpCode(404)->header();
	}
}
