<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Event extends AbstractArdObject
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
	public $description;

	/**
	 *
	 * @var int
	 */
	public $eventtype;

	/**
	 *
	 * @var int
	 */
	public $eventsubtype;

	/**
	 *
	 * @var int
	 */
	public $deleted;

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

	/**
	 *
	 * @var int
	 */
	private $date;

	/**
	 *
	 * @var int
	 */
	private $deviceuid;

	/**
	 *
	 * @var int
	 */
	private $accesspointuid;

	/**
	 *
	 * @var int
	 */
	private $readeruid;

	/**
	 *
	 * @var int 
	 */
	private $useruid;

	/**
	 *
	 * @var int 
	 */
	private $zoneuid;

	/**
	 *
	 * @var int 
	 */
	private $souid;

	public function setUid(int $uid): Event
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setDescription(string $description): Event
	{
		$this->description = $description;
		return ($this);
	}

	public function getDescription(): string
	{
		return ($this->description);
	}

	public function setEventtype(int $eventtype): Event
	{
		$this->eventtype = $eventtype;
		return ($this);
	}

	public function getEventtype(): int
	{
		return ($this->eventtype);
	}

	public function setEventsubtype(int $eventsubtype): Event
	{
		$this->eventsubtype = $eventsubtype;
		return ($this);
	}

	public function getEventsubtype(): int
	{
		return ($this->eventsubtype);
	}

	public function setDeleted(int $deleted): Event
	{
		$this->deleted = $deleted;
		return ($this);
	}

	public function getDeleted(): int
	{
		return ($this->deleted);
	}

	public function setCreationdate(int $creationdate): Event
	{
		$this->creationdate = $creationdate;
		return ($this);
	}

	public function getCreationdate(): int
	{
		return $this->creationdate;
	}

	public function setModificationdate(int $modificationdate): Event
	{
		$this->modificationdate = $modificationdate;
		return ($this);
	}

	public function getModificationdate(): int
	{
		return $this->modificationdate;
	}

	public function setDate(int $date): Event
	{
		$this->date = $date;
		return ($this);
	}

	public function getDate(): int
	{
		return ($this->date);
	}

	public function setDeviceuid(int $deviceuid): Event
	{
		$this->deviceuid = $deviceuid;
		return ($this);
	}

	public function getDeviceuid(): int
	{
		return ($this->deviceuid);
	}

	public function setAccesspointuid(int $accesspointuid): Event
	{
		$this->accesspointuid = $accesspointuid;
		return ($this);
	}

	public function getAccesspointuid(): int
	{
		return $this->accesspointuid;
	}

	public function setReaderuid(string $readeruid): Event
	{
		$this->readeruid = $readeruid;
		return ($this);
	}

	public function getReaderuid(): int
	{
		return $this->readeruid;
	}

	public function setUseruid(int $useruid): Event
	{
		$this->useruid = $useruid;
		return ($this);
	}

	public function getUseruid(): int
	{
		return ($this->useruid);
	}

	public function setZoneuid(int $zoneuid): Event
	{
		$this->zoneuid = $zoneuid;
		return ($this);
	}

	public function getZoneuid(): int
	{
		return ($this->zoneuid);
	}

	public function setSouid(int $souid): Event
	{
		$this->souid = $souid;
		return ($this);
	}

	public function getSouid(): int
	{
		return ($this->souid);
	}

}
