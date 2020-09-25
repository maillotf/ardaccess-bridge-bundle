<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag;

/**
 * Class Session
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Session extends AbstractWS implements SessionInterface
{

	/**
	 * Server protocol
	 * 
	 * @var string
	 */
	private $protocol;

	/**
	 * Username
	 * 
	 * @var string|null
	 */
	private $username;

	/**
	 * Password
	 * 
	 * @var string|null 
	 */
	private $password;

	/**
	 *
	 * @var string 
	 */
	private $jsessionPath;

	/**
	 *
	 * @var array
	 */
	private $jsession;

	/**
	 *
	 * @var string 
	 */
	public $sessionId;

	public function __construct(
			string $session_root_dir,
			string $protocol,
			string $host,
			int $port,
			?string $username = null,
			?string $password = null
	)
	{
		$this->protocol = $protocol;
		$this->host = $host;
		$this->port = $port;
		$this->wsdlUri = $this->protocol . '://' . $this->host . ':' . $this->port . '/WS/ArdMcm/Session?WSDL';
		$this->username = $username;
		$this->password = $password;

		$this->jsessionPath = $session_root_dir;
		//Initialize JSession file
		if (!isset($this->getJSession()['session_id']))
			$this->setJSession(array('session_id' => null, 'session_time' => 0));

		parent::__construct();
	}

	public function getProtocol(): string
	{
		return ($this->protocol);
	}

	public function getHost(): string
	{
		return ($this->host);
	}

	private function getJSession()
	{
		if (file_exists($this->jsessionPath))
		{
			$this->jsession = json_decode(file_get_contents($this->jsessionPath), true);
			return ($this->jsession);
		}
		return (null);
	}

	private function setJSession($datas)
	{
		file_put_contents($this->jsessionPath, json_encode($datas));
	}

	/**
	 * 
	 * @param string $username
	 * @param string $password
	 */
	public function setIdentifiers(string $username, string $password): Session
	{
		$this->username = $username;
		$this->password = $password;
		return ($this);
	}

	public function setSessionId(string $sessionId): Session
	{
		if ($sessionId != $this->getJSession()['session_id'] || $this->getJSession()['session_id'] == NULL)
		{
			$this->setJSession(array('session_id' => $sessionId, 'session_time' => time()));
		}

		$this->sessionId = $sessionId;
		return ($this);
	}

	public function getSessionId(): string
	{
		if ($this->sessionId == NULL)
			$this->sessionId = $this->getJSession()['session_id'];
		if ($this->getJSession()['session_time'] + 300 < time())
		{
			$this->Login();
		}

		return ($this->sessionId);
	}

	/**
	 * Open a user session on our system.
	 * User must have a valid application ID, client ID and site ID (all 3 are given by ARD's client handling application).
	 * User must have permission to access webservices. Sessions expire after $this->sessionTimeout seconds (default is 300 ie 5 minutes).
	 *
	 * @param string $user The user username (unique in system).
	 * @param string $password The user password (must not be empty).
	 * @return SessionData Return success true and a sessionId if login was successful, success false if login was not performed (bad id, bad password...).
	 */
	public function Login(?string $user = null, ?string $password = null)
	{
		if ($user == null || $password == null)
		{
			$user = $this->username;
			$password = $this->password;
		}

		//User has no webservice permissions
		$result = $this->_Call('Login', Array(
			$user,
			$password
		));

		if (is_object($result) && $result->sessionId != null)
		{
			$this->setSessionId($result->sessionId);
		}
		return ($result);
	}

	/**
	 * Close a user session on our system.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @return boolean
	 */
	public function Logout(string $sessionId)
	{
		return $this->_Call('Logout', Array(
					$sessionId
		));
	}

}
