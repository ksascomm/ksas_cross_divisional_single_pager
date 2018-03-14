<?php get_header(); $theme_option = flagship_sub_get_global_options();?>
	<div id="content">

		<div id="inner-content" class="padding-top-zero">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
				<?php endwhile; endif; ?>

				<div class="hp-buckets" id="<?php the_field( 'content_area_widget_anchor' ); ?>" role="complementary" >
			    	<div class="row">
			    		<h2 class="callout-heading"><?php the_field( 'callout' ); ?></h3>
						<?php get_sidebar('homepage-column'); ?>
					</div>
			    </div>		

		    <main id="main" role="main" class="row">
				
				<div class="row news-area" id="<?php the_field( 'news_anchor' ); ?>" data-equalizer data-equalize-on="large">
				    <?php  //News Query		
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => -1)); 
							
					if ( $news_query->have_posts() ) : ?>

						<div class="small-12 large-8 large-push-2 columns news-feed" >

							<h1 class="feed-title"><?php echo $theme_option['flagship_sub_feed_name']; ?></h1>
								
							<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
								
									<?php get_template_part( 'parts/loop', 'news' ); ?>

							<?php endwhile; ?>
							
						</div>
						<?php endif; ?>		

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
