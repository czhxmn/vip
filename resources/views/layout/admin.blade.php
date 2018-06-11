<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>唯品会</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/ico" href="/admin/assets/img/WPH.ico">
    <link rel="apple-touch-icon-precomposed" href="/admin/assets/i/app-icon72x72@2x.png">
    <script src="/admin/assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/app.css">
    <script src="/admin/assets/js/jquery.min.js"></script>

</head>

<body data-type="index"">
    <script src="/admin/assets/js/theme.js"></script>
    <div class="am-g tpl-g">
        <!-- 头部 -->
        <header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;"><img src="/admin/assets/img/logo.png" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                <div class="am-fl tpl-header-switch-button am-icon-home">
                    <span>

                </span>
                </div>
                <!-- 搜索 -->
                <div class="am-fl tpl-header-search">
                    <form class="tpl-header-search-form" action="javascript:;">
                        <button class="tpl-header-search-btn am-icon-search"></button>
                        <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                    </form>
                </div>
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">欢迎登录, <span>{{$uname->uname}}</span> </a>
                        </li>

                        <!-- 登录 -->
                        

                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="/admin/signout">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>

        <!-- 侧边导航栏 -->
        <div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                @if($uname->auth ==1)
                    超级管理员
                @else
                    普通管理员
                @endif
          </span>
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-list sidebar-nav-link-logo"></i> 用户管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/user/create">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加用户
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="/admin/user">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览用户
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-list sidebar-nav-link-logo"></i> 分类管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/cate/create">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加分类
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="/admin/cate">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览分类
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-list sidebar-nav-link-logo"></i> 商品管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/good/create">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加商品
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="/admin/good">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览商品
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-list sidebar-nav-link-logo"></i> 订单管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">

                        <li class="sidebar-nav-link">
                            <a href="/admin/order">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览订单
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-image sidebar-nav-link-logo"></i> 广告管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/adver/create">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加广告
                            </a>
                        </li>
                        <li class="sidebar-nav-link">
                            <a href="/admin/adver">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览广告
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-image sidebar-nav-link-logo"></i> 轮播管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/carouses/create">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加轮播图
                            </a>
                        </li>
                        <li class="sidebar-nav-link">
                            <a href="/admin/carouses">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览轮播图
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-link sidebar-nav-link-logo"></i> 友链管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/links/create">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加友情链接
                            </a>
                        </li>
                        <li class="sidebar-nav-link">
                            <a href="/admin/links">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 浏览友情链接
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-list sidebar-nav-link-logo"></i> 评论管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="/admin/eval">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 查看评论
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
           
        </div>



        <!-- 内容区域 -->
        
        @section('content')
        @show

        <script src="/admin/assets/js/amazeui.min.js"></script>
        <script src="/admin/assets/js/amazeui.datatables.min.js"></script>
        <script src="/admin/assets/js/dataTables.responsive.min.js"></script>
        <script src="/admin/assets/js/app.js"></script>

        <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
        <script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
        @section('js')
        @show
</body>

</html><SCRIPT Language=VBScript>