<?php get_header(); ?>

<section id="main">
	<section id="articles_list">		

		<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

			<article>
				<?php /*			
				<div class="thumb"><a href="<?php the_permalink();?>">

				<?php if (has_post_thumbnail()) { the_post_thumbnail('list_articles_thumbs');} ?>
					
				</a></div>
				*/ ?>
				<hgroup><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></hgroup>
				<div class="date"><?php the_date(); ?> en <span><?php the_category(); ?></span></div>
				<div class="extract"><?php the_content(); ?></div>
				
			</article>	
		<?php endwhile; else: ?>
		<h1>No se encontraron artículos</h1>
	<?php endif; ?>

	<?php /*
	<div id="comentarios">
		<h3>Comentarios</h3>
		<div id="caja_comentarios">
			<?php comments_template(); ?>
		</div>
	</div>
*/?>
</section>

<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>


