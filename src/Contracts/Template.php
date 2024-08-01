<?php
/**
 * Template interface.
 *
 * Defines the interface that template classes must use.
 *
 * @package   HybridTemplateManager
 * @link      https://github.com/themehybrid/hybrid-template-manager
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Template\Manager\Contracts;

/**
 * Template interface.
 */
interface Template {

    /**
     * Returns the filename relative to the templates location.
     *
     * @return string
     */
    public function filename();

    /**
     * Returns the internationalized text label for the template.
     *
     * @return string
     */
    public function label();

    /**
     * Conditional function to check what type of template this is.
     *
     * @return bool
     */
    public function isType( $type );

    /**
     * Conditional function to check if the template has a specific subtype.
     *
     * @return bool
     */
    public function hasSubtype( $subtype );

    /**
     * Conditional function to check if the template is for a post type.
     *
     * @return bool
     */
    public function forPostType( $type );

}
