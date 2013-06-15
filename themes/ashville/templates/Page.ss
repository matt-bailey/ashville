 <!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="$ContentLocale"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="$ContentLocale"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="$ContentLocale"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="$ContentLocale"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><% if MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title<% if SiteConfig.Tagline %> - $SiteConfig.Tagline<% end_if %></title>
        $MetaTags(false)
        <% base_tag %>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="$ThemeDir/favicon.ico" />

        <% require themedCSS('bootstrap') %>
        <% require themedCSS('responsive') %>
        <% require themedCSS('layout') %>
        <% require themedCSS('typography') %>
        <% require themedCSS('main') %>
        <% require themedCSS('form') %>
        <% require themedCSS('ss-social') %>
        <% require themedCSS('ss-standard') %>

        <script src="$ThemeDir/js/modernizr-2.6.2.min.js"></script>

        <script type="text/javascript">
        (function() {
            var config = {
            kitId: 'yau7eee',
            scriptTimeout: 3000
        };
        var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
        })();
        </script>
    </head>
    <body class="$SiteNameString $ClassName<% if not $Menu(2) %> no-sidebar<% end_if %>" id="$URLSegment">
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <% include Header %>
        <% include Navigation %>
        <div class="container typography" role="main">
            <% include Breadcrumbs %>
            $Layout
        </div>
        <% include Footer %>
        <% include BackToTop %>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="$themedir/js/jquery-1.9.1.min.js"><\\/script>')</script>
        <!-- Use Requirements::combine_files with these JS includes when you go live! -->
        <script src="$ThemeDir/bootstrap/js/bootstrap-transition.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-alert.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-modal.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-dropdown.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-scrollspy.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-tab.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-tooltip.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-popover.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-button.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-collapse.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-carousel.js"></script>
        <script src="$ThemeDir/bootstrap/js/bootstrap-typeahead.js"></script>
        <script src="$ThemeDir/js/plugins.min.js"></script>
        <script src="$ThemeDir/js/main.min.js"></script>
        <!-- <script src="$ThemeDir/js/ss-social.min.js"></script> -->
        <!-- <script src="$ThemeDir/js/ss-standard.min.js"></script> -->

        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> -->
    </body>
</html>
