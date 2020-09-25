<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

/**
 * Interface Session
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface SessionInterface
{
	public function getProtocol(): string;
	
	public function getHost(): string;
	
	public function setIdentifiers(string $username, string $password): Session;
	
	public function setSessionId(string $sessionId): Session;
	
	public function getSessionId(): string;
	
	public function Login(?string $user = null, ?string $password = null);
	
	public function Logout(string $sessionId);
}
