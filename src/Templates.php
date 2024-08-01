<?php
/**
 * Templates manager.
 *
 * This class is just a wrapper around the `Collection` class for adding a
 * specific type of data.  Essentially, we make sure that anything added to the
 * collection is in fact a `Template`.
 *
 * @package   HybridTemplateManager
 * @link      https://github.com/themehybrid/hybrid-template-manager
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Template\Manager;

use Hybrid\Tools\Collection;

/**
 * Template collection class.
 *
 * @since  1.0.0
 *
 * @access public
 */
class Templates extends Collection {

    /**
     * Add a new template.
     *
     * @since  1.0.0
     * @param  string $name
     * @param  mixed  $value Deprecated: This parameter will be removed in a future release.
     * @return void
     * @deprecated Use put() instead.
     *
     * @access public
     */
    public function add( $name, $value = null ) {
        @trigger_error( __METHOD__ . '() is deprecated, use Templates::put().', E_USER_DEPRECATED );

        self::put( $name, $value );
    }

    /**
     * Put a new template into templates collection.
     *
     * @since 1.0.1
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function put( $name, $value = null ) {
        // If we are using `hybrid-tools` v2+
        // utilize `put()` method.
        if ( method_exists( 'Hybrid\Tools\Collection', 'put' ) ) {
            parent::put( $name, new Template( $name, $value ) );
        } else {
            parent::add( $name, new Template( $name, $value ) );
        }
    }

}
