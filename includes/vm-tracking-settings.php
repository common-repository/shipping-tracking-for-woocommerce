<?php
class vm_tracking_settings {

	public function __construct() {
		$this->init();
	}

    public function init() {
          global $woocommerce;
        add_filter('woocommerce_settings_tabs_array', array($this, 'add_settings_tab'), 50);
        add_action('woocommerce_settings_tabs_vm_tracking', array($this, 'settings_tab'));
        add_action('woocommerce_admin_field_settings_urls', array($this, 'settings_urls'));
          
        add_action( 'woocommerce_update_options_vm_tracking', array( $this, 'update_settings') );
            add_action('woocommerce_settings_saved', array($this, 'settings_saved'));
           
    }

    public static function add_settings_tab( $settings_tabs ) {
          $settings_tabs['vm_tracking'] = __('Carriers Tracking', 'vm_tracking');
          return $settings_tabs;
    }

    public function settings_tab() {
        woocommerce_admin_fields($this->get_settings());
    }

    public function update_settings() {
		$options = self::get_settings();
          

        woocommerce_update_options( $options );
    }

    public static function get_settings() {
          global $woocommerce;
			
        $settings = self::get_settings_fields();

                
      
        
                $settings['settings_urls'] = array(
                    'name' => __('Settings Tracking URL', 'vm_tracking'),
                    'type' => 'settings_urls',
                    'desc' => __('Tracking URL', 'vm_tracking')
                );

        return $settings;
    }
      static function get_settings_fields()
            {
  global $woocommerce;
                 $settings = array(
            'section_title'			=> array(
                'name'				=> __( 'Vinum Master Carriers Tracking Settings', 'vm_tracking' ),
                'type'				=> 'title',
                'desc'				=> '',
                'id'				=> 'vm_tracking_section_title'
            )
        );
       
                 $settings = array_merge($settings,array(
				'section_end' => array(
					 'type' => 'sectionend',
					 'id' => 'wc_settings_tab_vm_tracking_section_end'
				)
			));

                             
                return apply_filters('wc_settings_tab_vm_tracking', $settings);
            }
    
