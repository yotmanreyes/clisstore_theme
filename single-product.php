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
                        echo '<div class="single-product_description">' . apply_filters( 'woocommerce_product_description', $post->post_content ) . '</div>';

                        // Mostrar el atributo "size"
                        if ( $product->has_attributes() ) {
                            $attributes = $product->get_attributes();
                            if ( isset( $attributes['size'] ) ) { // Verificar si existe el atributo "size"
                                echo '<div class="product-attributes">';
                                echo '<strong>Tallas disponibles:</strong> ';
                                echo implode( ', ', $attributes['size']->get_options() ); // Mostrar opciones de tamaño
                                echo '</div>';
                            }
                           
                            if ( isset( $attributes['attributes'] ) ) { // Verificar si existe el atributo "size"
                                echo '<div class="product-attributes">';
                                echo '<strong>Caracteristicas:</strong> ';
                                echo implode( ', ', $attributes['attributes']->get_options() ); // Mostrar opciones de tamaño
                                echo '</div>';
                            }
                           
                            if ( isset( $attributes['colors'] ) ) { // Verificar si existe el atributo "size"
                                echo '<div class="product-attributes">';
                                echo '<strong>Colores:</strong> ';
                                echo implode( ', ', $attributes['colors']->get_options() ); // Mostrar opciones de tamaño
                                echo '</div>';
                            }
                        }

                        // Botón de WhatsApp
                        $phone_number = get_theme_mod('whatsapp_number');
                        echo "<a href='{$phone_number}?text=Estoy%20interesado%20en%20el%20producto%3A%20" . urlencode(get_the_title()) . "' class='whatsapp-button'>Contactar por WhatsApp</a>";

                        // Botones de envío
                        echo '<div class="shipping-buttons">';
                        echo '<h3>Compañias de Envio</h3>';
                        echo '<button class="shipping-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#5d4037" d="m40,28c0,12-16.13,15-16.13,15,0,0-15.87-4-15.87-15V7c10.06-3.98,20.72-4.02,32,0v21Z"/><path fill="#ffb74d" d="m38,26.31c-.15,3.6-4.05,4.8-7.2,2.85v-2.55c1.8,1.5,4.5,1.65,4.35-.45,0-2.4-4.5-1.95-4.5-6.15,0-2.25,1.75-3.51,3.66-3.66,1.14-.07,2.34.22,3.24.96v2.4c-1.5-1.65-4.2-1.5-4.2.15,0,2.4,4.8,1.95,4.65,6.45Z"/><path fill="#ffb74d" d="m24.75,16.31c-1.53,0-2.97.49-3.7,1v18.45h2.85v-6c2.1.6,6.15-.15,6.15-6.75,0-5.25-2.76-6.69-5.29-6.7Zm-1,11.2v-8.7c.18-.08.48-.18.82-.21,1.03-.09,2.47.48,2.47,4.41.15,6-3,4.5-3.3,4.5Z"/><path fill="#ffb74d" d="m19.55,16.56v12.3c-1.5,1.05-8.55,3.15-8.55-3.45v-8.85h2.85v9c0,2.7,2.4,1.95,2.85,1.65v-10.65h2.85Z"/><path fill="#ffb74d" d="m24.3,4.02c-6.14.14-12.04,1.57-16.3,3.89v10.08s7.76-9.31,24.85-10.08c2.65-.12,5.24.08,7.72.31v-1.09c-5.27-2.87-10.13-3.26-16.27-3.12Z"/><path fill="#ffb74d" d="m23.84,44.02l-.21-.05c-.68-.17-16.63-4.32-16.63-15.97V6.32l.63-.25c10.29-4.07,21.3-4.08,32.7-.01l.66.24v21.71c0,12.68-16.77,15.95-16.94,15.98l-.22.04ZM9,7.69v20.31c0,9.42,13.07,13.45,14.91,13.97,1.86-.41,15.09-3.67,15.09-13.97V7.71c-10.46-3.58-20.55-3.59-30-.02Z"/></svg></button>';
                        echo '</div>';

                        // Añadir al carrito con selección de cantidad
                        woocommerce_template_single_add_to_cart();
                    ?>
                </div>
                <?php
            endwhile; // Fin del bucle
            ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();