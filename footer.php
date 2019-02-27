<?php // VARs
$footer_code = get_field('footer_code', 'option'); ?>
</main>

<footer>
	<div class="container">

   <div class="copyright">
     <p>&copy; <?php echo date('Y'); ?></p>
   </div>

 </div>
</footer>

<?php wp_footer(); ?>

<?php if ( $footer_code ) echo $footer_code; ?>
</body>
</html>
