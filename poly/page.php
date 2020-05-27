<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--
/**
 * Polyhedron 一个简洁大方的双栏自适应Typecho模板
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
										<p>这里是一个独立页面，最后更新于<?php echo date('Y 年 m 月 d 日', $this->modified);?></p>
									</div>
									<div class="meta">
										<time class="published"><?php $this->date(); ?></time>
										<a href="<?php $this->author->permalink(); ?>" class="author"><span class="name"><?php $this->author(); ?></span><?php $this->author->gravatar('40') ?></a>
									</div>
								</header>
<div class="content_p"><?php $this->content(); ?></div>
							<footer>
									<ul class="stats">
										<li>上一篇：<?php $this->thePrev('%s','没有了'); ?></li>
										<li>下一篇：<?php $this->theNext('%s','没有了'); ?></li>
									</ul>
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