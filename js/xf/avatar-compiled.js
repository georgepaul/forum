(function(){function d(c,d,a){c+d<a&&(c=a-d);return 0<c?0:c}function f(c){function f(a,b,c){this.img_height=this.img_width=this.height=this.width=null;this.img_top=this.img_left=0;this.minPercent=null;this.options=b;this.$image=a;this.$image.hide().prop("draggable",!1).addClass("cropImage").wrap('<div class="cropFrame" />');this.$frame=this.$image.parent();this.on_load=c||function(){};this.init()}f.prototype={init:function(){var a=this,b=c("<div/>",{"class":"cropControls"}).append(c("<span>"+this.options.label+
"</span>")).append(c("<button/>",{"class":"cropZoomIn",type:"button"}).on("click",c.proxy(this.zoomIn,this))).append(c("<button/>",{"class":"cropZoomOut",type:"button"}).on("click",c.proxy(this.zoomOut,this)));this.$frame.append(this.options.controls||b);this.updateOptions();if("function"===typeof c.fn.hammer||"undefined"!==typeof Hammer){var e,b="function"===typeof c.fn.hammer?this.$image.hammer().data("hammer"):Hammer(this.$image.get(0));b.get("pan").set({direction:Hammer.DIRECTION_ALL,threshold:0});
b.get("pinch").set({enable:!0});b.on("panleft panright panup pandown",function(b){e||(e={startX:a.img_left,startY:a.img_top});e.dx=b.deltaX;e.dy=b.deltaY;b.preventDefault();a.drag.call(a,e,!0)}).on("panend pancancel",function(b){b.preventDefault();e=null;a.update.call(a)}).on("doubletap",function(b){b.preventDefault();a.zoomIn.call(a)}).on("pinchin",function(b){b.preventDefault();a.zoomOut.call(a)}).on("pinchout",function(b){b.preventDefault();a.zoomIn.call(a)})}else this.$image.on("dragstart",function(){return!1}),
this.$image.on("mousedown.cropbox",function(b){var e={startX:a.img_left,startY:a.img_top};b.preventDefault();c(document).on("mousemove.cropbox",function(c){e.dx=c.pageX-b.pageX;e.dy=c.pageY-b.pageY;a.drag.call(a,e,!0)}).on("mouseup.cropbox",function(){a.update.call(a);c(document).off("mouseup.cropbox");c(document).off("mousemove.cropbox")})});if(c.fn.mousewheel)this.$image.on("mousewheel.cropbox",function(b){b.preventDefault();0>b.deltaY?a.zoomIn.call(a):a.zoomOut.call(a)})},updateOptions:function(){var a=
this;a.img_top=0;a.img_left=0;a.$image.css({width:"",left:a.img_left,top:a.img_top});a.$frame.width(a.options.width).height(a.options.height);a.$frame.off(".cropbox");a.$frame.removeClass("hover");"always"===a.options.showControls||"auto"===a.options.showControls&&("ontouchstart"in window||"onmsgesturechange"in window)?a.$frame.addClass("hover"):"never"!==a.options.showControls&&(a.$frame.on("mouseenter.cropbox",function(){a.$frame.addClass("hover")}),a.$frame.on("mouseleave.cropbox",function(){a.$frame.removeClass("hover")}));
var b=new Image;b.onload=function(){a.width=b.width;a.height=b.height;b.src="";b.onload=null;a.percent=void 0;a.fit.call(a);a.options.result?a.setCrop.call(a,a.options.result):a.zoom.call(a,a.minPercent);a.$image.fadeIn("fast");a.on_load.call(a)};b.src=a.$image.attr("src")},remove:function(){var a;"function"===typeof c.fn.hammer?a=this.$image.data("hammer"):"undefined"!==typeof Hammer&&(a=Hammer(this.$image.get(0)));a&&a.off("panleft panright panup pandown panend pancancel doubletap pinchin pinchout");
this.$frame.off(".cropbox");this.$image.off(".cropbox");this.$image.css({width:"",left:"",top:""});this.$image.removeClass("cropImage");this.$image.removeData("cropbox");this.$image.insertAfter(this.$frame);this.$frame.removeClass("cropFrame");this.$frame.removeAttr("style");this.$frame.empty();this.$frame.remove()},fit:function(){var a=this.options.width/this.width,b=this.options.height/this.height;this.minPercent=a>=b?a:b},setCrop:function(a){this.percent=Math.max(this.options.width/a.cropW,this.options.height/
a.cropH);this.img_width=Math.ceil(this.width*this.percent);this.img_height=Math.ceil(this.height*this.percent);this.img_left=-Math.floor(a.cropX*this.percent);this.img_top=-Math.floor(a.cropY*this.percent);this.$image.css({width:this.img_width,left:this.img_left,top:this.img_top});this.update()},zoom:function(a){var b=this.percent;this.percent=Math.max(this.minPercent,Math.min(this.options.maxZoom,a));this.img_width=Math.ceil(this.width*this.percent);this.img_height=Math.ceil(this.height*this.percent);
b?(a=this.percent/b,this.img_left=d((1-a)*this.options.width/2+a*this.img_left,this.img_width,this.options.width),this.img_top=d((1-a)*this.options.height/2+a*this.img_top,this.img_height,this.options.height)):(this.img_left=d((this.options.width-this.img_width)/2,this.img_width,this.options.width),this.img_top=d((this.options.height-this.img_height)/2,this.img_height,this.options.height));this.$image.css({width:this.img_width,left:this.img_left,top:this.img_top});this.update()},zoomIn:function(){this.zoom(this.percent+
(1-this.minPercent)/(this.options.zoom-1||1))},zoomOut:function(){this.zoom(this.percent-(1-this.minPercent)/(this.options.zoom-1||1))},drag:function(a,b){this.img_left=d(a.startX+a.dx,this.img_width,this.options.width);this.img_top=d(a.startY+a.dy,this.img_height,this.options.height);this.$image.css({left:this.img_left,top:this.img_top});b||this.update()},update:function(){this.result={cropX:-Math.ceil(this.img_left/this.percent),cropY:-Math.ceil(this.img_top/this.percent),cropW:Math.floor(this.options.width/
this.percent),cropH:Math.floor(this.options.height/this.percent),stretch:1<this.minPercent};this.$image.trigger("cropbox",[this.result,this])},getDataURL:function(){if(!g)return!1;var a=document.createElement("canvas"),b=a.getContext("2d");a.width=this.options.width;a.height=this.options.height;b.drawImage(this.$image.get(0),this.result.cropX,this.result.cropY,this.result.cropW,this.result.cropH,0,0,this.options.width,this.options.height);return a.toDataURL()},getBlob:function(){for(var a=this.getDataURL().split(","),
b=atob(a[1]),a=a[0].split(":")[1].split(";")[0],c=new ArrayBuffer(b.length),d=new Uint8Array(c),f=0;f<b.length;f++)d[f]=b.charCodeAt(f);return new Blob([c],{type:a})}};c.fn.cropbox=function(a,b){return this.each(function(){var e=c(this),d=e.data("cropbox");d?a&&(c.extend(d.options,a),d.updateOptions()):(d=c.extend({},c.fn.cropbox.defaultOptions,a),e.data("cropbox",new f(e,d,b)))})};c.fn.cropbox.defaultOptions={width:200,height:200,zoom:10,maxZoom:1,controls:null,showControls:"auto",label:"Drag to crop"}}
var g=document.createElement("canvas"),g=!(!g.getContext||!g.getContext("2d"));"function"===typeof require&&"object"===typeof exports&&"object"===typeof module?f(require("jquery")):"function"===typeof define&&define.amd?define(["jquery"],f):f(window.jQuery||window.Zepto)})();
/*
 * XenForo avatar.min.js
 * Copyright 2010-2018 XenForo Ltd.
 * Released under the XenForo License Agreement: https://xenforo.com/license-agreement
 */
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,e,c){a instanceof String&&(a=String(a));for(var f=a.length,d=0;d<f;d++){var b=a[d];if(e.call(c,b,d,a))return{i:d,v:b}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,e,c){a!=Array.prototype&&a!=Object.prototype&&(a[e]=c.value)};
$jscomp.getGlobal=function(a){return"undefined"!=typeof window&&window===a?a:"undefined"!=typeof global&&null!=global?global:a};$jscomp.global=$jscomp.getGlobal(this);$jscomp.polyfill=function(a,e,c,f){if(e){c=$jscomp.global;a=a.split(".");for(f=0;f<a.length-1;f++){var d=a[f];d in c||(c[d]={});c=c[d]}a=a[a.length-1];f=c[a];e=e(f);e!=f&&null!=e&&$jscomp.defineProperty(c,a,{configurable:!0,writable:!0,value:e})}};
$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(a,c){return $jscomp.findInternal(this,a,c).v}},"es6","es3");
!function(a,e,c,f){XF.AvatarUpload=XF.Element.newHandler({options:{},init:function(){var d=this.$target,b=d.find(".js-uploadAvatar"),c=d.find(".js-avatar"),e=d.find(".js-deleteAvatar");c.find("img").length?e.show():e.hide();b.on("change",a.proxy(this,"changeFile"));d.on("ajax-submit:response",a.proxy(this,"ajaxResponse"))},changeFile:function(d){""!=a(d.target).val()&&this.$target.submit()},ajaxResponse:function(d,b){if(!b.errors&&!b.exception){d.preventDefault();b.message&&XF.flashMessage(b.message,
3E3);var c=this.$target;d=c.find(".js-deleteAvatar");var e=c.find(".js-uploadAvatar"),f=c.find(".js-avatar"),g=c.find(".js-avatarX"),h=c.find(".js-avatarY");if(c=1==c.find('input[name="use_custom"]:checked').val())f.css({left:-1*b.cropX,top:-1*b.cropX}),g.val(b.cropX),h.val(b.cropY),f.data("x",b.cropX),f.data("y",b.cropY),XF.Element.initializeElement(f),e.val("");else if(a(".js-gravatarPreview").attr("src",b.gravatarTest?b.gravatarPreview:b.gravatarUrl),b.gravatarTest)return;XF.updateAvatars(b.userId,
b.avatars,c);b.defaultAvatars?d.hide():d.show();a(".js-avatarCropper").trigger("avatar:updated",b)}}});XF.AvatarCropper=XF.Element.newHandler({options:{size:96,x:0,y:0},$img:null,size:96,x:0,y:0,imgW:null,imgH:null,cropSize:null,scale:null,init:function(){this.$target.one("avatar:updated",a.proxy(this,"avatarsUpdated"));this.$img=this.$target.find("img");this.$img.length&&this.initTest()},avatarsUpdated:function(a,b){this.options.x=b.cropX;this.options.y=b.cropY;this.init()},initTest:function(){var a=
this.$img[0],b=0,c=this,e=function(){b++;50<b||(0<a.naturalWidth?c.setup():0===a.naturalWidth&&setTimeout(e,100))};e()},setup:function(){this.imgW=this.$img[0].naturalWidth;this.imgH=this.$img[0].naturalHeight;this.cropSize=Math.min(this.imgW,this.imgH);this.scale=this.cropSize/this.options.size;this.$img.cropbox({width:this.size,height:this.size,zoom:0,maxZoom:0,controls:!1,showControls:"never",result:{cropX:this.options.x*this.scale,cropY:this.options.y*this.scale,cropW:this.cropSize,cropH:this.cropSize}}).on("cropbox",
a.proxy(this,"onCrop"))},onCrop:function(a,b){this.$target.parent().find(".js-avatarX").val(b.cropX/this.scale);this.$target.parent().find(".js-avatarY").val(b.cropY/this.scale)}});XF.Element.register("avatar-upload","XF.AvatarUpload");XF.Element.register("avatar-cropper","XF.AvatarCropper")}(jQuery,window,document);