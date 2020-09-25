<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * 
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class CarrierGroup extends AbstractArdObject
{

	public $item;

	/**
	 *
	 * @var int 
	 */
	private $uid;

	/**
	 *
	 * @var int
	 */
	private $parent;

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
	 * @var bool
	 */
	private $disabled;
	private $sandboxes;

	/**
	 *
	 * @var string
	 */
	private $parentpath;
	private $rid;

	public function setUid(int $uid): CarrierGroup
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setParent(int $parent): CarrierGroup
	{
		$this->parent = $parent;
		return ($this);
	}

	public function getParent(): int
	{
		return ($this->parent);
	}

	public function setName(string $name): CarrierGroup
	{
		$this->name = $name;
		return ($this);
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setDescription(string $description): CarrierGroup
	{
		$this->description = $description;
		return ($this);
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDisabled(string $disabled): CarrierGroup
	{
		$this->disabled = $disabled;
		return ($this);
	}

	public function getDisabled(): bool
	{
		return $this->disabled;
	}

	public function isDisabled(): bool
	{
		return $this->disabled;
	}

	public function setSandboxes($sandboxes): CarrierGroup
	{
		$this->sandboxes = $sandboxes;
		return ($this);
	}

	public function getSandboxes()
	{
		return $this->sandboxes;
	}

	public function setParentpath(string $parentpath): CarrierGroup
	{
		$this->parentpath = $parentpath;
		return ($this);
	}

	public function getParentpath(): string
	{
		return $this->parentpath;
	}

	public function setRid(string $rid): CarrierGroup
	{
		$this->rid = $rid;
		return ($this);
	}

	public function getRid(): bool
	{
		return $this->rid;
	}

}
