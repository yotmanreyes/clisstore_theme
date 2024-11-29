<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 */
do_action( 'woocommerce_before_main_content' );

// Añadir banner de categoría
$term = get_queried_object();
if ($term && !empty($term->term_id)) {
    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
    if ($thumbnail_id) {
        $image = wp_get_attachment_image_src($thumbnail_id, 'full');
        if ($image) {
            echo '<div class="category-banner" style="background-image: url(' . esc_url($image[0]) . ');">';
            echo '<h1 class="category-title">' . esc_html($term->name) . '</h1>';
            echo '</div>';
        }
    }
}

?>
<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     */
    do_action( 'woocommerce_archive_description' );
    ?>
</header>
<?php
if ( woocommerce_product_loop() ) {

    /**
     * Hook: woocommerce_before_shop_loop.
     */
    do_action( 'woocommerce_before_shop_loop' );

    woocommerce_product_loop_start();

    ?>
    <div class="products-grid">
    <?php

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action( 'woocommerce_shop_loop' );

            global $product;
            ?>
            <article class="product-grid-item">
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
            </article>
            <?php
        }
    }

    ?>
    </div>
    <?php

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     */
    do_action( 'woocommerce_after_shop_loop' );
} else {
    /**
     * Hook: woocommerce_no_products_found.
     */
    do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );