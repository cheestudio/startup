<?php // VARs & optional ACF code
$footer_code = get_field('footer_code', 'option');
$footer_logo = get_field('logo_footer', 'option') ? get_field('logo_footer', 'option') : get_field('logo_desktop', 'option');
$phone       = get_field('company_phone', 'option');
$email       = get_field('company_email', 'option');
$address     = get_field('company_address', 'option'); ?>

</main>

<footer class="footer">
  <div class="container">
    
    <div class="footer--menu">
      <?php include( locate_template('partials/navs/nav-footer.php') ); ?>
    </div>

    <div class="footer--social">
      <?php include( locate_template('partials/elements/social-icons.php') ); ?>
    </div>

    <div class="footer--copyright">
      <p>&copy; <?= date('Y'); ?></p>
    </div>

    <?php if ( $footer_logo ) : ?>
      <div class="footer--logo">
        <a href="#top-of-page" class="footer-brand" title="Go to Top of Page">
          <?php svg( $footer_logo['sizes']['medium'], 'Site Logo' ); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>
</footer>

<?php wp_footer(); ?>

<?php if ( isset($footer_code) ) echo $footer_code; ?>
</body>
</html>
