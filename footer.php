<?php // VARs & optional ACF code
  if ( function_exists('get_field') ) :
    $footer_code = get_field('footer_code', 'option'); 
  endif; ?>

</main>

<footer>
	<div class="container">

   <div class="copyright">
     <p>&copy; <?= date('Y'); ?></p>
   </div>

 </div>
</footer>

<?php wp_footer(); ?>

<?php if ( isset($footer_code) ) echo $footer_code; ?>
</body>
</html>
