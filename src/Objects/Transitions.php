<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\AbstractWS;

/**
 *  
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Transitions
{

	/**
	 * The attribute name.
	 *
	 * @var string
	 */
	public $item;

	/**
	 * list of records
	 *
	 * @var APIAttributeArrayArray
	 */
	public $items;

	public function init()
	{
		if ($this->item != null)
		{
			$tmp = array();
			if (is_array($this->item))
				foreach ($this->item as $value)
				{
					$tmp[] = AbstractWS::cast($value, 'Transition');
				}
			else
				$tmp[] = AbstractWS::cast($this->item, 'Transition');
			$this->items = $tmp;
		}
	}

}
