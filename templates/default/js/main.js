jQuery(document).ready(function(e) {
    jQuery('.chosen-select').chosen();
    
    jQuery('#region').change(function() {
        var ter_id   = jQuery('#region').val();
        var postData = {ter_id: ter_id};
        
        jQuery.ajax({
        type: 'POST', 
        url: "index.php?controller=Terr&action=getDiscrict",
        data: postData,
        dataType: 'text',
        success: function(data){
            jQuery('#districts').html(data);
            jQuery('.chosen-select').chosen();
        }
        });
    });
        
    jQuery(document).on('change', '#district', function(){
        var ter_id   = jQuery('#district').val();
        var postData = {ter_id: ter_id};

        jQuery.ajax({
        type: 'POST', 
        url: "index.php?controller=Terr&action=getCity",
        data: postData,
        dataType: 'text',
        success: function(data){
            jQuery('#cities').html(data);
            jQuery('.chosen-select').chosen();
        }
    
        });
    });
    
    jQuery(document).on('click', '#submit', function(){
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var region   = jQuery('#region').val();
        var district   = jQuery('#district').val();
        var city   = jQuery('#city').val();
        var postData = {name:name, email: email, region: region, district: district, city: city};

        jQuery.ajax({
        type: 'POST', 
        url: "index.php?controller=Login&action=register",
        data: postData,
        dataType: 'text',
        success: function(data){
            jQuery('#userData').html(data);
            jQuery('.chosen-select').chosen();
        }
    
        });
    });
});










