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

    <section class="frontpage-banner" style='<?php echo "background:url(" . get_theme_mod('header_background_image') . ") no-repeat;"; ?>' >
       <div class="content">
            <h1><?php echo get_theme_mod('header_title') ?></h1>
            <p><?php echo get_theme_mod('header_text') ?></p>
            <div class="cta-buttons">
                <a class="btn btn-primary" href="#"><?php echo get_theme_mod('cta_button_1_text') ?></a>
            </div>
       </div>
    </section>

	<main id="primary" class="site-main">
        <?php
        // Obtener los productos
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 10 // Número de productos a mostrar
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) : ?>
            <section class="section products">
                <div class="swiper-container" id="productsSlider">
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
                                <div class="product-description">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo $product->get_price_html(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <script>
                    // Inicializar Swiper
                    var swiper = new Swiper('#productsSlider', {
                        // Opciones de configuración de Swiper
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        breakpoints: {
                            // Cuando la pantalla es menor a 1024px
                            1024: {
                                slidesPerView: 4, // Muestra 4 slides en tabletas
                                spaceBetween: 2.5,
                            },
                        
                            960: {
                                slidesPerView: 3, // Muestra 3 slides en tabletas
                                spaceBetween: 2.5,
                            },
                            // Cuando la pantalla es menor a 768px
                            768: {
                                slidesPerView: 2, // Muestra 2 slides en móviles pequeños
                                spaceBetween: 15,
                            },
                            // Cuando la pantalla es menor a 480px
                            480: {
                                slidesPerView: 1, // Muestra 1 slide en móviles
                                spaceBetween: 10,
                            },
                        },
                    });
                </script>
            </section>
        <?php endif; ?>
        <section class="section product-categories">
            <div class="swiper-container" id="productsCategories">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                        'number'     => 3, // Limitar a 3 categorías
                    );

                    $categories = get_terms($args);

                    if (!empty($categories) && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                    <?php echo wp_get_attachment_image(get_term_meta($category->term_id, 'thumbnail_id', true), 'full'); ?>
                                    <h2><?php echo esc_html($category->name); ?></h2>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <script>
                var swiper = new Swiper('#productsCategories', {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    loop: true, // Para que el slider sea cíclico
                });
            </script>
        </section>
	</main><!-- #main -->
    
    <a href="<?php echo get_theme_mod('whatsapp-url') ?>" class="whatsapp-icon">
        <img src="<?php echo get_template_directory_uri() . '/images/wa-icon.svg' ?>" alt="">
    </a>
<?php
get_footer();
