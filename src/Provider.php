<?php
/**
 * Object templates service provider.
 *
 * This is the service provider for the object templates system, which binds an
 * empty collection to the container that can later be used to register templates.
 *
 * @package   HybridTemplateManager
 * @link      https://github.com/themehybrid/hybrid-template-manager
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Template\Manager;

use Hybrid\Core\ServiceProvider;

/**
 * Object templates provider class.
 */
class Provider extends ServiceProvider {

    /**
     * Registers the templates collection and manager.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton( Component::class );
    }

    /**
     * Boots the manager by firing its hooks in the `boot()` method.
     *
     * @return void
     */
    public function boot() {
        $this->app->resolve( Component::class )->boot();
    }

}
