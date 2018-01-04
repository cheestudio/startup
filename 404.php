<?php get_header(); ?>


<div class="page-404">
  <div class="container">

    <h1>404 - Page Not Found</h1>

    <section class="404-error-content">
      <h2>We can't seem to find what you're looking for.</h2>
      <p>Want to search for the missing page?</p>
      <?php get_template_part('searchform'); ?>
      <hr>
      <h3>Do you think this is a site error?</h3>
      <p><a href="/contact">Contact Us</a> and let us know so we can look into it!</p>
    </section>

  </div>
</div>


<?php get_footer(); ?>
