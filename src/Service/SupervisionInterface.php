<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIAttributeArray;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;

/**
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface SupervisionInterface
{
	public function Event(?string $sessionId, array $attributes): array;
	public function EventObj(APIAttributeArray $attributes, ?string $sessionId): APIAttributeArray;
	
	public function ListEvents(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
	
	public function ListSubscriptions(?string $sessionId = null, ?APIPagination $pagination = null): APIList;
	
	public function Subscribe(?string $sessionId, string $event, ?array $filter, string $protocol, string $url, ?string $mapperclass = null);
	
	public function Unsubscribe(?string $sessionId, string $event, string $protocol);
}
