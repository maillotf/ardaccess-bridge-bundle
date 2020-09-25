<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * Description of AbstractArdObject
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class AbstractArdObject
{

	public $item;

	public function init()
	{
		if ($this->item != null)
			foreach ($this->item as $value)
			{
				$method = 'set' . ucfirst($value->index);
				if (method_exists($this, $method))
					$this->$method($value->value);
			}
	}

}
