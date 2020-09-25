<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * 
 * @package MaillotF\Ardaccess\ArdaccessBridgeBundle\DependencyInjection
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Configuration implements ConfigurationInterface
{
	/**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
		$builder = new TreeBuilder('ardaccess');

        $builder->getRootNode()->addDefaultsIfNotSet()
            ->children()
				->arrayNode('authentication')
                    ->isRequired()
                    ->children()
                        ->scalarNode('protocol')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
						->scalarNode('host')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
						->integerNode('port')
                            ->isRequired()
                            ->defaultValue(80)
                        ->end()
						->scalarNode('username')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
						->scalarNode('password')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
					->end()
				->end()
				->arrayNode('session')
					->addDefaultsIfNotSet()
					->children()
						->scalarNode('root_dir')
						->defaultValue('%kernel.project_dir%/var/tmp/ardsession.json')
					->end()
				->end()
			->end()
		;
		return ($builder);
	}
}
