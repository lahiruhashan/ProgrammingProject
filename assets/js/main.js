if(!Date.prototype.toISOString) 
{
    Date.prototype.toISOString = function() 
	{
        function pad(n) {return n < 10 ? '0' + n : n}
        return this.getUTCFullYear() + '-'
            + pad(this.getUTCMonth() + 1) + '-'
                + pad(this.getUTCDate()) + 'T'
                    + pad(this.getUTCHours()) + ':'
                        + pad(this.getUTCMinutes()) + ':'
                            + pad(this.getUTCSeconds()) + 'Z';
    };
}
function onAfterSlide(prevSlide, currentSlide)
{
	$("#" + $(currentSlide).attr("id") + "_content").fadeIn();
	$(".slider_navigation .more").css("display", "none");
	$("#" + $(currentSlide).attr("id") + "_url").css("display", "block");
}
function onBeforeSlide()
{
	$(".slider_content").fadeOut();
}
var map = null;
function gm_authFailure() 
{
	if($("#map").length)
		alert('Please define Google Maps API Key.\nReplace YOUR_API_KEY with the key generated on https://developers.google.com/maps/documentation/javascript/get-api-key\nin below line before the </head> closing tag <script type="text/javascript" src="//maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>');
}
jQuery(document).ready(function($){
	//mobile menu
	$(".mobile_menu select").change(function(){
		window.location.href = $(this).val();
		return;
	});
	
	//slider
	$(".slider").carouFredSel({
		responsive: true,
		prev: {
			button: '#prev',
			onAfter: onAfterSlide,
			onBefore: onBeforeSlide
		},
		next: {
			button: '#next',
			onAfter: onAfterSlide,
			onBefore: onBeforeSlide
		},
		auto: {
			play: true,
			pauseDuration: 5000,
			onAfter: onAfterSlide,
			onBefore: onBeforeSlide
		}
	},
	{
		wrapper: {
			classname: "caroufredsel_wrapper caroufredsel_wrapper_slider"
		}
	});
	
	//upcoming classes
	$(".upcoming_classes").carouFredSel({
		responsive: true,
		direction: "up",
		items: {
			visible: 3
		},
		scroll: {
			items: 1,
			easing: "swing",
			pauseOnHover: true
		},
		prev: '#upcoming_class_prev',
		next: '#upcoming_class_next',
		auto: {
			play: true
		}
	});
	
	//training_classes
	$(".training_classes").accordion({
		event: 'change',
		heightStyle: 'content'
	});
	$(".tabs").tabs({
		event: 'change',
		create: function(){
			$("html, body").scrollTop(0);
		}
	});
	
	//browser history
	$(".tabs .ui-tabs-nav a").on("click", function(){
		if($(this).attr("href").substr(0,4)!="http")
			$.bbq.pushState($(this).attr("href"));
		else
			window.location.href = $(this).attr("href");
	});
	$(".ui-accordion .ui-accordion-header").on("click", function(){
		$.bbq.pushState("#" + $(this).attr("id").replace("accordion-", ""));
	});
	
	//hashchange
	$(window).bind("hashchange", function(event){
		var hashSplit = $.param.fragment().split("-");
		if(hashSplit[0].substr(0,7)!="filter=")
		{
			$(".ui-accordion .ui-accordion-header#accordion-" + $.param.fragment()).trigger("change");
			$(".ui-accordion .ui-accordion-header#accordion-" + hashSplit[0]).trigger("change");
			$(".tabs .ui-tabs-nav [href='#" + $.param.fragment() + "']").trigger("change");
		}
		// get options object from hash
		var hashOptions = $.deparam.fragment();
		if(typeof(hashOptions.filter)!="undefined")
		{
			// apply options from hash
			$(".isotope_filters a").removeClass("selected");
			if($(".isotope_filters a[href='#filter="+hashOptions.filter+"']").length)
				$(".isotope_filters a[href='#filter="+hashOptions.filter+"']").addClass("selected");
			else
				$(".isotope_filters li:first a").addClass("selected");
			$(".gallery").isotope(hashOptions);
			//$(".timetable_isotope").isotope(hashOptions);
		}
		
		//open gallery details
		if(location.hash.substr(1,21)=="gallery-details-close" || typeof(hashOptions.filter)!="undefined")
		{
			$(".gallery_item_details_list").animate({height:'0'},{duration:200,easing:'easeOutQuint', complete:function(){
				$(this).css("display", "none")
				$(".gallery_item_details_list .gallery_item_details").css("display", "none");
			}
			});
		}
		else if(location.hash.substr(1,15)=="gallery-details")
		{
			var detailsBlock = $(location.hash);
			$(".gallery_item_details_list .gallery_item_details").css("display", "none");
			detailsBlock.css("display", "block");
			var galleryItem = $("#gallery-item-" + location.hash.substr(17));
			detailsBlock.find(".prev").attr("href", (galleryItem.prevAll(":not('.isotope-hidden')").first().length ? galleryItem.prevAll(":not('.isotope-hidden')").first().find(".open_details").attr("href") : $(".gallery").children(":not('.isotope-hidden')").last().find(".open_details").attr("href")));
			detailsBlock.find(".next").attr("href", (galleryItem.nextAll(":not('.isotope-hidden')").first().length ? galleryItem.nextAll(":not('.isotope-hidden')").first().find(".open_details").attr("href") : $(".gallery").children(":not('.isotope-hidden')").first().find(".open_details").attr("href")));
			var visible=parseInt($(".gallery_item_details_list").css("height"))==0 ? false : true;
			var galleryItemDetailsOffset;
			if(!visible)
			{
				$(".gallery_item_details_list").css("display", "block").animate({height:detailsBlock.height()}, 500, 'easeOutQuint', function(){
					$(this).css("height", "100%");
				});
				galleryItemDetailsOffset = $(".gallery_item_details_list").offset();
				$("html, body").animate({scrollTop: galleryItemDetailsOffset.top-10}, 400);
			}
			else
			{
				/*$(".gallery_item_details_list").animate({height:'0'},{duration:200,easing:'easeOutQuint',complete:function() 
				{
					$(this).css("display", "none")*/
					$(".gallery_item_details_list").css("height", detailsBlock.height());
					galleryItemDetailsOffset = $(".gallery_item_details_list").offset();
					$("html, body").animate({scrollTop: galleryItemDetailsOffset.top-10}, 400);
					$(".gallery").isotope( 'updateSortData');
					/*$(".gallery_item_details_list").css("display", "block").animate({height:detailsBlock.height()},{duration:500,easing:'easeOutQuint'});
				}});*/
			}
		}
	}).trigger("hashchange");
	
	//footer recent posts, most commented, most viewed
	$(".latest_tweets, .footer_recent_posts, .most_commented, .most_viewed").carouFredSel({
		direction: "up",
		items: {
			visible: 3
		},
		scroll: {
			items: 1,
			easing: "swing",
			pauseOnHover: true,
			height: "variable"
		},
		auto: {
			play: false
		}
	});
	$(".latest_tweets").trigger("configuration", {
		items: {
			visible: ($(".latest_tweets").children().length>2 ? 3 : $(".latest_tweets").children().length)
		},
		prev: '#latest_tweets_prev',
		next: '#latest_tweets_next'
	});
	$(".footer_recent_posts").trigger("configuration", {
		prev: '#footer_recent_posts_prev',
		next: '#footer_recent_posts_next'
	});
	$(".most_commented").trigger("configuration", {
		prev: '#most_commented_prev',
		next: '#most_commented_next'
	});
	$(".most_viewed").trigger("configuration", {
		prev: '#most_viewed_prev',
		next: '#most_viewed_next'
	});
	
	if($("#map").length)
	{
		//google map
		var coordinate = new google.maps.LatLng(-37.732304, 144.868641);
		var mapOptions = {
			zoom: 12,
			center: coordinate,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			streetViewControl: false,
			mapTypeControl: false
		};

		map = new google.maps.Map(document.getElementById("map"),mapOptions);
		new google.maps.Marker({
			position: new google.maps.LatLng(-37.732304, 144.868641),
			map: map,
			icon: new google.maps.MarkerImage(($("#map").hasClass("map_html") ? "../images/map_pointer.png" : "images/map_pointer.png"), new google.maps.Size(29, 38), null, new google.maps.Point(14, 37))
		});
	}
	
	//window resize
	$(window).resize(function(){
		//$(".training_classes").accordion("resize");
		if(map!=null)
			map.setCenter(coordinate);
	});
	
	//scroll top
	$("a[href='#top']").click(function() {
		$("html, body").animate({scrollTop: 0}, "slow");
		return false;
	});

	//tooltip
	$(".tooltip").bind("mouseover click", function(){
		var position = $(this).position();
		var tooltip_text = $(this).children(".tooltip_text");
		tooltip_text.css("width", $(this).outerWidth() + "px");
		tooltip_text.css("height", tooltip_text.height() + "px");
		tooltip_text.css({"top": position.top-tooltip_text.innerHeight() + "px", "left": position.left + "px"});
	});
	
	//contact form
	$(".contact_form").submit(function(event){
		event.preventDefault();
		var data = $(this).serializeArray();
		var self = $(this);
		self.find(".block").block({
			message: false,
			overlayCSS: {opacity:'0.3'}
		});
		$.ajax({
			url: self.attr("action"),
			data: data,
			type: "post",
			dataType: "json",
			success: function(json){
				self.find("[name='submit'], [name='name'], [name='email'], [name='message']").qtip('destroy');
				if(typeof(json.isOk)!="undefined" && json.isOk)
				{
					if(typeof(json.submit_message)!="undefined" && json.submit_message!="")
					{
						self.find("[name='submit']").qtip(
						{
							style: {
								classes: 'ui-tooltip-success'
							},
							content: { 
								text: json.submit_message 
							},
							position: { 
								my: "right center",
								at: "left center" 
							}
						}).qtip('show');
						self[0].reset();
						self.find("input[type='text'], textarea").trigger("focus").trigger("blur");
					}
				}
				else
				{
					if(typeof(json.submit_message)!="undefined" && json.submit_message!="")
					{
						self.find("[name='submit']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.submit_message 
							},
							position: { 
								my: "right center",
								at: "left center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_name)!="undefined" && json.error_name!="")
					{
						self.find("[name='name']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_name 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_email)!="undefined" && json.error_email!="")
					{
						self.find("[name='email']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_email 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_message)!="undefined" && json.error_message!="")
					{
						console.log(self.find("[name='message']").length);
						
						self.find("[name='message']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_message 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
				}
				self.find(".block").unblock();
			}
		});
	});
});