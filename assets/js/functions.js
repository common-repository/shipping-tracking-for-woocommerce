/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function () {
    
    
   jQuery('#vm_tracking_number').on('input', function(e){
       
  
       original_tracking_url=jQuery('#vm_carrier_url').val();
       tracking_number=jQuery('#vm_tracking_number').val();
       new_tracking_url= original_tracking_url.replace("@", tracking_number);
       jQuery('#vm_tracking_number_link').attr('href',new_tracking_url);
   });
    

if(jQuery('#vm_is_statut').val()=='MD5 INCONNU')
{
     jQuery('#ajax_show_create_new_md5').css('display','block');
    jQuery('#vm_unknow_status_info').css('display','block');
     
     
    
}



    jQuery('.vm-datepicker').datepicker({
        showButtonPanel: true,
        dateFormat: 'dd MM yy',
        altField: "#alternate_date",
        altFormat: "yy-mm-dd"
    }
    );

    jQuery('#ajax_show_create_new_md5').click(function(){
        jQuery('#vm_new_md5').css('display','block');
        
    });
    jQuery('#ajax_create_new_md5').on('click',function(e){
         e.preventDefault();
        jQuery('#ajax_create_new_md5').addClass('in-progress');

        var data = {
            'action': 'vm_created_new_md5',
            'remboursable': jQuery('#vm_remboursable').val(),
            'transit': jQuery('#vm_transit').val(),
            'email': jQuery('#vm_email').val(),
            'md5': jQuery('#vm_tracking_msg_md5').val(),
            'order-id': jQuery('#post_ID').val(),
            'vm-tracking-msg': jQuery('#vm_tracking_msg').val()


        };





        jQuery.post(ajaxurl, data, function (response) {

 
          jQuery('#ajax_create_new_md5').removeClass('in-progress');
 jQuery('#ajax_show_create_new_md5').css('display','none');
 jQuery('#vm_unknow_status_info').css('display','none');
    jQuery('#vm_new_md5').css('display','none');

        });
        
    });


    jQuery('#checkall').click(function () {
        jQuery('.selectedId').prop('checked', this.checked);
    });

    jQuery('.selectedId').change(function () {
        var check = (jQuery('.selectedId').filter(":checked").length == jQuery('.selectedId').length);
        jQuery('#checkall').prop("checked", check);
    });

    jQuery('#ajax_update_tracking_number').on('click', function (e) {

        e.preventDefault();
        jQuery('#ajax_update_tracking_number').addClass('in-progress');

        var data = {
            'action': 'vm_save_tracking',
            'tracking-number': jQuery('#vm_tracking_number').val(),
            'delivery-date': jQuery('#alternate_date').val(),
            'order-id': jQuery('#post_ID').val(),
            'vm-tracking-msg': jQuery('#vm_tracking_msg').val()


        };





        jQuery.post(ajaxurl, data, function (response) {


            jQuery('#ajax_update_tracking_number').removeClass('in-progress');



        });
    });

    jQuery('#ajax_update_tracking_msg').on('click', function (e) {

        e.preventDefault();
        jQuery('#ajax_update_tracking_msg').addClass('in-progress');

        var mydata = {
            'action': 'vm_update_tracking_msg',
            'order-id': jQuery('#post_ID').val(),
            'carrier-api': jQuery('#vm_carrier_api').val(),
            'carrier-login': jQuery('#vm_carrier_login').val(),
            'carrier-password': jQuery('#vm_carrier_password').val(),
            'carrier-api-key': jQuery('#vm_carrier_api_key').val(),
            'tracking-number': jQuery('#vm_tracking_number').val(),
            'vm-tracking-msg': jQuery('#vm_tracking_msg').val(),
             'carrier-meter': jQuery('#vm_carrier_meter').val(),
        };


        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            dataType: "json",
            data: mydata,
            success: function (data, textStatus, jqXHR) {
                if (data.msg != '')
                {
                    jQuery("#vm_tracking_msg").html(data.msg);
                     
                    if (data.statut == "delivered")
                    {
                        document.location.reload(true);
                    }
                }
                 jQuery('#ajax_update_tracking_msg').removeClass('in-progress');
            },
            error: function (errorMessage) {

                console.log(errorMessage);
                   jQuery('#ajax_update_tracking_msg').removeClass('in-progress');
                 
            }

        });

    });





});







