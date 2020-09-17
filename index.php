<?php
	$template = "page-home";
	require_once "includes/controller.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php	include "includes/analytics.php";		 ?>

<?php	include "includes/head.php";		 ?>

<?php	include "includes/css.php"; ?>

<link rel="stylesheet" type="text/css" href="plugins/ab_fade_slider2/abf2_css.css" />
<link href="plugins/lightbox/src/css/lightbox.css" rel="stylesheet">

</head>
<body id="<?php echo $template; ?>">
    <div class="container-fluid">
	
		<!--		HEADER		-->
		<?php	include "includes/header.php"; ?>
		
		<!--		SLIDESHOW		-->
		<div class="row">
			<div class="col-md-12 maxpage auto relative">
				<?php include "plugins/ab_fade_slider2/abf2_php.php"; ?>
			</div>
		</div>
		
		<!--		INSTITUCIONAL		-->
		<div class="row home_institucional">
			<div class="col-md-12">
				<div class="hr_home_inst maxpage auto"></div>
				<h4 class="home_inst_call">
					<a href="<?php echo $links['conheca']; ?>" class="trn">
						<?php echo $cont->all['titulo1'][0]; ?>
					</a>
				</h4>
				<h3 class="home_inst_title margot">
					<?php echo $cont->all['titulo2'][0]; ?>
				</h3>
				<?php echo $cont->all['text1'][0]; ?>
				<div class="scrollbar hdn">
				<ul class="row home_inst_destaque auto">
<?php			if($cont->all['active'][1]){		?>
					<!--		INSTIT 1		-->
					<li class="<?php echo getColFeatHome($nfeathome); ?>">
						<a href="<?php echo $links['conheca']; ?>#historia" class="item">
							<figure style="background-image:url(adm/conteudo/<?php echo $cont->all['img1'][1]; ?>);"></figure>
							<div class="bg_inst_home"></div>
							<h5>
								<?php echo $cont->all['titulo1'][1]; ?>
							</h5>
						</a>
					</li>
<?php			}if($cont->all['active'][2]){		?>
					<!--		INSTIT 2		-->
					<li class="<?php echo getColFeatHome($nfeathome); ?>">
						<a href="<?php echo $links['conheca']; ?>#proposta-pedagogica" class="item">
							<figure style="background-image:url(adm/conteudo/<?php echo $cont->all['img1'][2]; ?>);"></figure>
							<div class="bg_inst_home"></div>
							<h5>
								<?php echo $cont->all['titulo1'][2]; ?>
							</h5>
						</a>
					</li>
<?php			}if($cont->all['active'][3]){		?>
					<!--		INSTIT 3		-->
					<li class="<?php echo getColFeatHome($nfeathome); ?>">
						<a href="<?php echo $links['conheca']; ?>#motivos" class="item">
							<figure style="background-image:url(adm/conteudo/<?php echo $cont->all['img1'][3]; ?>);"></figure>
							<div class="bg_inst_home"></div>
							<h5>
								<?php echo $cont->all['titulo1'][3]; ?>
							</h5>
						</a>
					</li>
<?php			}if($cont->all['active'][4]){		?>
					<!--		INSTIT 4		-->
					<li class="<?php echo getColFeatHome($nfeathome); ?>">
						<a href="<?php echo $links['conheca']; ?>#projetos" class="item">
							<figure style="background-image:url(adm/conteudo/<?php echo $cont->all['img1'][4]; ?>);"></figure>
							<div class="bg_inst_home"></div>
							<h5>
								<?php echo $cont->all['titulo1'][4]; ?>
							</h5>
						</a>
					</li>
<?php			}		?>
				</ul>
				</div>
				<!--		INSTIT BUTTON		-->
				<div class="alcenter">
					<a href="<?php echo $links['conheca']; ?>" class="nohover">
						<button type="button" class="home_conheca_button insti ptsans trn">
							<?php echo $cont->all['botao1'][0]; ?>
						</button>
					</a>
				</div>
			</div>
		</div>
		
		<!--		CALENDARIO		-->
		<div class="row">
			<div class="col-md-12">
				<div class="maxpage auto">
					<p class="calendar_title">
						<a href="<?php echo $links['calendario']; ?>" class="trn">
							<?php echo $cont->all['titulo1'][5]; ?>
						</a>
					</p>
					<p class="calendar_text margot">
						<?php echo nl2br($cont->all['area1'][5]); ?>
					</p>
				</div>
				
				<!--		MES E ANO		-->
