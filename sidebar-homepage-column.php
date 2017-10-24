<?php if ( is_active_sidebar( 'homepage-left-3rd', 'homepage-middle-3rd', 'homepage-right-3rd' ) ) : ?>
	<div class="row" data-equalizer data-equalize-on="large">
		<?php if ( is_active_sidebar( 'homepage-left-3rd' ) ) : ?>
			<div class="small-12 large-4 columns">
				<div class="primary callout" data-equalizer-watch>
					<?php dynamic_sidebar( 'homepage-left-3rd' ); ?>
				</div>
			</div>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'homepage-middle-3rd' ) ) : ?>

			<div class="small-12 large-4 columns">
				<div class="secondary callout" data-equalizer-watch>
					<?php dynamic_sidebar( 'homepage-middle-3rd' ); ?>
				</div>
			</div>

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'homepage-right-3rd' ) ) : ?>

			<div class="small-12 large-4 columns">
				<div class="primary callout"  data-equalizer-watch>
					<?php dynamic_sidebar( 'homepage-right-3rd' ); ?>
				</div>
			</div>

		<?php endif; ?>

	</div>
<?php endif; ?>