<?php

namespace App\Repository;

use App\Entity\DresseurPokemon;
use App\Entity\Pokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DresseurPokemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method DresseurPokemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method DresseurPokemon[]    findAll()
 * @method DresseurPokemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DresseurPokemonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DresseurPokemon::class);
    }


    public function getAllPokemonsByUserId($userId)
    {
        return $this->createQueryBuilder('dp')
            ->select('p')
            ->from(Pokemon::class, 'p')
            ->where('dp.pokemons = p')
            ->andWhere('dp.dresseurs = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return DresseurPokemon[] Returns an array of DresseurPokemon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DresseurPokemon
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
