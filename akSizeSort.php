<?php
/*
Plugin Name: Size Sorter
Description: Sorts product sizes to display as S, M, L, XL.
Version: 1.0
Author: Your Name
*/

add_filter( 'woocommerce_get_variation_attributes', 'sort_product_sizes', 10, 1 );
function sort_product_sizes( $attributes ) {
    $sizes = array( 'S', 'M', 'L', 'XL' );
    if ( isset( $attributes['pa_size'] ) ) {
        $attributes['pa_size'] = array_intersect( $sizes, $attributes['pa_size'] );
        usort( $attributes['pa_size'], function( $a, $b ) use ( $sizes ) {
            return array_search( $a, $sizes ) - array_search( $b, $sizes );
        } );
    }
    return $attributes;
}
?>
