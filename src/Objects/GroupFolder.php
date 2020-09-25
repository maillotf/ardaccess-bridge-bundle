<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * 
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class GroupFolder extends AbstractArdObject
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

	public function setUid(int $uid): GroupFolder
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setParent(int $parent): GroupFolder
	{
		$this->parent = $parent;
		return ($this);
	}

	public function getParent(): int
	{
		return ($this->parent);
	}

	public function setName(string $name): GroupFolder
	{
		$this->name = $name;
		return ($this);
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setDescription(string $description): GroupFolder
	{
		$this->description = $description;
		return ($this);
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setDisabled(string $disabled): GroupFolder
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

}
