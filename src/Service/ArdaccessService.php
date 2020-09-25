<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Helpers\SmartObjectHelper;

/**
 * Class ArdaccessService
 *
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class ArdaccessService implements ArdaccessServiceInterface
{

	/**
	 *
	 * @var Access
	 */
	public $access;

	/**
	 *
	 * @var Carrier
	 */
	public $carrier;

	/**
	 *
	 * @var Cms
	 */
	public $cms;

	/**
	 *
	 * @var Creator
	 */
	public $creator;

	/**
	 *
	 * @var Supervision
	 */
	public $supervision;
	
	/**
	 *
	 * @var SmartObjectHelper
	 */
	public $smartobjectHelper = null;

	public function __construct(
			Creator $creator,
			Carrier $carrier,
			Access $access,
			Cms $cms,
			Supervision $supervision
	)
	{
		$this->access = $access;
		$this->carrier = $carrier;
		$this->cms = $cms;
		$this->creator = $creator;
		$this->supervision = $supervision;
	}

	public function getSmartObjectHelper(): SmartObjectHelper
	{
		if ($this->smartobjectHelper == null)
			$this->smartobjectHelper = new SmartObjectHelper($this);
		return ($this->smartobjectHelper);
	}
}
