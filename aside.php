<!-- ASIDE -->
<div id="aside" class="col-md-3">
	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Categories</h3>
		<div class="checkbox-filter">

			<?php foreach ($getNameAndCountProtypes as $itemType) {
				?>
				<div class="input-checkbox">
					<input type="checkbox" id="category-<?php echo $itemType['type_id'] ?>">
					<label for="category-<?php echo $itemType['type_id'] ?>">
						<span></span>
						<?php echo $itemType['type_name'] ?>
						<small>(<?php echo $itemType['Tong'] ?>)</small>
					</label>
				</div>

				<?php
			} ?>



		</div>
	</div>
	<!-- /aside Widget -->

	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Price</h3>
		<div class="price-filter">
			<div id="price-slider"></div>
			<div class="input-number price-min">
				<input id="price-min" type="number">
				<span class="qty-up">+</span>
				<span class="qty-down">-</span>
			</div>
			<span>-</span>
			<div class="input-number price-max">
				<input id="price-max" type="number">
				<span class="qty-up">+</span>
				<span class="qty-down">-</span>
			</div>
		</div>
	</div>
	<!-- /aside Widget -->

	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Brand</h3>
		<div class="checkbox-filter">

			<?php foreach ($getManuNameAndCountManu as $item) {
				?>
				<div class="input-checkbox">
					<input type="checkbox" id="brand-<?php echo $item['manu_id'] ?>">
					<label for="brand-<?php echo $item['manu_id'] ?>">
					<span></span>
						<?php echo $item['manu_name'] ?>
						<small> (<?php echo $item['Tong'] ?>)</small>
					</label>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<!-- /aside Widget -->

	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Top selling</h3>
		<?php foreach ($getProductsLimit3 as $value1): foreach ($getAllProtypes as $value2):
			if ($value1['type_id'] == $value2['type_id']): ?>
					<div class="product-widget">
						<div class="product-img">
							<img src="./img/<?php echo $value1['image']; ?>" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">
								<?php echo $value2['type_name']; ?>
							</p>
							<h3 class="product-name"><a href="product.php?id=<?php echo $value1['id'] ?>">
									<?php echo $value1['name']; ?>
								</a></h3>
							<h4 class="product-price">
								<?php echo number_format($value1['price']) ?>VNĐ
								<!--<del class="product-old-price">VNĐ</del>-->
							</h4>
						</div>
					</div>
				<?php endif; endforeach; endforeach; ?>
	</div>
	<!-- /aside Widget -->
</div>
<!-- /ASIDE -->