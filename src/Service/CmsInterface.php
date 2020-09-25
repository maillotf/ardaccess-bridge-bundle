<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;

/**
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface CmsInterface
{
	public function SmartObject(?string $sessionId = null, string $action = 'c', array $attributes = null): array;
	
	public function ListSmartObjects(?string $sessionId = null, ?array $criteria = null, ?array $pagination = null): APIList;
	
	public function ListSmartObjectTransitions($sessionId = null, int $smartObjectId = 0): Transitions;
	
	public function ListBlackList(?string $sessionId = null, ?array $criteria = null, ?array $pagination = null): array;
	
	public function DeliverSmartObject(?string $sessionId = null, int $smartObjectId = 0, int $carrierId = 0, bool $strict = false): bool;
		
	public function SmartObjectTransition(?string $sessionId = null, ?int $smartObjectId = null, ?int $transitionId = null, bool $strict = false): bool;
		
	public function SmartObjectGroup(?string $sessionId, string $action, array $attributes): array;
	
	public function ListSmartObjectGroupFolders(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
	
	public function ListSmartObjectGroups(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
}
