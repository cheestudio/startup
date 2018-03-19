<?php

/* Template Name: Home
========================================================= */ ?> 
<?php get_header(); ?>


<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content();?>
  <?php endwhile; ?>
<?php endif;?>
<?php wp_reset_query(); ?>


<!-- PLACEHOLDER -->
<div class="DELETE-ME">
  <div class="container">

    <hr>
    <h1>Heading #1</h1>
    <h2>Heading #2</h2>
    <h3>Heading #3</h3>
    <h4>Heading #4</h4>
    <h5>Heading #5</h5>
    <h6>Heading #6</h6>
    <ul>
      <li>Unordered list item 1</li>
      <li>Unordered list item 2</li>
      <li>Unordered list item 3</li>
    </ul>
    <ol>
      <li>Ordered list item 1</li>
      <li>Ordered list item 2</li>
      <li>Ordered list item 3</li>
    </ol>
    <p>Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor lectus nibh.</p>
    <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat.</p>
    <p>Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus.</p>
    <br>
    <p><strong>Bold Bold Bold Bold Bold </strong></p>
    <p><em>Italics Italics Italics Italics Italics</em></p>

    <a href="">Link 1</a>
    <a href="">Link 2</a>
    <a href="">Link 3</a>
    <hr>
  </div>
</div>
<!-- PLACEHOLDER END -->


<?php get_footer(); ?>
