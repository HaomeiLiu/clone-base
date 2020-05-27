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
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="<?php $this->options->siteUrl(); ?>" class="logo"><img src="<?php $this->options->logoUrl() ?>" alt="" /></a>
									<h2><?php $this->options->title() ?></h2>
									<p><?php $this->options->description() ?></p>
							</section>

<!--站点统计-->
<section>
<h2>全站统计</h2>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
文章总数：<?php $stat->publishedPostsNum() ?>篇</br>
分类总数：<?php $stat->categoriesNum() ?>个</br>
评论总数：<?php $stat->publishedCommentsNum() ?>条</br>
页面总数：<?php $stat->publishedPagesNum() ?>个</br>
标签总数：<?php echo get_sum_tags();?>个
</section>

					<!-- 热门文章 -->
							<section>
<h2>热门文章</h2>
								<ul class="posts">
									<li>

											<header>
												<h3><?php getHotComments('5');?></h3>
							</header>		
									</li>
</section>


<!-- 最新评论 -->
<section>
<h2>最新评论</h2>
<ul class="widget-list">
<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
<?php while($comments->next()): ?>
<li><?php $comments->author(false); ?>: <a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(35, '...'); ?></a></li>
<?php endwhile; ?>
</ul>
</section>

<!-- 随机文章 -->
<section>
<h2>随机文章</h2>
								<ul class="posts">
									<li>

											<header>
												<h3><?php getRandomPosts('5');?></h3>
									</header>
									</li>
</section>

<!--按月归档-->
<section>
<h2>归档</h2>
<ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
<?php if (class_exists("Calendar_Plugin")): ?>
    <div class="list-group">
        <a class="list-group-item active"><i class="fa fa-calendar fa-fw"></i> <?php _e('日历');?></a>
        <?php Calendar_Plugin::render();?>
    </div>
<?php endif;?>
</ul>
</section>

<!--友情链接-->
<section>
<h2>友情链接</h2>
<?php Links_Plugin::output("SHOW_TEXT", 10); ?>
<li><a href="<?php $this->options->linksUrl() ?>">更多链接...</a></li>
</ul>
</section>

<!--用户功能-->
<section>
<h2>用户功能</h2>
<?php if($this->user->hasLogin()): ?>
<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
<?php else: ?>
<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
<?php endif; ?>
</section>

<!-- end #sidebar -->