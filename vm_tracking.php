<?php
/*
 * Plugin Name: Shipping Tracking by Vinum Master Free Version 
 * Plugin URI: http://www.vinummaster.com/
 * Description: Add tracking url and tracking number to woocommerce
 * Author: Vinum Master
 * Author URI: http://www.vinummaster.com
 * Version: 1.0.2
 * Text Domain: vm_tracking
 * Domain Path: /languages
 * 
 * Requires at least: 4.0.0
 * Tested up to: 4.3.1
 * 
 * Copyright: (c) 2015 Vinum Master (webmaster@vinummaster.com)
 *  
 */

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (!class_exists('vm_tracking')) {

        class vm_tracking
        {

            public function __construct()
            {
                  $upload_dir      = wp_upload_dir();
                  
                define( 'VM_URL', plugins_url('', __FILE__) ); 
		define( 'VM_IMG',  VM_URL. "/assets/images/" );
                define( 'VM_URL_SAVE',  plugin_dir_path( __FILE__ ));
                define( 'VM_FILE_SAVE',  $upload_dir['basedir'] . '/vm_tracking/');
                
                
                             
                
                register_activation_hook(__FILE__, array(__CLASS__, 'install'));
                register_deactivation_hook(__FILE__, array(__CLASS__, 'uninstall'));

                add_action('admin_enqueue_scripts', array($this, 'scripts'));


                add_action('init', array($this, 'init'));
                add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'vm_tracking_action_links'));

                add_action('admin_footer-edit.php', array($this, 'custom_bulk_admin_footer'));
                add_action('load-edit.php', array($this, 'custom_bulk_admin_footer_handler'));


                add_filter('wc_order_statuses', array($this, 'add_delivery_order_to_order_statuses'));

                add_action('init', array($this, 'create_delivery_order_status'), 1);


                add_action('manage_shop_order_posts_custom_column', array($this, 'vm_add_delivery_icon'));
                add_action('woocommerce_view_order', array($this, 'vm_customer_account_display_tracking'));


                add_filter('manage_edit-shop_order_columns', array($this, 'vm_parcel_status_column'));
                add_action('manage_shop_order_posts_custom_column', array($this, 'vm_parcel_status_display'));

               
                add_action('restrict_manage_posts', array($this, 'vm_add_order_filter_by_shipping'));
                add_filter('posts_where', array($this, 'vm_filter_by_shipping_method'));
              
                add_action('restrict_manage_posts', array($this, 'vm_add_order_filter_by_status'));
                add_filter('posts_where', array($this, 'vm_filter_by_status'));
                
                add_action('restrict_manage_posts', array($this, 'vm_add_order_filter_by_parcel_status'));
                add_filter('posts_where', array($this, 'vm_filter_by_parcel_status'));


                 add_action('admin_notices', array($this,'vm_bulk_actions_admin_notices' ));
            }

            function init()
            {
                load_plugin_textdomain('vm_tracking', false, dirname(plugin_basename(__FILE__)) . '/languages/');
                include_once ( 'includes/vm-tracking-admin.php' );
                include_once ( 'includes/vm-tracking-settings.php' );
            }

            static function install()
            {
                $upload_dir      = wp_upload_dir();
	
		$files = array(
			array(
				'base' 		=> $upload_dir['basedir'] . '/vm_tracking',
				'file' 		=> 'index.html',
				'content' 	=> ''
			),
			array(
				'base' 		=> $upload_dir['basedir'] . '/vm_tracking',
				'file' 		=> '.htaccess',
				'content' 	=> 'deny from all'
			)
		);

		
		foreach ( $files as $file ) {
			if ( wp_mkdir_p( $file['base'] ) && ! file_exists( trailingslashit( $file['base'] ) . $file['file'] ) ) {
				if ( $file_handle = @fopen( trailingslashit( $file['base'] ) . $file['file'], 'w' ) ) {
					fwrite( $file_handle, $file['content'] );
					fclose( $file_handle );
				}
			}
		}
                
                
                
                
              
            }

            public static function uninstall()
            {
              
            }

            public function scripts($pagehook)
            {
                if (isset($_GET['post_type']) && strpos($_GET['post_type'], 'shop_order') != -1) {

                    wp_enqueue_style('vm_tracking_styles', plugins_url('vm_tracking/assets/css/admin.css'));
                }

                wp_enqueue_style('vm_tracking_front_styles', plugins_url('vm_tracking/assets/css/front.css'));

                $locale = $this->getJqueryUII18nLocale();

                if ($locale) {

                    wp_enqueue_script('jquery-ui-i18n-' . $locale, plugins_url('vm_tracking/languages/i18n/datepicker-' . $locale . '.js'), array('jquery-ui-datepicker'));
                }
            }

            public function getJqueryUII18nLocale()
            {
                $locale = str_replace('_', '-', get_locale());

                switch ($locale) {
                    case 'ar-DZ':
                    case 'cy-GB':
                    case 'en-AU':
                    case 'en-GB':
                    case 'en-NZ':
                    case 'fr-CH':
                    case 'fr-CA':
                    case 'nl-BE':
                    case 'nl-BE':
                    case 'pt-BR':
                    case 'sr-SR':
                    case 'zh-CN':
                    case 'zh-HK':
                    case 'zh-TW':
                        break;
                    default:
                        $locale = substr($locale, 0, strpos($locale, '-'));
                        break;
                }
                return $locale;
            }

            function vm_bulk_actions_admin_notices()
            {
                 global $post_type, $pagenow;
                 
               
        $error="";
   if (isset($_REQUEST['order_status_changed'])) {
        $number = absint( $_REQUEST['order_status_changed']['ok'] );
        $error =  sanitize_text_field($_REQUEST['order_status_changed']['error']);
        $message_title = __('Order status Changed','vm_tracking');
    } 
    elseif (isset($_REQUEST['order_refund_la_poste'])) {
         $number = absint( $_REQUEST['order_refund_la_poste']['ok'] );
           $error =  sanitize_text_field($_REQUEST['order_refund_la_poste']['error']);
        $message_title = __('Refund La Poste asked','vm_tracking');
    }
     elseif (isset($_REQUEST['order_refund_chronopost'])) {
         $number = absint( $_REQUEST['order_refund_chronopost']['ok'] );
           $error =  sanitize_text_field($_REQUEST['order_refund_chronopost']['error']);
        $message_title = __('Refund Chronopost asked','vm_tracking');
    }
    
        else {
        return;
    }
   
  
    if ( 'edit.php' == $pagenow && 'shop_order' == $post_type ) {
        $message = sprintf( __( $message_title . '. %s orders affected.', $number, 'vm_tracking' ), number_format_i18n( $number ) );
        if($error!='')
        $message.= sprintf( __( 'The orders: %s have not be affected.', $error, 'vm_tracking' ),$error  );
        echo '<div class="updated"><p>' . $message . '</p></div>';
    }
            }
            
           

            public function vm_tracking_action_links($links)
            {
                $plugin_links = array(
                    '<a href="' . admin_url('admin.php?page=wc-settings&tab=vm_tracking') . '">' . __('Settings', 'vm_tracking') . '</a>',
                );
                return array_merge($plugin_links, $links);
            }

            function create_delivery_order_status()
            {
                global $woocommerce;
                register_post_status('wc-delivery-order', array(
                    'label' => __('Shipped', 'vm_tracking'),
                    'public' => true,
                    'exclude_from_search' => false,
                    'show_in_admin_all_list' => true,
                    'show_in_admin_status_list' => true,
                    'label_count' => _n_noop('Shipped <span class="count">(%s)</span>', 'Shipped <span class="count">(%s)</span>')
                ));
            }

            function add_delivery_order_to_order_statuses($order_statuses)
            {
                global $woocommerce;
                $new_order_statuses = array();

                foreach ($order_statuses as $key => $status) {

                    $new_order_statuses[$key] = $status;

                    if ('wc-processing' === $key) {
                        $new_order_statuses['wc-delivery-order'] = __('Shipped', 'vm_tracking');
                    }
                }

                return $new_order_statuses;
            }

           
         
            function vm_add_delivery_icon($column)
            {

                global $post, $woocommerce;
                $order = new WC_Order($post->ID);

                if ($column != 'order_status') {
                    return;
                }

                $shipping_method = $order->get_shipping_methods();
                $shipping_method_name = $order->get_shipping_method();


                $tracking_number = get_post_meta($order->id, '_vm_tracking_number', true);
                $tracking_msg = get_post_meta($order->id, '_vm_tracking_msg', true);

                if ($order->get_status() == "delivery-order") {

                    echo '<a class="tips" style="display:inline-block;height:30px; padding-top:0; padding-bottom:0" href="#" data-tip="' . $tracking_msg . '">';
                    echo '<strong class="vm_status_icon_shipped" style="" >' . __('Shipped', 'vm_tracking') . '</strong></a>';
                }
            }

           

            function vm_customer_account_display_tracking($order_id)
            {

                global $woocommerce;

                $order = new WC_Order($order_id);

                $tracking_number = get_post_meta($order_id, '_vm_tracking_number', true);
                $carrier_name = get_post_meta($order_id, '_vm_carrier_name', true);
                $shipped_date = get_post_meta($order_id, '_vm_shipped_date', true);
                $tracking_msg = get_post_meta($order_id, '_vm_tracking_msg', true);

                $shipped_date = strtotime($shipped_date);

                $shipping_method = $order->get_shipping_methods();
                $shipping_method_name = $order->get_shipping_method();
                foreach ($shipping_method as $shipping_item_id => $shipping_item) {
                    $carrier = $shipping_item['method_id'];
                }
                $tracking_url = get_option('vm_tracking_url_' . $carrier);
                $tracking_url = str_replace('@', $tracking_number, $tracking_url);

                $formated_date = date_i18n(__('l j F Y', 'vm_tracking'), $shipped_date);

                echo '<h2>';
                echo __('Where is my Order ?', 'vm_tracking');
                echo '</h2>';

                echo __('Your order is sent the', 'vm_tracking') . ' ';
                echo '<span style="color:red; font-weight:bold;"> ' . $formated_date . '</span>' . ' ';
                echo __('with', 'vm_tracking') . ' ';
                echo '<span style="color:red; font-weight:bold;"> ' . $shipping_method_name . '</span>';

                echo '<br/>';
                echo __('Your tracking number is: ', 'vm_tracking');
                echo '<span style="color:red; font-weight:bold;">' . $tracking_number . '</span>';
                echo '<br/>';
                echo __('You can track your order by clicking on that button:  ', 'vm_tracking');
                echo '<a class="vm_track_button" href="' . $tracking_url . '" style="color:#fff;background: #40CA45;-webkit-border-radius: 3px;-moz-border-radius: 3px;-o-border-radius: 3px;border-radius: 3px;padding-left:10px; padding-right:10px; " target="blanck">' . __('Track my order', 'vm_tracking') . '</a>';
                echo '<br/></br>';
                echo __('Currently, your parcel status is:  ', 'vm_tracking');
                echo '<span style="color:red; font-weight:bold;">'.$tracking_msg.'</span>';
                echo '<br/></br>';
      
            }

            function custom_bulk_admin_footer()
            {

                global $wpdb, $post_type;

                $status_list = wc_get_order_statuses();

                unset($status_list['wc-processing']);
                unset($status_list['wc-completed']);
                unset($status_list['wc-on-hold']);


                asort($status_list);
                
               $laposte= $wpdb->get_var("SELECT option_name FROM ".$wpdb->prefix."options WHERE option_value = 'LA POSTE' ");
               $chronopost = $wpdb->get_var("SELECT option_name FROM ".$wpdb->prefix."options WHERE option_value = 'CHRONOPOST' ");


                if ('shop_order' == $post_type) {
                    ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function () {
                            jQuery('.custom_payment_status').each(function () {
                                jQuery(this).parent().parent().css('background-color', jQuery(this).attr('rowcolor'));
                            });
                    <?php foreach ($status_list as $status_id => $status_name) { ?>

                                jQuery('<option>').val('mark_custom_status_<?php echo $status_id; ?>')
                                        .text('<?php _e("Mark as", "vm_tracking") ?> <?php echo $status_name; ?>').appendTo('select[name=action]');
                                                jQuery('<option>').val('mark_custom_status_<?php echo $status_id; ?>')
                                                        .text('<?php _e("Mark as", "vm_tracking") ?> <?php echo $status_name; ?>').appendTo('select[name=action2]');

                        <?php
                    }
                    ?> jQuery('<option>').val('vm_run_tracking')
                                                                    .text('<?php _e("Launch tracking", "vm_tracking") ?>').appendTo('select[name=action]');
                                                            jQuery('<option>').val('vm_run_tracking')
                                                                    .text('<?php _e('Run Tracking', 'vm_tracking') ?>').appendTo('select[name=action2]');
                                                            
                                                           
                                                          
                                                        });
                    </script>
                    <?php
                }
            }

            function custom_bulk_admin_footer_handler()
            {
                if (!isset($_REQUEST['post'])) {
                    return;
                }
                $wp_list_table = _get_list_table('WP_Posts_List_Table');
                $action = $wp_list_table->current_action();



                $return = array();
                $return['ok']=0;
                $return['error']="";
                $post_ids = array_map('absint', (array) $_REQUEST['post']);
                if (strstr($action, 'mark_custom_status')) {
                    $new_status = substr($action, strlen('mark_custom_status_'));
                    $report_action = "order_status_changed";
                    foreach ($post_ids as $post_id) {
                        $order = new WC_Order($post_id);
                        $order->update_status($new_status);
                         $return['ok']++;
                    }
                } elseif ($action == 'vm_run_tracking') {
                           $report_action = "order_tracking_uppdated";
            
                    $return = $this->update_tracking_by_cron($post_ids);
                } 
                else {
                    return;
                }
                $sendback = add_query_arg(array('post_type' => 'shop_order', $report_action => $return, 'ids' => join(',', $post_ids)), '');
                wp_redirect($sendback);
                exit();
            }

            function vm_add_order_filter_by_shipping()
            {
                global $typenow, $wp_query;
                if (in_array($typenow, wc_get_order_types('order-meta-boxes'))) :
                    $carriers = WC()->shipping->load_shipping_methods();
                    $shipping_filter = array();

                    if (!empty($_GET['shipping_filter'])) {
                        $shipping_filter = sanitize_text_field($_GET['shipping_filter']);
                    }
                    ?>
                    <select name='shipping_filter'>
                        <option value=''><?php _e('Select a shipping method', 'vm_tracking'); ?></option><?php foreach ($carriers as $key => $method) : ?>
                            <option <?php selected($shipping_filter, $method->get_title()); ?> value='<?php echo esc_html($method->get_title()); ?>'><?php echo esc_html($method->get_title()); ?></option><?php
                        endforeach;
                        ?></select><?php
                endif;
            }

            function vm_filter_by_shipping_method($where)
            {
                global $typenow, $wpdb;

                if (is_admin() && isset($_GET['post_type']) && strpos($_GET['post_type'], 'shop_order') != -1 && isset($_GET['shipping_filter']) && !empty($_GET['shipping_filter'])) {



                    $where .= $wpdb->prepare(' AND ID
                            IN (
                                SELECT order_id
                                FROM '.$wpdb->prefix.'woocommerce_order_items
                                WHERE order_item_type = "shipping"
                                AND order_item_name = %s
                            )', sanitize_text_field($_GET['shipping_filter']));
                }

                return $where;
            }

            function vm_filter_by_status($where)
            {
                global $typenow, $wpdb;

                if (is_admin() && isset($_GET['post_type']) && strpos($_GET['post_type'], 'shop_order') != -1 && isset($_GET['status_filter']) && !empty($_GET['status_filter'])) {



                    $where .= $wpdb->prepare(' AND ID
                            IN (
                                SELECT ID
                                FROM '.$wpdb->prefix.'posts
                                WHERE post_status = %s
                              
                            )', sanitize_text_field($_GET['status_filter']));
                }

                return $where;
            }

            function vm_add_order_filter_by_status()
            {
                global $typenow, $wp_query;
                if (in_array($typenow, wc_get_order_types('order-meta-boxes'))) :
                    $status_list = wc_get_order_statuses();
                    $status_filter = array();

                    if (!empty($_GET['status_filter'])) {
                        $status_filter = sanitize_text_field($_GET['status_filter']);
                    }
                    ?>
                    <select name='status_filter'>
                        <option value=''><?php _e('Select a Status', 'vm_tracking'); ?></option><?php foreach ($status_list as $status_id => $status_name) : ?>
                            <option <?php selected($status_filter, $status_id); ?> value='<?php echo $status_id; ?>'><?php echo $status_name; ?></option><?php
                        endforeach;
                        ?></select><?php
                endif;
            }

            function update_tracking_by_cron($orders_id)
            {

                include_once('includes/functions/statuts.php');
                include_once('includes/functions/traitements.php');
                include_once('includes/functions/dates.php');

                global $wpdb;

                $return['ok'] = 0;
                $return['error']="";
                foreach ($orders_id as $order_id) {

                    $order = new WC_Order($order_id);

                    $shipping_method = $order->get_shipping_methods();
                    $shipping_method_name = $order->get_shipping_method();
                    $carrier = "";
                    foreach ($shipping_method as $shipping_item_id => $shipping_item) {
                        $carrier = $shipping_item['method_id'];
                    }
                    $tracking_url = get_option('vm_tracking_url_' . $carrier);
                    $tracking_url = str_replace('@', $tracking_number, $tracking_url);



                    $carrier_api = get_option('vm_carrier_api_' . $carrier);
                    $carrier_login = get_option('vm_carrier_login_' . $carrier);
                    $carrier_password = get_option('vm_carrier_password_' . $carrier);
                    $carrier_api_key = get_option('vm_carrier_api_key_' . $carrier);
                    $carrier_api_meter = get_option('vm_carrier_meter_' . $carrier);




                    $tracking_number = get_post_meta($order_id, '_vm_tracking_number', true);


                    $ajax_return = array();

                              $remboursable = preg_match("/(8N|8U|8L|8V|8P|8J|8X|7D|9A|9C|9L|9V|6C|6A|6J|6K|6M|6H|5Z)[a-z0-9]{1,11}$/i", $tracking_number);
                            $chronopost = preg_match("/(XY|XX|XW|XJ)[a-z0-9]{1,11}$/i", $tracking_number);

                            $date_expedition = get_post_meta($order_id, '_vm_shipped_date', true);
                            $date_expedition = strtotime($date_expedition);


                            if ($date_expedition != "-62169984561") {

                                $currentStatut = get_post_meta($order_id, '_vm_tracking_msg_md5', true);
                                $date_livraison = '';
                                $nb_jours_ouvres = '';
                                $reclamation = '';


                                if ($carrier_api == "LA POSTE") {
                                    $status_found = grab_coliposte_statuses($carrier_login, $carrier_password, $tracking_number);
                                } elseif ($carrier_api == "CHRONOPOST") {
                                    $status_found = grab_chronopost_statuses($tracking_number);
                                }
                                elseif($carrier_api=="UPS") {
                                        $status_found = grab_ups_statuses($carrier_login,$carrier_api_key, $carrier_password, $tracking_number);
                     
                                }
                                  elseif($carrier_api=="USPS") {
                                        $status_found = grab_usps_statuses($carrier_login, $tracking_number);
                     
                     
                                }
                                elseif($carrier_api=="FEDEX") {
                                        $status_found = grab_fedex_statuses($carrier_login, $carrier_password, $carrier_api_key, $carrier_api_meter, $TrackingNumber);
                     
                     
                                }
                                else
                                    continue;


                                if (is_array($status_found)) {
                                    $laposte_new_md5 = md5($status_found['message']);
                                    if (array_key_exists($laposte_new_md5, $status)) {
                                        $case = $this->merci_la_poste($tracking_number, $laposte_new_md5, $status);
                                    } else {
                                        $case = -1; // erreur md5
                                    }
                                } else {
                                    $case = -2; // inconnu
                                }

                                if ($currentStatut != $laposte_new_md5) {

                                    switch ($case) {
                                        // Le Colis a été livré, process de vérification des dates.
                                        case 1 :
                                            // OCR processing
                                            $date_livraison = $status_found['date'];
                                            $nb_jours_ouvres = get_nb_open_days($date_expedition, $date_livraison);
                                            //
                                            if ($date_livraison < 0) {
                                                break;
                                            }

                                            if ($nb_jours_ouvres > 2 && $remboursable == 1) {
                                                $laposte = COLIPOSTE_LIVRAISON;
                                                $reclamation = COLIPOSTE_LIVRAISON_RETARD;
                                            } else {
                                                if ($remboursable == 1) {
                                                    $laposte = COLIPOSTE_LIVRAISON;
                                                    $reclamation = COLIPOSTE_LIVRAISON_OK;
                                                } else {
                                                    if ($chronopost == 1 && $nb_jours_ouvres > 1) {
                                                        $laposte = COLIPOSTE_LIVRAISON;
                                                        $reclamation = COLIPOSTE_LIVRAISON_RETARD;
                                                    } else {
                                                        if ($chronopost == 1) {
                                                            $laposte = COLIPOSTE_LIVRAISON;
                                                            $reclamation = COLIPOSTE_LIVRAISON_OK;
                                                        } else {
                                                            $laposte = COLIPOSTE_LIVRAISON;
                                                            $reclamation = COLIPOSTE_LIVRAISON_INTERNATIONAL;
                                                        }
                                                    }
                                                }
                                            }

                                            break;
                                        // Cas dans lesquels la commande est encore en transit
                                        case 5 :
                                            // OCR processing
                                            $date_livraison = $status_found['date'];
                                            $nb_jours_ouvres = get_nb_open_days($date_expedition, $date_livraison);
                                            $laposte = COLIPOSTE_LIVRAISON_TRANSIT;
                                            $reclamation = COLIPOSTE_LIVRAISON_TRANSIT;
                                            break;
                                        // Cas dans lesquels la commande n'est pas remboursable
                                        case 9 :
                                            $date_livraison = $status_found['date'];
                                            $nb_jours_ouvres = get_nb_open_days($date_expedition, $date_livraison);
                                            $laposte = COLIPOSTE_REMBOURSEMENT_IMPOSSIBLE;
                                            $reclamation = COLIPOSTE_LIVRAISON_INTERNATIONAL;
                                            break;
                                        // Le colis n'existe pas sur colisposte !
                                        case -2 :
                                            $laposte = COLIPOSTE_NO_INFORMATION;
                                            $reclamation = COLIPOSTE_NO_INFORMATION;
                                            break;
                                        // Cas dans lesquels le MD5 est inconnu
                                        case -1 :
                                            $laposte = COLIPOSTE_ERREUR_MD5;
                                            $reclamation = COLIPOSTE_ERREUR_MD5;
                                            break;
                                    }


                                    if ($laposte == COLIPOSTE_LIVRAISON) {
                                        $order = new WC_Order($order_id);
                                        $order->update_status(get_option('vm_delivered_orders_status'), __('Order delivered', 'woothemes'));
                                        $ajax_return['statut'] = "delivered";
                                    }


                                    update_post_meta($order_id, '_vm_tracking_msg', sanitize_text_field(utf8_encode($status_found['message'])));
                                    update_post_meta($order_id, '_vm_tracking_msg_md5', sanitize_text_field(md5($status_found['message'])));
                                    update_post_meta($order_id, '_vm_tracking_days', intval($nb_jours_ouvres));
                                    update_post_meta($order_id, '_vm_tracking_statut', sanitize_text_field($reclamation));
                                }
                            }

          



                     $return['ok']++;
                }

                return  $return;
            }

            function merci_la_poste($noColis, $statuses_found, $status)
            {

                $case = 0;
                if ($statuses_found != "") {


                    // remboursable ou pas?
                    if ($status[$statuses_found]['remboursable'] == 'false') {
                        $case = 9;
                    }
                    // encore en transit
                    if ($status[$statuses_found]['initial_transit'] == 'true') {
                        $case = 5;
                    }
                    if ($status[$statuses_found]['initial_transit'] == 'false') {
                        $case = 1;
                    }
                }

                switch ($case) {
                    // Cas dans lesquels on a trouvé une date de présentation
                    case 1 :
                        return 1;
                        break;
                    // Cas dans lesquels la commande est encore en transit
                    case 5 :
                        return 5;
                        break;
                    // Cas dans lesquels la commande n'est pas remboursable
                    case 9 :
                        // La date
                        return 9;
                        break;
                    // Cas dans lesquels on a pas encore d'info
                    default :
                        return $case;
                        break;
                }
            }

  
      

            function vm_parcel_status_column($columns)
            {
                $new_columns = (is_array($columns)) ? $columns : array();
                $new_columns['vm_parcel_status'] = __('Parcel status', 'vm_tracking');
                return $new_columns;
            }

            function vm_parcel_status_display($column)
            {
                global $post;
                $data = get_post_meta($post->ID);

                if ($column == 'vm_parcel_status') {
                    
                        $order = new WC_Order($post->ID);

                    $shipping_method = $order->get_shipping_methods();
                    $shipping_method_name = $order->get_shipping_method();
                    $carrier = "";
                    foreach ($shipping_method as $shipping_item_id => $shipping_item) {
                        $carrier = $shipping_item['method_id'];
                    }
              
                    $carrier_api = get_option('vm_carrier_api_' . $carrier);
                    $is_reclamation = get_post_meta($post->ID, '_vm_tracking_statut', true);
                    $img_status="";
                    
                     switch ($is_reclamation) {
            case "RETARD" :
                $img_status = '<img src="'.VM_IMG.'delete.png" alt="'.__('Delivered Out of time', 'vm_tracking').'" title="'.__('Delivered Out of time', 'vm_tracking').'" width="20%"/>';
                break;
            case "DELAI INTERNATIONAL" :
            case "DELAI RESPECTE" :
                $img_status = '<img src="'.VM_IMG.'valid.png" alt="'.__('Delivered Delay Ok', 'vm_tracking').'" title="'.__('Delivered Delay Ok', 'vm_tracking').'" width="20%"/>';
                break;
            case "RECLAMATION FAITE" :
                 $img_status = '<img src="'.VM_IMG.'refund.png"  alt="'.__('Refund asked', 'vm_tracking').'" title="'.__('Refund asked', 'vm_tracking').'" width="20%"/>';
                break;
            case "REMBOURSE" :
                 $img_status = '<img src="'.VM_IMG.'euro.png" alt="'.__('Refunded', 'vm_tracking').'" title="'.__('Refunded', 'vm_tracking').'" width="20%"/>';
                 break;
            case "MD5 INCONNU" :
                 $img_status = '<img src="'.VM_IMG.'inconnuMD5.png" alt="'.__('Unknow Status', 'vm_tracking').'" title="'.__('Unknow Status', 'vm_tracking').'" width="20%"/>';
                break;
            case "INCONNU" :
                 $img_status = '<img src="'.VM_IMG.'inconnu.png" alt="'.__('Unknow parcel', 'vm_tracking').'" title="'.__('Unknow parcel', 'vm_tracking').'" width="20%"/>';
                 break;
            case "EN TRANSIT" :
                 $img_status = '<img src="'.VM_IMG.'transit.png" alt="'.__('In Transit', 'vm_tracking').'" title="'.__('In Transit', 'vm_tracking').'" width="20%"/>';
                 break;
            default :
                $img_status='';
                break;
        }
                    
                    
                    

               
                    switch($carrier_api)
                    {
                        
                        case "LA POSTE":
                            
                            echo '<img src="'.VM_IMG.'la_poste.png" width="50%"  />';
                            echo $img_status;
                            break;
                        case "CHRONOPOST":
                                   echo '<img src="'.VM_IMG.'chronopost.png" width="50%"  />';
                            echo $img_status;
                   
                            break;
                        case "DHL":
                                   echo '<img src="'.VM_IMG.'dhl.png" width="50%"  />';
                            echo $img_status;
                   
                            break;
                        case "FEDEX":
                                   echo '<img src="'.VM_IMG.'fedex.jpg" width="50%"  />';
                            echo $img_status;
                   
                            break;
                        case "UPS":
                                   echo '<img src="'.VM_IMG.'ups.jpg" width="50%"  />';
                           echo $img_status;
                   
                            break;
                        case "USPS":
                                   echo '<img src="'.VM_IMG.'usps.png" width="50%"  />';
                            echo $img_status;
                   
                            break;
                        default:
                            break;
                        
                        
                    }
                    
                    
                }
            }
            
                function vm_filter_by_parcel_status($where)
            {
                global $typenow, $wpdb;

                if (is_admin() && isset($_GET['post_type']) && strpos($_GET['post_type'], 'shop_order') != -1 && isset($_GET['parcel_status_filter']) && !empty($_GET['parcel_status_filter'])) {



                    $where .= $wpdb->prepare(' AND ID
                            IN (
                                SELECT post_id
                                FROM '.$wpdb->prefix.'postmeta
                                WHERE meta_key = "_vm_tracking_statut"
                                AND meta_value = %s
                              
                            )',sanitize_text_field($_GET['parcel_status_filter']));
                }

                return $where;
            }

            function vm_add_order_filter_by_parcel_status()
            {
                global $typenow, $wp_query;
                  if (in_array($typenow, wc_get_order_types('order-meta-boxes'))) :             
                    $parcel_status = array('RETARD'=>__('After deadline','vm_tracking'),'LIVRE'=>__('Delivered','vm_tracking'),'DELAI RESPECTE'=>__('In Time','vm_tracking'),'EN TRANSIT' =>__('In Transit','vm_tracking'),'DELAI INTERNATIONAL'=>__('International delivery','vm_tracking'),'RECLAMATION FAITE'=>__('Refund asked','vm_tracking'),'REMBOURSE'=>__('Refunded','vm_tracking'),'MD5 INCONNU'=>__('Unknow Message','vm_tracking'),'INCONNU'=>__('Unknow parcel','vm_tracking'));
    $parcel_status_filter = array();

                    if (!empty($_GET['parcel_status_filter'])) {
                       $parcel_status_filter = sanitize_text_field($_GET['parcel_status_filter']);
                    }
                    ?>
                    <select name='parcel_status_filter'>
                        <option value=''><?php _e('Select a Parcel Status', 'vm_tracking'); ?></option><?php foreach ($parcel_status as $key => $value) : ?>
                            <option <?php selected($parcel_status_filter, $key); ?> value='<?php echo $key; ?>'><?php echo $value; ?></option><?php
                        endforeach;
                        ?></select><?php
                endif;
                   
                
                
            }

        }

        // end class

        $GLOBALS['vm_tracking'] = new vm_tracking();
    }
}