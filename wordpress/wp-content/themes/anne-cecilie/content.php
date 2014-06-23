<?php if(is_search()) : ?>

<article class="post search-result">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php the_excerpt(); ?></p>
</article>


<?php else: ?>
<article id="<?php the_ID(); ?>" class="post">
    <header>
        <h2><?php the_title(); ?></h2>
        <p class="tags"><?php
            $tag = ' <span class="tag-symbol">#</span>';
            the_tags($tag, $tag);
        ?> |
        <?php the_date(); ?></p>
    </header>
    <?php the_content('Continue reading'); ?>
</article>
<?php endif; ?>
