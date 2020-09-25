<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Subscription
{
		
	/**
	 *
	 * @var string 
	 */
	private $clientid;
	
	/**
	 *
	 * @var string
	 */
	public $event;
	
	/**
	 *
	 * @var int
	 */
	public $filter;
	
	/**
	 *
	 * @var int
	 */
	public $protocol;

	/**
	 *
	 * @var int
	 */
	public $uri;
	
	/**
	 *
	 * @var int
	 */
	private $mappingclass;
	
	public function setClientid(string $clientid): Subscription
	{
		$this->clientid = $clientid;
		return ($this);
	}
	
	public function getClientid(): string
	{
		return ($this->clientid);
	}
	
	public function setEvent(string $event): Subscription
	{
		$this->event = $event;
		return ($this);
	}
	
	public function getEvent(): string
	{
		return ($this->event);
	}
	
	public function setFilter(string $filter): Subscription
	{
		$this->filter = $filter;
		return ($this);
	}
	
	public function getFilter(): string
	{
		return ($this->filter);
	}
	
	public function setProtocol(string $protocol): Subscription
	{
		$this->protocol = $protocol;
		return ($this);
	}
	
	public function getProtocol(): string
	{
		return ($this->protocol);
	}
	
	public function setUri(string $uri): Subscription
	{
		$this->uri = $uri;
		return ($this);
	}
	
	public function getUri(): string
	{
		return ($this->uri);
	}
	
	public function setMappingclass(string $mappingclass): Subscription
	{
		$this->mappingclass = $mappingclass;
		return ($this);
	}
	
	public function getMappingclass(): string
	{
		return $this->mappingclass;
	}
}
