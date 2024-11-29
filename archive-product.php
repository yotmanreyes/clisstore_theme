<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     *
     * @hooked woocommerce_taxonomy_archive_description - 10
     * @hooked woocommerce_product_archive_description - 10
     */
    do_action( 'woocommerce_archive_description' );
    ?>
</header>
<?php
if ( woocommerce_product_loop() ) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action( 'woocommerce_before_shop_loop' );

    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action( 'woocommerce_shop_loop' );

            global $product;
            ?>
            <div class="product-image-slide">
                <a class="link" href="<?php echo esc_url(get_the_permalink()); ?>">
                    <?php
                    // Mostrar la imagen destacada
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('full', array('class' => 'main-image'));
                    }

                    // Mostrar galería de imágenes
                    $attachment_ids = $product->get_gallery_image_ids();
                    if ( $attachment_ids ) {
                        echo '<div class="product-gallery">';
                        foreach( $attachment_ids as $attachment_id ) {
                            echo wp_get_attachment_image( $attachment_id, 'thumbnail', false, array('class' => 'gallery-image') );
                        }
                        echo '</div>';
                    }

                    // Mostrar atributos (tallas)
                    if ( $product->get_attribute( 'size' ) ) {
                        $sizes = explode(', ', $product->get_attribute( 'size' ));
                        echo '<ul class="product-sizes">';
                        foreach($sizes as $size){
                            echo '<li class="size">' . esc_html($size) . '</li>'; 
                        }
                        echo '</ul>';
                    }
                    ?>
                    <div class="product-description">
                        <h4><?php the_title(); ?></h4>
                        <p><?php echo $product->get_price_html(); ?></p>
                    </div>
                </a>
            </div>
            <?php
        }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action( 'woocommerce_after_shop_loop' );
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );