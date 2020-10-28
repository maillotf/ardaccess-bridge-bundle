<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIPagination;

/**
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface CarrierInterface
{

	public function Carrier(?string $sessionId, string $action, array $attributes): array;

	public function ListCarriers(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;

	public function CarrierGroup(?string $sessionId, string $action, array $attributes): array;

	public function GroupFolder(?string $sessionId, string $action, array $attributes): array;

	public function SetCarrierGroup(?string $sessionId, int $carrierId, array $carriergroupIds, bool $eraseGroup = true, bool $strict = false): bool;

	public function RemoveCarrierGroup(?string $sessionId, int $carrierId, array $carriergroupIds, bool $strict = false): bool;

	public function SetCarrierImage(?string $sessionId, int $carrierId, bool $append, string $imageName, string $imageData, bool $strict = false): bool;

	public function ListCarrierGroupFolders(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;

	public function ListCarrierGroups(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
}
