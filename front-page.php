<?php get_header(); ?>
<!-- カスタマイザーの値を取得 -->
<?php
$options = get_option('toppage_custom');
$options_header = get_option('header_custom');
?>

  <main>
		<!-- メインイメージエリア -->
		<?php //if($options['main_image_disp']): ?>
		<section id="main_image">
			<?php if($options['main_image']): ?>
				<img src="<?php echo $options['main_image']?>" alt="メインイメージ">
				<!--<img src="<?php //echo get_template_directory_uri();?>/images//top_image.png">-->
			<?php endif; ?>
		</section>
		<?php //endif; ?>

		<!-- コンセプトエリア -->
		<?php if($options['concept_disp']): ?>
		<section id="concept">
			<div class="container">
				<?php if($options['concept_logo_img']): ?>
					<img id="concept_logo" src="<?php echo $options['concept_logo_img']?>" alt="コンセプトロゴ画像">
					<!--<img id="concept_logo" src="<?php //echo get_template_directory_uri();?>/images/concept_image.png">-->
				<?php endif; ?>
				<h2>
				<?php echo nl2br($options['concept_title']); ?>
				<!--コンセプト-->
				</h2>
				<?php if($options['concept_image']): ?>
					<!--<img id="concept_icon" src="<?php echo get_template_directory_uri();?>/images/concept_image2.png">-->
					<img id="concept_icon" src="<?php echo $options['concept_image']?>" alt="コンセプトロゴ画像">
				<?php endif; ?>
				<p><?php echo nl2br($options['first_txt']);?></p>
				<!--
				<p>本場イタリアで大人気の本格イタリア料理店がついに日本上陸</br>
