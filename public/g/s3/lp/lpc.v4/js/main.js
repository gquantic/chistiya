;(function () {
  var $win = $(window),
    $doc = $(document),
    $body = $("body"),
    initializedMaps = [],
    lpc_template = {},
    isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
	isApple = /iPod|iPad|iPhone/i.test(navigator.userAgent);

  window.lpc_template = lpc_template;

  lpc_template.queue = {};

  lpc_template.queue.checkBgImg = function ($self) {
	$('.lp-block-bg._photo_avaiable').each(function(){
		var bgWh = $(this).css('background-image');
		if(bgWh != "none") {
			$(this).addClass('_there-photo');
		}
	})
  };
  
  
  	lpc_template.queue.lpcAboutPopupLink  = function($self) {
		
	    document.addEventListener('lpcPopupFormInitDone', function(){
	      $('a[href^="popup:"]').removeClass('lpc_pointer_events_none');
	    });
	};
	
	lpc_template.queue.lpcSharePopupBtn  = function($self) {
		var $block = $self.find('.lpc-share-1');
			
		if ($block.length && $block.find('.lpc-share-1__button').length) {	
				$('.lpc-share-1__button').each(function(){
					var $shareItems = $(this).parents('.lpc-share-1').find(".ya-share2__popup"),
						$sharePopup = $(this).parents('.lpc-share-1').find(".lpc-share-1__popup"),
						$sharePopupParent = $(this).parents('.lpc-share-1').find(".ya-share2_custom"),
						$buttonWidth = $(this).parents('.lpc-share-1').find(".lpc-share-1__button").outerWidth();
						
						
					$shareItems.clone().appendTo($sharePopup);
					$sharePopupParent.css('width', $buttonWidth);
				});
			
			
			$doc.on("click", function (e) {
				if (!$(e.target).closest($('.lpc-share-1__button')).length && !$(e.target).closest($('.ya-share2_custom')).length) {
					$doc.find(".lpc-share-1__popup").removeClass("_opened");
				};
			});
			
			$('.lpc-share-1__button').on('click', function(){
			
				if($(this).closest('.lpc-share-1__wrap').find('.lpc-share-1__popup').hasClass('_opened')){
					$(this).closest('.lpc-share-1__wrap').find('.lpc-share-1__popup').removeClass('_opened');
				}else {
					$('.lpc-share-1__popup._opened').removeClass('_opened');
					$(this).closest('.lpc-share-1__wrap').find('.lpc-share-1__popup').addClass('_opened');
				}
				
				var popupHeight = $(this).closest('.lpc-share-1__wrap').find('.ya-share2_custom .ya-share2__popup').height();
			});
		}
	};
  
  	lpc_template.queue.fpInit = function($self) {
		var $block = $self.find('.js-lp-fastpay');
	
		if ($block.length) {
	
			$block.on('click', '.js-fp-show-form', function(e) {
				e.preventDefault();
	
				var $this = $(this),
					$parent = $this.closest('.js-lp-fastpay'),
					needHref = $parent.data('page-path'),
					serviceID = $this.data('service-id'),
					fastPayID = $this.closest('.lp-payment-service-item').attr('data-fastpay-id');
					
					$this.addClass('_opened');
					
				$.ajax({
					url: '/my/s3/xapi/public/?method=fastpay/getService&param[service_id]='+serviceID+'&param[fast_pay_id]='+ fastPayID +'&param[tpl]=global:lpc4.fast_payment.tpl',
					success: function(data) {
						var htmlForm = data.result.html;
						var $newBlock = $this.closest('.lp-payment-service-item').append(htmlForm);
						s3LP.initForms($newBlock);
						$this.closest('.lp-payment-service-item').find('.lp-payment-service-item_button').hide();
						var needAttr = $self.find('.lp-payment__form').attr('data-api-url') + "&param[href]=" + needHref;
						$newBlock.find('.lp-payment__form').attr('data-api-url', needAttr);
						$this.closest('.lp-payment-service-item').find('.payment-selection:first').addClass('_active');
					}
				});
				
			});
	
			$block.find('.fp_free_wrap').each(function() {
				var $this = $(this).find('.js-lp-fp-form'),
					$parent = $this.closest('.js-lp-fastpay'),
					needHref = $parent.data('page-path'),
					needAttr = $this.attr('data-api-url') + "&param[href]=" + needHref;
		
				$this.attr('data-api-url', needAttr);
		
			});
			
			$block.on('click', '.payment-selection-in', function(e) {
				$(this).each(function () {
					e.preventDefault();
					$(this).parent('.payment-selection').siblings('.payment-selection').removeClass('_active');
					$(this).parent('.payment-selection').addClass('_active');
					$(this).siblings('.type-radio-payment').click();
				});
			});
			
		}
	};
	
	
	
  
  lpc_template.queue.popupTouch = function(){
  	$('a[href^="popup:"]').on('click', function (){
  		setTimeout(function() {
  			lpc_template.popupAdaptiveBlock();
  			
  			document.dispatchEvent(new Event(`lpcPopupOpened`, {bubbles: true}));
  			
  			if ($('.lp-popup-wrapper form').find('input[data-alias=product_name]').val() == ""){
  				$('.lp-popup-wrapper form').find('input[data-alias=product_name]').val("Форма");
  			}
  		 }, 80);
  	})
  };
  
  lpc_template.queue.popupTouchClose = function(){
  	$('.js-close-popup').bind('click', function(event){
	})
  };

  const adaptiveBlockEvent = new Event('dataMediaSourceChange');
  window.adaptiveBlockEvent = adaptiveBlockEvent; // сделано чтобы была возможность дергать скрипт, для сайтов с версией для слабовидящих
  
  $(document).on('click', '.color-theme a', function(){
  	setTimeout(function(){
    	document.dispatchEvent(adaptiveBlockEvent);
    }, 100);
  }); // исправление переключение цвета в старой версии для слабовидящих https://staff.megagroup.ru/staff/sites/?site_id=1085232

  checkMediaSource = function(media) {
    if(lpc_template.media_source != media) {
      lpc_template.media_source = media;
      document.dispatchEvent(adaptiveBlockEvent);
    }
  }
  

  lpc_template.adaptiveBlock = function () {

    let decorWrap = document.querySelector(".decor-wrap");

    if(decorWrap) {
    let decorWrapWidth = decorWrap.offsetWidth;
      if (decorWrapWidth < 480) {
        decorWrap.setAttribute("data-media-source", "media-xs");
        checkMediaSource('media-xs');
      } else if (decorWrapWidth < 768) {
        decorWrap.setAttribute("data-media-source", "media-sm");
        checkMediaSource('media-sm');
      } else if (decorWrapWidth < 992) {
        decorWrap.setAttribute("data-media-source", "media-md");
        checkMediaSource('media-md');
      } else if (decorWrapWidth < 1280) {
        decorWrap.setAttribute("data-media-source", "media-lg");
        checkMediaSource('media-lg');
      } else if (decorWrapWidth >= 1280) {
        decorWrap.setAttribute("data-media-source", "media-xl");
        checkMediaSource('media-xl');
      }
    }
  };
  
  lpc_template.popupAdaptiveBlock = function () {
  
    let decorPopupWrap = document.querySelector(".lp-popup-inner .decor-wrap");
	
    if(decorPopupWrap) {
    let decorPopupWrapWidth = decorPopupWrap.offsetWidth;
      if (decorPopupWrapWidth < 468) {
        decorPopupWrap.setAttribute("data-media-source", "media-xs");
        checkMediaSource('media-xs');
      } else if (decorPopupWrapWidth < 740) {
        decorPopupWrap.setAttribute("data-media-source", "media-sm");
        checkMediaSource('media-sm');
      } else if (decorPopupWrapWidth < 992) {
        decorPopupWrap.setAttribute("data-media-source", "media-md");
        checkMediaSource('media-md');
      } else if (decorPopupWrapWidth < 1280) {
        decorPopupWrap.setAttribute("data-media-source", "media-lg");
        checkMediaSource('media-lg');
      } else if (decorPopupWrapWidth >= 1280) {
        decorPopupWrap.setAttribute("data-media-source", "media-xl");
        checkMediaSource('media-xl');
      }
    }
  };
  
  

  lpc_template.checkMapInitialization = function ($blocks) {
    $blocks.each(function () {
      var $this = $(this),
        id = $this.attr("id");

      if (initializedMaps.includes(id)) {
        return;
      }

      var inViewport = isElementInViewport(this);

      if (inViewport) {
        initializedMaps.push(id);

        lpc_template.initMaps($this);
      }
    });
  };

  lpc_template.initGoogleMaps = function (options) {
    var map = new google.maps.Map(document.getElementById(options.id), {
      zoom: parseInt(options.zoom),
      scrollwheel: false,
      center: new google.maps.LatLng(options.center[0], options.center[1]),
    });

    $.each(options.data, function (key, item) {
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(item.coords[0], item.coords[1]),
        map: map,
        title: item.name,
      });

      var infowindow = new google.maps.InfoWindow({
        content:
          '<div class="baloon-content">' +
          '<h3 style="margin: 0; padding-bottom: 3px;">' +
          item.name +
          "</h3>" +
          item.desc +
          "</div>",
      });

      google.maps.event.addListener(marker, "click", function () {
        infowindow.open(map, marker);
      });
    });
  };

  lpc_template.initYandexMaps = function (options, objectListFlag) {
	let $wrapper = $('#'+options.id).parents('.lpc-block');
	if (objectListFlag) {
		let groups = options.data;

		var map = new ymaps.Map(options.id, {
	        center: options.center,
	        zoom: options.zoom,
	        behaviors: ["drag", "rightMouseButtonMagnifier"],
	    }, {
	        searchControlProvider: 'yandex#search'
	    });

		for (var i = 0; i < groups.length; i++) {
			createGroup(groups[i]);
		}
		
		if (options.data[0].items.length > 1) {
            map.setBounds(map.geoObjects.getBounds());
        }
		
	} else {
	    var map = new ymaps.Map(options.id, {
	      center: options.center,
	      zoom: options.zoom,
	      behaviors: ["drag", "rightMouseButtonMagnifier"],
	    });
	};

    map.controls.add(new ymaps.control.ZoomControl());

    var MyBalloonContentLayoutClass = ymaps.templateLayoutFactory.createClass(
      '<div class="baloon-content" style="padding: 0 10px;">' +
        '<h3 style="margin: 0;">$[properties.name]</h3>' +
        "<p>$[properties.desc]</p>" +
        "</div>"
    );
    
    var myCollection = new ymaps.GeoObjectCollection();

    $.each(options.data, function (key, item) {
      myCollection.add(
        new ymaps.Placemark(item.coords, item, {
          balloonContentLayout: MyBalloonContentLayoutClass,
          iconLayout: 'default#image',
           iconImageHref: this.image,
           iconImageOffset: [-15, -15]
        })
      );
    });

    map.geoObjects.add(myCollection);

    $("#" + options.id).data("ymaps", map);

	function createGroup(group) {
		var collection = new ymaps.GeoObjectCollection(null, { preset: group.style });
		map.geoObjects.add(collection);
	
		for (var j = 0; j < group.items.length; j++) {
			createItems(group.items[j], collection, j);
		}
	}
	
	function createItems(item, collection, index) {
		var placemark = new ymaps.Placemark(item.center, { balloonContent: item.name });
		collection.add(placemark);
	
		$wrapper.find('.lpc-map-click').eq(index).on('click', function () {
			if (!placemark.balloon.isOpen()) {
				placemark.balloon.open();
			} else {
				placemark.balloon.close();
			}
			map.setCenter(placemark.geometry.getCoordinates(), map.getZoom(), {
				duration: 500
			});
			return false;
		});
	}
  };

  lpc_template.initMaps = function ($block) {
    var options = $block.data("init-params");
	var isObjectList = $block.data("object-list");

    options = typeof options === "string" ? JSON.parse(options.replace(/\n/g, "\\n")) : options;

    if (typeof options.center === "string") {
      options.center = options.center.split(",");
    }

    $.each(options.data, function (key, item) {
      if (typeof item.coords === "string") {
        item.coords = item.coords.split(",");
      }
    });

    var keyMap = options.key;

    if (options.type === "google") {
      if (window.google && window.google.maps) {
        lpc_template.initGoogleMaps(options);
      } else {
        var script = document.createElement("script");
        script.async = "async";
        script.src = `//maps.googleapis.com/maps/api/js?key=${keyMap}`;
        document.body.append(script);

        script.onload = function () {
          lpc_template.initGoogleMaps(options);
        };
      }
    } else {
      if (window.ymaps && window.ymaps.Map) {
        lpc_template.initYandexMaps(options, isObjectList);
      } else {
        var htmlLang = document.documentElement.lang;
        var script = document.createElement("script");
        script.async = "async";
        if (htmlLang == "en") {
		  if (options.key!="") {
			script.src = `//api-maps.yandex.ru/2.1/?apikey=${keyMap}&lang=en_RU`;
		  } else {
			script.src = `//api-maps.yandex.ru/2.1/?lang=en_RU`;  
		  }
        } else {
		  if (options.key!="") {
			script.src = `//api-maps.yandex.ru/2.1/?apikey=${keyMap}&lang=ru_RU`;
		  } else {
			script.src = `//api-maps.yandex.ru/2.1/?lang=ru_RU`;  
		  }
        }

        document.body.append(script);

        script.onload = function () {
          ymaps.ready(function () {
            lpc_template.initYandexMaps(options, isObjectList);
          });
        };
      }
    }
  };
  
  
  lpc_template.queue.lpcTriggerPopupBlock = function ($self) {
  		var $block = $self.find("[data-form-time-finish]");
  		if($block.length){
  			document.addEventListener('lpcTriggerPopupInitDone', function(){
		    	lpc_template.popupAdaptiveBlock();
		    });

  			$block.each(function(){
  				var test22 = $(this).data('form-time-finish');
  				
  				
				    test22 = new Date(test22).toUTCString();
				    //var c_value = escape(value) + ((test22 === null || test22 === undefined) ? "" : "; expires=" + test22);
				    //document.cookie = name + "=" + c_value;
				
				createCookie("lpctriggertest", "1", { expires: test22, path: '/', });
  			});
  		}
  };

  lpc_template.queue.lpcTimer = function ($self) {
    var $block = $self.find(".js-lp-timer"),
      htmlLang = document.documentElement.lang,
      timerDays,
      timerHours,
      timerMinutes,
      timerSeconds,
      formatOut;

    if (htmlLang == "de" || htmlLang == "en") {
      timerDays = "Days";
      timerHours = "Hours";
      timerMinutes = "Minutes";
      timerSeconds = "Seconds";
    } else {
      timerDays = "Дней";
      timerHours = "Часов";
      timerMinutes = "Минут";
      timerSeconds = "Секунд";
    }

    var formatOut =
      '<div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">%d</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerDays +
      '</div></div><div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">%h</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerHours +
      '</div></div><div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">%m</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerMinutes +
      '</div></div><div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">%s</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerSeconds +
      "</div></div>";
    var formatEnd =
      '<div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">00</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerDays +
      '</div></div><div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">00</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerHours +
      '</div></div><div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">00</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerMinutes +
      '</div></div><div class="lp-ui-timer__item"><div class="lp-ui-timer__item-number lp-header-title-2" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-number">00</div><div class="lp-ui-timer__item-text lp-header-text-3" data-elem-type="text" data-lp-selector=".lp-ui-timer__item-text">' +
      timerSeconds +
      "</div></div>";

    if ($block.length) {
      $block.each(function () {
        var $this = $(this);

        $this.lpcTimer({
          format_in: "%d.%M.%y %h:%m:%s",
          language: htmlLang,
          update_time: s3LP.is_cms ? 100000 : 1000,
          format_out: formatOut,
          onEnd: function () {
            //$this.html(formatEnd);
            
            $this.closest('.lp-ui-timer-wrapper').hide();
          },
        });
      });
    }
  };

  lpc_template.queue.formInputs = function ($self) {
    $doc.on("click", ".js-select, .js-multi_select", function () {
      var $this = $(this),
        openedClass = "_opened",
        $thisParent = $this.closest(
          ".lp-form-tpl__field-select, .lp-form-tpl__field-multi_select"
        ),
        $thisList = $thisParent.find(
          ".lp-form-tpl__field-select__list, .lp-form-tpl__field-multi_select__list"
        );

       if(!s3LP.is_cms){
	      if ($thisParent.hasClass(openedClass)) {
	        $thisParent.removeClass(openedClass);
	        //$thisList.slideUp();
	        
	      } else {
	        $thisParent.addClass(openedClass);
	        //$thisList.slideDown();
	      }
      }
      
      if(s3LP.is_cms){
      	
      	if ($thisList.hasClass(openedClass)) {
	        $thisList.removeClass(openedClass);
	      } else {
	        $thisList.addClass(openedClass);
	      }
      }
    });
    $(document).ready(function () {
      $(".js-choose-select._checked").each(function () {
        var $this = $(this),
          thisText = $this.text(),
          $thisParent = $this.closest(".lp-form-tpl__field-select"),
          checkedClass = "_checked";

        $thisParent.find(".js-choose-select").removeClass(checkedClass);
        $thisParent.find(".lp-form-tpl__field-select__input").text(thisText);
        $thisParent.parent().find("input").val(thisText);
      });
    });

    $doc.on("click", ".js-choose-select", function () {
      var $this = $(this),
        thisText = $this.text(),
        $thisParent = $this.closest(".lp-form-tpl__field-select"),
        checkedClass = "_checked";

      if (!$this.hasClass(checkedClass)) {
        $thisParent.find(".js-choose-select").removeClass(checkedClass);
        $this.addClass(checkedClass);
        $thisParent.find(".lp-form-tpl__field-select__input").text(thisText);
        $thisParent.parent().find("input").val(thisText);
      }

      //$thisParent.find(".lp-form-tpl__field-select__list").slideUp();
      $thisParent.removeClass("_opened");
    });

    $doc.on("click", ".js-choose-milti_select", function () {
      var $this = $(this),
        $thisParent = $this.closest(".lp-form-tpl__field-multi_select"),
        checkedClass = "_checked";

      if (!$this.hasClass(checkedClass)) {
        $this.addClass(checkedClass);
      } else {
        $this.removeClass(checkedClass);
      }

      var choosenElements = $thisParent.find("." + checkedClass),
        choosenElementsText = [];

      choosenElements.each(function () {
        choosenElementsText.push($(this).text());
      });

      $thisParent
        .find(".lp-form-tpl__field-multi_select__input--count")
        .text(choosenElements.length);
      $thisParent.parent().find("input").val(choosenElementsText.join(", "));
    });

	$doc.on("click", function (e) {
		if(!s3LP.is_cms) {
			if (!$(e.target).closest('.lp-form-tpl__field-select').length) {
				$doc.find(".lp-form-tpl__field-select").removeClass("_opened");
				//$doc.find(".lp-form-tpl__field-select__list") .slideUp();
			};
			
			if (!$(e.target).closest('.lp-form-tpl__field-multi_select').length) {
				$doc.find(".lp-form-tpl__field-multi_select").removeClass("_opened");
				//$doc.find(".lp-form-tpl__field-multi_select__list") .slideUp();
			}
		}
	});
  };
  

  	lpc_template.queue.popupFormHiddenInput = function ($self) {
  		if($doc.find("[data-alias='product_name']" && $doc.find("[data-form-hide-input]"))){
  			$doc.on("click", function (e) {
  				
  				if($(e.target).closest('.lpc-popup-hide-input-check').length) {
  					var $this = $(this),
  						prodName = $(e.target).closest('.lpc-product-name').find('[data-name-product]').data('name-product');
  					
  					$('.lp-popup-wrapper form input[data-alias=product_name]').val(prodName);
  				}
  			});
  		}
  	};
  	
  	lpc_template.queue.fortuneWheel = function ($self) {
  		let $block = $self.find('.fortune-wheel');
		if ($block.length) {
			$block.each(function(){
				let $this = $(this);
				var parent = $this.closest('.lpc-block');
				var parentId = parent.attr('id');

				var padding = {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0
				},
				w = 460 - padding.left - padding.right,
				h = 460 - padding.top - padding.bottom,
				r = Math.min(w, h) / 2,
				rotation = 0,
				oldrotation = 0,
				picked = 100000,
				oldpick = [],
				rotate = 0,
				color = d3.scale.category20(); //category20c()
				var form = parent.find('form');
				var sendText = parent.find('.question__after-send').data('send-text');
				var checkPopupBlock = parent.attr('data-popup-block');
				var popupBlockBtn = parent.find('.lpc-popup-fortune__custom-btn');
				
				function hexToRgb(hex) {
				  // Удаляем возможный символ #
				  hex = hex.replace(/^#/, '');
				
				  // Проверяем наличие корректной длины
				  if (hex.length !== 6) {
				    throw new Error('Неправильный формат шестнадцатеричного цвета. Ожидается формат "#RRGGBB".');
				  }
				
				  // Разбиваем на составляющие R, G и B
				  const r = parseInt(hex.slice(0, 2), 16);
				  const g = parseInt(hex.slice(2, 4), 16);
				  const b = parseInt(hex.slice(4, 6), 16);
				
				  return { r, g, b };
				}
				
				function getContrastColor(rgbStr) {
				  let customBg = hexToRgb(rgbStr);
				  let textColor = Math.round((customBg.r * 299 + customBg.g * 587 + customBg.b * 114) / 1000);
				  return (textColor > 150) ? '#000' : '#fff';
				}
			
				var data = $this.data("labels");
				data = data.replace(/,$/, '');
				data = JSON.parse('[' + data + ']');
				
				var infiniteRotate = $this.data("infinite")
				
				var svg = d3.select('#'+parentId + ' .fortune-wheel')
					.append("svg")
					.data([data])
					.attr("width", w + padding.left + padding.right)
					.attr("height", h + padding.top + padding.bottom);
				
				var container = svg.append("g")
					.attr("class", "chartholder")
					.attr("transform", "translate(" + (w / 2 + padding.left) + "," + (h / 2 + padding.top) + ")");
					
				container.append("circle")
					.attr("cx", 0)
					.attr("cy", 0)
					.attr("r", 230)
					.style({
						"fill": "var(--primary-color-base)"
					});
				
				var vis = container
					.append("g");
					
				if(infiniteRotate) {
					vis.attr("class", "infinite-rotate");
				}
					
				if(data.length % 2 === 0 && data.length / 2 % 2 !== 0) {
					rotate = 360 / data.length / 2;
					vis.style({
						"rotate": rotate + "deg"
					});
				} 
				
				var pie = d3.layout.pie().sort(null).value(function(d) {
					return 1;
				});
				
				// declare an arc generator function
				var arc = d3.svg.arc().outerRadius(r);
				
				// select paths, use arc generator to draw
				var arcs = vis.selectAll("g.slice")
					.data(pie)
					.enter()
					.append("g")
					.attr("class", "slice");
				
				
				arcs.append("path")
					.attr("fill", function(d, i) {
						return i % 2 ? 'var(--primary-color-base)' : 'var(--primary-color-l-5)';
					})
					.attr("d", function(d) {
						return arc(d);
					});
				
				// add the text
				arcs.append("text")
					.attr("text-anchor", "middle")
					.attr("class", "lp-header-text-3")
					.style({
						"fill": function() {
							// Получаем fill у path, к которому относится текущий текстовый элемент
							let pathFill = d3.select(this.parentNode).select("path").attr("fill");
							let pathFillColor = getComputedStyle(document.documentElement).getPropertyValue(pathFill.match(/var\((.*?)\)/)?.[1])
							return getContrastColor(pathFillColor);
						  }
					})
					.text(function(d, i) {
						return data[i].label;
				});


				function beforeSubmitActions(event) {
					event.preventDefault();
					container.call(spin);
				}
				
				
				function firstStepSpin(event) {
					event.preventDefault();
					container.call(popupspin);
					
					setTimeout(function() {
						parent.find('.lpc-popup-fortune__step-1').hide();
						parent.find('.lpc-popup-fortune__step-2').show();
					}, 3000);
					
				}
				
				if(checkPopupBlock) {
					popupBlockBtn.on('click', firstStepSpin);
					
					form.on('submit', popupSubmit);
					
					$('.lpc-popup-fortune__finish-btn').on('click', function(){
						$(this).closest('.lp-popup-wrapper').find('.js-close-popup').trigger('click');	
					});
				}else {
					form.on('submit', beforeSubmitActions);
				}
				
				
				wrap(arcs.selectAll("text"), 140);
				
				function wrap(text, width) {
				
					text.each(function() {
						var text = d3.select(this),
							words = text.text().split(/\s+/).reverse(),
							word,
							line = [],
							lineNumber = 0,
							lineHeight = 1, // ems
							y = text.attr("y"),
							dy = 0,
							tspan = text.text(null).append("tspan").attr("x", 0).attr("y", y).attr("dy", dy + "em");
						while (word = words.pop()) {
							line.push(word);
							tspan.text(line.join(" "));
							if (tspan.node().getComputedTextLength() > width) {
								line.pop();
								tspan.text(line.join(" "));
								line = [word];
								tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", Math.sqrt(++lineNumber) * lineHeight + dy + "em").text(word);
							}
							text.attr("transform", function(d) {
								d.innerRadius = 0;
								d.outerRadius = r;
								d.angle = (d.startAngle + d.endAngle) / 2;
								return "rotate(" + (d.angle * 180 / Math.PI - 90 + 1.75 - lineNumber * 2) + ")translate(" + (d.outerRadius - 90) + ")";
							})
						}
					});
				}
				
				
				function spin(d) {
				
					container.on("click", null);
				
					//all slices have been seen, all done
					//console.log("OldPick: " + oldpick.length, "Data length: " + data.length);
					if (oldpick.length == data.length) {
						container.on("click", null);
						return;
					}
				
					var ps = 360 / data.length,
						pieslice = Math.round(1440 / data.length),
						
						rng = Math.floor((Math.random() * 1440) + 360);
						
					rotation = (Math.round(rng / ps) * ps);
				
					picked = Math.round(data.length - (rotation % 360) / ps);
					picked = picked >= data.length ? (picked % data.length) : picked;
				
				
					if (oldpick.indexOf(picked) !== -1) {
						d3.select(this).call(spin);
						return;
					} else {
						oldpick.push(picked);
					}
				
					rotation += 90 - Math.round(ps / 2) - rotate;
					
					if(infiniteRotate) {
						setTimeout(function () {
							vis.attr("class", "stop-rotate");
						}, 2600);
					}
					
					
					vis.transition()
						.style({
							"animation-duration": "2.9s"
						})
						.duration(3000)
						.attrTween("transform", rotTween)
						.each("end", function() {
							
							//mark question as seen
		                    d3.select('#' + parentId + ' .slice:nth-child(' + (picked + 1) + ') path')
		                        .attr("fill", "var(--primary-color-d-10)");
		                        
	                        d3.select('#' + parentId + ' .slice:nth-child(' + (picked + 1) + ') text').style({
								"fill": function() {
									// Получаем fill у path, к которому относится текущий текстовый элемент
									let pathFillColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color-d-10')
									return getContrastColor(pathFillColor);
								  }
							})
				
							//populate question
							$('#'+parentId).find('[data-alias="prize"]').val(data[picked].label);
							
							$('#'+parentId + ' .lp-form-tpl__button').click();
							
							d3.select('#'+parentId + ' .question__after-send h2')
		                        .text(sendText + ' ' + data[picked].label);
		                        
							$('#'+parentId + ' .question__before-send').hide();
							$('#'+parentId + ' .question__after-send').show("slow").fadeOut;
							$('#'+parentId + ' .question-message').hide();

		                        
							$('#'+parentId + ' form').hide();
							
							
							//container.on("click", spin);
						});
					
				}
				
				function popupSubmit(d) {
					$('#'+parentId + ' .lp-form-tpl__button').click();
							
					/*d3.select('#'+parentId + ' .question__after-send h2')
                    .text(sendText + ' ' + data[picked].label);*/
                        
					$('#'+parentId + ' .question__before-send').hide();
					$('#'+parentId + ' .question__after-send').hide()
					$('#'+parentId + ' .question-message').hide();
					$('#'+parentId + ' form').hide();
					
					setTimeout(function() {
						$('#'+parentId + ' .lpc-popup-fortune__step-2').addClass('_last-step');
						$('#'+parentId + ' .lpc-popup-fortune__finish-btn').show();
					}, 950);
					
				}
				
				function popupspin(d) {
				
					container.on("click", null);
				
					//all slices have been seen, all done
					if (oldpick.length == data.length) {
						container.on("click", null);
						return;
					}
				
					var ps = 360 / data.length,
						pieslice = Math.round(1440 / data.length),
						
						rng = Math.floor((Math.random() * 1440) + 360);
						
					rotation = (Math.round(rng / ps) * ps);
				
					picked = Math.round(data.length - (rotation % 360) / ps);
					picked = picked >= data.length ? (picked % data.length) : picked;
				
				
					if (oldpick.indexOf(picked) !== -1) {
						d3.select(this).call(spin);
						return;
					} else {
						oldpick.push(picked);
					}
				
					rotation += 90 - Math.round(ps / 2) - rotate;
					
					if(infiniteRotate) {
						vis.attr("class", "stop-rotate");
					}
					
					
					vis.transition()
						.duration(3000)
						.attrTween("transform", rotTween)
						.each("end", function() {
							
							//mark question as seen
		                    d3.select('#' + parentId + ' .slice:nth-child(' + (picked + 1) + ') path')
		                        .attr("fill", "var(--primary-color-d-10)");
		                        
	                        d3.select('#' + parentId + ' .slice:nth-child(' + (picked + 1) + ') text').style({
								"fill": function() {
									// Получаем fill у path, к которому относится текущий текстовый элемент
									let pathFillColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color-d-10')
									return getContrastColor(pathFillColor);
								  }
							})
				
							//populate question
							$('#'+parentId).find('[data-alias="prize"]').val(data[picked].label);
							
							/*if(!checkPopupBlock) {
							$('#'+parentId + ' .lp-form-tpl__button').click();
							
							d3.select('#'+parentId + ' .question__after-send h2')
                    		.text(sendText + ' ' + data[picked].label);
		                        
							$('#'+parentId + ' .question__before-send').hide();
							$('#'+parentId + ' .question__after-send').show();
							$('#'+parentId + ' .question-message').hide();

		                        
							$('#'+parentId + ' form').hide();
							}*/
							
							d3.select('#'+parentId + ' .question__after-send h2')
                			.text(sendText + ' ' + data[picked].label);
							
							$('#'+parentId + ' .question__after-send').show();
							$('#'+parentId + ' .lpc-popup-fortune__step-2').show();
							
							//container.on("click", spin);
						});
					
				}
				
				//make arrow
				svg.append("g")
					.attr("transform", "translate(" + (w - 42) + "," + ((h / 2) - 25) + ")")
					.append("path")
					.attr("class", "wheel-indicator")
					.attr("d", "M40.0261 10.6195L11.9636 23.1737C10.386 23.8795 10.386 26.1192 11.9637 26.825L40.0261 39.3793C41.3491 39.9712 42.8428 39.003 42.8428 37.5536V12.4451C42.8428 10.9957 41.3491 10.0276 40.0261 10.6195Z")
					.style({
						"fill": "white"
					});
				
				//draw spin circle
				container.append("circle")
					.attr("cx", 0)
					.attr("cy", 0)
					.attr("r", 20)
					.attr("stroke", "#fff")
					.attr("stroke-width", "7")
					.attr("class", "inner-circle")
					.style({
						"fill": "var(--primary-color-base)"
					});

				container.append("circle")
					.attr("cx", 0)
					.attr("cy", 0)
					.attr("r", 230)
					.attr("stroke", "#fff")
					.attr("class", "outer-circle")
					.attr("stroke-width", "10")
					.style({
						"fill": "transparent"
					});
					
				function rotTween(to) {
					var i = d3.interpolate(oldrotation % 360, rotation);
					return function(t) {
						return "rotate(" + i(t) + ")";
					};
				}
			});
		}
  	};

	lpc_template.queue.calendar = function ($self) {
		$doc.on("click", ".lpc-js-form-calendar", function () {
			var $this = $(this),
				thisCalendarInited = $this.data("calendarInited");
	
			if (!thisCalendarInited) {
				var bb = $this.datepickerlpc().data("datepickerlpc");
				bb.show();
				thisCalendarInited = $this.data("calendarInited", true);
			}
		});
	
		$doc.on("click", ".lpc-js-form-calendar-interval", function () {
			var $this = $(this),
				thisCalendarInited = $this.data("calendarInited");
	
			if (!thisCalendarInited) {
				var bb = $this
					.datepickerlpc({
						range: true,
						multipleDatesSeparator: " - ",
					})
					.data("datepickerlpc");
				bb.show();
				thisCalendarInited = $this.data("calendarInited", true);
			}
		});
	};
	
	
	lpc_template.queue.rowMenu = function ($self) {
		let $block = $self.find('.lpc-row-menu');
	
		function rowMenuItems() {
			$block.each(function () {
				let $this = $(this);
				let $menu = $this.find('.lpc-menu-horizontal__list');
				let $toggleButton = $this.find('.lpc-menu-horizontal__more');
	
				let hideText = document.querySelector('html').getAttribute('lang') === 'ru' ? 'Скрыть' : 'Hide';
				let currentText = document.querySelector('html').getAttribute('lang') === 'ru' ? 'Ещё' : 'Show more';
	
				let $insTextButton = $toggleButton.find('ins');
				let $hiddenItems = $menu.find('li:not(.lpc-menu-horizontal__more):hidden');
				
				if ($hiddenItems.length) {
					$toggleButton.addClass('show');
				}
				
				$toggleButton.off('click').on('click', function () {
					$toggleButton.toggleClass('active');
					$menu.toggleClass('lpc-menu-horizontal__list--show-items');
					$insTextButton.text($toggleButton.hasClass('active') ? hideText : currentText);
				});
			});
		}
	
		rowMenuItems();
	
		document.addEventListener('dataMediaSourceChange', rowMenuItems);
	};
	
	lpc_template.queue.spoilerText = function ($self) {
		let $block = $self.find('.lpc-spoiler-text-init');
	
		if ($block.length) {
			$block.each(function () {
				let $this = $(this);
				let $item = $this.find('.lpc-spoiler-text-item');
	
				if ($item.length != 0) {
					$item.each(function () {
						let $title = $(this).find('.lpc-spoiler-title-click');
						let $text = $(this).find('.lpc-spoiler-text-hide');
						let $button = $(this).find('.lpc-spoiler-more');
	
						let hideText = document.querySelector('html').getAttribute('lang') === 'ru' ? 'Свернуть' : 'Collapse';
						let currentText = document.querySelector('html').getAttribute('lang') === 'ru' ? 'Читать полностью' : 'Read completely';
	
						let originalText = $text.html().trim(); // Используем .html() вместо .text() чтобы сохранить HTML-структуру
						let limit = parseInt($text.attr('data-limit'), 10);
	
						if (isNaN(limit)) {
							limit = 200;
						}
	
						function expandText() {
							$text.html(originalText);
							$button.text(hideText).show();
						}
	
						function collapseText() {
							let trimmedText = originalText.substr(0, limit);
							$text.html(trimmedText + '...');
							$button.text(currentText).hide();
							$block.addClass('is-active');
						}
	
						function toggleText() {
							if ($text.html() === originalText) {
								collapseText();
							} else {
								expandText();
							}
						}
	
						if (limit === 0) {
							expandText();
							$button.hide();
							$title.off('click').removeClass('lpc-spoiler-title-click');
						} else if (originalText.length > limit) {
							collapseText();
							$title.click(function () {
								expandText();
							});
						} else if (limit > originalText.length) {
							expandText();
							$button.hide();
							$title.off('click');
							$block.addClass('is-active');
						} else {
							$button.hide();
							$title.off('click');
						}
	
						$button.click(function () {
							collapseText();
						});
					});
				}
			});
		}
	};

	
	lpc_template.queue.accordeon = function ($self) {
	    var $block = $self.find('.js-accordeon');
	    
	    $block.each(function(){
	        $(this).on('click', function (event) {
	            var $thisParent = $(this).closest('._item'),
	                $thisText = $thisParent.find('._text'),
	                $maps = $(this).parents('.lpc-maps-parent').find('.js-lpc-simple-map');
	                
				if ($(event.target).hasClass('_text')) {
					event.stopPropagation();
					return;
				}
	    
	            if (!$thisText.is(':animated')) {
	                $thisParent.toggleClass('active');
	                $thisText.slideToggle();
	    
	                if ($maps.length && !$maps.hasClass('initialized')) {
	                    $maps.each(function () {
	                        var $map = $(this);
	    
	                        setTimeout(function(){
	                            lpc_template.checkMapInitialization($map);
	                            $map.addClass('initialized');
	                        }, 400)
	                    });
	                }
	            }
	        });
	         if ($(this).data('accordeon-opened') == 1) {
		    	
		    	$(this).trigger('click', function(){});
		    	
		    	if (s3LP.is_cms) {
		    		$('.content_contructor').trigger('click', function(){});
		    	}
		    }
	    });
	
	};

	lpc_template.queue.lpcSimpleAccordeon = function ($self) {
		var $block = $self.find(".js_accordeon_title"),
			activeClass = "active";
	
		if ($block.length) {
			$block.on("click", function (e) {
				e.preventDefault();
	
				var $this = $(this),
					$ymap = $this
						.closest("[data-block-layout]")
						.find(".js-lpc-simple-map");
				($thisParent = $this.closest("._parent")),
					($thisBody = $thisParent.find("._content"));
	
				if ($thisParent.hasClass(activeClass)) {
					$thisBody.slideUp(400, function () {
						$thisParent.removeClass(activeClass);
						if ($ymap.length && $ymap.data("ymaps")) {
							$ymap.data("ymaps").container.fitToViewport();
						}
					});
				} else {
					$thisBody.slideDown(400, function () {
						$thisParent.addClass(activeClass);
						if ($ymap.length && $ymap.data("ymaps")) {
							$ymap.data("ymaps").container.fitToViewport();
						}
					});
				}
			});
		}
	};


	lpc_template.queue.lpcSimpleColumn = function ($self) {
		var $block = $self.find(".js-lpc-simple-colum");
	
		if ($block.length) {
			$block.each(function () {
				var $this = $(this),
					$items = $this.find("._parent");
				countArray = $this.data("column-count");
	
				$doc.on("checkDeviceType", function (e, param) {
					var thisCount =
						param === "mobile"
							? countArray[2]
							: param === "tablet"
								? countArray[1]
								: countArray[0];
	
					unwrap($items);
	
					if (thisCount == 1) {
						$items.wrap('<div class="_simple-col"></div>');
						return;
					}
	
					var itemsLengthInColumn = Math.round($items.length / thisCount);
	
					for (let i = 1; i < thisCount + 1; i += 1) {
						$items
							.filter(function (index) {
								return (
									index >= (i - 1) * itemsLengthInColumn &&
									index < i * itemsLengthInColumn
								);
							})
							.wrapAll('<div class="_simple-col"></div>');
					}
				});
			});
	
			function unwrap($list) {
				$list.each(function () {
					if (!this.parentNode.classList.contains("_simple-col")) return;
					$(this).unwrap();
				});
			}
		}
	};

	
	lpc_template.queue.blockAfterBefore = function ($self) {
		var $block = $self.find(".lpc-before-and-after__wrap");
	
		if ($block.length) {
			(() => {'use strict';
	
				class BeforeAfter {
					constructor(selector = '.before-after') {
						this.selector = selector;
						this.items = [];
					}
	
					init() {
						let wrappers = document.querySelectorAll(this.selector);
	
						for (let wrapper of wrappers) {
							if (wrapper.dataset.beforeAfterInitialized === 'true') {
								continue;
							}
							let item = new BeforeAfterItem(wrapper).init();
							this.items.push(item);
							
							wrapper.dataset.beforeAfterInitialized = 'true';
							
							let observer = new MutationObserver(function (mutations) {
								mutations.forEach(function (mutation) {
									if ($(mutation.target).hasClass('lp-selected-element')) {
										$(mutation.target).parent().addClass('active');
									} else {
										$(mutation.target).parent().removeClass('active');
									}
								});
							});
							let config = {
								attributes: true,
								attributeFilter: ['class']
							};
							
							observer.observe($(wrapper).find('.before-after__img-before')[0], config);
							observer.observe($(wrapper).find('.before-after__img-after')[0], config);
						}
					}
				}
	
				class BeforeAfterItem {
					constructor(el) {
						this.wrapper = el;
						this.dragElWrapper = null;
						this.viewport = null;
						this.before = null;
						this.after = null;
						this.offset = 0;
						this.pageXStart = 0;
						this.startOffset = 0;
						this.onPointerDown = this.onPointerDown.bind(this);
						this.onPointerMove = this.onPointerMove.bind(this);
						this.onPointerUp = this.onPointerUp.bind(this);
					}
					init() {
						let wrapper = this.wrapper;
	
						let dragElWrapper = this.dragElWrapper = document.createElement('div');
	
						dragElWrapper.classList.add('before-after__drag-wrapper');
						dragElWrapper.style.left = '50%';
	
						let dragEl = document.createElement('div');
	
						dragEl.classList.add('before-after__drag');
	
						dragElWrapper.append(dragEl);
	
						let viewport = this.viewport = wrapper.querySelector('.before-after__viewport');
	
						viewport.append(dragElWrapper);
						wrapper.classList.add('before-after--loaded');
	
						this.before = viewport.querySelector('.lpc-image-before');
						this.after = viewport.querySelector('.lpc-image-after');
	
						this.move(this.offset);
	
						dragElWrapper.addEventListener('mousedown', this.onPointerDown);
						dragElWrapper.addEventListener('touchstart', this.onPointerDown);
	
						dragElWrapper.addEventListener('dragstart', () => {
							return false;
						});
	
						return this;
					}
	
					onPointerDown(e) {
						e.stopPropagation();
	
						if (e.touches) {
							this.pageXStart = e.touches[0].pageX;
						} else {
							this.pageXStart = e.pageX;
						}
						this.startOffset = this.offset;
	
						document.addEventListener('mousemove', this.onPointerMove);
						document.addEventListener('touchmove', this.onPointerMove);
						document.addEventListener('mouseup', this.onPointerUp);
						document.addEventListener('touchend', this.onPointerUp);
					}
	
					onPointerMove(e) {
						let viewport = this.viewport,
							pxOffset = 0,
							percentOffset = 0;
	
						if (e.touches) {
							pxOffset = e.touches[0].pageX - this.pageXStart;
						} else {
							pxOffset = e.pageX - this.pageXStart;
						}
	
						percentOffset = parseFloat((pxOffset / viewport.clientWidth * 100).toFixed(6));
	
						this.offset = this.startOffset + percentOffset;
	
						if (this.offset >= 50) {
							this.offset = 50;
						} else if (this.offset <= -50) {
							this.offset = -50;
						}
	
						this.move(this.offset);
					}
	
					onPointerUp() {
						document.removeEventListener('mousemove', this.onPointerMove);
						document.removeEventListener('touchmove', this.onPointerMove);
						document.removeEventListener('mouseup', this.onPointerUp);
						document.removeEventListener('touchend', this.onPointerUp);
					}
	
					move(offset) {
						this.dragElWrapper.style.left = 'calc(50% + ' + offset + '%)';
						this.before.style.clipPath = 'inset(0 calc(50% - ' + offset + '%) 0 0)';
						this.after.style.clipPath = 'inset(0 0 0 calc(50% + ' + offset + '%))';
					}
	
				}
				window.BeforeAfter = BeforeAfter;
			})();
	
			new BeforeAfter().init();
		}
	};
	
	
	lpc_template.queue.spoilerBlock = function ($self) {
	    let $block = $self.hasClass('spoiler-init') ? $self : $self.find('.spoiler-init');

		$block.each(function(){
			let $this = $(this);

			initSpoiler();
			document.addEventListener('dataMediaSourceChange', initSpoiler);
			
			function initSpoiler() {
				let $hidden = $this.find('.spoiler-item:hidden');
				let $firstNotHidden = $this.find('.spoiler-item').first();
				let $btn = $this.find('.spoiler-btn');
				let $btnWrap = $this.find('.spoiler-btn-wrap');


				if ($hidden.length) {
					$btnWrap.addClass('show_spoiler');
					
					$btn.on('click', function(){
						$hidden.slideDown('150', function(){
							if ($firstNotHidden.css('display') == 'flex') {
								$hidden.css('display', 'flex');
							}
						});
						$(this).hide();
					});
				} else  {
					$btnWrap.removeClass('show_spoiler');
				}
			}
		});
	};
	
	
	lpc_template.queue.lazyLoading = function($self) {
		var $block = $self.find('.lpc-lazy-loading-init');
	
		if ($block.length) {
			$block.each(function () {
				const $this = $(this);
				const blocks = $this.find('.lpc-lazy-loading-item');
				const blocksScrollShow = 1;
				let visibleBlockCount = blocksScrollShow;
	
				function showBlocks(startIndex, endIndex) {
					for (let i = startIndex; i < endIndex; i++) {
						blocks.eq(i).removeClass('hidden');
					}
				}
	
				function hideAllBlocks() {
					blocks.addClass('hidden');
				}
	
				hideAllBlocks();
				showBlocks(0, 3);
	
				function handleScroll() {
					const scrollTop = $(window).scrollTop();
					const windowHeight = $(window).height();
					const totalBlockCount = blocks.length;
					const totalVisibleBlocks = Math.min(visibleBlockCount, totalBlockCount);
					const lazyLoadingListBottom = $this.find('.lpc-lazy-loading-list').offset().top + $this.find('.lpc-lazy-loading-list').outerHeight() + 100;
	
					if (scrollTop + windowHeight >= lazyLoadingListBottom) {
						if (visibleBlockCount < totalBlockCount) {
							const newVisibleCount = Math.min(visibleBlockCount + blocksScrollShow, totalBlockCount);
							showBlocks(visibleBlockCount, newVisibleCount);
							visibleBlockCount = newVisibleCount;
						}
					}
				}
	
				$(window).on('scroll', handleScroll);
			});
		}
	};
	
	
	lpc_template.queue.typeWriter = function ($self) {
		let $block = $self.find('.lpc-typewriter-init');
	
		if ($block.length) {
			$block.each(function () {
				const $this = $(this);
				const stringElements = $this.find(".lpc-typewriter-string");
				const delay = $this.attr("data-delay");
				const delayDeletion = $this.attr("data-delay-deletion");
				const stopDialing = $this.attr("data-stop-dialing");
	
				function typeText(element, text, delay, callback) {
					let index = 0;
					const textLength = text.length;
	
					function addCharacter() {
						if (index < textLength) {
							element.textContent += text.charAt(index);
							index++;
							setTimeout(addCharacter, delay);
						} else {
							setTimeout(callback, delayDeletion);
						}
					}
	
					addCharacter();
				}
	
				function eraseText(element, delay, callback) {
					const text = element.textContent;
					let index = text.length;
	
					function removeCharacter() {
						if (index > 0) {
							element.textContent = text.substring(0, index - 1);
							index--;
							setTimeout(removeCharacter, delay);
						} else {
							callback();
						}
					}
	
					removeCharacter();
				}
	
				function animateElements(index) {
					if (index < stringElements.length) {
						const element = stringElements[index];
						const text = element.getAttribute("data-text");
				
						typeText(element, text, delay, function () {
							if (index === stringElements.length - 1 && stopDialing === "1") {
								
								setTimeout(function () {
									element.style.display = "inline";
									animateElements(index + 1);
								}, 250);
								
							} else {
								
								eraseText(element, delay, function () {
									element.style.display = "none";
									setTimeout(function () {
										animateElements(index + 1);
									}, 250);
								});
							}
						});
					} else {
						if (stopDialing === "1") {
							const lastElement = stringElements[stringElements.length - 1];
							const lastText = lastElement.getAttribute("data-text");
							lastElement.textContent = lastText;
						} else {
							setTimeout(function () {
								$this.find(".lpc-typewriter-string").each(function () {
									$(this).text(""); 
									$(this).css("display", "inline");
								});
								animateElements(0);
							}, delay);
						}
					}
				}
	
				animateElements(0);
			});
		}
	};
	
	
	lpc_template.queue.albumGallery = function ($self) {
	    let $block = $self.find('.lpc-album-gallery-init');
	
	    if ($block.length) {
	        $block.each(function () {
	            let $this = $(this);
	            let item = $this.find('.lpc-gallery-click');
	            let popup = $this.find('.lpc-album-gallery__popup');
	            let popupItems = $this.find('.lpc-album-gallery__popup-item');
	            let buttonBack = $this.find('.lpc-album-gallery__popup-back');
	            let buttonClose = $this.find('.lpc-album-gallery__popup-close');
	
	            let body = $('body');
	            let popupImageBox = popup.find('.lpc-album-gallery__popup-image-box');
	            
	            if (popup.find('.js-lg-init').length) {
	            	
	            	popupImageBox.click(function () {
		                popup.addClass('is-hidden'); 
		            });
		
		            body.on('click', function (event) {
		                if (!$(event.target).closest('.lg-prev, .lg-next, .lg-toolbar, .lg-image, .lpc-album-gallery__popup, .lpc-album-gallery__popup-image-box').length) {
		                    popup.removeClass('is-hidden');
		                }
		                
		                if ($(event.target).closest('.lg-close').length) {
		                	popup.removeClass('is-hidden');
		                } 
		            });
	            }
	
	            item.click(function () {
	                let dataIndex = $(this).data("index");
	
	                popup.fadeIn().addClass("active");
	
	                if (!isMobile) {
	                    $("body").css({ 'padding-right': '17px' });
	                }
	
	                $("html").addClass("lpc-no-scroll");
	                popupItems.removeClass("active");
	                popupItems.filter("[data-index='" + dataIndex + "']").addClass("active");
	            });
	
	            buttonBack.click(function () {
	                popup.fadeOut().removeClass("active");
	                $("body").css({ 'padding-right': '' });
	                $("html").removeClass("lpc-no-scroll"); 
	                popupItems.removeClass("active");
	            });
	
	            buttonClose.click(function () {
	                popup.fadeOut().removeClass("active");
	                $("body").css({ 'padding-right': '' });
	                $("html").removeClass("lpc-no-scroll"); 
	                popupItems.removeClass("active");
	            });
	
	            $(document).keydown(function (e) {
	                if (e.keyCode === 27) { 
	                    popup.fadeOut().removeClass("active").removeClass("is-hidden");
	                    $("body").css({ 'padding-right': '' });
	                    $("html").removeClass("lpc-no-scroll"); 
	                    popupItems.removeClass("active");
	                }
	            });
	        });
	    }
	};
	
	lpc_template.queue.masonGallery = function ($self) {
		let $block = $self.find('.lpc-masonry-init');
	
		if ($block.length) {
			$block.each(function () {
				let $this = $(this);
				let grid = $this.find(".lpc-image-mason__list");
				let allItems = $this.find(".lpc-image-mason__item");
				let lazyLoadItemCount = 8; // Количество блоков для ленивой загрузки
	
				function resizeGridItem(item) {
					let rowHeight = parseInt(grid.css("grid-auto-rows"));
					let rowGap = parseInt(grid.css("grid-row-gap"));
	
					let rowSpan = Math.ceil(
						(item.querySelector('.lpc-image-mason__image').getBoundingClientRect().height + rowGap) / (rowHeight + rowGap)
					);
					$(item).css("grid-row-end", "span " + rowSpan);
	
					let image = $(item).find('.lpc-image-mason__image');
					image.css("height", "100%");
				}
	
				function resizeAllGridItems() {
					allItems.each(function (index, element) {
						resizeGridItem(element);
					});
				}
	
				function showLazyLoadedItems() {
					allItems.slice(0, lazyLoadItemCount).addClass('is-show'); // Показать первые 8 блоков
				}
	
				function hideRemainingItems() {
					allItems.slice(lazyLoadItemCount).removeClass('is-show'); // Скрыть остальные блоки
				}
	
				$(document).ready(function () {
					setTimeout(function () {
						imagesLoaded(grid[0], function () {
							resizeAllGridItems();
							showLazyLoadedItems(); // Показать первые 8 блоков после загрузки изображений
							hideRemainingItems(); // Скрыть остальные блоки
						});
					}, 500);
	
					grid.addClass('after-grid-init');
				});
	
				const showBlocks = () => {
					const windowHeight = $(window).height();
					const windowTop = $(window).scrollTop();
					const windowBottom = windowTop + windowHeight;
	
					allItems.each(function () {
						const itemTop = $(this).offset().top;
						const itemBottom = itemTop + $(this).outerHeight();
	
						if ((itemTop >= windowTop && itemTop <= windowBottom) ||
							(itemBottom >= windowTop && itemBottom <= windowBottom)) {
							$(this).addClass('is-show');
						}
					});
				};
	
				showBlocks();
	
				$(window).on('scroll', showBlocks);
	
				if (!s3LP.is_cms) {
					let resizeTimeout;
	
					$(window).on('resize', function () {
						if (resizeTimeout) {
							clearTimeout(resizeTimeout);
						}
	
						resizeTimeout = setTimeout(function () {
							resizeAllGridItems();
						}, 50);
					});
				};
			});
		}
	};
	
	
	lpc_template.queue.constructorClick = function ($self) {
		let $block = $self.find('.lpc-constructor');
	
		if ($block.length) {
			$block.each(function () {
				let $this = $(this);
				let lpcClick = $this.find(".lpc-active-click");
				let item = $this.find(".lpc-constructor-click");
	
				if (s3LP.is_cms) {
					lpcClick.on('click', function () {
						item.toggleClass('lpc-image-show');
					});
				}
			});
		}
	};
	
	
	lpc_template.queue.tabsInit = function ($self) {
		let $block = $self.find('.lpc-tabs-init');
	
		if ($block.length) {
			$block.each(function () {
				let $this = $(this);
				let $tab = $this.find('.lpc-tabs-title');
				let $acc = $this.find('.lpc-accord-title');
				let $body = $this.find('.lpc-tabs-body');
				let blockId = $this.data('blockId');
				let isVertical = $this.hasClass('lpc-tabs-vertical');
	
				function accord() {
					$tab.off('click');
					$acc.off('click').on('click', function () {
						let $currentAcc = $(this);
						let $currentBody = $currentAcc.next('.lpc-tabs-body');
						let isActive = $currentAcc.hasClass('active');
	
						$acc.removeClass('active');
						$body.slideUp(200).removeClass('active');
	
						if (!isActive) {
							$currentAcc.addClass('active');
							$currentBody.slideDown(200).addClass('active');
							let index = $currentAcc.data('index');
	
							localStorage.setItem('activeTab_' + blockId, index);
						}
	
						if ($currentAcc.hasClass('active')) {
						    setTimeout(function(){
						        $('html, body').stop().animate({
						            scrollTop: $currentAcc.offset().top - 50
						        }, 500);
						    }, 301);
						}
					});
				}
	
				function tabs() {
					$acc.off('click');
					$tab.off('click').on('click', function () {
						let $currentTab = $(this);
						let index = $currentTab.data('index');
						let $currentBody = $this.find('.lpc-tabs-body[data-index="' + index + '"]');
	
						if (!$currentTab.hasClass('active')) {
							$tab.removeClass('active');
							$body.removeClass('active');
							$currentTab.addClass('active');
							$currentBody.addClass('active');
	
							localStorage.setItem('activeTab_' + blockId, index);
						}
					});
				}
	
				function updateActiveTab() {
					let dataMedia = $('.decor-wrap').data('mediaSource');
	
					if ((isVertical && (dataMedia === 'media-md' || dataMedia === 'media-sm' || dataMedia === 'media-xs')) || (!isVertical && dataMedia === 'media-xs')) {
						accord();
					} else {
						tabs();
					}
	
					let activeBlockId = localStorage.getItem('activeTab_' + blockId);
					let index = parseInt(activeBlockId, 10) || 0;
	
					if ((isVertical && (dataMedia === 'media-md' || dataMedia === 'media-sm' || dataMedia === 'media-xs')) || (!isVertical && dataMedia === 'media-xs')) {
						$acc.removeClass('active');
						$body.slideUp(200).removeClass('active');
	
						$acc.eq(index).addClass('active');
						$body.eq(index).slideDown(200).addClass('active');
	
						if ($acc.hasClass('active')) {
						    setTimeout(function(){
						        $('html, body').stop().animate({
						            scrollTop: $acc.offset().top - 50
						        }, 500);
						    }, 301);
						}
	
					} else {
						$tab.removeClass('active');
						$body.removeClass('active');
	
						$tab.eq(index).addClass('active');
						$body.eq(index).addClass('active');
					}
				}
	
				updateActiveTab();
			});
		}
	};
	
	
	lpc_template.queue.fullWidth = function ($self) {
		let $block = $self.find('.lpc-full-width-init');
	
		if ($block.length) {
			$block.each(function () {
				let $this = $(this);
				let $wrap = $this.parents('.lpc-full-width');
				let $content = $this.find('.lpc-full-width-content');
				let $splideArrow = $this.find('.lpc-full-width-splide-arrow');
	
				function fullWidth() {
					let blockOffsetLeft = $wrap.offset().left;
					let blockWidth = $wrap.outerWidth();
					let windowWidth = $(window).width();
					let marginL = blockOffsetLeft;
					let marginR = windowWidth - (blockOffsetLeft + blockWidth);
	
					if (marginL < 0) {
						marginL = 0;
					}
	
					if (marginR < 0) {
						marginR = 0;
					}
	
					$this.css({ "margin-left": -marginL + "px", "margin-right": -marginR + "px" });
					
					if ($content) {
						$content.css({ "max-width": blockWidth + "px", "margin": "0 auto"});
					}
					
					if ($splideArrow) {
						$splideArrow.css({ "max-width": blockWidth + "px", "margin": "0 auto"});
					}
				}
	
				if ($wrap.parents('[data-do-animation]').length && !s3LP.is_cms) {
				    setTimeout(fullWidth, 850);
				} else if (s3LP.is_cms) {
				    setTimeout(fullWidth, 3000);
				} else {
					fullWidth();
				}
				
				let resizeTimeout;

				$(window).on('resize', function () {
					if (resizeTimeout) {
						clearTimeout(resizeTimeout);
					}
	
					resizeTimeout = setTimeout(function () {
						fullWidth();
					}, 50);
				});
			});
		}
	};
	
	lpc_template.queue.sliderReviews = function ($self) {
		let $block = $self.attr('data-slider-reviews-init') ? $self : $self.find('[data-slider-reviews-init]');
	
		if ($block.length) {
			$block.each(function () {
				let $this = $(this);
				let $alignItem = $this.find($this.data('align-item'));
	
				if ($this.find('.splide').not('.is-active').length != 0) {
					$this.find('.splide').not('.is-active').each(function () {
						
						let splide = new Splide($(this)[0], {
							autoplay: $this.data('autoplay'),
							speed: $this.data('speed'),
							interval: $this.data('pause'),
							lazyLoad: $this.data('lazy-load'),
							rewind: true,
							arrows: true,
							pagination: true,
							gap: 0,
							perPage: 1
						});
						
						splide.mount();
						
						if ($(this).find('.lpc-reviews-4__item').length <= 1) {
							$(this).addClass('splide--pointer-events');
						}
					});
				}
			});
		}
	};
	
	lpc_template.queue.sliderBlockBanner = function ($self) {
	    let $block = $self.attr('data-slider-banner-init') ? $self : $self.find('[data-slider-banner-init]');
	    if ($block.length) {
		if ($block.data('slider-thumb-init') != true) {
	        $block.each(function(){
	            let $this = $(this);
				let $alignItem = $this.find($this.data('align-item'));
				let mediaGap = $this.data('margin');
				let mediaPerPage = $(this).data('count');
				if ($(this).data('move')) {
					var $mediaMove = $(this).data('move');
					
				} else {
					var $mediaMove = 1;
				}

	            if($this.find('.splide').not('.is-active').length != 0) {
	                let splide = new Splide( $this.find('.splide').not('.is-active')[0], {
						autoplay: $this.data('autoplay'),
						speed: $this.data('speed'),
						interval: $this.data('pause'),
	                    lazyLoad: $this.data('lazy-load'),
	                    rewind: true,
	                    perMove: $mediaMove,
						perPage: checkInitPerPage()
	                });
	                splide.mount();
	                
					sliderBreakPoints();
					
					document.addEventListener('lpcPopupOpened', function(){
						splide.refresh();
					});
					
					document.addEventListener('dataMediaSourceChange', sliderBreakPoints);
					
					function sliderBreakPoints() {
		                let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
		
						setTimeout(function(){
							if ($alignItem.length) {
								let itemHeight = $alignItem.outerHeight() / 2;
								let arrowsPosition = itemHeight + $alignItem.position().top;
	
								$this.find('.splide__arrow').css('top', arrowsPosition);
							}
						}, 100);
						
		                switch (dataMediaSource) {
		                    case 'media-xl':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[0],
		                            perPage: mediaPerPage[0],
		                        };
		
		                        break;
		                    case 'media-lg':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[1],
		                            perPage: mediaPerPage[1],
		                        };
		
		                        break;
		                    case 'media-md':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[2],
		                            perPage: mediaPerPage[2],
		                        };
		
		                        break;
		                    case 'media-sm':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[3],
		                            perPage: mediaPerPage[3],
		                        };
		
		                        break;
		                    case 'media-xs':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[4],
		                            perPage: mediaPerPage[4],
		                        };
		                        
		                        break;
		                }
					};
					
					function checkInitPerPage() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaPerPage[0]
								break;
							case 'media-lg':
								return mediaPerPage[1]
								break;
							case 'media-md':
								return mediaPerPage[2]
								break;
							case 'media-sm':
								return mediaPerPage[3]
								break;
							case 'media-xs':
								return mediaPerPage[4]
								break;
						};
					};
	            }
	        });
	    }
	    }
	};
	 	
		
	lpc_template.queue.sliderBlock = function ($self) {
	    let $block = $self.attr('data-slider-init') ? $self : $self.find('[data-slider-init]');
	    if ($block.length) {
		if ($block.data('slider-thumb-init') != true) {
	        $block.each(function(){
	            let $this = $(this);
				let $alignItem = $this.find($this.data('align-item'));
				let mediaGap = $this.data('margin');
				let mediaPerPage = $(this).data('count');
				if ($(this).data('move')) {
					var $mediaMove = $(this).data('move');
					
				} else {
					var $mediaMove = 1;
				}

	            if($this.find('.splide').not('.is-active').length != 0) {
	                let splide = new Splide( $this.find('.splide').not('.is-active')[0], {
						autoplay: $this.data('autoplay'),
						speed: $this.data('speed'),
						interval: $this.data('pause'),
	                    /*rewind: $this.data('infinite'),*/
	                    lazyLoad: $this.data('lazy-load'),
	                    rewind: true,
	                    perMove: $mediaMove,
						perPage: checkInitPerPage()
	                });
	                splide.mount();
	                
					sliderBreakPoints();
					
					document.addEventListener('lpcPopupOpened', function(){
						splide.refresh();
					});
					
					document.addEventListener('dataMediaSourceChange', sliderBreakPoints);
					
					function sliderBreakPoints() {
		                let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
		
						setTimeout(function(){
							if ($alignItem.length) {
								let itemHeight = $alignItem.outerHeight() / 2;
								let arrowsPosition = itemHeight + $alignItem.position().top;
	
								$this.find('.splide__arrow').css('top', arrowsPosition);
							}
						}, 100);
						
		                switch (dataMediaSource) {
		                    case 'media-xl':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[0],
		                            perPage: mediaPerPage[0],
		                        };
		
		                        break;
		                    case 'media-lg':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[1],
		                            perPage: mediaPerPage[1],
		                        };
		
		                        break;
		                    case 'media-md':
		                        splide.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[2],
		                            perPage: mediaPerPage[2],
		                        };
		
		                        break;
		                    case 'media-sm':
		                        splide.options = {
									arrows: false,
									pagination: true,
									rewindByDrag: true,
		                            gap: mediaGap[3],
		                            perPage: mediaPerPage[3],
		                        };
		
		                        break;
		                    case 'media-xs':
		                        splide.options = {
									arrows: false,
									pagination: true,
									rewindByDrag: true,
		                            gap: mediaGap[4],
		                            perPage: mediaPerPage[4],
		                        };
		                        
		                        break;
		                }
					};
					
					function checkInitPerPage() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaPerPage[0]
								break;
							case 'media-lg':
								return mediaPerPage[1]
								break;
							case 'media-md':
								return mediaPerPage[2]
								break;
							case 'media-sm':
								return mediaPerPage[3]
								break;
							case 'media-xs':
								return mediaPerPage[4]
								break;
						};
					};
	            }
	        });
	    }
	    }
	};
	
	
	lpc_template.queue.sliderBlockThumb = function ($self) {
	    var $block = $self.attr('data-slider-thumb-init') ? $self : $self.find('[data-slider-thumb-init]');
	    if ($block.length) {
	        $block.each(function(){
	            let $this = $(this);
				let $alignItem = $this.find($this.data('align-item'));
				let mediaGap = $this.data('margin');
				let mediaPerPage = $(this).data('count');
				let mediaThumbGap = $this.data('thumb-margin');
				let mediaThumbFixedWidth = $this.data('thumb-width');
				let mediaThumbFixedHeight = $this.data('thumb-height');
	                
	            if($this.find('#main-slider').not('.is-active').length != 0 ) {
	                let splideThumb = new Splide( $this.find('.splide').not('.is-active')[0], {
						autoplay: $this.data('autoplay'),
						speed: $this.data('speed'),
						interval: $this.data('pause'),
	                    /*rewind: $this.data('infinite'),*/
	                    lazyLoad: $this.data('lazy-load'),
	                    rewind: true,
	                    perMove: 1,
						perPage: checkInitPerPage(),
						dragMinThreshold: {
						    mouse: 5,
						    touch: 10,
						}	
	                });
	                
	                let thumbnails = new Splide($this.find('.thumbnail-slider').not('.is-active')[0], {
					  rewind          : true,
					  fixedWidth      : checkInitThumbWidth(),
					  fixedHeight     : checkInitThumbHeight(),
					  isNavigation    : true,
					  focus           : $this.data('thumb-focus'),
					  pagination      : false,
					  cover           : false,
					  arrows     	  : $this.data('thumb-arrow'),
                	  drag            : false,
                	  padding         : 4,
					  gap             : checkInitThumbGap(),
					  dragMinThreshold: {
					    mouse: 5,
					    touch: 10,
					  }	,
					  classes 		  : {
					  	arrows: "splide__arrows splide__custom__arrows"
					  }
					});

	                splideThumb.sync( thumbnails );
	                
	                splideThumb.mount();
	                
            		thumbnails.mount();
                	
					sliderBreakPoints();
					
					sliderPaginationChecking();
					
					document.addEventListener('dataMediaSourceChange', sliderBreakPoints);
					
					
					
					function sliderBreakPoints() {
		                let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
		
						setTimeout(function(){
							if ($alignItem.length) {
								let itemHeight = $alignItem.outerHeight() / 2;
								let arrowsPosition = itemHeight + $alignItem.position().top;
	
								$this.find('.splide__arrow').css('top', arrowsPosition);
							}
						}, 100);
						
		                switch (dataMediaSource) {
		                    case 'media-xl':
		                        splideThumb.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[0],
		                            perPage: mediaPerPage[0],
		                        };

		                        break;
		                    case 'media-lg':
		                        splideThumb.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[1],
		                            perPage: mediaPerPage[1],
		                        };
		
		                        break;
		                    case 'media-md':
		                        splideThumb.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[2],
		                            perPage: mediaPerPage[2],
		                        };
		                        break;
		                    case 'media-sm':
		                        splideThumb.options = {
									arrows: false,
									pagination: true,
		                            gap: mediaGap[3],
		                            perPage: mediaPerPage[3],
		                        };
		
		                        break;
		                    case 'media-xs':
		                        splideThumb.options = {
									arrows: false,
									pagination: true,
		                            gap: mediaGap[4],
		                            perPage: mediaPerPage[4],
		                        };

		                        break;
		                }
		                if($block.data('slider-thumb-init') == true) {
							switch (dataMediaSource) {
			                    case 'media-xl':
			                        thumbnails.options = {
			                            gap: mediaThumbGap[0],
			                            fixedWidth: mediaThumbFixedWidth[0],
			                            fixedHeight: mediaThumbFixedHeight[0],
			                        };
			
			                        break;
			                    case 'media-lg':
			                        thumbnails.options = {
			                            gap: mediaThumbGap[1],
			                            fixedWidth: mediaThumbFixedWidth[1],
			                            fixedHeight: mediaThumbFixedHeight[1],
			                        };
			
			                        break;
			                    case 'media-md':
			                        thumbnails.options = {
			                            gap: mediaThumbGap[2],
			                            fixedWidth: mediaThumbFixedWidth[2],
			                            fixedHeight: mediaThumbFixedHeight[2],
			                        };
			
			                        break;
			                    case 'media-sm':
			                        thumbnails.options = {
			                            gap: mediaThumbGap[3],
			                            fixedWidth: mediaThumbFixedWidth[3],
			                            fixedHeight: mediaThumbFixedHeight[3],
			                        };
			
			                        break;
			                    case 'media-xs':
			                        thumbnails.options = {
			                            gap: mediaThumbGap[4],
			                            fixedWidth: mediaThumbFixedWidth[4],
			                            fixedHeight: mediaThumbFixedHeight[4],
			                        };
			                        
			                        break;
			                }
						}
					};
					
					function checkInitPerPage() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaPerPage[0]
								break;
							case 'media-lg':
								return mediaPerPage[1]
								break;
							case 'media-md':
								return mediaPerPage[2]
								break;
							case 'media-sm':
								return mediaPerPage[3]
								break;
							case 'media-xs':
								return mediaPerPage[4]
								break;
						};
					};
					
					function checkInitThumbWidth() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbFixedWidth[0]
								break;
							case 'media-lg':
								return mediaThumbFixedWidth[1]
								break;
							case 'media-md':
								return mediaThumbFixedWidth[2]
								break;
							case 'media-sm':
								return mediaThumbFixedWidth[3]
								break;
							case 'media-xs':
								return mediaThumbFixedWidth[4]
								break;
						};
					};
					
					function checkInitThumbHeight() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbFixedHeight[0]
								break;
							case 'media-lg':
								return mediaThumbFixedHeight[1]
								break;
							case 'media-md':
								return mediaThumbFixedHeight[2]
								break;
							case 'media-sm':
								return mediaThumbFixedHeight[3]
								break;
							case 'media-xs':
								return mediaThumbFixedHeight[4]
								break;
						};
					};
					
					function checkInitThumbGap() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbGap[0]
								break;
							case 'media-lg':
								return mediaThumbGap[1]
								break;
							case 'media-md':
								return mediaThumbGap[2]
								break;
							case 'media-sm':
								return mediaThumbGap[3]
								break;
							case 'media-xs':
								return mediaThumbGap[4]
								break;
						};
					};
					function sliderPaginationChecking() {
						let sliderPaginationBlock = $this.find('.splide__custom__pagination');
						setTimeout(function() {
						if (sliderPaginationBlock.find('li').length == 1) {
							sliderPaginationBlock.hide();
						}
						 }, 200);
						
					};
	            }
	        });
	    }	
	};
	
	
	
	lpc_template.queue.sliderBlockThumbGallery = function ($self) {
	    var $block = $self.attr('data-slider-gallary-thumb-init') ? $self : $self.find('[data-slider-gallary-thumb-init]');
	    if ($block.length) {
	        $block.each(function(){
	            let $this = $(this);
				let $alignItem = $this.find($this.data('align-item'));
				let mediaGap = $this.data('margin');
				let mediaPerPage = $(this).data('count');
				let mediaThumbGap = $this.data('thumb-margin');
				let mediaThumbFixedWidth = $this.data('thumb-width');
				let mediaThumbFixedHeight = $this.data('thumb-height');
				let mediaThumbDirectionItems = $this.data('thumb-direction');
				let mediaThumbDirection = [];

				mediaThumbDirectionItems.forEach(function (item){
					if(item == 1) {
						item = 'ttb'
					}
					if(item == 0) {
						item = 'ltr'
					}
					mediaThumbDirection.push(item)
				});
	                
	            if($this.find('#main-slider').not('.is-active').length != 0 ) {
	                let splideThumbGallary = new Splide( $this.find('.splide').not('.is-active')[0], {
						autoplay: $this.data('autoplay'),
						speed: $this.data('speed'),
						interval: $this.data('pause'),
	                    /*rewind: $this.data('infinite'),*/
	                    lazyLoad: $this.data('lazy-load'),
	                    rewind: true,
	                    perMove: 1,
						perPage: checkInitPerPage(),
						dragMinThreshold: {
						    mouse: 5,
						    touch: 10,
						}	
	                });
	                
	                let thumbnailsGallary = new Splide($this.find('.thumbnail-slider').not('.is-active')[0], {
	                  direction       : checkInitThumbDirection(),
	                  heightRatio     : 3.2,
					  rewind          : true,
					  count			  : 6,
					  fixedWidth      : checkInitThumbWidth(),
					  fixedHeight     : checkInitThumbHeight(),
					  isNavigation    : true,
					  pagination      : false,
					  perPage		  : 6,
					  cover           : false,
					  arrows     	  : $this.data('thumb-arrow'),
                	  drag            : true,
                	  padding         : 4,
					  gap             : checkInitThumbGap(),
					  clones          : 5,
					  dragMinThreshold: {
					    mouse: 5,
					    touch: 10,
					  }	,
					  classes 		  : {
					  	arrows: "splide__arrows splide__custom__arrows"
					  }
					});

	                splideThumbGallary.sync( thumbnailsGallary );
	                
	                splideThumbGallary.mount();
	                
            		thumbnailsGallary.mount();
                	
					sliderBreakPoints();
					
					sliderPaginationChecking();
					
					document.addEventListener('dataMediaSourceChange', sliderBreakPoints);
					
					function sliderBreakPoints() {
						
		                let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
						setTimeout(function(){
							if ($alignItem.length) {
								let itemHeight = $alignItem.outerHeight() / 2;
								let arrowsPosition = itemHeight + $alignItem.position().top;
	
								$this.find('.splide__arrow').css('top', arrowsPosition);
							}
						}, 100);
						
		                switch (dataMediaSource) {
		                    case 'media-xl':
		                        splideThumbGallary.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[0],
		                            perPage: mediaPerPage[0],
		                            
		                        };

		                        break;
		                    case 'media-lg':
		                        splideThumbGallary.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[1],
		                            perPage: mediaPerPage[1],
		                        };
		
		                        break;
		                    case 'media-md':
		                        splideThumbGallary.options = {
									arrows: true,
									pagination: true,
		                            gap: mediaGap[2],
		                            perPage: mediaPerPage[2],
		                        };
		                        break;
		                    case 'media-sm':
		                        splideThumbGallary.options = {
									arrows: false,
									pagination: true,
		                            gap: mediaGap[3],
		                            perPage: mediaPerPage[3],
		                        };
		
		                        break;
		                    case 'media-xs':
		                        splideThumbGallary.options = {
									arrows: false,
									pagination: true,
		                            gap: mediaGap[4],
		                            perPage: mediaPerPage[4],
		                        };

		                        break;
		                }
		                if($block.data('slider-gallary-thumb-init') == true) {
							switch (dataMediaSource) {
			                    case 'media-xl':
			                        thumbnailsGallary.options = {
			                            gap: mediaThumbGap[0],
			                            fixedWidth: mediaThumbFixedWidth[0],
			                            fixedHeight: mediaThumbFixedHeight[0],
			                            direction: mediaThumbDirection[0],
		                        		heightRatio     : 3.2,
			                        };
			
			                        break;
			                    case 'media-lg':
			                        thumbnailsGallary.options = {
			                            gap: mediaThumbGap[1],
			                            fixedWidth: mediaThumbFixedWidth[1],
			                            fixedHeight: mediaThumbFixedHeight[1],
			                            direction: mediaThumbDirection[1],
			                            heightRatio     : 3.2,
			                        };
			
			                        break;
			                    case 'media-md':
			                        thumbnailsGallary.options = {
			                            gap: mediaThumbGap[2],
			                            fixedWidth: mediaThumbFixedWidth[2],
			                            fixedHeight: mediaThumbFixedHeight[2],
			                            direction: mediaThumbDirection[2],
			                            heightRatio     : 3.2,
			                        };
			
			                        break;
			                    case 'media-sm':
			                        thumbnailsGallary.options = {
			                            gap: mediaThumbGap[3],
			                            fixedWidth: mediaThumbFixedWidth[3],
			                            fixedHeight: mediaThumbFixedHeight[3],
			                            direction: mediaThumbDirection[3],
			                            heightRatio     : 3.2,
			                        };
			
			                        break;
			                    case 'media-xs':
			                        thumbnailsGallary.options = {
			                            gap: mediaThumbGap[4],
			                            fixedWidth: mediaThumbFixedWidth[4],
			                            fixedHeight: mediaThumbFixedHeight[4],
			                            direction: mediaThumbDirection[4],
			                            heightRatio     : 3.2,
			                        };
			                        
			                        break;
			                }
						}
					};
					
					function checkInitPerPage() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaPerPage[0]
								break;
							case 'media-lg':
								return mediaPerPage[1]
								break;
							case 'media-md':
								return mediaPerPage[2]
								break;
							case 'media-sm':
								return mediaPerPage[3]
								break;
							case 'media-xs':
								return mediaPerPage[4]
								break;
						};
					};
					
					function checkInitThumbWidth() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbFixedWidth[0]
								break;
							case 'media-lg':
								return mediaThumbFixedWidth[1]
								break;
							case 'media-md':
								return mediaThumbFixedWidth[2]
								break;
							case 'media-sm':
								return mediaThumbFixedWidth[3]
								break;
							case 'media-xs':
								return mediaThumbFixedWidth[4]
								break;
						};
					};
					
					function checkInitThumbHeight() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbFixedHeight[0]
								break;
							case 'media-lg':
								return mediaThumbFixedHeight[1]
								break;
							case 'media-md':
								return mediaThumbFixedHeight[2]
								break;
							case 'media-sm':
								return mediaThumbFixedHeight[3]
								break;
							case 'media-xs':
								return mediaThumbFixedHeight[4]
								break;
						};
					};
					
					function checkInitThumbGap() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbGap[0]
								break;
							case 'media-lg':
								return mediaThumbGap[1]
								break;
							case 'media-md':
								return mediaThumbGap[2]
								break;
							case 'media-sm':
								return mediaThumbGap[3]
								break;
							case 'media-xs':
								return mediaThumbGap[4]
								break;
						};
					};
					
					function checkInitThumbDirection() {
						let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
					
						switch (dataMediaSource) {
							case 'media-xl':
								return mediaThumbDirection[0]
								break;
							case 'media-lg':
								return mediaThumbDirection[1]
								break;
							case 'media-md':
								return mediaThumbDirection[2]
								break;
							case 'media-sm':
								return mediaThumbDirection[3]
								break;
							case 'media-xs':
								return mediaThumbDirection[4]
								break;
						};
					};
					
					function sliderPaginationChecking() {
						let sliderPaginationBlock = $this.find('.splide__custom__pagination');
						
						setTimeout(function() {
						if (sliderPaginationBlock.find('li').length == 1) {
							sliderPaginationBlock.hide();
						}
						 }, 200);
						
					};
	            }
	        });
	    }	
	};
	
	lpc_template.queue.videoPlayButton = function($self) {
		var $allVideoParets = $self.find('.js-lp-play-video').closest('.lp-video-block-wrappper');

		$self.on('click', '.js-lp-play-video', function(e) {
			e.preventDefault();

			var $this = $(this);
			var thisVideo = $this.parent('.lp-video-block-wrappper').find('video')[0];

			$this.addClass('hide');
			thisVideo.play();
			thisVideo.setAttribute('controls', 1);
		});

		$allVideoParets.find('video').each(function(){
			this.addEventListener('pause', function(){
				this.removeAttribute('controls');
				$(this).parent('.lp-video-block-wrappper').find('.js-lp-play-video').removeClass('hide')
			});
		});
	};

  lpc_template.queue.autoplayVideo = function ($self) {
    var $block = $self.find('[data-autoplay-video="1"]');
	
    if ($block.length) {
      $block.on("autoplayVideo", function (e, type, nodeName) {
        var video = this.querySelector(nodeName);

        if (nodeName === "video") {
          if (type === "play") {
            video.play();
          } else {
            video.pause();
          }
        } else if (nodeName === "iframe") {
          var video = $(video).data("youtube");

          if (type === "play") {
            video.playVideo();
          } else {
            video.pauseVideo();
          }
        }
      });
    }

    //setTimeout(function(){
    //	$win.trigger('scroll');
    //}, 1000);
  };

  lpc_template.queue.lg = function ($self) {
    var $block = $self.find(".js-lg-init");

    if ($block.length) {
      //setTimeout(function () {
        $block.lightGallery({
          selector: ".lg-item",
          toogleThumb: false,
          getCaptionFromTitleOrAlt: false,
          download: false,
          thumbWidth: 64,
          thumbHeight: "64px",
          addClass: "_lpc-lg",
          nextHtml:
            '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.98528 4.32805C9.3758 3.93753 10.009 3.93753 10.3995 4.32805L17.0563 10.9849C17.4469 11.3754 17.4469 12.0086 17.0563 12.3991L10.3995 19.056C10.009 19.4465 9.3758 19.4465 8.98528 19.056C8.59475 18.6654 8.59475 18.0323 8.98528 17.6418L14.935 11.692L8.98528 5.74226C8.59475 5.35174 8.59475 4.71857 8.98528 4.32805Z" fill="white"/></svg>',
          prevHtml:
            '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.8492 5.03516L8.19239 11.692L14.8492 18.3489" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        });
      //}, 500);
    }
  };
  
   lpc_template.queue.lpcContact2 = function ($blocks) {
	    var $block = $blocks.find(".lpc-contact-2");
	    let dataMediaSource = document.querySelector('.decor-wrap').dataset.mediaSource;
	    
	    if ($block.length && (dataMediaSource != 'media-sm' && dataMediaSource != 'media-xs')) {
	    	$block.each(function(){
	    		var $this = $(this),
	    		lpcMapBlockHeight = $this.find('.lpc-contact-2__content').height(),
				lpcMapBlock = $this.find('.lpc-contact-2__map-wrap');
				
		    	setTimeout(function() {
					lpcMapBlock.css('max-height', lpcMapBlockHeight)
		    	}, 1000);
	    	});
	    	
    	}
  	};
  	
  	lpc_template.queue.lpcConstructorFrameSelection = function ($blocks) {
  		if(window.location.pathname == "/my/s3/data/lp/live.edit.php") {
  			$('.content-lp-wrapper').addClass("lpc-const-frame-selection");
  		}
  		if(window.location.host == "mf1.ravshan95.oml.ru") {
  			$('.content-lp-wrapper').addClass("lpc-const-frame-selection-fix");
  		}
  	};
  	
  	lpc_template.queue.lpcForm5 = function ($blocks) {
	    var $block = $blocks.find(".lpc-form-5");
	    
	  	if ($block.length) {
	  		if($block.find("textarea").length != 0) {
	  		document.querySelector('.lpc-form-5 textarea').addEventListener('input', function (e) {
	  			
			  e.target.style.height = 50 + "px";
			  e.target.style.height = e.target.scrollHeight + 2 + "px"
			});
	    	
	  		}
	  	}
  	};
  	
  	lpc_template.queue.lpStepForm = function($self) {
	  var $block = $self.find('.js-lp-steps-form');
	
	  if ($block.length) {
	    $block.formsteps();
	  }
	};

  lpc_template.checkAutoplayVideo = function ($blocks) {
    $blocks.each(function () {
      var $this = $(this),
        playStatus = $this.data("playStatus"),
        inViewport = isElementInViewport(this),
        $video = $this.find("video"),
        $thisVideo = $video.length ? $video : $this.find("iframe");

      if (inViewport && playStatus !== "play") {
        $this.trigger("autoplayVideo", [
          "play",
          $thisVideo[0].nodeName.toLowerCase(),
        ]);
        $this.data("playStatus", "play");
      } else if (!inViewport && playStatus === "play") {
        $this.trigger("autoplayVideo", [
          "pause",
          $thisVideo[0].nodeName.toLowerCase(),
        ]);
        $this.data("playStatus", "pause");
      }
    });
  };
  

  window.lp_init = function ($block) {
  	
  	
    var $maps = $block.find(".js-lpc-simple-map");

    if ($maps.length) {
      setTimeout(function () {
        lpc_template.checkMapInitialization($maps);
      }, 250);
      $win.on("scroll", function () {
        lpc_template.checkMapInitialization($maps);
      });
      
    }

    if (s3LP.is_cms) {
      var contentColor = $("#lpc_contructor_iframe")
        .contents()
        .find(".decor-wrap")
        .css("color");
      $("#landing_page_site").css("color", contentColor);
    }

    $win
      .on("resize", function () {
        var decorWidth = $(".decor-wrap").width();
        $(".lpc-block").css("max-width", decorWidth);
      })
      .trigger("resize");

    Object.keys(lpc_template.queue).forEach(function (func) {
      var thisFunction = lpc_template.queue[func];
      if (typeof thisFunction == "function") {
        thisFunction($block);
      }
    });

    var $autoplayVideo = $doc.find('[data-autoplay-video="1"]');

    if ($autoplayVideo.length && !s3LP.is_cms && window.self == window.top) {
      $win.on("scroll", function () {
        lpc_template.checkAutoplayVideo($autoplayVideo);
      });
    }
    
    

    let timeout;

    $win
      .on("resize", function () {

        clearTimeout(timeout)

        timeout = setTimeout(function(){
          lpc_template.adaptiveBlock();
          lpc_template.popupAdaptiveBlock();
        }, 80);

        $(".js-proportion-height").each(function () {
          var $this = $(this);

          setProportionHeight($this, $this.data("proportion") || 100);
        });
      })
      .trigger("resize");

    if (s3LP.is_cms) {
      LpController.convertImages($block);

      setTimeout(function () {
        LpController.convertImages($block);
        LpController.afterSave(function () {
          $(".lpc-features-3-chart-item__number").each(function () {
            var $this = $(this);
            $this
              .closest(".lpc-features-3-chart-item")
              .find(".lpc-features-3-chart-item__bar-inner")
              .css("width", $this.text());
          });
        });
      }, 1000);
    }

    if (document.location.hash.length > 1 && $(document.location.hash).length) {
      setTimeout(function () {
        $("html, body").scrollTop($(document.location.hash).offset().top);
      }, 200);
    }
  };

  window.onYouTubeIframeAPIReady = function () {
    $(function () {
      var listYoutube = $(".js-lp-video-youtube");

      listYoutube.each(function () {
        var $this = $(this),
          isFullFrame = $this.hasClass("_not-paused");

        var player = new YT.Player(this.id, {
          iv_load_policy: 3,
          modestbranding: 1,
          rel: 0,
          mute: isFullFrame ? 1 : 0,
          playsinline: 1,
          showinfo: isFullFrame ? 0 : 1,
          events: {
            onStateChange: function (event) {
              if (
                event.data == YT.PlayerState.ENDED &&
                $(event.target.a).hasClass("_not-paused")
              ) {
                event.target.playVideo();
              }
            },
          },
        });

        $this.data("youtube", player);
      });
    });
  };

  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight - 200 && rect.bottom >= 50;
  }

  function setProportionHeight($block, proportion) {
    $block.height(($block.width() * proportion) / 100);
  }

})();

