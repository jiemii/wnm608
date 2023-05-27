const listItemTemplate = templater(o => `
<a class="col-xs-12 col-md-4" href="web_product_item.php?id=${o.id}">
	<figure class="figure product display flex flex-column">
		<div class="flex-stretch">
		<img src="img/${o.images}" alt="" >	
		</div>
		
		
		<figcaption class="flex-none">
			<div>&dollar;${o.price}</div>
			<div>${o.name}</div>			
		</figcaption>
	</figure>
</a>
`);