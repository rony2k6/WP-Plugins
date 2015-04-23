jQuery(function(){
  var begin = "<h3>Share this Image On Your Site</h3><textarea onclick='this.focus();this.select()' style='width:540px;height:100px'><p><strong>Please include attribution to site name goes here Here with this graphic.</strong><br /><br /><a href=''><img src='' alt='' width='' border='0'/></a></p></textarea>";

  // #preview_code
  jQuery('#preview_code').html(begin);
  
  // #embed_code
  jQuery('#embed_code').text(begin);
  
  // keyup update textarea
  jQuery('input').keyup(function(){
    // #img_url
    var img_url = jQuery('#img_url').val();
    if(img_url == '' || img_url == 'http://domain.com/image.jpg'){
      var img_url = '';
    }
    // #img_alt
    var img_alt = jQuery('#img_alt').val();
    if(img_alt == '' || img_alt == 'Infographic Name'){
      var img_alt = '';
    }
    // #post_url
    var post_url = jQuery('#post_url').val();
    if(post_url == '' || post_url == 'http://domain.com/post-url/'){
      var post_url = '';
    }
    // #site_name
    var site_name = jQuery('#site_name').val();
    if(site_name == '' || site_name == 'YourDomain.com'){
      var site_name = '';
    }
    // #embed_width
    var embed_width = jQuery('#embed_width').val();
    if(embed_width == ''){
      var embed_width = '540px';
    }
    // #embed_height
    var embed_height = jQuery('#embed_height').val();
    if(embed_height == ''){
      var embed_height = '120px';
    }
    // #img_width
    var img_width_capture = jQuery('#img_width').val();
    if(img_width_capture == '' || img_width_capture == 'Leave empty for original size'){
      var img_width = '540px';
    }else{
      var img_width = "width='"+ img_width_capture +"'";
    }
    // #img_height 
    var img_height_capture = jQuery('#img_height').val();
    if(img_height_capture == '' || img_height_capture == 'Leave empty to keep proportion.'){
      var img_height = '';
    }else{
      var img_height = " height='"+ img_height_capture +"'";
    }
    // UPDATE THE TEXTAREAS
    // var img_preview = "<a href='"+ post_url +"' title='"+ img_alt +"'><img src='"+ img_url +"' alt='"+ img_alt +"' "+ img_width + img_height +" border='0'/></a>";
    var embed = "<h3>Share this Image On Your Site</h3><textarea onclick='this.focus();this.select()' style='width:"+ embed_width +";height:"+ embed_height +"'><p><strong>Please include attribution to "+ site_name +" with this graphic.</strong><br /><br /><a href='"+ post_url +"'><img src='"+ img_url +"' alt='"+ img_alt +"' "+ img_width + img_height +" border='0' /></a></p></textarea>";
    jQuery('#preview_code').html(embed);
    jQuery('#embed_code').text(embed);
  });
  
  // REMOVE PLACEHOLDER CLASS
  jQuery('#embed_generator_html [placeholder]').removeClass('placeholder');
  
  // HIGHLIGHT TEXTAREA TEXT
  jQuery('textarea').click(function(){
    jQuery(this).focus();
    jQuery(this).select();
  });
});