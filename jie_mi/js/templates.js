

const listItemTemplate = templater(o => `
<a class="col-xs-12 col-md-4" href="product_item.php?id=${o.id}">
	<figure class="figure product display-flex flex-column">
		<div class="flex-stretch">
			<img src="/aau/wnm608/jie_mi/img/${o.thumbnail}" alt="">
		</div>
		<figcaption class="flex-none">
			<div>&dollar;${o.price.toFixed(2)}</div>
			<div>${o.name}</div>
		</figcaption>
	</figure>
</a>
`);