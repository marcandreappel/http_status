<?php
/**
 * HttpStatus.php
 * @author      Marc-André Appel <marc-andre@hybride-conseil.fr>
 * @copyright   2018 Hybride Conseil
 * @license     http://opensource.org/licenses/MIT MIT
 * @link        https://www.hybride-conseil.fr
 * @created     19/06/2018
 */

namespace MarcAndreAppel\HttpStatus;


trait HttpStatusTrait
{
	public function httpStatusCode(int $code = null, array $args = null): object
	{
		$httpStatus = new HttpStatus($code);
		$httpStatus->code = $code;

		if ( ! is_null($args)) {
			foreach ($args as $key => $value) {
				if (property_exists($httpStatus, $key)) $httpStatus->$key = $value;
			}
		}

		return $httpStatus;
	}
}

