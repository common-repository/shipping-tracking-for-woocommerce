<?php

class vm_tracking_admin
{

    function __construct()
    {
        global $wpdb, $woocommerce;

        load_plugin_textdomain('vm_tracking', false, dirname(plugin_basename(__FILE__)) . '/languages/');

        if (is_admin()) {
            add_action('admin_enqueue_scripts', array($this, 'scripts'));

            add_action('add_meta_boxes', array($this, 'vm_add_tracking_metabox'), 15);
            add_action('init', array($this, 'vm_save_tracking_number'), 15);
            add_action('woocommerce_process_shop_order_meta', array($this, 'vm_save_tracking_number'));
            add_action('wp_ajax_vm_save_tracking', array($this, 'vm_ajax_save_tracking'));
            add_action('wp_ajax_vm_update_tracking_msg', array($this, 'vm_ajax_update_tracking_msg'));
            add_action('wp_ajax_vm_created_new_md5', array($this, 'vm_ajax_created_new_md5'));
            
            
          
       
        }
    }

    public function scripts($pagehook)
    {

        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('jquery-ui-datepicker');
        wp_enqueue_style('vm_tracking_styles', plugins_url('vm_tracking/assets/css/admin.css'));
        wp_enqueue_script('vm_tracking', plugins_url('vm_tracking/assets/js/functions.js'), array('jquery', 'jquery-ui-datepicker'), false, true);
    }

    function vm_add_tracking_metabox()
    {

        global $post, $woocommerce;

        if (!$post)
            return;

        if (!class_exists('WC_Order')) {
            return false;
        }

        $order = new WC_Order($post->ID);
        if (!$order)
            return;

        add_meta_box('vm_tracking_metabox', __('Tracking', 'vm_tracking'), array($this, 'vm_tracking_metabox_content'), 'shop_order', 'side', 'high');
    }

