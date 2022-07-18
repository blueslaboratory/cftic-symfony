<?php
// COPIADA A PARTIR DE ActividadesSenseis.php PORQUE NO LA GENERABA AUTOMÁTICAMENTE

namespace App\Repository;

use App\Entity\Pupilos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Senseis>
 *
 * @method Pupilos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pupilos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pupilos[]    findAll()
 * @method Pupilos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadesPupilos extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pupilos::class);
    }

    public function add(Pupilos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Pupilos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Pupilos[] Returns an array of Senseis objects
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

//    public function findOneBySomeField($value): ?Senseis
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
