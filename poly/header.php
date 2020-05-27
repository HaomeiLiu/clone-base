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
<head>
<title><?php $this->archiveTitle(array(
		'category'  =>  _t(' %s 下的文章'),
		'search'    =>  _t('包含关键字 %s 的文章'),
		'tag'       =>  _t('标签 %s 下的文章'),
		'author'    =>  _t('%s 发布的文章')
		), '', ' - '); ?><?php $this->options->title(); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gxuzf/mycdn@master/css/main.css" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" />
<?php $this->header(); ?>
<!--代码高亮-->
<link rel="stylesheet" href="http://opencdn.gxuzf.com/prism/prism.css" />
<script src="http://opencdn.gxuzf.com/prism/prism.js"></script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
						<nav class="links">
							<ul>
<li><a href="<?php $this->options->siteUrl(); ?>">主页</a></li>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>
							</ul>
						</nav>
					</header>