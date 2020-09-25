<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * 
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class APIAttribute
{

	/**
	 * The attribute name.
	 *
	 * @var string
	 */
	public $index;

	/**
	 * The attribute value.
	 *
	 * @var string
	 */
	public $value;

	public function setIndex(string $index): APIAttribute
	{
		$this->index = $index;
		return ($this);
	}

	public function getIndex(): string
	{
		return ($this->index);
	}

	public function setValue($value): APIAttribute
	{
		$this->value = $value;
		return ($this);
	}

	public function getValue()
	{
		return ($this->value);
	}

}
