(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'");}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){(function($,args){var tool,config,SingleMenu;SingleMenu=
function(info,index){this.config={menu:$.extend({},info),pos:index,modal:false,opened:true}};SingleMenu.fn=SingleMenu.prototype={constructor:SingleMenu,getModal:function(){if(this.config.modal)return this.config.modal;this.config.modal=tool.getSingleMenuModal(this.config.menu,this.config.pos);tool.setMenuEvent(this);return this.config.modal},open:function(isOpen){this.config.opened=isOpen;this.getModal()[(isOpen?"remove":"add")+"Class"]("closed")}};tool={template:function(tpl,values){return tpl.replace(/\{\s*(.+?)\s*\}/g,
function(m,v){return values[v]||""})},isIe:function(){return!/MSIE/.test(window.navigator.appVersion)?false:window.navigator.appVersion.toString().replace(/.*MSIE([^\;]*).*/,"$1")<=7},resetLastClass:function(){var _$dl=$(".side-btm");if($(".side-nav-clear.ui-hidden").length>=1)for(var i=_$dl.length;i--;)if(!_$dl.eq(i).hasClass("ui-hidden")){_$dl.eq(i).attr("class","side-nav-clear");break}},gotoScrollPosition:function($doc,$sider,$parent){var _docHeight=$doc.outerHeight(),_scrollTop=$doc.scrollTop(),
_top=0,_gap=_docHeight-702-$sider.outerHeight();if(_scrollTop>192){_top=_scrollTop-190;_top=_top>_gap?_gap:_top}$sider.css({top:_top})},fixedSidebarPosition:function(){var _$document=$(document),_$sider=$(".public-sidebar"),_$parent;$(document).ready(function(){window.setTimeout(function(){_$parent=_$sider.parent().css({"minHeight":_$sider.outerHeight(),"width":_$sider.outerWidth()});tool.gotoScrollPosition(_$document,_$sider,_$parent)},30);$(window).on("scroll , resize",function(){tool.gotoScrollPosition(_$document,
_$sider,_$parent)})})},setMenuEvent:function(menu){menu.getModal().find("dt").on("click",function(){menu.open(!menu.config.opened)})},getDDClass:function(info,pos,totalLenght){var _class=[],_active=info.active||[];if(info.single)_class.push("side-single");if(pos==totalLenght-1)_class.push("mar-btm-clear");if(info.addClass)info.addClass instanceof Array?_class=$.merge(_class,info.addClass):_class.push(info.addClass);_active.push(info.url);for(var i=_active.length;i--;)if(config.locationUrl.indexOf(_active[i].replace(/\?.*/gi,
""))>-1){_class.push("active");break}return _class.join(" ")},getSingleMenuModal:function(info,index){var _class=[],_dl,_dd,_dt=$(tool.template("<dt {info.single}><i></i><a {info.url}>{info.title}</a></dt>",{"info.single":info.single?'class="side-nav-clear"':"","info.url":info.url?"href='"+info.url+"'":"","info.title":info.title})),_pass,_id,i,len;if(info.single)_class.push("side-single");_class.push(index<config.menuLenght-1?"side-btm":"side-nav-clear");if(info.condition){info.condition=info.condition instanceof
Array?info.condition:[info.condition];for(i=0,len=info.condition.length;i<len;i++)if(info.condition[i]()===false){_class.push("ui-hidden");break}}_dl=$("<dl>",{"class":_class.join(" ")}).append(_dt);var ddtpl="<dd class='{ddClass}' {id}><a href='{url}' {target}>{title}</a>{newicon}</dd>";for(i=0,len=info.sub?info.sub.length:0;i<len;i++){_id=false;if(info.sub[i].condition){info.sub[i].condition=info.sub[i].condition instanceof Array?info.sub[i].condition:[info.sub[i].condition];_pass=false;_id=(""+
(new Date).getTime()+Math.random()*1E5).replace(/\./,"");for(var k=info.sub[i].condition.length;k--;)if(info.sub[i].condition[k](_id)===true)_pass=true}else _pass=true;_dd=$(tool.template(ddtpl,{ddClass:tool.getDDClass(info.sub[i],i,info.sub.length)+(_pass?"":" ui-hidden"),id:_id?"id="+_id:"",url:info.sub[i].url,target:info.sub[i].target?"target="+info.sub[i].target:"",title:info.sub[i].title,newicon:info.sub[i].isnew?'<i class="u-new-tips-icon"></i>':""}));_dl.append(_dd)}return _dl},returnUrl:function(){var hrefPath=
window.location.pathname.toLowerCase();if(hrefPath=="/")hrefPath="/index.html";return hrefPath},getMenus:function(){var doc=document,w="write";doc[w]('<div class="public-sidebar"><div class="public-sidebar-content"></div><div class="public-sidebar-ad hidden"></div></div>');$(document.body).ready(function(){var $siderbar=$(".public-sidebar");var _$dl=$siderbar.find(".public-sidebar-content"),_menu,$adContent=$siderbar.find(".public-sidebar-ad");_$dl.parent().css("position","relative");for(var i=0;i<
config.menuLenght;i++){_menu=new SingleMenu(args[i],i);config.menus.push(_menu);_$dl.append(_menu.getModal())}tool.resetLastClass();if(tool.returnUrl()=="/index.html"){var adCode="ADSYQY6X";$.ajax({url:"//pcapi.vip.com/cmc/index.php",data:{type:adCode},dataType:"jsonp",callback:adCode,success:function(rtn){var data=rtn["AD"+adCode];if(data&&(data.items&&data.items.length)){var myRtn=data.items[0]||{};var htmlTpl='<a href="{link}" target="{blank}" title="{name}"><img src="{img}" width="129" height="200" alt="{name}"/></a>';
var html=tool.template(htmlTpl,{link:myRtn.link,blank:myRtn.blank?"_blank":"_self",name:myRtn.name,img:myRtn.img});$adContent.html($(html)).removeClass("hidden")}}})}window.setTimeout(function(){_$dl.parent().addClass("public-sidebar-transition")},500)})},config:function(){config={orgin:$.extend({},args),menuLenght:args.length,locationUrl:window.location.href.replace(/\?.*/gi,""),menus:[]}}};tool.config();tool.getMenus()})(jQuery,[{title:"\u6211\u7684\u4ea4\u6613",sub:[{title:"\u8ba2\u5355\u7ba1\u7406",
url:"//order.vip.com/order/orderlist?ff=103|2|2|1"},{title:"\u9000\u6362/\u552e\u540e",url:"//order.vip.com/afterSaleList/index?ff=103|2|2|2",active:["//order.vip.com/order/returnlist","//order.vip.com/afterSale/index","//order.vip.com/afterSaleDetail/index","//order.vip.com/returnDetail/index","//order.vip.com/multDetail/exchange/index"]},{title:"\u6536\u8d27\u5730\u5740",url:"//myi.vip.com/address.html?ff=103|2|2|4"}]},{title:"\u6211\u7684\u8d44\u4ea7",sub:[{title:"\u96f6\u94b1",url:"https://myvpal.vip.com/pc/wallet"},
{title:"\u552f\u54c1\u91d1\u878d",url:"https://jinrong.vip.com?ep=phuiyuanzhongxin&ff=103|2|2|13",addClass:["J_dd_userCredit"],isnew:true,target:"_blank"},{title:"\u94f6\u884c\u5361",url:"https://myvpal.vip.com/pc/bankCard"},{title:"\u8054\u540d\u5361",url:"//myi.vip.com/web/jointbankcard/index?ff=103|2|2|14",active:["//myi.vip.com/ccbJointCard","//myi.vip.com/bank-unbounded-ccb","//myi.vip.com/bank-binding","//myi.vip.com/ccbJointCardSuc","//myi.vip.com/bank-bounded-ccb","//myi.vip.com/removeBinding",
"//myi.vip.com/bank-bounded-cgb","//myi.vip.com/bank-unbounded-cgb","//myi.vip.com/bankcard-cmb"]},{title:"\u552f\u54c1\u5361",url:"https://myvpal.vip.com/pc/vipCard?ff=103|2|2|15"},{title:"\u4f18\u60e0\u5238",url:"//myi.vip.com/coupons.html?ff=103|2|2|8"},{title:"\u552f\u54c1\u5e01",url:"//myi.vip.com/vipmoney.html?ff=103|2|2|7"}]},{title:"\u6211\u7684\u8d26\u6237",sub:[{title:"\u6211\u7684\u8d44\u6599",url:"//myi.vip.com/basicinfo.html?ff=103|2|2|9"},{title:"\u5206\u4eab\u8d26\u53f7",url:"//myi.vip.com/userbind.html?ff=103|2|2|10"},
{title:"\u7231\u5fc3\u8d26\u6237",url:"//myi.vip.com/loveaccount.html?ff=103|2|2|11"},{title:"\u6d88\u606f\u8ba2\u9605",url:"//myi.vip.com/informationCustom.html?ff=103|2|2|12"}]}])},{}]},{},[1]);
