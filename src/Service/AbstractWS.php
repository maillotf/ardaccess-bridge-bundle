<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

/**
 * Abstract class AbstractWS
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
abstract class AbstractWS
{

	/**
	 * Server hostname
	 * 
	 * @var string 
	 */
	protected $host;

	/**
	 * Server port
	 * 
	 * @var int 
	 */
	protected $port;

	/**
	 * The WSDL URI
	 *
	 * @var string
	 */
	protected $wsdlUri = '';

	/**
	 * The PHP SoapClient object
	 *
	 * @var \SoapClient
	 */
	protected $client = null;

	/**
	 *
	 * @var Session
	 */
	protected $session = null;

	public function __construct(?SessionInterface $session = null)
	{
		if ($session != null)
			$this->session = $session;
		if ($this->session != null)
		{
			$this->host = $this->session->getHost();
			$this->port = $this->session->getPort();
		}
		$this->client = new \SoapClient(
				$this->wsdlUri,
				array(
			'proxy_host' => $this->host,
			'proxy_port' => $this->port
				)
		);
	}

	public function getHost(): string
	{
		return ($this->host);
	}

	public function getPort(): string
	{
		return ($this->port);
	}

	/**
	 * Send a SOAP request to the server
	 *
	 * @param string $method The method name
	 * @param array $param The parameters
	 * @return mixed The server response
	 */
	protected function _Call($method, $param)
	{
		try
		{
			$result = $this->client->__soapCall($method, $param);
			return ($result);
		} catch (\SoapFault $exc)
		{
			$message = $exc->getMessage();
			if (preg_match('/checkSession No session found/', $message) == true)
				$this->session->Login();
			elseif (preg_match('/checkSession Session expired/', $message) == true)
				$this->session->Login();
			return ($message);
		}
	}

	/**
	 * 
	 * @param type $instance
	 * @param string $className
	 * @return type
	 * @author Flavien Maillot 
	 */
	public static function cast($instance, string $className)
	{
		$className = 'MaillotF\\Ardaccess\\ArdaccessBridgeBundle\\Objects\\' . $className;
		$result = unserialize(sprintf(
						'O:%d:"%s"%s',
						\strlen($className),
						$className,
						strstr(strstr(serialize($instance), '"'), ':')
		));
		$result->init();
		return ($result);
	}

}
