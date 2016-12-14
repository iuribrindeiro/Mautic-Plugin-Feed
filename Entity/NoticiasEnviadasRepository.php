<?php
/**
 * Created by Iuri Brindeiro.
 * User: iuri
 * Date: 14/12/16
 * Time: 16:01
 * Email: iuribrindeiro@gmail.com
 */

namespace MauticPlugin\FeedNoticiasBannetBundle\Entity;


use Mautic\CoreBundle\Entity\CommonRepository;

class NoticiasEnviadasRepository extends CommonRepository
{
    public function getUltimaNoticiaEnviada()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->select('ne')
            ->from(NoticiasEnviadas::class, 'ne')
            ->expr()->max('ne.id');

        $result = $qb->getQuery()->getSingleResult();

        return $result;
    }
}