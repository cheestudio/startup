<?php // VARs & optional ACF code
if ( function_exists('get_field') ) :
  $footer_code = get_field('footer_code', 'option');
  $phone       = get_field('company_phone', 'option');
  $email       = get_field('company_email', 'option');
  $address     = get_field('company_address', 'option');
endif; ?>

</main>

<footer>
	<div class="container">

   <div class="copyright">
     <p>&copy; <?= date('Y'); ?></p>
   </div>

  <div class="social-icons">
    <?php include( locate_template('partials/social-icons.php') ); ?>
  </div>

 </div>
</footer>

<?php wp_footer(); ?>

<?php if ( isset($footer_code) ) echo $footer_code; ?>
</body>
</html>
