<?php get_header(); ?>
<?php $theme_option = flagship_sub_get_global_options();
$news_query_cond = $theme_option['flagship_sub_news_query_cond']; ?>	
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		     <main id="main" class="small-12 large-8 large-push-3 columns" role="main">
				<?php if (function_exists('dimox_breadcrumbs') ) { dimox_breadcrumbs();} ?> 
		    	<h1 class="page-title"><?php echo $theme_option['flagship_sub_feed_name']; ?> Archive</h1>
		
			    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
			 		<div class="news-feed">
						<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'archive' ); ?>
				   	</div> 
				<?php endwhile; ?>	

					<?php joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>
																								
		    </main> <!-- end #main -->
		    
			<div class="small-12 large-3 large-pull-9 columns hide-for-print archive" role="navigation"> 
			
				<div class="sidebar">
					
					<div class="offset-gutter" id="sidebar_header">
						<h5 class="grey">Also in 
							<span class="white">About</span>
						</h5>
					</div>

					<?php wp_nav_menu( array(
						'theme_location' => 'main-nav',
						'menu_class' => 'nav',
						'container_class' => '',
						'sub_menu' => true,
					)); ?>

		
				<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

					<?php dynamic_sidebar( 'sidebar1' ); ?>
					
				<?php endif; ?>

				</div>

			</div>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>