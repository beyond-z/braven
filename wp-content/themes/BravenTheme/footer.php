<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<a name="mailinglist"></a>
<div id="footer-email" class="braven_section">
<?php echo do_shortcode('[contact-form-7 id="45" title="Contact form 1"]')?>
</div>

		</div><!-- #main -->
		<div id="footer_bottom" class="braven_section">
			<div id="footer_menu">
		
			<?php dynamic_sidebar( 'fmenu' ); ?>
            
            <div class="clear"></div>
	
	</div><!-- #secondary -->

			<div class="braven-cc">
				<?php dynamic_sidebar( 'fcopyright' ); ?>	
			</div><!-- .site-info -->
		</div><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
    
</body>
</html>