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

	public function setModificationdate(int $modificationdate): Right
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