    function vm_tracking_metabox_content()
    {
        global $post, $woocommerce, $wpdb;

        if (!class_exists('WC_Order')) {
            return false;
        }

        $order = new WC_Order($post->ID);
        if (!$order)
            return;


        $tracking_number = get_post_meta($post->ID, '_vm_tracking_number', true);
        $delivery_date = get_post_meta($post->ID, '_vm_shipped_date', true);
        $delivery_date_formated = strtotime($delivery_date);
        $tracking_msg = get_post_meta($post->ID, '_vm_tracking_msg', true);
         $tracking_msg_md5 = get_post_meta($post->ID, '_vm_tracking_msg_md5', true);
           $is_statut =      get_post_meta($post->ID, '_vm_tracking_statut',true);
     

        $shipping_method = $order->get_shipping_methods();
        $shipping_method_name = $order->get_shipping_method();
        $carrier = "";
        foreach ($shipping_method as $shipping_item_id => $shipping_item) {
            $carrier = $shipping_item['method_id'];
        }
        $tracking_url_o = get_option('vm_tracking_url_' . $carrier);
        $tracking_url = str_replace('@', $tracking_number, $tracking_url_o);



        $carrier_api = get_option('vm_carrier_api_' . $carrier);
        $carrier_login = get_option('vm_carrier_login_' . $carrier);
        $carrier_password = get_option('vm_carrier_password_' . $carrier);
        $carrier_api_key = get_option('vm_carrier_api_key_' . $carrier);
        $carrier_api_meter = get_option('vm_carrier_meter_' . $carrier);

        
         
        ?>
        <ul class="order_actions submitbox">
            <li id="actions" class="wide">


                <input type="text" name="vm_carrier_tracking_name" id="vm_carrier_tracking_name" value="<?php echo $shipping_method_name ?>" readonly />

            </li>
            <li id="" class="wide">
        <?php
        woocommerce_wp_text_input(array(
            'id' => 'vm_tracking_number',
            'label' => __('Tracking Number', 'vm_tracking'),
            'placeholder' => __('Tracking Number', 'vm_tracking'),
            'description' => '<a id="vm_tracking_number_link" class="" href="' . $tracking_url . '" target="blank">' . __('Follow me', 'vm_tracking') . '</a>',
            'class' => '',
            'value' => $tracking_number,
        ));
        ?>
           

         
                <div class="vm-delivery-date-select">
                    <label for="vm_delivery_date"><?php _e('Shipped Date', 'vm_tracking') ?></label>
                    <input id="vm_delivery_date" type="text" name="vm_delivery_date" class="vm-datepicker" value="<?php echo date_i18n(get_option( 'date_format' ), $delivery_date_formated) ?>" />
                    <input type="hidden" id="alternate_date"  name="alternate_date" value="<?php echo $delivery_date ?>" />
                </div>
        
          
            </br>
            
                 <div class="vm_tracking_save" style="text-align:center;">

                <input id="ajax_update_tracking_number" type="button" class="button save_order button-primary tips vm_save_delivery" data-tip="<?php _e('Update the tracking number and shipped date with Ajax (the page is not reloaded', 'vm_tracking') ?>" value="<?php _e('Save', 'vm_tracking') ?>" />
      
            </div>
                </li>
            <li id="" class="wide"></li>

            <li id="" class="wide">
                <div class="vm_tracking_msg_container">
                    <label for="vm_tracking_msg"><?php _e('Current Tracking message', 'vm_tracking') ?></label>
                    <textarea id="vm_tracking_msg" name="vm_tracking_msg" class="" style="width:80%; height:90px;" ><?php echo $tracking_msg ?></textarea>
                    <div id="ajax_update_tracking_msg" class="vm-button vm_reload vm_update_tracking_msg tips" style="position:relative; top:-60px; left:10px;" data-tip="<?php _e('Find the current parcel status with Ajax (the page is not reloaded except if the parcel is delivered)', 'vm_tracking') ?>" title="<?php echo __('Update tracking message', 'vm_tracking') ?>"></div>
      <div id="ajax_show_create_new_md5" class="vm-button vm_cancel tips" style="position:relative; top:-45px; right:6px; float:right; display:none;" data-tip="<?php _e('Show the form to create new status', 'vm_tracking') ?>" title="<?php echo __('Show the form to create new status', 'vm_tracking') ?>">
      
      </div>
                    <div id="vm_unknow_status_info" style="display:none;">
                       <span class="description"><?php _e('The status and message is unknow. Click on the red cross icon to create it.', 'vm_tracking') ?></span>
                        <span class="description"><?php _e('After that, launch a tracking to update the status.', 'vm_tracking') ?></span>
                    </div>  

                </div>
  
            </li>


            <br/>
            <input type="hidden" id="vm_carrier_api"  name="vm_carrier_api" value="<?php echo $carrier_api ?>"  />
            <input type="hidden" id="vm_carrier_login"  name="vm_carrier_login" value="<?php echo $carrier_login ?>"  />
            <input type="hidden" id="vm_carrier_password"  name="vm_carrier_password" value="<?php echo $carrier_password ?>"  />
            <input type="hidden" id="vm_carrier_api_key"  name="vm_carrier_api_key" value="<?php echo $carrier_api_key ?>"  />
            <input type="hidden" id="vm_tracking_msg_md5" name="vm_tracking_msg_md5" value="<?php echo $tracking_msg_md5 ?>" />
            <input type="hidden" id='vm_is_statut' name='vm_is_statut' value="<?php echo $is_statut ?>" />
            <input type="hidden" id='vm_carrier_meter' name='vm_carrier_meter' value="<?php echo $carrier_api_meter ?>" />
            <input type="hidden" id='vm_carrier_url' name='vm_carrier_url' value="<?php echo $tracking_url_o ?>" />
         
            <div id="vm_new_md5" style="display:none;">
           <?php _e('Is it refundable ?', 'vm_tracking') ?>
<select id="vm_remboursable" name="vm_remboursable">
<option value="true"> <?php _e('Yes', 'vm_tracking') ?></option>
<option value="false"> <?php _e('No', 'vm_tracking') ?></option>
</select>
<br>
<br>
 <?php _e('Is it a delivered status ?', 'vm_tracking') ?>
<select id="vm_transit" name="vm_transit">
<option value="false"> <?php _e('Yes', 'vm_tracking') ?></option>
<option value="true"> <?php _e('No', 'vm_tracking') ?></option>
</select><br>
<br>
 <?php _e('Send an email to the customer ?', 'vm_tracking') ?>
<select id="vm_email" name="vm_email">
<option value="true"> <?php _e('Yes', 'vm_tracking') ?></option>
<option value="false"> <?php _e('No', 'vm_tracking') ?></option>
</select><br>
  <li id="" class="wide">
  <input id="ajax_create_new_md5" type="button" class="button button-primary save_order tips" data-tip="<?php _e('Create the new status with Ajax (the page is not reloaded', 'vm_tracking') ?>" value="<?php _e('Create new status', 'vm_tracking') ?>" />
  </li>
                
                
            </div>  
            
       
        </ul>

        <?php
    }

