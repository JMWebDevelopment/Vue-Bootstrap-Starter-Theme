<?php get_header(); ?>

    <div id="app"></div>

    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="display: none">
                <?php the_title('<h2>','</h2>'); ?>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>