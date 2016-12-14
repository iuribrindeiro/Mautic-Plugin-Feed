<?php

namespace MauticPlugin\FeedNoticiasBannetBundle\Model;

use FeedIo\Factory;
use Mautic\CoreBundle\Model\AbstractCommonModel;
use MauticPlugin\FeedNoticiasBannetBundle\Entity\NoticiasEnviadas;
use MauticPlugin\FeedNoticiasBannetBundle\Entity\NoticiasEnviadasRepository;

class NoticiasEnviadasModel extends AbstractCommonModel
{
    public function existemNovasNoticias()
    {
        $repoNoticiasEnviadas = $this->getRepository();
        /** @var NoticiasEnviadas $ultimaNoticiaEnviada */
        $ultimaNoticiaEnviada = $repoNoticiasEnviadas->getUltimaNoticiaEnviada();

        if($ultimaNoticiaEnviada) {
            $feedIo = Factory::create()->getFeedIo();

            $result = $feedIo->readSince('http://www.bannet.com.br/blog/feed',
                $ultimaNoticiaEnviada->getDataCriacao());

            if($result) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return NoticiasEnviadasRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository('FeedNoticiasBannetBundle:NoticiasEnviadas');
    }
}