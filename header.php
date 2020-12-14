<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/button.css" type='text/css'>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/animate.css" type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Acme' rel='stylesheet' type='text/css'>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
<?php wp_head(); ?>
</head>

<!-- カスタマイザーの値を取得 -->
<?php
$options = get_option('header_custom');
$options_color = get_option('color_custom');
$options_font = get_option('font_custom');
?>


<style type="text/css">

body {
  <?php if($options_font['font_select'] === 'column-1'): ?>
    font-family: "游明朝", YuMincho, "ヒラギノ明朝 ProN W3", "Hiragino Mincho ProN", "HG明朝E", "ＭＳ Ｐ明朝", "ＭＳ 明朝", serif;
  <?php elseif($options_font['font_select'] === 'column-2'): ?>
    font-family:"游ゴシック Medium",YuGothic,YuGothicM,"Hiragino Kaku Gothic ProN","Hiragino Kaku Gothic Pro",メイリオ,Meiryo,sans-serif;
  <?php endif; ?>
}


nav, footer {
  <?php if($options_color['main_color']): ?>
    background-color: <?php echo($options_color['main_color']); ?>;
  <?php else: ?>
    background-color: #C20D23;
  <?php endif; ?>   
}

article h2, .side_contents .widgettitle {
  <?php if($options_color['main_color']): ?>
  border-left: solid 10px <?php echo($options_color['main_color']); ?>;
  <?php else: ?>
  border-left: solid 10px #C20D23;
  <?php endif; ?>   
}

article h3 {
  <?php if($options_color['main_color']): ?>
  border-bottom: solid 2px <?php echo($options_color['main_color']); ?>;
  <?php else: ?>
  border-bottom: solid 2px #C20D23;
  <?php endif; ?>   
}

nav a, footer {
  <?php if($options_color['txt_color']): ?>
    color: <?php echo($options_color['txt_color']); ?>;
  <?php else: ?>
    color: #fff;
  <?php endif; ?>      

}

#menu {
  <?php if($options_color['menu_color']): ?>
    background-color: <?php echo($options_color['menu_color']); ?>;
  <?php endif; ?>   

}


.button_link {
  <?php if($options_color['link_btn_color']): ?>
    background-color: <?php echo($options_color['link_btn_color']); ?>;
  <?php else: ?>
    background-color: #C20D23;
  <?php endif; ?>   
}

.button--ujarak::before {
  <?php if($options_color['link_hover_color']): ?>
    background: <?php echo($options_color['link_hover_color']); ?>;
  <?php else: ?>
    background: #ffa07a;
  <?php endif; ?>  
}

nav a:hover {
  <?php if($options_color['link_hover_color']): ?>
    background-color: <?php echo($options_color['link_hover_color']); ?>;
  <?php else: ?>
    background-color: #ffa07a;
  <?php endif; ?>      
}


</style>

<body <?php body_class(); ?>>


  <!-- ヘッダー -->
  <header id="top">
    <div class="container">
			<div id="site_logo">
      <?php if($options['sitelogo_check']): ?>
        <h1><a href="<?php echo home_url(); ?>">
<!--         <img src="<?php //echo get_template_directory_uri();?>/images/logo.png" alt="<?php //bloginfo( 'name' ); ?>">-->
         <img src="<?php echo $options['sitelogo_img']?>" alt="<?php bloginfo( 'name' ); ?>">
        </a>
      </h1>
      <?php else: ?>
      <h1 class="logo_font"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      <p><?php bloginfo( 'description' ); ?></p>
      <?php endif; ?>
      </div>

      <?php if($options['contact_check']): ?>
			<div id="site_reserve">
				<p><?php echo $options['contact_label']?><!--ご予約はこちらから--></p>
				<p class="site_tel"><?php echo $options['contact_info']?><!--TEL:000-000-0000--></p>
			</div>
      <?php endif; ?>
      <div class="clearlist"></div>
    </div>
    <nav>
    <div class="container">
      <!-- スマホ用メニュー表示 -->
      <ul id="spnavi">
        <li id="drop_menu_icon">
          <img src="<?php echo get_template_directory_uri();?>/images/menu_icon.gif" width="30" height="30" alt="">
        </li>
        <li id="drop_menu_text">         
        </li>
      </ul>
      <div id="dorp_menu_hidden">
        <?php wp_nav_menu( 'theme_location=navigation' ); ?>
      </div>
    </div>
    </nav>
  </header>

  