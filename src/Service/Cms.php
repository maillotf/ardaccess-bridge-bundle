<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\SessionInterface;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\Transitions;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Exception\ArdAccessException;

/**
 * Description of Cms
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Cms extends AbstractWS implements CmsInterface
{

	public function __construct(SessionInterface $session = null)
	{
		//Define wsdlUri for the client
		$this->wsdlUri = $session->getProtocol() . '://' . $session->getHost() . ':' . $session->getPort() . '/WS/ArdCms/Cms?WSDL';

		parent::__construct($session);
	}

	/**
	 * Create, update or delete a smart object.
	 * 
	 * Available attributes:
	 * - uid (integer) : The smart object unique identifier. Required for update and delete. Don't give it for create.
	 * - uuid (hexa) : The smart object unique hexadecimal identifier. Default is null.
	 * - nid (string) :  The smart object natural identifier. Forbidden for update. Required for create.
	 * - valid (bool [0/1]) : Is the smart object valid or no. Default is 1.
	 * - begindate (timestamp) : The smart object validity start date. Default is 0 (valid from a long time ago).
	 * - enddate (timestamp) : The smart object validity end date. Default is 0 (no end).
	 * - carrier (integer) : The smart object carrier. Forbidden for update, use DeliverSmartObject or SmartObjectTransition methods. Default is null (no carrier).
	 * - deliver (bool [0/1]) : Deliver the smart object or not. Forbidden for update. Default is 0.
	 * - groups (string) : The smart object CSV list of groups unique identifiers. If not set, add smart object to permanent group.
	 * - type (integer) : The smart object type. If not set, add smart object as a badge. Forbidden for update. Default is 0.
	 * 
	 * Returned item properties:
	 * - uid (integer) : The smart object unique identifier.
	 * - uuid (hexa) : The smart object unique hexadecimal identifier.
	 * - nid (string) :  The smart object natural identifier.
	 * - valid (bool [0/1]) : Is the smart object valid or no.
	 * - begindate (timestamp) : The smart object validity start date.
	 * - enddate (timestamp) : The smart object validity end date.
	 * - carrier (integer) : The smart object carrier.
	 * - state (integer) : The smart object state.
	 * - groups (string) : The smart object CSV list of groups unique identifiers.
	 * - type (integer) : The smart object type. If not set, add smart object as a badge.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/deleted item, or SOAP Fault if error occured.
	 */
	public function SmartObject(?string $sessionId = null, string $action = 'c', array $attributes = null): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('SmartObject', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Lists available smart objects based on search criteria.
	 * 
	 * Available criteria:
	 * - uid (integer) : The smart object unique identifier.
	 * - uuid (hexa) : The smart object hexadecimal identifier.
	 * - nid (string) : The smart object natural identifier.
	 * - valid (bool [0/1]) : Is the smart object valid or no.
	 * - begindate (timestamp) : The smart object validity start date.
	 * - enddate (timestamp) : The smart object validity end date.
	 * - carrier (integer) : The smart object carrier.
	 * - state (integer) : The smart object state unique identifier.
	 * - groups (string) : The smart object CSV list of groups unique identifiers.
	 * 
	 * Returned items properties:
	 * - uid (integer) : The smart object unique identifier.
	 * - uuid (hexa) : The smart object hexadecimal identifier.
	 * - nid (string) : The smart object natural identifier.
	 * - valid (bool [0/1]) : Is the smart object valid or no.
	 * - begindate (timestamp) : The smart object validity start date.
	 * - enddate (timestamp) : The smart object validity end date.
	 * - carrier (integer) : The smart object carrier.
	 * - state (integer) : The smart object state unique identifier.
	 * - groups (string) : The smart object CSV list of groups unique identifiers.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of smart objects.
	 */
	public function ListSmartObjects(?string $sessionId = null, ?array $criteria = null, ?array $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListSmartObjects', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('SmartObject');
		return ($result);
	}

	/**
	 * Lists given smart object's state and available transitions
	 * 
	 * Returned items properties:
	 * - uid (integer) : The smart object transition unique identifier.
	 * - label (string) : The transition label.
	 * - description (string) : The transition description.
	 * - startstate_uid (integer) : The transition start state unique identifier.
	 * - endstate_uid (integer) : The transition end state unique identifier.
	 * - endstate_label (string) : The transition end state label.
	 * - endstate_description (string) : The transition end state description.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param integer $smartObjectId The smart object unique identifier.
	 * @return APIAttributeArrayArray Returns a list of a smart object transitions.
	 */
	public function ListSmartObjectTransitions($sessionId = null, int $smartObjectId = 0): Transitions
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListSmartObjectTransitions', Array(
			$sessionId,
			$smartObjectId
		));

		$result = $this->cast($apiResult, 'Transitions');
		return ($result);
	}

	/**
	 * Returns current smart object black list.(validState)
	 * 
	 * Returned items properties:
	 * - uid (integer) : The smart object unique identifier.
	 * - uuid (string) : The smart object hexadecimal identifier.
	 * - nid (string) : The smart object natural identifier.
	 * - carrier (integer) : The smart object carrier.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIAttributeArrayArray Returns a list of a black listed smart object.
	 */
	public function ListBlackList(?string $sessionId = null, ?array $criteria = null, ?array $pagination = null): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListBlackList', Array(
			$sessionId,
			$criteria,
			$pagination
		));

