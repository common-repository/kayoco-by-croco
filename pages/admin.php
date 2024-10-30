<?php
use Croco\Kayoco;
use Croco\Options\Tag;

settings_errors( 'general' );
?>
<div class="wrap">
	<header>
		<h1><?php _e( 'Kayo-co settings',  Kayoco::TEXT_DOMAIN ); ?></h1>
	</header>
	<form method="post" action="<?php echo esc_url( admin_url( 'options.php' ), array( 'https', 'http' ) ); ?>">
		<?php settings_fields( Kayoco::SUFFIX ); ?>

		<table class="form-table" role="presentation">
			<tr>
				<th scope="row"><label for="twitter-theme"><?php _e( 'Tag', Kayoco::TEXT_DOMAIN ); ?></label></th>
				<td>
					<fieldset>
						<p><label for="disallowed_keys"><?php _e( 'tag script', Kayoco::TEXT_DOMAIN ); ?></label></p>
						<p>
							<textarea id="croco_kayoco_tag" name="croco_kayoco_tag" rows="10" cols="50" class="large-text code"><?php echo Tag::getTag(); ?></textarea>
						</p>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<p><?php _e( 'kayo-co WP Plugin is a WordPress plugin for kayo-co, a tool operated by CROCO Inc.', Kayoco::TEXT_DOMAIN ); ?></p>
					<p><?php _e( 'Please register with kayo-co first before using this plugin.', Kayoco::TEXT_DOMAIN ); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<p><?php _e( 'How to use kayo-co WP Plugin', Kayoco::TEXT_DOMAIN ); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<p><strong>1.</strong> <?php _e( 'log in to the kayo-co website', Kayoco::TEXT_DOMAIN ); ?></p>
					<p><a href="https://kayo-co.biz-samurai.com/">https://kayo-co.biz-samurai.com/</a></p>
					<p><?php _e( 'If you do not have a login ID, please get a CROCO ID.', Kayoco::TEXT_DOMAIN ); ?></p>
					<p><a href="https://id.biz-samurai.com/i/reg">https://id.biz-samurai.com/i/reg</a></p>
				</td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<p><strong>2.</strong> <?php _e( 'set up the necessary information on kayo-co\'s administration page, copy the generated recommendation display tag, and paste it into the "tag script". ', Kayoco::TEXT_DOMAIN ); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<p><strong>3.</strong> <?php _e( 'click "save changes" and put the following shortcode on the page where you want to display the recommendation on your site.', Kayoco::TEXT_DOMAIN ); ?></p>
					<p><code>[kayoco]</code></p>
				</td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<p><strong>4.</strong> <?php _e( 'your site\'s recommendation page will be displayed at the location where you placed the shortcode, in the format you set in the kayo-co administration page.',  Kayoco::TEXT_DOMAIN ); ?></p>
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>
<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
