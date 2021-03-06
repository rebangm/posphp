<?php

namespace Pos\ProductBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SupplierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SupplierRepository extends EntityRepository
{

    public function getAllOrderByCompanyName()
    {

        $queryBuilder = $this->_em->createQueryBuilder('s')
            ->select('s')
            ->from($this->_entityName, 's')
            ->orderBy("s.companyName");

        return $queryBuilder;
    }
}
