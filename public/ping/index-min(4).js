KISSY.add("cm/rate-platform/common/script/analytics",["node"],function(t,e){function n(t){if(t){var e=new Image,n="img_"+r++,i=function(){a[n]=null,delete a[n]};a[n]=e,e.onload=i,e.onerror=i,e.src="//log.mmstat.com/"+t+(-1===t.indexOf("?")?"?":"&")+"_ts_="+KISSY.now()}}var i=e("node").all,a={},r=0;return KISSY.ready(function(){i("body").delegate("click","[data-tbrate-mmstat]",function(t){n(i(t.currentTarget).attr("data-tbrate-mmstat"))})}),{__:a,send:n}}),KISSY.add("cm/rate-platform/common/script/xtpl/dialog-xtpl",function(t,e,n,i){return function(t,e,n){var a,r="",o=this.config,s=this,l=o.utils;"undefined"!=typeof i&&i.kissy&&(a=i);var c=l.runBlockCommand,u=l.renderOutput,p=l.getProperty,d=(l.runInlineCommand,l.getPropertyOrRunCommand);r+='<div class="tb-rate-dialog ';var h=d(s,t,{},"customClass",0,1);r+=u(h,!0),r+='" tabindex="-1">\n  <div class="dlg-wrap">',r+="\n    ";var f={},m=[],g=p(s,t,"title",0,3);m.push(g),f.params=m,f.fn=function(t){var e="";e+='\n    <div class="dlg-hd" data-dlg-attach-point="title">';var n=d(s,t,{},"title",0,4);return e+=u(n,!0),e+="</div>\n    "},r+=c(s,t,f,"if",3),r+='\n    <div class="dlg-bd">\n      <div class="dlg-content ';var v=d(s,t,{},"contentClass",0,7);r+=u(v,!0),r+='" data-dlg-attach-point="content">';var _=d(s,t,{},"content",0,7);r+=u(_,!1),r+="</div>\n    </div>\n    ";var b={},S=[],x=p(s,t,"buttons.length",0,9);S.push(x),b.params=S,b.fn=function(t){var e="";e+='\n    <div class="dlg-ft" data-dlg-attach-point="foot">\n      ';var n={},i=[],a=p(s,t,"buttons",0,11);return i.push(a),n.params=i,n.fn=function(t){var e="";e+='\n      <button class="J_DlgBtn tb-rate-btn size-xs type-';var n=d(s,t,{},"type",0,12);e+=u(n,!0),e+='" data-dlg-attach-point="button">';var i=d(s,t,{},"text",0,12);return e+=u(i,!0),e+="</button>\n      "},e+=c(s,t,n,"each",11),e+="\n    </div>\n  </div>\n  "},r+=c(s,t,b,"if",9),r+="\n  ";var I={},k=[],y=p(s,t,"closable",0,17);return k.push(y),I.params=k,I.fn=function(t){var e="";return e+='\n  <a class="J_DlgX dlg-x" href="javascript:;" title="\u5173\u95ed">&times;</a>\n  '},r+=c(s,t,I,"if",17),r+="\n</div>\n"}}),KISSY.add("cm/rate-platform/common/script/dialog",["node","ua","promise","xtemplate/runtime","./xtpl/dialog-xtpl"],function(t,e){"use strict";function n(t){return l.reject?l.reject(t):(new l.Defer).reject(t)}function i(t){if(t.length)try{t[0].focus()}catch(e){}}function a(t){var e=KISSY.mix({title:"",content:"",buttons:null,closable:!0,esc:!0,externalClick:!1,theme:"",customClass:"",contentClass:"",refocus:null,on:null},t),n=e.buttons;if(n&&n.length){var i=!0;KISSY.each(n,function(t){t.type||(t.type="secondary")}),i&&(n[0].type="primary")}return e}function r(){this._ctor.apply(this,arguments)}var o=e("node").all,s=e("ua"),l=e("promise"),c=e("xtemplate/runtime"),u=new c(e("./xtpl/dialog-xtpl")),p="TB_RATE_DIALOG_BTN",d={ESC:function(t){27===t.which&&this.close()},EX_CLICK:function(t){var e=o(t.target),n=e.closest(".tb-rate-dialog");n&&n.length||this.close()}};return KISSY.mix(r.prototype,{_$ui:null,_options:null,_ui:null,_data:null,_deferred:null,_handlersEx:null,_locked:!1,_msgClosingTimer:null,_ctor:function(t){var e=a(t),n=o(u.render(e)),i={};e.theme&&n.addClass("theme-"+e.theme),o("[data-dlg-attach-point]",n).each(function(t){var e=o(t),n=e.attr("data-dlg-attach-point");n&&(i[n]?i[n]=i[n].add(e):i[n]=e)}),this._$ui=n,this._options=e,this._ui=i,this._data={},this._handlersEx=[],o(".J_DlgBtn",n).each(function(t,n){o(t).data(p,e.buttons[n])}),n.delegate("click",".J_DlgBtn",function(t){var e=o(t.currentTarget).data(p),n=e.result,i=e.callback;i&&i.apply(this,[])===!1||this.close(KISSY.isFunction(n)?n.apply(this):n)},this).delegate("click",".J_DlgX",function(){this.close()},this),this._fire("init")},open:function(){var t=new l.Defer;return this._deferred=t,this._$ui.appendTo("body"),this._fire("open"),this._handleEx(),t.promise},close:function(t){this._locked||(this._msgClosingTimer&&clearTimeout(this._msgClosingTimer),this._deferred.resolve(t),this._deferred=null,this._data=null,this._ui=null,this._$ui.remove(),this._$ui=null,this._handleEx(!0))},find:function(t){return o(t,this._getUI("content"))},delegate:function(t,e,n,i){return this._getUI("content").delegate(t,e,n,i)},data:function(){var t=this._data,e=arguments,n=e[0];return e.length?1===e.length?"string"==typeof n?t[n]:null===n||n===!1?(this._data={},this):(KISSY.mix(t,n),this):(t[n]=e[1],this):t},lock:function(t){var e=o(".dlg-locker",this._$ui);e.remove(),e=o(['<div class="dlg-locker">','<div class="locking-message">'+(t||"&nbsp;")+"</div>","</div>"].join("")),s.ie<7&&e.css({width:this._$ui.width(),height:this._$ui.height()}),e.appendTo(this._$ui),this._locked=!0},unlock:function(){o(".dlg-locker",this._$ui).remove(),this._locked=!1},message:function(t,e){if(this._msgClosingTimer&&clearTimeout(this._msgClosingTimer),o(".dlg-msg-inline",this._$ui).remove(),t){var n=KISSY.mix({},e);if(o('<span class="dlg-msg-inline">'+t+"</span>").appendTo(this._getUI("ft"===n.where?"foot":"content")),n.autoClose){var i=this;this._msgClosingTimer=setTimeout(function(){i.message(""),i._msgClosingTimer=null},n.autoClose)}}},update:function(t){switch(t){case"title":this._getUI("title").text(arguments[1]);break;case"content":this._getUI("content").html(arguments[1]);break;case"button":this._getUI("button",arguments[1]).text(arguments[2])}},_getUI:function(t){var e=this._ui[t];return e?arguments.length>1?o(e[arguments[1]]):e:o(null)},_fire:function(t,e){var n=this._options.on,i=n&&n[t];return i?i.apply(this,e||[]):void 0},_handleEx:function(t){var e=this,n=this._options,a=this._handlersEx;setTimeout(function(){if(t){for(;a.length;){var r=a.shift();o(r.o).detach(r.e,r.f)}i(o(n.refocus))}else(n.esc===-1||n.closable&&n.esc)&&a.push({o:document,e:"keydown",f:KISSY.bind(d.ESC,e)}),n.closable&&n.externalClick&&a.push({o:document,e:"click",f:KISSY.bind(d.EX_CLICK,e)}),KISSY.each(a,function(t){o(t.o).on(t.e,t.f)})},0)}}),{open:function(t){return new r(t).open()},alert:function(t,e,n){return new r({title:e,content:t,buttons:[{text:n||"\u786e\u5b9a"}],closable:!1,esc:-1}).open()},confirm:function(t,e,i,a){return new r({title:e,content:t,buttons:[{text:i||"\u786e\u5b9a",result:1},{text:a||"\u53d6\u6d88"}],closable:!1,esc:-1}).open().then(function(t){if(1!==t)return n()})},prompt:function(t,e,i,a,o){return new r({title:i,content:(t?'<div class="label">'+t+"</div>":"")+'<input type="text" class="tb-rate-form-ctrl alt-flat" />',buttons:[{text:a||"\u786e\u5b9a",result:function(){return this.find("input").val()}},{text:o||"\u53d6\u6d88"}],contentClass:"dlg-content-confirm",closable:!1,esc:-1,on:{init:function(){var t=this.find("input").on("keydown",function(e){13===e.keyCode&&this.close(t.val())},this);this.data("$input",t),t.val(e||"")},open:function(){this.data("$input")[0].select()}}}).open().then(function(t){return t?t:n()})}}}),KISSY.add("cm/rate-platform/common/script/xtpl/tooltip-xtpl",function(t,e,n,i){return function(t,e,n){var a,r="",o=this.config,s=this,l=o.utils;"undefined"!=typeof i&&i.kissy&&(a=i);var c=l.runBlockCommand,u=l.renderOutput,p=l.getProperty,d=(l.runInlineCommand,l.getPropertyOrRunCommand);r+='<div class="tb-rate-tooltip ';var h=d(s,t,{},"placement",0,1);r+=u(h,!0),r+=" ";var f=d(s,t,{},"theme",0,1);r+=u(f,!0),r+='">\n  <div class="tip-inner">\n  ';var m={},g=[],v=p(s,t,"title",0,3);g.push(v),m.params=g,m.fn=function(t){var e="";e+='<div class="tip-title">';var n=d(s,t,{},"title",0,3);return e+=u(n,!0),e+="</div>"},r+=c(s,t,m,"if",3),r+="\n  ";var _={},b=[],S=p(s,t,"unsafe",0,4);b.push(S),_.params=b,_.fn=function(t){var e="";e+="";var n=d(s,t,{},"content",0,4);return e+=u(n,!1),e+=""},_.inverse=function(t){var e="";e+="";var n=d(s,t,{},"content",0,4);return e+=u(n,!0),e+=""},r+=c(s,t,_,"if",4),r+="\n  ";var x={},I=[],k=p(s,t,"extra",0,5);I.push(k),x.params=I,x.fn=function(t){var e="";e+='<div class="tip-extra">';var n=d(s,t,{},"extra",0,5);return e+=u(n,!0),e+="</div>"},r+=c(s,t,x,"if",5),r+="\n  </div>\n  ";var y={},C=[],K=p(s,t,"closable",0,7);return C.push(K),y.params=C,y.fn=function(t){var e="";return e+='\n  <a class="J_TipX tip-x" href="javascript:;" title="\u5173\u95ed">&times;</a>\n  '},r+=c(s,t,y,"if",7),r+='\n  <div class="tip-arrow"></div>\n  <div class="tip-arrow-inner"></div>\n</div>\n'}}),KISSY.add("cm/rate-platform/common/script/tooltip",["node","xtemplate/runtime","./xtpl/tooltip-xtpl"],function(t,e){"use strict";function n(t){return t&&("1"===t||"true"===t.toLowerCase())}function i(t){function e(t){a(t.currentTarget,KISSY.isFunction(i.opts)?i.opts(t.currentTarget):i.opts,h)}function n(t){var e=t.currentTarget,n=s(e).data(u);n&&(h?n.timerHiding=setTimeout(function(){r(e)},50):r(e))}var i=KISSY.mix({node:null,selector:"",trigger:"",opts:null},t);if(i.node||i.selector){var o=s(i.node||"body"),l=p[i.trigger.toUpperCase()]||p.HOVER,c=l.show,d=l.hide,h=l===p.HOVER;i.selector?o.delegate(c,i.selector,e).delegate(d,i.selector,n):o.on(c,e).on(d,n)}}function a(t,e,n){var i=s(t),a=i.data(u);if(a)return void(a.timerHiding&&(clearTimeout(a.timerHiding),a.timerHiding=null));a={};var l,p=KISSY.mix({title:"",content:"",extra:"",placement:"b",attachPoint:"body",theme:"",width:0,unsafe:!1,closable:!1,autoClose:0,onShow:KISSY.noop},e);p.content&&(l=s(c.render({title:p.title,content:p.content,extra:p.extra,placement:"placement-"+p.placement,theme:p.theme,closable:p.closable,unsafe:p.unsafe})).delegate("click",".J_TipX",function(){r(i)}),a.$tooltip=l,n&&l.on("mouseenter",function(){a.timerHiding&&(clearTimeout(a.timerHiding),a.timerHiding=null)}).on("mouseleave",function(){a.timerHiding=setTimeout(function(){r(i)},50)}),p.width>0&&l.css({maxWidth:p.width,width:p.width}),o(l,i,p.placement.split(""),p.attachPoint),p.autoClose&&(a.timerHidingAuto=setTimeout(function(){r(i)},p.autoClose)),i.data(u,a),p.onShow(l,i))}function r(t){var e=s(t),n=e.data(u);n&&(n.$tooltip.remove(),clearTimeout(n.timerHiding),clearTimeout(n.timerHidingAuto)),e.removeData(u)}function o(t,e,n,i){var a;a=KISSY.isFunction(i)?s(i(e)):"parent"===i?e.parent():s(i),a.length||(a=s("body")),KISSY.inArray(a[0].tagName,["UL","OL","DL"])&&(a=a.parent()),a.test("body")||KISSY.inArray(a.css("position"),["relative","absolute","fixed"])||a.css("position","relative"),t.appendTo(a).css({display:"block",visibility:"hidden"});var r=e.offset(),o=a.test("body")?{top:0,left:0}:a.offset(),l=r.left-o.left,c=r.top-o.top,u=e.outerWidth(),p=e.outerHeight(),d=t.prop("offsetWidth"),h=t.prop("offsetHeight"),f=n[0],m=n[1],g={top:"auto",right:"auto",bottom:"auto",left:"auto",visibility:"visible"};switch(f){case"t":case"b":switch(g.top="t"===f?c-h:c+p,m){case"l":g.left=l;break;case"r":g.left=l+u-d;break;default:g.left=l+(u-d)/2}break;case"l":case"r":switch(g.left="l"===f?l-d:l+u,m){case"t":g.top=c+p-h;break;case"b":g.top=c;break;default:g.top=c+(p-h)/2}}t.css(g)}var s=e("node").all,l=e("xtemplate/runtime"),c=new l(e("./xtpl/tooltip-xtpl")),u="tbRateTooltip",p={HOVER:{show:"mouseenter",hide:"mouseleave"},CLICK:{show:"click",hide:"click"},FOCUS:{show:"focus",hide:"blur"}};return KISSY.ready(function(){i({selector:"[data-tbrate-tooltip]",opts:function(t){var e=s(t),i=e.attr("title");return i&&(e.attr("data-tbrate-tooltip",i),e.removeAttr("title")),{title:e.attr("data-tbrate-tooltip-title"),content:i||e.attr("data-tbrate-tooltip"),extra:e.attr("data-tbrate-tooltip-extra"),placement:e.attr("data-tbrate-tooltip-placement"),unsafe:n(e.attr("data-tbrate-tooltip-unsafe")),closable:n(e.attr("data-tbrate-tooltip-closable"))}}})}),{init:i,show:function(t,e){s(t).each(function(t){a(t,KISSY.mix({closable:!0},e))})},hide:function(t){s(t).each(function(t){r(t)})}}}),KISSY.add("cm/rate-platform/common/script/xtpl/pagination-xtpl",function(t,e,n,i){return function(t,e,n){var a,r="",o=this.config,s=this,l=o.utils;"undefined"!=typeof i&&i.kissy&&(a=i);var c=l.runBlockCommand,u=l.renderOutput,p=l.getProperty,d=(l.runInlineCommand,l.getPropertyOrRunCommand);r+='<div class="tb-rate-pagination ';var h=d(s,t,{},"theme",0,1);r+=u(h,!0),r+=" ";var f=d(s,t,{},"align",0,1);r+=u(f,!0),r+='">\n  ';var m={},g=[],v=p(s,t,"list.length",0,2);return g.push(v),m.params=g,m.fn=function(t){var e="";e+="\n  <ul>\n    ";var n={},i=[],a=p(s,t,"list",0,4);return i.push(a),n.params=i,n.fn=function(t){var e="";e+='\n    <li class="';var n=d(s,t,{},"className",0,5);e+=u(n,!0),e+='">\n      ';var i={},a=[],r=p(s,t,"url",0,6);return a.push(r),i.params=a,i.fn=function(t){var e="";e+='<a href="';var n=d(s,t,{},"url",0,6);e+=u(n,!0),e+='">';var i=d(s,t,{},"text",0,6);return e+=u(i,!0),e+="</a>"},i.inverse=function(t){var e="";e+="";var n=d(s,t,{},"text",0,6);return e+=u(n,!0),e+=""},e+=c(s,t,i,"if",6),e+="\n    </li>\n    "},e+=c(s,t,n,"each",4),e+="\n  </ul>\n  "},r+=c(s,t,m,"if",2),r+="\n</div>\n"}}),KISSY.add("cm/rate-platform/common/script/pagination",["node","xtemplate/runtime","./xtpl/pagination-xtpl"],function(t,e){"use strict";function n(t,e){return t=parseInt(t,10)||1,e=parseInt(e,10)||1,t<1&&(t=1),e<1&&(e=1),t>e&&(t=e),[t,e]}function i(t){var e=KISSY.merge({attachPoint:null,attachMode:"append",theme:"theme-default",align:"align-c",page:1,pages:1,limit:5,implicit:!1,linkGen:null,omittedParams:["spm"],on:{}},t),i=n(e.page,e.pages);return e.page=i[0],e.pages=i[1],e.on.change||(e.on.change=KISSY.isFunction(e.linkGen)?KISSY.noop:"p"),e}function a(){this._ctor.apply(this,arguments)}var r=e("node").all,o=e("xtemplate/runtime"),s=new o(e("./xtpl/pagination-xtpl")),l={PREV:{page:"PREV",text:"\u4e0a\u4e00\u9875",className:"pg-prev"},NEXT:{page:"NEXT",text:"\u4e0b\u4e00\u9875",className:"pg-next"},CRUMB:{page:"...",text:"...",className:"pg-crumb"}};return KISSY.mix(a.prototype,{_options:null,_$ui:null,_ctor:function(t){this._options=i(t),this._render()},update:function(t,e){var i=n(t,e||this._options.pages);this._options.page=i[0],this._options.pages=i[1],this._render()},_fire:function(t,e){var n=this._options.on,i=n&&n[t];return KISSY.isFunction(i)?i.apply(this,e||[]):void 0},_render:function(){var t=this._options,e=this._$ui||r(t.attachPoint),n=this._$ui?"replace":t.attachMode,i=this._generatePages(),a=r(s.render({theme:t.theme,align:t.align,list:i})).delegate("click","li",this._handlePageClick,this);switch(this._$ui=a,n||t.attachMode){case"clear":e.empty().append(a);break;case"replace":e.replaceWith(a);break;case"prepend":e.append(a);break;case"after":e.after(a);break;case"before":e.before(a);break;default:e.append(a)}a.all("li").each(function(t,e){var n=i[e];r(t).data("paging",n),this._fire("render",[t,n.page])},this)},_generatePages:function(){var t=this._options,e=t.page,n=t.pages,i=t.limit,a=t.implicit,r=[],o=1,s=n;if(n<=1)return[];i>0&&i<n&&(o=Math.max(e-Math.floor(i/2),1),s=o+i-1,s>n&&(s=n,o=s-i+1)),2===o&&(o=1),s!==n-1||a||(s=n),r.push(this._getPaging(l.PREV)),o>1&&(r.push(this._getPaging(1)),r.push(this._getPaging(l.CRUMB)));for(var c=o;c<=s;c++)r.push(this._getPaging(c));return(a&&n>e||s<n)&&r.push(this._getPaging(l.CRUMB)),!a&&s<n&&r.push(this._getPaging(n)),r.push(this._getPaging(l.NEXT)),r},_getPaging:function(t){var e=this._options,n=KISSY.isNumber(t)?{text:t,page:t,className:t===e.page?"pg-current":""}:KISSY.merge(t),i=!1;switch(n.url=this._makeLink(n),n.page){case l.PREV.page:i=e.page<=1;break;case l.NEXT.page:i=e.page>=e.pages}return i&&(n.className+=" pg-disabled"),n},_getRealPage:function(t){var e=this._options;switch(t.page){case l.PREV.page:return e.page-1;case l.NEXT.page:return e.page+1;case l.CRUMB.page:return-1;default:return t.page}},_makeLink:function(t){var e=this._options,n=e.on.change,i=this._getRealPage(t);if(this._navDisallowed(i))return"";if(KISSY.isFunction(e.linkGen))return e.linkGen(i);if(KISSY.isFunction(n))return"";var a=location.search.substring(1),r=[],o=!0;return KISSY.each(a?a.split("&"):[],function(t){var a=t.split("="),s=a[0];KISSY.inArray(s,e.omittedParams)||(s===n?(o=!1,r.push(n+"="+i)):r.push(t))}),o&&r.push(n+"="+i),"//"+location.host+location.pathname+"?"+r.join("&")+location.hash},_navDisallowed:function(t){var e=this._options;return e.page===t||t<1||t>e.pages},_handlePageClick:function(t){var e=this._options,n=r(t.currentTarget).data("paging"),i=this._getRealPage(n),a=[i,e.page,n.page];if(!this._navDisallowed(i)){if(this._fire("beforeChange",a)===!1)return void t.halt();var o=this._fire("change",a),s=KISSY.bind(function(){e.page=i,this._render()},this);o===!0?s():o&&o.then&&o.then(s)}}}),{create:function(t){return new a(t)}}}),KISSY.add("cm/rate-platform/common/script/xtpl/rating-xtpl",function(t,e,n,i){return function(t,e,n){var a,r="",o=this.config,s=this,l=o.utils;"undefined"!=typeof i&&i.kissy&&(a=i);var c=l.runBlockCommand,u=l.renderOutput,p=l.getProperty,d=(l.runInlineCommand,l.getPropertyOrRunCommand);r+='<span class="tb-rate-input-rating">\n  ';var h={},f=[],m=p(s,t,"values",0,2);return f.push(m),h.params=f,h.fn=function(t){var e="";e+='\n  <label><input type="radio" name="';var n=p(s,t,"name",1,3);e+=u(n,!0),e+='" value="';var i=d(s,t,{},"this",0,3);e+=u(i,!0),e+='" /> ';var a=d(s,t,{},"this",0,3);return e+=u(a,!0),e+="</label>\n  "},r+=c(s,t,h,"each",2),r+="\n</span>\n"}}),KISSY.add("cm/rate-platform/common/script/rating",["node","ua","xtemplate/runtime","./xtpl/rating-xtpl","./tooltip"],function(t,e){"use strict";function n(){this._ctor.apply(this,arguments)}function i(t,e){var n=a("input[type=radio]",t),i=KISSY.mix({attachMode:"replace",name:n.attr("name")||"tb-rate-util-selectable-"+b++,values:KISSY.map(n,function(t){return t.value}),required:KISSY.some(n,function(t){if(r.ie&&9===r.ie)return/\brequired\b/i.test(t.outerHTML);var e=a(t).prop("required");return!!e||""===e}),tips:void 0,theme:"thm-plain",on:null},e);return i.values.length||(i.values=[1,2,3,4,5]),i.values=KISSY.map(i.values,function(t){return""+t}),i}var a=e("node").all,r=e("ua"),o=e("xtemplate/runtime"),s=e("./xtpl/rating-xtpl"),l=e("./tooltip"),c=new o(s),u="is-hover",p="is-hover-gt-half",d="is-hover-not",h=[u,p,d].join(" "),f="is-active",m="is-active-gt-half",g="is-active-indirect",v=[f,m,g].join(" "),_="tbRatingInstance",b=0;return KISSY.mix(n.prototype,{_options:void 0,_$ui:void 0,_val:void 0,_ctor:function(t,e){var n=a(t),r=i(n,e),o="as-is"===r.attachMode?n:a(c.render({name:r.name,values:r.values})).addClass(r.theme);switch(this._options=r,this._$ui=o,o.data(_,this),r.attachMode){case"as-is":a("input[type=radio]",o).each(function(t){a(t).prop("checked")&&this.val(a(t).val())},this);break;case"prepend":n.prepend(o);break;case"append":n.append(o);break;case"before":n.before(o);break;case"after":n.after(o);break;default:KISSY.each(n.prop("attributes"),function(t){t.specified&&("class"===t.name?o.addClass(t.value):o.attr(t.name,t.value))}),n.replaceWith(o)}o.delegate("click","label",function(t){this.val(a("input",t.currentTarget).val()),l.hide(t.currentTarget)},this).delegate("mouseenter","label",function(t){var e=a(t.currentTarget),n=e.parent().children().removeClass(h),i=n.index(e)+1,o=n.slice(0,i).addClass(u);n.slice(i).addClass(d),i>=r.values.length/2&&o.addClass(p)}).on("mouseleave",function(){a("label",o).removeClass(h)}),r.required&&a("input",o).prop("required",!0),r.tips&&r.tips.length&&l.init({node:o,selector:"label",opts:function(t){return{content:r.tips[a(t).parent().children().index(t)],placement:"t"}}})},_on:function(t,e){var n=this._options,i=n.on&&n.on[t];if(KISSY.isFunction(i))return i.apply(this,e||[])},val:function(t){var e=this._val,n=this._options,i=this._$ui;if(!arguments.length)return e;t=""+t;var r=KISSY.indexOf(t,n.values);return r<-1||e===t?this:(this._val=t,a("label",i).removeClass(v).each(function(t,e){if(!(e>r)){var i=a(t);r===e?(a("input",i).prop("checked",!0),i.addClass(f)):e<r&&i.addClass(g),r+1>n.values.length/2&&i.addClass(m)}}),this._on("change",[t,e,i,a("."+f,i)]),this)},isInvalid:function(){return this._options.required&&void 0===this._val}}),{create:function(t,e){var i=KISSY.map(a(t),function(t){return new n(t,e)});return{ratings:i,isInvalid:function(){return KISSY.some(i,function(t){return t.isInvalid()})}}},getValue:function(t){var e=a(a(t)[0]).data(_);return e?e.val():void 0},getValues:function(t){var e=[];return a(".tb-rate-input-rating",t).each(function(t){var n=a(t).data(_);e.push(n?n.val():void 0)}),e}}}),KISSY.add("cm/rate-platform/common/script/placeholder",["node"],function(t,e){function n(t,e){var n=a(t),o=e||n.attr("placeholder")||"";n.attr("placeholder",o),r||i(n,o)}function i(t,e){function n(){t.val()?i.hide():i.show()}t.removeAttr("placeholder");var i=t.siblings(".placeholder");if(i.length)return void i.text(e);t.removeAttr("placeholder").wrap('<div class="tb-rate-placeholder-wrapper"></div>');var r=parseInt(t.css("border-top-width"),10)||0,o=parseInt(t.css("border-right-width"),10)||0,s=parseInt(t.css("border-bottom-width"),10)||0,l=parseInt(t.css("border-left-width"),10)||0;r+=parseInt(t.css("padding-top"),10)||0,o+=parseInt(t.css("padding-right"),10)||0,s+=parseInt(t.css("padding-bottom"),10)||0,l+=parseInt(t.css("padding-left"),10)||0,i=a('<div class="placeholder"></div>').text(e).css({paddingTop:r,paddingRight:o,paddingBottom:s,paddingLeft:l,fontSize:t.css("font-size")}).insertAfter(t).unselectable(),t.on({blur:n,input:n,keydown:function(){setTimeout(function(){n()},0)}}),i.on("click",function(){t.getDOMNode().focus()})}var a=e("node").all,r="placeholder"in document.createElement("input");return{init:function(t,e){a(t).each(function(t){n(t,KISSY.isFunction(e)?e(t):e)})}}}),KISSY.add("cm/rate-platform/common/script/text-limit",["node"],function(t,e){"use strict";function n(t,e){return t+"/"+e}function i(t,e){function i(){var t=r.val(),e=o.limit;t.length>e&&(t=t.substr(0,e),r.val(t)),s.html(o.statsComposer(t.length,e))}var r=a(t),o=KISSY.mix({limit:parseInt(r.attr("maxlength"),10)||0,statsNode:null,statsComposer:n,allowOverflow:!1,trim:!1},e),s=a(o.statsNode);r.on({focus:function(){s.show()},blur:function(){s.hide()},keyup:i,input:i}),i()}var a=e("node").all;return{init:function(t,e){a(t).each(function(t){i(t,KISSY.isFunction(e)?e(t):e)})}}}),KISSY.add("cm/rate-platform/common/index",["./script/analytics","./script/dialog","./script/tooltip","./script/pagination","./script/rating","./script/placeholder","./script/text-limit"],function(t,e){"use strict";var n={"kg/anticheat":"kg/anticheat/0.0.1/"};return{analytics:e("./script/analytics"),dialog:e("./script/dialog"),tooltip:e("./script/tooltip"),pagination:e("./script/pagination"),rating:e("./script/rating"),placeholder:e("./script/placeholder"),textLimit:e("./script/text-limit"),use3rd:function(t,e){var i=n[t]||t;KISSY.isFunction(i)?i(e):KISSY.use(i,function(t,n){e(n)})}}});