<?php get_header(); ?>

<!-- カスタマイザーの値を取得 -->
<?php
$options = get_option('menu_page_custom');
?>

<main>
		<!-- メインイメージエリア -->
		<section id="main_image">
    <?php if($options['menu_page_img']): ?>
      <img src="<?php echo $options['menu_page_img']?>" alt="メインイメージ">
      <!--<img src="<?php //echo get_template_directory_uri();?>/images//top_image.png">-->    
    <?php endif; ?>
		</section>

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


    <div class="container">
    <!-- ■■■■■■ 記事ループ スタート ■■■■■■■ -->
    <!--<div class="menu_content">-->
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <article <?php post_class(); ?>>
        <!-- 記事タイトル -->
      	<h1><?php the_title(); ?></h1>
  
        <!-- 記事本文 -->
        <?php the_content(); ?>
 
      </article>
    <?php endwhile; endif; ?>
    <!-- ■■■■■■ 記事ループ エンド ■■■■■■■ -->
<!--    </div> -->
  </div>

<?php get_footer(); ?>

