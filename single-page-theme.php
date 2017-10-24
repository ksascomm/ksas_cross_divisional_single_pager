<?php
    /*
        Template Name: Single Page Theme Page
    */


get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="small-12 large-9 large-push-2 columns" role="main">

			<?php
                $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
                $the_query = new WP_Query($args);
            ?>
            <?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>
           	<?php get_template_part( 'parts/loop', 'single' ); ?>
            <?php endwhile; endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>