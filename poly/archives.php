<?php 

/**

    * 文章归档

    *

    * @package custom

*/?>

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
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $mon=0; $i=0; $j=0;   
    $output = '<div id="archives">';   
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y=$year; $m=$mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        if ($year != $year_tmp) {   
            $year = $year_tmp;   
            $output .= '<h3 class="al_year">'. $year .' 年</h3><ul class="al_mon_list">'; //输出年份   
        }   
        if ($mon != $mon_tmp) {   
            $mon = $mon_tmp;   
            $output .= '<li><span class="al_mon">'. $mon .' 月</span><ul class="al_post_list">'; //输出月份   
        }   
        $output .= '<li>'.date('d日: ',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a> <em>('. $archives->commentsNum.')</em></li>'; //输出文章日期和标题   
    endwhile;   
    $output .= '</ul></li></ul></div>';
    echo $output;
?>
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