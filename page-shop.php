<?php
/**
 * Template Name: Shop Page
 * Description: A custom page template for displaying WooCommerce products.
 */

 get_header();
 ?>
 
     <main id="primary" class="site-main">
 
         <?php
         if ( have_posts() ) :
 
             if ( is_home() && ! is_front_page() ) :
                 ?>
                 <header>
                     <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                 </header>
                 <?php
             endif;
 
             /* Start the Loop */
             while ( have_posts() ) :
                 the_post();?>
                 <div class="product-image-slide">
                     <a class="link" href="<?php echo esc_url(get_the_permalink()); ?>">
                     <?php
                         // Obtener todas las imágenes del producto
                         $attachment_ids = $product->get_gallery_attachment_ids();
 
                         // Mostrar la primera imagen como imagen destacada
                         if ( has_post_thumbnail() ) {
                             the_post_thumbnail();
                         } else {
                             // Si no hay imagen destacada, mostrar la primera imagen de la galería
                             if ( $attachment_ids ) {
                                 echo wp_get_attachment_image( $attachment_ids[0], 'full', false, array('class' => 'main-image') );
                             }
                         }
 
                         // Mostrar las demás imágenes en una galería (opcional)
                         if ( count( $attachment_ids ) > 1 ) {
                             echo '<div class="product-gallery">';
                             foreach( $attachment_ids as $attachment_id ) {
                                 echo wp_get_attachment_image( $attachment_id, 'full', false, array('class' => 'gallery-image') );
                             }
                             echo '</div>';
                         }
                     
                         if ( $product->has_attributes() ) {
                             $attributes = $product->get_attributes();
                             $sizes      = explode(', ', implode(',', $attributes['size']->get_options()));
                     
                             if ( isset( $attributes['size'] ) ) { 
                                 echo '<ul class="product-sizes">';
                                 foreach($sizes as $size){
                                     echo '<li class="size">' . $size .  '</li>'; 
                                 }
                                 echo '</ul>';
                             }
                         } 
 
                     ?>
                     <div class="product-description">
                         <h4><?php the_title(); ?></h4>
                         <p><?php echo $product->get_price_html(); ?></p>
                     </div>
                     </a>
                 </div>
                 <?php
                 /*
                  * Include the Post-Type-specific template for the content.
                  * If you want to override this in a child theme, then include a file
                  * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                  */
                 //get_template_part( 'template-parts/content', get_post_type() );
 
             endwhile;
 
             the_posts_navigation();
 
         else :
 
             get_template_part( 'template-parts/content', 'none' );
 
         endif;
         ?>
 
     </main><!-- #main -->
 
 <?php
 get_footer();