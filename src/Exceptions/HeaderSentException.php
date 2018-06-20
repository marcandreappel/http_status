<?php
/**
 * HeaderSentException
 * @author      Marc-André Appel <marc-andre@appel.fun>
 * @license     http://opensource.org/licenses/MIT MIT
 * @created     20/06/2018
 */
declare(strict_types=1);

namespace MarcAndreAppel\HttpStatus\Exceptions;

class HeaderSentException extends \Exception
{
	/**
	 * @var string
	 */
	protected $message = "Header already sent";

	/**
	 * @var int
	 */
	protected $code = 10;
}