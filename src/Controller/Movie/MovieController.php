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

namespace App\Controller\Movie;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to show many things related to one selected movie.
 *
 * @Route("/movie", name="app_movie_")
 *
 * @author  Gaëtan Rolé-Dubruille <gaetan.role-dubruille@sensiolabs.com>
 */
class MovieController extends AbstractController
{
    /**
     * @Route("/details/{uuid}", name="details", methods={"GET"})
     */
    public function details(string $uuid): Response
    {
        $movieRepository = $this->getDoctrine()->getManager()->getRepository(Movie::class);

        return $this->render('movie/details.html.twig', [
            'movie' => $movieRepository->findOneByUuid($uuid),
        ]);
    }

    /**
     * @todo Add a Movie parameter to this route
     * @Route("/player", name="player", methods={"GET"})
     */
    public function player(): Response
    {
        return $this->render('movie/player.html.twig');
    }

    /**
     * @todo Add a Movie parameter to this route
     * @Route("/trailer", name="trailer", methods={"GET"})
     */
    public function trailer(): Response
    {
        return $this->render('movie/trailer.html.twig');
    }
}
