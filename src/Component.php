<?php
/**
 * Template component class.
 *
 * This class is used to boot the template component and handle its action and
 * filter hooks.
 *
 * @package   HybridTemplateManager
 * @link      https://github.com/themehybrid/hybrid-template-manager
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Template\Manager;

use Hybrid\Contracts\Bootable;

/**
 * Template component class.
 *
 * @since  1.0.0
 *
 * @access public
 */
class Component implements Bootable {

    /**
     * Templates collection.
     *
     * @since  1.0.0
     * @var \Hybrid\Template\Manager\Templates
     *
     * @access protected
     */
    protected $templates;

    /**
     * Sets the initial templates collection.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function __construct( Templates $templates ) {
        $this->templates = $templates;
    }

    /**
     * Sets up the templates manager actions and filters.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function boot() {

        // Add registration callback.
        add_action( 'init', [ $this, 'register' ], 95 );

        // Filter theme post templates to add registered templates.
        add_filter( 'theme_templates', [ $this, 'postTemplates' ], 5, 4 );
    }

    /**
     * Executes the action hook for themes to register their templates.
     * Themes should always register on this hook.
     *
     * Note that this method is `public` because of WP's hook callback
     * system. See the implemented contract for publicly-available methods.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function register() {
        do_action( 'hybrid/template/manager/register', $this->templates );
    }

    /**
     * Filter used on `theme_templates` to add custom templates to the template
     * drop-down.
     *
     * Note that this method is `public` because of WP's hook callback
     * system. See the implemented contract for publicly-available methods.
     *
     * @since  1.0.0
     * @param  array  $templates
     * @param  object $theme
     * @param  object $post
     * @param  string $post_type
     * @return array
     *
     * @access public
     */
    public function postTemplates( $templates, $theme, $post, $post_type ) {

        foreach ( $this->templates->all() as $template ) {
            if ( $template->forPostType( $post_type ) ) {
                $templates[ $template->filename() ] = esc_html( $template->label() );
            }
        }

        return $templates;
    }

}
