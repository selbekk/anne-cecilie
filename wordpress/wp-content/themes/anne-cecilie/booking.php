<?php
/*
Template Name: Booking page
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <div class="contact row">
        <div class="col-md-8 form-wrapper">
            <form id="contact-form" method="post" action="/">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input type="text" name="name" class="form-control" placeholder="Your name" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                    <input type="email" name="email" class="form-control" placeholder="Your email" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-pencil"></span>
                    <textarea name="message" rows="6" class="form-control" placeholder="Your message" required></textarea>
                </div>
                <input type="button" class="btn btn-default" value="Send request" />
            </form>
        </div>

        <div class="col-md-4">

            <h3>Contact</h3>
            <ul>
                <?php
                foreach( get_post_custom($post_id) as $customKey => $customValue) {
                    if( strpos($customKey, '_') === 0) {
                        continue; // Skip internal wp stuff!
                    }
                    echo "<li><strong>$customKey</strong><br/>" . $customValue[0] . "</li>";
                }

                ?>
            </ul>
        </div>
    </div>

<?php endwhile; ?>

<?php get_footer(); ?>