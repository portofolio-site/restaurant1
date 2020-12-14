<?php

// スクリプト(jQuery)読み込み
function add_script(){
  wp_enqueue_script('my_script', get_template_directory_uri() . '/js/my_script.js', array('jquery'), '', false);
}
add_action( 'wp_enqueue_scripts', 'add_script' );

// ウィジェット
register_sidebar();

// カスタムメニュー
register_nav_menu( 'navigation', 'ナビゲーション' );

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );

// カテゴリの投稿数をaタグの中に
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}

// アーカイブの投稿数をaタグの中に
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}


add_action( 'customize_register', 'theme_customize_register' );

// カスタマイザーテキストボックス対応
if(class_exists('WP_Customize_Control')):
	class EX_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="10" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
endif;


function theme_customize_register($wp_customize) {

  /* ==== ヘッダーカスタム ==== */
  /* セクション追加 */
  $wp_customize->add_section( 'header_custom', array(
    'title' =>'ヘッダーカスタム',
    'priority' => 100,
  ));

  /* ヘッダーカスタム：サイトロゴ使用表示 */
  $wp_customize->add_setting('header_custom[sitelogo_check]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'header_custom[sitelogo_check]', array(
  'settings' => 'header_custom[sitelogo_check]',
  'label' => 'タイトルをサイトロゴで表示させる',
  'section' => 'header_custom',
  'type' => 'checkbox',
  ));

  /* ヘッダーカスタム：サイトロゴ画像選択 */
  $wp_customize->add_setting('header_custom[sitelogo_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_custom[sitelogo_img]', array(
    'settings' => 'header_custom[sitelogo_img]',
    'label' => '画像',
    'section' => 'header_custom',
  )));
endif;

  /* ヘッダーカスタム：問い合わせ情報表示「チェックボックス」 */
  $wp_customize->add_setting('header_custom[contact_check]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'header_custom[contact_check]', array(
  'settings' => 'header_custom[contact_check]',
  'label' => '問い合わせ情報を表示する',
  'section' => 'header_custom',
  'type' => 'checkbox',
  ));

  /* ヘッダーカスタム：問い合わせ項目名 */
  $wp_customize->add_setting('header_custom[contact_label]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'header_custom[contact_label]', array(
    'settings' => 'header_custom[contact_label]',
    'label' => '項目名',
    'section' => 'header_custom',
    'type' => 'text',
  ));

  /* ヘッダーカスタム：問い合わせ情報（番号など） */
  $wp_customize->add_setting('header_custom[contact_info]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'header_custom[contact_info]', array(
    'settings' => 'header_custom[contact_info]',
    'label' => '情報（番号など）',
    'section' => 'header_custom',
    'type' => 'text',
  ));

  /* ==== トップページカスタム ==== */
  /* セクション追加 */
  $wp_customize->add_section( 'toppage_custom', array(
    'title' =>'トップページカスタム',
    'priority' => 101,
  ));

  /* トップページカスタム：メインイメージ表示／非表示 */
  /*
  $wp_customize->add_setting('toppage_custom[main_image_disp]', array(
    'type' => 'option',
  ));
  $wp_customize->add_control( 'toppage_custom[main_image_disp]', array(
    'settings' => 'toppage_custom[main_image_disp]',
    'label' => 'メインイメージを表示する',
    'section' => 'toppage_custom',
    'type' => 'checkbox',
    ));
  */

  /* トップページカスタム：メインイメージ画像選択 */
  $wp_customize->add_setting('toppage_custom[main_image]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[first_img]', array(
    'settings' => 'toppage_custom[main_image]',
    'label' => 'メインイメージ画像',
    'section' => 'toppage_custom',
  )));
endif;

  /* トップページカスタム：コンセプトエリア表示／非表示 */
  $wp_customize->add_setting('toppage_custom[concept_disp]', array(
    'type' => 'option',
  ));
  $wp_customize->add_control( 'toppage_custom[concept_disp]', array(
    'settings' => 'toppage_custom[concept_disp]',
    'label' => 'コンセプトエリアを表示する',
    'section' => 'toppage_custom',
    'type' => 'checkbox',
    ));

  /* トップページカスタム：コンセプトロゴ */
  $wp_customize->add_setting('toppage_custom[concept_logo_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[concept_logo_img]', array(
    'settings' => 'toppage_custom[concept_logo_img]',
    'label' => 'コンセプトロゴ画像',
    'section' => 'toppage_custom',
  )));
