<?php if(have_comments()) : ?>
    <ul class="list-unstyled">
        <?php
            // Register Custom Comment Walker
            require_once('class-wp-bootstrap-comment-walker.php');
            wp_list_comments([
                'style'         => 'ul',
                'short_ping'    => true,
                'avatar_size'   => '64',
                'walker'        => new Bootstrap_Comment_Walker(),
            ]);
        ?>
    </ul><!-- .comment-list -->
<?php endif; ?>

<?php
    // On affiche le formulaire pour commenter en l'adaptant pour Bootstrap
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    comment_form([
        'class_form' => 'form',
        'comment_field' => '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
        'class_submit' => 'btn btn-secondary',
        'fields' => [
            'author' =>
                '<div class="comment-form-author form-group"><label for="author">' . _x( 'Name', 'noun') .
                ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></div>',

            'email' =>
                '<div class="comment-form-email form-group"><label for="email">' . _x( 'Email', 'noun') .
                ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></div>',

            'url' =>
                '<div class="comment-form-url form-group"><label for="url">' . _x( 'Website', 'noun') . '</label>' .
                '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" size="30" /></div>'
        ]
    ]);
?>
