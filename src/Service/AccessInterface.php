<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;

/**
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface AccessInterface
{
	public function ListAccessPoints(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): array;

	public function WeekSchedule(?string $sessionId, string $action, array $attributes): array;
	
	public function DailySchedule(?string $sessionId, string $action, array $attributes): array;
	
	public function ListWeekSchedules(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
	
	public function GroupRight(?string $sessionId, string $action, array $attributes): array;
	
	public function CarrierRight(?string $sessionId, string $action, array $attributes): array;
	
	public function SmartObjectRight(?string $sessionId, string $action, array $attributes): array;
	
	public function ListRights(?string $sessionId = null, array $criteria = null, ?APIPagination $pagination = null): APIList;
	
	public function DateRange(?string $sessionId, int $calendarId, string $action, array $attributes): array;
	
	public function ListDateRanges(?string $sessionId, int $calendarId): APIList;
	
	public function ForceOutput(?string $sessionId, int $outputId, int $tempo);
	
	public function ListOutputs(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
}
