<?php
/**
 * Polyhedron 一个简洁大方的双栏自适应Typecho模板
 * 
 * @package Polyhedron
 * @author GXZF.COM赵帆同学
 * @version 1.1.0
 * @link https://blog.gxuzf.com/action/2020/03/2318.html
 */

/** 文章置顶 */
    $sticky = $this->options->sticky; //在外观设置
    if($sticky && $this->is('index') || $this->is('front')){
    $sticky_cids = explode(',', strtr($sticky, ' ', ','));//分割文本 
    $sticky_html = "<span style='color:red'>[精选]</span>"; //可自定义置顶标题的 html
    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());
    //清空原有文章的列队
    $this->row = [];
    $this->stack = [];
    $this->length = 0;
    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); //避免重复
    }
    if ($order) $select1->order(null,"(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); //压入列队
    }
$uid = $this->user->uid; //登录时，显示用户各自的私密文章
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');
    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
}

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
				<!-- Main -->
					<div id="main">
						<!-- Post -->
<?php if ($this->have()): ?>


<?php while($this->next()): ?>
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h2>
										<p>分类：<?php $this->category(','); ?> ; 热度：<?php get_post_view($this) ?></p>
									</div>
									<div class="meta">
										<time class="published"><?php $this->date(); ?></time>
										<a href="<?php $this->author->permalink(); ?>" class="author"><span class="name"><?php $this->author(); ?></span><?php $this->author->gravatar('40') ?></a>
									</div>
								</header>
								<p><?php $this->excerpt(280, '...'); ?></p>
								<footer>
									<ul class="actions">
										<li><a href="<?php $this->permalink() ?>" class="button large">Continue Reading</a></li>
									</ul>  								</footer>
							</article>
	<?php endwhile; ?>
<?php else: ?>暂无文章<?php endif; ?>
						
																	
						<!-- Pagination -->
							<ul class="actions pagination">
								<li><?php $this->pageLink('上一页'); ?></li>
								<li><?php $this->pageLink('下一页','next'); ?></li>
</li>
							</ul>

					</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>