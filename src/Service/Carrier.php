<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Service;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\SessionInterface;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIList;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Exception\ArdAccessException;

/**
 * Description of Carrier
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Carrier extends AbstractWS implements CarrierInterface
{

	public function __construct(SessionInterface $session = null)
	{
		//Define wsdlUri for the client
		$this->wsdlUri = $session->getProtocol() . '://' . $session->getHost() . ':' . $session->getPort() . '/WS/ArdDesktop/Carrier?WSDL';

		parent::__construct($session);
	}

	/**
	 * Create, update or delete a carrier.
	 * 
	 * Available attributes:
	 * - uid (integer) : The carrier unique identifier in AVB. Required for update and delete if no rid given. Don't give it for create.
	 * - rid (string) :  The carrier unique identifier in third party system. Required for create. Required for update and delete if no uid given.
	 * - firstname (string) : The carrier first name. Required for create.
	 * - lastname (string) :  The carrier last name. Required for create.
	 * - image (string) : The carrier image list of images names separate by "," optional.
	 * - disabled (bool [0/1]) : The carrier validity. Default is 1.
	 * - begindate (timestamp) : The carrier validity start date. Default is 0 (valid from a long time ago).
	 * - enddate (timestamp) : The carrier validity end date. Default is 0 (no end).
	 * - userfield0 (string) : The carrier 1 additional field. Default is null.
	 * - userfield1 (string) : The carrier 2 additional field. Default is null.
	 * - userfield2 (string) : The carrier 3 additional field. Default is null.
	 * - userfield3 (string) : The carrier 4 additional field. Default is null.
	 * - userfield4 (string) : The carrier 5 additional field. Default is null.
	 * - userfield5 (string) : The carrier 6 additional field. Default is null.
	 * - userfield6 (string) : The carrier 7 additional field. Default is null.
	 * - userfield7 (string) : The carrier 8 additional field. Default is null.
	 * - userfield8 (string) : The carrier 9 additional field. Default is null.
	 * - userfield9 (string) : The carrier 10 additional field. Default is null.
	 * 
	 * Returned item properties:
	 * - uid (integer) : The carrier unique identifier.
	 * - rid (string) :  The carrier unique identifier in third party system.
	 * - firstname (string) : The carrier first name.
	 * - lastname (string) :  The carrier last name.
	 * - image (string) : The carrier list of images names
	 * - disabled (bool [0/1]) : The carrier validity.
	 * - begindate (timestamp) : The carrier validity start date.
	 * - enddate (timestamp) : The carrier validity end date.
	 * - userfield0 (string) : The carrier 1 additional field.
	 * - userfield1 (string) : The carrier 2 additional field.
	 * - userfield2 (string) : The carrier 3 additional field.
	 * - userfield3 (string) : The carrier 4 additional field.
	 * - userfield4 (string) : The carrier 5 additional field.
	 * - userfield5 (string) : The carrier 6 additional field.
	 * - userfield6 (string) : The carrier 7 additional field.
	 * - userfield7 (string) : The carrier 8 additional field.
	 * - userfield8 (string) : The carrier 9 additional field.
	 * - userfield9 (string) : The carrier 10 additional field.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/delete item, or ArdAccessException if error occured.
	 */
	public function Carrier(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('Carrier', Array(
			$sessionId,
			$action,
			$attributes
		));

		if (is_object($apiResult))
			$result = Creator::castAttributes($apiResult->item);
		else
			throw new ArdAccessException($apiResult);
		return ($result);
	}

	/**
	 * Lists available carriers based on search criteriae.
	 * 
	 * Available criteria :
	 * - uid (integer) : The carrier unique identifier.
	 * - rid (string) :  The carrier unique identifier in third party system.
	 * - firstname (string) : The carrier first name.
	 * - lastname (string) :  The carrier last name.
	 * - disable (bool [0/1]) : The carrier validity.
	 * - begindate (timestamp) : The carrier validity start date.
	 * - enddate (timestamp) : The carrier validity end date.
	 * - hasimage (bool [0/1]) : Does the carrier has an image ?
	 * - hassmartobject (bool [0/1]) : Does the carrier has a smart object ?
	 * - usergroup (integer) : The carrier group
	 * 
	 * Returned items properties:
	 * - uid (integer) : The carrier unique identifier.
	 * - rid (string) :  The carrier unique identifier in third party system.
	 * - firstname (string) : The carrier first name.
	 * - lastname (string) :  The carrier last name.
	 * - image (string) : The carrier photo.
	 * - disable (bool [0/1]) : The carrier validity.
	 * - begindate (timestamp) : The carrier validity start date.
	 * - enddate (timestamp) : The carrier validity end date.
	 * - userfield0 (string) : The carrier 1 additional field.
	 * - userfield1 (string) : The carrier 2 additional field.
	 * - userfield2 (string) : The carrier 3 additional field.
	 * - userfield3 (string) : The carrier 4 additional field.
	 * - userfield4 (string) : The carrier 5 additional field.
	 * - userfield5 (string) : The carrier 6 additional field.
	 * - userfield6 (string) : The carrier 7 additional field.
	 * - userfield7 (string) : The carrier 8 additional field.
	 * - userfield8 (string) : The carrier 9 additional field.
	 * - userfield9 (string) : The carrier 10 additional field.
	 * - usergroup (string) : list of user groups identifier
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of carriers.
	 */
	public function ListCarriers(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListCarriers', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('Carrier');
		return ($result);
	}

	/**
	 * Create, update or delete carrier group
	 * 
	 * Available attributes:
	 * - uid (integer) : The carriers group unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The carriers group name. Required for create.
	 * - description (string) : The carriers group name. Required for create.
	 * - disabled (bool [0/1]) : The carriers group disabled state.  Default to 0.
	 * - parent (integer) : The carriers group parent folder. Required for create.
	 * 
	 * Returned item properties:
	 * - uid (integer) : The carriers group unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The carriers group name. Required for create.
	 * - description (string) : The carriers group name. Required for create.
	 * - disabled (bool [0/1]) : The carriers group disabled state.
	 * - parent (integer) : The carriers group parent folder. Required for create.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/delete item, or SOAP Fault if error occured.
	 */
	public function CarrierGroup(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('CarrierGroup', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Create, update or delete a group folder
	 * Available attributes:
	 * - uid (integer) : The group folder unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The group folder name. Required for create.
	 * - description (string) : The group folder description. Required for create.
	 * - disabled (bool [0/1]) : The group folder disabled state.  Default to 0.
	 * - parent (integer) : The group folder parent folder. Required for create.
	 * Returned item properties:
	 * - uid (integer) : The group folder unique identifier. Required for update and delete. Don't give it for create.
	 * - name (string) : The group folder name. Required for create.
	 * - description (string) : The group folder name. Required for create.
	 * - disabled (bool [0/1]) : The  group folder disabled state.
	 * - parent (integer) : The group folder parent folder. Required for create.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param string $action The action to do: 'c' (create), 'u' (update), 'd' (delete).
	 * @param APIAttributeArray $attributes The item to create/update/delete attributes (for update and delete uid must be given).
	 * @return APIAttributeArray Returns the created/updated/delete item, or SOAP Fault if error occured.
	 */
	public function GroupFolder(?string $sessionId, string $action, array $attributes): array
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('GroupFolder', Array(
			$sessionId,
			$action,
			$attributes
		));

		$result = Creator::castAttributes($apiResult->item);

		return ($result);
	}

	/**
	 * Sets carrier's carrier groups.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param integer $carrierId carrier's unique id
	 * @param integerArray $carriergroupIds array of carrier group unique ids
	 * @param boolean $eraseGroup true for replace all groups by $carriergroupIds
	 * @param bool $strict If an error happen, throw the message
	 * @return boolean Returns true if successful.
	 */
	public function SetCarrierGroup(?string $sessionId, int $carrierId, array $carriergroupIds, bool $eraseGroup = true, bool $strict = false): bool
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('SetCarrierGroup', Array(
			$sessionId,
			$carrierId,
			$carriergroupIds,
			$eraseGroup
		));
		if ($apiResult == true)
			return (true);
		//Display the error message
		if ($strict == true)
			throw new ArdAccessException($apiResult);
		return (false);
	}

	/**
	 * Remove carrier's carrier groups.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param integer $carrierId carrier's unique id
	 * @param integerArray $carriergroupIds array of carrier group unique ids
	 * @param bool $strict If an error happen, throw the message
	 * @return boolean Returns true if successful.
	 */
	public function RemoveCarrierGroup(?string $sessionId, int $carrierId, array $carriergroupIds, bool $strict = false): bool
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('RemoveCarrierGroup', Array(
			$sessionId,
			$carrierId,
			$carriergroupIds
		));
		if ($apiResult == true)
			return (true);
		//Display the error message
		if ($strict == true)
			throw new ArdAccessException($apiResult);
		return (false);
	}

	/**
	 * Sets carrier's image.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param integer $carrierId carrier's unique id
	 * @param boolean $append Append image at the end of the image list of carrier, false replace all carrier image by the new one.
	 * @param string $imageName The image name.
	 * @param base64Binary $imageData The image data in base 64 format.
	 * @param bool $strict If an error happen, throw the message
	 * @return boolean Returns true if successful.
	 */
	public function SetCarrierImage(?string $sessionId, int $carrierId, bool $append, string $imageName, string $imageData, bool $strict = false): bool
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('SetCarrierImage', Array(
			$sessionId,
			$carrierId,
			$append,
			$imageName,
			$imageData
		));
		if ($apiResult == true)
			return (true);
		//Display the error message
		if ($strict == true)
			throw new ArdAccessException($apiResult);
		return (false);
	}

	/**
	 * Lists available carrier groups folder based on search criteria.
	 * 
	 * Available criteria :
	 * - uid (integer) : The carriers groups folder unique identifier.
	 * - name (string) : The carriers groups folder name.
	 * - description (string) : The carriers groups folder description.
	 * - disabled (bool [0/1]) : The carriers groups folder disabled state.
	 * - parent (integer) : The carriers groups folder parent folder.
	 * 
	 * Returned items properties:
	 * - uid (integer) : The carriers groups folder unique identifier.
	 * - name (string) : The carriers groups folder name.
	 * - description (string) : The carriers groups folder description.
	 * - disabled (bool [0/1]) : The carriers groups folder disabled state.
	 * - parent (integer) : The carriers groups folder parent folder.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of carriers groups folders
	 */
	public function ListCarrierGroupFolders(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();
		$apiResult = $this->_Call('ListCarrierGroupFolders', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('GroupFolder');
		return ($result);
	}

	/**
	 * Lists available carrier groups based on search criteria.
	 * 
	 * Available criteria :
	 * - uid (integer) : The carriers group unique identifier.
	 * - name (string) : The carriers group name.
	 * - description (string) : The carriers group description.
	 * - disabled (bool [0/1]) : The carriers groups disabled state.
	 * - parent (integer) : The carriers group parent folder.
	 * 
	 * Returned items properties:
	 * - uid (integer) : The carriers group unique identifier.
	 * - name (string) : The carriers group name.
	 * - description (string) : The carriers group description.
	 * - disabled (bool [0/1]) : The carriers groups disabled state.
	 * - parent (integer) : The carriers group parent folder.
	 *
	 * @param string $sessionId The session id delivered by ArdMcm's SessionApi Login method.
	 * @param APICriterionArray $criteria List of search criteria.
	 * @param APIPagination $pagination The pagination list parameters.
	 * @return APIList Returns a list of carriers groups.
	 */
	public function ListCarrierGroups(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList
	{
		if ($sessionId == null)
			$sessionId = $this->session->getSessionId();

		$apiResult = $this->_Call('ListCarrierGroups', Array(
			$sessionId,
			$criteria,
			$pagination
		));
		$result = $this->cast($apiResult, 'APIList');
		$result->init('CarrierGroup');
		return ($result);
	}

}
