<article <?php post_class('callout'); ?> itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php the_ID(); ?>">
						
	<header class="article-header" aria-label="<?php the_title();?>">	
		<?php get_template_part( 'parts/content', 'byline' ); ?>
		<h1 class="entry-title single-title" itemprop="headline">
			<?php if ( get_post_meta($post->ID, 'ecpt_external_link', true) ) : ?>
				<a href="<?php echo get_post_meta($post->ID, 'ecpt_external_link', true); ?>" class="external" target="_blank" rel="noopener" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>">
					<?php the_title(); ?>
				</a>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
			<?php endif; ?>
		</h1>
    </header> <!-- end article header -->
					
    <div class="entry-content" itemprop="articleBody">
		<?php the_post_thumbnail('news', array(
	'class' => 'floatleft news',
)); ?>
		<?php the_excerpt(); ?>
	</div> <!-- end article section -->
						
	<hr>							
													
</article> <!-- end article -->