    function vm_save_tracking_number($post_id)
    {

        $order_id = $post_id;

        $order = new WC_Order($order_id);

        $shipping_method = $order->get_shipping_methods();
        $shipping_method_name = $order->get_shipping_method();
        foreach ($shipping_method as $shipping_item_id => $shipping_item) {
            $carrier = $shipping_item['method_id'];
        }

        if(isset($_POST['vm_tracking_number']))
        update_post_meta($order_id, '_vm_tracking_number', sanitize_text_field($_POST['vm_tracking_number']));
         if(isset($_POST['alternate_date']))
        update_post_meta($order_id, '_vm_shipped_date', sanitize_text_field($_POST['alternate_date']));
          if(isset($shipping_method_name))
        update_post_meta($order_id, '_vm_carrier_name', sanitize_text_field($shipping_method_name));
           if(isset($_POST['vm_tracking_msg']))
        update_post_meta($order_id, '_vm_tracking_msg', sanitize_text_field($_POST['vm_tracking_msg']));
            if(isset($_POST['vm_tracking_msg']))
        update_post_meta($order_id, '_vm_tracking_msg_md5', sanitize_text_field(md5($_POST['vm_tracking_msg'])));
    }
    function vm_ajax_created_new_md5()
    {
        define('STATUTSTR','$status');
        
        $remboursable = sanitize_text_field($_POST['remboursable']);
        $transit = sanitize_text_field($_POST['transit']);
        $email = sanitize_text_field($_POST['email']);
        $newmd5 = sanitize_text_field($_POST['md5']);
        $vm_tracking_msg = sanitize_text_field($_POST['vm-tracking-msg']);
        $order_id=intval($_POST['order-id']);
        
        $change="\r\n// Ajout automatique statut inconnu ".date('d-m-Y');
$change.="\r\n";
$change.=STATUTSTR."['$newmd5']['description'] = '".addslashes( $vm_tracking_msg)."';";
$change.="\r\n";
$change.=STATUTSTR."['$newmd5']['remboursable'] = '".($remboursable)."';";
$change.="\r\n";
$change.=STATUTSTR."['$newmd5']['initial_transit'] = '".($transit)."';";
$change.="\r\n";
$change.=STATUTSTR."['$newmd5']['email'] = '".($email)."';";
$change.="\r\n";
$change.="?>";
        
$contenu=file_get_contents(VM_URL_SAVE.'includes/functions/statuts.php');
$contenu=str_replace('?>',$change,$contenu);

file_put_contents(VM_URL_SAVE.'includes/functions/statuts.php',$contenu);

            update_post_meta($order_id, '_vm_tracking_msg_md5', '');
                   
        wp_die();  

    }

