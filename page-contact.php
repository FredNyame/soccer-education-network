<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gsen
 */
$id = 'contact';
get_header();
?>

  <!--banner-->
  <div id="banner" class="section_style">
    <div class="container">
      <h1>Let’s Get In Touch</h1>
      <p class="tagline">We would love to hear from you</p>
    </div>
  </div>
</div>

<!--Contact Info-->
<section class="row" id="section-contact">
  <div class="container" id="quick-note">
      <p class="mission_p">Please use the form below to fill out the necessary infomation and our team will get back to you as soon as possible.</p>
      <p class="mission_p">All fields are <strong class="strong">required</strong></p>
  </div>
</section>

<!--Contact Form-->
<section class="row" id="contact-form-bck">
<div class="contact-bck">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 830.854 834.509"><defs><style>.ac{fill:#f9f9f9;}</style></defs><path class="ac" d="M601.479,554.77c0,31.7-25.246,57.39-56.389,57.39H56.389C25.246,612.16,0,586.466,0,554.77V239.991a57.766,57.766,0,0,1,21.6-45.166c29.267-23.35,53.453-42.284,192.9-145.282C234.262,34.876,273.482-.415,300.74,0c27.252-.423,66.487,34.879,86.243,49.538C526.412,152.53,550.631,171.49,579.879,194.825a57.766,57.766,0,0,1,21.6,45.166ZM524.337,319.7a9.288,9.288,0,0,0-13.321-2.28c-26.837,20.174-65.155,48.668-124.034,92.158C367.217,424.248,328,459.536,300.74,459.117c-27.267.411-66.443-34.844-86.243-49.535C155.625,366.1,117.3,337.6,90.463,317.424a9.288,9.288,0,0,0-13.321,2.28L66.485,335.482a9.674,9.674,0,0,0,2.16,13.112c26.887,20.2,65.145,48.65,123.706,91.905,23.817,17.673,66.4,57.166,108.388,56.88,41.967.289,84.537-39.182,108.387-56.88,58.562-43.257,96.822-71.7,123.706-91.905a9.674,9.674,0,0,0,2.16-13.112Z" transform="translate(0 309.785) rotate(-31)"/></svg>
</div>

<div class="container">
  <!--Start of contact form-->
  <form action="<?php echo admin_url('admin-ajax.php');?>" method="post" class="form-wrapper contact-wrapper" id="contact-form">
    <div class="field">
      <p id="formError"></p>
    </div>
    <div class="field" id="first-form-wrap">
      <label for="Person" id="person">I am </label>
      <input type="radio" class="person" name="person" value="Student"><span class="input-radio">a student</span>
      <input type="radio" class="person" name="person" value="College Coach"><span class="input-radio">College Coach</span>
    </div>

    <div class="field">
      <input type="text" class="inutField" name="firstName" id="firstName" placeholder="First Name" minlength="4" required>
      <label for="firstName">First Name</label>
    </div>

    <div class="field">
      <input type="text" class="inutField" name="lastName" id="lastName" placeholder="Last Name" minlength="4" required>
      <label for="lastName">Last Name</label>
    </div>

    <div class="field">
      <input type="email" class="inutField" name="email" id="email" placeholder="Email Address">
      <label for="email">Email Address</label>
    </div>

    <div class="field">
      <textarea name="message" class="inutField" id="message" cols="30" rows="10" placeholder="Message" minlength="6" required></textarea>
      <label for="message">Message</label>
    </div>

    <input id="hidden" type="hidden" name="action" value="gsen_save_form">

    <input class="hellofield" type="text" name="gsen_hp" id="gsen_hp" autocomplete="off">

    <?php wp_nonce_field('gsen_save_form', 'gsf') ;?>
    <button type="submit" class="btn btn-primary">Send Message</button>

    <p id="success-msg"><!--Js will add a message here--></p>
  </form>
</div>
</section>

<!--Quick Contact Info-->
<section class="row" id="quick-row">
<div class="container">
  <div class="quick-contact">
    <div class="quick-info" id="quick-head">
      <h4>Head Office</h4>
      <p>110 Myrtle Street<br/>Shelton, CT, 06484<br/>USA<br/>(716) 858-4444</p>
    </div>

    <div class="quick-info" id="quick-gh">
      <h4>Ghana Office</h4>
      <p>P.O.BOX SE 1729<br/>Kumasi, Ghana<br/>(716) 858-4444</p>
    </div>

    <div class="quick-info" id="quick-email">
      <h4>Email</h4>
      <p>Example@gmail.com</p>
    </div>

    <!--<div class="quick-info" id="quick-telephone">
      <h4>Telephone</h4>
      <p>Example@gmail.com</p>
    </div>-->

    <div class="quick-info" id="quick-register">
      <h4>Resgister</h4>
      <p>if you want to join <a href="http://localhost/SoccerSitetoWordpress/application/" class="strong">Click here</a></p>
    </div>

  </div>
</div>
</section>

<?php get_footer();?>