document.addEventListener("DOMContentLoaded", function () {
    let lpContent = document.getElementById("lp_constructor");
    let iframeBody = document;
    let iframeWindow = window;
    let timeout = 20;
    if (lpContent) {
        timeout = 1500;
    }
    setTimeout(function () {
        if (lpContent) {
            let iframe = document.querySelector("#lpc_contructor_iframe");

            if (iframe) {
                iframeBody = iframe.contentDocument.body;
                iframeWindow = iframe.contentWindow;
            }
        }

        const configBlock = `
            <div class="lpc-style-block" id="lpc-style-block" style="display: none">
                <h1 id="lpc-config-h1"></h1>
                <h2 id="lpc-config-h2"></h2>
                <h2 id="lpc-config-h2-main"></h2>
                <h3 id="lpc-config-h3"></h3>
                <h4 id="lpc-config-h4"></h4>
                <h5 id="lpc-config-h5"></h5>
                <h6 id="lpc-config-h6"></h6>
                <p id="lpc-config-p"></p>
                <p id="lpc-config-p-main"></p>
                <p id="lpc-config-button"></p>
            </div>
        `;

        let root = iframeBody.querySelector(".mosaic-wrap >.root");
        let content;
        if (root) {
            content = iframeBody.querySelector(".content");
        } else {
            content = iframeBody.querySelector("h1").parentElement;
        }
        if (content) {
            if(!content.querySelector('#lpc-style-block')) {
				content.insertAdjacentHTML('beforeend', configBlock);
			}

            let lpcStyleConfig = {};

            const getElementStyles = (elementId, styles) => {
                let element;
                if (elementId === 'lpc-config-h1' && root) {
                    element = iframeBody.querySelector('.page-title');
                } else {
                    element = iframeBody.querySelector("#" + elementId);
                }
                const object = {};
                const cssObj = iframeWindow.getComputedStyle(element, null);

                styles.forEach((style) => {
                    object[style] = cssObj.getPropertyValue(style) + ";";
                });

                lpcStyleConfig[elementId] = object;
            };

            const extractRGB = (color) => {
                const regex = /^rgba?\((\d+),\s*(\d+),\s*(\d+)/;
                let match = regex.exec(color);
                return [match[1], match[2], match[3]];
            };

            const checkFontFamily = (fontFamily) => {
                fontFamily = fontFamily.replace(/'/g, '').replace(/"/g, '');
                try {
					if (!document.fonts.check(`12px ${fontFamily}`)) {
	                    const link = document.createElement('link');
	                    link.href = `https://fonts.googleapis.com/css2?family=${fontFamily}`;
	                    link.rel = "stylesheet";
	                    document.head.appendChild(link);
	                }
				} catch (error) {
					console.log(error.message)
				}
            };

            const createCssVariable = (headerColor, textColor) => {
                let textColorBase = extractRGB(textColor);

                return `
                    :root {
                        --text-color-base: rgb(${textColorBase});
                        --text-color-a-01: rgba(${textColorBase}, 0.1);
                        --text-color-a-02: rgba(${textColorBase}, 0.2);
                        --text-color-a-03: rgba(${textColorBase}, 0.3);
                        --text-color-a-04: rgba(${textColorBase}, 0.4);
                        --text-color-a-05: rgba(${textColorBase}, 0.5);
                        --text-color-a-06: rgba(${textColorBase}, 0.6);
                        --text-color-a-07: rgba(${textColorBase}, 0.7);
                        --text-color-a-08: rgba(${textColorBase}, 0.8);
                        --text-color-a-09: rgba(${textColorBase}, 0.9);
                        --text-color-base-header: ${headerColor};
                    }
                `;
            };

            const getAllStyles = () => {
                getElementStyles("lpc-config-h1", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-h2", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-h3", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-h4", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-h5", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-h6", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-p", ["font-family", "font-style", "font-weight"]);
                getElementStyles("lpc-config-button", ["font-family", "font-style"]);
                getElementStyles("lpc-config-h2-main", ["color", "font-family"]);
                getElementStyles("lpc-config-p-main", ["color", "font-family"]);
            };

            const setAllStyles = () => {
                let styleConfig = lpcStyleConfig;
                let headerColor = styleConfig["lpc-config-h2-main"].color.replace(';', '');
                let headerFontFamily = styleConfig["lpc-config-h2-main"]['font-family'].split(',');
                let textColor = styleConfig["lpc-config-p-main"].color.replace(';', '');
                let textFontFamily = styleConfig["lpc-config-h2-main"]['font-family'].split(',');

                let parent = content;
                let bgStyle = `
                    :root {
                      --content-background-lpc: ${findBackgroundStyles(content)};
                    }
                `;

                let style = `        
                    <style id="lpc-stylesheet"> 
                    
                        ${createCssVariable(headerColor, textColor)}
                    
                        ${bgStyle}
                    
                        .lpc-wrap .lp-header-text-1,
                        .lpc-wrap .lp-header-text-2,
                        .lpc-wrap .lp-header-text-3,
                        .lpc-wrap .lp-header-text-4 ${JSON.stringify(styleConfig["lpc-config-p"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                    
                        .lp-button ${JSON.stringify(styleConfig["lpc-config-button"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                        
                        .lpc-wrap h1.lp-header-title-1,
                        .lpc-wrap .lp-header-title-1 ${JSON.stringify(styleConfig["lpc-config-h1"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                        
                        
                        .lpc-wrap h2.lp-header-title-2,
                        .lpc-wrap .lp-header-title-2 ${JSON.stringify(styleConfig["lpc-config-h2"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                        
                        
                        .lpc-wrap h3.lp-header-title-3,
                        .lpc-wrap .lp-header-title-3 ${JSON.stringify(styleConfig["lpc-config-h3"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                        
                        .lpc-wrap h4.lp-header-title-4,
                        .lpc-wrap .lp-header-title-4 ${JSON.stringify(styleConfig["lpc-config-h4"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                        
                        .lpc-wrap h5.lp-header-title-5,
                        .lpc-wrap .lp-header-title-5 ${JSON.stringify(styleConfig["lpc-config-h5"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                        
                        .lpc-wrap h6.lp-header-title-6,
                        .lpc-wrap .lp-header-title-6 ${JSON.stringify(styleConfig["lpc-config-h6"])
                    .replace(/\\"/gm, "&")
                    .replace(/"+,|"/gm, "")
                    .replace(/&/gm, '"')}
                    
                    </style>
                `;

                let constructor = document.querySelector("#landing_page_site");
                if (constructor) {
                    let lpcStylesheet = document.querySelector('#lpc-stylesheet');
                    if (lpcStylesheet) {
                        lpcStylesheet.remove();
                    }
                    let placeToInsert = document.querySelector('script[src="/g/s3/lp/lpc.v4/js/main.js"]');
                    placeToInsert.insertAdjacentHTML('afterend', style);
                    checkFontFamily(headerFontFamily[0]);
                    checkFontFamily(textFontFamily[0]);
                } else {
                    let lpcStylesheet = document.querySelector('#lpc-stylesheet');
                    if (lpcStylesheet) {
                        lpcStylesheet.remove();
                    }
                    document.querySelector('#lpc-styles-container').innerHTML += style;
                }
            };

            getAllStyles();
            setAllStyles();

            document.addEventListener('dataMediaSourceChange', function () {
                getAllStyles();
                setAllStyles();
            });
            
            
            let target = document.querySelector('body');
			let observer = new MutationObserver(function(mutations) {
				mutations.forEach(function(mutation) {
					if (document.querySelectorAll('.s3solution-panel-root').length>0) {
					
						$(document).on('click', '.js-panel-themes-list .js-theme-item', function () {
							setTimeout(function() {
				                getAllStyles();
			                	setAllStyles();
							}, 180);
			            });
									
						observer.disconnect();
					}
				});    
			});
			let config = {
				attributes: true,
				childList: true,
				characterData: true
			};
			
			observer.observe(target, config);
        }
        
        function findBackgroundStyles(content) {
		    const convertRgbToRgba = (color) => {
		        if (color.startsWith('rgb(')) {
		            return color.replace('rgb(', 'rgba(').replace(')', ', 1)');
		        }
		        return color;
		    };
		
			const isColorOpaque = (color) => {
		        const rgbaColor = convertRgbToRgba(color);
		        return parseFloat(rgbaColor.split(',')[3]) > 0;
		    };
		
			const getBackgroundColor = (color) => {
		        return isColorOpaque(color) ? convertRgbToRgba(color) : null;
		    };
		
			const resultStyles = [];
		
			const currentElement = content;
		    let parent = currentElement;
		
		    while (parent && parent.tagName !== 'HTML') {
		        const computedStyle = getComputedStyle(parent);
		        const currentBackground = computedStyle.backgroundColor;
		        const currentBackgroundImage = computedStyle.backgroundImage;
		
			if (currentBackgroundImage) {
	            resultStyles.push(currentBackgroundImage);
	        }
		
			const bgColor = getBackgroundColor(currentBackground);
		        if (bgColor) {
		            resultStyles.push(`linear-gradient(to right, ${bgColor} 0%, ${bgColor} 100%)`);
		        }
		
				parent = parent.parentNode;
		    }
		
			const filteredStyles = resultStyles.filter(style => style !== 'none');
			    if (filteredStyles.length > 0) {
			        const multiBgStyle = filteredStyles.join(", ");
			        return multiBgStyle;
			    }
			}
        

        const toRGBArray = rgbStr => rgbStr.match(/\d+/g).map(Number);

        document.querySelectorAll('.has_custom_bg').forEach(function (element) {
            let customBg = toRGBArray(window.getComputedStyle(element).backgroundColor);
            let textColor = Math.round((parseInt(customBg[0]) * 299 + parseInt(customBg[1]) * 587 + parseInt(customBg[2]) * 114) / 1000);

            if (textColor > 150) {
                element.style.color = '#000';
                element.querySelectorAll('[data-elem-type="text"]').forEach(function (textElement) {
                    textElement.style.color = '#000';
                });
                element.querySelectorAll('[data-elem-type="header"]').forEach(function (headerElement) {
                    headerElement.style.color = '#000';
                });
            } else {
                element.style.color = '#fff';
                element.querySelectorAll('[data-elem-type="text"]').forEach(function (textElement) {
                    textElement.style.color = '#fff';
                });
                element.querySelectorAll('[data-elem-type="header"]').forEach(function (headerElement) {
                    headerElement.style.color = '#fff';
                });
            }
        });
        
        document.querySelectorAll('.ya-share2').forEach(function (element) {
            let customBgShare = toRGBArray(window.getComputedStyle(element).backgroundColor);
            let textColorShare = Math.round((parseInt(customBgShare[0]) * 299 + parseInt(customBgShare[1]) * 587 + parseInt(customBgShare[2]) * 114) / 1000);

            if (textColorShare > 150) {
                $('.ya-share2').addClass("lpc-share-light-mode");
            } else {
                $('.ya-share2').addClass("lpc-share-dark-mode");
            }
        });
    }, timeout);

    setTimeout(() => {
        const calculators = document.querySelectorAll('.lpc-calculator');

        if (calculators.length) {
            calculators.forEach(calculator => {
                const calc = new Calculator(calculator);
                calc.init();
            });
        }
    }, 500);

});

class Calculator {
    constructor(calculator) {
        this.calculator = calculator;
        this.calculateButton = this.calculator.querySelector('.calculate_button');
        this.calculateFormula = this.calculateButton.getAttribute('data-calculator-formula');
        this.calculateResult = this.calculator.querySelector('.js_calculate_result');
        this.calculateInputs = this.calculator.querySelectorAll('input');
        this.calculateErrorBlock = this.calculator.querySelector('.calculate-error-block');
    }

    parseCalculatorFormula (formula) {
        let variableRegex = '([a-zA-Z0-9]?[a-zA-Z]+)';
        let formulaVariables = Array.from(formula.matchAll(variableRegex));
        let parsedFormula = formula;
        for (const formulaVariable of formulaVariables) {
            let inputValue = this.calculator.querySelector(`input[data-calculator-alias=${formulaVariable[0]}]`).value;
            parsedFormula = parsedFormula.replace(formulaVariable[0], inputValue ? inputValue : NULL);
        }

        return eval(parsedFormula);
    }

    init() {
        this.calculateButton.addEventListener('click', () => {
            this.calculateErrorBlock.innerHTML = '';
            try {
                this.calculateResult.querySelector('span').textContent = this.parseCalculatorFormula(this.calculateFormula).toFixed(2);
            } catch (e) {
                this.calculateErrorBlock.innerHTML += '<p>Проверьте корректность введенных данных</p>';
                this.calculateResult.querySelector('span').textContent = 0;
            }
        });
    }
}