    function vm_ajax_save_tracking()
    {

        global $wpdb;
        
        

        $tracking_number = sanitize_text_field($_POST['tracking-number']);
        $delivery_date = sanitize_text_field($_POST['delivery-date']);
        $order_id = intval($_POST['order-id']);
        $tracking_msg = sanitize_text_field($_POST['vm-tracking-msg']);


        $order = new WC_Order($order_id);

        $shipping_method = $order->get_shipping_methods();
        $shipping_method_name = sanitize_text_field($order->get_shipping_method());
        foreach ($shipping_method as $shipping_item_id => $shipping_item) {
            $carrier = $shipping_item['method_id'];
        }


        update_post_meta($order_id, '_vm_tracking_number', ($tracking_number));
        update_post_meta($order_id, '_vm_shipped_date', ($delivery_date));
        update_post_meta($order_id, '_vm_carrier_name', ($shipping_method_name));
        update_post_meta($order_id, '_vm_tracking_msg', ($tracking_msg));
        update_post_meta($order_id, '_vm_tracking_msg_md5', (md5($tracking_msg)));


        wp_die();
    }

    function vm_ajax_update_tracking_msg()
    {

        include_once('functions/statuts.php');
        include_once('functions/traitements.php');
        include_once('functions/dates.php');

        global $wpdb;

        $order_id = intval($_POST['order-id']);
        $carrier_api = sanitize_text_field($_POST['carrier-api']);
        $carrier_login = sanitize_text_field($_POST['carrier-login']);
        $carrier_password = sanitize_text_field($_POST['carrier-password']);
        $carrier_api_key = sanitize_text_field($_POST['carrier-api-key']);
        $tracking_number = sanitize_text_field($_POST['tracking-number']);
        $carrier_api_meter = sanitize_text_field($_POST['carrier-meter']);

        $ajax_return = array();

                $remboursable = preg_match("/(8N|8U|8L|8V|8P|8J|8X|7D|9A|9C|9L|9V|6C|6A|6J|6K|6M|6H|5Z)[a-z0-9]{1,11}$/i", $tracking_number);
                    $chronopost = preg_match("/(XY|XX|XW|XJ)[a-z0-9]{1,11}$/i", $tracking_number);

                $date_expedition = get_post_meta($order_id, '_vm_shipped_date', true);
                $date_expedition = strtotime($date_expedition);
                
                $ajax_return['statut']="";
                $ajax_return['msg']="";

                if ($date_expedition != "-62169984561") {
                      
                    $currentStatut = get_post_meta($order_id, '_vm_tracking_msg_md5', true);
                    $date_livraison = '';
                    $nb_jours_ouvres = '';
                    $reclamation = '';
                    $ajax_return['statut'] = "transit";


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
                                {
                                       $ajax_return['msg']=__('Error, there is no API for that carrier or an error is returned', 'vm_tracking');

                                       $ajax_return['statut'] = "";

                                         echo json_encode($ajax_return);
            
                                     wp_die();
                                }
                            
           
                         if (is_array($status_found)) {
                            
                                    $laposte_new_md5 = md5($status_found['message']);
                                    
                                         if (array_key_exists($laposte_new_md5, $status)) {
                                             
                                            $case = $this->merci_la_poste($tracking_number, $laposte_new_md5, $status);
                                           
                                        } else {
                                            $case = -1; // erreur md5
                                        }
                                }
                                     else {
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
                   
                        

                        $ajax_return['msg'] = utf8_encode($status_found['message']);

                       
                            }
                    
                }
                 echo json_encode($ajax_return);
                

        wp_die();
    }

    function merci_la_poste($noColis, $statuses_found, $status)
    {

        $case = 0;
       if ($statuses_found != "") {


            if ($status[$statuses_found]['remboursable'] == 'false') {
                $case = 9;
            }
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
    
     

}

new vm_tracking_admin();
?>
