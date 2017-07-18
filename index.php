<?php get_header(); ?>

<div class="row">

    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="display: none">
                <?php the_title('<h2>','</h2>'); ?>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>