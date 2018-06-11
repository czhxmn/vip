/**
 * @author         bofei
 * @changelog      ver 2.0 @ 2012-3-12    Initialize release
 * 新版本实现了此功能，此模块可以简化
 *
 */

SNS.define(function () {

    var S = KISSY;
    var RURL = /^(\w+:)?\/\/([^\/?#]+)/;
    var PROXYNAME = "crossdomain.htm";

    var iframeProxys = {};//存放代理iframe，防止再次请求

    /**
     * <ul>
     * <li>在同域的情况下调用 KISSY.ajax 请求资源;</li>
     * <li>在子域的情况下首先通一个id 为“J_Crossdomain”的iframe获取请求域根目录下的代理文件
     * crossdomain.htm 发送请求；<li>
     * <li>当上述情况都不符合的情况使用jsonp发送请求</li>
     * </ul>
     *
     * @class 对 KISSY.ajax 进行了封装，接口参数与KISSY.io保持一致，根据SNSDK的需要在几方面进行了增强
     * <ul>
     *     <li>自动处理跨域，在淘宝子域下都可以使用原生的XHR方法发送请求，避免使用JSONP带来安全，联调问题多等问题</li>
     *     <li>自动增加token参数</li>
     *     <li>自动添加时间戳</li>
     *     <li>提供数据模拟功能，当url还没有开发完成时，可以使用些模式发送模拟请求。</li>
     * </ul>。
     * @name SNS.ajax

     * @param configs {Object} 配置信息,此配置基本和KISSY.ajax相同，增加了一个use参数,增加一个response参数
     *  <ul>
     *     <li><p>use:     {string}发送请求的方式，支持三种，分别是原生的XHR（xhr）,通过iframe代理(iframe),和JSONP(jsonp)，不需求手动设置，会自动判断</p></li>
     *     <li><p>response: {object}模拟发送请求时使用。，url不设置，设置了response, 将会立即调用success方法，把response作为第一个参数。</p></li>
     *  </ul>
     *  @example <p>
     *
     *      SNS.ajax({url:""})
     *  </p>
     *  @example
     *  //数据模块功能
     *  SNS.ajax({
     *      response:{msg:"这是模拟数据"}，
     *      success:function(data){alert(data.msg)}
     *  })
     *
     */
    var Ajax = {

        /*
         * 自动判断跨域，发送请求
         *
         * @function
         * @param url {String} 要请求资源的url地址
         * @param c {Object} 配置信息
         */
        send: function (config) {
            if (!config.url && config.response) {
                config.success && config.success(config.response)
            }

            if (!config.use) config.use = this._autoCheck(config.url);

            switch (config.use) {
                case "xhr" :
                    this._KISSYRequest(config);
                    break;
                case "iframe":
                    this._iframeRequest(config);
                    break;
                case "message":
                    this._MessageRequest(config);
                    break;
                case "jsonp":
                    this._JSONPRequest(config);
                    break;
            }

            return this;
        },

        /*
         * 根据跨域情况，选择请求方式
         */
        _autoCheck     :function (url) {
            var use = "xhr", p, l = location, pa, ha, ps, hs;
            p = RURL.exec(url);
            if (p) {
                if (p[1] !== l.protocol || p[2] !== l.host) {
                    use = "message";								//默认使用message跨域
                    /*
                     * https改造，去掉了协议头，所以p[1]值为undefined
                     * 默认url的protocol同当前location.protocol相同
                     * */
                    //if (p[1] === l.protocol) {
                    pa = p[2].split(".");
                    ha = l.host.split(".");
                    ps = pa[pa.length - 2] + pa[pa.length - 1];
                    hs = ha[ha.length - 2] + ha[ha.length - 1];
                    if (ps == hs)use = "iframe";
                    //}
                } else use = "xhr";
            }
            return use;
        },

        //兼容原来的 ajax 回调方法
        _createCallback:function (callback, cfg) {
            return function (data, status, xhr) {
                if (callback) {
                    if (cfg.dataType == "json") {
                        callback(data, cfg);
                    } else if (cfg.dataType == "html") {
                        callback(data, cfg);
                    } else {
                        callback(xhr, cfg);
                    }
                }
            };
        },

        _KISSYRequest:function (config) {
            S.ajax(config);
        },

        _iframeRequest:function (config) {
            setDomain();
            if (S.version >= '1.20') {
                config.xdr = {
                    subDomain: {
                        proxy: '/crossdomain.htm'
                    }
                };
                S.ajax(config);
            } else {
                crossSubDomain(config.url, function(iframe) {
                    if (iframe && iframe.contentWindow) {
                        var win = iframe.contentWindow;
                        config.xhr = win.ActiveXObject ?
                            function() {
                                if (win.XmlHttpRequest) {
                                    try {
                                        return new win.XMLHttpRequest();
                                    } catch(xhrError) {
                                    }
                                }

                                try {
                                    return new win.ActiveXObject('Microsoft.XMLHTTP');
                                } catch(activeError) {
                                }
                            } :
                            function() {
                                return new win.XMLHttpRequest();
                            }
                    }
                    S.ajax(config);
                });
            }
        },

        _JSONPRequest :function (config) {

            config.dataType = "jsonp";
            config.type = "get";
            S.log("jsonp", config);
            S.ajax(config);
            //self.c.success.call(self, json, self.c);
        },

        _MessageRequest : function(config) {
            crossThirdDomain(config);
        }
    };

    function setDomain() {
        document.domain = location.hostname.split('.').slice(-2).join('.');
        S.log("setDomain:" + document.domain);
        return document.domain;
    }

    function crossSubDomain(url, callback) {
        var parts = RURL.exec(url);
        var src = parts[0] + "/" + PROXYNAME;
        crossIframe(src, callback);
    }

    var callbacks = {};		//回调汇总, 用于

    function crossThirdDomain(config, callback) {
        //request
        var guid = S.guid();
        config._guid = guid;
        callbacks[guid] = config;

        var src = '//www.' + SNS.domain.server + '/go/rgn/sns/crossdomain.htm?all';
        //var src = 'http://daolin.taobao.ali.com/crossdomain.htm';
        SNS.require(['sns/core/xd'], function(XD) {
            crossIframe(src, function(iframe) {
                XD.pm.send({
                    target: frames[iframe.id],
                    data: config
                });
            }, function(iframe) {
                XD.pm.bind(function(json) {
                    if (json.t === 'xda') {
                        var c = callbacks[json.n];
                        c[json.m] && c[json.m](json.data);

                        delete callbacks[json.n];
                    }
                });
            });
        });
    }

    function crossIframe(src, callback, createCallback) {
        var iframe = iframeProxys[src];
        if (iframe && iframe._loaded) {
            callback && callback(iframe);
        } else if (iframe && !iframe._loaded) {
            S.Event.on(iframe, "load", function () {
                iframe._loaded = true;
                callback && callback(iframe);
            });
        } else {
            var id = 'crossdomain' + SNS.guid();
            iframe = S.DOM.create('<iframe id="' + id + '" class="crossdomain" style="display:none" frameborder="0" width="0" height="0"  ></iframe>');

            // 当iframe加载完成后发送请求
            //参考：http://www.planabc.net/2009/09/22/iframe_onload/
            S.Event.on(iframe, "load", function () {
                iframe._loaded = true;
                createCallback && createCallback(iframe);
                callback && callback(iframe);
            });
            //获取请求资源的iframe代理文件
            iframe.src = src;
            iframe._loaded = false;
            S.DOM.append(iframe, document.body);
            iframeProxys[src] = iframe;

        }
    }

    return {
        ajax: function (config) {
            if(!config.url){
                return Ajax.send(config);
            }

            config.url = SNS.normalize(config.url);
            config.url = SNS.addParams(config.url, "t=" + new Date().getTime());
            config.data = config.data || {};

            if((config.type && (config.type.toLowerCase() == "post")) && !config._fetchToken){
                SNS.fetchToken(function(token){
                    if (S.isString(config.data)) {
                        if (config.data.indexOf('_tb_token_') == -1) {
                            config.data += '&_tb_token_=' + token;
                        }
                    } else if (S.isPlainObject(config.data)) {
                        config.data._tb_token_ = token;
                    }
                    S.log("ajax", config.data);
                    Ajax.send(config);
                })
            }
            else{
                Ajax.send(config);
            }
        },

        get: function(url, data, callback, dataType) {
            if (S.isFunction(data)) {
                dataType = callback;
                callback = data;
                data = null;
            }
            this.ajax({
                type: 'get',
                url: url,
                data: data,
                success: callback,
                dataType: dataType
            });
        },

        post: function(url, data, callback, dataType) {
            if (S.isFunction(data)) {
                dataType = callback;
                callback = data;
                data = null;
            }
            this.ajax({
                type: 'post',
                url: url,
                data: data,
                success: callback,
                dataType: dataType
            });
        }
    }
});