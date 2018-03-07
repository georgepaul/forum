/*! @flowjs/flow.js 2.10.1 */
!function(a,b,c){"use strict";function d(b){if(this.support=!("undefined"==typeof File||"undefined"==typeof Blob||"undefined"==typeof FileList||!Blob.prototype.slice&&!Blob.prototype.webkitSlice&&!Blob.prototype.mozSlice),this.support){this.supportDirectory=/Chrome/.test(a.navigator.userAgent),this.files=[],this.defaults={chunkSize:1048576,forceChunkSize:!1,simultaneousUploads:3,singleFile:!1,fileParameterName:"file",progressCallbacksInterval:500,speedSmoothingFactor:.1,query:{},headers:{},withCredentials:!1,preprocess:null,method:"multipart",testMethod:"GET",uploadMethod:"POST",prioritizeFirstAndLastChunk:!1,allowDuplicateUploads:!1,target:"/",testChunks:!0,generateUniqueIdentifier:null,maxChunkRetries:0,chunkRetryInterval:null,permanentErrors:[404,415,500,501],successStatuses:[200,201,202],onDropStopPropagation:!1,initFileFn:null,readFileFn:f},this.opts={},this.events={};var c=this;this.onDrop=function(a){c.opts.onDropStopPropagation&&a.stopPropagation(),a.preventDefault();var b=a.dataTransfer;b.items&&b.items[0]&&b.items[0].webkitGetAsEntry?c.webkitReadDataTransfer(a):c.addFiles(b.files,a)},this.preventEvent=function(a){a.preventDefault()},this.opts=d.extend({},this.defaults,b||{})}}function e(a,b){this.flowObj=a,this.bytes=null,this.file=b,this.name=b.fileName||b.name,this.size=b.size,this.relativePath=b.relativePath||b.webkitRelativePath||this.name,this.uniqueIdentifier=a.generateUniqueIdentifier(b),this.chunks=[],this.paused=!1,this.error=!1,this.averageSpeed=0,this.currentSpeed=0,this._lastProgressCallback=Date.now(),this._prevUploadedSize=0,this._prevProgress=0,this.bootstrap()}function f(a,b,c,d,e){var f="slice";a.file.slice?f="slice":a.file.mozSlice?f="mozSlice":a.file.webkitSlice&&(f="webkitSlice"),e.readFinished(a.file[f](b,c,d))}function g(a,b,c){this.flowObj=a,this.fileObj=b,this.offset=c,this.tested=!1,this.retries=0,this.pendingRetry=!1,this.preprocessState=0,this.readState=0,this.loaded=0,this.total=0,this.chunkSize=this.flowObj.opts.chunkSize,this.startByte=this.offset*this.chunkSize,this.computeEndByte=function(){var a=Math.min(this.fileObj.size,(this.offset+1)*this.chunkSize);return this.fileObj.size-a<this.chunkSize&&!this.flowObj.opts.forceChunkSize&&(a=this.fileObj.size),a},this.endByte=this.computeEndByte(),this.xhr=null;var d=this;this.event=function(a,b){b=Array.prototype.slice.call(arguments),b.unshift(d),d.fileObj.chunkEvent.apply(d.fileObj,b)},this.progressHandler=function(a){a.lengthComputable&&(d.loaded=a.loaded,d.total=a.total),d.event("progress",a)},this.testHandler=function(a){var b=d.status(!0);"error"===b?(d.event(b,d.message()),d.flowObj.uploadNextChunk()):"success"===b?(d.tested=!0,d.event(b,d.message()),d.flowObj.uploadNextChunk()):d.fileObj.paused||(d.tested=!0,d.send())},this.doneHandler=function(a){var b=d.status();if("success"===b||"error"===b)delete this.data,d.event(b,d.message()),d.flowObj.uploadNextChunk();else{d.event("retry",d.message()),d.pendingRetry=!0,d.abort(),d.retries++;var c=d.flowObj.opts.chunkRetryInterval;null!==c?setTimeout(function(){d.send()},c):d.send()}}}function h(a,b){var c=a.indexOf(b);c>-1&&a.splice(c,1)}function i(a,b){return"function"==typeof a&&(b=Array.prototype.slice.call(arguments),a=a.apply(null,b.slice(1))),a}function j(a,b){setTimeout(a.bind(b),0)}function k(a,b){return l(arguments,function(b){b!==a&&l(b,function(b,c){a[c]=b})}),a}function l(a,b,c){if(a){var d;if("undefined"!=typeof a.length){for(d=0;d<a.length;d++)if(b.call(c,a[d],d)===!1)return}else for(d in a)if(a.hasOwnProperty(d)&&b.call(c,a[d],d)===!1)return}}var m=a.navigator.msPointerEnabled;d.prototype={on:function(a,b){a=a.toLowerCase(),this.events.hasOwnProperty(a)||(this.events[a]=[]),this.events[a].push(b)},off:function(a,b){a!==c?(a=a.toLowerCase(),b!==c?this.events.hasOwnProperty(a)&&h(this.events[a],b):delete this.events[a]):this.events={}},fire:function(a,b){b=Array.prototype.slice.call(arguments),a=a.toLowerCase();var c=!1;return this.events.hasOwnProperty(a)&&l(this.events[a],function(a){c=a.apply(this,b.slice(1))===!1||c},this),"catchall"!=a&&(b.unshift("catchAll"),c=this.fire.apply(this,b)===!1||c),!c},webkitReadDataTransfer:function(a){function b(a){a.readEntries(function(f){f.length?(g+=f.length,l(f,function(a){if(a.isFile){var e=a.fullPath;a.file(function(a){c(a,e)},d)}else a.isDirectory&&b(a.createReader())}),b(a)):e()},d)}function c(a,b){a.relativePath=b.substring(1),h.push(a),e()}function d(a){throw a}function e(){0==--g&&f.addFiles(h,a)}var f=this,g=a.dataTransfer.items.length,h=[];l(a.dataTransfer.items,function(a){var d=a.webkitGetAsEntry();return d?void(d.isFile?c(a.getAsFile(),d.fullPath):b(d.createReader())):void e()})},generateUniqueIdentifier:function(a){var b=this.opts.generateUniqueIdentifier;if("function"==typeof b)return b(a);var c=a.relativePath||a.webkitRelativePath||a.fileName||a.name;return a.size+"-"+c.replace(/[^0-9a-zA-Z_-]/gim,"")},uploadNextChunk:function(a){var b=!1;if(this.opts.prioritizeFirstAndLastChunk&&(l(this.files,function(a){return!a.paused&&a.chunks.length&&"pending"===a.chunks[0].status()?(a.chunks[0].send(),b=!0,!1):!a.paused&&a.chunks.length>1&&"pending"===a.chunks[a.chunks.length-1].status()?(a.chunks[a.chunks.length-1].send(),b=!0,!1):void 0}),b))return b;if(l(this.files,function(a){return a.paused||l(a.chunks,function(a){return"pending"===a.status()?(a.send(),b=!0,!1):void 0}),b?!1:void 0}),b)return!0;var c=!1;return l(this.files,function(a){return a.isComplete()?void 0:(c=!0,!1)}),c||a||j(function(){this.fire("complete")},this),!1},assignBrowse:function(a,c,d,e){"undefined"==typeof a.length&&(a=[a]),l(a,function(a){var f;"INPUT"===a.tagName&&"file"===a.type?f=a:(f=b.createElement("input"),f.setAttribute("type","file"),k(f.style,{visibility:"hidden",position:"absolute",width:"1px",height:"1px"}),a.appendChild(f),a.addEventListener("click",function(){f.click()},!1)),this.opts.singleFile||d||f.setAttribute("multiple","multiple"),c&&f.setAttribute("webkitdirectory","webkitdirectory"),l(e,function(a,b){f.setAttribute(b,a)});var g=this;f.addEventListener("change",function(a){a.target.value&&(g.addFiles(a.target.files,a),a.target.value="")},!1)},this)},assignDrop:function(a){"undefined"==typeof a.length&&(a=[a]),l(a,function(a){a.addEventListener("dragover",this.preventEvent,!1),a.addEventListener("dragenter",this.preventEvent,!1),a.addEventListener("drop",this.onDrop,!1)},this)},unAssignDrop:function(a){"undefined"==typeof a.length&&(a=[a]),l(a,function(a){a.removeEventListener("dragover",this.preventEvent),a.removeEventListener("dragenter",this.preventEvent),a.removeEventListener("drop",this.onDrop)},this)},isUploading:function(){var a=!1;return l(this.files,function(b){return b.isUploading()?(a=!0,!1):void 0}),a},_shouldUploadNext:function(){var a=0,b=!0,c=this.opts.simultaneousUploads;return l(this.files,function(d){l(d.chunks,function(d){return"uploading"===d.status()&&(a++,a>=c)?(b=!1,!1):void 0})}),b&&a},upload:function(){var a=this._shouldUploadNext();if(a!==!1){this.fire("uploadStart");for(var b=!1,c=1;c<=this.opts.simultaneousUploads-a;c++)b=this.uploadNextChunk(!0)||b;b||j(function(){this.fire("complete")},this)}},resume:function(){l(this.files,function(a){a.resume()})},pause:function(){l(this.files,function(a){a.pause()})},cancel:function(){for(var a=this.files.length-1;a>=0;a--)this.files[a].cancel()},progress:function(){var a=0,b=0;return l(this.files,function(c){a+=c.progress()*c.size,b+=c.size}),b>0?a/b:0},addFile:function(a,b){this.addFiles([a],b)},addFiles:function(a,b){var c=[];l(a,function(a){if((!m||m&&a.size>0)&&(a.size%4096!==0||"."!==a.name&&"."!==a.fileName)&&(this.opts.allowDuplicateUploads||!this.getFromUniqueIdentifier(this.generateUniqueIdentifier(a)))){var d=new e(this,a);this.fire("fileAdded",d,b)&&c.push(d)}},this),this.fire("filesAdded",c,b)&&l(c,function(a){this.opts.singleFile&&this.files.length>0&&this.removeFile(this.files[0]),this.files.push(a)},this),this.fire("filesSubmitted",c,b)},removeFile:function(a){for(var b=this.files.length-1;b>=0;b--)this.files[b]===a&&(this.files.splice(b,1),a.abort())},getFromUniqueIdentifier:function(a){var b=!1;return l(this.files,function(c){c.uniqueIdentifier===a&&(b=c)}),b},getSize:function(){var a=0;return l(this.files,function(b){a+=b.size}),a},sizeUploaded:function(){var a=0;return l(this.files,function(b){a+=b.sizeUploaded()}),a},timeRemaining:function(){var a=0,b=0;return l(this.files,function(c){c.paused||c.error||(a+=c.size-c.sizeUploaded(),b+=c.averageSpeed)}),a&&!b?Number.POSITIVE_INFINITY:a||b?Math.floor(a/b):0}},e.prototype={measureSpeed:function(){var a=Date.now()-this._lastProgressCallback;if(a){var b=this.flowObj.opts.speedSmoothingFactor,c=this.sizeUploaded();this.currentSpeed=Math.max((c-this._prevUploadedSize)/a*1e3,0),this.averageSpeed=b*this.currentSpeed+(1-b)*this.averageSpeed,this._prevUploadedSize=c}},chunkEvent:function(a,b,c){switch(b){case"progress":if(Date.now()-this._lastProgressCallback<this.flowObj.opts.progressCallbacksInterval)break;this.measureSpeed(),this.flowObj.fire("fileProgress",this,a),this.flowObj.fire("progress"),this._lastProgressCallback=Date.now();break;case"error":this.error=!0,this.abort(!0),this.flowObj.fire("fileError",this,c,a),this.flowObj.fire("error",c,this,a);break;case"success":if(this.error)return;this.measureSpeed(),this.flowObj.fire("fileProgress",this,a),this.flowObj.fire("progress"),this._lastProgressCallback=Date.now(),this.isComplete()&&(this.currentSpeed=0,this.averageSpeed=0,this.flowObj.fire("fileSuccess",this,c,a));break;case"retry":this.flowObj.fire("fileRetry",this,a)}},pause:function(){this.paused=!0,this.abort()},resume:function(){this.paused=!1,this.flowObj.upload()},abort:function(a){this.currentSpeed=0,this.averageSpeed=0;var b=this.chunks;a&&(this.chunks=[]),l(b,function(a){"uploading"===a.status()&&(a.abort(),this.flowObj.uploadNextChunk())},this)},cancel:function(){this.flowObj.removeFile(this)},retry:function(){this.bootstrap(),this.flowObj.upload()},bootstrap:function(){"function"==typeof this.flowObj.opts.initFileFn&&this.flowObj.opts.initFileFn(this),this.abort(!0),this.error=!1,this._prevProgress=0;for(var a=this.flowObj.opts.forceChunkSize?Math.ceil:Math.floor,b=Math.max(a(this.size/this.flowObj.opts.chunkSize),1),c=0;b>c;c++)this.chunks.push(new g(this.flowObj,this,c))},progress:function(){if(this.error)return 1;if(1===this.chunks.length)return this._prevProgress=Math.max(this._prevProgress,this.chunks[0].progress()),this._prevProgress;var a=0;l(this.chunks,function(b){a+=b.progress()*(b.endByte-b.startByte)});var b=a/this.size;return this._prevProgress=Math.max(this._prevProgress,b>.9999?1:b),this._prevProgress},isUploading:function(){var a=!1;return l(this.chunks,function(b){return"uploading"===b.status()?(a=!0,!1):void 0}),a},isComplete:function(){var a=!1;return l(this.chunks,function(b){var c=b.status();return"pending"===c||"uploading"===c||"reading"===c||1===b.preprocessState||1===b.readState?(a=!0,!1):void 0}),!a},sizeUploaded:function(){var a=0;return l(this.chunks,function(b){a+=b.sizeUploaded()}),a},timeRemaining:function(){if(this.paused||this.error)return 0;var a=this.size-this.sizeUploaded();return a&&!this.averageSpeed?Number.POSITIVE_INFINITY:a||this.averageSpeed?Math.floor(a/this.averageSpeed):0},getType:function(){return this.file.type&&this.file.type.split("/")[1]},getExtension:function(){return this.name.substr((~-this.name.lastIndexOf(".")>>>0)+2).toLowerCase()}},g.prototype={getParams:function(){return{flowChunkNumber:this.offset+1,flowChunkSize:this.flowObj.opts.chunkSize,flowCurrentChunkSize:this.endByte-this.startByte,flowTotalSize:this.fileObj.size,flowIdentifier:this.fileObj.uniqueIdentifier,flowFilename:this.fileObj.name,flowRelativePath:this.fileObj.relativePath,flowTotalChunks:this.fileObj.chunks.length}},getTarget:function(a,b){return a+=a.indexOf("?")<0?"?":"&",a+b.join("&")},test:function(){this.xhr=new XMLHttpRequest,this.xhr.addEventListener("load",this.testHandler,!1),this.xhr.addEventListener("error",this.testHandler,!1);var a=i(this.flowObj.opts.testMethod,this.fileObj,this),b=this.prepareXhrRequest(a,!0);this.xhr.send(b)},preprocessFinished:function(){this.endByte=this.computeEndByte(),this.preprocessState=2,this.send()},readFinished:function(a){this.readState=2,this.bytes=a,this.send()},send:function(){var a=this.flowObj.opts.preprocess,b=this.flowObj.opts.readFileFn;if("function"==typeof a)switch(this.preprocessState){case 0:return this.preprocessState=1,void a(this);case 1:return}switch(this.readState){case 0:return this.readState=1,void b(this.fileObj,this.startByte,this.endByte,this.fileType,this);case 1:return}if(this.flowObj.opts.testChunks&&!this.tested)return void this.test();this.loaded=0,this.total=0,this.pendingRetry=!1,this.xhr=new XMLHttpRequest,this.xhr.upload.addEventListener("progress",this.progressHandler,!1),this.xhr.addEventListener("load",this.doneHandler,!1),this.xhr.addEventListener("error",this.doneHandler,!1);var c=i(this.flowObj.opts.uploadMethod,this.fileObj,this),d=this.prepareXhrRequest(c,!1,this.flowObj.opts.method,this.bytes);this.xhr.send(d)},abort:function(){var a=this.xhr;this.xhr=null,a&&a.abort()},status:function(a){return 1===this.readState?"reading":this.pendingRetry||1===this.preprocessState?"uploading":this.xhr?this.xhr.readyState<4?"uploading":this.flowObj.opts.successStatuses.indexOf(this.xhr.status)>-1?"success":this.flowObj.opts.permanentErrors.indexOf(this.xhr.status)>-1||!a&&this.retries>=this.flowObj.opts.maxChunkRetries?"error":(this.abort(),"pending"):"pending"},message:function(){return this.xhr?this.xhr.responseText:""},progress:function(){if(this.pendingRetry)return 0;var a=this.status();return"success"===a||"error"===a?1:"pending"===a?0:this.total>0?this.loaded/this.total:0},sizeUploaded:function(){var a=this.endByte-this.startByte;return"success"!==this.status()&&(a=this.progress()*a),a},prepareXhrRequest:function(a,b,c,d){var e=i(this.flowObj.opts.query,this.fileObj,this,b);e=k(e,this.getParams());var f=i(this.flowObj.opts.target,this.fileObj,this,b),g=null;if("GET"===a||"octet"===c){var h=[];l(e,function(a,b){h.push([encodeURIComponent(b),encodeURIComponent(a)].join("="))}),f=this.getTarget(f,h),g=d||null}else g=new FormData,l(e,function(a,b){g.append(b,a)}),g.append(this.flowObj.opts.fileParameterName,d,this.fileObj.file.name);return this.xhr.open(a,f,!0),this.xhr.withCredentials=this.flowObj.opts.withCredentials,l(i(this.flowObj.opts.headers,this.fileObj,this,b),function(a,b){this.xhr.setRequestHeader(b,a)},this),g}},d.evalOpts=i,d.extend=k,d.each=l,d.FlowFile=e,d.FlowChunk=g,d.version="2.10.1","object"==typeof module&&module&&"object"==typeof module.exports?module.exports=d:(a.Flow=d,"function"==typeof define&&define.amd&&define("flow",[],function(){return d}))}(window,document);

