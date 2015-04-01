<?php

/**
 * Template name: Test - Form
 */

function moar_styles() {
  wp_enqueue_style( 'tests', get_template_directory_uri() . '/tests/css/tests.css' );
  wp_enqueue_style( 'icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null, '4.3.0' );
}

add_action( 'wp_enqueue_scripts', 'moar_styles' );

get_header();

?>

<div class="container">
  <h2 class="section__title">Forms</h2>
  <form>
    <fieldset>
      <div class="form__group">
        <label class="form__label" for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your Name">
      </div>
      <div class="form__group">
        <label class="form__label" for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="example@example.com">
      </div>
      <div class="form__group">
        <label class="form__label" for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>
      <div class="form__group">
        <label class="form__label" for="bio">Biography</label>
        <textarea id="bio" name="bio"></textarea>
      </div>
      <div class="form__group">
        <label class="form__label" for="avatar">Avatar</label>
        <input type="file" id="avatar" name="avatar">
      </div>
      <div class="form__group">
        <label class="form__label" for="country">Country</label>
        <select id="country" name="country">
          <option>United Kingdom</option>
        </select>
      </div>
      <div class="form__group">
        <label class="form__label" for="country">Disabled</label>
        <input type="text" id="disabled" name="disabled" disabled>
      </div>
      <div class="form__group">
        <label class="form__label" for="price">Input Groups</label>
        <div class="input-group">
          <div class="input-group__addon"><i class="fa fa-bitcoin"></i></div>
          <input type="number" id="price" name="price">
        </div>
        <div class="input-group">
          <input type="number" id="price" name="price">
          <div class="input-group__addon"><i class="fa fa-rocket"></i></div>
        </div>
        <div class="input-group">
          <div class="input-group__addon"><i class="fa fa-bitcoin"></i></div>
          <input type="number" id="price" name="price">
          <div class="input-group__addon"><i class="fa fa-rocket"></i></div>
        </div>
      </div>
      <div class="form__group">
        <span class="form__label">Gender</span>
        <div class="form__controls">
          <label class="radio" for="male">
            <input type="radio" id="male" name="gender" value="male">Male
          </label>
          <label class="radio" for="female">
            <input type="radio" id="female" name="gender" value="female">Female
          </label>
          <label class="radio" for="other">
            <input type="radio" id="other" name="gender" value="other">Other
          </label>
        </div>
      </div>
      <div class="form__group">
        <span class="form__label">Skills</span>
        <div class="form__controls">
          <label class="checkbox" for="html">
            <input type="checkbox" id="html" name="gender" value="html">HTML
          </label>
          <label class="checkbox" for="css">
            <input type="checkbox" id="css" name="gender" value="css">CSS
          </label>
          <label class="checkbox" for="js">
            <input type="checkbox" id="js" name="gender" value="js">JS
          </label>
        </div>
      </div>
      <div class="form__group">
        <button class="btn btn--primary" type="submit">Submit</button>
        <a href="#" class="btn btn--link">Cancel</a>
      </div>
    </fieldset>
  </form>
</div>

<?php get_footer(); ?>