endif;

  /* トップページカスタム：コンセプトタイトル */
  $wp_customize->add_setting('toppage_custom[concept_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[concept_title]', array(
    'settings' => 'toppage_custom[concept_title]',
    'label' => 'コンセプトタイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));

  /* ヘッダーカスタム：サイトロゴ画像選択 */
  $wp_customize->add_setting('toppage_custom[concept_image]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[concept_image]', array(
    'settings' => 'toppage_custom[concept_image]',
    'label' => 'コンセプトアイコン画像',
    'section' => 'toppage_custom',
  )));
endif;

  /* トップページカスタム：ファーストコンテンツ文章 */
  if(class_exists('EX_Customize_Textarea_Control')):

    $wp_customize->add_setting('toppage_custom[first_txt]', array(
      'type' => 'option',
    ));

    $wp_customize->add_control( new EX_Customize_Textarea_Control( $wp_customize, 'toppage_custom[first_txt]', array(
      'settings' => 'toppage_custom[first_txt]',
      'label' => 'コンセプト文章',
      'section' => 'toppage_custom',
      'type' => 'text',
    )));
  endif;

  /* トップページカスタム：コンセプトリンクテキスト */
  $wp_customize->add_setting('toppage_custom[concept_link]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[concept_link]', array(
    'settings' => 'toppage_custom[concept_link]',
    'label' => 'コンセプトリンクテキスト',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));


  /* トップページカスタム：メニューエリア表示／非表示 */
  $wp_customize->add_setting('toppage_custom[menu_disp]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[menu_disp]', array(
    'settings' => 'toppage_custom[menu_disp]',
    'label' => 'メニューエリアを表示する',
    'section' => 'toppage_custom',
    'type' => 'checkbox',
  )); 

  /* トップページカスタム：メニューロゴ */
  $wp_customize->add_setting('toppage_custom[menu_logo_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[menu_logo_img]', array(
    'settings' => 'toppage_custom[menu_logo_img]',
    'label' => 'メニューロゴ画像',
    'section' => 'toppage_custom',
  )));
