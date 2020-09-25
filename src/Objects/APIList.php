<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\AbstractWS;

/**
 * List
 *
 * @pw_element integer $count The count of total records available in database (so that we can calculate pagination).
 * @pw_element APIAttributeArrayArray $records list of records
 * @pw_complex APIList
 * 
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class APIList
{

	/**
	 * The count of total records available in database (so that we can calculate pagination).
	 *
	 * @var integer
	 */
	public $count;

	/**
	 * list of records
	 *
	 * @var APIAttributeArrayArray
	 */
	public $records;

	public function init(?string $recordType = null)
	{
		if ($recordType != null && isset($this->records->item))
		{
			$tmp = array();
			if (is_array($this->records->item))
				foreach ($this->records->item as $value)
				{
					$tmp[] = AbstractWS::cast($value, $recordType);
				}
			else
				$tmp[] = AbstractWS::cast($this->records->item, $recordType);
			$this->records = $tmp;
		}
	}

}