        function settings_urls()
            {
  global $woocommerce;
                $settings = self::get_settings_urls();
                $wc_shipping = WC_Shipping::instance();
                $carriers = WC()->shipping->load_shipping_methods();
                $available_carriers_api= array('--','UPS','USPS','FEDEX','LA POSTE','CHRONOPOST');  
                $orders_status = wc_get_order_statuses();
    
                  ?>
     <script type="text/javascript">
               
                     
                     function display_custom_fields (carrier_api, carrier_method){
    

    if(carrier_api=='LA POSTE' || carrier_api=='UPS' || carrier_api=='USPS' || carrier_api=='FEDEX')
    {
       jQuery('#cell_vm_carrier_login_'+carrier_method).css('display','table-cell');
        
        
    }
     if(carrier_api=='LA POSTE' )
    {
          jQuery('#cell_vm_carrier_api_key_'+carrier_method).css('display','none');
              jQuery('#cell_vm_carrier_meter_'+carrier_method).css('display','none');
                 jQuery('#cell_vm_carrier_password_'+carrier_method).css('display','table-cell');
    
            jQuery('#vm_carrier_login_info_'+carrier_method).html('<?php _e('Coliposte Account', 'vm_tracking') ?>');
        jQuery('#vm_carrier_password_info_'+carrier_method).html('<?php _e('Password', 'vm_tracking') ?>');
    
    }
    if(carrier_api=='UPS' )
    {
       
          jQuery('#cell_vm_carrier_api_key_'+carrier_method).css('display','table-cell');
             jQuery('#cell_vm_carrier_password_'+carrier_method).css('display','table-cell');
          jQuery('#cell_vm_carrier_meter_'+carrier_method).css('display','none');
     
       
      
            jQuery('#vm_carrier_login_info_'+carrier_method).html('<?php _e('Access Licence', 'vm_tracking') ?>');
        jQuery('#vm_carrier_password_info_'+carrier_method).html('<?php _e('Password', 'vm_tracking') ?>');
        jQuery('#vm_carrier_api_key_info_'+carrier_method).html('<?php _e('User ID', 'vm_tracking') ?>');
    
    }
      if(carrier_api=='USPS' )
    {
       
          jQuery('#cell_vm_carrier_api_key_'+carrier_method).css('display','none');
           jQuery('#cell_vm_carrier_meter_'+carrier_method).css('display','none');
              jQuery('#cell_vm_carrier_password_'+carrier_method).css('display','none');
    
           
        jQuery('#vm_carrier_login_info_'+carrier_method).html('<?php _e('Account Number', 'vm_tracking') ?>');
            
       
    }
        if(carrier_api=='FEDEX' )
    {
        
          jQuery('#cell_vm_carrier_api_key_'+carrier_method).css('display','table-cell');
           jQuery('#cell_vm_carrier_meter_'+carrier_method).css('display','table-cell');
                  jQuery('#cell_vm_carrier_password_'+carrier_method).css('display','table-cell');
    
              jQuery('#vm_carrier_login_info_'+carrier_method).html('<?php _e('Access Key', 'vm_tracking') ?>');
        jQuery('#vm_carrier_password_info_'+carrier_method).html('<?php _e('Access Password', 'vm_tracking') ?>');
        jQuery('#vm_carrier_api_key_info_'+carrier_method).html('<?php _e('Account Number', 'vm_tracking') ?>');
       jQuery('#vm_carrier_meter_info_'+carrier_method).html('<?php _e('Meter Number', 'vm_tracking') ?>');
    
       
    }
     if(carrier_api=='CHRONOPOST' )
    {
       
          jQuery('#cell_vm_carrier_api_key_'+carrier_method).css('display','none');
           jQuery('#cell_vm_carrier_meter_'+carrier_method).css('display','none');
                  jQuery('#cell_vm_carrier_password_'+carrier_method).css('display','none');
    
                 jQuery('#vm_carrier_login_info_'+carrier_method).html('<?php _e('Chronopost account', 'vm_tracking') ?>');
   
    }
    
     if(carrier_api=='--' )
    {
        jQuery('#cell_vm_carrier_login_'+carrier_method).css('display','none');
        jQuery('#cell_vm_carrier_password_'+carrier_method).css('display','none');
      
               jQuery('#cell_vm_carrier_api_key_'+carrier_method).css('display','none');
                jQuery('#cell_vm_carrier_meter_'+carrier_method).css('display','none');
     
       
    }
    
    
}
jQuery( document ).ready( function( $ ) {
 jQuery('.my-handlediv').click(function(){
     
     if($(this).parent(".postbox").hasClass('closed'))
         $(this).parent(".postbox").removeClass('closed');
     else
			$(this).parent(".postbox").addClass('closed');
                    
		});
    
    });
          
              </script>    
         
                <tr valign="top" class="single_select_page">
                    <td style="padding-left: 0;" colspan="2">
                        <div class="">
                            <div class="" >
                                <table>
        
                <?php do_action('settings_urls_begin') ?>
                                    
                                      <tr>
                                        <td> </td>
                                        <td><h3><?php _e('Generals Settings', 'vm_tracking') ?></h3></td>
                                    </tr>    
                                       <tr>
                                        <td> </td>
                                        <td>
                                            
                                            <input type="text" id="vm_society" name="vm_society" value="<?php echo $settings['vm_society'] ?>" />
                                                        </br> <span class='description' style="float:left;"><?php _e('Your society name', 'vm_tracking') ?></span>
                                                  
                                            
                                        </td>
                                    </tr>  
                                       <tr>
                                        <td> </td>
                                        <td>
                                            
                                                  <input type="text" placeholder="<?php _e('Siret', 'vm_tracking') ?>" id="vm_siret" name="vm_siret" size="10" value="<?php echo $settings['vm_siret']; ?>"/> 
                                                            </br> <span class='description' style="float:left;"><?php _e('Siret for French users', 'vm_tracking') ?></span> 
                                                       
                                            
                                        </td>
                                    </tr>  
                                 
                                    
                                    
                                    
                                    
                                               
                                    
                                    
                                    <tr>
                                        <td> </td>
                                        <td><h3><?php _e('Carriers Settings', 'vm_tracking') ?></h3></td>
                                    </tr> 
                                     <tr>
                                        <td> </td>
                                        <td><div class="postbox"><div class="my-handlediv" title="Cliquer pour inverser."><br></div><h3 class="my-title-box"><span><?php _e('Carriers list urls', 'vm_tracking') ?></span></h3>
                                          <div class="inside" >
                                              <table>
                                                  <tr>
                                                      <td>La Poste Particulier</td>
                                                      <td>http://www.laposte.fr/Particulier/Profiter-de-nos-services-en-ligne/Suivre-vos-envois?code=@</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Colissimo Particulier</td>
                                                      <td>http://www.colissimo.fr/portail_colissimo/suivre.do?colispart=@</td>
                                                  </tr>
                                                     <tr>
                                                      <td>Colis Pro</td>
                                                      <td>https://www.coliposte.net/pro/services/main.jsp?m=12003010&colispro=@</td>
                                                  </tr>
                                                        <tr>
                                                      <td>Courrier suivi</td>
                                                      <td>http://www.csuivi.courrier.laposte.fr/default.asp?EZ_ACTION=rechercheRapide&tousObj=&numObjet=@</td>
                                                  </tr>
                                                          <tr>
                                                      <td>PostExport - International</td>
                                                      <td>http://www.postexport-suivi.laposte.fr/webapp-primeweb/webSearch?barco=@</td>
                                                  </tr>
                                                          <tr>
                                                      <td>Chronopost</td>
                                                      <td>http://www.chronopost.fr/expedier/inputLTNumbersNoJahia.do?listeNumeros=@</td>
                                                  </tr>
                                                          <tr>
                                                      <td>Chronopost International</td>
                                                      <td>http://www.ci.chronopost.com/web/en/tracking/suivi_inter.jsp?listeNumeros=@</td>
                                                  </tr>
                                                          <tr>
                                                      <td>Fedex france</td>
                                                      <td>http://fedex.com/Tracking?ascend_header=1&clienttype=dotcomreg&cntry_code=fr&language=french&tracknumbers=@</td>
                                                  </tr>
                                                          <tr>
                                                      <td>TNT France</td>
                                                      <td>http://www.tnt.fr/public/suivi_colis/recherche/visubontransport.do?radiochoixrecherche=BT&bonTransport=@</td>
                                                  </tr>
                                                          <tr>
                                                      <td>UPS France</td>
                                                      <td>http://wwwapps.ups.com/etracking/tracking.cgi?InquiryNumber1=@&loc=fr_FR&TypeOfInquiryNumber=T</td>
                                                  </tr>
                                                          <tr>
                                                      <td>DHL France</td>
                                                      <td>http://suivimessagerie.dhl.fr/track_pod.php?referenceCOLIS=@&TypeLV=C&CpDest=&PaysDest=&DateExp=&NumCpt=&LANGUE=FR</td>
                                                  </tr>
                                                          <tr>
                                                      <td>La Poste Suisse</td>
                                                      <td>http://www.post.ch/swisspost-tracking?formattedParcelCodes=@&p_language=fr</td>
                                                  </tr>
                                                          <tr>
                                                      <td>Bpost Belgique</td>
                                                      <td>http://www.bpost.be/etr/light/performSearch.do?searchByItemCode=true&itemCodes=@&oss_language=fr</td>
                                                  </tr>
                                                       <tr>
                                                      <td>Post Nederland</td>
                                                      <td>http://www.postnlpakketten.nl/klantenservice/tracktrace/basicsearch.aspx?lang=nl&B=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>Royal Mail GB</td>
                                                      <td>https://www.royalmail.com/track-your-item?trackNumber=@</td>
                                                  </tr>
                                                   <tr>
                                                      <td>Parcel Force GB</td>
                                                      <td>http://www.parcelforce.com/track-trace?trackNumber=</td>
                                                  </tr>
                                                       <tr>
                                                      <td>Correos Spain</td>
                                                      <td>http://www.correos.es/comun/localizador/track.asp?accion=LocalizaUno&ecorreo=&numero=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>Post danemark</td>
                                                      <td>http://www.postdanmark.dk/tracktrace/TrackTrace.do?i_stregkode=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>USPS USA</td>
                                                      <td>https://tools.usps.com/go/TrackConfirmAction_input?qtc_tLabels1=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>UPS USA</td>
                                                      <td>http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>Fedex USA</td>
                                                      <td>http://www.fedex.com/Tracking?action=track&tracknumbers=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>DHL Express USA</td>
                                                      <td>http://www.dhl.com/en/express/tracking.html?AWB=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>DHL USA</td>
                                                      <td>http://www.dhl-usa.com/content/us/en/express/tracking.shtml?brand=DHL&AWB=@</td>
                                                  </tr>
                                                       <tr>
                                                      <td>DHL Global USA</td>
                                                      <td>http://webtrack.dhlglobalmail.com/?mobile=&trackingnumber=@</td>
                                                  </tr>
                                                     <tr>
                                                      <td>On Trac USA</td>
                                                      <td>http://www.ontrac.com/trackingdetail.asp?tracking=@</td>
                                                  </tr>
                                                  
                                                   <tr>
                                                      <td>Canada Post</td>
                                                      <td>http://www.canadapost.ca/cpotools/apps/track/personal/findByTrackNumber?trackingNumber=@</td>
                                                  </tr>
                                                   <tr>
                                                      <td>ICC World India</td>
                                                      <td>http://iccworld.com/track.asp?txtawbno=@</td>
                                                  </tr>
                                                   <tr>
                                                      <td>TNT Consignement</td>
                                                      <td>http://www.tnt.com/webtracker/tracking.do?requestType=GEN&searchType=CON&respLang=en&respCountry=GENERIC&sourceID=1&sourceCountry=ww&cons=@</td>
                                                  </tr>
                                                   <tr>
                                                      <td>TNT Reference</td>
                                                      <td>http://www.tnt.com/webtracker/tracking.do?requestType=GEN&searchType=REF&respLang=en&respCountry=GENERIC&sourceID=1&sourceCountry=ww&cons=@</td>
                                                  </tr>
                                                   <tr>
                                                      <td>Australian Post</td>
                                                      <td>http://auspost.com.au/track/track.html?id=@</td>
                                                  </tr>
                                                   <tr>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                   <tr>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                   <tr>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                   <tr>
                                                      <td></td>
                                                      <td></td>
                                                  </tr>
                                                  
                                                  <tfoot>
                                                      <tr>
                                                  <th></th>
                                                  <th class="vm_tab_footer"><?php _e('Simply copy the tracking url of the carrier you want to use and paste it, in the tracking url field in the table below', 'vm_tracking') ?></td>
                                                      <th>
                                                  </tfoot>
                                                  
                                            
                                              </table>
                                             
                                            
		
                                          </div>  
                                            
                                            
                                            </div></td>
                                    </tr> 
                             
                                    <tr>
                                        <td></td>
                                          <td>
                                            <table class="wc_shipping widefat wp-list-table" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><?php _e('ID', 'vm_tracking') ?></th>
                                                        <th><?php _e('Carrier Name', 'vm_tracking') ?></th>
                                                        <th><?php _e('Tracking URL Type', 'vm_tracking') ?></th>
                                                        <th><?php _e('Carrier API', 'vm_tracking') ?></th>  
                                                       <th><?php _e('', 'vm_tracking') ?></th>  
                                                        <th><?php _e('', 'vm_tracking') ?></th>
                                                         <th><?php _e('', 'vm_tracking') ?></th>
                                                           <th><?php _e('', 'vm_tracking') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php foreach ($carriers as $key => $method) : ?>
                                                        <tr>
                                                            <td><?php echo esc_attr($method->id); ?></td>
                                                            <td><?php echo esc_html($method->get_title()); ?></td>
                                                            <td>
                                                                <input type="text" id="vm_tracking_url_<?php echo esc_attr($method->id); ?>" name="vm_tracking_url_<?php echo esc_attr($method->id); ?>" size="40" value="<?php echo $settings['vm_tracking_url_'.$method->id] ?>"/> 
                                                            </td>
                                                               <td>
                                                                   <select id="vm_carrier_api_<?php echo esc_attr($method->id); ?>" name="vm_carrier_api_<?php echo esc_attr($method->id); ?>" onchange="display_custom_fields(this.value,'<?php echo $method->id; ?>' )">
                                                               <?php foreach ($available_carriers_api as $available_api) 
                                                               {
                                                                   
                                                                   
                                                	$selected =  ( $available_api == get_option('vm_carrier_api_'.$method->id)  ) ? 'selected="selected"' : '';
                                                        echo '<option value="'.$available_api.'" '.$selected.'>'.$available_api.'</option>';
		
                                                        
                                                               } 
                                                               ?>
                                                                   </select>
                                                            </td>
                                                                <?php
                                                            $display="none";
                                                               if(get_option('vm_carrier_api_'.$method->id)=="LA POSTE" || get_option('vm_carrier_api_'.$method->id)=="UPS" || get_option('vm_carrier_api_'.$method->id)=="USPS"  )
                                                               {
                                                                   $display='table-cell';
                                                               }
                                                          ?>
                                                                  <?php
                                                            $display_api_key="none";
                                                               if(get_option('vm_carrier_api_'.$method->id)=="UPS" || get_option('vm_carrier_api_'.$method->id)=="USPS"  )
                                                               {
                                                                   $display_api_key='table-cell';
                                                               }
                                                          ?>
                                                              <?php
                                                            $display_siret="none";
                                                               if(get_option('vm_carrier_api_'.$method->id)=="LA POSTE" || get_option('vm_carrier_api_'.$method->id)=="CHRONOPOST"  )
                                                               {
                                                                   $display_siret='table-cell';
                                                               }
                                                          ?>
                                                       <?php
                                                            $display_meter="none";
                                                               if(get_option('vm_carrier_meter_'.$method->id)=="UPS"  )
                                                               {
                                                                   $display_meter='table-cell';
                                                               }
                                                          ?>
                                               
                                                            <td>
                                                                <div id="cell_vm_carrier_login_<?php echo esc_attr($method->id); ?>" style="display:<?php echo $display; ?>">
                                                               <input type="text"  id="vm_carrier_login_<?php echo esc_attr($method->id); ?>" name="vm_carrier_login_<?php echo esc_attr($method->id); ?>" size="10" value="<?php echo $settings['vm_carrier_login_'.$method->id] ?>"/> 
                                                               </br> <span id="vm_carrier_login_info_<?php echo esc_attr($method->id); ?>" class='description' style="float:left;"><?php _e('Login', 'vm_tracking') ?></span>
                                                                </div>
                                                                </td>
                                                           
                                                           <td>
                                                               <div id="cell_vm_carrier_password_<?php echo esc_attr($method->id); ?>" style="display:<?php echo $display; ?>">
                                                                <input type="text"  id="vm_carrier_password_<?php echo esc_attr($method->id); ?>" name="vm_carrier_password_<?php echo esc_attr($method->id); ?>" size="10" value="<?php echo $settings['vm_carrier_password_'.$method->id] ?>"/> 
                                                             </br> <span id="vm_carrier_password_info_<?php echo esc_attr($method->id); ?>" class='description' style="float:left;"><?php _e('Password', 'vm_tracking') ?></span> 
                                                               </div>
                                                               </td>
                                                               <td>
                                                                <div id="cell_vm_carrier_api_key_<?php echo esc_attr($method->id); ?>" style="display:<?php echo $display_api_key; ?>">
                                                                <input type="text" id="vm_carrier_api_key_<?php echo esc_attr($method->id); ?>" name="vm_carrier_api_key_<?php echo esc_attr($method->id); ?>" size="20" value="<?php echo $settings['vm_carrier_api_key_'.$method->id] ?>"/> 
                                                              </br> <span id="vm_carrier_api_key_info_<?php echo esc_attr($method->id); ?>" class='description' style="float:left;" ><?php _e('Api key', 'vm_tracking') ?></span>
                                                                </div>
                                                                </td>
                                                                
                                                                   <td>
                                                                       <div id="cell_vm_carrier_meter_<?php echo esc_attr($method->id); ?>" style="display:<?php echo $display_meter; ?>">
                                                                <input type="text" id="vm_carrier_meter_<?php echo esc_attr($method->id); ?>" name="vm_carrier_meter_<?php echo esc_attr($method->id); ?>" size="10" value="<?php echo $settings['vm_carrier_meter_'.$method->id]; ?>"/> 
                                                            </br>  <span id="vm_carrier_meter_info_<?php echo esc_attr($method->id); ?>" class='description' style="float:left;"><?php _e('Meter Account', 'vm_tracking') ?></span>
                                                                       </div>
                                                                       </td>
                                                   
                                                          </tr>

                <?php endforeach; ?>
                                                         </tbody>
                                                           <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th colspan="4" class="vm_tab_footer">
                                                          
                                                                <?php _e('If you don\'t have access for a carrier API, let the fields empty and only enter the tracking URL.', 'vm_tracking') ?>
                                                                
                                                          
                                                                <?php _e('In  that case, the automatic tracking will be disabled. Only handly tracking will be available.', 'vm_tracking') ?>
                                                                
                                                         
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                     

                                            </table>
                                        <td>

                                    </tr>
                                    
                                           <tr>
                                        <td>
                                        
                                        
                                                       
                                       
                                        
                                        </td>
                                          
                                        <td><h3><?php _e('Choose delivered order status', 'vm_tracking') ?></h3></td>
                                        
                                           </tr>
                                           <tr>
                                             <td>
                                        
                                        
                                                       
                                       
                                        
                                        </td>
                                        <td>
                                             <select id="vm_delivered_orders_status" name="vm_delivered_orders_status" style="width:20% !important;">
                                                               <?php foreach ($orders_status as $key=>$status) 
                                                               {
                                                                   
                                                                   
                                                	$selected =  ( $key == get_option('vm_delivered_orders_status')  ) ? 'selected="selected"' : '';
                                                        echo '<option value="'.$key.'" '.$selected.'>'.$status.'</option>';
		
                                                        
                                                               } 
                                                               ?>
                                                                   </select>
                                                   
                                       
                                        
                                        </td>
                                   
                                        
                                    </tr>
                    
                                

                <?php do_action('settings_urls_end') ?>
                                

                                </table>
                            </div>
                         
                        </div>
                 
                       
                     
                    <?php
            }
            
