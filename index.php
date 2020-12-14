<?php get_header(); ?>

<main>
<div class="container">

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


<div class="contents">
      <div class="main_contents contents_padding">

    <?php if( is_category() ): ?>
      <h1 class="archive-title">
        <i class="fa fa-folder-open"></i>
        「<?php single_cat_title(); ?>」に関する記事
      </h1>
    <?php endif; ?>

    <?php if(is_month()): ?>
      <h1 class="archive-title">
        <i class="fa fa-clock-o"></i>
        <?php echo get_the_date( 'Y年n月' ); ?>に投稿した記事
      </h1>
    <?php endif; ?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

      <article <?php post_class(); ?>>

        <?php if( is_single() ): ?>
          <h1><?php the_title(); ?></h1>
        <?php else: ?>
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>

        <div class="postinfo">
          <time datetime="<?php echo get_the_date('Y-m-d')?>">
            <i class="fa fa-clock-o"></i>
            <?php echo get_the_date(); ?>
          </time>

          <span class="postcat">
            <i class="fa fa-folder-open"></i>
            <?php the_category( ', ' ); ?>
          </span>

          <span class="postcom">
            <i class="fa fa-comment"></i>
            <a href="<?php comments_link(); ?>">
            <?php comments_number(
                        'コメント',
                        'コメント(1件)',
                        'コメント(%件)'
          ); ?>
          </a>
          </span>
        </div>

        <?php if (is_single() ): ?>
          <?php the_content(); ?>
        <?php else: ?>
          <div class="blog_list_except">
            <?php if( has_post_thumbnail() ): ?>
              <!-- アイキャッチ画像ありの場合 -->
              <div class="blog_list_eyecatch">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
              </div>
              <div class="blog_list_info toppage_text_style">
                <?php the_excerpt(); ?>

              </div>
            <?php else: ?>
              <!-- アイキャッチ画像なしの場合 -->
              <div class="toppage_text_style">
              <?php the_excerpt(); ?>
              </div>
            <?php endif; ?>
            <div class="clearlist">
            </div>

          </div>
          <div class="button button--ujarak button--border-thin button--text-thick button_link">
            <a href="<?php the_permalink(); ?>">
              続きを読む&nbsp;<i class="fa fa-chevron-right"></i></a>
          </div>

        <?php endif; ?>

        <?php if( is_single() ): ?>
          <div class="pagenav">
            <span class="old">
              <?php previous_post_link(
              '%link',
              '<i class="fa fa-chevron-circle-left"></i> %title'
            ); ?>
          </span>

          <span class="new">
            <?php next_post_link(
            '%link',
            '%title <i class="fa fa-chevron-circle-right"></i>'
          ); ?>
        </span>
      </div>
    <?php endif; ?>

    <?php comments_template(); ?>
  </article>

  <?php endwhile; endif; ?>

  <?php if ( $wp_query->max_num_pages > 1): ?>
    <div class="pagenav">
      <span class="old">
        <?php next_posts_link('<i class="fa fa-chevron-circle-left"></i> 古い記事 '); ?>
      </span>

      <span class="new">
        <?php previous_posts_link('<i class="fa fa-chevron-circle-right"></i> 新しい記事 '); ?>
      </span>
    </div>

  <?php endif; ?>
  </div> <!-- main_contents -->

  <div class="side_contents contents_padding">
    	<?php get_sidebar(); ?>

  </div> <!-- side_contents -->

  </div> <!-- contents -->
  </div> <!--- container -->
</main>

<?php get_footer(); ?>
