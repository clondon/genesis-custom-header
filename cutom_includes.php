<?php
/* add_filter( 'stylesheet_uri', 'custom_replace_default_style_sheet', 10, 2 );
function custom_replace_default_style_sheet() {
	return CHILD_URL . '/css/watfordwillsandtrusts.css';
}   */
/* remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before', 'genesis_do_subnav' ); */
/** Enqueue custom style */


add_action ('wp_head', 'new_header');

function new_header() {
    ?>
    
    <div id="custom_header" class="header_container">
        <div class="dove_img">
            <a href="https://watfordwillsandtrusts.co.uk/">
                <img src="wp-content/uploads/2020/05/dove-silver-91x128-1.svg" alt="">
            </a>
        </div>
        <div class="intro_text">
            <h1>Watford Wills and Trusts</h1>
            <p>Wills Writing&nbsp;&middot;&nbsp;Estate Planning&nbsp;&middot;&nbsp;LPA’s Property Trusts&nbsp;&middot;&nbsp;Care Services.<br>

        <?php  echo do_shortcode ('[email_contact]');?>&nbsp;/&nbsp;<?php echo do_shortcode('[telephone_contact]'); ?></p>

    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?><?php
}
add_action('wp_enqueue_scripts', 'watfordwills_customcss', 100); 
function watfordwills_customcss()
{
    wp_enqueue_style(
        'watfordwillscustomfonts',
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
        array(),
        CHILD_THEME_VERSION
    );

    wp_enqueue_style(
        'watfordwillscustomcookieconsent',
        '//cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css',
        array(),
        CHILD_THEME_VERSION
    );

    wp_enqueue_style(
        'watfordwillscustomcss',
        get_stylesheet_directory_uri()   .  '/css/watfordwillsandtrusts.css',
        array(),
        CHILD_THEME_VERSION
    ); 


    
}

add_shortcode('contact_details', 'contact_details_callback');
function contact_details_callback() {
    define("EMAILADDRESS", "Email: <a href=mailto:info@watfordwillsandtrusts.co.uk>info@watfordwills.co.uk</a>");
    define("TELEPHONE", "Call: <a href=tel:07973502135>07973502135</a>");
    echo EMAILADDRESS;
    echo "<br>";
    echo TELEPHONE;
}


/** Telelphone number only contact detail constant */
add_shortcode('telephone_contact', 'telephone_contact_callback');
function telephone_contact_callback() {
    define('TELEPHONESONLY', 'Telephone: <a class=telephonelinkclass href=tel:+447092029643>+447092029643</a>');
    return TELEPHONESONLY;
}



/** Email address contact detail constant [email_contact] */
add_shortcode('email_contact', 'email_contact_callback');
function email_contact_callback() {
    define('EMAILADDRESSONLY', 'Email: <a class=emaillinkclass href=mailto:info@watfordwillsandtrusts.co.uk>info@watfordwills.co.uk</a>');
    return EMAILADDRESSONLY;
}

/** Allow Shortcode in Widgets */
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode');



