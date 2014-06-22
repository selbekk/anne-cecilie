<article id="<?php the_ID(); ?>" class="post">
    <header>
        <h2><?php the_title(); ?></h2>
        <p class="tags"><?php
            $tag = '<span class="tag">#</span>';
            the_tags($tag, $tag);
        ?> |
        <?php the_date(); ?></p>
    </header>
    <?php the_content('Continue reading'); ?>
</article>