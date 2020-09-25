<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * Session data creation response.
 *
 * @pw_element boolean $success Wether session was created or not.
 * @pw_element string $sessionId Session Id if session was created.
 * @pw_complex SessionData
 * 
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class SessionData
{
	/**
	 * Wether session was created or not.
	 *
	 * @var boolean
	 */
	public $success;
	/**
	 * Session Id if session was created.
	 *
	 * @var string
	 */
	public $sessionId;
}
