<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('posts_per_page=24&paged=' . $paged); 
?>

<?php if(have_posts()) : ?>
  <?php while(have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" class="item">
     <?php
        $attachment_id = get_field('image');
        $size = "moodboard";
        $image = wp_get_attachment_image_src( $attachment_id, $size );
      ?>
      <a href="<?php the_field('url'); ?>" title="<?php the_field('url'); ?>" target="_blank">
        <img src="<?php echo $image[0]; ?>" alt="Photo <?php the_title(); ?>" />
      </a>
  </div>
  <?php endwhile; ?>
  <div id="pager">
    <div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
    <div class="nav-previous"><?php next_posts_link( 'Older posts' ); ?></div>
  </div>
<?php endif; ?>

<?php get_footer(); ?>