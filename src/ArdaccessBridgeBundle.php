<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\DependencyInjection\ArdaccessExtension;

/**
 * Class ArdaccessBridgeBundle
 *
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class ArdaccessBridgeBundle extends Bundle
{
	public function getContainerExtension()
    {
        return new ArdaccessExtension();
    }
}
