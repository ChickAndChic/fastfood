<?php
namespace OC\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProduitRepository extends EntityRepository{

    public function findArray($array){

        $qb = $this->createQueryBuilder('u')
            ->Select('u')
            ->Where('u.idproduit IN (:array)')
            ->setParameter('array', $array);
        return $qb->getQuery()->getResult();
    }
}