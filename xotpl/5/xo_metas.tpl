<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- title and metas -->
<title>
  <{if $xoops_pagetitle !='' }>
        <{$xoops_pagetitle}> :
  <{/if}>
  <{$xoops_sitename}>
</title>
<meta http-equiv="content-language" content="<{$xoops_langcode}>" />
<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />
<meta name="robots" content="<{$xoops_meta_robots}>" />
<meta name="keywords" content="<{$xoops_meta_keywords}>" />
<meta name="description" content="<{$xoops_meta_description}>" />
<meta name="rating" content="<{$xoops_meta_rating}>" />
<meta name="author" content="<{$xoops_meta_author}>" />
<meta name="copyright" content="<{$xoops_meta_copyright}>" />
<meta name="generator" content="XOOPS" />
<{if $url}>
    <meta http-equiv="Refresh" content="<{$time}>; url=<{$url}>" />
<{/if}>

<!-- Rss -->
<link rel="alternate" type="application/rss+xml" title="" href="<{xoAppUrl backend.php}>" />
<!-- path favicon -->
<link rel="shortcut icon" type="image/ico" href="<{xoAppUrl favicon.ico}>" />
<!-- Xoops style sheet -->
<link rel="stylesheet" type="text/css" media="screen" href="<{xoAppUrl xoops.css}>" />


<link href="<{$xoops_url}>/modules/tadtools/bootstrap5/css/bootstrap.css" rel="stylesheet">

<link href="<{$xoops_url}>/modules/tadtools/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<{$xoops_url}>/modules/tadtools/css/xoops_adm5.css" rel="stylesheet">

<!-- customized header contents -->
<{$xoops_module_header}>

<link href="<{$theme_css}>/tad.css" rel="stylesheet">