# genesis-custom-header
Custom header with title and logo for genesis theme
<?php
/* add_filter('stylesheet_uri', 'custom_replace_default_style_sheet', 10, 2);
function custom_replace_default_style_sheet() */
{
  return CHILD_URL . '/css/watfordwillsandtrusts.css';
  remove_action('genesis_after_header', 'genesis_do_subnav');
  add_action('genesis_before', 'genesis_do_subnav');
}
/** Enqueue custom style */

add_action('wp_head', 'new_header');

function new_header()
{
?>
<div class="header-container">
  <div id="custom_header" class="header_logo">
    <div class="dove_img">
       <a href="https://watfordwillsandtrusts.co.uk/">
          <img src="wp-content/uploads/2020/05/dove-silver-91x128-1.svg" alt="Watford Wills and Trusts">
       </a>
    </div>
    <div class="intro_text">
        <h1>Watford Wills and Trusts</h1>
        <p>Wills Writing&nbsp;&middot;&nbsp;Estate Planning&nbsp;&middot;&nbsp;LPA’s Property Trusts&nbsp;&middot;&nbsp;Care Services.<br>
        <?php echo do_shortcode('[email_contact]'); ?>&nbsp;/&nbsp;<?php echo do_shortcode('[telephone_contact]'); ?></p>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<?php wp_nav_menu(array('theme_location' => 'primary'));
}

