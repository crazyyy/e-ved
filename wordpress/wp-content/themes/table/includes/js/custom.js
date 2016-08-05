//Begin!
jQuery(document).ready(function(){

// Slider Init
	$(window).load(function() {
			$('.flexslider').flexslider( {
				keyboardNav: 'true',
				smoothHeight: 'true',
				start: function(slider) {
				        slider.removeClass('loading');
				}				
			});
		});

/*= Menu
---------------------------------------------------------------------*/
    jQuery('ul.nav').superfish({
        //animation: {height:'show'},   // slide-down effect without fade-in
        delay: 10,               // 1.2 second delay on mouseout
        dropShadows: true
    });

   
/*= News Ticker
---------------------------------------------------------------------*/
    var newsTicker = jQuery('li.news-ticker');
    var tickerTimeId = 0;
    var currentNews = 0;
    var olderNews = 0;
    var sumNews = jQuery(newsTicker).size();

    function newsTickerInit(){
        jQuery(newsTicker).eq(0).fadeIn();
        newsTickerClick();
        tickerTimeId = setInterval(autoTicherScroll,6000);
    }
    newsTickerInit();

    function newsTickerClick(){
        jQuery(newsTicker).each(function(index){
            if(!jQuery(this).children('a').is(':hidden')){
                currentNews = index;
            }
        });
        jQuery('a.headline-previous').click(function(){
            clearInterval(tickerTimeId);
            olderNews = currentNews;
            if(currentNews == 0){
                currentNews = sumNews-1;
            }else{
                currentNews = currentNews-1;
            }
            jQuery(newsTicker).eq(olderNews).stop(true,true).fadeOut().queue(function(){
                jQuery(newsTicker).eq(currentNews).stop(true,true).fadeIn();
            });

            tickerTimeId = setInterval(autoTicherScroll,6000);
        });
        jQuery('a.headline-next').click(function(){
            clearInterval(tickerTimeId);
            olderNews = currentNews;
            if(currentNews == sumNews-1){
                currentNews = 0;
            }else{
                currentNews = currentNews+1;
            }
            jQuery(newsTicker).eq(olderNews).stop(true,true).fadeOut().queue(function(){
                jQuery(newsTicker).eq(currentNews).stop(true,true).fadeIn();
            });
            tickerTimeId = setInterval(autoTicherScroll,6000);
        });
    }

    function autoTicherScroll(){
        olderNews = currentNews;
        if(currentNews == sumNews-1){
            currentNews = 0;
        }else{
            currentNews = currentNews+1;
        }
        jQuery(newsTicker).eq(olderNews).stop(true,true).fadeOut().queue(function(){
            jQuery(newsTicker).eq(currentNews).stop(true,true).fadeIn();
        });
    }

	
/*= Overlay Animation
---------------------------------------------------------------------*/

    function tj_overlay(){
        if(!($.browser.msie && ($.browser.version!='9.0'))){
            jQuery('li.portfolio img,li.post img,li.item img').parent('a').hover(
                function(){
                    jQuery(this).find('.overlay').stop(true,true).fadeIn();
                },function(){
                    jQuery(this).find('.overlay').stop(true,true).fadeOut();
            });
        }
    }

	tj_overlay();



// Quick Sand
    function control_quicksand(){

        jQuery('#filter').children('li').each(function(){
            $text = jQuery(this).find('a').text();
            $class = jQuery(this).attr('class');
            $class = $class.replace('cat-item','');
            jQuery(this).find('a').attr('href','');
            jQuery(this).find('a').attr('class',$class);
            jQuery(this).attr('class','');
        });
        
        jQuery('#filter').append('<li class="active" ><a class="all">All</a></li>');

        var $filterType = jQuery('#filter li.active a').attr('class');

        var $holder = jQuery('ul.ourHolder');

        var $data = $holder.clone();

        jQuery('#filter>li a').click(function(e) {
            
            jQuery('#filter li').removeClass('active');
            var $filterType = jQuery(this).attr('class');

            jQuery(this).parent().addClass('active');

            
            if ($filterType == 'all') {

                var $filteredData = $data.children('li');

            }else {

                var $filteredData = $data.find('li[data-type*=' + $filterType + ']');

            }

            $holder.quicksand($filteredData,{
                duration: 500,
                easing: 'easeInOutQuad'
            }, function() {
                //tj_prettyPhoto();
	            tj_overlay();
                        
            });
           
            return false;

        });

    }
    control_quicksand();

/*= Correct Css
---------------------------------------------------------------------*/
    function correct_css(){
        jQuery('embed').each(function(){
            jQuery(this).attr('wmode','opaque');
        });
    }
    correct_css();



/*= Show Calendar Name
---------------------------------------------------------------------*/

    function show_calendar_name(){
        //jQuery('.widget_calendar').children('h3').text('Calendar');
    }
    show_calendar_name();

/*= Remove Entry Img
---------------------------------------------------------------------*/

    function remove_entry_img(){
        //jQuery('div.entry p img,div.slides-post-content-img img').remove();
    }
    remove_entry_img();


//End ready!
})
