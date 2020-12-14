<?php get_header(); ?>

    <div class="container contents_padding">

  <!-- パンくずリスト -->
  <?php if(!is_front_page()): ?>
  <div class="breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">
  <div class="container">
  <?php if( !is_front_page() ): ?>
  <?php if (function_exists('bcn_display')) { bcn_display(); } ?>
  <?php endif; ?>
  </div>
  </div>
  <?php endif; ?>


    <?php if(have_posts()): while(have_posts()): the_post(); ?>

      <article <?php post_class(); ?>>

        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>


  </article>

  <?php endwhile; endif; ?>

  </div> <!--- container -->

<?php get_footer(); ?>
