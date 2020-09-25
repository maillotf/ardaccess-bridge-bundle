<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Helpers;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\AbstractWS;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\ArdaccessService;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\Transition;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\Transitions;

/**
 * Helper for SmartObject
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class SmartObjectHelper
{

	/**
	 *
	 * @var ArdaccessService
	 */
	private $aas;

	public function __construct(ArdaccessService $ardAccessService)
	{
		$this->aas = $ardAccessService;
	}

	private function getTransitionHandback(Transitions $transitions): ?Transition
	{
		/* @var $transition Transition */
		if (!empty($transitions->items))
			foreach ($transitions->items as $transition)
			{
				if ($transition->getLabel() == 'handback')
					return ($transition);
			}
		return (null);
	}

	/**
	 * Handback a smart object
	 * 
	 * @param int $smartObjectId
	 * @return bool
	 * @author Flavien Maillot 
	 */
	public function handbackSmartObject(int $smartObjectId): bool
	{
		/* @var $smart_objects \MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList */
		$smartObjectsList = $this->aas->cms->ListSmartObjectTransitions(null, $smartObjectId);

		/* @var $transitions Transitions */
		$transitions = AbstractWS::cast($smartObjectsList, 'Transitions');

		/* @var $transition Transition */
		$transition = $this->getTransitionHandback($transitions);
		if ($transition != null)
			$transitionId = $transition->getUid();
		else
			return (false);

		$success = $this->aas->cms->SmartObjectTransition(null, $smartObjectId, $transitionId);
		return $success;
	}

	/**
	 * Transfert smart object to another carrier
	 * 
	 * @param int $smartObjectId
	 * @param int $carrierId
	 * @return bool
	 * @author Flavien Maillot 
	 */
	public function transfertSmartObject(int $smartObjectId, int $carrierId): bool
	{
		$this->handbackSmartObject($smartObjectId);

		$success = $this->aas->cms->DeliverSmartObject(null, $smartObjectId, $carrierId);
		return ($success);
	}

}
