<?php

declare(strict_types=1);

/**
 * @link http://romanenko.digital
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Flextype\Component\Assets\Assets;
use Twig_Extension;
use Twig_Extension_GlobalsInterface;

class AssetsTwigExtension extends Twig_Extension implements Twig_Extension_GlobalsInterface
{
    /**
     * Register Global variables in an extension
     */
    public function getGlobals()
    {
        return [
            'assets' => new AssetsTwig(),
        ];
    }
}

class AssetsTwig
{
    /**
     * Add Asset
     */
    public function add(string $asset_type, string $asset, string $namespace, int $priority = 1) : void
    {
        Assets::add($asset_type, $asset, $namespace, $priority);
    }

    /**
     * Get Asset
     */
    public function get(string $asset_type, string $namespace) : array
    {
        return Assets::get($asset_type, $namespace);
    }
}
