<?php
/**
 * Template Name: Contact Page
 * Description: Contact page with hours note and inquiry form.
 *
 * @package RRAPS
 */

get_header();
?>

	<main id="primary" class="site-main">
	<section class="content">
    <div class="container">
      <div id="w-node-_04262738-11c5-e4a5-5498-872146d9619f-7d0ee0ad" class="w-layout-layout wf-layout-layout">
        <div class="w-layout-cell">
          <h2 class="entry-title big">Rappahannock River Adventure Programs Contact Information</h2>
        </div>
        <div class="w-layout-cell">
<div id="w-node-_91fefecc-2339-0e40-ddb4-aaf68c090ed9-7d0ee0ad" class="w-layout-layout details wf-layout-layout">
            <div class="w-layout-cell">
              <h2 class="small-headers">Contact</h2>
              <p><strong>Phone</strong><br><span class="fa yellow"></span> 804-424-1348</p>
              <p><strong>Email</strong><br><span class="fa red"></span> rraps.org@gmail.com</p>
            </div>
            <div class="w-layout-cell">
              <h2 class="small-headers">Location</h2>
              <p><strong>RRAPS HQ</strong><br><span class="fa green"></span> Fredericksburg, VA</p>
            </div>
          </div>
          <h2 class="small-headers">Hours</h2>
          <p><strong>We are accessible by phone and email during office hours.</strong><br><span class="fa"></span> Tuesday - Thursday 10:00am til 4:00pm </p>
          <p><strong>Adventure hours vary, but you’ll often find us leading trips on weekday mornings and afternoons, and from sunrise to sunset on weekends.</strong></p>
        </div>
      </div>
      <div class="break"></div>
        <div class="contact-form">
          <?php echo do_shortcode('[ninja_form id=1]'); ?>
        </div>
    </div>
  </section>
	</main><!-- #main -->

<?php

get_footer();
