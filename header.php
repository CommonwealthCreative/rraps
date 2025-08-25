<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RRAPS
 */

?>
<!doctype html>
<html data-wf-page="655b9c3daf07375b7d0ee0ad" data-wf-site="655b9c3daf07375b7d0ee0a9" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
   <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Courier Prime:regular,italic,700,700italic"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon"><!--  Google tag (gtag.js)  -->
<style>@media (max-width:991px) and (min-width:768px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="73e31671-d4c6-e24f-0eb1-a5d6567225cd"] {display:block;width:100%;height:0%;}html.w-mod-js:not(.w-mod-ix) [data-w-id="516b8497-c53e-46fc-009e-7b0dfd959a9d"] {opacity:0;-webkit-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);display:none;}html.w-mod-js:not(.w-mod-ix) [data-w-id="721557c2-7a1b-10a7-e91e-3828a123d82a"] {-webkit-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0;}html.w-mod-js:not(.w-mod-ix) [data-w-id="94b4531a-4f09-a3dd-233e-9c74e2260536"] {display:block;-webkit-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1;}}@media (max-width:767px) and (min-width:480px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="73e31671-d4c6-e24f-0eb1-a5d6567225cd"] {display:block;width:100%;height:0%;}html.w-mod-js:not(.w-mod-ix) [data-w-id="516b8497-c53e-46fc-009e-7b0dfd959a9d"] {opacity:0;-webkit-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);display:none;}html.w-mod-js:not(.w-mod-ix) [data-w-id="721557c2-7a1b-10a7-e91e-3828a123d82a"] {-webkit-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0;}html.w-mod-js:not(.w-mod-ix) [data-w-id="94b4531a-4f09-a3dd-233e-9c74e2260536"] {display:block;-webkit-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1;}}@media (max-width:479px) {html.w-mod-js:not(.w-mod-ix) [data-w-id="73e31671-d4c6-e24f-0eb1-a5d6567225cd"] {display:block;width:100%;height:0%;}html.w-mod-js:not(.w-mod-ix) [data-w-id="516b8497-c53e-46fc-009e-7b0dfd959a9d"] {opacity:0;-webkit-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);display:none;}html.w-mod-js:not(.w-mod-ix) [data-w-id="721557c2-7a1b-10a7-e91e-3828a123d82a"] {-webkit-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -300px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0;}html.w-mod-js:not(.w-mod-ix) [data-w-id="94b4531a-4f09-a3dd-233e-9c74e2260536"] {display:block;-webkit-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0px, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1;}}</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rraps' ); ?></a>

	<header id="masthead" class="site-header">
	  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="nav w-nav">
    <a href="#" class="brand w-nav-brand"></a>
   <div class="navigation">
    <div class="container nav">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo w-inline-block"></a>

      <div data-w-id="73e31671-d4c6-e24f-0eb1-a5d6567225cd" class="nav-menu">
        <ul data-w-id="721557c2-7a1b-10a7-e91e-3828a123d82a" role="list" class="nav-links">
          <li class="m-nav-link-item">
            <a href="index.html" aria-current="page" class="m-nav-link main w--current">home</a>
          </li>
          <li class="m-nav-link-item">
            <a href="#" class="m-nav-link main">About</a>
          </li>
          <li class="m-nav-link-item">
            <a href="#" class="m-nav-link main last">Contact</a>
          </li>
          <li class="m-nav-link-item">
            <a data-w-id="e0262db0-a499-e11a-3723-8f9fd4ac429b" href="#" class="button sm">Book Now</a>
          </li>
        </ul>
      </div>
      <div class="main-menu-toggle">
        <a data-w-id="94b4531a-4f09-a3dd-233e-9c74e2260536" href="#" class="main-menu-open button sm">Menu</a>
        <a data-w-id="516b8497-c53e-46fc-009e-7b0dfd959a9d" href="#" class="main-menu-close w-inline-block">
          <div class="button close sm">
            <div class="m-nav-close-icon-wrapper"><img alt="close icon" src="../wp-content/themes/rraps/images/nav-close-icon.svg" class="m-nav-close-icon sm"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div style="display:none;width:100%;height:0%" class="modal">
      <a data-w-id="2808acb9-d39a-558e-fc5e-7adb5eba3210" href="#" class="modal-close w-inline-block">
        <div class="button close">
          <div class="m-nav-close-icon-wrapper"><img alt="close icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nav-close-icon.svg" class="m-nav-close-icon"></div>
        </div>
      </a><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/rraps-wordmark-white.svg" loading="lazy" alt="" class="footerlogo">
    </div>
  <div class="mobile-nav">
      <div class="m-nav-toggle">
        <a data-w-id="335cb2c7-92df-439f-34d1-42ca3a2a34d0" style="opacity:0;-webkit-transform:translate3d(0, 100PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 100PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 100PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 100PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);display:none" href="#" class="m-nav-toggle-close w-inline-block">
          <div class="button close">
            <div class="m-nav-close-icon-wrapper"><img alt="close icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nav-close-icon.svg" class="m-nav-close-icon"></div>
          </div>
        </a>
        <a data-w-id="335cb2c7-92df-439f-34d1-42ca3a2a34d4" style="display:inline-block;-webkit-transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1" href="#" class="m-nav-toggle-open w-inline-block">
          <div class="button">
            <p class="m-nav-toggle-description">Adventure Programs</p>
          </div>
        </a>
      </div>
      <nav style="display:none;width:100%;height:0%" class="m-nav-overlay">
        <div style="-webkit-transform:translate3d(0, 110PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 110PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 110PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 110PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="m-nav-content">
          <ul role="list" class="m-nav-list w-list-unstyled">
            <li class="m-nav-link-item first-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/rraps-wordmark-white.svg" loading="lazy" alt="" class="footerlogo"></li>
            <li class="m-nav-link-item">
              <a href="#" class="m-nav-link">Conservation</a>
            </li>
            <li class="m-nav-link-item">
              <a href="#" class="m-nav-link">KayaK &amp; Canoe</a>
            </li>
            <li class="m-nav-link-item">
              <a href="#" class="m-nav-link">tubing <span class="yellow">(Coming soon)</span></a>
            </li>
            <li class="m-nav-link-item">
              <a href="#" class="m-nav-link">Fishing Tours</a>
            </li>
            <li class="m-nav-link-item">
              <a href="#" class="m-nav-link">Hiking &amp; Camping</a>
            </li>
            <li class="m-nav-link-item">
              <a href="#" class="m-nav-link">Scouting Trips</a>
            </li>
            <li class="m-nav-link-item last-item">
              <a href="#" class="m-nav-link">watershed Access</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="m-nav-toggle-bg"></div>
    </div>
    <div class="menu-button w-nav-button">
      <div class="w-icon-nav-menu"></div>
    </div>
    
  </div>
	</header><!-- #masthead -->
