<?php

declare(strict_types=1);

/**
 * @link http://romanenko.digital
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Psr7Middlewares\Middleware\ResponseTime;
use Psr7Middlewares\Middleware\TrailingSlash;

/**
 * Add middleware CSRF (cross-site request forgery) protection for all routes
 */
$app->add($flextype->get('csrf'));

/**
 * Add middleware TrailingSlash for all routes
 */
$app->add((new TrailingSlash(false))->redirect(301));

/**
 * Add middleware ResponseTime for all routes
 */
$app->add((new ResponseTime()));