当店自慢のテラスで極上のイタリア料理とお酒をお楽しみください。</p>-->
			</div>
			<?php if($options['concept_link']): ?>
			<div class="button button--ujarak button--border-thin button--text-thick button_link">
		        <a href="<?php echo home_url();?>/concept/">
				<?php echo nl2br($options['concept_link']); ?><!--コンセプト詳細-->&nbsp;<i class="fa fa-external-link" aria-hidden="true"></i>
        		</a>
      		</div>
			<?php endif; ?>

		</section>
		<?php endif; ?>

		<!-- メニューエリア -->
		<?php if($options['menu_disp']): ?>
		<section id="menu">
		<div class="container">
		<?php if($options['menu_logo_img']): ?>
			<img id="menu_logo" src="<?php echo $options['menu_logo_img']?>" alt="メニューロゴ画像">
			<!--<img id="menu_logo" src="<?php //echo get_template_directory_uri();?>/images/menu_image.png">-->
		<?php endif; ?>
			<h2><?php echo nl2br($options['menu_title']); ?><!--メニュー--></h2>
				<div class="menu_box">
					<img src="<?php echo $options['menu1_img']?>" alt="メニューピックアップ画像1">
					<!--<img src="<?php //echo get_template_directory_uri();?>/images/menu_pasta.jpg">-->
					<h3><?php echo nl2br($options['menu1_title']); ?><!--パスタ--></h3>
					<p><?php echo nl2br($options['menu1_txt']);?></p>
					<!--
					<ul>
						<li>ペペロンチーノ</li>
						<li>海鮮トマトソースパスタ</li>
						<li>本格イタリアンミートソース</li>
						<li>ベーコンとほうれん草のクリームパスタ</li>
					</ul>
					-->
				</div>
				<div class="menu_box">
					<img src="<?php echo $options['menu2_img']?>" alt="メニューピックアップ画像2">
					<!--<img src="<?php //echo get_template_directory_uri();?>/images/menu_piza.jpg">-->
					<h3><?php echo nl2br($options['menu2_title']); ?><!--ピザ--></h3>
					<p><?php echo nl2br($options['menu2_txt']);?></p>
					<!--
					<ul>
						<li>マルゲリータ</li>
						<li>シーフード</li>
						<li>コーンポテト</li>
						<li>エビベーコン</li>
					</ul>
					-->
				</div>

				<div class="menu_box">
					<img src="<?php echo $options['menu3_img']?>" alt="メニューピックアップ画像3">
					<!--<img src="<?php //echo get_template_directory_uri();?>/images/menu_drink.jpg">-->
					<h3><?php echo nl2br($options['menu3_title']); ?><!--ドリンク--></h3>
					<p><?php echo nl2br($options['menu3_txt']);?></p>
					<!--
					<ul>
						<li>生ビール</li>
						<li>ジンジャーエール</li>
						<li>赤ワイン/白ワイン</li>
						<li>カシスオレンジ</li>
						<li>角ハイボール</li>
					</ul>
					-->
				</div>
				<div class="clearlist"></div>

				<!-- Linkボタン -->
				<?php if($options['menu_link']): ?>
				<div class="button button--ujarak button--border-thin button--text-thick button_link">
					<a href="<?php echo home_url();?>/menu/">
					<?php echo nl2br($options['menu_link']); ?><!--メニュー詳細はこちらから-->&nbsp;<i class="fa fa-external-link" aria-hidden="true"></i>
					</a>
				</div>
				<?php endif; ?>

		</div>
		</section>
		<?php endif; ?>

		<!-- Infomationエリア -->
		<?php if($options['infomation_disp']): ?>
		<section id="infomation">
		<div class="container">
		<?php if($options['infomation_logo_img']): ?>
			<img id="info_logo" src="<?php echo $options['infomation_logo_img']?>" alt="お知らせロゴ画像">
			<!--<img id="info_logo" src="<?php //echo get_template_directory_uri();?>/images/info_image.png">-->
		<?php endif; ?>
			<h2><?php echo nl2br($options['infomation_title']); ?><!--お知らせ--></h2>

			<ul class="article_list">
    <!-- 最新記事3件表示 -->
    <?php $the_query = new WP_Query(array('orderby'=>'date', 'posts_per_page' => 3)); ?>
    <?php if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
    	<li class="article_excerpt">
    			<div <?php post_class(); ?>>
    				<div class="article_eyecatch">
    					<a href="<?php the_permalink(); ?>">
    			<?php if( has_post_thumbnail() ): ?>
    				<?php the_post_thumbnail( array( 426, 284 ) ); ?>
    			<?php else: ?>
    				<!-- アイキャッチ画像が無い記事は、NO IMAGEを表示 -->
    				<img src="<?php echo get_template_directory_uri();?>/images/no-image.jpg" alt="No Image">
    			<?php endif; ?>
    				</a>
    			</div>

    			<div class="article_info">
    				<!-- タイトル -->
    				<div class="article_title"><?php the_title(); ?></div>
    				<!-- カテゴリ/日付 -->
    				<div class="article_meta">
    					<!-- 日付 -->
    					<span class="article_date"><?php echo get_the_date('Y-m-d')?></span>

    					<!-- カテゴリ -->
    					<span class="article_category">
    					<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
    					</span>
    					<div class="article_txt">
    					<?php the_excerpt(); ?>
    					</div>
    				</div>

    			</div>
    			<div class="clearlist">
    			</div>

    		</div>
    	</li>
    <?php endwhile; endif; ?>


    <?php wp_reset_postdata(); ?>
    </ul>

	<?php if($options['infomation_link']): ?>
	<div class="button button--ujarak button--border-thin button--text-thick button_link">
        <a href="<?php echo home_url();?>/infomation">
		<?php echo nl2br($options['infomation_link']); ?><!--お知らせ一覧はこちらから-->&nbsp;<i class="fa fa-external-link" aria-hidden="true"></i>
        </a>
      </div>
	<?php endif; ?>


		</section>
		<?php endif; ?>

		<!-- アクセスエリア -->
		<?php if($options['access_disp']): ?>
		<section id="access">
			<div class="container">
				<?php if($options['access_logo_img']): ?>
					<img id="access_logo" src="<?php echo $options['access_logo_img']?>" alt="アクセスロゴ画像">
					<!--<img id="access_logo" src="<?php //echo get_template_directory_uri();?>/images/access_image.png">-->
				<?php endif; ?>	
				<h2><?php echo nl2br($options['access_title']); ?><!--アクセス--></h2>
				<div id="access_map">
					<?php echo nl2br($options['map_link']);?>
					<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13295.027986794428!2d130.46191626920165!3d33.585658090167506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sjp!4v1561282916140!5m2!1sja!2sjp" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
				</div>
				<div id="access_txt">
					<p><?php echo nl2br($options['access_txt']);?></p>
					<!--
					<p>
						〒000-0000 福岡県福岡市XXXXXXXXXXXXXXXXXXXXXX
					</p>
					<p>
						TEL:000-0000-0000
					</p>
					<p>
						営業時間：11:00〜15:00/17:30〜23:00
					</p>
					<p>
						定休日：火曜日
					</p>
					-->
				</div>
				<div class="clearlist"></div>

				<?php if($options_header['contact_check']): ?>
				<div id="access_reserve">
					<p><?php echo $options_header['contact_label']?><!--ご予約はこちらから--></p>
					<p class="site_tel"><?php echo $options_header['contact_info']?><!--TEL:000-000-0000--></p>
				</div>
				<?php endif; ?>

				<?php if($options['contact_link']): ?>
				<div class="button button--ujarak button--border-thin button--text-thick button_link button_contact">
		        <a href="<?php echo home_url();?>/contact/">
				<?php echo nl2br($options['contact_link']); ?><!--お問い合わせはこちらから-->&nbsp;<i class="fa fa-external-link" aria-hidden="true"></i>
        		</a>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>
</main>

<?php get_footer(); ?>
