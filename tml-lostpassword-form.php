<?php
// File for the Theme My Login plugin
// Added class="button" to submit
// Added span with button "Annuleren"
?>
<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'lostpassword' ); ?>
	<?php $template->the_errors(); ?>
	<form name="lostpasswordform" id="lostpasswordform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'lostpassword' ); ?>" method="post">
		<p>
			<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username or E-mail:', 'theme-my-login' ); ?></label>
			<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
		</p>

		<?php do_action( 'lostpassword_form' ); ?>

		<p class="submit">
			<input type="submit" class="button" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Get New Password', 'theme-my-login' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'lostpassword' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="lostpassword" />
            <span style="margin: 5px 0; float: right;"><script>document.write('<a class="button alert" href="' + document.referrer + '">Annuleren</a>');</script></span>
		</p>
	</form>
	<?php $template->the_action_links( array( 'lostpassword' => false ) ); ?>
</div>
