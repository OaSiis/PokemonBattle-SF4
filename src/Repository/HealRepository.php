<?php

namespace App\Repository;

use App\Entity\Heal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Heal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Heal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Heal[]    findAll()
 * @method Heal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HealRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Heal::class);
    }

    // /**
    //  * @return Heal[] Returns an array of Heal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Heal
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
