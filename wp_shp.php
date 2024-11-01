<?php
/*
Plugin Name: XSD socialshareprivacy
Plugin URI: http://wordpress.org/extend/plugins/xsd-socialshareprivacy/
Description: F&uuml;gt Heises socialshareprivacy am Anfang oder Ende eines Beitrags ein. Konfigurierbare Mouseover-Infotexte und Anzeige
Version: 0.8
Author: XSized
Author URI: http://www.xsized.de/2011/09/2-klicks-fuer-mehr-datenschutz-als-wordpress-plugin/
*/

/*
/*

/*
Instruction:
Copy the complete folder with all included files into your wordpress plugin directory "/wp-content/plugins/" and activate the plugin in the Admin-area.
*/

load_plugin_textdomain('xsdshp_lang', false, basename( dirname( __FILE__ ) ) . '/lang' );

$shp_updated = "0";

if ('insert' == $_POST['action'])
{

	update_option("shp_fbinfo",$_POST['shp_fbinfo']);
	update_option("shp_twinfo",$_POST['shp_twinfo']);
	update_option("shp_gpinfo",$_POST['shp_gpinfo']);
	update_option("shp_plinfo",$_POST['shp_plinfo']);
	update_option("shp_pldesc",$_POST['shp_pldesc']);
	update_option("shp_spage",$_POST['shp_spage']);
	update_option("shp_sfbbut",$_POST['shp_sfbbut']);
	update_option("shp_stwbut",$_POST['shp_stwbut']);
	update_option("shp_sgpbut",$_POST['shp_sgpbut']);
	update_option("shp_butpos",$_POST['shp_butpos']);
	$shp_updated ="1";
	
}

	
$shp_fbinfo = get_option('shp_fbinfo');
$shp_twinfo = get_option('shp_twinfo');
$shp_gpinfo = get_option('shp_gpinfo');
$shp_plinfo = get_option('shp_plinfo');
$shp_pldesc = get_option('shp_pldesc');
$shp_spage = get_option('shp_spage', 'no');
$shp_sfbbut = get_option('shp_sfbbut', 'on');
$shp_stwbut = get_option('shp_stwbut', 'on');
$shp_sgpbut = get_option('shp_sgpbut', 'on');
$shp_butpos = get_option('shp_butpos', 'end');

/*if ($shp_spage == "") 
{
	$shp_spage = "no";
} */	

if ($shp_fbinfo == "") 
{
	$shp_fbinfo = "2 Klicks f&uuml;r mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k&ouml;nnen Ihre Empfehlung an Facebook senden. Schon beim Aktivieren werden Daten an Dritte &uuml;bertragen &ndash; siehe <em>i</em>.";
} 
if ($shp_twinfo == "") 
{
	$shp_twinfo = "2 Klicks f&uuml;r mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k&ouml;nnen Ihre Empfehlung an Twitter senden. Schon beim Aktivieren werden Daten an Dritte &uuml;bertragen &ndash; siehe <em>i</em>.";
} 
if ($shp_gpinfo == "") 
{
	$shp_gpinfo = "2 Klicks f&uuml;r mehr Datenschutz: Erst wenn Sie hier klicken, wird der Button aktiv und Sie k&ouml;nnen Ihre Empfehlung an Google+ senden. Schon beim Aktivieren werden Daten an Dritte &uuml;bertragen &ndash; siehe <em>i</em>.";
}
if ($shp_plinfo == "") 
{
	$shp_plinfo = "Wenn Sie diese Felder durch einen Klick aktivieren, werden Informationen an Facebook, Twitter oder Google in die USA &uuml;bertragen und unter Umst&auml;nden auch dort gespeichert. N&auml;heres erfahren Sie durch einen Klick auf das <em>i</em>.<br><br>Wordpress-Plugin: www.xsized.de";
}

if ($shp_pldesc == "")
{
	$shp_pldesc= "Dauerhaft aktivieren und Daten&uuml;ber&shy;tragung zustimmen:";
}

