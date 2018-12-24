<?php

/**
 * @package Flextype
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use League\Flysystem\Filesystem as Flysystem;
use League\Flysystem\Adapter\Local;

class Filesystem
{
    /**
     * An instance of the Cache class
     *
     * @var object
     * @access private
     */
    private static $instance = null;

    /**
     * Cache Driver
     *
     * @var Filesystem
     */
    protected static $driver;

    /**
     * Private clone method to enforce singleton behavior.
     *
     * @access private
     */
    private function __clone()
    {
    }

    /**
     * Private wakeup method to enforce singleton behavior.
     *
     * @access private
     */
    private function __wakeup()
    {
    }

    /**
     * Private construct method to enforce singleton behavior.
     *
     * @access private
     */
    private function __construct()
    {
        Filesystem::init();
    }

    /**
     * Init Cache
     *
     * @access protected
     * @return void
     */
    protected static function init() : void
    {
        // Get Filesystem Driver
        Filesystem::$driver = Filesystem::getFilesystemDriver();
    }

    /**
     * Get Cache Driver
     *
     * @access public
     * @return object
     */
    public static function getFilesystemDriver()
    {
        $filesystem = new Flysystem(new Local(ROOT_DIR));

        return $filesystem;
    }

    /**
     * Returns driver variable
     *
     * @access public
     * @return object
     */
    public static function driver()
    {
        return Filesystem::$driver;
    }

    /**
     * Get the Cache instance.
     *
     * @access public
     * @return object
     */
    public static function getInstance()
    {
        if (is_null(Filesystem::$instance)) {
            Filesystem::$instance = new self;
        }

        return Filesystem::$instance;
    }
}
