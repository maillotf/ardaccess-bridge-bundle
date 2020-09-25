<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class WeekSchedule extends AbstractArdObject
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
	 * @var string
	 */
	private $description;

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

	public function setUid(int $uid): WeekSchedule
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setName(string $name): WeekSchedule
	{
		$this->name = $name;
		return ($this);
	}

	public function getName(): ?string
	{
		return ($this->name);
	}

	public function setDescription($description): WeekSchedule
	{
		$this->description = $description;
		return ($this);
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setCreationdate(int $creationdate): WeekSchedule
	{
		$this->creationdate = $creationdate;
		return ($this);
	}

	public function getCreationdate(): int
	{
		return $this->creationdate;
	}

	public function setModificationdate(int $modificationdate): WeekSchedule
	{
		$this->modificationdate = $modificationdate;
		return ($this);
	}

	public function getModificationdate(): int
	{
		return $this->modificationdate;
	}

}
