<?php

namespace App\Repository;

use App\Data\SearchDataCity;
use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<City>
 *
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findAll()
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, City::class);
    }

    public function add(City $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(City $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
/*
 * Récupére les villes en lien avec une recherche
 * @Return City[]
 */
    public function findSearch(SearchDataCity $data):array
    {
        $query = $this
            ->createQueryBuilder('c');

        if (!empty($data->q)) {
            $query = $query
                ->andWhere('c.city_n LIKE :q')
                ->setParameter('q', "%{$data->q}%");
        }

        if (!empty($data->postal_c)){
            $query = $query
                ->andWhere('c.postal_c LIKE :postal_c')
                ->setParameter('postal_c',"%{$data->postal_c}%");
        }

        return $query->getQuery()->getResult();
    }
}
