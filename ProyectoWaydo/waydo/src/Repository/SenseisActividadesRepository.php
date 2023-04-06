<?php

namespace App\Repository;

use App\Entity\SenseisActividades;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SenseisActividades>
 *
 * @method SenseisActividades|null find($id, $lockMode = null, $lockVersion = null)
 * @method SenseisActividades|null findOneBy(array $criteria, array $orderBy = null)
 * @method SenseisActividades[]    findAll()
 * @method SenseisActividades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SenseisActividadesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SenseisActividades::class);
    }

    public function add(SenseisActividades $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SenseisActividades $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SenseisActividades[] Returns an array of SenseisActividades objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SenseisActividades
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
