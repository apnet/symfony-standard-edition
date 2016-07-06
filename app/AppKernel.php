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
            new FOS\UserBundle\FOSUserBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new Apnet\AsseticImporterBundle\ApnetAsseticImporterBundle(),
            new Apnet\LayoutBundle\ApnetLayoutBundle(),

            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),

            new FOS\RestBundle\FOSRestBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),

            new Vich\UploaderBundle\VichUploaderBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),

            new AppBundle\AppBundle(),
        );

        switch ($this->getEnvironment()) {
            case 'dev':
                $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
                $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
                $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
                $bundles[] = new Apnet\AsseticWatcherBundle\ApnetAsseticWatcherBundle();

                break;
            case 'test':
                $bundles[] = new Apnet\FunctionalTestBundle\ApnetFunctionalTestBundle();

                break;
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        date_default_timezone_set('Europe/London');

        parent::boot();
    }
}
