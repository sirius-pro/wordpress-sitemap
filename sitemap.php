<?php

/*
 * Template Name: Mapa strony
 */

get_header(); ?>

<h2 id="pages">Strony</h2>
<ul>
<?php
wp_list_pages(
  array(
    'exclude' => '',
    'title_li' => '',
  )
);
?>
</ul>

<h2 id="posts">Wpisy</h2>
<ul>
<?php

$categories = get_categories();
foreach ($categories as $cat) {
	$category_link = get_category_link($cat->cat_ID);
	echo '<li><h3> <a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</a></h3>';
	echo "<ul>";
  

  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
  while(have_posts()) {
    the_post();
    $category = get_the_category();
    if ($category[0]->cat_ID == $cat->cat_ID) {
      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
  }
  echo "</ul>";
  echo "</li>";
}
?>
</ul>

<?php get_footer(); ?>