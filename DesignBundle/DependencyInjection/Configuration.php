<?php

namespace UKMNorge\DesignBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {
    public function getConfigTreeBuilder() {

        $builder = new TreeBuilder('ukm_design');
        
        
        $builder->getRootNode()->children()
            ->scalarNode('hostname')
                ->isRequired()
                ->defaultValue('ukm.dev')
            ->end()
            
            ->scalarNode('section_id')
                ->isRequired()
                    ->defaultValue('symfony5')
            ->end()
            
            ->scalarNode('section_name')
                ->isRequired()
                ->defaultValue('Section Name')
            ->end()
            
            ->scalarNode('section_url')
                ->isRequired()
                ->defaultValue('https://section.ukm.dev')
            ->end();
        
            return $builder;
    }
}