endif;

  /* トップページカスタム：メニュータイトル */
  $wp_customize->add_setting('toppage_custom[menu_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[menu_title]', array(
    'settings' => 'toppage_custom[menu_title]',
    'label' => 'メニュータイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));    

  /* トップページカスタム：メニューピックアップ画像１ */
  $wp_customize->add_setting('toppage_custom[menu1_img]', array(
    'type' => 'option',
  ));

  if(class_exists('WP_Customize_Image_Control')):
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[menu1_img]', array(
      'settings' => 'toppage_custom[menu1_img]',
      'label' => 'メニューピックアップ画像1',
      'section' => 'toppage_custom',
    )));
  endif;

  /* トップページカスタム：メニューピックアップ画像１ */
  $wp_customize->add_setting('toppage_custom[menu2_img]', array(
    'type' => 'option',
  ));

  if(class_exists('WP_Customize_Image_Control')):
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[menu2_img]', array(
      'settings' => 'toppage_custom[menu2_img]',
      'label' => 'メニューピックアップ画像2',
      'section' => 'toppage_custom',
    )));
  endif;

  /* トップページカスタム：メニューピックアップ画像１ */
  $wp_customize->add_setting('toppage_custom[menu3_img]', array(
    'type' => 'option',
  ));

  if(class_exists('WP_Customize_Image_Control')):
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[menu3_img]', array(
      'settings' => 'toppage_custom[menu3_img]',
      'label' => 'メニューピックアップ画像3',
      'section' => 'toppage_custom',
    )));
  endif;

  /* トップページカスタム：メニューピックアップ1タイトル */
  $wp_customize->add_setting('toppage_custom[menu1_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[menu1_title]', array(
    'settings' => 'toppage_custom[menu1_title]',
    'label' => 'メニューピックアップ1タイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));  

  /* トップページカスタム：メニューピックアップ2タイトル */
  $wp_customize->add_setting('toppage_custom[menu2_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[menu2_title]', array(
    'settings' => 'toppage_custom[menu2_title]',
    'label' => 'メニューピックアップ2タイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));  

  /* トップページカスタム：メニューピックアップ3タイトル */
  $wp_customize->add_setting('toppage_custom[menu3_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[menu3_title]', array(
    'settings' => 'toppage_custom[menu3_title]',
    'label' => 'メニューピックアップ3タイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));    

  /* トップページカスタム：メニュー１文章 */
  if(class_exists('EX_Customize_Textarea_Control')):

    $wp_customize->add_setting('toppage_custom[menu1_txt]', array(
      'type' => 'option',
    ));

    $wp_customize->add_control( new EX_Customize_Textarea_Control( $wp_customize, 'toppage_custom[menu1_txt]', array(
      'settings' => 'toppage_custom[menu1_txt]',
      'label' => 'メニュー1文章',
      'section' => 'toppage_custom',
      'type' => 'text',
    )));
  endif;

  /* トップページカスタム：メニュー2文章 */
  if(class_exists('EX_Customize_Textarea_Control')):

    $wp_customize->add_setting('toppage_custom[menu2_txt]', array(
      'type' => 'option',
    ));

    $wp_customize->add_control( new EX_Customize_Textarea_Control( $wp_customize, 'toppage_custom[menu2_txt]', array(
      'settings' => 'toppage_custom[menu2_txt]',
      'label' => 'メニュー2文章',
      'section' => 'toppage_custom',
      'type' => 'text',
    )));
  endif;

  /* トップページカスタム：メニュー3文章 */
  if(class_exists('EX_Customize_Textarea_Control')):

    $wp_customize->add_setting('toppage_custom[menu3_txt]', array(
      'type' => 'option',
    ));

    $wp_customize->add_control( new EX_Customize_Textarea_Control( $wp_customize, 'toppage_custom[menu3_txt]', array(
      'settings' => 'toppage_custom[menu3_txt]',
      'label' => 'メニュー3文章',
      'section' => 'toppage_custom',
      'type' => 'text',
    )));
  endif;  

  /* トップページカスタム：メニューリンクテキスト */
  $wp_customize->add_setting('toppage_custom[menu_link]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[menu_link]', array(
    'settings' => 'toppage_custom[menu_link]',
    'label' => 'メニューリンクテキスト',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));


  /* トップページカスタム：お知らせ表示／非表示 */
  $wp_customize->add_setting('toppage_custom[infomation_disp]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[infomation_disp]', array(
    'settings' => 'toppage_custom[infomation_disp]',
    'label' => 'お知らせエリアを表示する',
    'section' => 'toppage_custom',
    'type' => 'checkbox',
  )); 

  /* トップページカスタム：お知らせロゴ */
  $wp_customize->add_setting('toppage_custom[infomation_logo_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[infomation_logo_img]', array(
    'settings' => 'toppage_custom[infomation_logo_img]',
    'label' => 'お知らせロゴ画像',
    'section' => 'toppage_custom',
  )));
endif;

  /* トップページカスタム：お知らせタイトル */
  $wp_customize->add_setting('toppage_custom[infomation_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[infomation_title]', array(
    'settings' => 'toppage_custom[infomation_title]',
    'label' => 'お知らせタイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));    


    /* トップページカスタム：お知らせリンクテキスト */
    $wp_customize->add_setting('toppage_custom[infomation_link]', array(
      'type' => 'option',
    ));
  
    $wp_customize->add_control( 'toppage_custom[infomation_link]', array(
      'settings' => 'toppage_custom[infomation_link]',
      'label' => 'お知らせリンクテキスト',
      'section' => 'toppage_custom',
      'type' => 'text',
    ));


  /* トップページカスタム：アクセス表示／非表示 */
  $wp_customize->add_setting('toppage_custom[access_disp]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[access_disp]', array(
    'settings' => 'toppage_custom[access_disp]',
    'label' => 'アクセスエリアを表示する',
    'section' => 'toppage_custom',
    'type' => 'checkbox',
  )); 

  /* トップページカスタム：アクセスロゴ */
  $wp_customize->add_setting('toppage_custom[access_logo_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'toppage_custom[access_logo_img]', array(
    'settings' => 'toppage_custom[access_logo_img]',
    'label' => 'アクセスロゴ画像',
    'section' => 'toppage_custom',
  )));
endif;

  /* トップページカスタム：アクセスタイトル */
  $wp_customize->add_setting('toppage_custom[access_title]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'toppage_custom[access_title]', array(
    'settings' => 'toppage_custom[access_title]',
    'label' => 'アクセスタイトル',
    'section' => 'toppage_custom',
    'type' => 'text',
  ));  


    /* トップページカスタム：Google Mapリンク */
    if(class_exists('EX_Customize_Textarea_Control')):

      $wp_customize->add_setting('toppage_custom[map_link]', array(
        'type' => 'option',
      ));
  
      $wp_customize->add_control( new EX_Customize_Textarea_Control( $wp_customize, 'toppage_custom[map_link]', array(
        'settings' => 'toppage_custom[map_link]',
        'label' => '地図リンク',
        'section' => 'toppage_custom',
        'type' => 'text',
      )));
    endif;  

    /* トップページカスタム：Google アクセス情報 */
    if(class_exists('EX_Customize_Textarea_Control')):

      $wp_customize->add_setting('toppage_custom[access_txt]', array(
        'type' => 'option',
      ));
  
      $wp_customize->add_control( new EX_Customize_Textarea_Control( $wp_customize, 'toppage_custom[access_txt]', array(
        'settings' => 'toppage_custom[access_txt]',
        'label' => 'アクセス情報',
        'section' => 'toppage_custom',
        'type' => 'text',
      )));
    endif;  


    /* トップページカスタム：お問い合わせリンクテキスト */
    $wp_customize->add_setting('toppage_custom[contact_link]', array(
      'type' => 'option',
    ));
  
    $wp_customize->add_control( 'toppage_custom[contact_link]', array(
      'settings' => 'toppage_custom[contact_link]',
      'label' => 'お問い合わせリンクテキスト',
      'section' => 'toppage_custom',
      'type' => 'text',
    ));
    

 /* ==== フッターカスタム ==== */
  /* セクション追加 */
  $wp_customize->add_section( 'footer_custom', array(
    'title' =>'フッターカスタム',
    'priority' => 102,
  ));

  /* ヘッダーカスタム：サイトロゴ画像選択 */
  $wp_customize->add_setting('footer_custom[sitelogo_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_custom[sitelogo_img]', array(
    'settings' => 'footer_custom[sitelogo_img]',
    'label' => '画像',
    'section' => 'footer_custom',
  )));
endif;


/* ====== カラーカスタム ===== */
  /* セクション追加 */
  $wp_customize->add_section( 'color_custom', array(
    'title' =>'カラーカスタム',
    'priority' => 103,
  ));

  /* メインカラー追加 */
$wp_customize->add_setting( 'color_custom[main_color]', array(
  'type' => 'option'
));
$wp_customize->add_control( new WP_Customize_Color_Control(
  $wp_customize, 'color_custom[main_color]',
  array(
      'settings' => 'color_custom[main_color]',
      'label' => 'メインカラー',
      'section' => 'color_custom',
)));


  /* ナビ、フッター文字カラー追加 */
  $wp_customize->add_setting( 'color_custom[txt_color]', array(
    'type' => 'option'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'color_custom[txt_color]',
    array(
        'settings' => 'color_custom[txt_color]',
        'label' => 'ナビ、フッター文字カラー',
        'section' => 'color_custom',
  )));

  /* コンセプト背景カラー追加 */
  $wp_customize->add_setting( 'color_custom[menu_color]', array(
    'type' => 'option'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'color_custom[menu_color]',
    array(
        'settings' => 'color_custom[menu_color]',
        'label' => 'メニュー背景カラー',
        'section' => 'color_custom',
  )));

  /* リンクボタンカラー追加 */
  $wp_customize->add_setting( 'color_custom[link_btn_color]', array(
    'type' => 'option'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'color_custom[link_btn_color]',
    array(
        'settings' => 'color_custom[link_btn_color]',
        'label' => 'リンクボタンカラー',
        'section' => 'color_custom',
  )));

  /* リンクボタンHoverカラー追加 */
  $wp_customize->add_setting( 'color_custom[link_hover_color]', array(
    'type' => 'option'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 'color_custom[link_hover_color]',
    array(
        'settings' => 'color_custom[link_hover_color]',
        'label' => 'リンクHoverカラー',
        'section' => 'color_custom',
  )));

/* ====== カラーカスタム ===== */
  /* セクション追加 */
  $wp_customize->add_section( 'font_custom', array(
    'title' =>'フォントカスタム',
    'priority' => 104,
  ));


  /* トップページカスタム：フォントラジオボタン */
  $wp_customize->add_setting('font_custom[font_select]', array(
    'type' => 'option',
  ));

  $wp_customize->add_control( 'font_custom[font_select]', array(
    'settings' => 'font_custom[font_select]',
    'label' => 'フォントの選択',
    'section' => 'font_custom',
    'type' => 'radio',
    'choices' => array(
      'column-1' => '明朝体',
      'column-2' => 'ゴシック体',
    ),

  ));   

/* ==== コンセプトページカスタム ==== */
  /* セクション追加 */
  $wp_customize->add_section( 'concept_page_custom', array(
    'title' =>'コンセプトページカスタム',
    'priority' => 105,
  ));

  /* ヘッダーカスタム：コンセプトイメージ画像選択 */
  $wp_customize->add_setting('concept_page_custom[concept_page_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'concept_page_custom[concept_page_img]', array(
    'settings' => 'concept_page_custom[concept_page_img]',
    'label' => '画像',
    'section' => 'concept_page_custom',
  )));
endif;

/* ==== メニューページカスタム ==== */
  /* セクション追加 */
  $wp_customize->add_section( 'menu_page_custom', array(
    'title' =>'メニューページカスタム',
    'priority' => 106,
  ));

  /* ヘッダーカスタム：コンセプトイメージ画像選択 */
  $wp_customize->add_setting('menu_page_custom[menu_page_img]', array(
    'type' => 'option',
  ));

if(class_exists('WP_Customize_Image_Control')):
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_page_custom[menu_page_img]', array(
    'settings' => 'menu_page_custom[menu_page_img]',
    'label' => '画像',
    'section' => 'menu_page_custom',
  )));
endif;


}














