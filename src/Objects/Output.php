<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Output extends AbstractArdObject
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
	private $variable;

	/**
	 *
	 * @var int
	 */
	private $did;

	/**
	 *
	 * @var int
	 */
	private $stype;

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

	public function setUid(int $uid): Output
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setVariable(string $variable): Output
	{
		$this->variable = $variable;
		return ($this);
	}

	public function getVariable(): ?string
	{
		return ($this->variable);
	}

	public function setDid(int $did): Output
	{
		$this->did = $did;
		return ($this);
	}

	public function getDid(): int
	{
		return ($this->did);
	}

	public function setStype(int $stype): Output
	{
		$this->stype = $stype;
		return ($this);
	}

	public function getStype(): int
	{
		return ($this->stype);
	}

	public function setDescription($description): Output
	{
		$this->description = $description;
		return ($this);
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setCreationdate(int $creationdate): Output
	{
		$this->creationdate = $creationdate;
		return ($this);
	}

	public function getCreationdate(): int
	{
		return $this->creationdate;
	}

	public function setModificationdate(int $modificationdate): Output
	{
		$this->modificationdate = $modificationdate;
		return ($this);
	}

	public function getModificationdate(): int
	{
		return $this->modificationdate;
	}

}