$shp_pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
		
$all_options = array(
	img_path => $shp_pluginpath ."images/",
	shp_fbinfo => $shp_fbinfo,
	shp_twinfo => $shp_twinfo,
	shp_gpinfo => $shp_gpinfo,
	shp_plinfo => $shp_plinfo,
	shp_pldesc => $shp_pldesc,
	shp_spage => $shp_spage,
	shp_sfbbut => $shp_sfbbut,
	shp_stwbut => $shp_stwbut,
	shp_sgpbut => $shp_sgpbut,
	shp_butpos => $shp_butpos
);


function shp_style() {
	$shp_pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	wp_enqueue_style('xsd-socialshareprivacy', $shp_pluginpath.'css/socialshareprivacy.css');
}

function shp_admstyle() {
	$shp_pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	wp_enqueue_style('xsd-socialshareprivacy', $shp_pluginpath.'css/style.css');
}

function shp_scripts() {
	$shp_pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	wp_enqueue_script('jquery');
	wp_enqueue_script('xsd-socialshareprivacy', $shp_pluginpath.'jquery.socialshareprivacy.min.js');
}

function shp_option_page() {
	global $all_options;
	global $shp_updated;
	?>

<!-- Optionen im Adminbereich -->
        <div class="wrap">
          <h2>XSD socialshareprivacy</h2>
		  <?php if ($shp_updated == "1") { ?>
		  <div id="message" class="updated fade">
			<p>
			<strong>
			<?php esc_html_e('Settings saved.') ?>
			</strong>
			</p>
		  </div>
		  <?php } ?>
		  <div id="poststuff">
			<div class="postbox">
			<h3>
			<?php esc_html_e('Settings') ?>
			</h3>
		  <form name="form1" method="post" action="">
		  <div class="inside">
			<ul><li>
          	<table>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Show on pages:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<select name="shp_spage" id="shp_spage">
        	  					<option <?php if($all_options[shp_spage] == "no" || '') { echo 'selected'; } ?> value="no"><?php _e('No', 'xsdshp_lang') ?></option>
								<option <?php if($all_options[shp_spage] == "yes") { echo 'selected'; } ?> value="yes"><?php _e('Yes', 'xsdshp_lang') ?></option>
					</select>
					</td>
                </tr>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Show buttons:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<select name="shp_butpos" id="shp_butpos">
        	  					<option <?php if($all_options[shp_butpos] == "end" || '') { echo 'selected'; } ?> value="end"><?php _e('after the content', 'xsdshp_lang') ?></option>
								<option <?php if($all_options[shp_butpos] == "start") { echo 'selected'; } ?> value="start"><?php _e('before the content', 'xsdshp_lang') ?></option>
					</select>
					</td>
                </tr>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('General info (on <em>i</em>):', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<textarea name="shp_plinfo" id="shp_plinfo" cols="80" rows="4"><?php echo $all_options[shp_plinfo]; ?></textarea>
					</td>
                </tr>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Preferences description:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<textarea name="shp_pldesc" id="shp_pldesc" cols="80" rows="4"><?php echo $all_options[shp_pldesc]; ?></textarea>
					</td>
                </tr>
          	</table>
			</ul></li>
			<ul><li>
          	<table>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Show Facebook button:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<select name="shp_sfbbut" id="shp_sfbbut">
        	  					<option <?php if($all_options[shp_sfbbut] == "off" || '') { echo 'selected'; } ?> value="off"><?php _e('No', 'xsdshp_lang') ?></option>
								<option <?php if($all_options[shp_sfbbut] == "on") { echo 'selected'; } ?> value="on"><?php _e('Yes', 'xsdshp_lang') ?></option>
					</select>
					</td>
                </tr>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Facebook description:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<textarea name="shp_fbinfo" id="shp_fbinfo" cols="80" rows="4"><?php echo $all_options[shp_fbinfo]; ?></textarea>
					</td>
                </tr>
          	</table>
			</ul></li>
			<ul><li>
			<table>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Show Twitter button:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<select name="shp_stwbut" id="shp_stwbut">
        	  					<option <?php if($all_options[shp_stwbut] == "off" || '') { echo 'selected'; } ?> value="off"><?php _e('No', 'xsdshp_lang') ?></option>
								<option <?php if($all_options[shp_stwbut] == "on") { echo 'selected'; } ?> value="on"><?php _e('Yes', 'xsdshp_lang') ?></option>
					</select>
					</td>
                </tr>
          		<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Twitter description:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<textarea name="shp_twinfo" id="shp_twinfo" cols="80" rows="4"><?php echo $all_options[shp_twinfo]; ?></textarea>
					</td>
                </tr>
          	</table>
			</ul></li>
			<ul><li>
			<table>
				<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Show Google+ button:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<select name="shp_sgpbut" id="shp_sgpbut">
        	  					<option <?php if($all_options[shp_sgpbut] == "off" || '') { echo 'selected'; } ?> value="off"><?php _e('No', 'xsdshp_lang') ?></option>
								<option <?php if($all_options[shp_sgpbut] == "on") { echo 'selected'; } ?> value="on"><?php _e('Yes', 'xsdshp_lang') ?></option>
					</select>
					</td>
                </tr>
          		<tr style="vertical-align:middle;">
					<td width="150"><?php _e('Google+ description:', 'xsdshp_lang') ?></td>
					<td style="vertical-align:left;">
					<textarea name="shp_gpinfo" id="shp_gpinfo" cols="80" rows="4"><?php echo $all_options[shp_gpinfo]; ?></textarea>
					</td>
                </tr>
          	</table>
			</ul></li>
		  <input name="action" value="insert" type="hidden" />
		  <p>
			<input type="submit" name="submit" class="button-primary" value="<?php esc_html_e('Save Changes') ?>" />
		  </p>
		<p>&nbsp;</p>
		<p>Wordpress-Plugin by <a href="http://www.xsized.de/2011/09/2-klicks-fuer-mehr-datenschutz-als-wordpress-plugin-update">XSized</a>
		</div>
		</form>
		</div>
		</div>  
        </div>

<?php
} // End shp_option_page()

// Adminmenu Optionen
function shp_add_menu() {
  	$page = add_options_page('socialSharePrivacy', 'socialSharePrivacy', 9, __FILE__, 'shp_option_page'); 
	add_action('admin_print_styles-'.$page,'shp_admstyle' );
}


function shp_insert($content) {
		global $all_options;
		
		if( is_single() || (is_page() and $all_options[shp_spage] == "yes") )
		{	if( $all_options[shp_butpos] == "end")
			{
			//$content.= json_encode($all_options);
				$content.= "
				<script type=\"text/javascript\">
					jQuery(document).ready(function($){
						var shpOptions = " . json_encode($all_options) . ";
						if($('#socialshareprivacy').length > 0){ 
							$('#socialshareprivacy').socialSharePrivacy(shpOptions);
						}
					});
				</script>\n";
				$content.= "<div id=\"socialshareprivacy\"></div>";
			}
			else
			{
				$temp_content.= "
				<script type=\"text/javascript\">
					jQuery(document).ready(function($){
						var shpOptions = " . json_encode($all_options) . ";
						if($('#socialshareprivacy').length > 0){ 
							$('#socialshareprivacy').socialSharePrivacy(shpOptions);
						}
					});
				</script>\n";
				$temp_content.= "<div id=\"socialshareprivacy\"></div>";
				$temp_content.= $content;
				$content = $temp_content;
			}
		}
		return $content;
		
}

// Inserts
add_action( 'wp_print_styles', 'shp_style' );
add_action( 'wp_print_scripts', 'shp_scripts' );
add_action('the_content', 'shp_insert');

if( is_admin()){
add_action('admin_menu', 'shp_add_menu');
}
?>