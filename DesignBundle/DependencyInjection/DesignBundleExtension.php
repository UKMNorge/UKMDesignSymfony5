<?php

namespace UKMNorge\DesignBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
#use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class DesignBundleExtension extends Extension implements PrependExtensionInterface {
    
    public function load( array $configs, ContainerBuilder $container) {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../config'));
        $loader->load('services.yaml');
        
        $config = $this->processConfiguration(new Configuration(), $configs);
    }

    public function prepend( ContainerBuilder $container ) {
        $configs = $container->getExtensionConfig($this->getAlias());
        $config = $this->processConfiguration(new Configuration(), $configs);

        $twigConfig = [];
        $twigConfig['globals']['UKMDesign'] = '@UKMNorge\DesignBundle\Services\UKMDesign';
        $twigConfig['globals']['UKM_HOSTNAME'] = 'ukm.dev';
        $twigConfig['paths'][ realpath(__DIR__.'/../../../design/Resources/views/UKMDesign/')] = "UKMDesign";

        $container->prependExtensionConfig('twig', $twigConfig);
    }

    public function getAlias() {
        return 'ukm_design';
    }
}