<?php

namespace Blog\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Blog\ModelBundle\Entity\Author;

/**
 *  class AuthorRepository
 */
class AuthorRepository extends EntityRepository
{

    /**
     * Find the first author
     *
     * @return Author
     */
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('a.id', 'asc')
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('ModelBundle:Author')
            ->createQueryBuilder('a');

        return $qb;
    }
}
