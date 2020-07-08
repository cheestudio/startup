<?php // Social Icons
$icons = get_field('social_icons_rep', 'option'); ?>

<?php if ( $icons ) : ?>
  <div class="social-icons">
    <ul>
      <?php foreach ( $icons as $icon ) :
        $title = $icon['title'];
        $link  = $icon['link'];
        $class = $icon['class']; ?>
        
        <li>
          <a 
          href   = "<?= $link; ?>"
          class  = "icon"
          title  = "Link to <?= $title; ?>"
          target = "_blank"
          ><?= $class; ?></a>
        </li>
        
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
