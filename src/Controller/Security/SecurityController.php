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

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to manage security contents such as login, logout, password recovering and so on.
 *
 * @Route(name="app_security_")
 *
 * @author  Gaëtan Rolé-Dubruille <gaetan.role-dubruille@sensiolabs.com>
 */
class SecurityController extends AbstractController
{
    /**
     * @todo Add a auth feature
     * @Route("/login", name="login", methods={"GET", "POST"})
     */
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @todo Add a recover feature
     * @Route("/recover", name="recover_password", methods={"GET", "POST"})
     */
    public function recover(): Response
    {
        return $this->render('security/recover_password.html.twig');
    }
}
