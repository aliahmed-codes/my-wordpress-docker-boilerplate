<?php get_header(); ?>

<main>
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <div class="entry-meta">
                        <span>Posted on <?php echo get_the_date(); ?></span>
                        <span>by <?php the_author(); ?></span>
                    </div>
                </article>
                <?php
            endwhile;
            
            // Pagination
            the_posts_pagination();
            
        else :
            ?>
            <p>No posts found.</p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>