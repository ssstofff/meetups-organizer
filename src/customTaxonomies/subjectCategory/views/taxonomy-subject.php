<?php get_header() ?>

<section class="mo-articles-list">
    <h1><?php echo sprintf( __( 'Meetups: %s', 'meetups_organizer_textdomain' ), get_term_by( 'slug', $term, 'subject' )->name ) ?></h1>
    <?php if ( have_posts() ) : ?>
        <div class="mo-articles-container">
            <?php while( have_posts() ) : the_post(); ?>
                <a href="<?php echo get_the_permalink() ?>" title="<?php echo get_the_title() ?>">
                    <?php if ( $featured_image = get_the_post_thumbnail_url( $post->ID, 'medium' ) ) : ?>
                        <article class="mo-article" style="background-image: url('<?php echo $featured_image ?>')">
                    <?php else : ?>
                        <article class="mo-article" style="background-color: #39CDC6">
                    <?php endif ?>
                        <p class="mo-article-date"><img src="<?php echo WPMAD_MO_PLUGIN_URL . 'inc/images/calendar.svg' ?>" alt="<?php _e( 'Date of Meetup', 'meetups_organizer_textdomain' ) ?>"/><?php echo get_the_date() ?></p>
                        <p class="mo-article-title"><?php echo get_the_title() ?></p>
                    </article>
                </a>
            <?php endwhile ?>
        </div>
        <?php the_posts_pagination();
    endif; ?>
</section>

<?php get_footer();
