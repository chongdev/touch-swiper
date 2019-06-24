<?php
$slideshow = array();

$slideshow[] = array(
	'url' => 'images/1.jpg',
);
$slideshow[] = array(
	'url' => 'images/2.jpg',
);
/*$slideshow[] = array(
	'url' => 'images/3.jpg',
);*/

$arr = array();
foreach ($slideshow as $val) {
	$arr[] = array(
		'src'=>  !empty($val['url']) ? $val['url']:'',
		'style' => !empty($val['style']) ? $val['style']: 1,
		'caption' => array(
			'title' => !empty($val['caption']['title']) ? $val['caption']['title']: '',
			'text' => !empty($val['caption']['text']) ? $val['caption']['text']: '',
		),
		'link' => !empty($val['caption']['link']) ? $val['caption']['link']: ''
	);
}



?>
<section id="page-slideshow">
	<div class="slideshow" data-plugins="slideshow">

	<ul id="slide-image" class="slide-image">
		<?php 
		foreach ($arr as $key => $value) { ?>
			<li>
				<?php if( !empty($value['link']) ){
					echo '<a class="stage" href="'.$value['link'].'">';
				}else{ 
					echo '<div class="stage">';
				} ?>
					<!-- <div class="overlay"></div> -->
					<div class="img" style="background-image:url(<?=$value['src']?>)"></div>

					<?php if( !empty($value['caption']['title']) || !empty($value['caption']['text']) ){ ?>
					<div class="caption"><div class="container">
						<div class="box-caption">
							<?php if( !empty($value['caption']['title']) ){ ?>
								<h1 class="title"><?=$value['caption']['title']?></h1>
							<?php } ?>
							<?php if( !empty($value['caption']['text']) ){ ?>
								<div class="text"<?=!empty($section['body_style'])? ' style="'.$section['body_style'].'"':'' ?>><p><?=$value['caption']['text']?></p></div>
							<?php } ?>
						</div>
					</div></div>
					<?php } ?>
				<?php if( !empty($value['link']) ){
					echo '</a>';
				}else{ 
					echo '</div>';
				} ?>

			</li>
		<?php } ?>
	</ul>


	<?php if( count($arr)>1 ){ ?>

	<a class="prevnext prev"><i class="icon-angle-left"></i></a>
	<a class="prevnext next"><i class="icon-angle-right"></i></a>

	<nav class="dotnav">
		<ul>
			<?php foreach ($arr as $key => $value) { ?>
			<li><a class="dotnav-item"></a></li>
			<?php } ?>
		</ul>
	</nav>
	<?php } ?>


</div></section>