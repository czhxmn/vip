(function e$$0(h, m, b) {
    function a(c, f) {
        if (!m[c]) {
            if (!h[c]) {
                var k = 'function' == typeof require && require;
                if (!f && k) return k(c, !0);
                if (e) return e(c, !0);
                throw Error('Cannot find module \'' + c + '\'');
            }
            k = m[c] = {
                exports: {
                }
            };
            h[c][0].call(k.exports, function (f) {
                var b = h[c][1][f];
                return a(b ? b : f)
            }, k, k.exports, e$$0, h, m, b)
        }
        return m[c].exports
    }
    for (var e = 'function' == typeof require && require, c = 0; c < b.length; c++) a(b[c]);
    return a
}) ({
    1: [
        function (g, h, m) {
            h.exports = {
                data: {
                    areaLevel: 1,
                    varKey: 'cartGlobalArea',
                    isNotDArea: 0
                },
                getArea: function (b) {
                    var a =
                    '',
                    e = '',
                    c = $.Cookie.get('vip_address') && $.parseJSON(decodeURIComponent(escape($.Cookie.get('vip_address')))),
                    d = c.sid,
                    f = c.sname,
                    k = c.did,
                    n = c.dname,
                    l = c.cid,
                    g = c.cname,
                    h = c.pid,
                    m = c.pname,
                    a = $.Cookie.get('vip_province'),
                    c = $.Cookie.get('vip_province_name'),
                    d = 4 == this.data.areaLevel && this.checkAddress(d, f),
                    k = 3 <= this.data.areaLevel && this.checkAddress(k, n),
                    l = 2 <= this.data.areaLevel && this.checkAddress(l, g),
                    h = 1 <= this.data.areaLevel && this.checkAddress(h, m);
                    b = b || this.data.isNotDArea;
                    d ? (a = d.id, b && (e = '我不清楚' ==
                    d.name ? k.name : d.name), b || (k && (e = k.name), '我不清楚' != d.name && (e = e + ' ' + d.name)))  : k ? (a = k.id, e = k.name)  : l ? (a = l.id, e = l.name)  : h ? (a = h.id, e = h.name)  : (a = a || '', e = c || '');
                    return {
                        areaId: a,
                        areaName: e
                    }
                },
                checkAddress: function (b, a) {
                    return b && a ? {
                        id: b,
                        name: a
                    }
                     : !1
                },
                checkArea: function (b, a) {
                    function e(a, b, e) {
                        var d = 0,
                        g;
                        for (g in a) c.data.areaLevel == a[g] && (d = 1);
                        return d ? b == e ? 1 : 0 : 1
                    }
                    if ( - 1 == b) return !0;
                    var c = this,
                    d = $.Cookie.get('vip_address') && $.parseJSON(decodeURIComponent(escape($.Cookie.get('vip_address'))));
                    switch (a) {
                    case 'province':
                        return e([1,
                        2,
                        3,
                        4], d.pid, b);
                    case 'city':
                        return e([2,
                        3,
                        4], d.cid, b);
                    case 'district':
                        return e([3,
                        4], d.did, b);
                    case 'street':
                        return e([4], d.sid, b)
                    }
                },
                setArea: function (b) {
                    this.data.areaLevel = b && b.areaLevel || this.data.areaLevel;
                    this.data.varKey = b && b.varKey || this.data.varKey;
                    this.data.isNotDArea = b && b.isNotDArea || this.data.isNotDArea;
                    b = this.getArea();
                    $.Var.set(this.data.varKey, b)
                }
            }
        },
        {
        }
    ],
    2: [
        function (g, h, m) {
            document.domain = /\.vipglobal\.hk$/.test(window.location.hostname) ? 'vipglobal.hk' :
            /\.vipshopyao\.com$/.test(window.location.hostname) ? 'vipshopyao.com' : 'vip.com';
            var b = g('./modules/header/WhChooseMod.js'),
            a = g('./modules/header/headInfo.js');
            h = g('./modules/header/CartMod.js');
            var e = g('./modules/header/UnpayTipMod.js'),
            c = g('./modules/header/PrePayMod.js'),
            d = g('./modules/header/navMoreMod.js'),
            f = g('./modules/header/signin/index.js'),
            k = g('./modules/header/search/index.js'),
            n = g('../plugins/modules/FakeA/index.js'),
            l = window.VIPTE || {
            };
            l.nsCart = window.nsCart = h;
            l.nsHead = {
                init: function () {
                    a.init()
                }
            };
            l.nsWhChoose = {
                init: function () {
                    b.init({
                        whChangeJump: !1
                    })
                }
            };
            l.nsUnpayOrder = {
                init: function () {
                    'undefined' != typeof l && e.init()
                }
            };
            l.nsPrePay = {
                init: function () {
                    c.init()
                }
            };
            l.nsDopLogo = {
                init: function () {
                    this.changeLogo()
                },
                changeLogo: function () {
                    var a = [
                        '#J-vipLogo',
                        '.J-service-img'
                    ],
                    f;
                    for (f = 0; f < a.length; f++) '' !== $(a[f]) .attr('data-original') && $(a[f]) .attr('src', $(a[f]) .attr('data-original'));
                    '' !== $('#J-vipLogo') .attr('data-original') && $('#J-head-inner-def') .removeClass('head-inner-def');
                    $('#J_main_nav_link') .find('.J-link-front-icon') .each(function () {
                        var a =
                        $(this);
                        '' !== a.attr('data-original') && a.attr('src', a.attr('data-original'))
                    })
                }
            };
            l.nsSignin = {
                init: function () {
                    f.init()
                }
            };
            l.nsSearch = {
                init: function () {
                    k.init({
                        warehouse: $.Cookie.get('warehouse'),
                        commonSwitch: $.Var.get('searchCommonSwitch'),
                        placeholderSuggestWord: $.Var.get('searchPlaceholderSuggestWord')
                    })
                }
            };
            $(function () {
                d.init();
                n.init();
                $.Listeners.sub('ready.second') .onsuccess(function () {
                    l.nsDopLogo.init();
                    VIPSHOP.member.chk();
                    l.nsCart.init();
                    l.nsHead.init();
                    l.nsSignin.init();
                    0 < $('#J-search') .length &&
                    l.nsSearch.init()
                });
                $.Listeners.sub('ready.third') .onsuccess(function () {
                    l.nsUnpayOrder.init();
                    l.nsPrePay.init();
                    navigator.cookieEnabled && l.nsWhChoose.init()
                })
            })
        },
        {
            '../plugins/modules/FakeA/index.js': 20,
            './modules/header/CartMod.js': 4,
            './modules/header/PrePayMod.js': 5,
            './modules/header/UnpayTipMod.js': 6,
            './modules/header/WhChooseMod.js': 7,
            './modules/header/headInfo.js': 12,
            './modules/header/navMoreMod.js': 13,
            './modules/header/search/index.js': 14,
            './modules/header/signin/index.js': 17
        }
    ],
    3: [
        function (g, h, m) {
            var b = {
                url: VIPSHOP.cartHost + '/cart.php',
                events: {
                    askSuccess: 'cart.askInfo.success',
                    askFail: 'cart.askInfo.fail',
                    askLogin: 'cart.ask.login'
                },
                getScript: function (a, e) {
                    var c = {
                    };
                    e = 0;
                    for (var d in a) c[d] = a[d];
                    switch (e) {
                    case 1:
                        this.url = VIPSHOP.cartHost + '/getCartList.php';
                        break;
                    default:
                        this.url = this.url
                    }
                    $.ajax({
                        url: this.url,
                        data: c,
                        dataType: 'jsonp',
                        timeout: 6000,
                        success: function (a) {
                            var c = b.events.askSuccess;
                            if (1 == a.result && e) switch (a.code) {
                            case 200:
                                c = b.events.askSuccess;
                                break;
                            default:
                                c = b.events.askFail
                            }
                            - 1 ==
                            a.result && (c = b.events.askLogin);
                            $.Listeners.pub(c) .success(a)
                        },
                        error: function () {
                            $.Listeners.pub(b.events.askFail) .success()
                        }
                    })
                }
            };
            h.exports = b
        },
        {
        }
    ],
    4: [
        function (g, h, m) {
            g('./browserMod.js');
            var b = g('../../../bo/address/nsArea.js'),
            a = g('./Cart.js');
            g = VIPSHOP.core3 ? VIPSHOP.Detect.mobile : VIPSHOP.isMobile;
            var e = /\.vipglobal\.hk$/.test(window.location.hostname);
            m = /\.vipshopyao\.com$/.test(window.location.hostname);
            var c = e ? 'vipglobal.hk' : m ? 'vipshopyao.com' : 'vip.com',
            d = {
                guest_user: !1,
                cartCount: 0,
                skuCount: 0,
                endTime: 0,
                interval: null,
                cartTimeTipsShow: !1,
                defCartTip: $('#J_headCartList_wrap') .html(),
                hasAsidebar: !1,
                left5Mark: !1,
                left3Mark: !1,
                isTimeout: !0,
                rcabtCookie: parseInt(VIPSHOP.Member.parseCookie() .rcabt) || 0,
                data: {
                    SHOPPING_BAG_TEXT: '购物袋',
                    apiStatus: ''
                },
                UI: {
                    cartContainer: '#J_head_cart',
                    cartHeaderText: '#J-mycartText',
                    cartHeaderCountdown: '.J_cart_countDowncart',
                    cartBodyCountdown: '.J_cart_countDown'
                },
                status: {
                    cartHaveGoods: 'cart-have-goods',
                    cartHover: 'head-cart-mouseon'
                },
                isNewCart: function () {
                    return 0
                },
                cartEndTime: '',
                init: function () {
                    var a = $('#J_headCartList_wrap'),
                    b = this.freeReg();
                    window.nsCart = this;
                    this.subEvent();
                    this.bindEvent();
                    this.loadScript();
                    this.guest_user = !!$.Cookie.get('Guest_ID');
                    this.addEvent();
                    $.Listeners.pub('cart.init') .success();
                    if (!b && !$.Cookie.get('VipLID')) return a.html($('#J_headCartUnLogin_tmp') .html()),
                    !1;
                    this.hasAsidebar = $('#J_asideBar') .length;
                    this.defCartTip = a.html();
                    this.render()
                },
                bindEvent: function () {
                    $(document) .on('mouseenter', '.J_headCart_tooltips', function () {
                        $(this) .addClass('z-ui-tooltips-in')
                    }) .on('mouseleave', '.J_headCart_tooltips', function () {
                        $(this) .removeClass('z-ui-tooltips-in')
                    })
                },
                subEvent: function () {
                    var f = this;
                    $.Listeners.sub('cart.init', 'cart.exists') .onsuccess(function () {
                        var a = !0 === VIPSHOP.core3 ? VIPSHOP.Time.fn_countDown(f.endTime)  : fn_CountDown(f.endTime);
                        if ('0' != a.sec || '0' != a.min) clearInterval(f.interval),
                        f.interval = setInterval(f.countDown, 1000);
                        f.setCartCount(f.cartCount);
                        $.Listeners.pub('cart.init') .error()
                    });
                    $.Listeners.sub('cart.askInfo.success') .onsuccess(function (a) {
                        f.isNewCart() ? (a.data.endTime ?
                        f.cartEndTime = a.data.endTime : a.data.endTime = f.cartEndTime, $.crossStorage.set('cartInfoLS', a))  : $.crossStorage.set('cartInfoLS', '');
                        a = f.cartRtnDataHandle(a);
                        f.cb && f.cb(a);
                        f.getDataCb(a);
                        f.isTimeout = !0;
                        f.renderCb(a);
                        $.Listeners.pub('cart.askInfo.init.success') .success(a);
                        $.Listeners.pub('cartData.toGet.success') .success(a)
                    });
                    $.Listeners.sub('cart.askInfo.fail') .onsuccess(function () {
                        f.data.apiStatus = 'done'
                    });
                    $.Listeners.sub('cart.ask.login') .onsuccess(function () {
                        $.Cookie.del('VipLID', c, '/');
                        f.resetDefault();
                        f.data.apiStatus = 'done'
                    });
                    $.Listeners.sub('cart.askInfo.init.success') .onsuccess(function () {
                        f.cb = null
                    });
                    $.Listeners.sub('cart.empty') .onsuccess(function (a) {
                        f.freeReg();
                        f.endTime = 0;
                        $('#J_headCartList_wrap') .html(f.defCartTip);
                        '' !== a.yaoNum && ($('#J-head-cart-yao-num') .html(a.yaoNum), $('#J-head-cart-yao') .removeClass('hidden'));
                        $.Listeners.pub('cart.reset.success') .success({
                            num: 0,
                            open: !1
                        })
                    });
                    $.Listeners.sub('cart.reset.success') .onsuccess(function (a) {
                        a.open || ($('#J_skuCount') .html('0'), $(f.UI.cartContainer) .removeClass(f.status.cartHaveGoods), $(f.UI.cartHeaderText) .html(f.data.SHOPPING_BAG_TEXT))
                    });
                    $.Listeners.sub('askCartInfo') .onsuccess(function () {
                        var b = f.isNewCart();
                        a.getScript({
                            isGetLast: 1
                        }, b)
                    });
                    $.Listeners.sub('headCart.getScript.cartData') .onsuccess(function (a) {
                        d.get(a.cb, {
                            isGetLast: 1
                        })
                    });
                    $.Listeners.sub('headCart.render.data') .onsuccess(function (a) {
                        d.renderCb(a.cartData)
                    });
                    $.Listeners.sub('getStorageCartData') .onsuccess(function (a) {
                        f.isNewCart() && a && (a = f.cartRtnDataHandle(a), $('#J_head_cart_num') .html() != a.cartList.sku_count ? f.renderCb(a)  :
                        $.Listeners.pub('cart.exists') .success())
                    });
                    $.Listeners.sub('openCartClose') .onsuccess(function () {
                        $('#J_headCartList_wrap') .remove();
                        $('#J_skuCount_container') .hide()
                    });
                    $.Listeners.sub('cartCrossStorageReady') .onsuccess(function () {
                        f.configCartCrossStorage.isCartData && f.configCartCrossStorage.isInfoLS && f.configCartCrossStorage.isDate && (f.crossOpen = !0, $.Listeners.pub('checkCartIsAskCart') .success(), f.resetStorageCart())
                    });
                    $.Listeners.sub('checkCartIsAskCart') .onsuccess(function () {
                        var a = f.configCartCrossStorage.cartData,
                        b = f.configCartCrossStorage.cartInfoLS,
                        c = f.configCartCrossStorage.cartDate,
                        d = $.Cookie.get('VipCI_te'),
                        g = $.Cookie.get('vip_wh'),
                        h = $.Cookie.get('login_username') .replace('@', '---'),
                        m = $.Cookie.get('VIPGuest_ID'),
                        p = $.Cookie.get('VipLID'),
                        q = f.isNewCart(),
                        r = (new Date) .getDate(),
                        s = f.freeReg();
                        q && !b ? $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })  : m && p ? $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })  : a ? e || d && a.key != d ? $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })  : a.whKey !=
                        g ? $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })  : s || a.login_username == h ? c && c != r ? $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })  : $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !0
                        })  : $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })  : $.Listeners.pub('getCartDataIsStorage') .success({
                            isAsk: !1
                        })
                    });
                    $.Listeners.sub('getCartDataIsStorage') .onsuccess(function (b) {
                        var e = f.configCartCrossStorage.cartData,
                        c = f.configCartCrossStorage.cartInfoLS,
                        d = f.configCartCrossStorage.cartDate,
                        g = (new Date) .getDate(),
                        h = f.isNewCart();
                        b.isAsk ? (f.cb_bag(e), $.Listeners.pub('getCartData') .success(e), $.Listeners.unsub('getCartData') .success(), e.cartInfo.end_time != f.endTime && (f.endTime = e.cartInfo.end_time), $.Listeners.pub('getStorageCartData') .success(c), $.Listeners.pub('cartData.toGet.success') .success(e))  : (d != g && $.crossStorage.set('cartDate', g), 'loading' != f.data.apiStatus && (f.data.apiStatus = 'loading', a.getScript(f.paramObj_bag, h), f.cb = f.cb_bag))
                    })
                },
                freeReg: function () {
                    var a = VIPSHOP.Member.parseCookie();
                    return 'a' !== a.luc || 1 != a.p2 || $.Cookie.get('VipRUID') || '0' === $.Cookie.get('VIPGuest_ID') ? !1 : !0
                },
                loadScript: function () {
                    var a = this;
                    $.Loader.advScript({
                        name: 'scrollbar',
                        url: VIPSHOP.shopStaticJs + '/plugins/perfect-scrollbar-0.4.8.with-mousewheel.min.js?' + VIPSHOP.jsVer
                    }, {
                        name: 'cartLoadSb',
                        def: function () {
                            a.scriptLoaded()
                        },
                        requires: [
                            'scrollbar'
                        ]
                    })
                },
                hasScrollbar: !1,
                cartListShow: $.noop,
                cartListUpdate: $.noop,
                cartListRemove: $.noop,
                scriptLoaded: function () {
                    function a(e) {
                        return function () {
                            var a = document.getElementById('J-cartList');
                            e(a, b.hasScrollbar)
                        }
                    }
                    var b = this;
                    b.cartListShow = a(function (a, e) {
                        a && (!e && $(a) .css({
                            overflow: 'hidden',
                            position: 'relative'
                        }) .perfectScrollbar(), b.hasScrollbar = !0)
                    });
                    b.cartListUpdate = a(function (a, b) {
                        a && b && $(a) .perfectScrollbar('update')
                    });
                    b.cartListRemove = a(function (a, e) {
                        a && (e && $(a) .perfectScrollbar('destroy'), b.hasScrollbar = !1)
                    });
                    b.cartListShow()
                },
                addEvent: $.noop,
                toLogin: function () {
                    VIPSHOP.login.init()
                },
                render: $.noop,
                configCartCrossStorage: {
                    cartData: {
                    },
                    cartInfoLS: {
                    },
                    cartDate: '',
                    isCartData: !1,
                    isInfoLS: !1,
                    isDate: !1
                },
                resetStorageCart: function () {
                    this.configCartCrossStorage.isCartData = !1;
                    this.configCartCrossStorage.isInfoLS = !1;
                    this.configCartCrossStorage.isDate = !1
                },
                getCartCrossStorage: function () {
                    var a = this;
                    a.crossOpen = !1;
                    $.crossStorage.get('cartData', function (b) {
                        a.configCartCrossStorage.cartData = b;
                        a.configCartCrossStorage.isCartData = !0;
                        $.Listeners.pub('cartCrossStorageReady') .success()
                    });
                    $.crossStorage.get('cartInfoLS', function (b) {
                        a.configCartCrossStorage.cartInfoLS = b;
                        a.configCartCrossStorage.isInfoLS =
                        !0;
                        $.Listeners.pub('cartCrossStorageReady') .success()
                    });
                    $.crossStorage.get('cartDate', function (b) {
                        a.configCartCrossStorage.cartDate = b;
                        a.configCartCrossStorage.isDate = !0;
                        $.Listeners.pub('cartCrossStorageReady') .success()
                    })
                },
                crossOpen: !0,
                get: function (a, b) {
                    var e = {
                    },
                    e = this.freeReg();
                    if ('loading' != this.data.apiStatus && this.crossOpen) this.cb_bag = a,
                    this.paramObj_bag = b;
                     else $.Listeners.sub('getCartData') .onsuccess(a);
                    VIPSHOP.openCartApi && (e || $.Cookie.get('VipLID')) ? this.getCartCrossStorage()  : (e = {
                        cartInfo: {
                            end_time: '0',
                            jit_type: 0,
                            num: 0,
                            has_supplier: 0,
                            hasPreSale: 0,
                            has_goods_left: !0,
                            count_limit: 10,
                            lifetime: 0,
                            warehouse: ''
                        },
                        cartList: {
                            count: 0,
                            sku_count: 0,
                            total: 987,
                            items: [
                                {
                                }
                            ]
                        },
                        key: '0|0',
                        login_username: ''
                    }, a(e), $.Listeners.pub('getCartData') .success(e), $.Listeners.unsub('getCartData') .success())
                },
                getDataCb: function (a) {
                    d.data.apiStatus = 'done';
                    if (a) {
                        var b = $.Cookie.get('VipCI_te'),
                        e = $.Cookie.get('login_username') .replace('@', '---'),
                        l = $.Cookie.get('vip_wh');
                        a.key = b;
                        a.login_username = e;
                        a.whKey = l;
                        - 1 != a.result && ($.crossStorage.set('cartData', a, 180, function () {
                        }), $.Cookie.set('VipCI_te', b, c, '/', 0));
                        $.Listeners.pub('getCartData') .success(a);
                        $.Listeners.unsub('getCartData') .success()
                    }
                },
                cartRtnDataHandle: function (a) {
                    var b = {
                    };
                    switch (this.isNewCart()) {
                    case 1:
                        b = this.sidebarOuterData(a.data);
                        break;
                    default:
                        b = this.cartDataProcess(a)
                    }
                    return b
                },
                cartDataProcess: function (a) {
                    var e = a.cartList.unAvailableItems,
                    c = '';
                    b.setArea({
                        areaLevel: a.cartList.areaLevel || 1,
                        isNotDArea: 1
                    });
                    c = $.Var.get('cartGlobalArea') .areaName || '';
                    if (a.cartList && e && e.length) {
                        a.cartList.isUnAvailable =
                        a.cartList.items && 0 == a.cartList.items.length ? {
                            sidebarUnbuy: 'unbuy-cart-tips-noproduct-box',
                            headerUnbuy: 'list-unbuy-team-tips-noproduct-box'
                        }
                         : [
                            '1'
                        ];
                        for (var d = 0, g = e.length; d < g; d++) e[d].province_name = c,
                        e[d].noStock_province_name = this.cutterString(c, 4),
                        e[d].sb_noStock_province_name = this.cutterString(c, 8)
                    }
                    a.cartList && a.cartList.items && 0 == a.cartList.items.length && (a.cartList.itemsHide = 'hidden');
                    a.cartList.province_name = c;
                    a.cartList.delivery_province_name = this.areaNameProcess(c, 11);
                    a.cartList.sb_delivery_province_name =
                    this.areaNameProcess(c, 6);
                    return a
                },
                areaNameProcess: function (a, b) {
                    return a ? '配送至' + this.cutterString(a, b)  : ''
                },
                cutterString: function (a, b) {
                    return a.length > b ? a.substr(0, b - 1) + '...' : a
                },
                sidebarOuterData: function (a) {
                    var b = {
                    };
                    a.endTime ? this.cartEndTime = b.end_time = a.endTime : b.end_time = this.cartEndTime;
                    var e = {
                    };
                    e.count = a.cartList.count;
                    e.sku_count = a.cartList.sku_count;
                    e.total = a.cartList.total;
                    var c = [
                    ];
                    $.each(a.cartList.supplier_list, function (a, b) {
                        b && b.groups && $.each(b.groups, function (a, b) {
                            $.each(b.goods_list, function (a, b) {
                                c.push(b)
                            })
                        });
                        b && b.gift && $.each(b.gift, function (a, b) {
                            c.push(b)
                        })
                    });
                    e.items = c;
                    return {
                        cartInfo: b,
                        cartList: e
                    }
                },
                reset: function () {
                    $.crossStorage.set('cartData', {
                    }, 0, function () {
                    });
                    this.render();
                    return this
                },
                setCartCount: function (a) {
                    0 < a ? ($('.J_cartCount') .html(this.cartCount), $('#J_skuCount') .html(this.skuCount), $('#J_topCartCount') .addClass('top_bag') .find('span') .html('(' + this.cartCount + ')'), !this.hasAsidebar && $('.J_cart_count') .html(this.cartCount) .show())  : (this.cartListRemove(), $('#J_headCartList_wrap') .html(d.defCartTip), $('#J_topCartCount') .removeClass('top_bag') .find('span') .html('(0)'));
                    return this
                },
                resetDefault: function () {
                    var a = $('#J_headCartList_wrap');
                    $('#J_skuCount') .html('0');
                    a.html($('#J_headCartUnLogin_tmp') .html());
                    $.Listeners.pub('cart.reset.success') .success({
                        num: 0,
                        open: !1
                    });
                    this.isTimeout = !0
                },
                countDown: function (a) {
                    a = d;
                    var b = !0 === VIPSHOP.core3 ? VIPSHOP.Time.fn_countDown(a.endTime)  : fn_CountDown(a.endTime),
                    e = 5 > b.min ? '<b>! </b>' : '';
                    $('#J_head_cart_title');
                    !a.left5Mark && 5 > b.min && (a.left5Mark = !0);
                    $('.J_cartCountdown') .html(e +
                    b.min + '分' + b.sec + '秒');
                    a.left3Mark || '02' != b.min || ($.Listeners.pub('cart.timeshort') .success({
                        left: 3
                    }), a.left3Mark = !0);
                    '0' == b.sec && '0' == b.min ? ($.Listeners.pub('cart.timeout') .success({
                        left: - 1
                    }), a.isTimeout = !0, clearInterval(a.interval), $(a.UI.cartHeaderText) .html(a.data.SHOPPING_BAG_TEXT), $(a.UI.cartContainer) .removeClass(a.status.cartHaveGoods))  : a.hasAsidebar ? a.barCountdown(b)  : ($(a.UI.cartHeaderCountdown) .html(b.min + ':' + b.sec + ''), $(a.UI.cartBodyCountdown) .html(b.min + '分' + b.sec + '秒'), $(a.UI.cartContainer) .addClass(a.status.cartHaveGoods));
                    return this
                },
                barCountdown: function (a) {
                    (function () {
                        for (var a = document.createElement('div') .style, b = [
                            't',
                            'webkitT',
                            'MozT',
                            'msT',
                            'OT'
                        ], e, c = 0; e = b[c++]; ) if (e += 'ransform', e in a) return !0;
                        return !1
                    }) () ? ($('#J_aside_cart') .find('a') .eq(0) .after($('#J_barRoundCountdown_tmp') .html()), d.barCountdown = function (a) {
                        a = parseInt(3 * (1200 - (60 * + a.min + + a.sec)) / 10);
                        180 < a ? ($('#J_rightSector') .css({
                            transform: 'rotate(180deg)',
                            '-moz-transform': 'rotate(180deg)',
                            '-webkit-transform': 'rotate(180deg)'
                        }), $('#J_leftSector') .css({
                            transform: 'rotate(' + (a - 180) + 'deg)',
                            '-moz-transform': 'rotate(' + (a - 180) + 'deg)',
                            '-webkit-transform': 'rotate(' + (a - 180) + 'deg)'
                        }))  : $('#J_rightSector') .css({
                            transform: 'rotate(' + a + 'deg)',
                            '-moz-transform': 'rotate(' + a + 'deg)',
                            '-webkit-transform': 'rotate(' + a + 'deg)'
                        })
                    })  : ($('#J_aside_cart') .find('a') .eq(0) .after($('#J_barFontCountdown_tmp') .html()), d.barCountdown = function (a) {
                        $('#J_barCountdown_min') .html(a.min);
                        $('#J_barCountdown_sec') .html(a.sec)
                    });
                    d.barCountdown(a)
                }
            };
            g ? (d.addEvent = function () {
                var a =
                this,
                b = a.freeReg();
                $('#J_head_cart') .on('click', function (e) {
                    e.preventDefault();
                    b || $.Cookie.get('VipLID') ? a.showCartDialog()  : a.toLogin()
                })
            }, d.showCartDialog = function () {
                var a = this,
                b = '';
                a.get(function (e) {
                    if (e.cartList && e.cartList.count) a.cartCount = e.cartList.count,
                    a.skuCount = e.cartList.sku_count,
                    a.endTime = e.cartInfo.end_time,
                    b = $.Template({
                        templateElement: $('#J_cartList_template'),
                        replace: null
                    }) .process(e),
                    $.Listeners.pub('cart.exists') .success({
                        num: e.cartList.count
                    });
                     else {
                        var c = '';
                        e.cartYaoInfo && 0 <=
                        e.cartYaoInfo.num && (c = e.cartYaoInfo.num);
                        $.Listeners.pub('cart.empty') .success({
                            yaoNum: c
                        });
                        b = $('#J_headCartList_wrap') .html()
                    }
                    VIPSHOP.core3 ? $.Dialog({
                        model: !0,
                        size: [
                            '272px'
                        ],
                        custom: !0,
                        customStyle: !0,
                        content: b,
                        clickMaskClose: !0,
                        showEvent: function () {
                            a.cartListShow()
                        },
                        closeEvent: function () {
                            clearInterval(a.interval);
                            a.cartListRemove();
                            this.destroy()
                        }
                    }) .open()  : $.Dialog({
                        model: !0,
                        size: [
                            '272px'
                        ],
                        opacity: 0.6,
                        content: b,
                        showEvent: function () {
                            function a() {
                                $('#_diaBackground') .off('click.MobileDialog');
                                b.close();
                                clearInterval(b.interval);
                                b.cartListRemove();
                                this.destroy()
                            }
                            var b = this;
                            $('#_diaBackground') .on('click.MobileDialog', function () {
                                a()
                            })
                        }
                    }) .open()
                })
            }, d.render = function () {
                this.get(d.renderCb, {
                    isGetLast: 1
                })
            }, d.renderCb = function (a) {
                a && a.cartList && a.cartList.count && (d.skuCount = a.cartList.sku_count, d.setCartCount(d.cartCount = a.cartList.count))
            })  : (d.addEvent = function () {
                var a = this;
                $('#J_head_cart') .on({
                    mouseenter: function () {
                        $('#J_headCartList_wrap');
                        var b = a.freeReg();
                        $(this) .addClass(a.status.cartHover);
                        b ||
                        $.Cookie.get('VipLID') ? a.render()  : $.Cookie.get('VipLID') || a.resetDefault()
                    },
                    mouseleave: function () {
                        $(this) .removeClass(a.status.cartHover)
                    }
                })
            }, d.render = function () {
                d.get(d.renderCb, {
                    isGetLast: 1
                })
            }, d.renderCb = function (a) {
                var b = d;
                if (a.cartList && a.cartList.count) if (b.isTimeout || b.timeOpen != a.cartInfo.end_time || b.productOpen != a.cartList.sku_count) {
                    b.isTimeout = !1;
                    b.cartCount = a.cartList.count;
                    b.productOpen = b.skuCount = a.cartList.sku_count;
                    b.timeOpen = b.endTime = a.cartInfo.end_time;
                    var e = !0 === VIPSHOP.core3 ? VIPSHOP.Time.fn_countDown(b.endTime)  :
                    fn_CountDown(b.endTime);
                    '0' == e.sec && '0' == e.min ? (a.timeout = [
                        '1'
                    ], a.noTimeout = [
                    ])  : (a.timeout = [
                    ], a.noTimeout = [
                        '1'
                    ]);
                    e = '';
                    a.cartYaoInfo && 0 <= a.cartYaoInfo.num && (e = a.cartYaoInfo.num);
                    a.cartList.cartYaoNum = e;
                    $('#J_headCartList_wrap') .Template({
                        templateElement: $('#J_cartList_template'),
                        replace: !0
                    }) .Template('process', a);
                    '' !== e && $('#J-head-cart-yao') .removeClass('hidden');
                    b.hasScrollbar = !1;
                    b.cartListShow();
                    b.hasAsidebar || $('#J_sidebar_carSection') .Template({
                        templateElement: $('#J_sidebar_car_template'),
                        replace: !0
                    }) .Template('process', a);
                    4 < a.cartList.count && ($('#J_headCartList_wrap') .find('ul') .addClass('list_team_cn'), b.hasAsidebar || $('#J_sidebar_carSection') .find('ul') .addClass('cs_list_over'));
                    $.Listeners.pub('cart.exists') .success({
                        num: a.cartList.count
                    });
                    $.Listeners.pub('cart.reset.success') .success({
                        num: a.cartList.sku_count,
                        open: !0
                    })
                } else b.cartListUpdate();
                 else e = '',
                a.cartYaoInfo && 0 <= a.cartYaoInfo.num && (e = a.cartYaoInfo.num),
                $.Listeners.pub('cart.empty') .success({
                    yaoNum: e
                })
            });
            h.exports = d
        },
        {
            '../../../bo/address/nsArea.js': 1,
            './Cart.js': 3,
            './browserMod.js': 11
        }
    ],
    5: [
        function (g, h, m) {
            h.exports = {
                openOrderPrePayApi: window.openOrderPrePayApi,
                data: {
                    prePayListApiGensvr: '//gensvr.vip.com/order/getPresellToPayLastInfo'
                },
                init: function () {
                    var b = this;
                    if ($.Cookie.get('VipLID')) {
                        var a = $.Storage.get(b.getStorageName()) .split('|@|') [1];
                        'undefined' != typeof a && '' != a ? $.Listeners.pub('vip_prePayList') .success({
                            code: 200,
                            msg: '执行成功',
                            data: $.parseJSON(a)
                        })  : this.getData()
                    }
                    $.Listeners.sub('vip_prePayList_check') .onsuccess(function (a) {
                        b.check(a.timeList)
                    })
                },
                getStorageName: function () {
                    return 'vip_prePayList' + $.Cookie.get('VipLID') .replace(/\|/g, '_')
                },
                getData: function () {
                    var b = this;
                    if ('1' != this.openOrderPrePayApi) return !1;
                    $.ajax({
                        url: b.data.prePayListApiGensvr,
                        dataType: 'jsonp',
                        jsonp: 'callback',
                        jsonpCallback: 'getPayList',
                        timeout: 6000,
                        success: function (a) {
                            if (200 == a.code) {
                                var e = (new Date) .valueOf();
                                a.data && 0 < a.data.length ? $.Storage.set(b.getStorageName(), e + '|@|' + $.stringifyJSON(a.data), 86400)  : $.Storage.set(b.getStorageName(), e + '|@|' + $.stringifyJSON(a.data), 600)
                            }
                            $.Listeners.pub('vip_prePayList') .success(a)
                        },
                        error: function () {
                            VIPSHOP.log('vip_prePayList_error')
                        }
                    })
                },
                check: function (b) {
                    if (!$.Cookie.get('VipLID')) return !1;
                    var a = 1 * $.Storage.get(this.getStorageName()) .split('|@|') [0],
                    e = (new Date) .valueOf();
                    if (0 == a) return this.getData(),
                    !0;
                    for (var a = 0, c = b.length; a < c; a++) if (1 * b[a] < e) {
                        this.getData();
                        break
                    }
                }
            }
        },
        {
        }
    ],
    6: [
        function (g, h, m) {
            h.exports = {
                init: function () {
                    VIPSHOP.unpaid_orders && VIPSHOP.member && VIPSHOP.member.info && VIPSHOP.member.info.account && this.checkData()
                },
                checkData: function () {
                    var b = this;
                    $.ajax({
                        url: '//gensvr.vip.com/order/getUnpayOrder',
                        dataType: 'jsonp',
                        timeout: 6000,
                        success: function (a) {
                            VIPSHOP.unpayOrderData = a;
                            b.showTips(a)
                        }
                    })
                },
                showTips: function (b) {
                    if (b.data && 0 < b.data.unpayCount) {
                        var a = b.data;
                        b = $.Cookie.get('VipRUID');
                        var e = $.Storage.get('unpayOrderId-' + b) .split(','),
                        c = $.Storage.get('unpayTipDate');
                        b = $.Cookie.get('VipRUID');
                        for (var d = new Date, f = d.getMonth(), d = d.getDate(), f = [
                            f,
                            d
                        ].join(''), d = 0, k = a.orderList.length; d < k; d++) if ( - 1 == $.inArray(a.orderList[d] + '', e)) {
                            $.Storage.set('unpayOrderId-' + b, a.orderList.join(','));
                            $.Storage.set('hasCloseTip-' +
                            b, 0);
                            break
                        }
                        if ('1' != $.Storage.get('hasCloseTip-' + b) || c[b] != f) $.Listeners.pub('header.get.payTip') .success({
                            num: a.unpayCount
                        }),
                        a = 'object' == $.type(c) ? c : {
                        },
                        a[b] = f,
                        $.Storage.set('unpayTipDate', a),
                        $.Storage.set('hasCloseTip-' + b, 1)
                    }
                }
            }
        },
        {
        }
    ],
    7: [
        function (g, h, m) {
            m = g('./address/index');
            var b = g('../../../shop/addressCookie'),
            a = {
                sucWin: null,
                nsWhChangeFlag: 1,
                reloadIng: !1,
                addressNameArr: [
                    'province',
                    'city',
                    'country',
                    'street'
                ],
                isAreaSwitch: VIPSHOP.isAreaSwitch || 1,
                isDetail: 0,
                init: function (b) {
                    a.options = b;
                    this.showProvince();
                    this.checkDetail();
                    this.checkCookieType();
                    this.subEvents()
                },
                subEvents: function () {
                    var a = this;
                    $.Listeners.sub('whChange') .onsuccess(function (b) {
                        1 == a.nsWhChangeFlag && a.relevanceAjax(b.data.lastWh, b.data.selectWh, 1)
                    });
                    $.Listeners.sub('address.item.click') .onsuccess(function (b) {
                        var d = b.id;
                        b = b.wh;
                        d && b && a.changeArea(d, b, 'header')
                    });
                    $.Listeners.sub('get.merchandise.relevance') .onsuccess(function (b) {
                        var d = a.addressNameArr[a.isAreaSwitch - 1];
                        a.detailData = b;
                        $.Listeners.pub('header.address.wh') .success({
                            id: b[d],
                            typeName: d,
                            from: 'detail'
                        })
                    });
                    $.Listeners.sub('header.address.wh.detail') .onsuccess(function (b) {
                        var d = b.id;
                        b = b.wh;
                        d && b && a.changeArea(d, b, 'detail')
                    })
                },
                showProvince: function () {
                    var a = this,
                    c = b.get();
                    c ? $.Listeners.pub('header.address.initial') .success(c)  : $.ajax({
                        url: '//pcapi.vip.com/warehouse/index.php',
                        data: {
                            writecookie: 1
                        },
                        dataType: 'jsonp',
                        jsonpCallback: 'writeWhCookie',
                        timeout: 6000,
                        success: function (b) {
                            a._showProvince(b)
                        },
                        error: function () {
                            VIPSHOP.log('接口异常warehouse')
                        }
                    })
                },
                checkDetail: function () {
                    'detail.vip.com' ==
                    window.location.hostname && (this.isDetail = 1)
                },
                _showProvince: function (a) {
                    var c = b.get();
                    if (!c || a) $.Cookie.get('vip_province') && (c = {
                        pname: $.Cookie.get('vip_province_name'),
                        pid: $.Cookie.get('vip_province')
                    }),
                    c && $.Listeners.pub('header.address.initial') .success(c)
                },
                changeArea: function (a, c, d) {
                    var f = $.Cookie.get('vip_wh'),
                    k = $('#J_header_selected_html') .data('storageId');
                    this.nsWhChangeFlag = 0;
                    if (a != k) $.crossStorage.get('cartData', function (a) {
                        $.crossStorage.set('cartData', {
                        }, 0, function () {
                        })
                    }),
                    b.set(d, c),
                    this.relevanceAjax(f, c, 0);
                     else if (this.isDetail && this.detailData) for (a = this.addressNameArr.length - 1; 0 <= a; a--) if (this.detailData[this.addressNameArr[a] + 'Name']) {
                        $.crossStorage.get('cartData', function (a) {
                            $.crossStorage.set('cartData', {
                            }, 0, function () {
                            })
                        });
                        b.set(d);
                        setTimeout(function () {
                            window.location.reload()
                        }, 2000);
                        break
                    }
                },
                getUrlParam: function (a) {
                    a = RegExp('[?&]' + a + '=([^&]+)', 'g') .exec(document.location.search);
                    var b = null;
                    if (null != a) try {
                        b = decodeURIComponent(decodeURIComponent(a[1]))
                    } catch (d) {
                        try {
                            b = decodeURIComponent(a[1])
                        } catch (f) {
                            b =
                            a[1]
                        }
                    }
                    return b
                },
                relevanceAjax: function (a, b) {
                    var d = this,
                    f = '',
                    k = '';
                    $('form') .find('[name=size_id]') .val();
                    'undefined' != typeof brand ? f = brand.id : window.PG && 'undefined' != typeof window.PG && (f = window.PG.brand.id);
                    window.PG && 'undefined' != typeof window.PG.product && (k = window.PG.product.id);
                    relevaceFlag && 'undefined' != typeof In_warehouse && !In_warehouse[b] && a != b && I_pageType && 2 == I_pageType ? $.ajax({
                        url: '//detail.vip.com/detail-ajax.php',
                        data: {
                            act: 'getRelateGoodsUrl',
                            brand_id: f,
                            mid: k,
                            wh: a,
                            to_wh: b,
                            host: window.location.host,
                            preview: d.getUrlParam('preview'),
                            token: d.getUrlParam('token')
                        },
                        dataType: 'jsonp',
                        jsonpCallback: 'relevanceAjax',
                        timeout: 6000,
                        success: function (a) {
                            200 == a.code ? (d.switchPop(), VIPSHOP.log(a), setTimeout(function () {
                                location.href = a.redirect
                            }, 1500))  : 403 == a.code ? setTimeout(function () {
                                location.href = a.redirect
                            }, 1500)  : setTimeout(function () {
                                location.href = location.href
                            }, 1500)
                        },
                        error: function () {
                            VIPSHOP.log('商品关联接口调用失败')
                        }
                    })  : (d.switchPop(), setTimeout(function () {
                        window.location.reload()
                    }, 2000))
                },
                switchPop: function (a) {
                    var c = this;
                    if (!c.sucWin) {
                        var d = {
                            content: $('#J_selectAreaNoCart_tmp'),
                            model: !0,
                            showEvent: function () {
                                var d = a || b.get(2);
                                $('.J_selectProvince_name') .html(d);
                                setTimeout(function () {
                                    c.sucWin.close()
                                }, 3000)
                            }
                        };
                        !0 === VIPSHOP.core3 && (d.custom = !0, d.size = 'small');
                        c.sucWin = $.Dialog(d)
                    }(a || b.get(2)) && c.sucWin.open()
                },
                checkCookieType: function () {
                    var a = this,
                    c = $.Cookie.get('vip_wh'),
                    d = b.get(1),
                    f = b.get();
                    'undefined' != typeof relevanceHeaderFlag && relevanceHeaderFlag && setInterval(function () {
                        var k =
                        $.Cookie.get('vip_wh');
                        if (b.get(1) != d) {
                            if ('' != c && '' != k && k != c) {
                                var g = {
                                };
                                g.lastWh = c;
                                g.selectWh = k;
                                $.Listeners.pub('whChange') .success({
                                    data: g
                                });
                                $.Listeners.unsub('whChange') .success()
                            } else a.reloadIng || (a.reloadIng = !0, a.switchPop(), setTimeout(function () {
                                window.location.reload()
                            }, 2000));
                            $.crossStorage.get('cartData', function (a) {
                                $.crossStorage.set('cartData', {
                                }, 0, function () {
                                })
                            })
                        } else a.isDetail && (k = b.get()) && (k = $.stringifyJSON(k), g = $.stringifyJSON(f), k == g || a.reloadIng || (a.reloadIng = !0, setTimeout(function () {
                            window.location.reload()
                        }, 2000)))
                    }, 1000)
                }
            };
            m.init();
            window.nsWhChange = a;
            h.exports = a
        },
        {
            '../../../shop/addressCookie': 24,
            './address/index': 8
        }
    ],
    8: [
        function (g, h, m) {
            var b = g('./model.js'),
            a = g('./view.js');
            h.exports = {
                init: function () {
                    b.init();
                    a.init()
                }
            }
        },
        {
            './model.js': 9,
            './view.js': 10
        }
    ],
    9: [
        function (g, h, m) {
            var b = g('../../../../plugins/modules/http/httpV2.js');
            h.exports = {
                init: function () {
                    this.subEvents()
                },
                subEvents: function () {
                    var a = this;
                    $.Listeners.sub('header.address.select') .onsuccess(function (b) {
                        var c = b.id,
                        d = b.typeName;
                        a.type = b.type;
                        a.getAddress(c, d)
                    });
                    $.Listeners.sub('header.address.wh') .onsuccess(function (b) {
                        a.getAddress(b.id, b.typeName, b.from)
                    })
                },
                getAddress: function (a, e, c) {
                    var d = this;
                    b({
                        url: '//gensvr-n.vip.com/address/address',
                        data: {
                            areaid: a,
                            newIsBind: 0
                        },
                        type: 'GET',
                        dataType: 'jsonp',
                        jsonpCallback: 'getAddress' + (new Date) .getTime(),
                        timeout: 8000,
                        cache: !0,
                        isCache: !0,
                        cacheKeys: [
                            'areaid'
                        ],
                        context: {
                            areaid: a,
                            typeName: e
                        },
                        successCallback: function (a) {
                            var b = a.list,
                            e = a.info,
                            g = this.context.typeName,
                            h = this.context.areaid;
                            c ? ('header' == c && $.Listeners.pub('header.address.wh.header') .success({
                                id: h,
                                wh: e.warehouse
                            }), 'detail' == c && $.Listeners.pub('header.address.wh.detail') .success({
                                id: h,
                                wh: e.warehouse
                            }))  : 1 >= b.length || $.Listeners.pub('header.address.get.success') .success({
                                data: a,
                                typeName: g,
                                type: d.type
                            })
                        },
                        errorCallback: function () {
                            VIPSHOP.log('地址接口请求失败')
                        }
                    })
                }
            }
        },
        {
            '../../../../plugins/modules/http/httpV2.js': 23
        }
    ],
    10: [
        function (g, h, m) {
            var b = g('../../../../shop/addressCookie');
            h.exports = {
                addressNameArr: [
                    'province',
                    'city',
                    'country',
                    'street'
                ],
                isAreaSwitch: VIPSHOP.isAreaSwitch ||
                1,
                init: function () {
                    this.bindEvents();
                    this.subEvents()
                },
                subEvents: function () {
                    var a = this;
                    $.Listeners.sub('header.address.get.success') .onsuccess(function (b) {
                        a.getAddressSuccess(b)
                    });
                    $.Listeners.sub('header.address.get.lastLevel') .onsuccess(function (b) {
                        a.handleLastAddress(b)
                    });
                    $.Listeners.sub('header.address.wh.header') .onsuccess(function (b) {
                        a.handleLastAddress(b)
                    });
                    $.Listeners.sub('header.address.initial') .onsuccess(function (b) {
                        a.initial(b)
                    })
                },
                bindEvents: function () {
                    var a = this;
                    $(document) .on('click', '#J_header_address_container', function () {
                        a.addressContainerClick()
                    });
                    $(document) .on('click', '.J_header_select_item', function (b) {
                        a.addressItemClick(this);
                        b.stopPropagation()
                    });
                    $(document) .on('click', '#J_header_area_close', function (b) {
                        a.resetCnt();
                        b.stopPropagation()
                    });
                    $(document) .on('click', function (b) {
                        b = $(b.target);
                        $('#J_header_address_container') .hasClass('is-h-area-expanded') && !$('#J_header_address_container') .has(b) .length && a.resetCnt()
                    });
                    $(document) .on('click', '.J_header_address_tab', function (b) {
                        a.addressTabClick(this);
                        b.stopPropagation()
                    })
                },
                initial: function (a) {
                    var e = '',
                    c = 0,
                    d = 0,
                    f = this.addressNameArr.slice(0, this.isAreaSwitch);
                    this.hasAnyAddress = !1;
                    $('#J_header_address_container') .removeClass('f-hide');
                    var k = b.get();
                    !k && a && (k = a);
                    if (k) {
                        a = 0;
                        for (var g = f.length; a < g; a++) {
                            var h = f[a];
                            switch (a) {
                            case 0:
                                e = k.pname;
                                c = k.pid;
                                d = 0;
                                break;
                            case 1:
                                e = k.cname;
                                c = k.cid;
                                d = k.pid;
                                break;
                            case 2:
                                e = k.dname;
                                c = k.did;
                                d = k.cid;
                                break;
                            case 3:
                                e = k.sname,
                                c = k.sid,
                                d = k.did
                            }
                            e && c && ($('#J_header_tab_' + h) .data('name', e) .data('typeName', h) .data('id', c) .data('prevId', d) .data('isAjax', ''), $('#J_header_selected_html') .html(e) .data('storageId', c))
                        }
                    }
                },
                addressContainerClick: function () {
                    $('#J_header_address_container') .addClass('is-h-area-expanded');
                    if (!this.hasAnyAddress) {
                        var a = this.addressNameArr[this.isAreaSwitch - 1],
                        b = $('#J_header_tab_' + a) .data('prevId');
                        void 0 == b && (a = this.addressNameArr[this.isAreaSwitch - 2], b = $('#J_header_tab_' + a) .data('prevId'));
                        $.Listeners.pub('header.address.select') .success({
                            id: b,
                            typeName: a,
                            type: 'open'
                        })
                    }
                },
                getAddressSuccess: function (a) {
                    var b =
                    a.data,
                    c = a.typeName,
                    d = $('#J_header_tab_' + c);
                    d.data('isAjax', 'done') .removeClass('f-hide') .addClass('is-h-area-tab-title-item-current') .siblings() .removeClass('is-h-area-tab-title-item-current');
                    d.prevAll() .removeClass('f-hide');
                    var f = $.Tpl('J_selectArea_list_tpl', b);
                    $('#J_header_' + c + '_container') .html(f) .removeClass('f-hide') .siblings() .addClass('f-hide');
                    d = d.data('id');
                    this.setItemSelect(c, d);
                    this.hasAnyAddress = !0;
                    1 == b.info.is_directly && 'city' == c && ('item' == a.type && $('#J_header_city_container') .find('.J_header_select_item') .trigger('click'), 2 < this.isAreaSwitch || $('#J_header_tab_province') .trigger('click'), $('#J_header_tab_city') .addClass('f-hide'))
                },
                setItemSelect: function (a, b) {
                    $('#J_header_' + a + '_container .J_header_select_item' + b) .addClass('is-h-area-item-current') .siblings() .removeClass('is-h-area-item-current')
                },
                resetCnt: function () {
                    $('#J_header_address_container') .removeClass('is-h-area-expanded');
                    this.initial()
                },
                addressItemClick: function (a) {
                    var b = $(a);
                    a = b.data('id');
                    var c = b.data('name'),
                    d = b.data('type') - 0,
                    b = b.data('wh'),
                    f = this.isAreaSwitch,
                    k,
                    g;
                    $('#J_header_selected_html') .html(c);
                    switch (d) {
                    case 0:
                        g = 'province';
                        k = 1 == f ? 'done' : 'city';
                        break;
                    case 1:
                        g = 'city';
                        k = 2 == f ? 'done' : 'country';
                        break;
                    case 2:
                        g = 'country';
                        k = 3 == f ? 'done' : 'street';
                        break;
                    case 3:
                        g = 'street',
                        k = 'done'
                    }
                    $('#J_header_tab_' + g) .data('id', a) .data('name', c);
                    $('#J_header_tab_' + k) .data('prevId', a);
                    $('#J_header_' + g + '_container') .nextAll() .html('');
                    this.setItemSelect(g, a);
                    'done' == k ? b && 'province' != g ? this.handleLastAddress({
                        typeName: g,
                        id: a,
                        wh: b
                    })  : $.Listeners.pub('header.address.wh') .success({
                        typeName: g,
                        id: a,
                        from: 'header'
                    })  : $.Listeners.pub('header.address.select') .success({
                        id: a,
                        typeName: k,
                        type: 'item'
                    })
                },
                handleLastAddress: function (a) {
                    $('#J_header_address_container') .removeClass('is-h-area-expanded');
                    var b = $('#J_header_selected_html') .data('storageId'),
                    c = a.id;
                    a = a.wh;
                    $.Listeners.pub('address.item.click') .success({
                        id: c,
                        wh: a,
                        storageId: b
                    })
                },
                addressTabClick: function (a) {
                    a = $(a);
                    var b = a.data('typeName'),
                    c = a.data('prevId'),
                    d = a.data('isAjax');
                    a.addClass('is-h-area-tab-title-item-current') .siblings() .removeClass('is-h-area-tab-title-item-current');
                    $('#J_header_' + b + '_container') .removeClass('f-hide') .siblings() .addClass('f-hide');
                    !d && $.Listeners.pub('header.address.select') .success({
                        id: c,
                        typeName: b,
                        type: 'item'
                    })
                }
            }
        },
        {
            '../../../../shop/addressCookie': 24
        }
    ],
    11: [
        function (g, h, m) {
            g = window;
            m = document;
            var b = m.createElement('div'),
            a = b.style,
            e = [
                'animation',
                'WebkitAnimation',
                'OAnimation',
                'msAnimation',
                'MozAnimation'
            ];
            a: {
                for (var c = 0, d = e.length, f; c < d; c++) if (f = e[c], void 0 !== a[f]) {
                    a = f;
                    break a
                }
                a = !1
            }
            a = {
                animation: 'animationend',
                WebkitAnimation: 'webkitAnimationEnd',
                OAnimation: 'oAnimationEnd',
                msAnimation: 'MSAnimationEnd',
                MozAnimation: 'mozAnimationEnd'
            }
            [
                a
            ];
            m = 'ontouchstart' in b || g.DocumentTouch && m instanceof g.DocumentTouch;
            b = 'onorientationchange' in g && 'undefined' !== typeof g.orientation;
            h.exports = {
                isMobile: m && b,
                spTouch: m,
                spOrientation: b,
                spResize: 'onresize' in g,
                spAnimation: !!a,
                aniEndName: a
            }
        },
        {
        }
    ],
    12: [
        function (g, h, m) {
            var b = g('../../../plugins/modules/Filter');
            h.exports = {
                init: function () {
                    this.userName = $.Cookie.get('VipRNAME');
                    0 < $('#J_phoneTip_con') .length && this.phoneBindEvent();
                    this.subEvent();
                    this.bindEvent()
                },
                subEvent: function () {
                    var a = this,
                    b = $('#J_head_log'),
                    c = encodeURIComponent(window.location.href);
                    $.Listeners.sub('loginSuccess') .onsuccess(function (c) {
                        c = $('#J_header_logAfter') .html() || '';
                        var f = $.Cookie.get('VipRNAME'),
                        k = $.Var.get('corporateLogoFlag');
                        b.addClass('login_after') .removeClass('login_before') .html(c.replace('{$J_header_account}', VIPSHOP.CutString(f, 9)));
                        $('#J_header_lnkLogOut') .on('click', function () {
                            a.headLogin('logout')
                        });
                        a.userName = f;
                        $('#J-topNavTool') .removeClass('f-top-login-before') .addClass('f-top-login-after');
                        a.loginSuccessHtml() .loginSuccessAddEvent() .userLevel();
                        if (1 === k && 'undefined' !== typeof window.isIndexMark && 1 === isIndexMark) $.Listeners.sub('ready.four') .onsuccess(function () {
                            $.ajax({
                                url: 'index-ajax.php',
                                data: {
                                    act: 'getEPUserInfo',
                                    user_id: $.Cookie.get('VipRUID')
                                },
                                dataType: 'json',
                                timeout: 6000,
                                success: function (a) {
                                    a && a.logo && $('#J-vipLogo') .attr('src', a.logo)
                                }
                            })
                        })
                    });
                    $.Listeners.sub('unLogin') .onsuccess(function () {
                        b.addClass('login_before') .removeClass('login_after') .html($('#J_header_logBefor') .html());
                        $('#J_header_lnkLogin') .on('click', function () {
                            a.headLogin()
                        });
                        $('#J_header_lnkRegister') .on('click', function () {
                            location.href = VIPSHOP.userHost + '/register?src=' + c
                        });
                        var d = $('#J-topNavTool');
                        d.removeClass('f-top-login-before');
                        a.userName && d.addClass('f-top-login-usercookie');
                        a.unLoginHtml()
                    });
                    $.Listeners.sub('header.get.payTip') .onsuccess(function (a) {
                        $('#J-header-myOrder') .html(100 > a.num ? a.num : '99+') .show()
                    })
                },
                headLogin: function (a) {
                    var b = window.location.host,
                    c = [
                        'www.vipshopyao.com',
                        'cart.vipshopyao.com'
                    ],
                    d = encodeURIComponent(window.location.href);
                    'logout' == a ? - 1 == $.inArray(b, c) ? location.href = VIPSHOP.userHost + '/logout?src=' + d : location.href = '//cart.vipshopyao.com/gw/logout?targe_url=' + VIPSHOP.userHost + '/logout?src=' + d : - 1 == $.inArray(b, c) ? location.href = VIPSHOP.userHost + '/login?src=' + d : location.href = VIPSHOP.userHost + '/login?whereFrom=vipshopyao&src=http://cart.vipshopyao.com/gw/login?targe_url=' + d
                },
                bindEvent: function () {
                    $('#J-header-myOrder') .closest('a') .on('click', function () {
                        $('#J-header-myOrder') .html('')
                    })
                },
                phoneBindEvent: function () {
                    $('#J_phone_tip') .on({
                        mouseenter: function () {
                            var a = $(this),
                            b = $('.J_qrcode_img'),
                            c = b.attr('data-original');
                            a.addClass(a.attr('data-J-hover'));
                            $('#J_phoneTip_con') .show();
                            b.attr('src', c)
                        },
                        mouseleave: function () {
                            var a = $(this);
                            a.removeClass(a.attr('data-J-hover'));
                            $('#J_phoneTip_con') .hide()
                        }
                    })
                },
                phoneAds: function (a, b) {
                    var c = $('#J_phoneTips_wrap'),
                    d = $('#J_phone_tip'),
                    f = !1;
                    (a = a.data) && a.items && a.items.length && (a = a.items[0], a.link = a.link || 'javascript:void(0)', c.Template({
                        templateElement: $('#' +
                        b),
                        replace: !1
                    }) .Template('process', a), f = !0);
                    f && !d.data('addEvent') && (d.data('addEvent', !0), d.on({
                        mouseenter: function () {
                            var a = $(this);
                            a.addClass(a.attr('data-J-hover'));
                            $('#J_phoneTip_con') .show()
                        },
                        mouseleave: function () {
                            var a = $(this);
                            a.removeClass(a.attr('data-J-hover'));
                            $('#J_phoneTip_con') .hide()
                        }
                    }))
                },
                page: function () {
                    $('.J_te_card,.J_ILike,.J_header_cartCount') .click(function (a) {
                        if ($.Cookie.get('VipLID') || $.Cookie.get('Guest_ID')) return !0;
                        window.open(VIPSHOP.userHost + '/login?gotype=1&src=' + encodeURIComponent(window.location.href));
                        return !1
                    });
                    return this
                },
                userName: null,
                replaceUserName: function (a, e) {
                    var c = this.userName || '';
                    e = e || a.html();
                    c = e.replace(/\{\$J_header_account\}/g, b.xss(c));
                    a.html(c);
                    return this
                },
                loginSuccessHtml: function () {
                    this.replaceUserName($('#J_nPic_name'));
                    $('#J_userInfo') .addClass('user-login-ed');
                    $('#J_head_log') .removeClass('hidden');
                    setTimeout(function () {
                        $('#J-ico-arw-bodder') .width($('#J-wp-user') .innerWidth())
                    }, 300);
                    return this
                },
                favsDefLoading: !1,
                loginSuccessAddEvent: function () {
                    var a = this;
                    $('#J_user_logined') .on('mouseenter', function () {
                        a.getMsg() .getAvatar()
                    });
                    $('.J-logoutBtn') .on('click', function () {
                        a.headLogin('logout')
                    });
                    $('#J-favs') .on('mouseenter', function () {
                        a.favsDefLoading || $.when(a.fBcAjax(), a.fCcAjax(), a.footprintAjax()) .done(function (b, c, d) {
                            a.favsDefLoading = !0;
                            a.favsDefDone(b, c, d)
                        })
                    });
                    return this
                },
                timeout: null,
                unLoginHtml: function () {
                    var a = this;
                    $('#J_header_lnkLogin') .off('click');
                    $('#J_header_lnkRegister') .off('click');
                    this.userName ? (this.replaceUserName($('#J_head_log'), $('#J_header_logAfter') .html()), $('#J_user_logined') .hide(), $('#J_user_unLogin') .removeClass('hidden'), $('#J_head_log') .addClass('user-has-cookies'), $('#J_Register_hasnoname') .removeClass('hidden'))  : ($('#J_head_log') .html($('#J_header_logAfter') .html()), $('#J_user_logined') .hide(), $('#J_uInfo_welcom') .html('您好！'), $('#J_user_noId') .removeClass('hidden'), $('#J_Register_hasnoname') .removeClass('hidden'), $('#J_head_log') .addClass('user-no-cookies'));
                    $('#J_user_msg') .hide();
                    $('.J_header_lnkLogin') .on('click', function () {
                        a.headLogin();
                        return !1
                    });
                    $('.J_header_lnkRegister') .on('click', function () {
                        location.href = VIPSHOP.userHost + '/register?src=' + encodeURIComponent(window.location.href);
                        return !1
                    });
                    $('#J_head_log') .removeClass('hidden');
                    setTimeout(function () {
                        $('#J-ico-arw-bodder') .width($('#J-wp-user') .innerWidth())
                    }, 300);
                    return this
                },
                favCommodityCount: function () {
                    var a = $.Cookie.get('vip_wh');
                    if (!a) return this;
                    $.ajax({
                        url: '//myi.vip.com/fav_sku/count',
                        type: 'get',
                        dataType: 'jsonp',
                        timeout: 6000,
                        cache: !1,
                        data: {
                            warehouse: a
                        },
                        success: function (a) {
                            200 === a.code && $('#J_favCommodity_count') .html(a.data)
                        }
                    });
                    return this
                },
                getAvatar: function () {
                    var a = this;
                    a.avatarData ? a.replaceAvatar(a.avatarData)  : $.ajax({
                        url: '//gensvr.vip.com/user/userinfo',
                        data: {
                        },
                        dataType: 'jsonp',
                        jsonpCallback: 'getUserAvatar',
                        timeout: 6000,
                        success: function (b) {
                            a.avatarData = b;
                            a.replaceAvatar(b)
                        }
                    });
                    return this
                },
                replaceAvatar: function (a) {
                    var b = $('#J_topNavUserAvatar');
                    if (200 == a.code && a.data && a.data.avatar) {
                        var c = /\.jpg|\.png|\.gif/g,
                        d = a.data.avatar.match(c);
                        if (d && d.length) var f = a.data.avatar.replace(c, '_38x38_90' + d[0]);
                        b.Template({
                            templateElement: $('#J_topNav_avatar'),
                            replace: !0
                        }) .Template('process', {
                            avatar: f
                        })
                    }
                },
                userLevel: function () {
                    var a = parseInt($.Cookie.get('VipMonopoly'));
                    (a || 0 === a) && $('#J_viplevel') .find('i') .addClass('uv-' + (a + 1));
                    return this
                },
                getMsg: function () {
                    var a = this;
                    a.userMessage ? a.replaceMsg(a.userMessage)  : $.ajax({
                        url: '//gensvr.vip.com/message/numunread',
                        dataType: 'jsonp',
                        timeout: 6000,
                        success: function (b) {
                            a.userMessage = b;
                            a.replaceMsg(b)
                        }
                    });
                    return this
                },
                replaceMsg: function (a) {
                    var b = $('#J_user_msgIcon');
                    200 == a.code && a.data && a.data.count ? b.show()  : b.hide()
                },
                favsDefDone: function (a, b, c) {
                    a = a[0];
                    b = b[0];
                    c = c[0];
                    200 == a.code ? $('#J_favBrand_count') .html(100 > a.data ? a.data : '99+')  : VIPSHOP.log(a);
                    200 == b.code && $('#J_favCommodity_count') .html(100 > b.data ? b.data : '99+');
                    200 == c.code && $('#J_footprint_count') .html(200 > c.count ? c.count : '200')
                },
                fCcAjax: function () {
                    return $.ajax({
                        url: '//myi.vip.com/fav_sku/count',
                        dataType: 'jsonp',
                        timeout: 6000,
                        data: {
                            warehouse: $.Cookie.get('vip_wh')
                        }
                    })
                },
                fBcAjax: function () {
                    return $.ajax({
                        url: '//fav.vip.com/api/fav/brand/sn/count',
                        dataType: 'jsonp',
                        timeout: 6000,
                        jsonpCallback: 'getBrandCount',
                        data: {
                            business: 'VIPSALES'
                        }
                    })
                },
                footprintAjax: function () {
                    var a = VIPSHOP.Member.parseCookie() .suc;
                    return $.ajax({
                        url: '//browse.vip.com/user_hist/count',
                        dataType: 'jsonp',
                        timeout: 6000,
                        jsonpCallback: 'getFootprintCount',
                        data: {
                            warehouse: $.Cookie.get('vip_wh'),
                            channel: 'PC',
                            userType: a
                        }
                    })
                }
            }
        },
        {
            '../../../plugins/modules/Filter': 21
        }
    ],
    13: [
        function (g, h, m) {
            g = {
                commonsubNav: window.commonsubNav || {
                },
                MoreTpl: $('#J-navDropMore-tpl'),
                channelgroupWrap: $('#J-channel-item-group'),
                NavmoreBtn: $('.J_Navmore_wrap'),
                subNavimgItem: $('.J_subNav_pics'),
                init: function () {
                    this.channelgroupWrap.length && this.bindMorenavEvent()
                },
                bindMorenavEvent: function () {
                    var b = this;
                    b.NavmoreBtn.on({
                        mouseenter: function () {
                            b.subNavimgItem.each(function (a) {
                                $(this) .hasClass('lazy') && ($(this) .attr('src', $(this) .data('original')), $(this) .removeClass('lazy'))
                            })
                        }
                    })
                }
            };
            h.exports = g
        },
        {
        }
    ],
    14: [
        function (g, h, m) {
            g = {
                model: g('./model'),
                view: g('./view'),
                init: function (b) {
                    this.model.init(b);
                    this.view.init(b)
                }
            };
            h.exports = g
        },
        {
            './model': 15,
            './view': 16
        }
    ],
    15: [
        function (g, h, m) {
            var b = g('../../../../plugins/modules/Statistics/index.js');
            h.exports = {
                api: {
                    getSuggestHotKeywords: '//category.vip.com/ajax/getSuggestHotKeywords.php',
                    getSuggest: '//category.vip.com/ajax/getSuggest.php',
                    getSwitch: '//category.vip.com/ajax/getSwitch.php'
                },
                event: {
                    sub: {
                        getSuggestHotKeywords: 'get.suggest.hot.keywords',
                        getSuggest: 'get.suggest'
                    },
                    pub: {
                        callMarSeed: 'call.mar.seed',
                        getSearchSwitchSuccess: 'get.search.switch.success',
                        getPlaceholderSuccess: 'get.placeholder.success',
                        getSuggestHotKeywordsSuccess: 'get.suggest.hot.keywords.success',
                        getSuggestSuccess: 'get.suggest.success'
                    }
                },
                data: {
                    SUGGEST_HOT_KEYWORDS_COUNT: 10,
                    AJAX_TIMEOUT_IN_MILLISECONDS: 6000,
                    warehouse: 'VIP_NH',
                    recommendStorage: null,
                    placeholder: null,
                    commonSwitch: 0
                },
                init: function (a) {
                    this.data.warehouse = $.trim(a.warehouse);
                    this.data.commonSwitch = a.commonSwitch;
                    this.data.placeholder = a.placeholderSuggestWord;
                    b.init();
                    this.getShuntSwitch();
                    this.bindEventListener()
                },
                bindEventListener: function () {
                    var a = this;
                    $.Listeners.sub(this.event.sub.getSuggestHotKeywords) .onsuccess(function () {
                        a.getSuggestHotKeywords()
                    });
                    $.Listeners.sub(this.event.sub.getSuggest) .onsuccess(function (b) {
                        a.getSuggestions(b.data)
                    });
                    $.Listeners.pub(this.event.pub.getPlaceholderSuccess) .success({
                        data: a.data.placeholder
                    })
                },
                getShuntSwitch: function () {
                    if (1 === this.data.commonSwitch) {
                        var a = this,
                        b = $.Storage.get('searchShuntSwitch');
                        $.isEmptyObject(b) ? $.ajax({
                            url: this.api.getSwitch,
                            dataType: 'jsonp',
                            jsonp: 'callback',
                            cache: !0,
                            jsonpCallback: 'searchSwitch',
                            timeout: this.data.AJAX_TIMEOUT_IN_MILLISECONDS,
                            success: function (b) {
                                200 == b.code && ($.Storage.set('searchShuntSwitch', b, 900), $.Listeners.pub(a.event.pub.getSearchSwitchSuccess) .success({
                                    data: b.data
                                }))
                            }
                        })  : $.Listeners.pub(this.event.pub.getSearchSwitchSuccess) .success({
                            data: b.data
                        })
                    }
                },
                getSuggestHotKeywords: function (a) {
                    var b = this;
                    $.isEmptyObject(this.data.recommendStorage) ? $.ajax({
                        url: this.api.getSuggestHotKeywords,
                        data: {
                            count: a ? a : b.data.SUGGEST_HOT_KEYWORDS_COUNT
                        },
                        dataType: 'jsonp',
                        jsonp: 'callback',
                        jsonpCallback: 'searchSuggestHotKeywords',
                        timeout: this.data.AJAX_TIMEOUT_IN_MILLISECONDS,
                        success: function (a) {
                            200 == a.code && (b.data.recommendStorage = a, $.Listeners.pub(b.event.pub.getSuggestHotKeywordsSuccess) .success({
                                data: a.data
                            }))
                        }
                    })  : $.Listeners.pub(b.event.pub.getSuggestHotKeywordsSuccess) .success({
                        data: this.data.recommendStorage.data
                    })
                },
                getSuggestions: function (a) {
                    var b = this;
                    $.ajax({
                        url: this.api.getSuggest,
                        data: {
                            warehouse: this.data.warehouse,
                            keyword: a
                        },
                        dataType: 'jsonp',
                        jsonp: 'callback',
                        jsonpCallback: 'searchSuggestions',
                        timeout: this.data.AJAX_TIMEOUT_IN_MILLISECONDS,
                        success: function (c) {
                            200 == c.code && (b.requestSearchMars(a, 0 < c.data.length ? 1 : 0), $.Listeners.pub(b.event.pub.getSuggestSuccess) .success({
                                data: c.data
                            }))
                        },
                        error: function () {
                        }
                    })
                },
                requestSearchMars: function (a, b) {
                    $.Listeners.pub(this.event.pub.callMarSeed) .success({
                        mars_sead: 'keyword_result',
                        data_mars: {
                            value: a,
                            haveresult: b
                        }
                    })
                }
            }
        },
        {
            '../../../../plugins/modules/Statistics/index.js': 22
        }
    ],
    16: [
        function (g, h, m) {
            h.exports = {
                event: {
                    sub: {
                        getSearchSwitchSuccess: 'get.search.switch.success',
                        getPlaceholderSuccess: 'get.placeholder.success',
                        getSuggestHotKeywordsSuccess: 'get.suggest.hot.keywords.success',
                        getSuggestSuccess: 'get.suggest.success'
                    },
                    pub: {
                        getSuggestHotKeywords: 'get.suggest.hot.keywords',
                        getSuggest: 'get.suggest'
                    }
                },
                data: {
                    commonSwitch: 0,
                    showHelper: 0,
                    currentKeyword: '',
                    placeholderStatus: {
                        keyword: '',
                        url: ''
                    },
                    curHighLightIndex: - 1
                },
                UI: {
                    search: '#J-search',
                    searchInput: '.J-search-input',
                    searchButton: '.J-search-button',
                    searchHelper: '.J-search-helper',
                    searchRecoKeyWord: '.J_recommend_key_word',
                    searchHistoryContent: '.J-search-history-content',
                    searchHistoryButtonClear: '.J-search-history-button-clear',
                    searchRecommendContent: '.J-search-recommend-content',
                    searchSuggestionsList: '.J_search_suggestions_list',
                    searchSuggestionsItem: '.J_go_search'
                },
                tmpl: {
                    searchHelper: 'J-tmpl-search-helper',
                    searchSuggestions: 'J-tmpl-search-suggestions',
                    searchHistory: 'J-tmpl-search-history',
                    searchRecommend: 'J-tmpl-search-recommend'
                },
                status: {
                    hidden: 'f-hide',
                    searchShowHelper: 'is-search-show-helper',
                    hasSearchSuggestionsMatch: 'has-search-suggestions-match',
                    isSearchSuggestionsItemSelected: 'is-search-suggestions-item-selected'
                },
                init: function (b) {
                    this.data.commonSwitch = b.commonSwitch;
                    this.showSearch();
                    this.bindEvent();
                    this.bindEventListener()
                },
                bindEvent: function () {
                    var b = this,
                    a = $(this.UI.search),
                    e = a.find(this.UI.searchInput);
                    a.on('focus', this.UI.searchInput, function () {
                        b.showHelper($.trim(e.val()))
                    });
                    a.on('keyup', this.UI.searchInput, VIPSHOP.Debounce(function (a) {
                        var d = $.trim(e.val());
                        b.data.currentKeyword = d;
                        13 === a.which ? b.searchTrigger(d)  : 40 != a.which && 38 != a.which && b.showHelper(d)
                    }, 500));
                    a.on('keydown', this.UI.searchInput, function (a) {
                        var d = a.keyCode;
                        a = b.data.curHighLightIndex;
                        $(b.UI.searchHelper);
                        var e = $(b.UI.searchInput),
                        g = e.get(0),
                        h = $(b.UI.searchSuggestionsList),
                        l = $(b.UI.searchSuggestionsList + ' li') .length;
                        !l || 40 != d && 38 != d || (40 == d ? a < l - 1 ? a++ : a = 0 : 38 == d && (a >= l ? a = 0 : 0 < a ? a-- : a = l - 1), h.find(b.UI.searchSuggestionsItem) .removeClass(b.status.isSearchSuggestionsItemSelected), d = h.find(b.UI.searchSuggestionsItem + '[index="' + a + '"]'), d.length && (h = d.data('word'), e.val(h), b.setCaretPosition(g, h.length), d.addClass(b.status.isSearchSuggestionsItemSelected), b.data.curHighLightIndex = a))
                    });
                    a.on('click', this.UI.searchHistoryButtonClear, function (a) {
                        a.preventDefault();
                        b.clearSearchHistoryStorage()
                    }) .on('click', b.UI.searchSuggestionsItem, function () {
                        var a = $(this);
                        b.setSearchHistoryStorage(a.text(), function () {
                            location.href = a.attr('data-href')
                        })
                    }) .on('click', this.UI.searchButton, function () {
                        var a = $.trim(e.val());
                        b.searchTrigger(a)
                    }) .on('click', this.UI.searchRecoKeyWord, function (a) {
                        a.preventDefault();
                        a = $(this);
                        var d = a.data('word'),
                        e = a.attr('href');
                        b.setSearchHistoryStorage(d, function () {
                            window.location.href = e
                        })
                    });
                    $(document) .on('click', function (a) {
                        $(a.target) .closest(b.UI.search) .length || b.hideHelper()
                    })
                },
                setCaretPosition: function (b, a) {
                    if (b.setSelectionRange) setTimeout(function () {
                        b.setSelectionRange(a, a);
                        b.focus()
                    }, 0);
                     else if (b.createTextRange) {
                        var e = b.createTextRange();
                        e.move('character', a);
                        e.select()
                    }
                },
                bindEventListener: function () {
                    var b = this;
                    $.Listeners.sub(this.event.sub.getSearchSwitchSuccess) .onsuccess(function (a) {
                        b.showSearch(a.data)
                    });
                    $.Listeners.sub(this.event.sub.getPlaceholderSuccess) .onsuccess(function (a) {
                        b.checkPlaceholder(a.data)
                    });
                    $.Listeners.sub(this.event.sub.getSuggestHotKeywordsSuccess) .onsuccess(function (a) {
                        b.renderRecommend(a.data)
                    });
                    $.Listeners.sub(this.event.sub.getSuggestSuccess) .onsuccess(function (a) {
                        b.renderSuggestions(a.data)
                    })
                },
                showSearch: function (b) {
                    (2 === this.data.commonSwitch || !$.isEmptyObject(b) && 1 === b.flag) && $(this.UI.search) .removeClass(this.status.hidden)
                },
                checkPlaceholder: function (b) {
                    var a = VIPSHOP.queryStringToJSON(location.search) || {
                    };
                    if (a.hasOwnProperty('keyword') && a.keyword) $(this.UI.search) .find(this.UI.searchInput) .val(a.keyword),
                    this.data.placeholderStatus = {
                        keyword: a.keyword,
                        url: location.href
                    };
                     else if (!$.isEmptyObject(b)) switch (b.type) {
                    case '1':
                        this.data.placeholderStatus = {
                            keyword: b.real_word,
                            url: ''
                        };
                        break;
                    case '2':
                        this.data.placeholderStatus = {
                            keyword: '',
                            url: b.real_word
                        };
                        break;
                    default:
                        this.data.placeholderStatus = {
                            keyword: '',
                            url: ''
                        }
                    }
                },
                searchTrigger: function (b) {
                    var a = this;
                    '' === b ? '' !== this.data.placeholderStatus.url ? window.location = this.data.placeholderStatus.url : '' !== this.data.placeholderStatus.keyword ? this.setSearchHistoryStorage(this.data.placeholderStatus.keyword, function () {
                        window.location = a.pageURLQuery(a.data.placeholderStatus.keyword)
                    })  : this.showHelper(b)  : this.setSearchHistoryStorage(b, function () {
                        window.location = a.pageURLQuery(b)
                    })
                },
                showHelper: function (b) {
                    b ? this.requestSuggestions(b)  : this.getRecommend()
                },
                hideHelper: function () {
                    var b = $(this.UI.search);
                    this.data.showHelper && (b.removeClass(this.status.searchShowHelper), this.data.showHelper = 0)
                },
                getRecommend: function () {
                    var b = $(this.UI.search);
                    b.find(this.UI.searchHelper) .html($.Tpl(this.tmpl.searchHelper));
                    this.renderSearchHistoryStorage();
                    this.requestRecommend();
                    this.data.showHelper || b.addClass(this.status.searchShowHelper);
                    this.data.showHelper = 1
                },
                requestSuggestions: function (b) {
                    $.Listeners.pub(this.event.pub.getSuggest) .success({
                        data: b
                    })
                },
                renderSuggestions: function (b) {
                    var a = RegExp(this.data.currentKeyword, 'gi'),
                    e = RegExp(this.data.currentKeyword, 'i'),
                    c = [
                    ],
                    d,
                    f = $(this.UI.search),
                    g;
                    if (0 < b.length) {
                        this.data.curHighLightIndex = - 1;
                        for (g = 0; g < b.length; g++) e.test(b[g].word) ? (b[g].status = this.status.hasSearchSuggestionsMatch, d = b[g].word.replace(a, function (a) {
                            return '<span class="c-search-suggestions-highlight">' + a + '</span>'
                        }))  : d = b[g].word,
                        c.push({
                            url: b[g].url,
                            name: d,
                            word: b[g].word,
                            status: b[g].status || ''
                        });
                        b = {
                            list: c
                        };
                        b = $.Tpl(this.tmpl.searchSuggestions, b);
                        f.find(this.UI.searchHelper) .html(b);
                        this.data.showHelper || f.addClass(this.status.searchShowHelper);
                        this.data.showHelper = 1
                    } else f.find(this.UI.searchHelper) .empty(),
                    f.removeClass(this.status.searchShowHelper),
                    this.data.showHelper = 0
                },
                setSearchHistoryStorage: function (b, a) {
                    $.crossStorage.get('searchHistoryData', function (e) {
                        var c = [
                        ],
                        d = !0 === $.isEmptyObject(e) ? 1 : 0,
                        f = $.inArray(b, e);
                        d ? c.push(b)  : ( - 1 !== f && e.splice(f, 1), e.unshift(b), c = e);
                        10 < c.length && (c = c.slice(0, 10));
                        $.crossStorage.set('searchHistoryData', c, function () {
                            a && a()
                        })
                    })
                },
                clearSearchHistoryStorage: function () {
                    var b = this;
                    $.crossStorage.get('searchHistoryData', function (a) {
                        'undefined' === typeof a && null === a || $.crossStorage.set('searchHistoryData', '', function () {
                            $(b.UI.search) .find(b.UI.searchHistoryContent) .empty();
                            $(b.UI.search) .find(b.UI.searchHistoryButtonClear) .addClass(b.status.hidden)
                        })
                    })
                },
                renderSearchHistoryStorage: function () {
                    var b = this;
                    $.crossStorage.get('searchHistoryData', function (a) {
                        var e = $(b.UI.search),
                        c = [
                        ],
                        d;
                        if (!$.isEmptyObject(a)) {
                            for (d = 0; d < a.length; d++) c.push({
                                url: b.pageURLQuery(a[d]),
                                name: a[d]
                            });
                            a = {
                                list: c
                            };
                            a = $.Tpl(b.tmpl.searchHistory, a);
                            e.find(b.UI.searchHistoryContent) .html(a);
                            e.find(b.UI.searchHistoryButtonClear) .removeClass(b.status.hidden)
                        }
                    })
                },
                requestRecommend: function () {
                    $.Listeners.pub(this.event.pub.getSuggestHotKeywords) .success()
                },
                renderRecommend: function (b) {
                    b.length && (b = {
                        list: b
                    }, b = $.Tpl(this.tmpl.searchRecommend, b), $(this.UI.search) .find(this.UI.searchRecommendContent) .html(b))
                },
                pageURLQuery: function (b) {
                    return '//category.vip.com/suggest.php?keyword=' + encodeURIComponent(b) + '&ff=235|12|1|1'
                }
            }
        },
        {
        }
    ],
    17: [
        function (g, h, m) {
            var b = g('./model/index.js'),
            a = g('./view/index.js');
            h.exports = {
                init: function () {
                    VIPSHOP && VIPSHOP.isShowSignIn && (a.init(), b.init())
                }
            }
        },
        {
            './model/index.js': 18,
            './view/index.js': 19
        }
    ],
    18: [
        function (g, h, m) {
            var b = g('../../../../../plugins/modules/http/httpV2.js');
            h.exports = {
                isGetSignInfo: !1,
                isGetnotLoginInfo: !1,
                isAjaxLoading: !1,
                init: function () {
                    this.bindEvents();
                    this.subEvents()
                },
                bindEvents: function () {
                    var a = this;
                    $(document) .on('mouseenter.signInfo', '#J_signin_wrap', function () {
                        $.Cookie.get('VipLID') ? a.isGetSignInfo || !1 != a.isAjaxLoading || a.getSigninInfo()  : a.isGetnotLoginInfo || ($.Listeners.pub('signin.info.notlogin') .success({
                        }), a.isGetnotLoginInfo = !0)
                    })
                },
                subEvents: function () {
                    var a = this;
                    $.Listeners.sub('signin.click.add') .onsuccess(function () {
                        a.addSignin()
                    });
                    $.Listeners.sub('signin.clear.isGetSignInfo') .onsuccess(function () {
                        a.isGetSignInfo = !1
                    })
                },
                getSigninInfo: function () {
                    var a = this;
                    a.isAjaxLoading = !0;
                    b({
                        url: '//iclub.vip.com/cors/signin/signinInfo',
                        data: {
                            bussCode: 'signin',
                            invoke_client: 'PC',
                            invoke_client_type: 'PC_HOME_HEAD',
                            needLogin: !1
                        },
                        type: 'GET',
                        dataType: 'jsonp',
                        jsonpCallback: 'getSigninInfo',
                        cache: !0,
                        timeout: 10000,
                        successCallback: function (b) {
                            a.isAjaxLoading = !1;
                            if (b && 200 == b.code) {
                                a.isGetSignInfo = !0;
                                var c = $.Cookie.get('VipLID');
                                b = b.data;
                                c ? (c = b.userSigninInfo) && (1 > c.userId ? $.Listeners.pub('signin.info.notlogin') .success(b)  : c.todaySigned ? $.Listeners.pub('signin.info.hasSignin') .success(b)  : $.Listeners.pub('signin.info.notSignin') .success(b))  : $.Listeners.pub('signin.info.notlogin') .success(b)
                            } else VIPSHOP.log('接口异常!')
                        },
                        errorCallback: function (b) {
                            a.isAjaxLoading = !1;
                            VIPSHOP.log('获取签到信息失败')
                        }
                    })
                },
                addSigninSuccess: function (a) {
                    var b = a.rewards,
                    c = '',
                    d = [
                        'COUPON',
                        'VMARK',
                        'POINT'
                    ];
                    if (b) for (var f = 0, g = b.length; f <
                    g; f++) 200 == b[f].code && - 1 != d.indexOf(b[f].type) && (c += (c ? '、' : '+') + b[f].name);
                    $.Listeners.pub('signin.add.success') .success({
                        rewardsText: c,
                        data: a
                    })
                },
                addSignin: function () {
                    var a = this;
                    b({
                        url: '//iclub.vip.com/cors/signin/add',
                        data: {
                            invoke_client: 'PC',
                            invoke_client_type: 'PC_HOME_HEAD'
                        },
                        type: 'GET',
                        dataType: 'jsonp',
                        jsonpCallback: 'addSignin',
                        cache: !0,
                        timeout: 8000,
                        successCallback: function (b) {
                            if (b) {
                                var c = '',
                                c = b.code;
                                if (200 == c) {
                                    if (b = b.data) c = b.totalCode,
                                    200 == c || 201 == c ? a.addSigninSuccess(b)  : (c = 701 == c ? '您今天已签到，请明天再来签到' :
                                    '系统打盹了，请稍后再试吧', $.Listeners.pub('signin.add.fail') .success({
                                        msg: c
                                    }))
                                } else 100001 == c ? VIPSHOP.login.init({
                                    loginEvent: function () {
                                        $.Listeners.pub('signin.click.add') .success()
                                    }
                                })  : (c = 200101 == c ? '很抱歉，现在不支持签到' : '系统打盹了，请稍后再试吧', $.Listeners.pub('signin.add.fail') .success({
                                    msg: c
                                }))
                            }
                        },
                        errorCallback: function () {
                            VIPSHOP.log('签到失败')
                        }
                    })
                }
            }
        },
        {
            '../../../../../plugins/modules/http/httpV2.js': 23
        }
    ],
    19: [
        function (g, h, m) {
            h.exports = {
                init: function () {
                    $('#J_signin_wrap') .show();
                    this.bindEvents();
                    this.subEvents()
                },
                bindEvents: function () {
                    $(document) .on('click', '#J_signin_btn', function () {
                        $(this) .hasClass('ui-btn-disable') || ($.Cookie.get('VipLID') ? $.Listeners.pub('signin.click.add') .success()  : VIPSHOP.login.init({
                            loginEvent: function () {
                                $.Listeners.pub('signin.click.add') .success()
                            }
                        }))
                    })
                },
                subEvents: function () {
                    var b = this;
                    $.Listeners.sub('signin.info.notlogin') .onsuccess(function () {
                        b.notLogin()
                    });
                    $.Listeners.sub('signin.info.notSignin') .onsuccess(function (a) {
                        b.notSignin(a)
                    });
                    $.Listeners.sub('signin.info.hasSignin') .onsuccess(function (a) {
                        b.hasSignin(a)
                    });
                    $.Listeners.sub('signin.add.success') .onsuccess(function (a) {
                        b.signinSuccess(a)
                    });
                    $.Listeners.sub('signin.add.fail') .onsuccess(function (a) {
                        b.signinFail(a)
                    })
                },
                hoverShow: function (b) {
                    b ? $('#J_signin_signed') .addClass('head-sign-in')  : $('#J_signin_unSigned') .addClass('head-sign-in')
                },
                notLogin: function () {
                    var b = $.Tpl('J_signin_unSigned_tpl', {
                        fe_type: 0
                    });
                    $('#J_signin_container') .html(b);
                    this.hoverShow(!1)
                },
                notSignin: function (b) {
                    var a = b.userSigninInfo.contSignDays;
                    0 == a ? b.fe_type = 1 : 5 >= a ? (b.fe_days = 7 - a, b.fe_type = 2)  : b.fe_type = 3;
                    b = $.Tpl('J_signin_unSigned_tpl', b);
                    $('#J_signin_container') .html(b);
                    0 < a && $('.J_action_day:lt(' + a + ')') .addClass('action-day');
                    this.hoverShow(!1)
                },
                hasSignin: function (b) {
                    var a = b.userSigninInfo.contSignDays;
                    6 >= a ? (b.fe_days = 7 - a, b.fe_type = 1)  : b.fe_type = 2;
                    b = $.Tpl('J_signin_signed_tpl', b);
                    $('#J_signin_container') .html(b);
                    this.hoverShow(!0);
                    this.signinUI();
                    $(document) .off('mouseenter.signInfo')
                },
                signinUI: function () {
                    $('#J_signin_icon') .addClass('wp-sign-icon-static');
                    $('#J_signin_text') .html('已签到');
                    $('#J_signin_btn') .html('已签到')
                },
                signinSuccess: function (b) {
                    var a = b.rewardsText;
                    b = b.data;
                    b.contSignDays && ($('.J_action_day') .eq(0) .hasClass('action-day') ? (b = b.contSignDays - 0 - 1, $('.J_action_day') .eq(b) .addClass('action-day'))  : (b = b.contSignDays - 0, $('.J_action_day:lt(' + b + ' )') .addClass('action-day')), $('#J_signin_unSigned') .addClass('z-ui-tooltips-in'));
                    $('#J_signin_btn') .addClass('ui-btn-disable');
                    $('#J_prize_container') .html(a);
                    this.signinUI();
                    $('#J_signin_href') .html('已成功签到，明天记得再来，奖励不停哦！');
                    $('#J_signin_success_tips') .addClass('wp-sign-tip-in');
                    setTimeout(function () {
                        $('#J_signin_success_tips') .removeClass('wp-sign-tip-in');
                        $('#J_signin_unSigned') .removeClass('z-ui-tooltips-in');
                        $.Listeners.pub('signin.clear.isGetSignInfo') .success()
                    }, 4000)
                },
                signinFail: function (b) {
                    b &&
                    b.msg && (b = {
                        msg: b.msg
                    }, b = $.Tpl('J_signin_error_tpl', b), $('#J_signin_error_container') .html(b), $('#J_signin_error_tips') .addClass('z-ui-tooltips-in'), $('#J_signin_unSigned') .removeClass('head-sign-in'), setTimeout(function () {
                        $('#J_signin_error_tips') .removeClass('z-ui-tooltips-in');
                        $('#J_signin_unSigned') .addClass('head-sign-in')
                    }, 4000))
                }
            }
        },
        {
        }
    ],
    20: [
        function (g, h, m) {
            h.exports = {
                init: function () {
                    $('body') .on('click', '.J_fake_a', function (b) {
                        b.preventDefault()
                    })
                }
            }
        },
        {
        }
    ],
    21: [
        function (g, h, m) {
            h.exports = {
                xss: function (b) {
                    b =
                    b.toString();
                    /['"<>&]+/.test(b) && (b = b.replace(/</g, '&lt;'), b = b.replace(/>/g, '&gt;'), b = b.replace(/"/g, '&quot;'), b = b.replace(/'/g, '&#39;'), b = b.replace(/&/g, '&amp;'));
                    return b
                }
            }
        },
        {
        }
    ],
    22: [
        function (g, h, m) {
            h.exports = {
                event: {
                    pub: {
                    },
                    sub: {
                        callMarSeed: 'call.mar.seed'
                    }
                },
                init: function () {
                    var b = this;
                    $.Listeners.sub(b.event.sub.callMarSeed) .onsuccess(function (a) {
                        b.callMarSeed(a.mars_sead, a.data_mars)
                    })
                },
                callMarSeed: function (b, a) {
                    'function' == typeof Mar && Mar.Seed.request('a', 'click', b, $.stringifyJSON(a))
                }
            }
        },
        {
        }
    ],
    23: [
        function (g, h, m) {
            var b = {
                init: function (a) {
                    void 0 == window.AJAX_CACHE && (window.AJAX_CACHE = {
                    });
                    var b = this,
                    c = {
                        url: '',
                        data: {
                        },
                        cache: !1,
                        dataType: 'jsonp',
                        jsonpCallback: 'jsonpCallback',
                        type: 'GET',
                        dataFilter: function (a, b) {
                            return a
                        },
                        timeout: 8000,
                        lock: !1,
                        preFilter: function (a) {
                            a()
                        },
                        filter: null,
                        isCache: !1,
                        cacheKeys: [
                        ],
                        cacheObj: window.AJAX_CACHE,
                        code: '',
                        event: {
                            ajaxLock: 'ajax.lock',
                            ajaxUnlock: 'ajax.unlock'
                        },
                        successCallback: null,
                        errorCallback: null,
                        ajaxTryTimes: 0
                    };
                    $.extend(c, a);
                    this.filter = null == c.filter ? function (a, b, c) {
                        return c(a)
                    }
                     :
                    a.filter;
                    this.cache = {
                        getkey: function (a, b) {
                            var c = [
                            ];
                            $.each(a, function (a, d) {
                                c.push(b[d])
                            });
                            return c.join('_')
                        },
                        get: function (a, b) {
                            var e = this.getkey(a, b);
                            return c.cacheObj[e]
                        },
                        set: function (a, b, e) {
                            a = this.getkey(a, b);
                            c.cacheObj[a] = e
                        }
                    };
                    this.ajaxFun = function (a) {
                        $.ajax({
                            url: a.url,
                            data: a.data,
                            cache: a.cache,
                            dataType: a.dataType,
                            type: a.type,
                            dataFilter: a.dataFilter,
                            jsonpCallback: a.jsonpCallback,
                            timeout: a.timeout,
                            success: function (c, g, h) {
                                a.lock && $.Listeners.pub(a.event.ajaxUnlock) .success();
                                b.filter(c, a, function (c) {
                                    a.isCache &&
                                    b.cache.set(a.cacheKeys, a.data, c);
                                    null != a.successCallback && a.successCallback(c)
                                })
                            },
                            error: function (c, g, h) {
                                var l = {
                                    ext: {
                                        requestUrl: this.url,
                                        textStatus: g,
                                        status: c.status
                                    }
                                };
                                a.lock && $.Listeners.pub(a.event.ajaxUnlock) .success();
                                0 < a.ajaxTryTimes ? (a.ajaxTryTimes--, b.ajaxFun(a))  : null != a.errorCallback && a.errorCallback(c, g, h);
                                '' != a.code && VIPSHOP.report.send(a.code, l)
                            }
                        })
                    };
                    c.preFilter(function () {
                        if (c.isCache && void 0 != b.cache.get(c.cacheKeys, c.data)) {
                            if (null != c.successCallback) {
                                var a = b.cache.get(c.cacheKeys, c.data);
                                c.successCallback(a)
                            }
                        } else c.lock && $.Listeners.pub(c.event.ajaxLock) .success(),
                        b.ajaxFun(c)
                    });
                    return this
                }
            };
            h.exports = function (a) {
                b.init(a)
            }
        },
        {
        }
    ],
    24: [
        function (g, h, m) {
            var b = {
                addressNameArr: [
                    'province',
                    'city',
                    'country',
                    'street'
                ],
                isAreaSwitch: VIPSHOP.isAreaSwitch || 1,
                get: function (a) {
                    var b = '',
                    b = $.Cookie.get('vip_address'),
                    c = $.Cookie.get('vip_province'),
                    b = b && $.parseJSON(decodeURIComponent(escape(b)));
                    if (a) {
                        for (var d = 0, f = this.addressNameArr.slice(0, this.isAreaSwitch) .length; d < f; d++) switch (d) {
                        case 0:
                            showId =
                            b.pid;
                            showName = b.pname;
                            break;
                        case 1:
                            showId = b.cid;
                            showName = b.cname;
                            break;
                        case 2:
                            showId = b.did;
                            showName = b.dname;
                            break;
                        case 3:
                            showId = b.sid,
                            showName = b.sname
                        }
                        b = 1 == a ? showId || c : showName
                    }
                    return b
                },
                set: function (a, b) {
                    for (var c = 'detail' == a ? this.addressNameArr : this.addressNameArr.slice(0, this.isAreaSwitch), d = {
                        pid: '',
                        pname: '',
                        cid: '',
                        cname: '',
                        did: '',
                        dname: '',
                        sid: '',
                        sname: ''
                    }, f = 0, g = c.length; f < g; f++) {
                        var h = c[f],
                        l;
                        'detail' == a ? (l = $('#J_tab_' + h + '_name'), h = l.html())  : (l = $('#J_header_tab_' + h), h = l.data('name'));
                        l = l.data('id');
                        switch (f) {
                        case 0:
                            d.pid = l;
                            d.pname = h;
                            break;
                        case 1:
                            d.cid = l;
                            d.cname = h;
                            break;
                        case 2:
                            d.did = l;
                            d.dname = h;
                            break;
                        case 3:
                            d.sid = h ? l : '',
                            d.sname = h
                        }
                    }
                    $.Cookie.set('vip_address', encodeURIComponent($.stringifyJSON(d)), '.vip.com', '/', 17520);
                    $.Cookie.set('vip_province', d.pid, '.vip.com', '/', 17520);
                    b && $.Cookie.set('vip_wh', b, '.vip.com', '/', 720);
                    return d
                },
                getAreaId: function (a) {
                    var b,
                    c = $.Cookie.get('vip_address');
                    $.Cookie.get('vip_province');
                    var d = '',
                    d = c && $.parseJSON(decodeURIComponent(escape(c)));
                    switch (a) {
                    case 'province':
                        b =
                        d.pid;
                        break;
                    case 'city':
                        b = d.cid;
                        break;
                    case 'country':
                        b = d.did;
                        break;
                    case 'street':
                        b = d.sid
                    }
                    return b
                },
                getDetailAreaId: function () {
                    var a = $.Storage.get('address_storage_infoV2'),
                    e = b.get(1);
                    if (a && a.length) for (var c = this.addressNameArr[this.isAreaSwitch - 1], d = 0, f = a.length; d < f; d++) {
                        var g = a[d].tabAreaIds;
                        if (g[c] == e) {
                            e = g.street || g.country;
                            break
                        }
                    }
                    return e = e ? e : b.get(1)
                },
                getListAreaId: function () {
                    var a = '',
                    b = '',
                    a = $.Cookie.get('vip_address'),
                    c = $.Cookie.get('vip_province');
                    (a = a && $.parseJSON(decodeURIComponent(escape(a)))) && (b = a.sid ? a.sid : a.did ? a.did : a.cid ? a.cid : a.pid);
                    return b ? b : c
                }
            };
            h.exports = b
        },
        {
        }
    ]
}, {
}, [
    2
]);
