<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 *  
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Carrier extends AbstractArdObject
{

	/**
	 *
	 * @var int 
	 */
	private $uid;

	/**
	 *
	 * @var int|null
	 */
	private $rid;

	/**
	 *
	 * @var string
	 */
	private $firstname;

	/**
	 *
	 * @var string
	 */
	private $lastname;

	/**
	 *
	 * @var string
	 */
	private $usergroup;

	/**
	 *
	 * @var int
	 */
	private $begindate;

	/**
	 *
	 * @var \DateTime|null
	 */
	private $begindatedatetime = null;

	/**
	 *
	 * @var int
	 */
	private $enddate;

	/**
	 * @var \DateTime|null
	 */
	private $enddatedatetime = null;

	/**
	 *
	 * @var bool 
	 */
	private $disabled;
	private $image;
	private $telephone;
	private $email;
	private $address;
	private $zip;
	private $city;
	private $country;
	private $comments;
	private $dateofbirth;
	/**
	 * @var \DateTime|null
	 */
	private $dateofbirthdatetime;
	private $userfield0;
	private $userfield1;
	private $userfield2;
	private $userfield3;
	private $userfield4;
	private $userfield5;
	private $userfield6;
	private $userfield7;
	private $userfield8;
	private $userfield9;
	/**
	 *
	 * @var DateTimeZone
	 */
	private $datetimezone;

	public function init()
	{
		if ($this->item != null)
		{
			foreach ($this->item as $value)
			{
				$method = 'set' . ucfirst($value->index);
				if ($method == 'setRid' && is_string($value->value) && !is_numeric($value->value))
				{
					$value->value = null;
				}
				if (method_exists($this, $method))
					$this->$method($value->value);
			}
			$this->setDatetimezone('Europe/Paris');
		}
	}

	public function __construct($datetimezone = 'Europe/Paris')
	{
		$this->datetimezone = new \DateTimeZone($datetimezone);
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

	public function setUid(int $uid): Carrier
	{
		$this->uid = $uid;
		return ($this);
	}

	public function getUid(): int
	{
		return ($this->uid);
	}

	public function setRid(?int $rid): Carrier
	{
		$this->rid = $rid;
		return ($this);
	}

	public function getRid(): ?int
	{
		return ($this->rid);
	}

	public function setFirstname(string $firstname): Carrier
	{
		$this->firstname = $firstname;
		return ($this);
	}

	public function getFirstname(): string
	{
		return $this->firstname;
	}

	public function setLastname(string $lastname): Carrier
	{
		$this->lastname = $lastname;
		return ($this);
	}

	public function getLastname(): string
	{
		return $this->lastname;
	}

	public function setUsergroup($usergroup): Carrier
	{
		$this->usergroup = $usergroup;
		return ($this);
	}

	public function getUsergroup(): string
	{
		return ($this->usergroup);
	}

	public function setBegindate(int $begindate): Carrier
	{
		$this->begindate = $begindate;
		return ($this);
	}

	public function getBegindate(): int
	{
		return ($this->begindate);
	}

	public function getBegindateDatetime(): ?\DateTime
	{
		if ($this->begindatedatetime == null)
		{
			if ($this->begindate == 0)
				return (null);
			$this->begindatedatetime = new \DateTime();
			$this->begindatedatetime->setTimezone($this->datetimezone);
			$this->begindatedatetime->setTimestamp($this->getBegindate());
		}
		return ($this->begindatedatetime);
	}

	public function setenddate(int $enddate): Carrier
	{
		$this->enddate = $enddate;
		return ($this);
	}

	public function getEnddate(): int
	{
		return ($this->enddate);
	}

	public function getEnddateDatetime(): ?\DateTime
	{
		if ($this->enddatedatetime == null)
		{
			if ($this->enddate == 0)
				return (null);
			$this->enddatedatetime = new \DateTime();
			$this->enddatedatetime->setTimezone($this->datetimezone);
			$this->enddatedatetime->setTimestamp($this->getEnddate());
		}
		return ($this->enddatedatetime);
	}

	public function setDisabled(bool $disabled): Carrier
	{
		$this->disabled = $disabled;
		return ($this);
	}

	public function getDisabled(): bool
	{
		return ($this->disabled);
	}

	public function isDisabled(): bool
	{
		return ($this->disabled);
	}

	public function setImage($image): Carrier
	{
		$this->image = $image;
		return ($this);
	}

	public function getImage()
	{
		return $this->image;
	}

	public function setTelephone($telephone): Carrier
	{
		$this->telephone = $telephone;
		return ($this);
	}

	public function getTelephone()
	{
		return $this->telephone;
	}

	public function setEmail($email): Carrier
	{
		$this->email = $email;
		return ($this);
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setAddress($address): Carrier
	{
		$this->address = $address;
		return ($this);
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function setZip($zip): Carrier
	{
		$this->zip = $zip;
		return ($this);
	}

	public function getZip()
	{
		return $this->zip;
	}

	public function setCity($city): Carrier
	{
		$this->city = $city;
		return ($this);
	}

	public function getCity()
	{
		return $this->city;
	}

	public function setCountry($country): Carrier
	{
		$this->country = $country;
		return ($this);
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function setComments($comments): Carrier
	{
		$this->comments = $comments;
		return ($this);
	}

	public function getComments()
	{
		return $this->comments;
	}

	public function setDateofbirth($dateofbirth): Carrier
	{
		$this->dateofbirth = $dateofbirth;
		return ($this);
	}

	public function getDateofbirth()
	{
		return $this->dateofbirth;
	}

	public function getDateofbirthdatetime(): ?\DateTime
	{
		if ($this->dateofbirthdatetime == null)
		{
			if ($this->dateofbirth == 0)
				return (null);
			$this->dateofbirthdatetime = new \DateTime();
			$this->dateofbirthdatetime->setTimezone($this->datetimezone);
			$this->dateofbirthdatetime->setTimestamp($this->getBegindate());
		}
		return ($this->dateofbirthdatetime);
	}

	public function setUserfield0($userfield): Carrier
	{
		$this->userfield0 = $userfield;
		return ($this);
	}

	public function getUserfield0()
	{
		return $this->userfield0;
	}

	public function setUserfield1($userfield): Carrier
	{
		$this->userfield1 = $userfield;
		return ($this);
	}

	public function getUserfield1()
	{
		return $this->userfield1;
	}

	public function setUserfield2($userfield): Carrier
	{
		$this->userfield2 = $userfield;
		return ($this);
	}

	public function getUserfield2()
	{
		return $this->userfield2;
	}

	public function setUserfield3($userfield): Carrier
	{
		$this->userfield3 = $userfield;
		return ($this);
	}

	public function getUserfield3()
	{
		return $this->userfield3;
	}

	public function setUserfield4($userfield): Carrier
	{
		$this->userfield4 = $userfield;
		return ($this);
	}

	public function getUserfield4()
	{
		return $this->userfield4;
	}

	public function setUserfield5($userfield): Carrier
	{
		$this->userfield5 = $userfield;
		return ($this);
	}

	public function getUserfield5()
	{
		return $this->userfield5;
	}

	public function setUserfield6($userfield): Carrier
	{
		$this->userfield6 = $userfield;
		return ($this);
	}

	public function getUserfield6()
	{
		return $this->userfield6;
	}

	public function setUserfield7($userfield): Carrier
	{
		$this->userfield7 = $userfield;
		return ($this);
	}

	public function getUserfield7()
	{
		return $this->userfield7;
	}

	public function setUserfield8($userfield): Carrier
	{
		$this->userfield8 = $userfield;
		return ($this);
	}

	public function getUserfield8()
	{
		return $this->userfield8;
	}

	public function setUserfield9($userfield): Carrier
	{
		$this->userfield9 = $userfield;
		return ($this);
	}

	public function getUserfield9()
	{
		return $this->userfield9;
	}

}
