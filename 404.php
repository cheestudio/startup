<?php get_header(); ?>


<div class="page-404">
  <div class="container">

    <section class="page-404-content">
      <h1>404 - Page Not Found</h1>
      <br>

      <h3>We can't seem to find what you're looking for.</h3>
      <h3>Want to search for the missing page?</h3>
      <br>
      <?php get_template_part('searchform'); ?>
      <hr>

      <h3>Do you think this is a site error?</h3>
      <h3><a href="/contact/">Contact Us</a> and let us know so we can look into it!</h3>
    </section>

  </div>
</div>


<?php get_footer(); ?>
