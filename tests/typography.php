<?php

/**
 * Template name: Test - Typography
 */

function moar_styles() {
  wp_enqueue_style( 'tests', get_template_directory_uri() . '/tests/css/tests.css' );
  wp_enqueue_style( 'icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null, '4.3.0' );
}

add_action( 'wp_enqueue_scripts', 'moar_styles' );

get_header();

?>

<div class="container">
  <section class="section">
    <h2 class="section__title">Headings</h2>
    <h1>Heading 1</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto voluptas non harum, laborum, eos, dolore nisi voluptatum molestiae perspiciatis molestias, culpa distinctio sint vitae ullam reprehenderit quasi incidunt. Alias, cupiditate!</p>
    <h2>Heading 1</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto voluptas non harum, laborum, eos, dolore nisi voluptatum molestiae perspiciatis molestias, culpa distinctio sint vitae ullam reprehenderit quasi incidunt. Alias, cupiditate!</p>
    <h3>Heading 1</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto voluptas non harum, laborum, eos, dolore nisi voluptatum molestiae perspiciatis molestias, culpa distinctio sint vitae ullam reprehenderit quasi incidunt. Alias, cupiditate!</p>
    <h4>Heading 1</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto voluptas non harum, laborum, eos, dolore nisi voluptatum molestiae perspiciatis molestias, culpa distinctio sint vitae ullam reprehenderit quasi incidunt. Alias, cupiditate!</p>
    <h5>Heading 1</h5>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto voluptas non harum, laborum, eos, dolore nisi voluptatum molestiae perspiciatis molestias, culpa distinctio sint vitae ullam reprehenderit quasi incidunt. Alias, cupiditate!</p>
    <h6>Heading 1</h6>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto voluptas non harum, laborum, eos, dolore nisi voluptatum molestiae perspiciatis molestias, culpa distinctio sint vitae ullam reprehenderit quasi incidunt. Alias, cupiditate!</p>
  </section>
  <section class="section">
    <h2 class="section__title">Lists</h2>
    <ul>
      <li>Lorem ipsum dolor sit amet, consectetur.</li>
      <li>Quae fugiat aperiam numquam eos, maxime.</li>
      <li>
        Voluptates alias dolore, culpa nobis sed.
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur.</li>
        </ul>
        <ul>
          <li>Illum dolorum, magni veritatis aperiam provident?</li>
        </ul>
        <ul>
          <li>Distinctio adipisci veritatis placeat neque, expedita?</li>
        </ul>
      </li>
      <li>Ullam labore repellat explicabo, eum illo!</li>
      <li>Maxime facilis similique praesentium, fugiat modi.</li>
      <li>Perferendis cum ea, adipisci non odio.</li>
      <li>Eum dolorum itaque laborum, ea voluptas?</li>
      <li>Quis, eos alias recusandae adipisci temporibus.</li>
    </ul>
    <ol>
      <li>Lorem ipsum dolor sit amet, consectetur.</li>
      <li>Quae fugiat aperiam numquam eos, maxime.</li>
      <li>
        Voluptates alias dolore, culpa nobis sed.
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur.</li>
        </ul>
        <ul>
          <li>Illum dolorum, magni veritatis aperiam provident?</li>
        </ul>
        <ul>
          <li>Distinctio adipisci veritatis placeat neque, expedita?</li>
        </ul>
      </li>
      <li>Ullam labore repellat explicabo, eum illo!</li>
      <li>Maxime facilis similique praesentium, fugiat modi.</li>
      <li>Perferendis cum ea, adipisci non odio.</li>
      <li>Eum dolorum itaque laborum, ea voluptas?</li>
      <li>Quis, eos alias recusandae adipisci temporibus.</li>
    </ol>
    <ul class="list-unstyled">
      <li>Lorem ipsum dolor sit amet, consectetur.</li>
      <li>Quae fugiat aperiam numquam eos, maxime.</li>
      <li>Voluptates alias dolore, culpa nobis sed.</li>
      <li>Ullam labore repellat explicabo, eum illo!</li>
      <li>Maxime facilis similique praesentium, fugiat modi.</li>
      <li>Perferendis cum ea, adipisci non odio.</li>
      <li>Eum dolorum itaque laborum, ea voluptas?</li>
      <li>Quis, eos alias recusandae adipisci temporibus.</li>
    </ul>
  </section>
</div>

<?php get_footer(); ?>