
<footer class="footer py-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="footer-content d-flex justify-content-between align-items-center">
					<span>© Egegen</span>
					<span>Logo</span>
				</div>
			</div>
		</div>
	</div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mySwiper", {
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});

	var buton_offset, buton_limit;

	$(".more-btn").on("click", function(e) {
		e.preventDefault();
		var buton = $(this);
		buton_limit = buton.data("limit");
		buton_offset = buton.attr("data-offset");
		$.ajax({
			url: '/fetch_news',
			type: 'POST',
			data: {limit: buton_limit, offset: buton_offset},
			beforeSend: function(bs) {
				buton.prop("disabled", true);
			},
			success: function(donen) {
				if(donen.status) {
					$(donen.news).each(function(i, v) {
						buton.attr("data-offset", (parseInt(buton_offset) + 3));
						$(".contents-list").append(`<div class="content d-flex mb-3">
							<div class="content-img flex-shrink-0">
							<img src="${v.news_image}" alt="${v.news_title}">
							</div>
							<div class="content-text py-2">
							<h3 class="content-title">${v.news_title}</h3>
							<p>${v.news_content}</p>
							</div>
							</div>`)
					})
					if(!donen.last) {
						buton.prop("disabled", false);
					}
				}else {

				}
			}
		});
	})
</script>
</html>