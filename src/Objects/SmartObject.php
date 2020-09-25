<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class SmartObject extends AbstractArdObject
{

	private $uid;
	private $nid;
	private $carrier;

	/**
	 *
	 * @var string
	 */
	private $uuid;

	/**
	 *
	 * @var int
	 */
	private $valid;

	/**
	 *
	 * @var string
	 */
	private $begindate;

	/**
	 *
	 * @var string
	 */
	private $enddate;

	/**
	 *
	 * @var string
	 */
	private $groups;

	/**
	 *
	 * @var string
	 */
	private $type;

	/**
	 *
	 * @var int
	 */
	private $stateid;

	/**
	 *
	 * @var string
	 */
	private $statelabel;

	public function setUid(int $uid): SmartObject
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setNid(string $nid): SmartObject
	{
		$this->nid = str_pad($nid, 16, "0", STR_PAD_LEFT);
		return ($this);
	}

	public function getNid(): string
	{
		return ($this->nid);
	}

	public function getShortNid(): string
	{
		$output = preg_replace('/^(00)*/', '', $this->nid);
		return ($output);
	}

	public function setCarrier($carrier): SmartObject
	{
		if ($carrier == 'null')
			$carrier = null;
		$this->carrier = $carrier;
		return ($this);
	}

	public function getCarrier(): ?int
	{
		return $this->carrier;
	}

	public function setUuid(string $uuid): SmartObject
	{
		$this->uuid = $uuid;
		return ($this);
	}

	public function getUuid(): string
	{
		return ($this->uuid);
	}

	public function setValid(string $valid): SmartObject
	{
		$this->valid = $valid;
		return ($this);
	}

	public function getValid(): string
	{
		return ($this->valid);
	}

	public function setBegindate(string $begindate): SmartObject
	{
		$this->begindate = $begindate;
		return ($this);
	}

	public function getBegindate(): string
	{
		return ($this->begindate);
	}

	public function setEnddate(string $enddate): SmartObject
	{
		$this->enddate = $enddate;
		return ($this);
	}

	public function getEnddate(): string
	{
		return ($this->enddate);
	}

	public function setGroups(string $groups): SmartObject
	{
		$this->groups = $groups;
		return ($this);
	}

	public function getGroups(): string
	{
		return ($this->groups);
	}

	public function setType(string $type): SmartObject
	{
		$this->type = $type;
		return ($this);
	}

	public function getType(): string
	{
		return ($this->Type);
	}

	public function setStateid(string $stateid): SmartObject
	{
		$this->stateid = $stateid;
		return ($this);
	}

	public function getStateid(): string
	{
		return ($this->stateid);
	}

	public function setStatelabel(string $statelabel): SmartObject
	{
		$this->statelabel = $statelabel;
		return ($this);
	}

	public function getStatelabel(): string
	{
		return ($this->statelabel);
	}

}
