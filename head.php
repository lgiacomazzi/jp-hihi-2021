	<title><?php echo $seotitle; ?></title>
	
	<base href="<?php echo $site['url']; ?>">
	<link rel="icon" type="image/png" href="img/favicon.png">

	<link rel="apple-touch-icon" href="img/ifavicon_57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="img/ifavicon_72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="img/ifavicon_114.png" />
	
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="<?php echo $seotext; ?>">
	<meta name="keywords" content="<?php echo $seokeys; ?>">
	<meta name="author" content="Oficial.ag">
	<meta name="author" content="JPHigi">

	<meta property="og:title" content="<?php echo $seotitle; ?>" />
	<meta property="og:description" content="<?php echo $seotext; ?>" />
	<meta property="og:type" content="website" />
<?php
    if( !empty($seoimg) ){
        @list($seowidth, $seoheight) = getimagesize($seoimg);
?>
    <meta property="og:image" content="<?php echo $seoimg; ?>" />
	<meta property="og:image:width" content="<?php echo $seowidth; ?>" />
	<meta property="og:image:height" content="<?php echo $seoheight; ?>" />
<?php
    }
?>