(function(e,m,f,n){function h(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent?a.attachEvent("on"+b,c):a["on"+b]=c}function g(a){this.support=!1;this.files=[];this.events=[];this.defaults={simultaneousUploads:3,fileParameterName:"file",query:{},target:"/",generateUniqueIdentifier:null,matchJSON:!1};var b=this;this.inputChangeEvent=function(c){var a=c.target||c.srcElement,d=b.inputChangeEvent;a.removeEventListener?a.removeEventListener("change",d,!1):a.detachEvent?a.detachEvent("onchange",
d):a.onchange=null;d=a.cloneNode(!1);a.parentNode.replaceChild(d,a);b.addFile(a,c);d.value="";h(d,"change",b.inputChangeEvent)};this.opts=e.extend({},this.defaults,a||{})}function k(a,b){this.flowObj=a;this.element=b;this.relativePath=this.name=b.value&&b.value.replace(/.*(\/|\\)/,"");this.uniqueIdentifier=a.generateUniqueIdentifier(b);this.iFrame=null;this.paused=this.error=this.finished=!1;var c=this;this.iFrameLoaded=function(a){if(c.iFrame&&c.iFrame.parentNode){c.finished=!0;try{if(c.iFrame.contentDocument&&
c.iFrame.contentDocument.body&&"false"==c.iFrame.contentDocument.body.innerHTML)return}catch(b){c.error=!0;c.abort();c.flowObj.fire("fileError",c,b);return}a=(c.iFrame.contentDocument||c.iFrame.contentWindow.document).body.innerHTML;c.flowObj.opts.matchJSON&&(a=/(\{.*\})/.exec(a)[0]);c.abort();c.flowObj.fire("fileSuccess",c,a);c.flowObj.upload()}};this.bootstrap()}var l=e.extend,d=e.each;g.prototype={on:e.prototype.on,off:e.prototype.off,fire:e.prototype.fire,cancel:e.prototype.cancel,assignBrowse:function(a){"undefined"==
typeof a.length&&(a=[a]);d(a,function(a){var c;"INPUT"===a.tagName&&"file"===a.type?c=a:(c=f.createElement("input"),c.setAttribute("type","file"),l(a.style,{display:"inline-block",position:"relative",overflow:"hidden",verticalAlign:"top"}),l(c.style,{position:"absolute",top:0,right:0,fontFamily:"Arial",fontSize:"118px",margin:0,padding:0,opacity:0,filter:"alpha(opacity=0)",cursor:"pointer"}),a.appendChild(c));h(c,"change",this.inputChangeEvent)},this)},assignDrop:function(){},unAssignDrop:function(){},
isUploading:function(){var a=!1;d(this.files,function(b){if(b.isUploading())return a=!0,!1});return a},upload:function(){var a=0;d(this.files,function(b){if(1!=b.progress()&&!b.isPaused())if(b.isUploading())a++;else{if(a++>=this.opts.simultaneousUploads)return!1;1==a&&this.fire("uploadStart");b.send()}},this);a||this.fire("complete")},pause:function(){d(this.files,function(a){a.pause()})},resume:function(){d(this.files,function(a){a.resume()})},progress:function(){var a=0,b=0;d(this.files,function(c){a+=
c.progress();b++});return 0<b?a/b:0},addFiles:function(a,b){var c=[];d(a,function(a){1===a.nodeType&&a.value&&(a=new k(this,a),this.fire("fileAdded",a,b)&&c.push(a))},this);this.fire("filesAdded",c,b)&&d(c,function(a){this.opts.singleFile&&0<this.files.length&&this.removeFile(this.files[0]);this.files.push(a)},this);this.fire("filesSubmitted",c,b)},addFile:function(a,b){this.addFiles([a],b)},generateUniqueIdentifier:function(a){var b=this.opts.generateUniqueIdentifier;return"function"===typeof b?
b(a):"xxxxxxxx-xxxx-yxxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(a){var b=16*Math.random()|0;return("x"==a?b:b&3|8).toString(16)})},getFromUniqueIdentifier:function(a){var b=!1;d(this.files,function(c){c.uniqueIdentifier==a&&(b=c)});return b},removeFile:function(a){for(var b=this.files.length-1;0<=b;b--)this.files[b]===a&&this.files.splice(b,1)},getSize:function(){},timeRemaining:function(){},sizeUploaded:function(){}};k.prototype={getExtension:e.FlowFile.prototype.getExtension,getType:function(){},
send:function(){if(!this.finished){var a=this.flowObj.opts,b=this.createForm(),c=a.query,d={};c&&"[object Function]"===d.toString.call(c)&&(c=c(this));c[a.fileParameterName]=this.element;c.flowFilename=this.name;c.flowRelativePath=this.relativePath;c.flowIdentifier=this.uniqueIdentifier;this.addFormParams(b,c);h(this.iFrame,"load",this.iFrameLoaded);b.submit();b.parentNode.removeChild(b)}},abort:function(a){if(this.iFrame){this.iFrame.setAttribute("src","java"+String.fromCharCode(115)+"cript:false;");
var b=this.iFrame;b.parentNode.removeChild(b);this.iFrame=null;!a&&this.flowObj.upload()}},cancel:function(){this.flowObj.removeFile(this);this.abort()},retry:function(){this.bootstrap();this.flowObj.upload()},bootstrap:function(){this.abort(!0);this.error=this.finished=!1},timeRemaining:function(){},sizeUploaded:function(){},resume:function(){this.paused=!1;this.flowObj.upload()},pause:function(){this.paused=!0;this.abort()},isUploading:function(){return null!==this.iFrame},isPaused:function(){return this.paused},
isComplete:function(){return 1===this.progress()},progress:function(){return this.error?1:this.finished?1:0},createIframe:function(){var a=/MSIE (6|7|8)/.test(navigator.userAgent)?f.createElement('<iframe name="'+this.uniqueIdentifier+'_iframe">'):f.createElement("iframe");a.setAttribute("id",this.uniqueIdentifier+"_iframe_id");a.setAttribute("name",this.uniqueIdentifier+"_iframe");a.style.display="none";f.body.appendChild(a);return a},createForm:function(){var a=this.flowObj.opts.target;"function"===
typeof a&&(a=a.apply(null));var b=f.createElement("form");b.encoding="multipart/form-data";b.method="POST";b.setAttribute("action",a);this.iFrame||(this.iFrame=this.createIframe());b.setAttribute("target",this.iFrame.name);b.style.display="none";f.body.appendChild(b);return b},addFormParams:function(a,b){var c;d(b,function(b,d){b&&1===b.nodeType?c=b:(c=f.createElement("input"),c.setAttribute("value",b));c.setAttribute("name",d);a.appendChild(c)})}};g.FustyFlowFile=k;"undefined"!==typeof module?module.exports=
g:"function"===typeof define&&define.amd?define(function(){return g}):m.FustyFlow=g})(window.Flow,window,document);
/*
 * XenForo attachment_manager.min.js
 * Copyright 2010-2018 XenForo Ltd.
 * Released under the XenForo License Agreement: https://xenforo.com/license-agreement
 */
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(c,g,e){c instanceof String&&(c=String(c));for(var h=c.length,a=0;a<h;a++){var b=c[a];if(g.call(e,b,a,c))return{i:a,v:b}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(c,g,e){c!=Array.prototype&&c!=Object.prototype&&(c[g]=e.value)};
$jscomp.getGlobal=function(c){return"undefined"!=typeof window&&window===c?c:"undefined"!=typeof global&&null!=global?global:c};$jscomp.global=$jscomp.getGlobal(this);$jscomp.polyfill=function(c,g,e,h){if(g){e=$jscomp.global;c=c.split(".");for(h=0;h<c.length-1;h++){var a=c[h];a in e||(e[a]={});e=e[a]}c=c[c.length-1];h=e[c];g=g(h);g!=h&&null!=g&&$jscomp.defineProperty(e,c,{configurable:!0,writable:!0,value:g})}};
$jscomp.polyfill("Array.prototype.find",function(c){return c?c:function(c,e){return $jscomp.findInternal(this,c,e).v}},"es6","es3");
!function(c,g,e,h){XF.AttachmentManager=XF.Element.newHandler({options:{uploadButton:".js-attachmentUpload",manageUrl:null,filesContainer:".js-attachmentFiles",fileRow:".js-attachmentFile",insertAllRow:".js-attachmentInsertAllRow",insertRow:".js-attachmentInsertRow",allActionButton:".js-attachmentAllAction",actionButton:".js-attachmentAction",uploadTemplate:".js-attachmentUploadTemplate",templateProgress:".js-attachmentProgress",templateError:".js-attachmentError",templateThumb:".js-attachmentThumb",
templateView:".js-attachmentView",allowDrop:!1},$filesContainer:null,template:null,$form:null,manageUrl:null,flow:null,fileMap:{},isUploading:!1,editor:null,init:function(){var a=this,b=this.options,f=this.$target;if(g.Flow){var d=navigator.userAgent;if(d.match(/Android [1-4]/)&&(d=d.match(/Chrome\/([0-9]+)/),!d||33>parseInt(d[1],10))){console.warn("Old Android WebView detected. Must fallback to basic uploader.");return}d=f.find(b.uploadButton);if(this.options.manageUrl)this.manageUrl=this.options.manageUrl;
else{if(!d.length){console.error("No manage URL specified and no uploaders available.");return}var e=d.first();this.manageUrl=e.data("upload-href")||e.attr("href")}this.$filesContainer=f.find(b.filesContainer);this.$filesContainer.on("click",b.actionButton,c.proxy(this,"actionButtonClick")).on("click",b.allActionButton,c.proxy(this,"allActionButtonClick"));(this.template=f.find(b.uploadTemplate).html())||console.error("No attached file template found.");if(b=this.setupFlow()){if(this.flow=b,this.setupUploadButtons(d,
b),this.options.allowDrop&&b.assignDrop([f[0]]),setTimeout(function(){a.editor=XF.getEditorInContainer(a.$target,"[data-attachment-target=false]");a.editor||a.removeInsertButtons(a.$filesContainer);a.toggleInsertAllRow()},50),this.$form=this.$target.closest("form"),this.$form.length)this.$form.on("ajax-submit:before",function(b,c){a.isUploading&&!confirm(XF.phrase("files_being_uploaded_are_you_sure"))&&(c.preventSubmit=!0)})}else console.error("No flow uploader support")}else console.error("flow.js must be loaded")},
setupFlow:function(){var a=this.getFlowOptions(),b=new Flow(a),f=this;if(!b.support){if(!g.FustyFlow)return null;a.matchJSON=!0;b=new FustyFlow(a)}b.on("fileAdded",c.proxy(this,"fileAdded"));b.on("filesSubmitted",function(){f.setUploading(!0);b.upload()});b.on("fileProgress",c.proxy(this,"uploadProgress"));b.on("fileSuccess",c.proxy(this,"uploadSuccess"));b.on("fileError",c.proxy(this,"uploadError"));return b},getFlowOptions:function(){return{target:this.manageUrl,allowDuplicateUploads:!0,fileParameterName:"upload",
query:c.proxy(this,"uploadQueryParams"),simultaneousUploads:1,testChunks:!1,progressCallbacksInterval:100,chunkSize:4294967296,readFileFn:function(a,b,c,d,e){var f="slice";a.file.slice?f="slice":a.file.mozSlice?f="mozSlice":a.file.webkitSlice&&(f="webkitSlice");d||(d="");e.readFinished(a.file[f](b,c,d))}}},setupUploadButtons:function(a,b){a.each(function(){var a=c(this),d=a.data("accept")||"",e=c("<span />").insertAfter(a).append(a);"."==d&&(d="");a.click(function(a){a.preventDefault()});b.assignBrowse(e[0],
!1,!1,{accept:d});a=e.find("input[type=file]");a.css("overflow","hidden");a.css(XF.isRtl()?"right":"left",-1E3)})},fileAdded:function(a){var b=this.applyUploadTemplate({filename:a.name,uploading:!0});this.resizeProgress(b,0);b.data("file",a);this.$filesContainer.addClass("is-active");b.appendTo(this.$filesContainer);this.fileMap[a.uniqueIdentifier]=b;this.$target.find(this.options.uploadButton).blur();if(0<XF.config.uploadMaxFilesize&&a.size>XF.config.uploadMaxFilesize)return this.uploadError(a,this.addErrorToJson({},
XF.phrase("file_too_large_to_upload"))),!1},uploadProgress:function(a){var b=this.fileMap[a.uniqueIdentifier];b&&(this.setUploading(!0),this.resizeProgress(b,a.progress()))},resizeProgress:function(a,b){b=Math.floor(100*b);a=a.find(this.options.templateProgress);var f=a.find("i");f.length||(f=c("<i />"),a.html("&nbsp;").append(f));f.text(b+"%").css("width",b+"%")},uploadSuccess:function(a,b,c){b=this.getObjectFromMessage(b);this.setUploading(!1);b.status&&"error"==b.status?this.uploadError(a,b,c):
b.attachment?this.insertUploadedRow(b.attachment,this.fileMap[a.uniqueIdentifier]):(b=this.addErrorToJson(b),this.uploadError(a,b,c))},setUploading:function(a){a=a?!0:!1;a!==this.isUploading&&((this.isUploading=a)?this.$target.trigger("attachment-manager:upload-start"):this.$target.trigger("attachment-manager:upload-end"))},getObjectFromMessage:function(a){if(a instanceof Object)return a;try{return c.parseJSON(a)}catch(b){return this.addErrorToJson({})}},addErrorToJson:function(a,b){a.status="error";
a.errors=[null===b?XF.phrase("oops_we_ran_into_some_problems"):b];return a},insertUploadedRow:function(a,b){a=this.applyUploadTemplate(a);this.editor||this.removeInsertButtons(a);b?b.replaceWith(a):(this.$filesContainer.addClass("is-active"),a.appendTo(this.$filesContainer));XF.activate(a);XF.layoutChange();b=c.Event("attachment:row-inserted");a.trigger(b,[a,this]);this.toggleInsertAllRow()},uploadError:function(a,b,c){b=this.getObjectFromMessage(b);this.setUploading(!1);var d=this.fileMap[a.uniqueIdentifier];
d&&b.errors?(d.find(this.options.templateProgress).remove(),d.find(this.options.templateError).text(b.errors[0]),d.addClass("is-uploadError"),delete this.fileMap[a.uniqueIdentifier],d.removeData("file")):(XF.defaultAjaxSuccessError(b,200,c.xhr),this.removeFileRow(d))},actionButtonClick:function(a){a.preventDefault();var b=c(a.currentTarget);a=b.attr("data-action");b=b.closest(this.options.fileRow);switch(a){case "thumbnail":case "full":this.insertAttachment(b,a);break;case "delete":this.deleteAttachment(b);
break;case "cancel":this.cancelUpload(b)}},allActionButtonClick:function(a){a.preventDefault();var b=c(a.currentTarget).attr("data-action");a=this.$filesContainer.find(this.options.fileRow+" "+this.options.actionButton);a=a.filter(function(){return c(this).attr("data-action")===b});a.click()},insertAttachment:function(a,b){var c=a.data("attachment-id");if(c&&this.editor){var d=a.find(this.options.templateThumb).attr("src");a=a.find(this.options.templateView).attr("href");var e={id:c,img:d};if("full"==
b)c="[ATTACH=full]"+c+"[/ATTACH]",b='<img src="{{img}}" data-attachment="full:{{id}}" alt="{{id}}" />',e.img=a;else{if(!d)return;c="[ATTACH]"+c+"[/ATTACH]";b='<img src="{{img}}" data-attachment="thumb:{{id}}" alt="{{id}}" />'}b=Mustache.render(b,e);XF.insertIntoEditor(this.$target,b,c,"[data-attachment-target=false]")}},deleteAttachment:function(a){var b=a.data("attachment-id");if(b){var e=this;XF.ajax("post",this.manageUrl,{delete:b},function(b){b.delete&&e.removeFileRow(a)},{skipDefaultSuccess:!0});
var d=new RegExp("^[a-z]+:"+b+"$","i"),g=new RegExp("\\[attach(=[^\\]]*)?\\]"+b+"\\[/attach\\]","gi");XF.modifyEditorContent(this.$target,function(a){var b=a.ed;b.$el.find("img[data-attachment]").filter(function(){return d.test(c(this).attr("data-attachment"))}).each(function(){b.image.remove(c(this))})},function(a){var b=a.val();b=b.replace(g,"");a.val(b)},"[data-attachment-target=false]")}},cancelUpload:function(a){var b=a.data("file");a.data("attachment-id")||b&&1==b.progress()||this.removeFileRow(a)},
uploadQueryParams:function(){return{_xfToken:XF.config.csrf,_xfResponseType:"json",_xfWithData:1}},applyUploadTemplate:function(a){a=c(c.parseHTML(Mustache.render(this.template,a)));var b=this.options.fileRow;return a.filter(function(){return c(this).is(b)})},removeFileRow:function(a){a.remove();this.toggleInsertAllRow();this.$filesContainer.find(this.options.fileRow).length||(this.$filesContainer.removeClass("is-active"),XF.layoutChange())},removeInsertButtons:function(a){a.find(this.options.insertRow+
","+this.options.insertAllRow).remove();XF.layoutChange()},toggleInsertAllRow:function(){var a=this.$filesContainer.find(this.options.actionButton).filter(":not([data-action=delete])").closest(this.options.fileRow),b=this.$filesContainer.find(this.options.insertAllRow);1<a.length?b.addClass("is-active"):b.removeClass("is-active");XF.layoutChange()}});XF.AttachmentOnInsert=XF.Element.newHandler({options:{fileRow:".js-attachmentFile",href:null,linkData:null},loading:!1,init:function(){var a=this.$target.closest(this.options.fileRow);
a.length&&this.options.href||console.error("Cannot find inserted row or action to perform.");a.on("attachment:row-inserted",c.proxy(this,"onAttachmentInsert"))},onAttachmentInsert:function(a,b,e){if(!this.loading){var d=this;XF.ajax("post",this.options.href,this.options.linkData||{},c.proxy(this,"onLoad")).always(function(){d.loading=!1})}},onLoad:function(a){if(a.html){var b=this;XF.setupHtmlInsert(a.html,function(a,c,e){b.$target.replaceWith(a).xfFadeDown(XF.config.speed.xfast,function(){e(!0);
XF.layoutChange()})})}}});XF.Element.register("attachment-manager","XF.AttachmentManager");XF.Element.register("attachment-on-insert","XF.AttachmentOnInsert")}(jQuery,window,document);