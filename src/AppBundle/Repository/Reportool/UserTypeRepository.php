<?php

namespace AppBundle\Repository\Reportool;

use AppBundle\Entity\Reportool\UserType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserType|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserType|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserType[]    findAll()
 * @method UserType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserType::class);
    }

//    /**
//     * @return UserType[] Returns an array of UserType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserType
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
