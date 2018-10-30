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


var Fixel = Fixel || {};

(function($){

	//init object
	Fixel.popup = {};

	$(document).ready(function(){
		// popup preview
		
		Fixel.popup.init = (function(){

			var iframeid = null,
				framedelay = 500,
				fdelay = 500,
				curitem = null,
				scroller = null,
				masonry = null,

				//keyboard limited event fired
				kbhdelay = 400,
				kbhid = null,

				aload = false,
				pload = false,
				aloader = $('#article-loader').removeClass('hide').detach(),
				ploader = $('#popup-loader').removeClass('hide').hide(),

				ableaction = true,

				moved = false,
				posx = null,
				posy = null,
				movethreshold = 3,

				backurl = null,

				keys = Fixel.keys,

				mousedown = function(e){
					posx = e.pageX;
					posy = e.pageY;
					moved = false;
				},

				mousemove = function(e){
					moved = Math.abs(posx - e.pageX) > movethreshold || Math.abs(posy - e.pageY) > movethreshold;
				},

				//function check iframe popup load to resize
				onload = function(){
					if(this.src == 'about:blank'){
						return;
					}
					
					//change state class
					$(document.body).addClass ('popupview-loaded');
					aload && aloader.modal('hide');
					pload && ploader.modal('hide');
					$('#popup-view').removeClass('popup-hide popup-loading');
					
					var ifdoc = $(this).contents().get(0);
					
					if (!ifdoc || (ifdoc.readyState && ifdoc.readyState != 'complete')){
					   return;
					}

					if (ifdoc.body && ifdoc.body.innerHTML == "false"){
						return;
					}

					$(ifdoc.body).addClass('popup-body');
					
					//set the height of iframe and initialize iscroll instance
					this.height = $(ifdoc).height();

					if($(this).data('iscroll')){
						try {
							$(this).data('iscroll').destroy();
						} catch (e) {

						}
					}

					var ifmscroller = new iScroll(this.parentNode, {vScrollbar: true, hScrollbar: false, scrollbarClass: 'popup-tracker', useTransform: Fixel.hasTouch, scroller: (Fixel.hasTouch ? ifdoc.body : null) });
					$(this).data('iscroll', ifmscroller).addClass('loaded');
					

					//replace links
					$(ifdoc.body).find('a').each(function(){
						if(!this.onclick && $(this).attr('target') != '_blank'){
							$(this).attr('target', '_parent');
						}
					});

					//compatible
					if($.browser.opera || $.browser.mozilla || ($.browser.msie && $.browser.version >= 9)){
						$(ifdoc).on('mousewheel.iscroll', function(e, which){
							ifmscroller._wheel(e, which);
						});
					} else if($.browser.msie && $.browser.version < 9){
						ifdoc.onmousewheel = function(e){
							if(ifmscroller){
								ifmscroller._wheel((e || this.window.event).wheelDelta/120);
							}
						};
					}

					var parent = $(this).closest('.popup-inner');

					//set current scroller instance
					if(parent.hasClass('current')){
						scroller = ifmscroller;
					}

					if(!parent.hasClass('showup') && aload){
						showup(parent);
					}
					
					//auto resize this iframe
					autoresize(curitem && this);
				},

				showup = function (pitem) {

					var parent = pitem.addClass('showup');

					clearTimeout(parent.data('shid'));

					//change state class
					$(document.body).addClass ('popupview-loaded');
					aload && aloader.modal('hide');
					pload && ploader.modal('hide');
					$('#popup-view').removeClass('popup-hide popup-loaded popup-loading');

					//animate this popup
					if(curitem && aload && parent.hasClass('current')){
						
						var citem = $(curitem),
							fromoffset = citem.offset(),
							toitem = $('#popup-content'),
							tooffset = toitem.offset(),
							complete = function(){
								$('#popup-view').removeClass('popup-hidectrl');
								$(parent).css(Fixel.support.transform, 'none');
							};

						if(Fixel.support.transform){

							var scalex = citem.width() / toitem.width(),
								scaley = citem.height() / toitem.height(),
								left = (fromoffset.left - tooffset.left),
								top = (fromoffset.top - tooffset.top);

							left -= (toitem.width() - citem.width()) / 2;
							top -= (toitem.height() - citem.height()) / 2;

							$(parent)
								.removeClass('animate')
								.css({
									top: '',
									opacity: 0
								})
								.css(Fixel.support.transform, 'translate(' + left + 'px, ' + top + 'px)' + Fixel.support.translateZ + ' scaleX(' + scalex + ') scaleY(' + scaley + ')');

							setTimeout(function(){
								$(parent)
									.addClass('animate')
									.css('opacity', 1)
									.css(Fixel.support.transform, 'translate(0px, 0px)' + Fixel.support.translateZ + ' scaleX(1) scaleY(1)');

								if($.support.transition){
									
									$(parent).one($.support.transition.end, complete);

								} else {
									setTimeout(complete, 600);
								}
								
							}, 0);
							
						} else {
							$(parent).removeClass('animate').css({
								width: citem.width(),
								height: citem.height(),
								top: fromoffset.top - tooffset.top,
								left: fromoffset.left - tooffset.left,
								opacity: 0.2
							}).animate({
								width: toitem.width(),
								height: toitem.height(),
								top: 0,
								left: 0,
								opacity: 1
							}, {
								duration: 600,
								complete: function(){
									
									$(parent).css({
										width: '',
										height: '',
										top: '',
										left: ''
									});

									$('#popup-view').removeClass('popup-hidectrl');
								}
							});
						}

					} else if(pload) {

					} else {
						
						parent.css('top', 0);
					}

					aload = false;
					pload = false;
				},

				//when first open the popup
				startpopup = function(e) {

					if(e.isTrigger){
						moved = false;
					}

					if(moved || (e.which && e.which != 1)){
						return false;
					}

					//not support popup in small screen size
					if($(this).hasClass('category-item') || $(window).width() < 768){
						return true;
					}

					// check if window is smaller than popup width - 768px or if we already open a popup
					if($(document.body).hasClass ('popupopening') || $(document.body).hasClass ('popupview')){
						return false;
					}

					if(e && !$(e.target).hasClass('items')){

						if($(e.target).parentsUntil('.items').addBack().filter(function(){

							var events = $._data && $._data(this, 'events') || $(this).data('events');

							if(events && events.click){
								return true;
							}

							if(this.className.match(/article-link|readmore-link|video-link/)){
								return false;
							}

							if(this.tagName.toUpperCase() == 'A'){
								return true;
							}

							return false;

						}).length){
							return true;
						}
					}

					//does not contains link?
					if($(this).closest('.items').find('.article-link, .readmore-link, .video-link').length == 0){
						return false;
					}

					//store the current link
					backurl = Fixel.cleanurl(window.location.href);

					$(document.body).addClass('popupopening');

					//wait for the slide effect complete effect
					//should we check for current index?
					var item = $(this).closest('.items').addClass('poping').get(0);

					setTimeout(function (argument) {

						//attach keyboard event
						$(document.documentElement).on('keydown.fixelpopup', keyhandle);

						// add popup class to body
						$(document.body).addClass ('popupview');
						$('#popup-view').addClass('popup-hide popup-hidectrl');
	
						aload = true;
						aloader.appendTo($(item).find('article:first')).modal('show');

						//set the open to current active
						var popupitem = openpopup(item).addClass('current');
						popupitem.data('shid', setTimeout(function(){
							showup(popupitem);
						}, 2000 + (Fixel.hasTouch ? 1000 : 0)));

						scroller = popupitem.find('iframe').data('iscroll');

					}, 700 + (Fixel.hasTouch ? 1000 : 0));
					
					return false;
				},

				openpopup = function(item) {
					
					//merge url params
					var url = ($(item).find('.article-link, .readmore-link, .video-link').eq(0).attr('href') || ''),
						urlparts = url.split('#');

					//update address
					if(history.pushState && $.address){
						$.address.value(Fixel.cleanurl(url));
					}

					urlparts[0] += (urlparts[0].indexOf('?') == -1 ? '?' : '&') + 'tmpl=component&fixelpopup=1';
					url = urlparts.join('#');
					
					//build the popup item
					var popupitem = $('' +
						'<div class="popup-inner"' + (aload ? ' style="top: -90000px"' : '') + '>' +
							'<div class="popup-inner-content"></div>' +
						'</div>').appendTo('#popup-content');
	
						popupitem
							.find('.popup-inner-content')
							.html ($('<iframe class="popup-iframe" src="' + url + '" scrolling="no" frameborder="0" />')
							.on('load', onload));

					//add state class
					$('#popup-view').removeClass('popup-loaded').addClass('popup-loading');

					curitem = item;
					$(item).addClass('poping'); //re-add

					return popupitem;
				},

				opennext = function(){
					
					//check for timeout
					if(!ableaction){
						return false;
					}

					if(curitem){

						var citem = $(curitem).removeClass('poping');
						if(citem.length){

							var popupcontent = $('#popup-content'),
								current = popupcontent.find('.current'),
								prev = popupcontent.find('.prev'),
								next = popupcontent.find('.next');

							//check for next item
							if(!next.length){

								var nextitem = findpopupitem(citem);

								if(nextitem && nextitem.length){
									
									next = openpopup(nextitem).addClass('next');

									pload = true;
									ploader.modal('show');
								}
							} else {
								curitem = findpopupitem(citem).addClass('poping');

								//update address
								var url = ($(curitem).find('.article-link, .readmore-link, .video-link').eq(0).attr('href') || '');
								if(history.pushState && $.address && url){
									$.address.value(Fixel.cleanurl(url));
								}
							}

							if(next.length){

								Fixel.scrollToElm(curitem);

								setTimeout(function(){
									current.css(Fixel.support.transform, '').removeClass('current').addClass('animate prev');
									next.addClass('animate current').removeClass('next');
								
									autoresize(true);

									//change scoller instance
									scroller = next.find('iframe').data('iscroll');
									scroller && scroller.refresh();

									fdelay = framedelay;

									ableaction = false;
									if($.support.transition){
										$(next).one($.support.transition.end, cleanup);
									} else {
										setTimeout(cleanup, 600);
									}

								}, 0);
							}
						}
					}

					return false;
				},

				openprev = function(){

					//check for timeout
					if(!ableaction){
						return false;
					}

					if(curitem){

						var citem = $(curitem).removeClass('poping');
						if(citem.length){

							var popupcontent = $('#popup-content'),
								current = popupcontent.find('.current'),
								prev = popupcontent.find('.prev'),
								next = popupcontent.find('.next');

							//check for next item
							if(!prev.length){

								var nextitem = findpopupitem(citem, 'prev');

								if(nextitem && nextitem.length){
									prev = openpopup(nextitem).addClass('prev');

									pload = true;
									ploader.modal('show');
								}
							} else {
								curitem = findpopupitem(citem, 'prev').addClass('poping');

								//update address
								var url = ($(curitem).find('.article-link, .readmore-link, .video-link').eq(0).attr('href') || '');
								if(history.pushState && $.address && url){
									$.address.value(Fixel.cleanurl(url));
								}
							}

							if(prev.length){

								Fixel.scrollToElm(curitem);

								setTimeout(function(){
									current.css(Fixel.support.transform, '').removeClass('current').addClass('animate next');
									prev.addClass('animate current').removeClass('prev');

									autoresize(true);
									scroller = prev.find('iframe').data('iscroll');
									scroller && scroller.refresh();

									fdelay = framedelay;

									ableaction = false;
									if($.support.transition){
										$(prev).one($.support.transition.end, cleanup);
									} else {
										setTimeout(cleanup, 600);
									}

								}, 0);
							}
						}
					}

					return false;
				},
				
				onresize = function(){
					var jiframe = $('#popup-content').find('.current iframe.loaded');
					
					if(jiframe.length){
						var ifmdoc = jiframe.contents();

						if(ifmdoc.length){

							if(scroller){
								var ifbody = ifmdoc.find('body'),
									padding = ifbody.outerHeight(true) - ifbody.height(),
									height = parseFloat(jiframe.attr('height')),
									nheight = ifmdoc.height();

								//extend the time span
								fdelay = fdelay * 2;

								if(!(jiframe.data('fixed') && height + padding <= nheight) || (height + padding < nheight) || (height - padding > nheight)){
									if(!((height + padding < nheight) || (height - padding > nheight))){
										jiframe.data('fixed', 1);
									}

									var scroll = scroller.y,
										nheight = 0;

									//try
									scroll && scroller.scrollTo(0, 0);
									nheight = ifmdoc.height();

									//restore
									if(nheight != height){
										jiframe.attr('height', nheight);
										scroller.refresh();
									}

									scroll && scroller.scrollTo(0, Math.max(scroll, -nheight + ($('#popup-content').height() || 0)));
									
									fdelay = framedelay;
								}
							}

							iframeid = setTimeout(onresize, fdelay);
						}
					}
				},

				autoresize = function(iframe){
					clearTimeout(iframeid);
					
					if(iframe){
						fdelay = framedelay;
						iframeid = setTimeout(onresize, fdelay);
					}
				},

				closepopup = function(e){

					//no propagate event
					if(e){
						e.stopPropagation();
						e.preventDefault();
					}

					//check for timeout
					if(!ableaction){
						return false;
					}

					//remove timeout
					clearTimeout(iframeid);

					//remove keyboard event
					$(document.documentElement).off('keydown.fixelpopup');

					//already close ?
					if(!curitem){
						return false;
					}

					if(scroller){
						scroller.destroy();
						scroller = null;
					}

					//hide popup control first
					$('#popup-view').addClass('popup-hidectrl');

					var 
						toitem = $('#popup-content'),
						citem = $(curitem).removeClass('poping'),
						parent = toitem.find('.current'),

						fromoffset = citem.offset(),
						tooffset = toitem.offset();

					if(parent.length){

						if(Fixel.support.transform){

							var scalex = citem.width() / toitem.width(),
								scaley = citem.height() / toitem.height(),
								left = (fromoffset.left - tooffset.left),
								top = (fromoffset.top - tooffset.top);

							left -= (toitem.width() - citem.width()) / 2;
							top -= (toitem.height() - citem.height()) / 2;

							$(parent)
								.removeClass('animate')
								.css('opacity', 1)
								.css(Fixel.support.transform, 'translate(0px, 0px)' + Fixel.support.translateZ + ' scaleX(1) scaleY(1)');

							setTimeout(function(){
								$(parent)
									.addClass('animate')
									.css('opacity', 0)
									.css(Fixel.support.transform, 'translate(' + left + 'px, ' + top + 'px)' + Fixel.support.translateZ + ' scaleX(' + scalex + ') scaleY(' + scaley + ')');
							}, 0);

							if($.support.transition){
								
								$(parent).one($.support.transition.end, collectgarbage);

							} else {
								setTimeout(collectgarbage, 600);
							}

						} else {

							$(parent).css({
								width: toitem.width(),
								height: toitem.height(),
								top: 0,
								left: 0,
								opacity: 1
							}).animate({
								width: citem.width(),
								height: citem.height(),
								top: fromoffset.top - tooffset.top,
								left: fromoffset.left - tooffset.left,
								opacity: 0.2
							}, {
								duration: 600,
								complete: collectgarbage
							});
						}

					} else {
						collectgarbage();
					}

					if(history.pushState && $.address && backurl && Fixel.cleanurl(window.location.href) != backurl){
						$.address.value(backurl);
					}

					curitem = null;

					return false;
				},

				collectgarbage = function(){
					//current iframe
					var jiframe = $('#popup-content').find('iframe');
					
					if(jiframe.length){
						//fix swf object error
						jiframe.contents().find('object, embed').remove();
					}
					
					//remove class loading
					$('#popup-view').removeClass('popup-loaded popup-loading');
					
					//fix iframe IE9
					jiframe
						.off()
						.attr('src', 'about:blank')
						.css('visibility', 'hidden');

					setTimeout(function(){
						$('.popup-inner').remove();
						$(document.body).removeClass('popupview popupview-loaded popupopening');
					}, 10);
				},

				cleanup = function() {
					$('#popup-content').find('.current').css(Fixel.support.transform, 'none');
					$('#popup-content').find('.prev, .next').find('iframe')
						.each(function(argument) {
							//iframe
							$(this).contents().find('object, embed').remove();

							var scroller = $(this).data('iscroll');
							if(scroller){
								scroller.destroy();
							}

							$(this)
								.off()
								.attr('src', 'about:blank')
								.css('visibility', 'hidden');
						});

					setTimeout(function(){
						$('#popup-content').find('.prev, .next').remove();
						ableaction = true;
					}, 100);
				},

				keyhandle = function(e){
					if($(document.body).hasClass('popupview')){
						
						if(e.keyCode == keys.ESCAPE){
							
							closepopup(e);

						} else if (scroller && e.keyCode == keys.UP){
							
							scroller._wheel(1);

						} else if (scroller && e.keyCode == keys.DOWN) {
							
							scroller._wheel(-1);

						} else if (e.keyCode == keys.LEFT || e.keyCode == keys.RIGHT){
							
							if(!kbhid){
									
								kbhid = setTimeout(function(){
									kbhid = 0;
								}, kbhdelay);
								
								e.keyCode == 37 ? openprev() : opennext();

							}
						} else if(scroller && e.keyCode == keys.HOME) {
							scroller.scrollTo(0, 0, 500);
						}
					}
				},

				findpopupitem = function(item, dir){
					var func = dir || 'next',
						item = $(item);

					while(item && item.length){
						item = item[func]('.items');

						if(item.find('.article-link, .readmore-link, .video-link').length){
							break;
						}
					}

					return item;
				};


			$(document)
				.on('mousedown', mousedown)
				.on('mousemove', mousemove);

			//extend popup
			$.extend(Fixel.popup, {
				keyhandle: keyhandle,
				startpopup: startpopup
			});

			//bind a live event
			return function(){
				if (!$(document.documentElement).hasClass ('no-preview')) {

					masonry = $('#fixel-grid');
					
					//click on overlay => close
					$('#popup-view, #popup-close').off('click.fixelpopup').on('click.fixelpopup', closepopup);

					//popup nav
					$('#popup-prev').off('click.fixelpopup').on('click.fixelpopup', openprev);
					$('#popup-next').off('click.fixelpopup').on('click.fixelpopup', opennext);
					
					//click on popup content => stop the propagate event
					$('#popup-content').off('click.fixelpopup').on('click.fixelpopup', function (e) {
						e.stopPropagation();
					});

					masonry.off('click.fixelpopup').on('click.fixelpopup', '.items', startpopup);
				}
			}
		
		})();

		//init
		Fixel.popup.init();

		//enable popup
		(function(){

			//check for iframe
			try {
				if(window.parent != window && window.parent.Fixel && window.parent.Fixel.popup){
					$(document.documentElement).on('keydown.iscroll', function(e){
						window.parent.Fixel.popup.keyhandle(e);
					});
				}
			} catch(e){
			}

			try {
				if(/tmpl=component/gi.test(window.location.href) && window.parent.Fixel){
					//support K2 back to top
					$('.itemBackToTop .k2Anchor').click(function(e) {
						
						if(window.parent.Fixel.popup && window.parent.Fixel.popup.keyhandle){
							window.parent.Fixel.popup.keyhandle({keyCode: Fixel.keys.HOME});
							e.preventDefault();
						}
					});
				}
			} catch(e){
			}

		})();

	});

})(jQuery);