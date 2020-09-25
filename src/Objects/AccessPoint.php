<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class AccessPoint extends AbstractArdObject
{
	
	private $uid;
	
	private $name;
	
	private $description;
	
	public function setUid(int $uid): AccessPoint
	{
		$this->uid = $uid;
		return ($this);
	}
	
	public function getUid(): int
	{
		return ($this->uid);
	}
	
	public function setName(string $name): AccessPoint
	{
		$this->name = $name;
		return ($this);
	}
	
	public function getName(): string
	{
		return ($this->name);
	}

	public function setDescription($description): AccessPoint
	{
		$this->description = $description;
		return ($this);
	}
	
	public function getDescription():string
	{
		return $this->description;
	}
}
