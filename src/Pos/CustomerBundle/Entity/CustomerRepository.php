<?php

namespace Pos\CustomerBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerRepository extends EntityRepository
{
    public function getTotalCount()
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('count(c.id)')
            ->from($this->_entityName, 'c');

        return $queryBuilder->getQuery()->getSingleScalarResult();
    }
}
