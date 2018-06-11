/**
 * @author         bofei
 * @changelog      ver 2.0 @ 2012-3-12    Initialize release
 * �°汾ʵ���˴˹��ܣ���ģ����Լ�
 *
 */

SNS.define(function () {

    var S = KISSY;
    var RURL = /^(\w+:)?\/\/([^\/?#]+)/;
    var PROXYNAME = "crossdomain.htm";

    var iframeProxys = {};//��Ŵ���iframe����ֹ�ٴ�����

    /**
     * <ul>
     * <li>��ͬ�������µ��� KISSY.ajax ������Դ;</li>
     * <li>����������������ͨһ��id Ϊ��J_Crossdomain����iframe��ȡ�������Ŀ¼�µĴ����ļ�
     * crossdomain.htm ��������<li>
     * <li>����������������ϵ����ʹ��jsonp��������</li>
     * </ul>
     *
     * @class �� KISSY.ajax �����˷�װ���ӿڲ�����KISSY.io����һ�£�����SNSDK����Ҫ�ڼ������������ǿ
     * <ul>
     *     <li>�Զ�����������Ա������¶�����ʹ��ԭ����XHR�����������󣬱���ʹ��JSONP������ȫ����������������</li>
     *     <li>�Զ�����token����</li>
     *     <li>�Զ����ʱ���</li>
     *     <li>�ṩ����ģ�⹦�ܣ���url��û�п������ʱ������ʹ��Щģʽ����ģ������</li>
     * </ul>��
     * @name SNS.ajax

     * @param configs {Object} ������Ϣ,�����û�����KISSY.ajax��ͬ��������һ��use����,����һ��response����
     *  <ul>
     *     <li><p>use:     {string}��������ķ�ʽ��֧�����֣��ֱ���ԭ����XHR��xhr��,ͨ��iframe����(iframe),��JSONP(jsonp)���������ֶ����ã����Զ��ж�</p></li>
     *     <li><p>response: {object}ģ�ⷢ������ʱʹ�á���url�����ã�������response, ������������success��������response��Ϊ��һ��������</p></li>
     *  </ul>
     *  @example <p>
     *
     *      SNS.ajax({url:""})
     *  </p>
     *  @example
     *  //����ģ�鹦��
     *  SNS.ajax({
     *      response:{msg:"����ģ������"}��
     *      success:function(data){alert(data.msg)}
     *  })
     *
     */
    var Ajax = {

        /*
         * �Զ��жϿ��򣬷�������
         *
         * @function
         * @param url {String} Ҫ������Դ��url��ַ
         * @param c {Object} ������Ϣ
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
         * ���ݿ��������ѡ������ʽ
         */
        _autoCheck     :function (url) {
            var use = "xhr", p, l = location, pa, ha, ps, hs;
            p = RURL.exec(url);
            if (p) {
                if (p[1] !== l.protocol || p[2] !== l.host) {
                    use = "message";								//Ĭ��ʹ��message����
                    /*
                     * https���죬ȥ����Э��ͷ������p[1]ֵΪundefined
                     * Ĭ��url��protocolͬ��ǰlocation.protocol��ͬ
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

        //����ԭ���� ajax �ص�����
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

    var callbacks = {};		//�ص�����, ����

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

            // ��iframe������ɺ�������
            //�ο���http://www.planabc.net/2009/09/22/iframe_onload/
            S.Event.on(iframe, "load", function () {
                iframe._loaded = true;
                createCallback && createCallback(iframe);
                callback && callback(iframe);
            });
            //��ȡ������Դ��iframe�����ļ�
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