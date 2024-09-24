<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clisstore_theme
 */

get_header();
?>

    <section class="frontpage-banner">
        
    </section>

	<main id="primary" class="site-main">
        <?php
        // Obtener los productos
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 4 // Número de productos a mostrar
        );
        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) : ?>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="swiper-slide">
                            <?php
                            // Obtener todas las imágenes del producto
                            $attachment_ids = $product->get_gallery_attachment_ids();

                            // Mostrar la primera imagen como imagen destacada
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } else {
                                // Si no hay imagen destacada, mostrar la primera imagen de la galería
                                if ( $attachment_ids ) {
                                    echo wp_get_attachment_image( $attachment_ids[0], 'full' );
                                }
                            }

                            // Mostrar las demás imágenes en una galería (opcional)
                            if ( count( $attachment_ids ) > 1 ) {
                                echo '<div class="product-gallery">';
                                foreach( $attachment_ids as $attachment_id ) {
                                    echo wp_get_attachment_image( $attachment_id, 'thumbnail' );
                                }
                                echo '</div>';
                            }
                            ?>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo $product->get_price_html(); ?></p>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <script>
                // Inicializar Swiper
                var swiper = new Swiper('.swiper-container', {
                    // Opciones de configuración de Swiper
                });
            </script>
        <?php endif; ?>

        <div class="collections">
            
        </div>
	</main><!-- #main -->

<?php
get_footer();