              static function get_settings_urls()
            {

                   $carriers = WC()->shipping->load_shipping_methods();
           

                   foreach ($carriers as $key => $method)
                   {
                       
                           $settings['vm_tracking_url_'.$method->id] = get_option('vm_tracking_url_'.$method->id);
                            $settings['vm_carrier_api_'.$method->id] = get_option('vm_carrier_api_'.$method->id);
                            $settings['vm_carrier_login_'.$method->id] = get_option('vm_carrier_login_'.$method->id);
                 $settings['vm_carrier_password_'.$method->id] = get_option('vm_carrier_password_'.$method->id);
                      $settings['vm_carrier_api_key_'.$method->id] = get_option('vm_carrier_api_key_'.$method->id);
                       $settings['vm_delivered_orders_status'] = get_option('vm_delivered_orders_status');
                      $settings['vm_siret'] = get_option('vm_siret');
                         $settings['vm_carrier_meter_'.$method->id] = get_option('vm_carrier_meter_'.$method->id);
                            $settings['vm_society'] = get_option('vm_society');
               
                      
                   }
                return $settings;
            }
            
              function settings_saved()
            {
                     

                if (!empty($_REQUEST['page']) && !empty($_REQUEST['tab']) && $_REQUEST['tab'] === 'vm_tracking') {

                   $carriers = WC()->shipping->load_shipping_methods();
                            
                    
                    
                    foreach ($carriers as $key => $method)
                        
                    {
                              update_option('vm_tracking_url_'.$method->id, sanitize_text_field($_POST['vm_tracking_url_'.$method->id]), false);
                                 update_option('vm_carrier_api_'.$method->id, sanitize_text_field($_POST['vm_carrier_api_'.$method->id]), false);
                               update_option('vm_carrier_login_'.$method->id, sanitize_text_field($_POST['vm_carrier_login_'.$method->id]), false);
                                update_option('vm_carrier_password_'.$method->id, sanitize_text_field($_POST['vm_carrier_password_'.$method->id]), false);
                                 update_option('vm_carrier_api_key_'.$method->id, sanitize_text_field($_POST['vm_carrier_api_key_'.$method->id]), false);
                      update_option('vm_delivered_orders_status', sanitize_text_field($_POST['vm_delivered_orders_status']), false);
                      update_option('vm_siret', sanitize_text_field($_POST['vm_siret']), false);
                                update_option('vm_carrier_meter_'.$method->id, sanitize_text_field($_POST['vm_carrier_meter_'.$method->id]), false);
                                  update_option('vm_society', sanitize_text_field($_POST['vm_society']), false);
            
               
                    }
                    
              

                  
                        }
                    }
                
            
    
    
}

new vm_tracking_settings();
