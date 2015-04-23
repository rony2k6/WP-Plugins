<?php 
/*
 * Plugin Name: HOPE Embed Tool
 * Description: Generate Embed Code to share image on any site.
 * Version: 1.0
 * Author: Rony
 * Author URI: http://rony2k6.wordpress.com
 */

class hope_et{
    static $add_script;
    
    static function init() {
        add_shortcode('hope_embed', array(__CLASS__, 'handle_shortcode'));

        add_action('wp_enqueue_scripts', array(__CLASS__, 'wp_enqueue_scripts'));
    }

    static function handle_shortcode($atts) {
        self::$add_script = true;

        $html = '
        <div id="embed_generator_html"> <!-- id "embed_generator_html" is important -->
            <section><h2>Embed Code Generator</h2></section>
            <section>
                <aside class="half"> <!-- id of input fields are important -->
                    <p>
                        <label for="site_name">Site Name:</label>
                        <input type="text" required="" placeholder="YourDomain.com" id="site_name" name="site_name" class="placeholder">
                    </p>
                    <p>
                        <label for="post_url">Post URL:</label>
                        <input type="url" required="" placeholder="http://domain.com/post-url/" id="post_url" name="post_url" class="placeholder">
                    </p>
                    <p>
                        <label for="img_url">Image URL:</label>
                        <input type="url" required="" placeholder="http://domain.com/image.jpg" id="img_url" name="img_url" class="placeholder">
                    </p>
                    <p>
                        <label for="img_alt">Image Alt:</label>
                        <input type="text" required="" placeholder="Infographic Name" id="img_alt" name="img_alt" class="placeholder">  
                    </p>
                    <p>
                        <label for="img_width">Width of Image:</label>
                        <input type="text" placeholder="540px" id="img_width" name="img_width" class="placeholder">
                    </p>
                    <p>
                        <label for="img_height">Height of Image:</label>
                        <input type="text" placeholder="Leave empty to keep proportion." id="img_height" name="img_height" class="placeholder">
                    </p>
                    <p>
                        <label for="embed_width">Embed Box Width:</label>
                        <input type="text" placeholder="540px" id="embed_width" name="embed_width" class="placeholder">
                    </p>
                    <p>
                        <label for="embed_height">Embed Box Height:</label>
                        <input type="text" placeholder="100px" id="embed_height" name="embed_height" class="placeholder">
                    </p>
                </aside>

                <aside class="half">                        
                    <h4>Use This Code</h4>
                    <div>
                        <textarea name="embed_code" readonly id="embed_code">&lt;h3&gt;Share this Image On Your Site&lt;/h3&gt;&lt;textarea onclick="this.focus();this.select()" style="width:540px;height:100px"&gt;&lt;p&gt;&lt;strong&gt;Please include attribution to site name goes here Here with this graphic.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;&lt;a href=""&gt;&lt;img src="" alt="" width="" border="0"/&gt;&lt;/a&gt;&lt;/p&gt;&lt;/textarea&gt;</textarea> <!-- id "embed_code" is important -->
                    </div>
                </aside>
            </section> <!-- #end section -->

            <section id="preview"> <!-- id "preview" is important -->
                <div>
                    <h2>Results Preview</h2>
                    <div id="preview_code"><h3>Share this Image On Your Site</h3><textarea style="width:540px;height:100px" onclick="this.focus();
          this.select()">&lt;p&gt;&lt;strong&gt;Please include attribution to site name goes here Here with this graphic.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;&lt;a href=""&gt;&lt;img src="" alt="" width="" border="0"/&gt;&lt;/a&gt;&lt;/p&gt;</textarea></div>
                </div>
            </section> <!-- #end preview -->

        </div>    
        ';
        return $html;
    }

    static function wp_enqueue_scripts() {
        if ( ! self::$add_script )
            return;
        
        wp_enqueue_script('hope_et-script', plugins_url('assets/js/hope_et-script.js', __FILE__), array('jquery'), '1.0', true);

        wp_enqueue_style('hope_et-style', plugins_url('assets/css/hope_et-style.css', __FILE__), false, '1.0', true);
    }
}

hope_et::init();

?>