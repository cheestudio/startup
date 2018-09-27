<?php // VARs
$footer_code = get_field( 'footer_code', 'option' ); ?>
</main>

<footer>
	<div class="container">

   <p>&copy; <?php echo date('Y'); ?></p>

 </div>
</footer>

<?php wp_footer(); ?>

<?php if ( $footer_code ) : ?>
  <?php echo $footer_code; ?>
<?php endif; ?>
</body>
</html>
