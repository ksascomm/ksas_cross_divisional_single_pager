<?php get_header(); $theme_option = flagship_sub_get_global_options();?>
	<div id="content">

		<div id="inner-content" class="padding-top-zero">
				
			<?php
			// If a featured image is set, insert into layout and use Interchange
			// to select the optimal image size per named media query.
			if ( has_post_thumbnail( $post->ID ) ) : ?>
				<header class="featured-hero parent" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
					<div class="orbit-caption">
						<div class="row">
							<h1 class="headline"><?php the_field( 'headline' ); ?></h1>
						</div>
					</div>								
				</header>
			<?php endif;?>
			<?php
			$slider_query = new WP_Query(array(
				'post_type' => 'slider',
				'posts_per_page' => '-1',
				'orderby' => 'menu_order', 
				'order' => 'ASC'));
			if ( $slider_query->have_posts() ) : ?>

			<div class="fullscreen-image-slider hide-for-small-only">			
				<div class="orbit" role="region" aria-label="Highlighted Research Awards" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
					<ul class="orbit-container">
						<?php if ($slider_query->post_count > 1) : ?>
						<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
			   			<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
						<?php endif;?>

						<?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
							<li class="orbit-slide">	
								<img class="orbit-image" src="<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>" alt="<?php the_title(); ?>">
								<figcaption class="orbit-caption">
							      <h1><?php the_title(); ?></h1>
							      <p><?php echo get_the_content(); ?></p>
									   <?php if (get_post_meta($post->ID, 'ecpt_button', true) ) : ?>
										<h4>
											<a href="<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>" onclick="ga('send', 'event', 'Homepage Slider', 'Click', '<?php echo get_post_meta($post->ID, 'ecpt_urldestination', true); ?>')" target="_blank" rel="noopener" id="post-<?php the_ID(); ?>" class="button">Watch the Video <span class="fa fa-play-circle-o"></span></a> 
										</h4>
										<?php endif;?>
							    </figcaption>
					   		</li>
					   <?php endwhile;?>
				   </ul>
			   </div>
			</div>		   
	 	<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="home-intro" aria-label="Introduction" id="<?php the_field( 'about_anchor' ); ?>">
					<div class="row">
						<div class="small-12 large-2 columns">
							<div class="column-icon">
								<?php the_field( 'icon' ); ?>
							</div>
						</div>

						<div class="small-12 large-8 large-pull-2 columns introduction">
							<?php the_content(); ?>	
						</div>	
					</div>	
				</div>	
			<?php endwhile; ?>

			<div class="hp-buckets" id="<?php the_field( 'content_area_widget_anchor' ); ?>" role="complementary" >
		    	<div class="row">
		    		<h2 class="callout-heading"><?php the_field( 'callout' ); ?></h3>
					<?php get_sidebar('homepage-column'); ?>
				</div>
		    </div>		

		    <main id="main" role="main" class="row">
				
				<div class="row news-area" id="<?php the_field( 'news_anchor' ); ?>" data-equalizer data-equalize-on="large">

					<div class="small-12 large-10 columns news-feed home-events">
						<h1 class="feed-title">Upcoming Events</h1>
						<p>A complete calendar of all events related to the SNF Agora Institute happening at Johns Hopkins is available on our <a href="<?php echo site_url();?>/events/">events page</a>.</p>
						<div class="row">
							<?php echo do_shortcode('[ai1ec view="agenda" events_limit="4"]');	?>
						</div>
					</div>

				    <?php  //News Query	
				    $news_quantity = $theme_option['flagship_sub_news_quantity'];	
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $news_quantity)); 
							
					if ( $news_query->have_posts() ) : ?>

						<div class="small-12 large-8 columns news-feed">

							<h1 class="feed-title"><?php echo $theme_option['flagship_sub_feed_name']; ?></h1>
								
							<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
								
									<?php get_template_part( 'parts/loop', 'news' ); ?>

							<?php endwhile; ?>

						<div class="row">
							<h5 class="black">
								<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
									View <?php echo $theme_option['flagship_sub_feed_name']; ?> Archive <span class="fa fa-chevron-circle-right" aria-hidden="true"></span></a>
							</h5>
						</div>
						
						</div>
					<?php endif; ?>
						<?php if ( is_active_sidebar( 'homepage2' ) ) : ?>
							<div class="small-12 large-3 columns">
								<div class="grey callout">
									<?php dynamic_sidebar('homepage2'); ?>
								</div>
							</div>
						<?php endif;?>	
						<?php if ( is_active_sidebar( 'homepage1' ) && is_active_sidebar( 'homepage2' )  ) : ?>
						    <div class="row" id="hp-buckets-2">
						    	<div class="small-6 columns hide-for-print" role="complementary">
						    		<div class="primary callout">
						    			<?php dynamic_sidebar('homepage1'); ?>
						    		</div> 
								</div>
								<div class="small-6 columns hide-for-print" role="complementary">
									<div class="primary callout">
						    			<?php dynamic_sidebar('homepage2'); ?>
						    		</div> 
								</div>
						    </div>
						<?php endif;?>

					</div>

			</main> <!-- end #main -->	

				<?php if ( is_active_sidebar( 'sidebar1' ) || is_active_sidebar('homepage0')  ) : ?>
					<div class="footer-widgets">
						<div class="row">
							<aside class="hide-for-print" id="sidebar1"> 
								<div class="small-12 large-8 large-push-2 columns">
									<?php dynamic_sidebar( 'homepage0' ); ?>
								</div>
							</aside>
						</div>
					</div>
				<?php endif; ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
<?php get_footer(); ?>
