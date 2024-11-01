<?php
/**
 * Customer shipped order email
 *
 * @author 		Vinum Master
 * @package 	vm_tracking/emails
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
  

?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<h2><?php echo __('Hi','vm_tracking').' '. $order->billing_first_name.' '.$order->billing_last_name ?></h2>

<p><?php echo $message ?></p>



<?php do_action( 'woocommerce_email_footer' ); ?>