//		$result = Creator::castAttributes($apiResult->item);

		return ($apiResult);
	}

	/**
	 * Delivers existing smart object to carrier
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param integer $smartObjectId The smart object unique identifier.
	 * @param integer $carrierId The carrier unique identifier.
	 * @param bool $strict If an error happen, throw the message
	 * @return boolean Returns true if successful.
	 */
	public function DeliverSmartObject(?string $sessionId = null, int $smartObjectId = 0, int $carrierId = 0, bool $strict = false): bool
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('DeliverSmartObject', Array(
			$sessionId,
			$smartObjectId,
			$carrierId
		));
		if ($apiResult == true)
			return (true);
		//Display the error message
		if ($strict == true)
			throw new ArdAccessException($apiResult);
		return (false);
	}

	/**
	 * Perform transition on smart object (lost, found, destroyed, blacklisted ...) depends on platform's life cycle.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param integer $smartObjectId The smart object unique identifier.
	 * @param integer $transitionId The smart object transition unique identifier. Given transition identifier must be available in current object state.
	 * @param bool $strict If an error happen, throw the message
	 * @return boolean Returns true if successful.
	 */
	public function SmartObjectTransition(?string $sessionId = null, ?int $smartObjectId = null, ?int $transitionId = null, bool $strict = false): bool
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('SmartObjectTransition', Array(
			$sessionId,
			$smartObjectId,
			$transitionId
		));
		if ($apiResult == true)
			return (true);
		//Display the error message
		if ($strict == true)
			throw new ArdAccessException($apiResult);
		return (false);
	}

	/**
	 * Create, update or delete a smart objects group.
	 * 
	 * Available attributes:
	 * - uid (integer) : The smart objects group unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The smart objects group name. Required for create.
	 * - description (string) : The smart objects group name. Required for create.
	 * - disabled (bool [0/1]) : The smart objects groups disabled state. Default to 0.
	 * - parent (integer) : The smart objects group parent folder. Required for create.
	 * 
	 * Returned item properties:
	 * - uid (integer) : The smart objects group unique identifier.
	 * - name (string) : The group name.
	 * - description (string) : The group name.
	 * - disabled (bool [0/1]) : The smart objects groups disabled state.
	 * - parent (integer) : The group parent folder.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/delete item, or SOAP Fault if error occured.
	 */
	public function SmartObjectGroup(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('SmartObjectGroup', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Lists available smart objects groups folders based on search criteria.
	 * 
	 * Available criteria :
	 * - uid (integer) : The smart objects groups folder unique identifier.
	 * - name (string) : The smart objects groups folder name.
	 * - description (string) : The smart objects groups folder description.
	 * - disabled (bool [0/1]) : The smart objects groups folder disabled state.
	 * - parent (integer) : The groups folder parent folder unique identifier.
	 * 
	 * Returned items properties:
	 * - uid (integer) : The smart objects groups folder unique identifier.
	 * - name (string) : The smart objects groups folder name.
	 * - description (string) : The smart objects groups folder description.
	 * - disabled (bool [0/1]) : The smart objects groups folder disabled state.
	 * - parent (integer) : The groups folder parent folder unique identifier.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of carriers groupss folders
	 */
	public function ListSmartObjectGroupFolders(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListSmartObjectGroupFolders', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('GroupFolder');
		return ($result);
	}

	/**
	 * Lists available smart objects groups based on search criteria.
	 * Available criteria :
	 * - uid (integer) : The smart objects group unique identifier.
	 * - name (string) : The smart objects group name.
	 * - description (string) : The smart objects group description.
	 * - disabled (bool [0/1]) : The smart objects groups disabled state.
	 * - parent (integer) : The group parent folder unique identifier.
	 * Returned items properties:
	 * - uid (integer) : The smart objects group unique identifier.
	 * - name (string) : The smart objects group name.
	 * - description (string) : The smart objects group description.
	 * - disabled (bool [0/1]) : The smart objects groups disabled state.
	 * - parent (integer) : The group parent folder unique identifier.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of smart objects groups.
	 */
	public function ListSmartObjectGroups(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListSmartObjectGroups', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('SmartObjectGroup');
		return ($result);
	}

}
