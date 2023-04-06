<?php

namespace App\Repository;

use App\Entity\DoctorPrueba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DoctorPrueba>
 *
 * @method DoctorPrueba|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctorPrueba|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctorPrueba[]    findAll()
 * @method DoctorPrueba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctorPruebaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctorPrueba::class);
    }

    public function add(DoctorPrueba $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DoctorPrueba $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DoctorPrueba[] Returns an array of DoctorPrueba objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DoctorPrueba
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
