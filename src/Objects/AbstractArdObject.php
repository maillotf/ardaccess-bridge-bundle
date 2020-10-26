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
				try
				{
					if (method_exists($this, $method))
						$this->$method($value->value);
				}
				catch (\TypeError $e)
				{
					$reflectionMeth = new \ReflectionMethod($this, $method);
					$reflectionParams = $reflectionMeth->getParameters();
					if ($reflectionParams[0]->allowsNull() == true)
						$this->$method(null);
				}
			}
	}

}