<?php 			include "includes/ano-mes.php";		 ?>
				<div class="filter-inner calendar none tb-block">
<?php				include "includes/ano-mes-mob.php";		 ?>
				</div>

<?php			if($calendar->nrows > 12){
					$maxcal = 12;
				}else{
					$maxcal = $calendar->nrows;
				}		?>
				<!--		CALENDARIO		-->
				<div class="scrollbar hdn">
				<div id="calendar_home" class="row calendar_base auto" >
<?php 				if($calendar->nrows < 13){
						echo '<style>@media (max-width: 1199px){.calendar_base{width:'.($calendar->nrows * 212 + 50).'px;}}</style>';
					}else{
						echo '<style>@media (max-width: 1199px){.calendar_base{width:'.(12 * 212 + 50).'px;}}</style>';
					}		 ?>
<?php			for($i = 0; $i < $calendar->nrows && $i < 12; $i++){		?>
					<div class="col-xl-2 col-md-2 col-xs-2 calhomefix">
<?php				if(!empty($calendar->all['text'][$i])){	?>
						<a href="<?php echo $links['evento']; ?><?php echo $calendar->all['slug'][$i]; ?>" class="nohover">
<?php				}	?>
							<div class="calendar_item">
								<div class="calendar_header">
									<?php echo calendarDate($calendar->all['datep'][$i],$calendar->all['dateout'][$i]); ?>
								</div>
								<p class="calendar_categ firacond">
									<?php echo $catsecs[$calendar->all['flink'][$i]]; ?>
								</p>
								<p class="calendar_desc">
									<?php echo $calendar->all['title'][$i]; ?>
								</p>
								<div class="calendar_turmas">
<?php								$arrayacad = explode('*#*',$calendar->all['author'][$i]);
									foreach($arrayacad as $hasacad){
										if(!empty($hasacad)){
											echo '<div class="turma">'.getAbrev($hasacad).'</div>';
										}
									}		?>
								</div>
							</div>
<?php				if(!empty($calendar->all['text'][$i])){	?>
						</a>
<?php				}	?>
					</div>
<?php				}		?>
				</div>
				</div>
				<div class="maxpage auto">
					<a href="<?php echo $links['calendario']; ?>" class="nohover">
						<button type="button" class="home_conheca_button ptsans trn">
							<?php echo $cont->all['botao1'][5]; ?>
						</button>
					</a>
				</div>
			</div>
		</div>
		
		<!--		PUBLICACOES		-->
		<div class="row home_publi relative hdn">
			<div class="mask_carrousel pubhome left"></div>
			<div class="mask_carrousel pubhome right on"></div>
			<!--<button type="button" class="carrousel_button left pubhome " onclick="moveCar('left','pubhomebar', <?php echo (212 * $public->nrows); ?>,212, 'pubhome')"></button>
			<button type="button" class="carrousel_button right on pubhome " onclick="moveCar('right','pubhomebar', <?php echo (212 * $public->nrows); ?>,212, 'pubhome')"></button>-->
			<div class="col-md-12">
				<div class="maxpage auto">
					<p class="calendar_title">
						<a href="<?php echo $links['publicacoes']; ?>" class="trn">
							<?php echo $cont->all['titulo1'][6]; ?>
						</a>
					</p>
					<p class="calendar_text margot">
						<?php echo $cont->all['titulo2'][6]; ?>
					</p>
				</div>
                <?php
                    if($public->nrows > 12){
                        $maxpubhome = 12;
                    }else{
                        $maxpubhome = $public->nrows;
                    }
                ?>
				<div class="publi_scrollbar hdn relative">
					<div class="scrollbar maxpage auto">
					<ul id="pubhomebar" class="publi_home_list newhome relative hdn" style="width:<?php echo ($maxpubhome * 212 + 5); ?>px;">
