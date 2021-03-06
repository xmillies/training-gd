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

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author  Gaëtan Rolé-Dubruille <gaetan.role@gmail.com>
 */
abstract class AbstractWebTestCase extends WebTestCase
{
    /** @var KernelBrowser A Web client */
    protected static $webClient;

    /**
     * Setting up $webClient var
     */
    protected function setUp(): void
    {
        parent::setUp();

        self::$webClient = self::createClient();
        self::$webClient->followRedirects(false);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown(): void
    {
        self::$webClient = null;

        parent::tearDown();
    }
}
