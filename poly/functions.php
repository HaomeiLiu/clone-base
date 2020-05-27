<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * Polyhedron 一个简洁大方的双栏自适应Typecho模板
 * 
 * @package Polyhedron
 * @author GXZF.COM赵帆同学
 * @version 1.1.0
 * @link https://blog.gxuzf.com/action/2020/03/2318.html
 */


/* 浏览次数统计 */
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

/* 热门文章调用 */
function getHotComments($limit = 10){
$db = Typecho_Db::get();
$result = $db->fetchAll($db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->where('created <= unix_timestamp(now())', 'post')
->limit($limit)
->order('commentsNum', Typecho_Db::SORT_DESC)
);
if($result){
$i=1;
foreach($result as $val){
if($i<=3){
$var = ' class="red"';
}else{
$var = '';
}
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
$post_title = htmlspecialchars($val['title']);
$permalink = $val['permalink'];
echo '<li><i'.$var.'>'.$i.'</i>.<a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';
$i++;
}
}
}

/* 随机文章调用*/
function getRandomPosts($limit = 10){
$db = Typecho_Db::get();
$result = $db->fetchAll($db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->where('created <= unix_timestamp(now())', 'post')
->limit($limit)
->order('RAND()')
);
if($result){
$i=1;
foreach($result as $val){
if($i<=3){
$var = ' class="red"';
}else{
$var = '';
}
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
$post_title = htmlspecialchars($val['title']);
$permalink = $val['permalink'];
echo '<li><i'.$var.'>'.$i.'</i>.<a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';
$i++;
}
}
}

/* 自定义外观设置字段 */
function themeConfig($form) {
   $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('文章置顶'), _t('置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔'));
    $form->addInput($sticky);
   $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个LOGO图片地址，用于边栏显示'));
	$form->addInput($logoUrl);
   $linksUrl = new Typecho_Widget_Helper_Form_Element_Text('linksUrl', NULL, NULL, _t('友链页面地址'), _t('在这里填入友链页面地址，用于边栏显示'));
	$form->addInput($linksUrl);
   $tweet = new Typecho_Widget_Helper_Form_Element_Text('tweet', NULL, NULL, _t('推特联系地址'), _t('在这里填入一个推特关注链接，用于底部显示'));
	$form->addInput($tweet);
   $facebook = new Typecho_Widget_Helper_Form_Element_Text('facebook', NULL, NULL, _t('脸书联系地址'), _t('在这里填入一个脸书关注链接，用于底部显示'));
	$form->addInput($facebook);
   $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('Github地址'), _t('在这里填入一个github地址，用于底部显示'));
	$form->addInput($github);
   $qqUrl = new Typecho_Widget_Helper_Form_Element_Text('qqUrl', NULL, NULL, _t('QQ号'), _t('在这里填入一个QQ号码，用于底部显示'));
	$form->addInput($qqUrl);
   $weiboUrl = new Typecho_Widget_Helper_Form_Element_Text('weiboUrl', NULL, NULL, _t('微博联系地址'), _t('在这里填入一个微博关注链接，用于底部显示'));
	$form->addInput($weiboUrl);
   $insUrl = new Typecho_Widget_Helper_Form_Element_Text('insUrl', NULL, NULL, _t('Instagram联系地址'), _t('在这里填入一个ins关注链接，用于底部显示'));
	$form->addInput($insUrl);
   $emailUrl = new Typecho_Widget_Helper_Form_Element_Text('emailUrl', NULL, NULL, _t('邮箱地址'), _t('在这里填入一个邮箱地址，用于底部显示'));
	$form->addInput($emailUrl);
   $DIYCODE = new Typecho_Widget_Helper_Form_Element_Text('DIYCODE', NULL, NULL, _t('底部自定义代码'), _t('你可以在这里填入第三方统计等自定义代码，它将会挂载于页面底部'));
	$form->addInput($DIYCODE);
}


/*标签数统计*/
function get_sum_tags(){
	$db = Typecho_Db::get();
	$po= $db->select('table.metas.mid')->from ('table.metas')->where ('type = ?', 'tag');
	$pom = $db->fetchAll($po);
	$num = count($pom);
	echo $num;
}