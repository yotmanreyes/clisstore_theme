<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente
}

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="product-grid">
            <?php
            while ( have_posts() ) :
                the_post();
                global $product; // Obtener el objeto del producto

                ?>
                <div class="first-column">
                    <?php
                        // Galería de imágenes del producto
                        echo '<div class="single-product_gallery">';
                        woocommerce_show_product_images();
                        echo '</div>';
                    ?>
                </div>

                <div class="second-column">
                    <?php
                        // Título del producto
                        echo '<h1 class="single-product_title">' . get_the_title() . '</h1>';

                        // Precio del producto
                        echo '<div class="single-product_price">' . $product->get_price_html() . '</div>';

                        // Descripción larga
                        echo '<div class="product-description">' . apply_filters( 'woocommerce_product_description', $post->post_content ) . '</div>';

                        // Mostrar el atributo "size"
                        if ( $product->has_attributes() ) {
                            $attributes = $product->get_attributes();
                            if ( isset( $attributes['size'] ) ) { // Verificar si existe el atributo "size"
                                echo '<div class="product-attributes">';
                                echo '<strong>Tallas disponibles:</strong> ';
                                echo implode( ', ', $attributes['size']->get_options() ); // Mostrar opciones de tamaño
                                echo '</div>';
                            }
                        }

                        // Botón de WhatsApp
                        echo '<a href="https://wa.me/1234567890?text=Estoy%20interesado%20en%20el%20producto%3A%20' . urlencode(get_the_title()) . '" class="whatsapp-button">Contactar por WhatsApp</a>';

                        // Botones de envío
                        echo '<div class="shipping-buttons">';
                        echo '<button class="shipping-button">USPS</button>';
                        echo '<button class="shipping-button">UPS</button>';
                        echo '</div>';

                        // Añadir al carrito con selección de cantidad
                        woocommerce_template_single_add_to_cart();
                    ?>
                </div>
                <?php
            endwhile; // Fin del bucle
            ?>
        </div>

        <h2>Productos Relacionados</h2>
        <?php woocommerce_related_products(); // Lista de productos relacionados ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();