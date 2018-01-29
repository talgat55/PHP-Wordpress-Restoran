<?php
/* 
*
*Template Name: Контакты
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row">
				<h1 class="section-title">Контакты</h1>
			</div>	

		</div>
			<div style="position: relative;"> 
			<div class="map-overlay-block-wallpaper">
				<!--<div class="container">
					<div class="row padding-row">-->
					<div class="map-overlay-block">
						<h4>Адрес</h4>
						<p>Иртышская Набережная 11\2</p>
						<span class="border-bottom-adress"></span>
						<h4>Телефон</h4>
						<p class="font-lato-light"><a href="tel:+73812530935">+7 (3812) 53-09-35</a></p>
						<span class="border-bottom-adress"></span>
						<h4>Время работы</h4>
						<p class="font-lato-light">
							ПН - ЧТ - с 11:00 до 23:00</br>
							ПТ - СБ - с 11:00 до 01:00</br>
							ВС – с 12:00 до 23:00</p>
						<span class="border-bottom-adress"></span>
						<h4>Почта</h4>
						<p ><a href="mailto:baloven-omsk@mail.ru">baloven-omsk@mail.ru</a></p> 
					
					</div>
					<!--</div>
				</div>-->
			</div>

			<div id="map" width="100%" class="ya_map">
			



			</div>
			</div>
		<div class="container">

		<div class="row padding-row">
			<div class="contact-page-social clearfix">
				<ul class="contact-page-social-list">
					<li class="page-social-item">
						<a href="">
						<img src="<?php  echo get_theme_file_uri( '/assets/images/fb.png' ) ?>">
						</a>
					</li>

					<li class="page-social-item">
						<a href="">
						<img src="<?php  echo get_theme_file_uri( '/assets/images/vk.png' ) ?>">
						</a>
					</li>

					<li class="page-social-item">
						<a href="">
						<img src="<?php  echo get_theme_file_uri( '/assets/images/inst.png' ) ?>">
						</a>
					</li>


				</ul>
			</div>
			<div class="letter-contact clearfix">
				<div class="col-md-6">
					<div class="block-text-contact-page">
						<h2>Написать письмо управляющему</h2>
						<p>Мы всегда рады получить от Вас обратную связь, и не важно будь то критика, пожелание или простой отзыв о нашем ресторане. </p>
					</div>
				</div>
				<div class="col-md-6">
						<?php  echo do_shortcode('[contact-form-7 id="152" title="Контактная форма 1"]'); ?>
				</div>

			</div>
		</div>

		</div>






 	</section>
 

<?php get_footer();
