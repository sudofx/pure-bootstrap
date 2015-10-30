<?php
    /**
    *   Theme: Pure Bootstrap
    *   The template for displaying the comments.
    *   @package Pure Bootstrap
    *   @version Pure Bootstrap 1.1.1
    */
?>
<div class="well">
    <div id="comments">
        <ul class="media-list">
            <?php wp_list_comments( array('avatar_size'=>40)); ?>
        </ul>
    </div>
    <div id="comment-form">
        <?php comment_form(); ?>
    </div>
</div>
