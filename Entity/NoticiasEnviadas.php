<?php


namespace MauticPlugin\FeedNoticiasBannetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\CommonEntity;
use MauticPlugin\FeedNoticiasBannetBundle\FeedNoticiasBannetBundle;

/**
 * @ORM\Table(name="noticias_enviadas")
 * @ORM\Entity
 */
class NoticiasEnviadas extends CommonEntity
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var  int */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", nullable=false)
     * @var  string */
    private $nome;

    /**
     * @ORM\Column(name="dataCriacao", type="datetime", nullable=false)
     * @var  \DateTime */
    private $dataCriacao;

    /**
     * @ORM\Column(name="dataEnviada", type="datetime", nullable=false)
     * @var  \DateTime */
    private $dataEnviada;

    public static function loadMetadata(ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('noticias_enviadas')
            ->setCustomRepositoryClass(NoticiasEnviadasRepository::class);

        $builder->addId();

        $builder->addNamedField('nome', 'string', 'nome');

        $builder->addNamedField('dataCriacao', 'datetime', 'data_criacao');

        $builder->addNamedField('dataEnviada', 'datetime', 'data_enviada');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return NoticiasEnviadas
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return NoticiasEnviadas
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * @param DateTime $dataCriacao
     * @return NoticiasEnviadas
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataEnviada()
    {
        return $this->dataEnviada;
    }

    /**
     * @param \DateTime $dataEnviada
     * @return NoticiasEnviadas
     */
    public function setDataEnviada($dataEnviada)
    {
        $this->dataEnviada = $dataEnviada;
        return $this;
    }
}