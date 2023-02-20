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
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Template\Manager\Contracts;

/**
 * Template interface.
 *
 * @since  1.0.0
 * @access public
 */
interface Template {

	/**
	 * Returns the filename relative to the templates location.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function filename();

	/**
	 * Returns the internationalized text label for the template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function label();

	/**
	 * Conditional function to check what type of template this is.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return bool
	 */
	public function isType( $type );

	/**
	 * Conditional function to check if the template has a specific subtype.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return bool
	 */
	public function hasSubtype( $subtype );

	/**
	 * Conditional function to check if the template is for a post type.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return bool
	 */
	public function forPostType( $type );
}
