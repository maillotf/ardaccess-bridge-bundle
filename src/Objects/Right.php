<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Right extends AbstractArdObject
{

	/**
	 *
	 * @var int 
	 */
	private $uid;

	/**
	 *
	 * @var int
	 */
	private $group;

	/**
	 *
	 * @var int
	 */
	private $accesspoint;

	/**
	 *
	 * @var int
	 */
	private $weeklyschedule;

	/**
	 *
	 * @var int 
	 */
	private $carrier;

	/**
	 *
	 * @var int
	 */
	private $creationdate;

	/**
	 *
	 * @var int
	 */
	private $modificationdate;

	public function setUid(int $uid): Right
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setGroup(int $group): Right
	{
		$this->group = $group;
		return ($this);
	}

	public function getGroup(): int
	{
		return ($this->group);
	}

	public function setAccesspoint(int $accesspoint): Right
	{
		$this->accesspoint = $accesspoint;
		return ($this);
	}

	public function getAccesspoint(): int
	{
		return $this->accesspoint;
	}

	public function setWeeklyschedule(int $weeklyschedule): Right
	{
		$this->weeklyschedule = $weeklyschedule;
		return ($this);
	}

	public function getWeeklyschedule(): int
	{
		return $this->weeklyschedule;
	}

	public function setCarrier(int $carrier): Right
	{
		$this->carrier = $carrier;
		return ($this);
	}

	public function getCarrier(): int
	{
		return ($this->carrier);
	}

	public function setCreationdate(int $creationdate): Right
	{
		$this->creationdate = $creationdate;
		return ($this);
	}

	public function getCreationdate(): int
	{
		return $this->creationdate;
	}

	public function setModificationdate(int $modificationdate): Right
	{
		$this->modificationdate = $modificationdate;
		return ($this);
	}

	public function getModificationdate(): int
	{
		return $this->modificationdate;
	}

}
