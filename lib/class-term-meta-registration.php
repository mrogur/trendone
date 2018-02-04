<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 21.01.2018
 * Time: 08:07
 */

class TermMetaRegistration
{
    private $taxonomy;
    private $fieldTitle;
    private $metaKey;

    public function __construct($taxonomyName, $metaKey, $fieldTitle)
    {
        $this->taxonomy = $taxonomyName;
        $this->fieldTitle = $fieldTitle;
        $this->metaKey = $metaKey;
    }

    public function init()
    {
        add_action($this->taxonomy . '_add_form_fields', [$this, 'add_form_field_term_meta_text']);
        add_action( $this->taxonomy.'_edit_form_fields', [$this, 'edit_form_field_term_meta_text'] );
        add_action( 'edit_'.$this->taxonomy,   [$this, 'save_term_meta_text'] );
        add_action( 'create_'.$this->taxonomy, [$this,'save_term_meta_text'] );
        add_filter( "manage_edit-{$this->taxonomy}_columns", [$this, 'edit_term_columns'], 10, 3 );
        add_filter( "manage_edit-{$this->taxonomy}_sortable_columns", [$this, 'edit_sortable_term_columns']);
        add_filter( "manage_{$this->taxonomy}_custom_column", [$this,'manage_term_custom_column'], 10, 3 );

        $this->register_term_meta_text();
    }

    public function register_term_meta_text()
    {
        register_meta('term', $this->metaKey, [$this, 'sanitize_term_meta_text']);
    }

    public function sanitize_term_meta_text($metaValue)
    {
        return sanitize_text_field($metaValue);
    }

    public function get_term_meta_text($termId)
    {
        $value = get_term_meta($termId, $this->metaKey, true);
        $value = $this->sanitize_term_meta_text($value);
        return $value;
    }


    public function add_form_field_term_meta_text()
    { ?>
        <?php wp_nonce_field(basename(__FILE__), $this->metaKey.'_nonce'); ?>
        <div class="form-field term-meta-text-wrap">
            <label for="<?php echo $this->metaKey ?>"><?php _e($this->fieldTitle, 'trendone'); ?></label>
            <input type="text" name="<?php echo $this->metaKey ?>" id="<?php echo $this->metaKey ?>" value=""
                   class="term-meta-text-field"/>
        </div>
        <?php
    }

    public function edit_form_field_term_meta_text( $term ) {
        $value  = $this->get_term_meta_text( $term->term_id);
        if ( ! $value )
            $value = ""; ?>

        <tr class="form-field term-meta-text-wrap">
            <th scope="row"><label for="<?php $this->metaKey ?>"><?php _e( $this->fieldTitle, 'trendone' ); ?></label></th>
            <td>
                <?php wp_nonce_field( basename( __FILE__ ), $this->metaKey.'_nonce' ); ?>
                <input type="text" name="<?php echo $this->metaKey ?>"
                       id="<?php echo $this->metaKey ?>"
                       value="<?php echo esc_attr( $value ); ?>" class="term-meta-text-field"  />
            </td>
        </tr>
    <?php }


    public function save_term_meta_text( $term_id ) {
        $nonce = $this->metaKey.'_nonce';
        if ( ! isset( $_POST[$nonce] ) || ! wp_verify_nonce( $_POST[$nonce], basename( __FILE__ ) ) )
            return;
        $old_value  = $this->get_term_meta_text( $term_id );
        $new_value = isset( $_POST[$this->metaKey] ) ? $this->sanitize_term_meta_text ( $_POST[$this->metaKey] ) : '';
        if ( $old_value && '' === $new_value )
            delete_term_meta( $term_id, $this->metaKey );
        else if ( $old_value !== $new_value )
            update_term_meta( $term_id, $this->metaKey, $new_value );
    }

    function edit_term_columns( $columns ) {
        $columns[$this->metaKey] = __( $this->fieldTitle, 'trendone' );
        return $columns;
    }
    function edit_sortable_term_columns($sortable)
    {
        $sortable[$this->metaKey] = $this->metaKey;
        return $sortable;
    }

    function manage_term_custom_column( $out, $column, $term_id ) {
        if ( $this->metaKey === $column ) {
            $value  = $this->get_term_meta_text( $term_id );
            if ( ! $value )
                $value = '';
            $out = sprintf( '<span class="term-meta-text-block" style="" >%s</span>', esc_attr( $value ) );
        }
        return $out;
    }

}
