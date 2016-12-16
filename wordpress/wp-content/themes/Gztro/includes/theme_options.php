<?php
$themename = "Gztro";
$shortname = "gz";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array ( 
array( "name" => $themename." Options",
       "type" => "title"),

	array( "name" => "SEO及统计相关设置",
       "type" => "section"),
	array( "type" => "open"),

	array(	"name" => "描述（Description）",
			"desc" => "",
			"id" => $shortname."_description",
			"type" => "textarea",
            "std" => "输入你的网站描述，一般不超过200个字符"),

	array(	"name" => "关键词（KeyWords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "输入你的网站关键字，一般不超过100个字符"),

	array("name" => "统计代码",
            "desc" => "",
            "id" => $shortname."_tongji_code",
            "type" => "textarea",
            "std" => ""),


    array( "type" => "close"),
	array( "name" => "文章页广告设置",
			"type" => "section"),
	array( "type" => "open"),
	
	
	//ctn_btm_ad

	array(  "name" => "文章内容页下方广告",
			"desc" => "输入广告代码",
            "id" => $shortname."_ctn_btm_ad",
            "type" => "select",
            "std" => "Hide",
            "options" => array("Hide", "Display")),

	array(	"name" => "文章内容页下方广告_左",
            "desc" => "",
            "id" => $shortname."_ctn_btm_ad1code",
            "type" => "textarea",
            "std" => '在此输入广告代码！'),
			
		array(	"name" => "文章内容页下方广告_右",
            "desc" => "",
            "id" => $shortname."_ctn_btm_ad2code",
            "type" => "textarea",
            "std" => '在此输入广告代码！'),
	
	
	array( "type" => "close"),
	array( "name" => "侧边栏广告设置",
			"type" => "section"),
	array( "type" => "open"),
		
	//sidebar_top_ad_code

	array(  "name" => "侧边栏顶部广告代码",
			"desc" => "",
            "id" => $shortname."_sid_adcode1",
            "type" => "select",
            "std" => "Display",
            "options" => array("Display", "Hide")),

	array(	"name" => "侧边栏顶部广告代码",
            "desc" => "",
            "id" => $shortname."_sid_adcode1_con",
            "type" => "textarea",
            "std" => '<a href="http://www.gongzi.org" target="_blank" title="Theme Gztro By Gongzi.org" alt="Theme Gztro By 公子"><img src="http://wp.cdn.gongzi.org/gztro/img/gztro.jpg"/></a>'),
				
//sidebar adcode2	
	array(  "name" => "侧边中部广告代码",
			"desc" => "侧边中部广告代码",
            "id" => $shortname."_sid_adcode2",
            "type" => "select",
            "std" => "Hide",
            "options" => array("Hide", "Display")),

	array(	"name" => "侧边栏顶部广告代码_2",
            "desc" => "",
            "id" => $shortname."_sid_adcode2_con",
            "type" => "textarea",
            "std" => '此处输入广告代码！'),
	array(	"type" => "close") 
);
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme_options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme_options.php&reset=true");
die;
}
}
add_theme_page($themename." Options", "Gztro主题设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/includes/options/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/includes/options/rm_script.js", false, "1.0");
}
function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.'主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.'主题已重新设置</strong></p></div>';
?>
<div class="wrap rm_wrap">
<div id="icon-themes" class="icon32"><br></div>
<h2><?php echo $themename; ?>主题设置</h2>
<p>当前使用主题: Gztro | Design: <a href="http://www.gongzi.org" target="_blank">公子</a> | <a href="http://www.gongzi.org/gztro.html" target="_blank">查看主题发布页</a> | <a href="http://www.gongzi.org/gztrohelp.html" target="_blank">主题帮助</a></p> 
<?php
function show_category() {
	global $wpdb;
	$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
	$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
	$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
	$request .= " ORDER BY term_id asc";
	$categorys = $wpdb->get_results($request);
	foreach ($categorys as $category) { 
		$output = '<span>'.$category->name."(<em>".$category->term_id.'</em>)</span>';
		echo $output;
	}
}
?> 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?> 
<?php break;case "close": ?>
</div>
</div>
<br /> 
<?php break; case "title": ?>
<?php break; case 'text': ?>

<?php break; case 'textarea': ?>
<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div> 
 </div> 
<?php break;case 'select': ?>
<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php break; case "checkbox": ?>
<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; case "section": $i++; ?>
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/includes/options/clear.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="保存设置" />
</span><div class="clearfix"></div></div>
<div class="rm_options">
<?php break; }} ?>
<span class="show_id">
<p><strong>主题说明：</strong></p>
<p>此主题为自用版分享，简洁风，提供几个简单的公告位，若有需求可自行调用相关样式即可添加。公子府：www.gongzi.org</p>

</span>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="恢复默认设置" /> <font color=#ff0000>提示：此按钮将恢复主题初始状态，您的所有设置将消失！请谨慎使用！</font>
<input type="hidden" name="action" value="reset" />
</p></form></div>
<?php } ?>
<?php
function mytheme_wp_head() { 
	$stylesheet = get_option('gz_alt_stylesheet');
	if($stylesheet != ''){?>
		<link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" />
<?php }
} 
add_action('wp_head', 'mytheme_wp_head');
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
//订阅Gztro主题更新
function Gztro_dashboard_widget_function() {
	echo"<script type='text/javascript' src='http://feed.feedsky.com/Gztro/jsout&n=8&e=utf8'></script>";
}
function Gztro_add_dashboard_widgets() {
    wp_add_dashboard_widget('Gztro_dashboard_widget', 'Gztro主题动态', 'Gztro_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'Gztro_add_dashboard_widgets' );
?>