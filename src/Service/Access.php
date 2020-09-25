<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\SessionInterface;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;

/**
 * Description of Access
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Access extends AbstractWS implements AccessInterface
{

	public function __construct(SessionInterface $session = null)
	{
		//Define wsdlUri for the client
		$this->wsdlUri = $session->getProtocol() . '://' . $session->getHost() . ':' . $session->getPort() . '/WS/ArdAccess/Access?WSDL';

		parent::__construct($session);
	}

	/**
	 * Lists available access points based on search criteria.
	 * Available criteria:
	 * - uid (integer) :
	 * - name (string) :
	 * - description (string) :
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Returned items properties:
	 * - uid (integer) : unique id of acces point
	 * - name (string) : variable name of access point
	 * - description (string) : Human readable name of access point
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_PARAM : 'Error in criteria parameter'
	 * - E_INVALID_PAGINATION', 'Error in pagination parameter'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of records.
	 */
	public function ListAccessPoints(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListAccessPoints', Array(
			$sessionId,
			$criteria,
			$pagination
		));

		$result = Creator::castAttributes($apiResult->item);
		return ($result);
	}

	/**
	 * Create, update or delete week schedule .
	 * 
	 * 
	 * Available attributes:
	 * - uid (integer) : The week schedule unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The week schedule name.
	 * - description (string) : The week schedule description.
	 * - hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
	 * - taxons(string): The week schedule taxons (list of int separated by a comma).
	 * - devices (integer): The week schedule devices (used only for Forced schedule)
	 * - type (integer): The week schedule type (0: Time table 1:Forced schedule)
	 * - creationdate(timestamp): The week schedule crdate
	 * - modificationdate(timestamp): The week schedule tstamp
	 * 
	 * Returned item properties:
	 * - uid (integer) : The week schedule unique identifier.
	 * - name (string) : The week schedule name.
	 * - description (string) : The week schedule description.
	 * - hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
	 * - taxons(string): The week schedule taxons (list of int separated by a comma)
	 * - devices (integer): The week schedule devices (used only for Forced schedule)
	 * - type (integer): The week schedule type (0: Time table 1:Forced schedule)
	 * - creationdate(timestamp): The week schedule crdate
	 * - modificationdate(timestamp): The week schedule tstamp
	 * - modificationutilisateur(int): The week schedule upuser_id
	 * - creationutilisateur(int): The week schedule cruser_id
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_PARAM : 'Error in criteria parameter'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function WeekSchedule(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('WeekSchedule', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Create, update or delete daily schedule .
	 * Available attributes:
	 * - uid (integer) : The week schedule unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The week schedule name.
	 * - description (string) : The week schedule description.
	 * - hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
	 * - taxons(string): The week schedule taxons (list of int separated by a comma).
	 * - creationdate(timestamp): The week schedule crdate
	 * - modificationdate(timestamp): The week schedule tstamp
	 * Returned item properties:
	 * - uid (integer) : The week schedule unique identifier.
	 * - name (string) : The week schedule name.
	 * - description (string) : The week schedule description.
	 * - hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
	 * - taxons(string): The week schedule taxons (list of int separated by a comma)
	 * - creationdate(timestamp): The week schedule crdate
	 * - modificationdate(timestamp): The week schedule tstamp
	 * - modificationutilisateur(int): The week schedule upuser_id
	 * - creationutilisateur(int): The week schedule cruser_id
	 * Exceptions :
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_PARAM : 'Error in criteria parameter'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function DailySchedule(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('DailySchedule', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Lists available week schedules based on search criteria.
	 * 
	 * Available criteria:
	 * - uid (integer) : The week schedule unique identifier.
	 * - name (string) : The week schedule name.
	 * - description (string) : The week schedule description.
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Returned items properties:
	 * - uid (integer) : The week schedule unique identifier.
	 * - name (string) : The week schedule name.
	 * - description (string) : The week schedule description.
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_PARAM : 'Error in criteria parameter'
	 * - E_INVALID_PAGINATION', 'Error in pagination parameter'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of records.
	 */
	public function ListWeekSchedules(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListWeekSchedules', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('WeekSchedule');
		return ($result);
	}

	/**
	 * Create, update or delete rights on a carrier group.
	 * 
	 * Available attributes:
	 * - uid (integer) : The unique id of the access right. Required for update and delete.
	 * - group (integer) : The unique id of the group. Required for create.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	 * 
	 * Returned item properties:
	 * - uid (integer) : unique id of access right
	 * - group (integer) : The unique id of the group.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	 * Exceptions :
	 * - E_INVALID_PARAM : 'Error in action parameter'
	 * - E_INVALID_PARAM : 'Right already exists or error occured on insert.'
	 * - E_INVALID_PARAM : Action contains an invalid value. Correct values: c, u or d
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_ATTRIBUTES :'Attributes parameter is not valid.'
	 * - E_INVALID_ATTRIBUTE', 'Accesspoint id does not exist '
	 * - E_INVALID_ATTRIBUTE', 'Schedule id does not exist '
	 * - E_INVALID_ATTRIBUTE', 'Carrier group id does not exist '
	 * - E_RIGHT_EXISTS : 'Access right already exists or error on insert.'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for create, update and delete group must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function GroupRight(?string $sessionId, string $action, array $attributes): array
	{
		$apiResult = $this->_Call('GroupRight', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Create, update or delete rights on a carrier (individual rights).
	 * 
	 * Available attributes:
	 * - uid (integer) : The unique id of the access right. Required for update and delete.
	 * - carrier (integer) : The unique id of the carrier. Required for create.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	 * 
	 * Returned item properties:
	 * - uid (integer) : The unique id of the access right.
	 * - carrier (integer) : The unique id of the carrier.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM : 'Error in action parameter'
	 * - E_INVALID_PARAM : Action contains an invalid value. Correct values: c, u or d
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_ATTRIBUTES :'Attributes parameter is not valid.'
	 * - E_INVALID_ATTRIBUTE', 'Accesspoint id does not exist '
	 * - E_INVALID_ATTRIBUTE', 'Schedule id does not exist '
	 * - E_INVALID_ATTRIBUTE', 'Carrier id does not exist '
	 * - E_RIGHT_EXISTS : 'Access right already exists or error on insert.'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for create, update and delete carrier must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function CarrierRight(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('CarrierRight', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Create, update or delete rights on a smart object.
	 * 
	 * Available attributes:
	 * - uid (integer) : The unique id of the access right. Required for update and delete.
	 * - smartobject (integer) : The unique id of the smart object. Required for create.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	 * 
	 * Returned item properties:
	 * - uid (integer) : The unique id of the access right.
	 * - smartobject (integer) : The unique id of the smart object.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM : 'Error in action parameter'
	 * - E_INVALID_PARAM : 'Right already exists or error occured on insert.'
	 * - E_INVALID_PARAM : Action contains an invalid value. Correct values: c, u or d
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_ATTRIBUTES :'Attributes parameter is not valid.'
	 * - E_INVALID_ATTRIBUTE', 'Accesspoint id does not exist '
	 * - E_INVALID_ATTRIBUTE', 'Schedule id does not exist '
	 * - E_INVALID_ATTRIBUTE', 'Smart object id does not exist '
	 * - E_RIGHT_EXISTS : 'Access right already exists or error on insert.'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes  (for create, update and delete carrier must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function SmartObjectRight(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('SmartObjectRight', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Lists available access rights based on search criteria.
	 * 
	 * Available criteria:
	 * - uid (integer) : The access right unique identifier.
	 * - accesspoint (integer) : The access right access point.
	 * - weeklyschedule (integer) : The access right weekschedule.
	 * - carrier (integer) : The access right carrier.
	 * - group (integer) : The access right carrier group.
	 * - smartobject (integer) : The access right smart object unique identifier.
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Returned record properties:
	 * - uid (integer) : The access right unique identifier.
	 * - accesspoint (integer) : The access right access point.
	 * - weeklyschedule (integer) : The access right weekschedule. 0 means 24/24 7/7.
	 * - carrier (integer) : The access right carrier, if it's an individual right.
	 * - group (integer) : The access right carrier group, if it's a group right.
	 * - smartobject (integer) : The access right smart object unique identifier.
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_PARAM : 'Error in criteria parameter'
	 * - E_INVALID_PAGINATION', 'Error in pagination parameter'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of records.
	 */
	public function ListRights(?string $sessionId = null, array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListRights', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('Right');
		return ($result);
	}

	/**
	 * creates/updates/deletes a date range to a calendar. Before AVB 2.0 , calendar is unique with uid 1.
	 * Available attributes:
	 * - uid (integer) : The unique id of the access right. Required for update and delete.
	 * - name (string) : name Date Range
	 * - startdate (integer) : The unique id of the carrier. Required for create.
	 * - enddate (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * Dates set in 1970 will be repeated every year
	 * 
	 * Returned item properties:
	 * - uid (integer) : unique id of Date Range
	 * - name (string) : name Date Range
	 * - begindate (integer) : unix timestamp of begin of date range
	 * - enddate (integer) : unix timestamp of end of date range
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM
	 * - E_SQL
	 * - E_OTHER
	 *
	 * @param string $sessionId session id delivered by ArdMcm's SessionAPi Login method.
	 * @param integer $calendarId : unique id of calendar to which to add dates. If before AVB 2.0 must be set to 1
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for create, update and delete carrier must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function DateRange(?string $sessionId, int $calendarId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('DateRange', Array(
			$sessionId,
			$calendarId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * list date ranges of a calendar. Before AVB 2.0 , calendar is unique with uid 1.
	 * Returned record properties:
	 * - uid (integer) : unique id of Date Range
	 * - name (string) : name Date Range
	 * - begindate (integer) : unix timestamp of begin of date range
	 * - enddate (integer) : unix timestamp of end of date range
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM
	 * - E_SQL
	 * - E_OTHER
	 *
	 * @param string $sessionId session id delivered by ArdMcm's SessionAPi Login method.
	 * @param integer $calendarId : unique id of calendar to which to add dates. If before AVB 2.0 must be set to 1
	 * @return APIList Returns a list of records.
	 */
	public function ListDateRanges(?string $sessionId, int $calendarId): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListDateRanges', Array(
			$sessionId,
			$calendarId
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('Date');
		return ($result);
	}

	/**
	 * Forces output for a given number of seconds
	 * 
	 * 
	 * Exceptions :
	 * - E_NOT_IMPLEMENTED
	 * - E_INVALID_PARAM
	 * - E_SQL
	 * - E_OTHER
	 *
	 * @param string $sessionId session id delivered by ArdMcm's SessionAPi Login method.
	 * @param integer $outputId Uid of output to force
	 * @param integer $tempo number of seconds to force output
	 */
	public function ForceOutput(?string $sessionId, int $outputId, int $tempo)
	{
		$this->_Call('ForceOutput', Array(
			$sessionId,
			$outputId,
			$tempo
		));
	}

	/**
	 * Returns list of output devices
	 * Available criteria:
	 * - uid (integer) : unique id of device
	 * - variable (string) : variable name of device
	 * - description (string) : human readable name of device
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Returned record properties:
	 * - uid (integer) : unique id of device
	 * - variable (string) : variable name of device
	 * - description (string) : human readable name of device
	 * - creationdate (integer) : unix timestamp of record creation
	 * - modificationdate (integer) : unix timestamp of last record modification
	 * 
	 * Exceptions :
	 * - E_INVALID_PARAM : 'sessionId is not valid'
	 * - E_INVALID_PARAM : 'Error in criteria parameter'
	 * - E_INVALID_PAGINATION', 'Error in pagination parameter'
	 * - E_SESSION : "user has no webservice permissions"
	 * - E_SQL : 'SQL error' (should never happen)
	 *
	 * @param string $sessionId session id delivered by ArdMcm's SessionAPi Login method.
	 * @param APICriterionArray $criteria list of search criteriae
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of records.
	 */
	public function ListOutputs(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListOutputs', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('Output');
		return ($result);
	}

}
