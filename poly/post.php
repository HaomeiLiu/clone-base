<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--
/**
 * 这是 GXUZF.COM赵帆同学开发的自用模板
 * 
 * @package Polyhedron
 * @author GXZF.COM赵帆同学
 * @version 1.1.0
 * @link https://blog.gxuzf.com/action/2020/03/2318.html
 */
-->
<?php $this->need('header.php'); ?>
<div id="main">
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
										<p>分类：<?php $this->category(','); ?> ; 热度：<?php get_post_view($this) ?> ; 最后更新于<?php echo date('Y 年 m 月 d 日', $this->modified);?></p>
									</div>
									<div class="meta">
										<time class="published"><?php $this->date(); ?></time>
										<a href="<?php $this->author->permalink(); ?>" class="author"><span class="name"><?php $this->author(); ?></span><?php $this->author->gravatar('40') ?></a>
									</div>
								</header>
<div class="content_p"><?php $this->content(); ?></div>
<section>
<footer>
									<ul class="stats">
<li>文章标签：<?php $this->tags('； ', true, 'none'); ?></li>
										<li>上一篇：<?php $this->thePrev('%s','没有了'); ?></li><li>下一篇：<?php $this->theNext('%s','没有了'); ?></li>
<li>相关推荐：<?php $this->related(1)->to($relatedPosts); ?>
    <?php while ($relatedPosts->next()): ?>
    <a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a>
    <?php endwhile; ?>
</li>
									</ul></section>
								</footer>
<section>
		<?php if($this->allow('comment')): 
	$this->need('comments.php');
endif;
?>
</section>
							</article>

<center><?php $this->need('footer.php'); ?></center>
					</div>