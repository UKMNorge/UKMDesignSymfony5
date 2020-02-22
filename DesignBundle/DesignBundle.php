<?php

namespace UKMNorge\DesignBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use UKMNorge\DesignBundle\DependencyInjection\DesignBundleExtension;

class DesignBundle extends Bundle {

    public function getContainerExtension()
    {
        return new DesignBundleExtension();
    }
}