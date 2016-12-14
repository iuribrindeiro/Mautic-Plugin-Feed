<?php

namespace MauticPlugin\FeedNoticiasBannetBundle\EventListener;

use FeedIo\Factory;
use Mautic\CampaignBundle\CampaignEvents;
use Mautic\CampaignBundle\Event\CampaignBuilderEvent;
use Mautic\CoreBundle\EventListener\CommonSubscriber;
use MauticPlugin\FeedNoticiasBannetBundle\Model\NoticiasEnviadasModel;

class FeedSubscriber extends CommonSubscriber
{
    /** @var  NoticiasEnviadasModel $noticiasEnviadasModel */
    private $noticiasEnviadasModel;

    public function __construct(NoticiasEnviadasModel $noticiasEnviadasModel)
    {
        $this->noticiasEnviadasModel = $noticiasEnviadasModel;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            CampaignEvents::CAMPAIGN_ON_BUILD => ['sendEmailNoticiaBlog', 0],
        ];
    }

    public function sendEmailNoticiaBlog(CampaignBuilderEvent $event)
    {
        $this->noticiasEnviadasModel->existemNovasNoticias();
    }
}