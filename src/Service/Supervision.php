<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\SessionInterface;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIAttributeArray;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Exception\ArdAccessException;

/**
 * Description of Supervision
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Supervision extends AbstractWS implements SupervisionInterface
{

	public function __construct(SessionInterface $session = null)
	{
		//Define wsdlUri for the client
		$this->wsdlUri = $session->getProtocol() . '://' . $session->getHost() . ':' . $session->getPort() . '/WS/ArdAccess/Supervision?WSDL';

		parent::__construct($session);
	}

	/**
	 * Creates an event.
	 * 
	 * Available attributes:
	 * - uid (integer) : The item uniq identifier. Required for update and delete. Don't give it for create.
	 * 
	 * Returned item properties:
	 * - uid (integer) :
	 * 
	 * Returned item properties:
	 * - uid (integer) : The unique id of the access right.
	 * - carrier (integer) : The unique id of the carrier.
	 * - accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
	 * - weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
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
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated item, or SOAP Fault if error occured.
	 */
	public function Event(?string $sessionId, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = self::_Call('Event', Array(
					$sessionId,
					$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	public function EventObj(APIAttributeArray $attributes, ?string $sessionId): APIAttributeArray
	{
		$result = $this->Event($sessionId, (array) $attributes);
		return (AbstractWS::cast($result, 'APIAttributeArray'));
	}

	/**
	 * Lists available events based on search criteriae.
	 * Available criteria :
	 * - uid (integer) : The event's unique identifier.
	 * - eventfamily (string) :  The event's family.
	 * - eventtype (string) : The event's family type.
	 * - eventsubtype (string) :  The event's family subtype.
	 * - deleted (bool [0/1]) : has the event been deleted.
	 * - date (timestamp) : The events generation date (provided by hardware and embedded software).
	 * - deviceuid (integer) : uid of device concerned by event
	 * - accesspointuid (integer) : uid of accesspoint concerned by event
	 * - readeruid (integer) : uid of reader concerned by event
	 * - useruid (integer) : uid of user concerned by event
	 * - zoneuid (integer) : uid of zone concerned by event
	 * - souid (integer) : uid of identification support concerned by event
	 * Returned items properties:
	 * - uid (integer) : The carrier unique identifier.
	 * - eventfamily (string) :  The event's family.
	 * - eventtype (string) : The event's family type.
	 * - eventsubtype (string) :  The event's family subtype.
	 * - deleted (bool [0/1]) : has the event been deleted.
	 * - date (timestamp) : The events generation date (provided by hardware and embedded software).
	 * - creationdate (timestamp) : The event's creation date on the server (when the server received the event information from hardware).
	 * - modificationdate (timestamp) : The event's last modification date on the server (when the server modified the event information).
	 * - deviceuid (integer) : uid of device concerned by event
	 * - accesspointuid (integer) : uid of accesspoint concerned by event
	 * - readeruid (integer) : uid of reader concerned by event
	 * - useruid (integer) : uid of user concerned by event
	 * - zoneuid (integer) : uid of zone concerned by event
	 * - souid (integer) : uid of identification support concerned by event
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of supervised events.
	 */
	public function ListEvents(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = self::_Call('ListEvents', Array(
					$sessionId,
					$criteria,
					$pagination
		));
		if (is_string($apiResult))
		{
			throw new ArdAccessException($apiResult);
		}
		$result = $this->cast($apiResult, 'APIList');
		$result->init('Event');
		return ($result);
	}

	/**
	 * Lists current user's subscriptions.
	 * Returned items properties:
	 * - uid (integer) : The carrier unique identifier.
	 * - eventfamily (string) :  The event's family.
	 * - eventtype (string) : The event's family type.
	 * - eventsubtype (string) :  The event's family subtype.
	 * - disable (bool [0/1]) : The carrier validity.
	 * - begindate (timestamp) : The carrier validity start date.
	 * - enddate (timestamp) : The carrier validity end date.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of user's subscriptions.
	 */
	public function ListSubscriptions(?string $sessionId = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = self::_Call('ListSubscriptions', Array(
					$sessionId,
					$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('Subscription');
		return ($result);
	}

	/**
	 * This allows third party to subscribe to events as they happen
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $event event I am interested in [
	 * 1 = Access refused
	 * 2 = Access granted
	 * 10 = Alarm | Healthy | Out of service
	 * 20 = Temporary working | Program stopped
	 * 90 = Loading rights | Start saving rights | End saving rights
	 * 
	 * ]
	 * @param APIEventCriterionArray $filter event subscription filter (determines which events I will be notified for)
	 * @param string $protocol can be 'rest','mail' or 'file'
	 * @param string $url destination string of protocol. If protocol is rest url must be an http/https url, if protocol is 'mail' it must be a comma seperated list of valid emails, if protocol is 'file' it must be a valid path to file on server
	 * @param string $mapperclass optional mapperclass
	 */
	public function Subscribe(?string $sessionId, string $event, ?array $filter, string $protocol, string $url, ?string $mapperclass = null)
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = self::_Call('Subscribe', Array(
					$sessionId,
					$event,
					$filter,
					$protocol,
					$url,
					$mapperclass
		));
	}

	/**
	 * This allows third party to Unsubscribe from events as they happen
	 * If no event is given, all your subscriptions will be removed
	 * If event is given and no protocol is given you all of user's subcriptions to that event will be removed
	 * If protocol is given and no vent type is given all subscriptions with given protocol will be removed
	 * If protocol and event are given only subscriptions for given event type with given protocol will be removed.
	 *
	 * @param string $sessionId session id
	 * @param string $event event type
	 * @param string $protocol protocol of subcription
	 */
	public function Unsubscribe(?string $sessionId, string $event, string $protocol)
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = self::_Call('Unsubscribe', Array(
					$sessionId,
					$event,
					$protocol
		));
	}

}
