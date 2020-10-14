<?php

declare(strict_types=1);

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Genre;
use App\Entity\Movie;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @author  Gaëtan Rolé-Dubruille <gaetan.role-dubruille@sensiolabs.com>
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
     * A DQL sample to retrieve last movies with a Genre parameter.
     */
    public function findLatestMoviesByGenre(Genre $genre = null): array
    {
        $qb = $this->createQueryBuilder('m')
            ->addSelect('g')
            ->leftJoin('m.genres', 'g')
            ->where('m.released <= :now')
            ->orderBy('m.released', 'DESC')
            ->setParameter('now', new DateTime())
        ;

        if (null !== $genre) {
            $qb->andWhere(':genre MEMBER OF m.genres')
                ->setParameter('genre', $genre)
            ;
        }

        return $qb->getQuery()->getResult();
    }
}
