<?php
/**
 * Template Name: Application
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

get_header();
?>
<!--banner-->
<div id="banner" class="section_style">
  <div class="container">
    <h1>Apply to Ghana Soccer Education Network</h1>
  </div>
</div>
</div>

<!--Appliacation Form-->
<section class="row" id="app-form">
  <h2 class="top_heading">Application Form</h2>
  <div class="container">
    <form method="post" class="form-wrapper contact-wrapper" id="application-form">
      <div class="field">
        <p id="formError"></p>
      </div>
      <div class="field">
        <input class="inputField"  type="text" name="firstName" id="firstName" placeholder="First Name" minlength="4" required>
        <label>First Name</label>
      </div>
      <div class="field">
        <input class="inputField"  type="text" name="lastName" id="lastName" placeholder="Last Name" minlength="4" required>
        <label>Last Name</label>
      </div>
      <div class="field">
        <input class="inputField"  type="email" name="email" id="email" placeholder="Email Address" required>
        <label>Email Address</label>
      </div>
      <div class="field">
        <input class="inputField"  type="number" name="age" id="age" placeholder="Age" required>
        <label>Age</label>
      </div>
      <div class="field">
        <input class="inputField"  type="text" name="school" id="school" placeholder="School" minlength="4" required>
        <label>School</label>
      </div>
      <div class="field">
        <input class="inputField"  type="text" name="location" id="location" placeholder="Location" minlength="4" required>
        <label>Location</label>
      </div>
      <div class="field">
        <textarea class="inputField"  name="message" id="message" cols="30" rows="10" placeholder="Describe yourself" minlength="6" required></textarea>
        <label>Describe yourself</label>
      </div>
      <input id="apphidden" type="hidden" name="action" value="gsen_save_form_app">

      <input class="hellofield" type="text" name="gsen_hp" id="gsen_hp" autocomplete="off">

      <?php wp_nonce_field('gsen_save_form', 'gsf') ;?>

      <button type="submit" class="btn btn-primary">Apply Now</button>

      <p id="success-msg"><!--Js will add a message here--></p>
    </form>
  </div>
<!--Quick Contact Info-->
<div class="container">
  <div class="quick-contact contact-wrapper">
    <div class="app-info quick-info">
      <p>To inquire more about what we do <a href="http://localhost/SoccerSitetoWordpress/contact/" class="strong">Click here</a> to send your message</p>
    </div>
  </div>
</div>
</section>
<?php get_footer();?>
