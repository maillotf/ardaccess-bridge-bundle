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
	 * @var \DateTime
	 */
	private $creationdatetime = null;

	/**
	 *
	 * @var int 
	 */
	private $modificationdate;
	
	/**
	 *
	 * @var \DateTime
	 */
	private $modificationdatetime = null;

	/**
	 *
	 * @var DateTimeZone
	 */
	private $datetimezone;

	public function init()
	{
		parent::init();
		$this->setDatetimezone('Europe/Paris');
	}
	
	public function __construct($datetimezone = 'Europe/Paris')
	{
		$this->datetimezone = new \DateTimeZone($datetimezone);
	}
	
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

	public function getCreationdatetime(): ?\DateTime
	{
		if ($this->creationdatetime == null)
		{
			$this->creationdatetime = new \DateTime();
			$this->creationdatetime->setTimezone($this->datetimezone);
			$this->creationdatetime->setTimestamp($this->getCreationdate());
		}
		return ($this->creationdatetime);
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
	
	public function getModificationdatetime(): ?\DateTime
	{
		if ($this->modificationdatetime == null)
		{
			$this->modificationdatetime = new \DateTime();
			$this->modificationdatetime->setTimezone($this->datetimezone);
			$this->modificationdatetime->setTimestamp($this->getModificationdate());
		}
		return ($this->modificationdatetime);
	}

	public function setDatetimezone(string $datetimezone)
	{
		$this->datetimezone = new \DateTimeZone($datetimezone);
		return ($this);
	}
	
	public function getDatetimezone(): \DateTimeZone
	{
		return ($this->datetimezone);
	}
}
