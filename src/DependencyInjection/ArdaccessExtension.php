<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class ArdaccessExtension
 *
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\DependencyInjection
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class ArdaccessExtension extends Extension
{

	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		// Authentication
		$container->setParameter('ardaccess.authentication.protocol', $config['authentication']['protocol']);
		$container->setParameter('ardaccess.authentication.host', $config['authentication']['host']);
		$container->setParameter('ardaccess.authentication.port', $config['authentication']['port']);
		$container->setParameter('ardaccess.authentication.username', $config['authentication']['username']);
		$container->setParameter('ardaccess.authentication.password', $config['authentication']['password']);

		// Session
		$container->setParameter('ardaccess.session.root_dir', $config['session']['root_dir']);

		// load services for bundle
		$loader = new YamlFileLoader(
				$container,
				new FileLocator(__DIR__ . '/../Resources/config')
		);
		$loader->load('services.yml');
	}

}
