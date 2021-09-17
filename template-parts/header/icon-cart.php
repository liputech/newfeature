<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<?php if ( class_exists( 'WooCommerce' ) ) { ?>
<div class="cart-icon-area">
	<a href="<?php echo esc_url( wc_get_cart_url() );?>"><i class="fas fa-shopping-cart" aria-hidden="true"></i><?php echo wp_kses( WC()->cart->get_cart_subtotal() , 'alltext_allow' ); ?></a>
	<div class="cart-icon-products">
		<?php the_widget( 'WC_Widget_Cart' ); ?>
	</div>
</div>
<?php } ?>