<?php				for($i = 0; $i < $public->nrows & $i < 12; $i++){
						if(!empty($public->all['img'][$i])){
							$tempimg = 'adm/produtos/'.$public->all['img'][$i];
						}else{
							$tempimg = 'img/defaultpublic.jpg';
						}
						?>
						<li>
							<a href="<?php echo $links['post']; ?><?php echo $public->all['slug'][$i]; ?>">
								<figure style="background-image:url(<?php echo $tempimg; ?>);"></figure>
								<p class="publi_categ firacond">
									<?php echo $catsecs[$public->all['text'][$i]]; ?>
								</p>
								<p class="publi_desc">
									<?php echo $public->all['title'][$i]; ?>
								</p>
							</a>
						</li>
<?php				}		?>
					</ul>
					</div>
				</div>
				<div class="maxpage auto">
					<a href="<?php echo $links['publicacoes']; ?>" class="nohover">
						<button type="button" class="home_conheca_button ptsans trn">
							<?php echo $cont->all['botao1'][6]; ?>
						</button>
					</a>
				</div>
			</div>
		</div>
		
		<!--		INSTAGRAM		-->
		<div class="row home_insta hdn relative">
			<div class="mask_carrousel insta left"></div>
			<div class="mask_carrousel insta right on"></div>
			<button type="button" class="carrousel_button left insta " onclick="moveCar('left','instafeed', <?php echo (212 * 20); ?>,212, 'insta')"></button>
			<button type="button" class="carrousel_button right on insta " onclick="moveCar('right','instafeed', <?php echo (212 * 20); ?>,212, 'insta')"></button>
			<div class="col-md-12">
				<div class="maxpage auto">
					<p class="calendar_title">
						<a href="<?php echo $links['ins']; ?>" class="trn" target="_blank">
							<?php echo $cont->all['titulo1'][7]; ?>
						</a>
					</p>
					<p class="calendar_text margot">
						<?php echo $cont->all['titulo2'][7]; ?>
					</p>
				</div>
				<div class="publi_scrollbar hdn relative">
					<div class="scrollbar maxpage auto">
					<ul id="instafeed" class="publi_home_list insta relative hdn" style="width:<?php echo (212 * 20 + 10); ?>px;">
					</ul>
					</div>
				</div>
				<div class="maxpage auto">
					<a href="<?php echo $links['ins']; ?>" class="nohover" target="_blank">
						<button type="button" class="home_conheca_button ptsans trn">
							<?php echo $cont->all['botao1'][7]; ?>
						</button>
					</a>
				</div>
			</div>
		</div>
		
		<!--		FOOTER		-->
		<?php	include "includes/footer.php"; ?>
		
		<!--		JAVASCRIPT		-->
		<?php	include "includes/js.php"; ?>
		<script type="text/javascript" src="plugins/ab_fade_slider2/abf2_js.js"></script>
		<script>abf2_nslides = <?php echo $nslides; ?>;</script>
		<script>abf2_active = true;</script>
        
	    <script src="plugins/lightbox/src/js/lightbox.js"></script>
        <a id="covid" href="img/covid-19.png" data-lightbox="galeria"></a>
<?php   if($lightbox){   ?>
        <script>
            $("#covid").trigger("click");
        </script>
<?php   }   ?>
		
		<script type="text/javascript" src="plugins/instafeed/instafeed.min.js"></script>	
		<script type="text/javascript">
            $(document).ready(function() {
                
                var userFeed = new Instafeed({
                    get: 'user',
                    userId: '17841407053889478',
                    accessToken: 'IGQVJYMmQzWUtYQ202Mlk5dDFGU1VHTlhFLUIzSTZAVSjRCaXM4YUpMQUQxenprbGo5SjZAKZAU5RcUZAnQ25GV0wxZAk1OTklKeTg1Ul9SR0lpdGV6WTRCVmR5Rzh4ZAFItZAGZANZAFpVZAkp5aTJ6QWp5dnVfQQZDZD',
                    resolution: "low_resolution",
				    template: '<a href="{{link}}" class="nohover instagram" target="_blank"><li><figure style="background-image:url({{image}});"></figure><button type="button" class="insta_button">Veja mais</button></li></a>',
                    limit: 20
                });
                userFeed.run();
                
            });

			/*var feed = new Instafeed({
				get: 'user',
				userId: '17841407053889478',
				accessToken: 'IGQVJXeWhnS3pxOTJES3YtZAXJ6ZAGNiekdqSTRnQVBhSW9Eek1OaUJVTTBJMDJiMnpEaTVrazMzRWZAiZAFV0RkNsRmE2ZAmZAzUFduejdXdUVkUi1Cakl5bmUtWTRzVXl6d3ZAXWTBuSkl4dnBJaHBubTJrZA0MtMjNJQ1h4Ukp3',
				template: '<a href="{{link}}" class="nohover instagram" target="_blank"><li><figure style="background-image:url({{image}});"></figure><button type="button" class="insta_button">Veja mais</button></li></a>',
				resolution:'low_resolution',
				limit:20
			});
			feed.run();*/
		</script>
        

	</div>
</body>
</html>