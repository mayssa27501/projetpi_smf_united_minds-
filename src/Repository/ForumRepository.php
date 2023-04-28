<?php

namespace App\Repository;

use App\Entity\Forum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Evenement>
 *
 * @method Forum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forum[]    findAll()
 * @method Forum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forum::class);
    }

    public function save(Forum $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Forum $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function sortBytitre() {
        return $this->createQueryBuilder('e')
            ->orderBy('e.titreForum', 'ASC')
            ->getQuery()
            ->getResult();
    }
    
   
    public function sortBydate() {
        return $this->createQueryBuilder('e')
            ->orderBy('e.dateForum', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function sortBydescription() {
        return $this->createQueryBuilder('e')
            ->orderBy('e.descriptifForum', 'ASC')
            ->getQuery()
            ->getResult();
    }
}