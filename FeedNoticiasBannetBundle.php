<?php

namespace MauticPlugin\FeedNoticiasBannetBundle;

use Doctrine\DBAL\Schema\Schema;
use Mautic\CoreBundle\Factory\MauticFactory;
use Mautic\PluginBundle\Bundle\PluginBundleBase;
use Mautic\PluginBundle\Entity\Plugin;

class FeedNoticiasBannetBundle extends PluginBundleBase
{
    public static function onPluginInstall(Plugin $plugin, MauticFactory $factory, $metadata = null, $installedSchema = null)
    {
        if ($metadata !== null) {
            self::installPluginSchema($metadata, $factory, $installedSchema);
        }
    }

    public static function onPluginUpdate(Plugin $plugin, MauticFactory $factory, $metadata = null, $installedSchema = null)
    {
        if ($metadata !== null) {
            self::installPluginSchema($metadata, $factory, $installedSchema);
        }
    }
}