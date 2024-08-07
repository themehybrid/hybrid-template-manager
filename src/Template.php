<?php
/**
 * Object template class.
 *
 * This class allows for templates for any object type, which includes `post`,
 * `term`, and `user`.  When viewing a particular single post, term archive, or
 * user/author archive page, the template can be used.
 *
 * @package   HybridTemplateManager
 * @link      https://github.com/themehybrid/hybrid-template-manager
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Template\Manager;

use Hybrid\Template\Manager\Contracts\Template as TemplateContract;

/**
 * Creates a new object template.
 */
class Template implements TemplateContract {

    /**
     * Type of template. By default, we'll assume this is a post template,
     * but theme authors can extend this to term or user templates, for
     * example.
     *
     * @var string
     */
    protected $type = 'post';

    /**
     * Array of subtypes template works with.
     *
     * @var array
     */
    protected $subtype = [];

    /**
     * Filename of the template.
     *
     * @var string
     */
    protected $filename = '';

    /**
     * Internationalized text label.
     *
     * @var string
     */
    protected $label = '';

    /**
     * Magic method to use in case someone tries to output the object as a
     * string. We'll just return the name.
     *
     * @return string
     */
    public function __toString() {
        return $this->filename();
    }

    /**
     * Register a new template object.
     *
     * @param string $filename
     * @param array  $args
     * @return void
     */
    public function __construct( $filename, array $args = [] ) {

        foreach ( array_keys( get_object_vars( $this ) ) as $key ) {

            if ( isset( $args[ $key ] ) ) {
                $this->$key = $args[ $key ];
            }
        }

        // Allow `post_types` as an alias for `subtype`.
        if ( isset( $args['post_types'] ) ) {
            $this->subtype = (array) $args['post_types'];
        }

        $this->filename = $filename;
    }

    /**
     * Returns the filename relative to the templates location.
     *
     * @return string
     */
    public function filename() {
        return $this->filename;
    }

    /**
     * Returns the internationalized text label for the template.
     *
     * @return string
     */
    public function label() {
        return $this->label;
    }

    /**
     * Conditional function to check what type of template this is.
     *
     * @param string $type
     * @return bool
     */
    public function isType( $type ) {
        return $type === $this->type;
    }

    /**
     * Conditional function to check if the template has a specific subtype.
     *
     * @param string $subtype
     * @return bool
     */
    public function hasSubtype( $subtype ) {
        return ! $this->subtype || in_array( $subtype, (array) $this->subtype );
    }

    /**
     * Conditional function to check if the template is for a post type.
     *
     * @param string $type
     * @return bool
     */
    public function forPostType( $type ) {
        return $this->isType( 'post' ) && $this->hasSubtype( $type );
    }

}
