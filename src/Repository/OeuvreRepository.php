<?php

namespace App\Repository;

use App\Entity\Oeuvre;
<<<<<<< Updated upstream
=======
use App\Entity\Favoris;
>>>>>>> Stashed changes
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Oeuvre>
 *
 * @method Oeuvre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oeuvre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oeuvre[]    findAll()
 * @method Oeuvre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OeuvreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oeuvre::class);
    }

    public function add(Oeuvre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Oeuvre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Oeuvre[] Returns an array of Oeuvre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Oeuvre
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

<<<<<<< Updated upstream
=======
public function search($query)
{
    return $this->createQueryBuilder('o')
        ->andWhere('o.type LIKE :query OR o.couleur LIKE :query OR o.dimension LIKE :query')
        ->setParameter('query', '%'.$query.'%')
        ->getQuery()
        ->getResult();
}

public function sortByprix() {
    return $this->createQueryBuilder('e')
        ->orderBy('e.prix', 'ASC')
        ->getQuery()
        ->getResult();
}


public function sortByNb() {
    return $this->createQueryBuilder('e')
        ->orderBy('e.nb', 'DESC')
        ->getQuery()
        ->getResult();
}
public function sortByType() {
    return $this->createQueryBuilder('e')
        ->orderBy('e.type', 'ASC')
        ->getQuery()
        ->getResult();
}

public function findFavoritesByUserId(int $userId)
{
    return $this->createQueryBuilder('f')
        ->join('f.id_oeuvre', 'o')
        ->where('f.id_a = :userId')
        ->setParameter('userId', $userId)
        ->orderBy('f.id', 'DESC')
        ->getQuery()
        ->getResult()
    ;
}


>>>>>>> Stashed changes
}
