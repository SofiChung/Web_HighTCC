$(window).load(function(){
		
				var image = $('#highway');

				image.mapster(
				{
					staticState: true,
					strokeOpacity: 1,
					strokeWidth: 2.5,
					singleSelect: true,
					
					onClick: function linktogo(data) {
									if (this.href && this.href !== '#') {
										location.replace(this.href);
									}
								},
					
					mapKey: 'name',
					listKey: 'name',
					areas: [
						{	
							key: "route1",
							fill: true,
							stroke: false,
							fillOpacity: 1,
							fillColor: "FB3A3A"
						},
						{
							key: "route2",
							isSelectable: false,
							stroke: false,
							fill: true,
							fillOpacity: 1,
							fillColor: "3AFB67"
							
						},
						{
							key: "allroute",
							stroke: true,
							strokeColor: "ffffff",
							fill: false
						}
						]
				});
				
			
			}); 			