<article <?php post_class('callout'); ?> itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php the_ID(); ?>">
						
	<header class="article-header" aria-label="<?php the_title();?>">	
		<?php get_template_part( 'parts/content', 'byline' ); ?>
		<h1 class="entry-title single-title" itemprop="headline">
			<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
				<?php the_title();?>
			</a>
		</h1>
    </header> <!-- end article header -->
					
    <div class="entry-content" itemprop="articleBody">
		<?php the_excerpt(); ?>
	</div> <!-- end article section -->
					
</article> <!-- end article -->