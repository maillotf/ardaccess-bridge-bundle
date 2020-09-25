<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Transition extends AbstractArdObject
{

	private $uid;
	private $label;

	/**
	 *
	 * @var string 
	 */
	private $description;

	/**
	 *
	 * @var int
	 */
	private $endstate_uid;

	/**
	 *
	 * @var string 
	 */
	private $endstate_label;

	/**
	 *
	 * @var string
	 */
	private $endstate_description;

	/**
	 *
	 * @var int
	 */
	private $startstate_uid;

	public function setUid(int $uid): Transition
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setLabel(string $label): Transition
	{
		$this->label = $label;
		return ($this);
	}

	/**
	 * 
	 * @return string outoforder lostorstolen deactivate handback
	 */
	public function getLabel(): string
	{
		if ($this->label == null)
		{
			return ('');
		}
		return ($this->label);
	}

	public function setDescription(string $description): Transition
	{
		$this->description = $description;
		return ($this);
	}

	public function getDescription(): string
	{
		return ($this->description);
	}

	public function setEndstate_uid(string $endstate_uid): Transition
	{
		$this->endstate_uid = $endstate_uid;
		return ($this);
	}

	public function getEndstate_uid(): string
	{
		return ($this->endstate_uid);
	}

	public function setEndstate_label(string $endstate_label): Transition
	{
		$this->endstate_label = $endstate_label;
		return ($this);
	}

	public function getEndstate_label(): string
	{
		return ($this->endstate_label);
	}

	public function setEndstate_description(string $endstate_description): Transition
	{
		$this->endstate_description = $endstate_description;
		return ($this);
	}

	public function getEndstate_description(): string
	{
		return ($this->endstate_description);
	}

	public function setStartstate_uid(string $startstate_uid): Transition
	{
		$this->startstate_uid = $startstate_uid;
		return ($this);
	}

	public function getStartstate_uid(): string
	{
		return ($this->startstate_uid);
	}

}
