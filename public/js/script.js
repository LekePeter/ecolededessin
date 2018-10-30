/**
 * ------------------------------------------------------------------------
 * JA Fixel Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

if (typeof MooTools != 'undefined' && window.mootoolGetSize){
	window.getSize = window.mootoolGetSize;
}

var Fixel = Fixel || {};

(function($){
	$.extend(Fixel, {
		keys: {
			DOWN: 40,
			ENTER: 13,
			ESCAPE: 27,
			HOME: 36,
			LEFT: 37,
			PAGE_DOWN: 34,
			PAGE_UP: 33,
			RIGHT: 39,
			SPACE: 32,
			TAB: 9,
			UP: 38
		},

		baselink: window.location.protocol.split(':')[0] + '://' + window.location.hostname,

		support: (function(){

			var docStyle = document.documentElement.style,
				dummyStyle = document.createElement('div').style,
				undef,

				vendor = (function () {
					var vendors = 't,webkitT,MozT,msT,OT'.split(','),
						t,
						i = 0,
						l = vendors.length;

					for ( ; i < l; i++ ) {
						t = vendors[i] + 'ransform';
						if ( t in dummyStyle ) {
							return vendors[i].substr(0, vendors[i].length - 1);
						}
					}

					return false;
				})(),
				
				cssVendor = vendor ? '-' + vendor.toLowerCase() + '-' : '',
				
				prefixStyle = function (style) {
					if ( vendor === '' ) return style;

					style = style.charAt(0).toUpperCase() + style.substr(1);
					return vendor + style;
				},

				result = {
					vendor: vendor,
					cssVendor: cssVendor,

					// Style properties
					transform: prefixStyle('transform'),
					transformOrigin: prefixStyle('transformOrigin'),
					
					transition: prefixStyle('transition'),
					transitionProperty: prefixStyle('transitionProperty'),
					transitionDuration: prefixStyle('transitionDuration'),
					transitionTimingFunction: prefixStyle('transitionTimingFunction'),
					transitionDelay: prefixStyle('transitionDelay'),
					
					perspective: prefixStyle('perspective')
				};

			if (dummyStyle[result.perspective] !== undef) {
				result.has3d = true;
				result.has2d = true;
			} else if (dummyStyle[result.transform] !== undef) {
				result.has2d = true;
			}

			result.translateZ = result.has3d ? ' translateZ(0)' : '';

			helperElem = null;

			return result;
		})(),

		cleanurl: function(link){
			return link.replace(this.baselink, '').replace(T3JSVars.baseUrl, '');
		},

		scrollToElm: function(elm){
			elm = $(elm);

			if(elm.length){
				var wnd = $(window),
					offset = elm.offset(),
					height = elm.outerHeight(true),
					scrollTop = wnd.scrollTop(),
					wndHeight = wnd.height();

				if(scrollTop > offset.top || scrollTop + wndHeight < offset.top + height){
					$('html, body').stop(true).animate({
						scrollTop: Math.max(0, Math.min(offset.top + (height - wndHeight / 2), $(document).height()))
					});
				}
			}
		}
	})
})(jQuery);


//fixed masonry
(function(){

	Masonry.prototype._getColGroup = function( colSpan ) {
		if ( colSpan === 1 ) {
			// if brick spans only one column, use all the column Ys
			return this.colYs;
		}

		var colGroup = [];
		// how many different places could this brick fit horizontally
		var groupCount = this.cols + 1 - colSpan;
		// for each group potential horizontal position
		for ( var i = 0; i < groupCount; i++ ) {
			// make an array of colY values for that one group
			var groupColYs = this.colYs.slice( i, i + colSpan );
			// and get the max value of the array
			colGroup[i] = groupColYs.length ? Math.max.apply( Math, groupColYs ) : 0;
		}
		
		return colGroup;
	};

})();


//ready
(function($){


 	$(document).ready(function(){

 		//detect 
 		(function(){
	 		Fixel.rtl      = $(document.documentElement).attr('dir') == 'rtl';
			Fixel.irtl     = Fixel.rtl ? -1 : 1;
			Fixel.hasTouch = 'ontouchstart' in window && !(/hp-tablet/gi).test(navigator.appVersion);

			//jquery.address
			history.pushState && $.address && $.address.state(T3JSVars.baseUrl);

 		})();


 		//init masonry and infinity scroll
 		(function(){

 			//extend infinityscroll
			$.extend($.infinitescroll.prototype, {
				_loadcallback_fixel: function(box, data) {
					var opts = this.options,
		            callback = this.options.callback, // GLOBAL OBJECT FOR CALLBACK
		            result = (opts.state.isDone) ? 'done' : (!opts.appendCallback) ? 'no-append' : 'append',
		            endstatus = data.indexOf('data-fixel-infinity-end') != -1,
		            donestatus = !endstatus && data.indexOf('data-fixel-infinity-done') != -1,
		            frag

		            if(endstatus){
		            	return this._error('end');
		            }

					switch (result) {
						case 'done':
							this._showdonemsg();
							return false;

						case 'no-append':
							if (opts.dataType === 'html') {
								data = '<div>' + data + '</div>';
								data = $(data).find(opts.itemSelector);
							}
							break;

						case 'append':
							var children = box.children();
							// if it didn't return anything
							if (children.length === 0) {
								return this._error('end');
							}

							// use a documentFragment because it works when content is going into a table or UL
							frag = document.createDocumentFragment();
							while (box[0].firstChild) {
								frag.appendChild(box[0].firstChild);
							}

							this._debug('contentSelector', $(opts.contentSelector)[0]);
							$(opts.contentSelector)[0].appendChild(frag);
							// previously, we would pass in the new DOM element as context for the callback
							// however we're now using a documentfragment, which doesn't have parents or children,
							// so the context is the contentContainer guy, and we pass in an array
							// of the elements collected as the first argument.

							data = children.get();
							break;
					}

		            // loadingEnd function
		            opts.loading.finished.call($(opts.contentSelector)[0],opts);

		            // smooth scroll to ease in the new content
		            if (opts.animate) {
		                var scrollTo = $(window).scrollTop() + $('#infscr-loading').height() + opts.extraScrollPx + 'px';
		                $('html,body').animate({ scrollTop: scrollTo }, 800, function () { opts.state.isDuringAjax = false; });
		            }

		            if (!opts.animate) {
						// once the call is done, we can allow it again.
						opts.state.isDuringAjax = false;
					}

		            callback(this, data, '');

					if (opts.prefill) {
						this._prefill();
					}

					if(donestatus){
		            	return this._error('end');
		            }
				}
			});

 			var masonry = $('#fixel-grid');
 			if(!masonry.length){
 				return false;
 			}

 			var blank = $('<div id="blank-item" class="items grid-1x1"></div>')
 							.css({
 								height: 0,
 								visibility: 'hidden'
 							})
 							.appendTo(masonry),
 				placeholder  = $('#fixel-placeholder'),
 				filter       = $('#fixel-tag-filter'),
 				usid         = null,
 				lastWndWidth = 0,
 				itemWidth    = 0,

 				updateMasonry = function(){
 					masonry.masonry('layout');
 				},

 				updateContainer = function(){
 					lastWndWidth = $(window).width();
			
					var baseWidth = blank.css('width', '').width(), // base width
						contWidth = masonry.width(), // container width
						cols = Math.round(contWidth / baseWidth), //  detect number of columns by it's container
						newBaseWidth = Math.floor(contWidth / cols); // update new width
					
					blank.width(itemWidth);
					
					if (itemWidth != newBaseWidth) {
						itemWidth = newBaseWidth;

						updateItems();
					}
					
					//layout
					updateMasonry();
 				},

 				updateItems = function(items){
 					if(itemWidth == 0){
 						return false;
 					}

 					if(!items){
 						items = $(masonry.masonry('getItemElements'));
 					}

 					items.width(itemWidth).height(itemWidth);
 					items.filter('.grid-2x1').width(itemWidth * 2);
 					items.filter('.grid-1x2').height(itemWidth * 2);
 					items.filter('.grid-2x2').width(itemWidth * 2).height(itemWidth * 2);
 					items.filter('.grid-3x2').width(itemWidth * 3).height(itemWidth * 2);
 				},

 				initMasonry = function(){
 					
 					//lock browser to top
 					Fixel.ignoreScroll = true;
 					$('html, body').animate({ scrollTop: 0 }, 250, function(){
 						setTimeout(function(){ Fixel.ignoreScroll = false; }, 100);
 					}); 

		 			masonry.masonry({
						columnWidth: '#blank-item',
						itemSelector: '.items',
						isResizeBound: false,
						transitionDuration: placeholder.length ? '0' : '0.4s'
					});

					//set stamp items
					var stamps = $(masonry.masonry('getItemElements')).filter('.corner-stamp');
					if(stamps.length){
						stamps.css({
							position: '',
							left: '',
							top: ''
						});

						masonry.masonry('stamp', stamps);
					}


					//toggle sub category
					var cattoggles = masonry.find('.fixel-cat-toggle');
					if(cattoggles.length){

						cattoggles.on('click', function(){
							
							var toggle = $(this),
								selector = $(this).attr('href');

							selector = selector && /#/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, ''); //strip for ie7
							
							if(selector){

								var group = $(selector);

								if(group.length){
									
									toggle.toggleClass('active');

									var	activated = toggle.hasClass('active'),
										items = group[activated ? 'children' : 'find']('.items');

									toggle
										.find('span')
										.removeClass('icon-plus icon-minus')
										.addClass(activated ? 'icon-minus' : 'icon-plus');

									if(items.length){

										$(document.body).addClass('re-layout')
										items.toggleClass('item-hide', !activated);
										activated && items.css('display', '');
										!activated && group.find('.fixel-cat-toggle')
														.removeClass('active')
														.find('span')
															.removeClass('icon-minus')
															.addClass('icon-plus');

										//update masonry layout
										updateMasonry();
										
										// hide/reveal items
										$(document.body).removeClass('re-layout');

										//prevent (moving) animation
										activated && items.css(Fixel.support.transitionDuration, '0');

										//remove all queues event
										var mitems = masonry.masonry('getItems', items);

										for(var i = 0, il = mitems.length; i < il; i++){
											activated && mitems[i].trigger('transitionEnd', [mitems[i]]);
											mitems[i].removeEvent('transitionEnd');
										}

										masonry.masonry(!toggle.hasClass('active') ? 'hide' : 'reveal', mitems);		
									}

									return false;
								}
							}
						});

						masonry
							.find('.fixel-sub-category').addClass('show')
							.find('.items').css('display', 'none');
					}

					if(filter.length){

						var activefilter = null;

						filter.on('click', 'a[data-tag]', function(e){
							e.preventDefault();

							if(activefilter == this){
								return false;
							}

							if(activefilter){
								activefilter.removeClass('active');
							}

							var toggle = $(this),
								filterval = toggle.attr('data-tag') || '';

							Fixel.tagfilter = filterval;
							activefilter = this;

							toggle.addClass('active');

							var items = $(masonry.masonry('getItemElements')).not('#blank-item'),
								item = null,
								ishided = null;
								showitems = [],
								hideitems = [];

							if(items.length){

								$(document.body).addClass('re-layout');
								items.each(function(){

									item = $(this);
									ishided = item.hasClass('item-hide');
									
									if(!filterval || item.hasClass(filterval)){
										if(ishided){
											item.removeClass('item-hide').css('display', '');											
											showitems.push(this);
										}
									} else {
										if(!ishided){
											item.addClass('item-hide');
											hideitems.push(this);
										}
									}
								});

								//update masonry layout
								updateMasonry();
								
								// hide/reveal items
								$(document.body).removeClass('re-layout');

								//remove all queues event
								$.each(masonry.masonry('getItems', items), function(){
									this.trigger('transitionEnd', [this]);
									this.removeEvent('transitionEnd');
								});
								
								showitems.length && masonry.masonry('reveal', masonry.masonry('getItems', showitems));
								hideitems.length && masonry.masonry('hide', masonry.masonry('getItems', hideitems));
							}

							return false;
						});
					}

		 			//bind smartresize and start
					$(window).bind('resize.masonry orientationchange.masonry', function(e){
						clearTimeout(usid);
						if(lastWndWidth != $(window).width() || e.isTrigger){
							usid = setTimeout(updateContainer, 100 + Fixel.hasTouch ? 400 : 0);
						}
					}).trigger('resize.masonry');

					//set ready state
					masonry.addClass('ready');

					masonry.masonry('on', 'layoutComplete', firstLoad);
				};

			//init some values
			placeholder.length && placeholder.css('height', $(window).height() - ($('#t3-mainnav').outerHeight(true) || 0) - ($('#t3-footer').outerHeight(true) || 0));
			
			//load images
			masonry
				.imagesLoaded()
				.always( function( instance ) {

					if(placeholder.length){

						placeholder.find(':first').css('opacity', 1).fadeTo(1000, 0, function(){
							
							masonry.css('display', 'block');

							//init masonry
							initMasonry();

							var items = $(masonry.masonry('getItemElements')).css('opacity', 0),
								mitems = masonry.masonry('getItems', items),
								timeBuff = 0;

							setTimeout(function(){

								//restore animation
								Masonry.data($('#fixel-grid').get(0)).options.transitionDuration = '0.4s';

								//show effect on init
								$.each(mitems, function(i, item){
									setTimeout(function(){
										$(item.element).css('opacity', '');
										masonry.masonry('reveal', [item]);
									}, timeBuff += 100);
								});

								//remove placeholder
								placeholder.remove();

							}, 500);
						});
					} else {

						initMasonry();
					}
				});

			//init infinityscrol
			var	nextbtn = $('#infinity-next'),
				paginfo = $('#page-next-link'),
				ploader = $('#page-loader').removeClass('hide').hide(),
				pathobject = {
					init: function(link){
						
						var pagenext = $('#page-next-link'),
							fromelm = false;

						if(!link) {
							fromelm = true;
							link = pagenext.attr('href') || '';
						}

						this.path = link;
						
						var match = this.path.match(/((page|limitstart|start)[=-])(\d*)(&*)/i);

						if(match){
							this.type = match[2].toLowerCase();
							this.number = parseInt(match[3]);
							this.limit = this.type == 'page' ? 1 : this.number;
							this.number = this.type == 'page' ? this.number : 1;
							this.init = 0;

							var limit = parseInt(pagenext.attr('data-limit')),
								init = parseInt(pagenext.attr('data-start'));

							if(isNaN(limit)){
								limit = 0;
							}

							if(isNaN(init)){
								init = 0;
							}

							if(fromelm && this.limit != limit && (this.type == 'start' || this.type == 'limitstart')){

								this.init = Math.max(0, init);
								this.number = 1;
								this.limit = limit;
							}

						} else {
							this.type = 'unk';
							this.number = 2;
							this.path = this.path + (this.path.indexOf('?') == -1 ? '?' : '') + 'start=';
						}

						var urlparts = this.path.split('#');
						if(urlparts[0].indexOf('?') == -1){
							urlparts[0] += '?tmpl=component';
						} else {
							urlparts[0] += '&tmpl=component';
						}

						this.path = urlparts.join('#');
					},
					
					join: function(){
						if(pathobject.type == 'unk'){
							return pathobject.path + pathobject.number++;
						} else{
							return pathobject.path.replace(/((page|limitstart|start)[=-])(\d*)(&*)/i, '$1' + (pathobject.init + pathobject.limit * pathobject.number++) + '$4');
						}
					}
				},

				firstLoad = function(){
					if(!(nextbtn.attr('data-fixel-infinity-end') || nextbtn.attr('data-fixel-infinity-done'))){
						nextbtn.removeClass('hidden');
					}

					masonry.masonry('off', 'layoutComplete', firstLoad);
				};


			pathobject.init();
		
			//init an instance
			masonry.infinitescroll({
				loading: {
					finished: undefined,
					finishedMsg: T3JSVars.finishedMsg,
					img: T3JSVars.tplUrl + '/images/ajax-load.gif',
					msg: null,
					msgText: T3JSVars.msgText,
					selector: null,
					speed: 'fast',
					start: undefined
				},
				state: {
					isDuringAjax: false,
					isInvalidPage: false,
					isDestroyed: false,
					isDone: false, // For when it goes all the way through the archive.
					isPaused: false,
					currPage: 0
				},
				debug: false,
				behavior: 'fixel',
				binder: $(window), // used to cache the selector for the element that will be scrolling
				nextSelector: '#page-next-link',
				navSelector: '#page-nav',
				contentSelector: '#fixel-grid', // rename to pageFragment
				extraScrollPx: 150,
				itemSelector: '.items',
				animate: false,
				pathParse: pathobject.join,
				dataType: 'html',
				appendCallback: true,
				bufferPx: 350,
				errorCallback: function () {
					ploader.modal('hide');
					nextbtn.addClass('finished').html(T3JSVars.finishedMsg);
				},
				infid: 0, //Instance ID
				pixelsFromNavToBottom: undefined,
				path: pathobject.join, // Can either be an array of URL parts (e.g. ["/page/", "/"]) or a function that accepts the page number and returns a URL
				prefill: false, // When the document is smaller than the window, load data until the document is larger or links are exhausted
				maxPage: undefined // to manually control maximum page (when maxPage is undefined, maximum page limitation is not work)
			}, function(items){

				ploader.modal('hide');

				//remove no-repeat item
				items = $(items).filter(function(){
					if($(this).hasClass('no-repeat')){
						$(this).remove();

						return false;
					} else {
						return true;
					}
				});

				if(items.length){
					updateItems(items);

					if(filter.length && Fixel.tagfilter){
						items.filter(':not(.' + Fixel.tagfilter + ')').addClass('item-hide').css('display', 'none');
					}
					
					//update masonry
					if(masonry.hasClass('ready')){
						masonry.masonry('appended', items);
					}
					
					//update disqus if needed
					if(typeof DISQUSWIDGETS != 'undefined'){
						DISQUSWIDGETS.getCount();
					}

					//update hoverdir
					if(masonry.hasClass('jshop')){
						items.each(function(){
							$(this).hoverdir({selector:'.prod-info'});
						});
					}
				}

				if(items.length < parseInt(paginfo.attr('data-limit') || nextbtn.attr('data-limit') || 0)){
					nextbtn.addClass('finished').html(T3JSVars.finishedMsg);
				}
			});

			//we remove autoload
			$(window).unbind('.infscr');

			if(nextbtn.length){
				nextbtn.on('click', function(){

					if(!nextbtn.hasClass('finished')){
						ploader.modal('show');
						masonry.infinitescroll('retrieve');
					}

					return false;
				});

				ploader.insertBefore(nextbtn);
			}
			
		})();

		
		(function(){
 			// Add class for mainmenu when scroller
            var light = null,
            	sid = null,
            	mainnav = $('#t3-mainnav');

            if(mainnav.length){
	            $(window).scroll(function() {
					
					if(light != $(window).scrollTop() > mainnav.outerHeight(true) * 1.5){
						light = !light;

						light ? mainnav.addClass('affix') : mainnav.removeClass('light-mainnav');
						
						//force reflow
						mainnav[0].offsetWidth;

						light ? mainnav.addClass('light-mainnav') : mainnav.removeClass('affix');
					}
	            })
	        }

 		})();


 		//init top pannel
		(function(){

			var pannel = $('#fixel-top-panel');
			
			if(pannel.length){

				var togglebtn = $('#fixel-top-pannel-link'),
					mainnav = $('#t3-mainnav'),
					btncollapsed = mainnav.find('.btn-navbar[data-toggle="collapse"]'),
					toggle = function(show){

						togglebtn
							.toggleClass('active', show)
							.find('i')
							.removeClass('icon-chevron-down icon-chevron-up')
							.addClass(show ? 'icon-chevron-up' : 'icon-chevron-down');

						show && pannel.addClass('reveal');

						if(Fixel.support.has2d){

							if(!show){
								$.support.transition ? mainnav.one($.support.transition.end, function(){
	                            	pannel.removeClass('reveal');
	                            }) : pannel.removeClass('reveal');
							} 

                            mainnav.css(Fixel.support.transform, show ? 'translateY(' + (pannel.outerHeight(true) + (mainnav.hasClass('light-mainnav') && !btncollapsed.is(':visible') ? mainnav.height() : 0)) + 'px)' : '');
                            
						} else {
							pannel.css('top', -pannel.outerHeight(true));
							mainnav.css('top', (show ? pannel.outerHeight(true) : 0));

							!show && pannel.removeClass('reveal');
						}
					},

					hide = function(){

						if(Fixel.ignoreScroll){
							return;
						}

						toggle(false);
						$(window).off('scroll.toppanel', hide);


					};

				Fixel.support.has2d && pannel.css('top', 0);
				
				togglebtn.on('click', function(){
					
					toggle(!$(this).hasClass('active'));

					if(!Fixel.hasTouch && $(this).hasClass('active')){
						$(window).on('scroll.toppanel', hide);
					}

					return false;
				});
			}
		})();


		(function(){
			if(Fixel.hasTouch){
				var socialink = $('#social-link-block');
				if(socialink.length){
					var binded = false,
						closesocial = function(){
							socialink.hide();
							socialink[0].offsetWidth;
							socialink.show();

							binded = false;
						};

					socialink.on('touchstart', function(e){
						if(binded){
							return;
						}

						$(window).one('scroll', closesocial);
						
						binded = true;
					});
				}
			}
		})();

        //Check div message show
        if(($("#system-message-container").html() || '').length > 1){
            if(($("#system-message").html() || '').length > 1){
                $("#system-message-container").show();
                $("#system-message a.close").click(function(){
                    $("#system-message-container").hide();
                });
            }else{
                $("#system-message-container").hide();
            }
        }else{
            $("#system-message-container").hide();
        }

        /*
        //Equal height
        setTimeout(function(){
            if($('#t3-mainbody .t3-sidebar').length > 0){
                var contentheight = $('#t3-mainbody #t3-content').css({height: '', 'min-height': ''}).height();
                var rightheight = $('#t3-mainbody .t3-sidebar').css({height: '', 'min-height': ''}).height();
                if(contentheight > rightheight) {
                    rightheight = contentheight;
                }
                $('#t3-mainbody .t3-content').css('min-height', rightheight);
                $('#t3-mainbody .t3-sidebar').css('min-height', rightheight);
            }
        },100);
		*/

		(function(){
			var elms = $('#t3-mainbody').find('.t3-content, .t3-sidebar'),
				rzid = null,
				login = $(document.documentElement).hasClass('view-login'),
				resize = function () {
					
					if(login){
						elms.css({'height': '', 'min-height': ''});

						elms.eq(0).toggleClass('no-padding', elms.eq(0).height() == elms.eq(1).height());
					}

					elms.equalHeight();
				};

			$(window).load(function(){
				//trigger one
				resize();

				clearTimeout(rzid);
				rzid = setTimeout(resize, 2000); //just in case something new loaded
			}).on('resize.eqb', function(){
				clearTimeout(rzid);
				rzid = setTimeout(resize, 200);
			});

			//trigger one
			resize();
		})();




		//extend theme magic
		(function(){
			if(typeof T3Theme != 'undefined'){
				var bodyReady = T3Theme.bodyReady;
				T3Theme.bodyReady = function(){
					bodyReady();

					$(window).trigger('resize');
				}
			}
		})();

 	});

})(jQuery);