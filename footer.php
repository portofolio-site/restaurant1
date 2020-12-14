<?php
$options = get_option('footer_custom');
$options_header = get_option('footer_custom');
?>

<!-- PageTopボタン -->
<p class="page-top">
  <a href="#top">
    <img src="<?php echo get_template_directory_uri();?>/images/page_top.gif" alt="ページトップボタン">
  </a>
</p>

<footer>
	<?php if($options['sitelogo_img']): ?>
		<img src="<?php echo $options['sitelogo_img']?>" alt="サイトロゴ">
		<!--<img src="<?php //echo get_template_directory_uri();?>/images/logo2.png">-->
	<?php else: ?>
		<?php bloginfo( 'name' ); ?>
	<?php endif; ?>
		<p>
			Copyright(c) inomacreate.com
		</p>
	</footer>

</body>
</html>
