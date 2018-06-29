    <!--======= PAGES INNER =========-->
<section class="item-detail-page pad-t-b-80" style="margin-top: 40px">
	<div class="container">
		<div class="row">



			<!--======= IMAGES SLIDER =========-->
			<div class="col-sm-6 large-detail">
				<div class="images-slider">
					<ul class="slides">
						<?
						foreach($images as $image):?>
						<li   data-thumb="<?= base_url().'/static/products/'.$product['id'].'/'.$image?>"> 
						
						<img   style="width: 570px;height: 660px; object-fit: cover" class="img-responsive" 
						src="<?= base_url().'/static/products/'.$product['id'].'/'.$image?>"  alt=""> </li>


						<? endforeach ;?>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>

			<!--======= ITEM DETAILS =========-->
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<h5><?= $product['title']?></h5>
						<? if($show):?>
						<span class="price"><?= $product['price']?> NOK</span> </div>
						<? endif;?>
					<div class="col-sm-12">
						<a href="<?= base_url().'/store/'.$category['id'] ?>"><span class="code"><?= $category['category']?></span></a>
						<div class="some-info">
							<div class="in-stoke">
								<i class="fa fa-check-circle"></i> <?= lang('IN STOCK')?></div>
							<div class="stars">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i></div>
							<a href="#review"  class="review">(3) Review</a> &nbsp;&nbsp;&nbsp;
							<a href="#review-form" class="review">Add Your Review</a></div>
					</div>
				</div>
				<p><?= $product['desc']?></p>
				<hr>
				<div class="row">

				</div>
				<div class="row">
					<!-- QUIENTY -->
					<div class="col-sm-12">
						<div class="fun-share">
							<input type="number" id="qty" value="1" min="1">
							<a href="#." id="add_to_cart" class="btn btn-small btn-dark"><?= lang('add_to_cart')?></a>
							<a href="#." class="share-sec">
								<i class="ion-shuffle"></i></a>
							<a class="share-sec" href="#.">
								<i class="fa fa-heart"></i></a> </div>
					</div>
					<!-- SHARE -->
					<!--<div class="col-sm-12">
						<ul class="share-with">
							<li>
								<p>SHARE WITH</p>
							</li>
							<li>
								<a href="#.">
									<i class="fa fa-facebook"></i></a></li>
							<li>
								<a href="#.">
									<i class="fa fa-twitter"></i></a></li>
							<li>
								<a href="#.">
									<i class="fa fa-dribbble"></i></a></li>
							<li>
								<a href="#.">
									<i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div>

		<!--======= PRODUCT DESCRIPTION =========-->
		<div class="item-decribe">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#descr" role="tab" data-toggle="tab"><?= lang('description')?></a></li>
				<li role="presentation" >
					<a href="#review" role="tab" data-toggle="tab"><?= lang('review')?> (03)</a></li>
					
					
				<? if ($product['video']) :?>
				<li role="presentation" >
					<a href="#video" role="tab" data-toggle="tab"><?= lang('video')?></a></li>
					
				<? endif;?>	
				<!--<li role="presentation">
					<a href="#tags" role="tab" data-toggle="tab">TAGS</a></li>-->
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<!-- DESCRIPTION -->
				<div role="tabpanel" class="tab-pane fade in active" id="descr">
							<?= $product['text'] ?>

				</div>

				<!-- REVIEW -->
				<div role="tabpanel" class="tab-pane fade" id="review">
					<h6>3 REVIEWS FOR SHIP YOUR IDEA</h6>

					<!-- REVIEW PEOPLE 1 -->
					<div class="media">
						<div class="media-left">
							<!--  Image -->
							<div class="avatar">
								<a href="#"> <img class="media-object" src="images/avatar-1.jpg" alt=""> </a> </div>
						</div>
						<!--  Details -->
						<div class="media-body">
							<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
								labore et dolore magna aliqua.”</p>
							<h6>TYRION LANNISTER
								<span class="pull-right">June 7, 2013</span> </h6>
						</div>
					</div>

					<!-- REVIEW PEOPLE 1 -->

					<div class="media">
						<div class="media-left">
							<!--  Image -->
							<div class="avatar">
								<a href="#"> <img class="media-object" src="images/avatar-2.jpg" alt=""> </a> </div>
						</div>
						<!--  Details -->
						<div class="media-body">
							<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
								labore et dolore magna aliqua.”</p>
							<h6>TYRION LANNISTER
								<span class="pull-right">June 7, 2013</span> </h6>
						</div>
					</div>

					<!-- ADD REVIEW -->
					<h6 class="margin-t-40">ADD REVIEW</h6>
					<form id="review-form">
						<ul class="row">
							<li class="col-sm-6">
								<label> *NAME
									<input type="text" value="" placeholder="">
								</label>
							</li>
							<li class="col-sm-6">
								<label> *EMAIL
									<input type="email" value="" placeholder="">
								</label>
							</li>
							<li class="col-sm-12">
								<label> *YOUR REVIEW
									<textarea></textarea>
								</label>
							</li>
							<li class="col-sm-6">
								<!-- Rating Stars -->
								<div class="stars">
									<span>YOUR RATING</span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i></div>
							</li>
							<li class="col-sm-6">
								<button type="submit" class="btn btn-dark btn-small pull-right no-margin">POST REVIEW</button>
							</li>
						</ul>
					</form>
				</div>

				<!-- TAGS -->
				
				<? if ($product['video']) :?>
				
					<div role="tabpanel" class="tab-pane fade" id="video">
					
					
					 </div>
					
				<? endif;?>	
				
			</div>
		</div>
	</div>
</section>

<section class="item-detail-page pad-t-b-80" style="margin-top: 40px">
	
</section>
<script>
	$('#add_to_cart').on('click',function(){
		let append = $.post("<?= base_url().'user/addtocart'?>",{ id: "<?= $product['id']?>", qty: $('#qty').val()} );
		append.then(e=>{
			let result = JSON.parse(e);
			if(result.error === undefined){
				$('#cart_total').text(result.done);
				$('#cart_total').focus();
			}
		})
	})
</script>

