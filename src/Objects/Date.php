<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Date extends AbstractArdObject
{

	/**
	 *
	 * @var int 
	 */
	private $uid;

	/**
	 *
	 * @var string
	 */
	private $name;

	/**
	 *
	 * @var int
	 */
	private $startdate;

	/**
	 *
	 * @var int 
	 */
	private $enddate;

	public function setUid(int $uid): Date
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setName(string $name): Date
	{
		$this->name = $name;
		return ($this);
	}

	public function getName(): string
	{
		return ($this->name);
	}

	public function setStartdate(int $startdate): Date
	{
		$this->startdate = $startdate;
		return ($this);
	}

	public function getStartdate(): int
	{
		return $this->startdate;
	}

	public function setEnddate(int $enddate): Date
	{
		$this->enddate = $enddate;
		return ($this);
	}

	public function getEnddate(): int
	{
		return $this->enddate;
	}

}
