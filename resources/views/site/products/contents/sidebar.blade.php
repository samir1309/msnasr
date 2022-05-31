<div class="sidebar">
	<div class="accordion" id="accordionFilter">
		<div class="row w-100 m-0">
			<div class="col-sm-12 p-list-custom">
				<div class="accordion-item bg-white">
					<h2 class="accordion-header" id="heading1">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
							فیلتر بر اساس قیمت
						</button>
					</h2>
							<div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
						data-bs-parent="#accordionFilter">
						<div class="accordion-body">
							<div class="range-box">
								<div class="row w-100 mx-0 mt-3">
																	<div class="col-sm-6 col-xs-6 p-0">
																		<div class="row w-100 m-0">
																			<div
																				class="col-xl-12 text-center align-self-center p-1">
																				<small
																					class="m-0 text-secondary">
																					تا
																				</small>
																			</div>
																			<div
																				class="col-xl-12 align-self-center p-1">
																				<input type="number"
																					min=0
																					max="10000000"
																					oninput="validity.valid||(value='10000000');"
																					id="max_price"
																					class="price-range-field w-100 text-center rounded-custom border text-secondary" />
																			</div>
																			<div
																				class="col-xl-12 text-center align-self-center p-1">
																				<small
																					class="m-0 text-secondary">
																					تومان
																				</small>
																			</div>
																				</div>
																			</div>
																			<div class="col-sm-6 col-xs-6 p-0">
																				<div class="row w-100 m-0">
																			<div
																				class="col-xl-12 text-center align-self-center p-1">
																				<small
																					class="m-0 text-secondary">
																					از
																				</small>
																			</div>
																			<div
																				class="col-xl-12 align-self-center p-1">
																				<input type="number"
																					min=0
																					max="10000000"
																					oninput="validity.valid||(value='0');"
																					id="min_price"
																					class="price-range-field w-100 text-center rounded-custom border text-secondary" />
																			</div>
																			<div  class="col-xl-12 text-center align-self-center p-1">
																				<small
																					class="m-0 text-secondary">
																					تومان
																				</small>
																			</div>
																		
																			</div>
																			<div class="col-md-12 p-1">
																				<button type="submit"
																					class="btn btn-success w-100 rounded-pill">
																					اعمال فیلتر
																				</button>
																			</div>
																	</div>
																</div>
															
																	</div>
						
					
																</div>
					</div>
				</div>
			</div>
		
			<div class="col-sm-12 p-list-custom">
				<div class="accordion-item bg-white">
					<h2 class="accordion-header" id="heading2">
						<button class="accordion-button" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
							فیلتر بر اساس برند ها
						</button>
					</h2>
					<div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="heading2"
						data-bs-parent="#accordionFilter">
						<div class="accordion-body">
							<input v-model="searchValue"  type="search" name=""  id="" 
								class="form-control mb-2" placeholder="جستجوی برند، مثلا : جاکومو"/>
							<div class="py-0 brd" style="  height: 10rem; overflow-y: scroll;">
								<div class="form-check" v-for="item in brandSearch">
									<input class="form-check-input" type="checkbox" :value="item.id"
										@change="filterProducts()" v-model="selected3">
									<label class="form-check-label ms-1">
										@{{ item.title }}
									</label>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
	
		</div>
	</div>
</div>
<script>
																	// price range
																	(function ($) {
																		$('#price-range-submit').hide();
																		$("#min_price,#max_price").on('change', function () {
																			$('#price-range-submit').show();
																			var min_price_range = parseInt($("#min_price").val());
																			var max_price_range = parseInt($("#max_price").val());
																			if (min_price_range > max_price_range) {
																				$('#max_price').val(min_price_range);
																			}
																			$("#slider-range").slider({
																				values: [min_price_range, max_price_range]
																			});
																		});
																		$("#min_price,#max_price").on("paste keyup", function () {
																			$('#price-range-submit').show();
																			var min_price_range = parseInt($("#min_price").val());
																			var max_price_range = parseInt($("#max_price").val());
																			if (min_price_range == max_price_range) {
																				max_price_range = min_price_range + 1000;
																				$("#min_price").val(min_price_range);
																				$("#max_price").val(max_price_range);
																			}
																			$("#slider-range").slider({
																				values: [min_price_range, max_price_range]
																			});
																		});
																		$(function () {
																			$("#slider-range").slider({
																				range: true,
																				orientation: "horizontal",
																				min: 0,
																				max: 10000000,
																				values: [0, 10000000],
																				step: 100,
																				slide: function (event, ui) {
																					if (ui.values[0] == ui.values[1]) {
																						return false;
																					}
																					$("#min_price").val(ui.values[0]);
																					$("#max_price").val(ui.values[1]);
																				}
																			});
																			$("#min_price").val($("#slider-range").slider("values", 0));
																			$("#max_price").val($("#slider-range").slider("values", 1));
																		});
																		$("#slider-range,#price-range-submit").click(function () {
																			var min_price = $('#min_price').val();
																			var max_price = $('#max_price').val();
																			$("#searchResults").text("در اینجا لیستی از محصولات نشان داده می شود که هزینه آنها بین آنهاست " + min_price + " " + "and" + " " + max_price + ".");
																		});
																	})(jQuery);
																</script>