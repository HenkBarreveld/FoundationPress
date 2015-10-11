<?php
// File for the Theme My Login plugin
// Added class="button" to submit
// Added span with button "Annuleren"
?>
<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
    <?php $template->the_action_template_message( 'login' ); ?>
    <?php $template->the_errors(); ?>
    <form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
        <p>
            <label for="user_login<?php $template->the_instance(); ?>">
                <?php _e( 'Username', 'theme-my-login' ); ?>
            </label>
            <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
        </p>
        <p>
            <label for="user_pass<?php $template->the_instance(); ?>">
                <?php _e( 'Password', 'theme-my-login' ); ?>
            </label>
            <input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input" value="" size="20" />
        </p>

        <?php do_action( 'login_form' ); ?>

        <p class="forgetmenot">
            <input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
            <label for="rememberme<?php $template->the_instance(); ?>">
                <?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?>
            </label>
        </p>
        <p class="submit">
            <input type="submit" class="button" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>" />
            <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
            <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
            <input type="hidden" name="action" value="login" />
            <span style="margin: 5px 0; float: right;"><script>document.write('<a class="button alert" href="' + document.referrer + '">Annuleren</a>');</script></span>
        </p>
    </form>
    <?php $template->the_action_links( array( 'login' => false ) ); ?>
</div>
