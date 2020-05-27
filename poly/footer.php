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
						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="<?php $this->options->tweet() ?>" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="<?php $this->options->facebook() ?>" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="<?php $this->options->github() ?>" class="icon brands fa-github"><span class="label">Github</span></a></li>
									<li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php $this->options->qqUrl() ?>&site=qq&menu=yes" class="icon brands fa-qq"><span class="label">QQ</span></a></li>
									<li><a href="<?php $this->options->weiboUrl() ?>" class="icon brands fa-weibo"><span class="label">Weibo</span></a></li>
									<li><a href="<?php $this->options->insUrl() ?>" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="<?php $this->options->feedUrl(); ?>" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->emailUrl() ?>" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>">GXUZF.COM</a>. Theme: <a href="https://blog.gxuzf.com/action/2020/03/2318.html">Polyhedron</a>.</p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="http://opencdn.gxuzf.com/typechotheme/polyhedron/new/js/jquery.min.js"></script>
			<script src="http://opencdn.gxuzf.com/typechotheme/polyhedron/new/js/browser.min.js"></script>
			<script src="http://opencdn.gxuzf.com/typechotheme/polyhedron/new/js/breakpoints.min.js"></script>
			<script src="http://opencdn.gxuzf.com/typechotheme/polyhedron/new/js/util.js"></script>
			<script src="http://opencdn.gxuzf.com/typechotheme/polyhedron/new/js/main.js"></script>

<?php $this->options->DIYCODE() ?>

	</body>