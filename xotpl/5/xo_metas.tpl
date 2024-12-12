<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- title and metas -->
<title>
  <{if $xoops_pagetitle !='' }>
        <{$xoops_pagetitle|default:''}> :
  <{/if}>
  <{$xoops_sitename|default:''}>
</title>
<meta http-equiv="content-language" content="<{$xoops_langcode|default:''}>">
<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset|default:''}>">
<meta name="robots" content="<{$xoops_meta_robots|default:''}>">
<meta name="keywords" content="<{$xoops_meta_keywords|default:''}>">
<meta name="description" content="<{$xoops_meta_description|default:''}>">
<meta name="rating" content="<{$xoops_meta_rating|default:''}>">
<meta name="author" content="<{$xoops_meta_author|default:''}>">
<meta name="copyright" content="<{$xoops_meta_copyright|default:''}>">
<meta name="generator" content="XOOPS">
<{if $url|default:false}>
    <meta http-equiv="Refresh" content="<{$time|default:''}>; url=<{$url|default:''}>">
<{/if}>

<!-- Rss -->
<link rel="alternate" type="application/rss+xml" title="" href="<{$xoops_url}>/backend.php">
<!-- path favicon -->
<link rel="shortcut icon" type="image/ico" href="<{$xoops_url}>/favicon.ico">
<!-- Xoops style sheet -->
<link rel="stylesheet" type="text/css" media="screen" href="<{$xoops_url}>/xoops.css">


<link href="<{$xoops_url}>/modules/tadtools/bootstrap5/css/bootstrap.css" rel="stylesheet">

<link href="<{$xoops_url}>/modules/tadtools/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<{$xoops_url}>/modules/tadtools/css/xoops_adm5.css" rel="stylesheet">

<!-- customized header contents -->
<{$xoops_module_header|default:''}>

<link href="<{$theme_css|default:''}>/tad.css" rel="stylesheet">