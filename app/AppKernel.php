<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
            new Mopa\Bundle\BarcodeBundle\MopaBarcodeBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Pos\HRBundle\PosHRBundle(),
            new Pos\UserBundle\PosUserBundle(),
            new Pos\HomeBundle\PosHomeBundle(),
            new Pos\CustomerBundle\PosCustomerBundle(),
            new Pos\PaginatorBundle\PosPaginatorBundle(),
            new Pos\ProductBundle\PosProductBundle(),
            new Pos\SaleBundle\PosSaleBundle(),
            new Pos\PointOfSalesBundle\PosPointOfSalesBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            //$bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
