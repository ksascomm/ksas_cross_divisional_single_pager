<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="small-12 large-9 large-push-2 columns" role="main">

			

		    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>

			    <nav aria-label="You are here:">
					<ul id="menu-main-menu-2" class="breadcrumbs">
						<li><a href="<?php echo home_url(); ?>">Home</a></li>
						<li><?php echo the_title(); ?></li>
					</ul>
				</nav> 
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
										
					<header class="article-header">	
						<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
						<?php get_template_part( 'parts/content', 'byline' ); ?>
				    </header> <!-- end article header -->
					
									
				    <div class="entry-content" itemprop="articleBody">
				    <?php if ( !in_category('video') ) :?>
				    	<?php if ( has_post_thumbnail() ) :
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
						?> 
				    	<div class="imageblockleft small-centered medium-uncentered columns">
				    		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">								
								<?php the_post_thumbnail('full', array(
									'class' => 'thumbnail',
									'itemprop' => 'image',
								)); ?>
							</div>
						</div>
						<?php endif; ?>
					<?php endif;?>
						<?php the_content(); ?>
					</div> <!-- end article section -->
																	
				</article> <!-- end article -->
		    	
		    <?php endwhile; endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>