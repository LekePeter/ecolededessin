<!DOCTYPE html>
<!--[if IE 8]>         
<html lang="en-gb" dir="ltr" class="layout-home ie8 lt-ie9 lt-ie10 com_content view-featured itemid-435 home j31">
<![endif]-->
<!--[if IE 9]>         
<html lang="en-gb" dir="ltr" class="layout-home ie9 lt-ie10 com_content view-featured itemid-435 home j31">
<![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en-gb" dir="ltr" class="layout-home com_content view-featured itemid-435 home j31">
    <!--<![endif]-->
    <head>
        <base href="{{asset('')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content=" market assessment, marketing plan &amp; strategy development, market research, strategic brand development, customer retainship strategy, business development, web development, goalins.com, wilson ellis" />
        <meta name="description" content="We provide solutions from strategy development to implementation that delivers value to our clients in the areas of; market assessment, marketing plan &amp; strategy development, " />
        <meta name="generator" content="Joomla! - Open Source Content Management" />
        <title>Welcome to Ecole De Dessin Website</title>
        <link rel="stylesheet" href="css/app.css">        
        <link href="http://ecolededessin.org/?view=featured" rel="canonical" />
        <link href="/?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
        <link href="/?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
        <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
        <link href="http://ecolededessin.org/component/search/?format=opensearch" rel="search" title="Search Ecole De Dessin" type="application/opensearchdescription+xml" />
        <link rel="stylesheet" href="css/css-e8e12.css" type="text/css" />
        <link rel="stylesheet" href="css/css-f9653.css" type="text/css" />
        <link rel="stylesheet" href="css/css-7f05b.css" type="text/css" />
        <link rel="stylesheet" href="css/css-31c29.css" type="text/css" />
        <link rel="icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/main.css">    
        <title>{{config('app.name')}}</title>
        <script src="js/mootools-core.js" type="text/javascript"></script>
        <script src="js/core.js" type="text/javascript"></script>
        <script src="js/caption.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery-noconflict.js" type="text/javascript"></script>
        <script src="js/widgetkit-8ba09a51.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/off-canvas.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/menu.js" type="text/javascript"></script>
        <script src="js/responsive.js" type="text/javascript"></script>
        <script src="js/masonry.noconflict.js" type="text/javascript"></script>
        <script src="js/masonry.pkgd.js" type="text/javascript"></script>
        <script src="js/imagesloaded.pkgd.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="js/jquery.infinitescroll.js" type="text/javascript"></script>
        <script src="js/iscroll.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/jquery.equalheight.js" type="text/javascript"></script>
        <script src="js/jquery.address.js" type="text/javascript"></script>
        <script src="js/jquery.article.js" type="text/javascript"></script>
        <script type="text/javascript">
            window.addEvent('load', function() {
                            new JCaption('img.caption');
                        });
              
        </script>
        <!-- META FOR IOS & HANDHELD -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="HandheldFriendly" content="true" />
        <meta name="apple-mobile-web-app-capable" content="YES" />
        <!-- //META FOR IOS & HANDHELD -->
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- For IE6-8 support of media query -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            //<![CDATA[
            var T3JSVars = {
                baseUrl: '',
                tplUrl: '/templates/ja_fixel',
                finishedMsg: '<em>That\'s all.</em>',
                msgText: '<em>Loading the next set of posts...</em>'
            };
            //]]>
        </script>  
    </head>
    <body>
<body>
    @include('inc.navbar')
    @yield('content')
    @include('inc.footer')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
