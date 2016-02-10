<?php die(); ?><!DOCTYPE html>
<html lang="ru-RU">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="http://deepinside.esy.es/xmlrpc.php">

<title>Система контроля версий Git. &#8212; Deep Inside</title>
<link rel="alternate" type="application/rss+xml" title="Deep Inside &raquo; Лента" href="http://deepinside.esy.es/feed/" />
<link rel="alternate" type="application/rss+xml" title="Deep Inside &raquo; Лента комментариев" href="http://deepinside.esy.es/comments/feed/" />
<link rel="alternate" type="application/rss+xml" title="Deep Inside &raquo; Лента комментариев к &laquo;Система контроля версий Git.&raquo;" href="http://deepinside.esy.es/2016/02/10/git/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/deepinside.esy.es\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.4.2"}};
			!function(a,b,c){function d(a){var c,d=b.createElement("canvas"),e=d.getContext&&d.getContext("2d"),f=String.fromCharCode;return e&&e.fillText?(e.textBaseline="top",e.font="600 32px Arial","flag"===a?(e.fillText(f(55356,56806,55356,56826),0,0),d.toDataURL().length>3e3):"diversity"===a?(e.fillText(f(55356,57221),0,0),c=e.getImageData(16,16,1,1).data.toString(),e.fillText(f(55356,57221,55356,57343),0,0),c!==e.getImageData(16,16,1,1).data.toString()):("simple"===a?e.fillText(f(55357,56835),0,0):e.fillText(f(55356,57135),0,0),0!==e.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='open-sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext%2Ccyrillic%2Ccyrillic-ext&#038;ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='http://deepinside.esy.es/wp-includes/css/dashicons.min.css?ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='admin-bar-css'  href='http://deepinside.esy.es/wp-includes/css/admin-bar.min.css?ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='the-wp-theme-style-css'  href='http://deepinside.esy.es/wp-content/themes/the-wp/style.css?ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='http://deepinside.esy.es/wp-content/themes/the-wp/font-awesome/css/font-awesome.min.css?ver=4.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='the-wp-theme-google-fonts-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A400italic%2C700italic%2C400%2C700&#038;ver=4.4.2' type='text/css' media='all' />
<script type='text/javascript' src='http://deepinside.esy.es/wp-includes/js/jquery/jquery.js?ver=1.11.3'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-content/themes/the-wp/js/jquery.fitvids.js?ver=4.4.2'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-content/themes/the-wp/js/fitvids-doc-ready.js?ver=4.4.2'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-content/themes/the-wp/js/base.js?ver=4.4.2'></script>
<link rel='https://api.w.org/' href='http://deepinside.esy.es/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://deepinside.esy.es/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://deepinside.esy.es/wp-includes/wlwmanifest.xml" /> 
<link rel='prev' title='Quest Red Line' href='http://deepinside.esy.es/2016/02/03/1819/' />
<link rel="canonical" href="http://deepinside.esy.es/2016/02/10/git/" />
<link rel='shortlink' href='http://deepinside.esy.es/?p=266' />
<link rel="alternate" type="application/json+oembed" href="http://deepinside.esy.es/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fdeepinside.esy.es%2F2016%2F02%2F10%2Fgit%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://deepinside.esy.es/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fdeepinside.esy.es%2F2016%2F02%2F10%2Fgit%2F&#038;format=xml" />
		<style type="text/css">header .site-description {color:#ffffff;}
		header.site-header{background-image:url(http://deepinside.esy.es/wp-content/uploads/2015/11/планета.jpg);}</style>
		<style type="text/css" id="custom-background-css">
body.custom-background { background-image: url('http://deepinside.esy.es/wp-content/themes/the-wp/images/bg.jpg'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
</style>
<style type="text/css" media="print">#wpadminbar { display:none; }</style>
<style type="text/css" media="screen">
	html { margin-top: 32px !important; }
	* html body { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
</style>
<link rel="icon" href="http://deepinside.esy.es/wp-content/uploads/2015/11/ziki.png" sizes="32x32" />
<link rel="icon" href="http://deepinside.esy.es/wp-content/uploads/2015/11/ziki.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="http://deepinside.esy.es/wp-content/uploads/2015/11/ziki.png" />
<meta name="msapplication-TileImage" content="http://deepinside.esy.es/wp-content/uploads/2015/11/ziki.png" />
	<link type="text/css" rel="stylesheet" href="http://deepinside.esy.es/wp-content/plugins/syntaxhighlighter-plus/syntaxhighlighter/styles/shCore.css"></link>
	<link type="text/css" rel="stylesheet" href="http://deepinside.esy.es/wp-content/plugins/syntaxhighlighter-plus/syntaxhighlighter/styles/shThemeDefault.css"></link>
</head>

<body class="single single-post postid-266 single-format-standard logged-in admin-bar no-customize-support custom-background">
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content">Перейти к содержимому</a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
                	<div class="header-text">
				<h1 class="site-title"><a href="http://deepinside.esy.es/" rel="home">Deep Inside</a></h1>
            	<span class="site-description">N&amp;L blog</span>
        	</div>

                    <div class="header-search">
            	<form role="search" method="get" class="search-form" action="http://deepinside.esy.es/" autocomplete='off'>
	<input type="text" class="search-field" placeholder="Search &hellip;" value="" name="s" />
	<input type="submit" class="search-submit" value="Поиск" title="Поиск" />
</form>
<div class="clear"></div>            	<div class="header-description">
                	<div class="cm"><i class="fa fa-envelope-o"></i>trash789012@gmail.com</div><div class="social-media"></div>                </div>
            </div>    
            <div class="clear"></div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
    
    <nav id="site-navigation" class="main-navigation mr" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Меню</button>
        <div class="menu-%d0%bc%d0%b5%d0%bd%d1%8e-1-container"><ul id="primary-menu" class="menu"><li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21"><a href="/">Новости</a></li>
<li id="menu-item-214" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-214"><a href="http://deepinside.esy.es/%d0%b8%d0%b3%d1%80%d1%8b/">Игры</a></li>
<li id="menu-item-236" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-236"><a href="http://deepinside.esy.es/jkx/">ЖКХ</a></li>
</ul></div>        
        <div class="clear"></div>
        <div class="nav-foot"></div>
    </nav><!-- #site-navigation -->
    

	<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
			
<article id="post-266" class="post-266 post type-post status-publish format-standard has-post-thumbnail hentry category-1">
	 
	<div class="post-entry-media">
    	<a href="http://deepinside.esy.es/2016/02/10/git/" title="Система контроля версий Git."><img width="300" height="300" src="http://deepinside.esy.es/wp-content/uploads/2016/02/git.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="git" srcset="http://deepinside.esy.es/wp-content/uploads/2016/02/git-150x150.jpg 150w, http://deepinside.esy.es/wp-content/uploads/2016/02/git.jpg 300w" sizes="(max-width: 300px) 100vw, 300px" /></a>
    </div>
     

	<header class="entry-header">
		<h1 class="entry-title">Система контроля версий Git.</h1>
		<div class="entry-meta">
			<span class="posted-on"><i class="fa fa-calendar"></i> <a href="http://deepinside.esy.es/2016/02/10/git/" rel="bookmark"><time class="entry-date published" datetime="2016-02-10T09:39:36+00:00">10.02.2016</time><time class="updated" datetime="2016-02-10T10:39:44+00:00">10.02.2016</time></a></span><span class="edit-link"><i class="fa fa-edit"></i> <a class="post-edit-link" href="http://deepinside.esy.es/wp-admin/post.php?post=266&#038;action=edit">Изменить</a></span>		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p>Скачиваем и устанавливаем консольную версию <a href="https://vk.com/away.php?to=https%3A%2F%2Fgit-for-windows.github.io%2F" target="_blank">вот отсюда</a>.<br />
Открываем Git Bash консоль и произведем некоторые настройки:<br />
<strong>$ git config user.name &#171;Your Name&#187;              </strong>// имя пользователя<br />
<strong>$ git config user.email your@email.abc</strong>         //емэйл<br />
<strong>$ git config —global core.autocrlf false         </strong>//<strong><br />
$ git config —global core.safecrlf false</strong>           //для корректного сохранения файлов с переносом строк</p>
<p>Теперь нужно создать свой репозиторий на GitHub. После чего создаем проект на компьютере в определенной папке.<br />
Кликаем по ней ПКМ и выбираем пункт <strong>Git Bash Here</strong>.</p>
<p>Откроется консоль. Туда пишем</p>
<p><strong>$ git init      </strong>//инициализирует гит репозитарий</p>
<p>&nbsp;</p>
<h1 style="text-align: center;"><strong>Список команд для работы</strong></h1>
<p>&nbsp;</p>
<p><strong>$ git add .     </strong>//Добавит все измененные, удаленные и внесенные файлы в буфер</p>
<p><strong>$ git commit -m &#171;comment&#187;    </strong>//Добавит в репозитарий слепок состояния файлов с комментарием</p>
<p><strong>$ git rm file.*      </strong>//Удалить файл средствами консоли</p>
<p><strong>$ git mv file.*  folder/file_rename.*     </strong>//Перемещение с возможным переименованием файла</p>
<p><strong>$ git remote     </strong>//Узнать список удаленных серверов (origin &#8212; по умолчанию)</p>
<p><strong>$ git remote -v     </strong>//Узнать URL удаленных серверов</p>
<p><strong>$ git push -u origin master         </strong>//Обновить последний коммит до локальной версии</p>
<p><strong>$ git checkout commit     </strong>//откат до определенного коммита (вместо commit указать контрольную сумму)</p>
<p><strong>$ git log     </strong>//Выведет список всех коммитов</p>
<p><strong>$ git clone URL     //</strong>Скопирует репозитарий (вместо URl &#8212; ссылка HTTPS)</p>
			</div><!-- .entry-content -->

	<footer class="entry-footer">
		<span class="byline"><i class="fa fa-user"></i> <span class="author vcard"><a class="url fn n" href="http://deepinside.esy.es/author/nik/">nik</a></span></span><span class="cat-links"><i class="fa fa-folder"></i> <a href="http://deepinside.esy.es/category/%d0%b1%d0%b5%d0%b7-%d1%80%d1%83%d0%b1%d1%80%d0%b8%d0%ba%d0%b8/" rel="category tag">Без рубрики</a></span>	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

			<div role="navigation" id="nav-below" class="navigation-post"><div class="nav-previous"><a href="http://deepinside.esy.es/2016/02/03/1819/" rel="prev"><i class="fa fa-arrow-left"></i> Quest Red Line</a></div><div class="clear"></div></div>
			<div class="clear"></div>
<div id="comments" class="comments-area">

	
	
	
</div><!-- #comments -->

				<div id="respond" class="comment-respond">
			<h3 id="reply-title" class="comment-reply-title">Добавить комментарий <small><a rel="nofollow" id="cancel-comment-reply-link" href="/2016/02/10/git/#respond" style="display:none;"><i class="fa fa-close"></i> Отменить ответ</a></small></h3>				<form action="http://deepinside.esy.es/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
					<p class="logged-in-as"><a href="http://deepinside.esy.es/wp-admin/profile.php" aria-label="Вы вошли как nik. Изменить профиль">Вы вошли как nik</a>. <a href="http://deepinside.esy.es/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Fdeepinside.esy.es%2F2016%2F02%2F10%2Fgit%2F&amp;_wpnonce=8dcddd1ece">Выйти?</a></p><div class="input-container-comment"><textarea placeholder="Комментарий" id="comment" tabindex="4" rows="5" cols="58" name="comment" autocomplete="off" /></textarea>
	<span></span>
	</div>
	
	<div class="input-container-button">
	<button class="button" type="submit">Отправить комментарий</button></div><p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Отправить комментарий" /> <input type='hidden' name='comment_post_ID' value='266' id='comment_post_ID' />
<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
</p><input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment_disabled" value="2833d8f088" /><script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
				</form>
					</div><!-- #respond -->
		
		
		</main><!-- #main -->
	</div><!-- #primary -->


<div id="secondary" class="widget-area" role="complementary">
	<aside id="search-2" class="widget widget_search"><form role="search" method="get" class="search-form" action="http://deepinside.esy.es/" autocomplete='off'>
	<input type="text" class="search-field" placeholder="Search &hellip;" value="" name="s" />
	<input type="submit" class="search-submit" value="Поиск" title="Поиск" />
</form>
<div class="clear"></div></aside>		<aside id="recent-posts-2" class="widget widget_recent_entries">		<h1 class="widget-title">Свежие записи</h1>		<ul>
					<li>
				<a href="http://deepinside.esy.es/2016/02/10/git/">Система контроля версий Git.</a>
						</li>
					<li>
				<a href="http://deepinside.esy.es/2016/02/03/1819/">Quest Red Line</a>
						</li>
					<li>
				<a href="http://deepinside.esy.es/2015/12/03/dom-xml-parser-java/">DOM XML Parser (Java)</a>
						</li>
					<li>
				<a href="http://deepinside.esy.es/2015/11/17/%d0%ba%d1%80%d0%b0%d1%82%d0%ba%d0%b8%d0%b9-%d0%ba%d1%83%d1%80%d1%81-%d0%bf%d0%be-sql/">Краткий курс по SQLite</a>
						</li>
					<li>
				<a href="http://deepinside.esy.es/2015/11/12/waking-our-hearts/">Waking Our Hearts способен пробудить ваши сердца</a>
						</li>
				</ul>
		</aside>		<aside id="categories-2" class="widget widget_categories"><h1 class="widget-title">Рубрики</h1>		<ul>
	<li class="cat-item cat-item-15"><a href="http://deepinside.esy.es/category/programming/sql/" >SQL</a> (1)
</li>
	<li class="cat-item cat-item-16"><a href="http://deepinside.esy.es/category/programming/xml/" >XML</a> (1)
</li>
	<li class="cat-item cat-item-1"><a href="http://deepinside.esy.es/category/%d0%b1%d0%b5%d0%b7-%d1%80%d1%83%d0%b1%d1%80%d0%b8%d0%ba%d0%b8/" >Без рубрики</a> (2)
</li>
	<li class="cat-item cat-item-6"><a href="http://deepinside.esy.es/category/minerals/" >Камни, минералы</a> (1)
</li>
	<li class="cat-item cat-item-3"><a href="http://deepinside.esy.es/category/music/" >Музыка</a> (2)
</li>
		</ul>
</aside><aside id="text-3" class="widget widget_text"><h1 class="widget-title">Топ</h1>			<div class="textwidget"><iframe type="text/html" width="607" height="360" src="http://www.youtube.com/embed/Zz0xttkvSss" frameborder="0"></iframe></div>
		</aside><aside id="text-4" class="widget widget_text"><h1 class="widget-title">Погода</h1>			<div class="textwidget"><!-- Gismeteo informer START -->
<link rel="stylesheet" type="text/css" href="https://bst1.gismeteo.ru/assets/flat-ui/legacy/css/informer.min.css">
<div id="gsInformerID-8wI18oc22Wnfrm" class="gsInformer" style="width:210px;height:189px">
  <div class="gsIContent">
    <div id="cityLink">
    <a href="https://www.gismeteo.ru/city/daily/4569/" target="_blank">Погода в Кургане</a>
    </div>
    <div class="gsLinks">
      <table>
        <tr>
            <td>
            <div class="leftCol">
              <a href="https://www.gismeteo.ru/" target="_blank">
                <img alt="Gismeteo" title="Gismeteo" src="https://bst1.gismeteo.ru/assets/flat-ui/img/logo-mini2.png" align="middle" border="0" />
                <span>Gismeteo</span>
              </a>
            </div>
            <div class="rightCol">
              <a href="https://www.gismeteo.ru/city/weekly/4569/" target="_blank">Прогноз на 2 недели</a>
            </div>
            </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script async src="https://www.gismeteo.ru/api/informer/getinformer/?hash=8wI18oc22Wnfrm" type="text/javascript"></script>
<!-- Gismeteo informer END --></div>
		</aside><aside id="text-2" class="widget widget_text"><h1 class="widget-title">Посещаемость</h1>			<div class="textwidget"><div id="qoo-counter">
<a href="http://qoo.by/" title="Сервис коротких ссылок">
<img src="http://qoo.by/counter/standard/001.png" alt="Укоротить ссылку">
<div id="qoo-counter-visits"></div>
<div id="qoo-counter-views"></div>
</a>
</div>
<script type="text/javascript" src="http://qoo.by/counter.js"></script>
</div>
		</aside></div><!-- #secondary -->
</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
    	<!--footer widgets-->
        <div class="widgets">
        	<!-- Full width widget -->
        	            <!-- Side by side widgets -->
            <div class="wrap">
                                        <div class="footer-center"><aside id="text-6" class="widget widget_text">			<div class="textwidget"><script src="http://101widgets.com/w1439917623-cat3pros&220&182"></script></div>
		</aside></div>
                                    </div>
        </div>
        
        <!-- .... -->
		<div class="site-info">
						<span class="sep"> 
				
			</span>
					</div><!-- .site-info -->
	</footer><!-- #colophon -->
    
    <div id="back_top"><i class="fa fa-angle-up"></i></div></div><!-- #page -->
<script type='text/javascript' src='http://deepinside.esy.es/wp-includes/js/admin-bar.min.js?ver=4.4.2'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-content/themes/the-wp/js/navigation.js?ver=20120206'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-content/themes/the-wp/js/skip-link-focus-fix.js?ver=20130115'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-includes/js/comment-reply.min.js?ver=4.4.2'></script>
<script type='text/javascript' src='http://deepinside.esy.es/wp-includes/js/wp-embed.min.js?ver=4.4.2'></script>
	<script type="text/javascript">
		(function() {
			var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');

			request = true;

			b[c] = b[c].replace( rcs, ' ' );
			b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
		}());
	</script>
			<div id="wpadminbar" class="nojq nojs">
							<a class="screen-reader-shortcut" href="#wp-toolbar" tabindex="1">Перейти к верхней панели</a>
						<div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Верхняя панель" tabindex="0">
				<ul id="wp-admin-bar-root-default" class="ab-top-menu">
		<li id="wp-admin-bar-wp-logo" class="menupop"><a class="ab-item"  aria-haspopup="true" href="http://deepinside.esy.es/wp-admin/about.php"><span class="ab-icon"></span><span class="screen-reader-text">О WordPress</span></a><div class="ab-sub-wrapper"><ul id="wp-admin-bar-wp-logo-default" class="ab-submenu">
		<li id="wp-admin-bar-about"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/about.php">О WordPress</a>		</li></ul><ul id="wp-admin-bar-wp-logo-external" class="ab-sub-secondary ab-submenu">
		<li id="wp-admin-bar-wporg"><a class="ab-item"  href="https://ru.wordpress.org/">WordPress.org</a>		</li>
		<li id="wp-admin-bar-documentation"><a class="ab-item"  href="https://codex.wordpress.org/Заглавная_страница">Документация</a>		</li>
		<li id="wp-admin-bar-support-forums"><a class="ab-item"  href="https://ru.forums.wordpress.org/">Форумы поддержки</a>		</li>
		<li id="wp-admin-bar-feedback"><a class="ab-item"  href="https://ru.forums.wordpress.org/forum/20">Обратная связь</a>		</li></ul></div>		</li>
		<li id="wp-admin-bar-site-name" class="menupop"><a class="ab-item"  aria-haspopup="true" href="http://deepinside.esy.es/wp-admin/">Deep Inside</a><div class="ab-sub-wrapper"><ul id="wp-admin-bar-site-name-default" class="ab-submenu">
		<li id="wp-admin-bar-dashboard"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/">Консоль</a>		</li></ul><ul id="wp-admin-bar-appearance" class="ab-submenu">
		<li id="wp-admin-bar-themes"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/themes.php">Темы</a>		</li>
		<li id="wp-admin-bar-widgets"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/widgets.php">Виджеты</a>		</li>
		<li id="wp-admin-bar-menus"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/nav-menus.php">Меню</a>		</li>
		<li id="wp-admin-bar-background" class="hide-if-customize"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/themes.php?page=custom-background">Фон</a>		</li>
		<li id="wp-admin-bar-header" class="hide-if-customize"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/themes.php?page=custom-header">Заголовок</a>		</li></ul></div>		</li>
		<li id="wp-admin-bar-customize" class="hide-if-no-customize"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/customize.php?url=http%3A%2F%2Fdeepinside.esy.es%2F2016%2F02%2F10%2Fgit%2F">Настроить</a>		</li>
		<li id="wp-admin-bar-comments"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/edit-comments.php" title="0 комментариев ожидают проверки"><span class="ab-icon"></span><span id="ab-awaiting-mod" class="ab-label awaiting-mod pending-count count-0">0</span></a>		</li>
		<li id="wp-admin-bar-new-content" class="menupop"><a class="ab-item"  aria-haspopup="true" href="http://deepinside.esy.es/wp-admin/post-new.php"><span class="ab-icon"></span><span class="ab-label">Добавить</span></a><div class="ab-sub-wrapper"><ul id="wp-admin-bar-new-content-default" class="ab-submenu">
		<li id="wp-admin-bar-new-post"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/post-new.php">Запись</a>		</li>
		<li id="wp-admin-bar-new-media"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/media-new.php">Медиафайл</a>		</li>
		<li id="wp-admin-bar-new-page"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/post-new.php?post_type=page">Страницу</a>		</li>
		<li id="wp-admin-bar-new-user"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/user-new.php">Пользователя</a>		</li></ul></div>		</li>
		<li id="wp-admin-bar-edit"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/post.php?post=266&#038;action=edit">Редактировать запись</a>		</li></ul><ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
		<li id="wp-admin-bar-search" class="admin-bar-search"><div class="ab-item ab-empty-item" tabindex="-1"><form action="http://deepinside.esy.es/" method="get" id="adminbarsearch"><input class="adminbar-input" name="s" id="adminbar-search" type="text" value="" maxlength="150" /><label for="adminbar-search" class="screen-reader-text">Поиск</label><input type="submit" class="adminbar-button" value="Поиск"/></form></div>		</li>
		<li id="wp-admin-bar-my-account" class="menupop with-avatar"><a class="ab-item"  aria-haspopup="true" href="http://deepinside.esy.es/wp-admin/profile.php">Привет, nik<img alt='' src='http://1.gravatar.com/avatar/4097b92575676b3fd1c3cbad1a78c3d2?s=26&#038;d=mm&#038;r=g' srcset='http://1.gravatar.com/avatar/4097b92575676b3fd1c3cbad1a78c3d2?s=52&amp;d=mm&amp;r=g 2x' class='avatar avatar-26 photo' height='26' width='26' /></a><div class="ab-sub-wrapper"><ul id="wp-admin-bar-user-actions" class="ab-submenu">
		<li id="wp-admin-bar-user-info"><a class="ab-item" tabindex="-1" href="http://deepinside.esy.es/wp-admin/profile.php"><img alt='' src='http://1.gravatar.com/avatar/4097b92575676b3fd1c3cbad1a78c3d2?s=64&#038;d=mm&#038;r=g' srcset='http://1.gravatar.com/avatar/4097b92575676b3fd1c3cbad1a78c3d2?s=128&amp;d=mm&amp;r=g 2x' class='avatar avatar-64 photo' height='64' width='64' /><span class='display-name'>nik</span></a>		</li>
		<li id="wp-admin-bar-edit-profile"><a class="ab-item"  href="http://deepinside.esy.es/wp-admin/profile.php">Изменить профиль</a>		</li>
		<li id="wp-admin-bar-logout"><a class="ab-item"  href="http://deepinside.esy.es/wp-login.php?action=logout&#038;_wpnonce=8dcddd1ece">Выйти</a>		</li></ul></div>		</li></ul>			</div>
						<a class="screen-reader-shortcut" href="http://deepinside.esy.es/wp-login.php?action=logout&#038;_wpnonce=8dcddd1ece">Выйти</a>
					</div>

		
<!-- SyntaxHighlighter Stuff -->
<script type="text/javascript" src="http://deepinside.esy.es/wp-content/plugins/syntaxhighlighter-plus/syntaxhighlighter/src/shCore.js"></script>
<script type="text/javascript">
	SyntaxHighlighter.all();
</script>

</body>
</html>

<!-- Dynamic page generated in 0.319 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2016-02-10 12:08:20 -->
