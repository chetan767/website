<!DOCTYPE html>
<html lang="en" id="facebook" class="no_js">
<head>
    <meta charset="utf-8"/>
    <meta name="referrer" content="default" id="meta_referrer"/>
    <script nonce="sSAq4EOF">
    window._cstart = +new Date();
    </script>
    <script nonce="sSAq4EOF">
    function envFlush(a) {
        function b(b) {
            for (var c in a)
                b[c] = a[c]
        }
        window.requireLazy ? window.requireLazy(["Env"], b) : (window.Env = window.Env || {}, b(window.Env))
    }
    envFlush({
        "ajaxpipe_token": "AXijg1k1qLipn08f",
        "timeslice_heartbeat_config": {
            "pollIntervalMs": 33,
            "idleGapThresholdMs": 60,
            "ignoredTimesliceNames": {
                "requestAnimationFrame": true,
                "Event listenHandler mousemove": true,
                "Event listenHandler mouseover": true,
                "Event listenHandler mouseout": true,
                "Event listenHandler scroll": true
            },
            "isHeartbeatEnabled": true,
            "isArtilleryOn": false
        },
        "shouldLogCounters": true,
        "timeslice_categories": {
            "react_render": true,
            "reflow": true
        },
        "sample_continuation_stacktraces": true,
        "dom_mutation_flag": true,
        "khsh": "0`sj`e`rm`s-0fdu^gshdoer-0gc^eurf-3gc^eurf;1;enbtldou;fduDmdldourCxO`ld-2YLMIuuqSdptdru;qsnunuxqd;rdoe-0unjdojnx-0unjdojnx0-0gdubi^rdbsduOdv-0`sj`e`r-0q`xm`r-0StoRbs`qhof-0mhoj^q`xm`r",
        "stack_trace_limit": 30,
        "timesliceBufferSize": 5000,
        "show_invariant_decoder": false,
        "compat_iframe_token": "AQ595RbrlJz_iKYp",
        "isCQuick": false
    });
    </script>
    <style nonce="sSAq4EOF"></style>
    <script nonce="sSAq4EOF">
    __DEV__ = 0;
    CavalryLogger = window.CavalryLogger || function(a) {
        this.lid = a,
        this.transition = !1,
        this.metric_collected = !1,
        this.is_detailed_profiler = !1,
        this.instrumentation_started = !1,
        this.pagelet_metrics = {},
        this.events = {},
        this.ongoing_watch = {},
        this.values = {
            t_cstart: window._cstart
        },
        this.piggy_values = {},
        this.bootloader_metrics = {},
        this.resource_to_pagelet_mapping = {},
        this.initializeInstrumentation && this.initializeInstrumentation()
    },
    CavalryLogger.prototype.setIsDetailedProfiler = function(a) {
        this.is_detailed_profiler = a;
        return this
    },
    CavalryLogger.prototype.setTTIEvent = function(a) {
        this.tti_event = a;
        return this
    },
    CavalryLogger.prototype.setValue = function(a, b, c, d) {
        d = d ? this.piggy_values : this.values;
        (typeof d[a] === "undefined" || c) && (d[a] = b);
        return this
    },
    CavalryLogger.prototype.getLastTtiValue = function() {
        return this.lastTtiValue
    },
    CavalryLogger.prototype.setTimeStamp = CavalryLogger.prototype.setTimeStamp || function(a, b, c, d) {
        this.mark(a);
        var e = this.values.t_cstart || this.values.t_start;
        e = d ? e + d : CavalryLogger.now();
        this.setValue(a, e, b, c);
        this.tti_event && a == this.tti_event && (this.lastTtiValue = e, this.setTimeStamp("t_tti", b));
        return this
    },
    CavalryLogger.prototype.mark = typeof console === "object" && console.timeStamp ? function(a) {
        console.timeStamp(a)
    } : function() {},
    CavalryLogger.prototype.addPiggyback = function(a, b) {
        this.piggy_values[a] = b;
        return this
    },
    CavalryLogger.instances = {},
    CavalryLogger.id = 0,
    CavalryLogger.getInstance = function(a) {
        typeof a === "undefined" && (a = CavalryLogger.id);
        CavalryLogger.instances[a] || (CavalryLogger.instances[a] = new CavalryLogger(a));
        return CavalryLogger.instances[a]
    },
    CavalryLogger.setPageID = function(a) {
        if (CavalryLogger.id === 0) {
            var b = CavalryLogger.getInstance();
            CavalryLogger.instances[a] = b;
            CavalryLogger.instances[a].lid = a;
            delete CavalryLogger.instances[0]
        }
        CavalryLogger.id = a
    },
    CavalryLogger.now = function() {
        return window.performance && performance.timing && performance.timing.navigationStart && performance.now ? performance.now() + performance.timing.navigationStart : new Date().getTime()
    },
    CavalryLogger.prototype.measureResources = function() {},
    CavalryLogger.prototype.profileEarlyResources = function() {},
    CavalryLogger.getBootloaderMetricsFromAllLoggers = function() {},
    CavalryLogger.start_js = function() {},
    CavalryLogger.done_js = function() {};
    CavalryLogger.getInstance().setTTIEvent("t_domcontent");
    CavalryLogger.prototype.measureResources = function(a, b) {
        if (!this.log_resources)
            return;
        var c = "bootload/" + a.name;
        if (this.bootloader_metrics[c] !== void 0 || this.ongoing_watch[c] !== void 0)
            return;
        var d = CavalryLogger.now();
        this.ongoing_watch[c] = d;
        "start_" + c in this.bootloader_metrics || (this.bootloader_metrics["start_" + c] = d);
        b && !("tag_" + c in this.bootloader_metrics) && (this.bootloader_metrics["tag_" + c] = b);
        if (a.type === "js") {
            c = "js_exec/" + a.name;
            this.ongoing_watch[c] = d
        }
    },
    CavalryLogger.prototype.stopWatch = function(a) {
        if (this.ongoing_watch[a]) {
            var b = CavalryLogger.now(),
                c = b - this.ongoing_watch[a];
            this.bootloader_metrics[a] = c;
            var d = this.piggy_values;
            a.indexOf("bootload") === 0 && (d.t_resource_download || (d.t_resource_download = 0), d.resources_downloaded || (d.resources_downloaded = 0), d.t_resource_download += c, d.resources_downloaded += 1, d["tag_" + a] == "_EF_" && (d.t_pagelet_cssload_early_resources = b));
            delete this.ongoing_watch[a]
        }
        return this
    },
    CavalryLogger.getBootloaderMetricsFromAllLoggers = function() {
        var a = {};
        Object.values(window.CavalryLogger.instances).forEach(function(b) {
            b.bootloader_metrics && Object.assign(a, b.bootloader_metrics)
        });
        return a
    },
    CavalryLogger.start_js = function(a) {
        for (var b = 0; b < a.length; ++b)
            CavalryLogger.getInstance().stopWatch("js_exec/" + a[b])
    },
    CavalryLogger.done_js = function(a) {
        for (var b = 0; b < a.length; ++b)
            CavalryLogger.getInstance().stopWatch("bootload/" + a[b])
    },
    CavalryLogger.prototype.profileEarlyResources = function(a) {
        for (var b = 0; b < a.length; b++)
            this.measureResources({
                name: a[b][0],
                type: a[b][1] ? "js" : ""
            }, "_EF_")
    };
    CavalryLogger.getInstance().log_resources = true;
    CavalryLogger.getInstance().setIsDetailedProfiler(true);
    window.CavalryLogger && CavalryLogger.getInstance().setTimeStamp("t_start");
    </script>
    <noscript>
        <meta http-equiv="refresh" content="0; URL=/?_fb_noscript=1"/>
    </noscript>
    <link rel="manifest" href="/data/manifest/" crossorigin="use-credentials"/>
    <title id="pageTitle">Facebook – log in or sign up</title>
    <meta property="og:site_name" content="Facebook"/>
    <meta property="og:url" content="https://www.facebook.com/"/>
    <meta property="og:image" content="https://www.facebook.com/images/fb_icon_325x325.png"/>
    <meta property="og:locale" content="en_GB"/>
    <script type="application/ld+json" nonce="sSAq4EOF">{"\u0040context":"http:\/\/schema.org","\u0040type":"WebSite","name":"Facebook","url":"https:\/\/www.facebook.com\/"}</script>
    <link rel="search" type="application/opensearchdescription+xml" href="/osd.xml" title="Facebook"/>
    <link rel="canonical" href="https://www.facebook.com/"/>
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.facebook.com/?locale2=en_GB"/>
    <link rel="alternate" media="handheld" href="https://m.facebook.com/?locale2=en_GB"/>
    <link rel="alternate" hreflang="x-default" href="https://www.facebook.com/"/>
    <link rel="alternate" hreflang="en" href="https://www.facebook.com/"/>
    <link rel="alternate" hreflang="ar" href="https://ar-ar.facebook.com/"/>
    <link rel="alternate" hreflang="bg" href="https://bg-bg.facebook.com/"/>
    <link rel="alternate" hreflang="bs" href="https://bs-ba.facebook.com/"/>
    <link rel="alternate" hreflang="ca" href="https://ca-es.facebook.com/"/>
    <link rel="alternate" hreflang="da" href="https://da-dk.facebook.com/"/>
    <link rel="alternate" hreflang="el" href="https://el-gr.facebook.com/"/>
    <link rel="alternate" hreflang="es" href="https://es-la.facebook.com/"/>
    <link rel="alternate" hreflang="es-es" href="https://es-es.facebook.com/"/>
    <link rel="alternate" hreflang="fa" href="https://fa-ir.facebook.com/"/>
    <link rel="alternate" hreflang="fi" href="https://fi-fi.facebook.com/"/>
    <link rel="alternate" hreflang="fr" href="https://fr-fr.facebook.com/"/>
    <link rel="alternate" hreflang="fr-ca" href="https://fr-ca.facebook.com/"/>
    <link rel="alternate" hreflang="hi" href="https://hi-in.facebook.com/"/>
    <link rel="alternate" hreflang="hr" href="https://hr-hr.facebook.com/"/>
    <link rel="alternate" hreflang="id" href="https://id-id.facebook.com/"/>
    <link rel="alternate" hreflang="it" href="https://it-it.facebook.com/"/>
    <link rel="alternate" hreflang="ko" href="https://ko-kr.facebook.com/"/>
    <link rel="alternate" hreflang="mk" href="https://mk-mk.facebook.com/"/>
    <link rel="alternate" hreflang="ms" href="https://ms-my.facebook.com/"/>
    <link rel="alternate" hreflang="pl" href="https://pl-pl.facebook.com/"/>
    <link rel="alternate" hreflang="pt" href="https://pt-br.facebook.com/"/>
    <link rel="alternate" hreflang="pt-pt" href="https://pt-pt.facebook.com/"/>
    <link rel="alternate" hreflang="ro" href="https://ro-ro.facebook.com/"/>
    <link rel="alternate" hreflang="sl" href="https://sl-si.facebook.com/"/>
    <link rel="alternate" hreflang="sr" href="https://sr-rs.facebook.com/"/>
    <link rel="alternate" hreflang="th" href="https://th-th.facebook.com/"/>
    <link rel="alternate" hreflang="vi" href="https://vi-vn.facebook.com/"/>
    <meta name="description" content="Create an account or log in to Facebook. Connect with friends, family and other people you know. Share photos and videos, send messages and get updates."/>
    <meta name="robots" content="noodp,noydir"/>
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yo/r/iRmz9lCMBD2.ico"/>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yK/l/0,cross/9JilckQm64D.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="Yf+3B"/>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yC/l/0,cross/JcsGD9k6cEr.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="+yxuV"/>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yA/l/0,cross/AGzLc3OvUpJ.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="iuP6O"/>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yR/l/0,cross/uHL2LL5S7lr.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="PQati"/>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yh/l/0,cross/BvTAMGEH2tS.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="Ita5j"/>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/ye/l/0,cross/o012Q45pMlH.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="2tCzQ"/>
    <script src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/IhmM9u1rhOV.js?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="xH3sH" nonce="sSAq4EOF"></script>
    <script nonce="sSAq4EOF">
    requireLazy(["HasteSupportData"], function(m) {
        m.handle({
            "gkxData": {
                "676837": {
                    "result": false,
                    "hash": "AT4czaxlFJ9p43CA"
                },
                "708253": {
                    "result": false,
                    "hash": "AT4FS0-N6V_VIack"
                },
                "946894": {
                    "result": false,
                    "hash": "AT6zuXqmf3VkFX3_"
                },
                "996940": {
                    "result": false,
                    "hash": "AT5jicn5CEnCxNIf"
                },
                "1263340": {
                    "result": false,
                    "hash": "AT5sJfy_-3jIYEvl"
                },
                "1656910": {
                    "result": false,
                    "hash": "AT6QxaG1YEFvowQ8"
                },
                "676920": {
                    "result": true,
                    "hash": "AT6J1_PtdejhkFln"
                },
                "676921": {
                    "result": false,
                    "hash": "AT6fXIVvToOdVcpz"
                },
                "1073500": {
                    "result": false,
                    "hash": "AT4RiPfNGEDnfVpY"
                },
                "1167394": {
                    "result": false,
                    "hash": "AT7BM-yfL-3x52o7"
                },
                "676838": {
                    "result": false,
                    "hash": "AT5OHdKhp0oP3bBC"
                },
                "1217157": {
                    "result": false,
                    "hash": "AT4gE6Abr7eJdnnR"
                },
                "1224637": {
                    "result": false,
                    "hash": "AT4x7XhG7H-JHi6l"
                },
                "1458993": {
                    "result": false,
                    "hash": "AT59eGGtTn1P0Gy9"
                },
                "1554827": {
                    "result": false,
                    "hash": "AT6qhPtrmqnm0TFL"
                },
                "1565874": {
                    "result": false,
                    "hash": "AT4LT84r9ggRAJO8"
                }
            },
            "qexData": {
                "1495392": {
                    "r": null
                },
                "1505135": {
                    "r": null
                }
            }
        })
    });
    requireLazy(["TimeSliceImpl", "ServerJS"], function(TimeSlice, ServerJS) {
        (new ServerJS()).handle({
            "define": [["URLFragmentPreludeConfig", [], {
                "hashtagRedirect": true,
                "fragBlacklist": ["nonce", "access_token", "oauth_token", "xs", "checkpoint_data", "code"]
            }, 137], ["BootloaderConfig", [], {
                "deferBootloads": false,
                "highPriBootloads": false,
                "jsRetries": [200, 500],
                "jsRetryAbortNum": 2,
                "jsRetryAbortTime": 5,
                "retryQueuedBootloads": false,
                "silentDups": false
            }, 329], ["CSSLoaderConfig", [], {
                "timeout": 5000,
                "modulePrefix": "BLCSS:",
                "loadEventSupported": true
            }, 619], ["CookieCoreConfig", [], {
                "a11y": {},
                "c_user": {},
                "cppo": {
                    "t": 86400
                },
                "dpr": {
                    "t": 604800
                },
                "i_user": {},
                "js_ver": {
                    "t": 604800
                },
                "locale": {
                    "t": 604800
                },
                "m_pixel_ratio": {
                    "t": 604800
                },
                "noscript": {},
                "presence": {},
                "sfau": {},
                "wd": {
                    "t": 604800
                },
                "x-referer": {},
                "x-src": {
                    "t": 1
                }
            }, 2104], ["CurrentCommunityInitialData", [], {}, 490], ["CurrentEnvironment", [], {
                "facebookdotcom": true,
                "messengerdotcom": false,
                "workplacedotcom": false
            }, 827], ["CurrentUserInitialData", [], {
                "USER_ID": "0",
                "ACCOUNT_ID": "0",
                "NAME": "",
                "SHORT_NAME": null,
                "IS_BUSINESS_PERSON_ACCOUNT": false,
                "HAS_SECONDARY_BUSINESS_PERSON": false,
                "IS_MESSENGER_ONLY_USER": false,
                "IS_DEACTIVATED_ALLOWED_ON_MESSENGER": false,
                "IS_MESSENGER_CALL_GUEST_USER": false,
                "APP_ID": "256281040558"
            }, 270], ["DTSGInitialData", [], {}, 258], ["ISB", [], {}, 330], ["LSD", [], {
                "token": "AVqEh68k"
            }, 323], ["ServerNonce", [], {
                "ServerNonce": "YVZ041rMemUeIMbqOCMIiw"
            }, 141], ["SiteData", [], {
                "server_revision": 1002714654,
                "client_revision": 1002714654,
                "tier": "",
                "push_phase": "C3",
                "pkg_cohort": "PHASED:DEFAULT",
                "pr": 2,
                "haste_site": "www",
                "be_one_ahead": false,
                "ir_on": true,
                "is_rtl": false,
                "is_comet": false,
                "is_experimental_tier": false,
                "is_jit_warmed_up": true,
                "hsi": "6875919656203608370-0",
                "semr_host_bucket": "5",
                "spin": 4,
                "__spin_r": 1002714654,
                "__spin_b": "trunk",
                "__spin_t": 1600924799,
                "vip": "69.171.250.35"
            }, 317], ["SprinkleConfig", [], {
                "param_name": "jazoest",
                "version": 2,
                "should_randomize": false
            }, 2111], ["UserAgentData", [], {
                "browserArchitecture": "32",
                "browserFullVersion": "14.0",
                "browserMinorVersion": 0,
                "browserName": "Safari",
                "browserVersion": 14,
                "deviceName": "Unknown",
                "engineName": "WebKit",
                "engineVersion": "605.1.15",
                "platformArchitecture": "32",
                "platformName": "Mac OS X",
                "platformVersion": "10.15",
                "platformFullVersion": "10.15.6"
            }, 527], ["PromiseUsePolyfillSetImmediateGK", [], {
                "www_always_use_polyfill_setimmediate": false
            }, 2190], ["KSConfig", [], {
                "killed": {
                    "__set": ["EO_DISABLE_SYSTEM_SERIAL_NUMBER_FREE_TYPING_IN_CPE_NON_CLIENT", "POCKET_MONSTERS_CREATE", "POCKET_MONSTERS_DELETE", "VIDEO_DIMENSIONS_FROM_PLAYER_IN_UPLOAD_DIALOG", "POCKET_MONSTERS_UPDATE_NAME", "ADS_PLACEMENT_FIX_PUBLISHER_PLATFORMS_MUTATION", "MOBILITY_KILL_OLD_VISIBILITY_POSITION_SETTING", "WORKPLACE_DISPLAY_TEXT_EVIDENCE_REPORTING", "DYNAMIC_ADS_SET_CATALOG_AND_PRODUCT_SET_TOGETHER", "BUSINESS_GRAPH_SETTING_APP_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_WABA_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_ESG_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_PRODUCT_CATALOG_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_BU_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_SESG_ASSIGNED_USERS_NEW_API", "WORKPLACE_PLATFORM_SECURE_APPS_MAILBOXES", "LAB_NET_NEW_UI_RELEASE", "EO_SRT_HELPDESK_DASHBOARD_DISABLE_UNUSED_TAB_IN_RIGHT_PANEL", "BUSINESS_INVITE_FLOW_WITH_SELLER_PROFILE", "HELPDESK_USE_XDS_SEARCHABLE_INPUT_FOR_WORKFLOW", "MLHUB_FLOW_AUTOREFRESH_SEARCH", "AD_DRAFT_ENABLE_SYNCRHONOUS_FRAGMENT_VALIDATION", "NEKO_DISABLE_CREATE_FOR_SAP"]
                },
                "ko": {
                    "__set": ["9NpkGYwzrPG", "acrJTh9WGdp", "1oOE64fL4wO", "2dhqRnqXGLQ", "7r6mSP7ofr2", "1ntjZ2zgf03", "3oh5Mw86USj", "8NAceEy9JZo", "5mNEXob0nTj", "4j36SVzvP3w", "8PlKuowafe8", "53gCxKq281G", "3yzzwBY7Npj", "4NSq3ZC4ScE", "1onzIv0jH6H", "5XCz1h9Iaw3", "DDZhogI19W", "6fHw06UmAMW", "7FOIzos6XJX", "aDayprn6pbH", "3OsLvnSHNTt", "8rDvN9vWdAK", "1G7wJ6bJt9K"]
                }
            }, 2580], ["JSErrorLoggingConfig", [], {
                "appId": 256281040558,
                "extra": [],
                "reportInterval": 50,
                "sampleWeight": null,
                "sampleWeightKey": "__jssesw"
            }, 2776], ["CookieCoreLoggingConfig", [], {
                "maximumIgnorableStallMs": 16.67,
                "sampleRate": 9.7e-5,
                "sampleRateClassic": 1.0e-10,
                "sampleRateFastStale": 1.0e-8
            }, 3401], ["ImmediateImplementationExperiments", [], {
                "prefer_message_channel": true
            }, 3419], ["DTSGInitData", [], {
                "token": "",
                "async_get_token": ""
            }, 3515], ["UriNeedRawQuerySVConfig", [], {
                "uris": ["dms.netmng.com", "doubleclick.net", "r.msn.com", "watchit.sky.com", "graphite.instagram.com", "www.kfc.co.th", "learn.pantheon.io", "www.landmarkshops.in", "www.ncl.com", "s0.wp.com", "www.tatacliq.com", "bs.serving-sys.com", "kohls.com", "lazada.co.th", "xg4ken.com", "technopark.ru", "officedepot.com.mx", "bestbuy.com.mx", "booking.com"]
            }, 3871], ["InitialCookieConsent", [], {
                "deferCookies": false,
                "noCookies": false,
                "shouldShowCookieBanner": false
            }, 4328], ["TrustedTypesConfig", [], {
                "useTrustedTypes": false,
                "reportOnly": true
            }, 4548], ["WebConnectionClassServerGuess", [], {
                "connectionClass": "EXCELLENT"
            }, 4705], ["CometAltpayJsSdkIframeAllowedDomains", [], {
                "allowed_domains": ["https:\/\/live.adyen.com", "https:\/\/integration-facebook.payu.in", "https:\/\/facebook.payulatam.com", "https:\/\/secure.payu.com", "https:\/\/facebook.dlocal.com", "https:\/\/buy2.boku.com", "https:\/\/altpay-pe-test.herokuapp.com"]
            }, 4920], ["BootloaderEndpointConfig", [], {
                "endpointURI": "https:\/\/www.facebook.com\/ajax\/bootloader-endpoint\/",
                "debugNoBatching": false
            }, 5094], ["BigPipeExperiments", [], {
                "link_images_to_pagelets": false,
                "enable_bigpipe_plugins": false
            }, 907], ["AsyncRequestConfig", [], {
                "retryOnNetworkError": "1",
                "useFetchStreamAjaxPipeTransport": false
            }, 328], ["FbtQTOverrides", [], {
                "overrides": {}
            }, 551], ["FbtResultGK", [], {
                "shouldReturnFbtResult": true,
                "inlineMode": "NO_INLINE"
            }, 876], ["IntlPhonologicalRules", [], {
                "meta": {
                    "\/_B\/": "([.,!?\\s]|^)",
                    "\/_E\/": "([.,!?\\s]|$)"
                },
                "patterns": {
                    "\/\u0001(.*)('|&#039;)s\u0001(?:'|&#039;)s(.*)\/": "\u0001$1$2s\u0001$3",
                    "\/_\u0001([^\u0001]*)\u0001\/": "javascript"
                }
            }, 1496], ["IntlViewerContext", [], {
                "GENDER": 3
            }, 772], ["NumberFormatConfig", [], {
                "decimalSeparator": ".",
                "numberDelimiter": ",",
                "minDigitsForThousandsSeparator": 4,
                "standardDecimalPatternInfo": {
                    "primaryGroupSize": 3,
                    "secondaryGroupSize": 3
                },
                "numberingSystemData": null
            }, 54], ["SessionNameConfig", [], {
                "seed": "1GMa"
            }, 757], ["ZeroCategoryHeader", [], {}, 1127], ["ZeroRewriteRules", [], {
                "rewrite_rules": {},
                "whitelist": {
                    "\/hr\/r": 1,
                    "\/hr\/p": 1,
                    "\/zero\/unsupported_browser\/": 1,
                    "\/zero\/policy\/optin": 1,
                    "\/zero\/optin\/write\/": 1,
                    "\/zero\/optin\/legal\/": 1,
                    "\/zero\/optin\/free\/": 1,
                    "\/about\/privacy\/": 1,
                    "\/about\/privacy\/update\/": 1,
                    "\/about\/privacy\/update": 1,
                    "\/zero\/toggle\/welcome\/": 1,
                    "\/zero\/toggle\/nux\/": 1,
                    "\/fup\/interstitial\/": 1,
                    "\/work\/landing": 1,
                    "\/work\/login\/": 1,
                    "\/work\/email\/": 1,
                    "\/ai.php": 1,
                    "\/js_dialog_resources\/dialog_descriptions_android.json": 0,
                    "\/connect\/jsdialog\/MPlatformAppInvitesJSDialog\/": 0,
                    "\/connect\/jsdialog\/MPlatformOAuthShimJSDialog\/": 0,
                    "\/connect\/jsdialog\/MPlatformLikeJSDialog\/": 0,
                    "\/qp\/interstitial\/": 1,
                    "\/qp\/action\/redirect\/": 1,
                    "\/qp\/action\/close\/": 1,
                    "\/zero\/support\/ineligible\/": 1,
                    "\/zero_balance_redirect\/": 1,
                    "\/zero_balance_redirect": 1,
                    "\/zero_balance_redirect\/l\/": 1,
                    "\/l.php": 1,
                    "\/lsr.php": 1,
                    "\/ajax\/dtsg\/": 1,
                    "\/checkpoint\/block\/": 1,
                    "\/exitdsite": 1,
                    "\/zero\/balance\/pixel\/": 1,
                    "\/zero\/balance\/": 1,
                    "\/zero\/balance\/carrier_landing\/": 1,
                    "\/zero\/flex\/logging\/": 1,
                    "\/tr": 1,
                    "\/tr\/": 1,
                    "\/sem_campaigns\/sem_pixel_test\/": 1,
                    "\/bookmarks\/flyout\/body\/": 1,
                    "\/zero\/subno\/": 1,
                    "\/confirmemail.php": 1,
                    "\/policies\/": 1,
                    "\/mobile\/internetdotorg\/classifier\/": 1,
                    "\/zero\/dogfooding": 1,
                    "\/xti.php": 1,
                    "\/zero\/fblite\/config\/": 1,
                    "\/hr\/zsh\/wc\/": 1,
                    "\/ajax\/bootloader-endpoint\/": 1,
                    "\/4oh4.php": 1,
                    "\/autologin.php": 1,
                    "\/birthday_help.php": 1,
                    "\/checkpoint\/": 1,
                    "\/contact-importer\/": 1,
                    "\/cr.php": 1,
                    "\/legal\/terms\/": 1,
                    "\/login.php": 1,
                    "\/login\/": 1,
                    "\/mobile\/account\/": 1,
                    "\/n\/": 1,
                    "\/remote_test_device\/": 1,
                    "\/upsell\/buy\/": 1,
                    "\/upsell\/buyconfirm\/": 1,
                    "\/upsell\/buyresult\/": 1,
                    "\/upsell\/promos\/": 1,
                    "\/upsell\/continue\/": 1,
                    "\/upsell\/h\/promos\/": 1,
                    "\/upsell\/loan\/learnmore\/": 1,
                    "\/upsell\/purchase\/": 1,
                    "\/upsell\/promos\/upgrade\/": 1,
                    "\/upsell\/buy_redirect\/": 1,
                    "\/upsell\/loan\/buyconfirm\/": 1,
                    "\/upsell\/loan\/buy\/": 1,
                    "\/upsell\/sms\/": 1,
                    "\/wap\/a\/channel\/reconnect.php": 1,
                    "\/wap\/a\/nux\/wizard\/nav.php": 1,
                    "\/wap\/appreg.php": 1,
                    "\/wap\/birthday_help.php": 1,
                    "\/wap\/c.php": 1,
                    "\/wap\/confirmemail.php": 1,
                    "\/wap\/cr.php": 1,
                    "\/wap\/login.php": 1,
                    "\/wap\/r.php": 1,
                    "\/zero\/datapolicy": 1,
                    "\/a\/timezone.php": 1,
                    "\/a\/bz": 1,
                    "\/bz\/reliability": 1,
                    "\/r.php": 1,
                    "\/mr\/": 1,
                    "\/reg\/": 1,
                    "\/registration\/log\/": 1,
                    "\/terms\/": 1,
                    "\/f123\/": 1,
                    "\/expert\/": 1,
                    "\/experts\/": 1,
                    "\/terms\/index.php": 1,
                    "\/terms.php": 1,
                    "\/srr\/": 1,
                    "\/msite\/redirect\/": 1,
                    "\/fbs\/pixel\/": 1,
                    "\/contactpoint\/preconfirmation\/": 1,
                    "\/contactpoint\/cliff\/": 1,
                    "\/contactpoint\/confirm\/submit\/": 1,
                    "\/contactpoint\/confirmed\/": 1,
                    "\/contactpoint\/login\/": 1,
                    "\/preconfirmation\/contactpoint_change\/": 1,
                    "\/help\/contact\/": 1,
                    "\/survey\/": 1,
                    "\/upsell\/loyaltytopup\/accept\/": 1,
                    "\/settings\/": 1,
                    "\/lite\/": 1,
                    "\/zero_status_update\/": 1,
                    "\/operator_store\/": 1
                }
            }, 1478], ["IntlHoldoutGK", [], {
                "inIntlHoldout": false
            }, 2827], ["IntlNumberTypeConfig", [], {
                "impl": "if (n === 1) { return IntlVariations.NUMBER_ONE; } else { return IntlVariations.NUMBER_OTHER; }"
            }, 3405], ["DataStoreConfig", [], {
                "expandoKey": "__FB_STORE",
                "useExpando": true
            }, 2915], ["cr:696703", [], {
                "__rc": [null, "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:708886", ["EventProfilerImpl"], {
                "__rc": ["EventProfilerImpl", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:717822", ["TimeSliceImpl"], {
                "__rc": ["TimeSliceImpl", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:806696", ["clearTimeoutBlue"], {
                "__rc": ["clearTimeoutBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:807042", ["setTimeoutBlue"], {
                "__rc": ["setTimeoutBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:896462", ["setIntervalAcrossTransitionsBlue"], {
                "__rc": ["setIntervalAcrossTransitionsBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:986633", ["setTimeoutAcrossTransitionsBlue"], {
                "__rc": ["setTimeoutAcrossTransitionsBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:1003267", ["clearIntervalBlue"], {
                "__rc": ["clearIntervalBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:1183579", ["InlineFbtResultImpl"], {
                "__rc": ["InlineFbtResultImpl", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:1642797", ["BanzaiBase"], {
                "__rc": ["BanzaiBase", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:729414", ["VisualCompletion"], {
                "__rc": ["VisualCompletion", "Aa1grrBWXs18kww7h0kbEU0jnu-hjs6eoOuGYJWUIqC9SoTDKKmdcr6QZW9_Sjm8vZuFQIumxrHQ2b6CHNQ2"]
            }, -1], ["cr:1094907", [], {
                "__rc": [null, "Aa13kYmkqrODUJxe0vRUEaJ52zto9rUll_mw1w21Q2rAaWcnjcCkIDgcs7iNKdqYShuIbqL_A1j-Hw1ipVw"]
            }, -1], ["EventConfig", [], {
                "sampling": {
                    "bandwidth": 0,
                    "play": 0,
                    "playing": 0,
                    "progress": 0,
                    "pause": 0,
                    "ended": 0,
                    "seeked": 0,
                    "seeking": 0,
                    "waiting": 0,
                    "loadedmetadata": 0,
                    "canplay": 0,
                    "selectionchange": 0,
                    "change": 0,
                    "timeupdate": 0,
                    "adaptation": 0,
                    "focus": 0,
                    "blur": 0,
                    "load": 0,
                    "error": 0,
                    "message": 0,
                    "abort": 0,
                    "storage": 0,
                    "scroll": 200000,
                    "mousemove": 20000,
                    "mouseover": 10000,
                    "mouseout": 10000,
                    "mousewheel": 1,
                    "MSPointerMove": 10000,
                    "keydown": 0.1,
                    "click": 0.02,
                    "mouseup": 0.02,
                    "__100ms": 0.001,
                    "__default": 5000,
                    "__min": 100,
                    "__interactionDefault": 200,
                    "__eventDefault": 100000
                },
                "page_sampling_boost": 1,
                "interaction_regexes": {},
                "interaction_boost": {},
                "event_types": {},
                "manual_instrumentation": false,
                "profile_eager_execution": false,
                "disable_heuristic": true,
                "disable_event_profiler": true
            }, 1726], ["AdsInterfacesSessionConfig", [], {}, 2393], ["BanzaiConfig", [], {
                "MAX_SIZE": 10000,
                "MAX_WAIT": 150000,
                "RESTORE_WAIT": 150000,
                "blacklist": ["time_spent"],
                "gks": {
                    "boosted_pagelikes": true,
                    "mercury_send_error_logging": true,
                    "platform_oauth_client_events": true,
                    "visibility_tracking": true,
                    "graphexplorer": true,
                    "sticker_search_ranking": true
                }
            }, 7], ["QuickLogConfig", [], {
                "qpl_events": {
                    "393276": {
                        "sampleRate": 50
                    },
                    "470653": {
                        "sampleRate": 400
                    },
                    "473017": {
                        "sampleRate": 400
                    },
                    "483251": {
                        "sampleRate": 400
                    },
                    "655575": {
                        "sampleRate": 1
                    },
                    "655576": {
                        "sampleRate": 5000
                    },
                    "655584": {
                        "sampleRate": 1
                    },
                    "655653": {
                        "sampleRate": 250
                    },
                    "917556": {
                        "sampleRate": 100
                    },
                    "917557": {
                        "sampleRate": 1000
                    },
                    "920349": {
                        "sampleRate": 100
                    },
                    "924733": {
                        "sampleRate": 100
                    },
                    "1916714": {
                        "sampleRate": 250
                    },
                    "3473463": {
                        "sampleRate": 10000
                    },
                    "3473464": {
                        "sampleRate": 10000
                    },
                    "3473465": {
                        "sampleRate": 10
                    },
                    "3735589": {
                        "sampleRate": 100
                    },
                    "3735590": {
                        "sampleRate": 1000
                    },
                    "3735591": {
                        "sampleRate": 100
                    },
                    "3735592": {
                        "sampleRate": 1000
                    },
                    "3735593": {
                        "sampleRate": 1000
                    },
                    "3735594": {
                        "sampleRate": 1000
                    },
                    "3735595": {
                        "sampleRate": 100
                    },
                    "3735596": {
                        "sampleRate": 1000
                    },
                    "3735597": {
                        "sampleRate": 1000
                    },
                    "3735598": {
                        "sampleRate": 100
                    },
                    "3735599": {
                        "sampleRate": 1000
                    },
                    "3735600": {
                        "sampleRate": 100
                    },
                    "3735601": {
                        "sampleRate": 100
                    },
                    "3735602": {
                        "sampleRate": 10000
                    },
                    "3735603": {
                        "sampleRate": 10000
                    },
                    "3735604": {
                        "sampleRate": 100
                    },
                    "3735605": {
                        "sampleRate": 100
                    },
                    "3735606": {
                        "sampleRate": 1
                    },
                    "3735608": {
                        "sampleRate": 250
                    },
                    "3735609": {
                        "sampleRate": 250
                    },
                    "3735610": {
                        "sampleRate": 250
                    },
                    "3735611": {
                        "sampleRate": 250
                    },
                    "3735612": {
                        "sampleRate": 250
                    },
                    "3735613": {
                        "sampleRate": 250
                    },
                    "3735614": {
                        "sampleRate": 250
                    },
                    "3735615": {
                        "sampleRate": 250
                    },
                    "3735616": {
                        "sampleRate": 250
                    },
                    "3735617": {
                        "sampleRate": 250
                    },
                    "3735618": {
                        "sampleRate": 50
                    },
                    "3735619": {
                        "sampleRate": 50
                    },
                    "3735620": {
                        "sampleRate": 50
                    },
                    "3735622": {
                        "sampleRate": 50
                    },
                    "3735623": {
                        "sampleRate": 500
                    },
                    "3735624": {
                        "sampleRate": 500
                    },
                    "3735625": {
                        "sampleRate": 1
                    },
                    "3735626": {
                        "sampleRate": 50
                    },
                    "3735627": {
                        "sampleRate": 50
                    },
                    "3735628": {
                        "sampleRate": 250
                    },
                    "7077894": {
                        "sampleRate": 1
                    },
                    "7079140": {
                        "sampleRate": 100
                    },
                    "7079632": {
                        "sampleRate": 1
                    },
                    "7079940": {
                        "sampleRate": 1
                    },
                    "7081993": {
                        "sampleRate": 1
                    },
                    "7083971": {
                        "sampleRate": 1
                    },
                    "7084033": {
                        "sampleRate": 100
                    },
                    "7084444": {
                        "sampleRate": 1
                    },
                    "7084665": {
                        "sampleRate": 100
                    },
                    "7084786": {
                        "sampleRate": 1
                    },
                    "7085268": {
                        "sampleRate": 100
                    },
                    "7086630": {
                        "sampleRate": 100
                    },
                    "7087889": {
                        "sampleRate": 1
                    },
                    "7088719": {
                        "sampleRate": 100
                    },
                    "7088916": {
                        "sampleRate": 1
                    },
                    "7088929": {
                        "sampleRate": 1
                    },
                    "7088932": {
                        "sampleRate": 1
                    },
                    "7088956": {
                        "sampleRate": 1
                    },
                    "7089521": {
                        "sampleRate": 100
                    },
                    "7089869": {
                        "sampleRate": 100
                    },
                    "7091307": {
                        "sampleRate": 1
                    },
                    "7092490": {
                        "sampleRate": 1
                    },
                    "7093431": {
                        "sampleRate": 100
                    },
                    "7093594": {
                        "sampleRate": 100
                    },
                    "7093622": {
                        "sampleRate": 10
                    },
                    "7093901": {
                        "sampleRate": 1
                    },
                    "7094174": {
                        "sampleRate": 100
                    },
                    "7733271": {
                        "sampleRate": 1
                    },
                    "7747339": {
                        "sampleRate": 100
                    },
                    "7995400": {
                        "sampleRate": 1
                    },
                    "7995408": {
                        "sampleRate": 100
                    },
                    "11075649": {
                        "sampleRate": 1
                    },
                    "11075654": {
                        "sampleRate": 1
                    },
                    "11075669": {
                        "sampleRate": 1
                    },
                    "11075674": {
                        "sampleRate": 1
                    },
                    "12451850": {
                        "sampleRate": 1
                    },
                    "12451854": {
                        "sampleRate": 1
                    },
                    "12451859": {
                        "sampleRate": 1
                    },
                    "12451868": {
                        "sampleRate": 1
                    },
                    "12451869": {
                        "sampleRate": 1
                    },
                    "12451873": {
                        "sampleRate": 10000
                    },
                    "12453291": {
                        "sampleRate": 10000
                    },
                    "12463624": {
                        "sampleRate": 1
                    },
                    "13238313": {
                        "sampleRate": 100
                    },
                    "13238314": {
                        "sampleRate": 100
                    },
                    "13238353": {
                        "sampleRate": 100
                    },
                    "13238354": {
                        "sampleRate": 100
                    },
                    "13238355": {
                        "sampleRate": 100
                    },
                    "13238356": {
                        "sampleRate": 100
                    },
                    "13238392": {
                        "sampleRate": 100
                    },
                    "13238398": {
                        "sampleRate": 100
                    },
                    "13238399": {
                        "sampleRate": 100
                    },
                    "13238400": {
                        "sampleRate": 100
                    },
                    "17825794": {
                        "sampleRate": 250
                    },
                    "19216409": {
                        "sampleRate": 100
                    },
                    "20578320": {
                        "sampleRate": 1000000
                    },
                    "22347782": {
                        "sampleRate": 100
                    },
                    "22609921": {
                        "sampleRate": 10000
                    },
                    "22675460": {
                        "sampleRate": 250
                    },
                    "23265284": {
                        "sampleRate": 1
                    },
                    "23265285": {
                        "sampleRate": 1
                    },
                    "23265286": {
                        "sampleRate": 1
                    },
                    "23281892": {
                        "sampleRate": 1
                    },
                    "23285466": {
                        "sampleRate": 1
                    },
                    "23461896": {
                        "sampleRate": 1
                    },
                    "23461897": {
                        "sampleRate": 1
                    },
                    "23461898": {
                        "sampleRate": 1
                    },
                    "23461899": {
                        "sampleRate": 1
                    },
                    "23461900": {
                        "sampleRate": 1
                    },
                    "23461901": {
                        "sampleRate": 1
                    },
                    "23461902": {
                        "sampleRate": 1
                    },
                    "23473227": {
                        "sampleRate": 1
                    },
                    "23491362": {
                        "sampleRate": 1
                    },
                    "23855114": {
                        "sampleRate": 1
                    },
                    "25296897": {
                        "sampleRate": 1
                    },
                    "25296900": {
                        "sampleRate": 10000
                    },
                    "25296901": {
                        "sampleRate": 1
                    },
                    "25296902": {
                        "sampleRate": 1
                    },
                    "25296903": {
                        "sampleRate": 10000
                    },
                    "25296904": {
                        "sampleRate": 10000
                    },
                    "25296905": {
                        "sampleRate": 10000
                    },
                    "25296906": {
                        "sampleRate": 10000
                    },
                    "25305590": {
                        "sampleRate": 10
                    },
                    "26869761": {
                        "sampleRate": 1
                    },
                    "26869762": {
                        "sampleRate": 1
                    },
                    "26869763": {
                        "sampleRate": 1
                    },
                    "26869764": {
                        "sampleRate": 1
                    },
                    "26869766": {
                        "sampleRate": 1
                    },
                    "26869768": {
                        "sampleRate": 1
                    },
                    "26869770": {
                        "sampleRate": 1
                    },
                    "26869771": {
                        "sampleRate": 1
                    },
                    "26869772": {
                        "sampleRate": 1
                    },
                    "26898960": {
                        "sampleRate": 1
                    },
                    "27459588": {
                        "sampleRate": 5000
                    },
                    "27459589": {
                        "sampleRate": 1
                    },
                    "27459590": {
                        "sampleRate": 10
                    },
                    "27459591": {
                        "sampleRate": 1
                    },
                    "27787270": {
                        "sampleRate": 100000
                    },
                    "27787271": {
                        "sampleRate": 10000
                    },
                    "27787276": {
                        "sampleRate": 1
                    },
                    "27983873": {
                        "sampleRate": 1
                    },
                    "27983874": {
                        "sampleRate": 1
                    },
                    "27983875": {
                        "sampleRate": 1
                    },
                    "27983876": {
                        "sampleRate": 1
                    },
                    "27983877": {
                        "sampleRate": 1
                    },
                    "29047276": {
                        "sampleRate": 10
                    },
                    "29818881": {
                        "sampleRate": 1
                    },
                    "29818882": {
                        "sampleRate": 1
                    },
                    "29818883": {
                        "sampleRate": 1
                    },
                    "29818884": {
                        "sampleRate": 1
                    },
                    "29949953": {
                        "sampleRate": 1
                    },
                    "29949955": {
                        "sampleRate": 1
                    },
                    "30408705": {
                        "sampleRate": 1
                    },
                    "30408706": {
                        "sampleRate": 1
                    },
                    "30408707": {
                        "sampleRate": 1
                    },
                    "30408708": {
                        "sampleRate": 1
                    },
                    "30408709": {
                        "sampleRate": 1
                    },
                    "30408710": {
                        "sampleRate": 1
                    },
                    "30408711": {
                        "sampleRate": 1
                    },
                    "30408712": {
                        "sampleRate": 1
                    },
                    "30605313": {
                        "sampleRate": 100
                    },
                    "30605314": {
                        "sampleRate": 100
                    },
                    "30605315": {
                        "sampleRate": 100
                    },
                    "30605316": {
                        "sampleRate": 1
                    },
                    "30605317": {
                        "sampleRate": 1
                    },
                    "30605319": {
                        "sampleRate": 1
                    },
                    "30605320": {
                        "sampleRate": 1
                    },
                    "30605321": {
                        "sampleRate": 1
                    },
                    "30605322": {
                        "sampleRate": 1
                    },
                    "30605323": {
                        "sampleRate": 1
                    },
                    "30605324": {
                        "sampleRate": 1
                    },
                    "30605325": {
                        "sampleRate": 1
                    },
                    "30605326": {
                        "sampleRate": 1
                    },
                    "30605328": {
                        "sampleRate": 1
                    },
                    "30605329": {
                        "sampleRate": 1
                    },
                    "30605330": {
                        "sampleRate": 1
                    },
                    "30605331": {
                        "sampleRate": 1
                    },
                    "30605333": {
                        "sampleRate": 1
                    },
                    "30605334": {
                        "sampleRate": 1
                    },
                    "30605335": {
                        "sampleRate": 1
                    },
                    "30605336": {
                        "sampleRate": 1
                    },
                    "30605337": {
                        "sampleRate": 1
                    },
                    "30605338": {
                        "sampleRate": 1
                    },
                    "30605339": {
                        "sampleRate": 1
                    },
                    "30605340": {
                        "sampleRate": 1
                    },
                    "30605341": {
                        "sampleRate": 1
                    },
                    "30605342": {
                        "sampleRate": 1
                    },
                    "30605343": {
                        "sampleRate": 1
                    },
                    "30605344": {
                        "sampleRate": 1
                    },
                    "30605345": {
                        "sampleRate": 1
                    },
                    "30605346": {
                        "sampleRate": 1
                    },
                    "30605347": {
                        "sampleRate": 1
                    },
                    "30605348": {
                        "sampleRate": 1
                    },
                    "30605349": {
                        "sampleRate": 1
                    },
                    "30605350": {
                        "sampleRate": 1
                    },
                    "30605351": {
                        "sampleRate": 1
                    },
                    "30605352": {
                        "sampleRate": 1
                    },
                    "30605353": {
                        "sampleRate": 1
                    },
                    "30605354": {
                        "sampleRate": 1
                    },
                    "30605355": {
                        "sampleRate": 1
                    },
                    "30605356": {
                        "sampleRate": 1
                    },
                    "30605357": {
                        "sampleRate": 1
                    },
                    "30605358": {
                        "sampleRate": 1
                    },
                    "30605360": {
                        "sampleRate": 1
                    },
                    "30605361": {
                        "sampleRate": 1
                    },
                    "30605362": {
                        "sampleRate": 1
                    },
                    "30605363": {
                        "sampleRate": 1
                    },
                    "30605364": {
                        "sampleRate": 1
                    },
                    "30605366": {
                        "sampleRate": 1
                    },
                    "30605367": {
                        "sampleRate": 1
                    },
                    "30605368": {
                        "sampleRate": 1
                    },
                    "30605369": {
                        "sampleRate": 1
                    },
                    "30605370": {
                        "sampleRate": 1
                    },
                    "30605371": {
                        "sampleRate": 1
                    },
                    "30605373": {
                        "sampleRate": 1
                    },
                    "30605374": {
                        "sampleRate": 1
                    },
                    "30605375": {
                        "sampleRate": 1
                    },
                    "30605376": {
                        "sampleRate": 1
                    },
                    "30605378": {
                        "sampleRate": 1
                    },
                    "30605380": {
                        "sampleRate": 1
                    },
                    "30605381": {
                        "sampleRate": 1
                    },
                    "30605382": {
                        "sampleRate": 1
                    },
                    "30605384": {
                        "sampleRate": 1
                    },
                    "30605386": {
                        "sampleRate": 1
                    },
                    "30605387": {
                        "sampleRate": 1
                    },
                    "30605389": {
                        "sampleRate": 1
                    },
                    "30605390": {
                        "sampleRate": 1
                    },
                    "30605391": {
                        "sampleRate": 1
                    },
                    "30605392": {
                        "sampleRate": 1
                    },
                    "30605393": {
                        "sampleRate": 1
                    },
                    "30608244": {
                        "sampleRate": 1
                    },
                    "30613596": {
                        "sampleRate": 1
                    },
                    "30614747": {
                        "sampleRate": 1
                    },
                    "30615365": {
                        "sampleRate": 1
                    },
                    "30618398": {
                        "sampleRate": 1
                    },
                    "30620813": {
                        "sampleRate": 1
                    },
                    "30621572": {
                        "sampleRate": 1
                    },
                    "30632331": {
                        "sampleRate": 1
                    },
                    "32374785": {
                        "sampleRate": 10000
                    },
                    "32702465": {
                        "sampleRate": 1
                    },
                    "33488897": {
                        "sampleRate": 1
                    },
                    "33488898": {
                        "sampleRate": 1
                    },
                    "33488900": {
                        "sampleRate": 1
                    },
                    "33488901": {
                        "sampleRate": 1800
                    },
                    "33488902": {
                        "sampleRate": 1
                    },
                    "33488903": {
                        "sampleRate": 1
                    },
                    "33488904": {
                        "sampleRate": 1
                    },
                    "33488905": {
                        "sampleRate": 1
                    },
                    "33494245": {
                        "sampleRate": 1
                    },
                    "33619969": {
                        "sampleRate": 1
                    },
                    "35586051": {
                        "sampleRate": 10
                    },
                    "35586052": {
                        "sampleRate": 1000
                    },
                    "35586053": {
                        "sampleRate": 1000
                    },
                    "35651585": {
                        "sampleRate": 1
                    },
                    "35651586": {
                        "sampleRate": 1
                    },
                    "35651587": {
                        "sampleRate": 1
                    },
                    "35651588": {
                        "sampleRate": 1
                    },
                    "35651589": {
                        "sampleRate": 1
                    },
                    "35651590": {
                        "sampleRate": 1
                    },
                    "35651591": {
                        "sampleRate": 1
                    },
                    "35651593": {
                        "sampleRate": 1
                    },
                    "35651594": {
                        "sampleRate": 1
                    },
                    "35651595": {
                        "sampleRate": 1
                    },
                    "35651596": {
                        "sampleRate": 1
                    },
                    "36110337": {
                        "sampleRate": 1
                    },
                    "36110338": {
                        "sampleRate": 1
                    },
                    "36110339": {
                        "sampleRate": 1
                    },
                    "36241413": {
                        "sampleRate": 1
                    },
                    "36241422": {
                        "sampleRate": 1
                    },
                    "36241423": {
                        "sampleRate": 1
                    },
                    "36241434": {
                        "sampleRate": 1
                    },
                    "36243184": {
                        "sampleRate": 1
                    },
                    "36244063": {
                        "sampleRate": 1
                    },
                    "36247076": {
                        "sampleRate": 1
                    },
                    "36249481": {
                        "sampleRate": 1
                    },
                    "36250226": {
                        "sampleRate": 1
                    },
                    "36251818": {
                        "sampleRate": 1
                    },
                    "36256069": {
                        "sampleRate": 1
                    },
                    "36306945": {
                        "sampleRate": 1
                    },
                    "36306946": {
                        "sampleRate": 1
                    },
                    "36306948": {
                        "sampleRate": 1
                    },
                    "36306951": {
                        "sampleRate": 1000
                    },
                    "36306952": {
                        "sampleRate": 1
                    },
                    "36306955": {
                        "sampleRate": 1
                    },
                    "36306958": {
                        "sampleRate": 1
                    },
                    "37096251": {
                        "sampleRate": 10000
                    },
                    "37158913": {
                        "sampleRate": 1
                    },
                    "37158914": {
                        "sampleRate": 1
                    },
                    "37158915": {
                        "sampleRate": 1
                    },
                    "37158916": {
                        "sampleRate": 1
                    },
                    "37224449": {
                        "sampleRate": 10000
                    },
                    "37224450": {
                        "sampleRate": 10000
                    },
                    "37224451": {
                        "sampleRate": 10000
                    },
                    "37224452": {
                        "sampleRate": 10000
                    },
                    "37224453": {
                        "sampleRate": 10000
                    },
                    "37224454": {
                        "sampleRate": 10000
                    },
                    "37224455": {
                        "sampleRate": 10000
                    },
                    "37224456": {
                        "sampleRate": 10000
                    },
                    "37224457": {
                        "sampleRate": 10000
                    },
                    "37289985": {
                        "sampleRate": 1
                    },
                    "37289986": {
                        "sampleRate": 1
                    },
                    "37289987": {
                        "sampleRate": 1
                    },
                    "37289990": {
                        "sampleRate": 1
                    },
                    "37289991": {
                        "sampleRate": 1
                    },
                    "37289992": {
                        "sampleRate": 1
                    },
                    "37814273": {
                        "sampleRate": 1
                    },
                    "37814274": {
                        "sampleRate": 1
                    },
                    "37814275": {
                        "sampleRate": 1
                    },
                    "38338561": {
                        "sampleRate": 10000
                    },
                    "38338562": {
                        "sampleRate": 10000
                    },
                    "38338563": {
                        "sampleRate": 10000
                    },
                    "38338564": {
                        "sampleRate": 1
                    },
                    "38928385": {
                        "sampleRate": 1
                    },
                    "39976964": {
                        "sampleRate": 1
                    },
                    "39976965": {
                        "sampleRate": 1
                    },
                    "39976966": {
                        "sampleRate": 1
                    },
                    "39976967": {
                        "sampleRate": 1
                    },
                    "40173575": {
                        "sampleRate": 100
                    },
                    "40501249": {
                        "sampleRate": 1
                    },
                    "40501250": {
                        "sampleRate": 1
                    },
                    "40501251": {
                        "sampleRate": 1
                    },
                    "40501252": {
                        "sampleRate": 1
                    },
                    "40501253": {
                        "sampleRate": 1
                    },
                    "40501254": {
                        "sampleRate": 1
                    },
                    "40501255": {
                        "sampleRate": 1
                    },
                    "40828935": {
                        "sampleRate": 1
                    },
                    "40843772": {
                        "sampleRate": 10000
                    },
                    "40894467": {
                        "sampleRate": 1
                    },
                    "40894468": {
                        "sampleRate": 1
                    },
                    "40894469": {
                        "sampleRate": 1
                    },
                    "40894470": {
                        "sampleRate": 1
                    },
                    "40894471": {
                        "sampleRate": 1
                    },
                    "40894472": {
                        "sampleRate": 1
                    },
                    "40894473": {
                        "sampleRate": 1
                    },
                    "40894474": {
                        "sampleRate": 1
                    },
                    "40894475": {
                        "sampleRate": 1
                    },
                    "40894483": {
                        "sampleRate": 1
                    },
                    "40894484": {
                        "sampleRate": 1
                    },
                    "40894485": {
                        "sampleRate": 1
                    },
                    "40894486": {
                        "sampleRate": 1
                    },
                    "40894487": {
                        "sampleRate": 1
                    },
                    "40894490": {
                        "sampleRate": 1
                    },
                    "40894491": {
                        "sampleRate": 1
                    },
                    "40894492": {
                        "sampleRate": 1
                    },
                    "40894493": {
                        "sampleRate": 1
                    },
                    "40894494": {
                        "sampleRate": 1
                    },
                    "40894495": {
                        "sampleRate": 1
                    },
                    "40894496": {
                        "sampleRate": 1
                    },
                    "40894497": {
                        "sampleRate": 1
                    },
                    "40894498": {
                        "sampleRate": 1
                    },
                    "40894499": {
                        "sampleRate": 1
                    },
                    "40894500": {
                        "sampleRate": 1
                    },
                    "40894501": {
                        "sampleRate": 1
                    },
                    "40894502": {
                        "sampleRate": 1
                    },
                    "40913765": {
                        "sampleRate": 1
                    },
                    "40919892": {
                        "sampleRate": 1
                    },
                    "41484289": {
                        "sampleRate": 2
                    },
                    "41484290": {
                        "sampleRate": 100
                    },
                    "41484291": {
                        "sampleRate": 100
                    },
                    "41484292": {
                        "sampleRate": 100
                    },
                    "41484293": {
                        "sampleRate": 100
                    },
                    "41484294": {
                        "sampleRate": 200
                    },
                    "41484295": {
                        "sampleRate": 100
                    },
                    "41484296": {
                        "sampleRate": 100
                    },
                    "41484297": {
                        "sampleRate": 100
                    },
                    "41484298": {
                        "sampleRate": 100
                    },
                    "41484299": {
                        "sampleRate": 100
                    },
                    "41484300": {
                        "sampleRate": 100
                    },
                    "41484301": {
                        "sampleRate": 1
                    },
                    "41484302": {
                        "sampleRate": 100
                    },
                    "41484303": {
                        "sampleRate": 100
                    },
                    "41484304": {
                        "sampleRate": 100
                    },
                    "41484306": {
                        "sampleRate": 100
                    },
                    "41484307": {
                        "sampleRate": 100
                    },
                    "41484308": {
                        "sampleRate": 100
                    },
                    "41484309": {
                        "sampleRate": 10
                    },
                    "41484310": {
                        "sampleRate": 10
                    },
                    "41484311": {
                        "sampleRate": 1
                    },
                    "41484312": {
                        "sampleRate": 1
                    },
                    "41484313": {
                        "sampleRate": 1
                    },
                    "41484314": {
                        "sampleRate": 1
                    },
                    "41484315": {
                        "sampleRate": 100
                    },
                    "41484316": {
                        "sampleRate": 100
                    },
                    "41484317": {
                        "sampleRate": 100
                    },
                    "41484318": {
                        "sampleRate": 20
                    },
                    "41491493": {
                        "sampleRate": 10
                    },
                    "41491663": {
                        "sampleRate": 2
                    },
                    "41495493": {
                        "sampleRate": 1
                    },
                    "41497784": {
                        "sampleRate": 100
                    },
                    "41500090": {
                        "sampleRate": 100
                    },
                    "41500162": {
                        "sampleRate": 100
                    },
                    "41506813": {
                        "sampleRate": 250
                    },
                    "41549825": {
                        "sampleRate": 1
                    },
                    "41811969": {
                        "sampleRate": 1
                    },
                    "41811970": {
                        "sampleRate": 1
                    },
                    "41811971": {
                        "sampleRate": 1
                    },
                    "42532865": {
                        "sampleRate": 1000
                    },
                    "42532866": {
                        "sampleRate": 10000
                    },
                    "42729476": {
                        "sampleRate": 1
                    },
                    "42729477": {
                        "sampleRate": 1
                    },
                    "42729478": {
                        "sampleRate": 1
                    },
                    "42738840": {
                        "sampleRate": 1
                    },
                    "44040193": {
                        "sampleRate": 1
                    },
                    "44040194": {
                        "sampleRate": 1
                    },
                    "44040198": {
                        "sampleRate": 1
                    },
                    "44433409": {
                        "sampleRate": 1
                    },
                    "44433410": {
                        "sampleRate": 1
                    },
                    "44433411": {
                        "sampleRate": 1
                    },
                    "44892162": {
                        "sampleRate": 1
                    },
                    "44892163": {
                        "sampleRate": 1
                    },
                    "44892165": {
                        "sampleRate": 5
                    },
                    "44892166": {
                        "sampleRate": 5
                    },
                    "44957701": {
                        "sampleRate": 1
                    },
                    "44957702": {
                        "sampleRate": 1
                    },
                    "45088770": {
                        "sampleRate": 1
                    },
                    "45613057": {
                        "sampleRate": 1
                    },
                    "45613058": {
                        "sampleRate": 1
                    },
                    "45613059": {
                        "sampleRate": 1
                    },
                    "45678593": {
                        "sampleRate": 1
                    },
                    "45678594": {
                        "sampleRate": 100
                    },
                    "46596097": {
                        "sampleRate": 1
                    },
                    "47841281": {
                        "sampleRate": 1
                    },
                    "47841282": {
                        "sampleRate": 1
                    },
                    "47841283": {
                        "sampleRate": 1
                    },
                    "48496641": {
                        "sampleRate": 1
                    },
                    "48758785": {
                        "sampleRate": 1
                    },
                    "48758786": {
                        "sampleRate": 1
                    },
                    "49283073": {
                        "sampleRate": 1
                    },
                    "49283075": {
                        "sampleRate": 1
                    },
                    "49479681": {
                        "sampleRate": 1
                    },
                    "49479683": {
                        "sampleRate": 1
                    },
                    "49479684": {
                        "sampleRate": 1
                    },
                    "49479685": {
                        "sampleRate": 1
                    },
                    "49481946": {
                        "sampleRate": 1
                    },
                    "49490667": {
                        "sampleRate": 1
                    },
                    "49493231": {
                        "sampleRate": 1
                    },
                    "50003969": {
                        "sampleRate": 1
                    },
                    "50003970": {
                        "sampleRate": 1
                    },
                    "50003971": {
                        "sampleRate": 1
                    },
                    "50003972": {
                        "sampleRate": 1
                    },
                    "50003973": {
                        "sampleRate": 1
                    },
                    "50003974": {
                        "sampleRate": 1
                    },
                    "50135041": {
                        "sampleRate": 10000
                    },
                    "50135049": {
                        "sampleRate": 1
                    },
                    "50135050": {
                        "sampleRate": 1
                    },
                    "50987009": {
                        "sampleRate": 1
                    },
                    "50987010": {
                        "sampleRate": 1
                    },
                    "52035585": {
                        "sampleRate": 1
                    },
                    "52690945": {
                        "sampleRate": 1
                    },
                    "52690946": {
                        "sampleRate": 1
                    },
                    "52690947": {
                        "sampleRate": 1
                    },
                    "52690948": {
                        "sampleRate": 1
                    },
                    "52690949": {
                        "sampleRate": 1
                    },
                    "52690950": {
                        "sampleRate": 1
                    },
                    "52694580": {
                        "sampleRate": 1
                    },
                    "52698112": {
                        "sampleRate": 1
                    },
                    "52705483": {
                        "sampleRate": 1
                    },
                    "52706253": {
                        "sampleRate": 1
                    },
                    "52709001": {
                        "sampleRate": 1
                    },
                    "52710195": {
                        "sampleRate": 1
                    },
                    "52711372": {
                        "sampleRate": 1
                    },
                    "52711928": {
                        "sampleRate": 1
                    },
                    "52712329": {
                        "sampleRate": 1
                    },
                    "52717731": {
                        "sampleRate": 1
                    },
                    "52719193": {
                        "sampleRate": 1
                    },
                    "52720775": {
                        "sampleRate": 1
                    },
                    "52722738": {
                        "sampleRate": 1
                    },
                    "52756481": {
                        "sampleRate": 1
                    },
                    "52887553": {
                        "sampleRate": 1
                    },
                    "52887555": {
                        "sampleRate": 1
                    },
                    "52887556": {
                        "sampleRate": 1
                    },
                    "52887557": {
                        "sampleRate": 1
                    },
                    "52887559": {
                        "sampleRate": 1
                    },
                    "52887560": {
                        "sampleRate": 1
                    },
                    "52887561": {
                        "sampleRate": 1
                    },
                    "52887562": {
                        "sampleRate": 1
                    },
                    "52887563": {
                        "sampleRate": 1
                    },
                    "52887564": {
                        "sampleRate": 1
                    },
                    "52887565": {
                        "sampleRate": 1
                    },
                    "52887566": {
                        "sampleRate": 1
                    },
                    "52887567": {
                        "sampleRate": 1
                    },
                    "52887568": {
                        "sampleRate": 1
                    },
                    "52887569": {
                        "sampleRate": 1
                    },
                    "52887570": {
                        "sampleRate": 1
                    },
                    "52887571": {
                        "sampleRate": 1
                    },
                    "52887572": {
                        "sampleRate": 1
                    },
                    "52887573": {
                        "sampleRate": 1
                    },
                    "52887574": {
                        "sampleRate": 1
                    },
                    "52887575": {
                        "sampleRate": 1
                    },
                    "52887576": {
                        "sampleRate": 1
                    },
                    "52887577": {
                        "sampleRate": 1
                    },
                    "52887578": {
                        "sampleRate": 1
                    },
                    "52887579": {
                        "sampleRate": 1
                    },
                    "52887580": {
                        "sampleRate": 1
                    },
                    "52887581": {
                        "sampleRate": 1
                    },
                    "52887582": {
                        "sampleRate": 1
                    },
                    "52887583": {
                        "sampleRate": 1
                    },
                    "52887584": {
                        "sampleRate": 1
                    },
                    "52887585": {
                        "sampleRate": 1
                    },
                    "52887586": {
                        "sampleRate": 1
                    },
                    "52887587": {
                        "sampleRate": 1
                    },
                    "52887588": {
                        "sampleRate": 1
                    },
                    "52890296": {
                        "sampleRate": 1
                    },
                    "52890564": {
                        "sampleRate": 1
                    },
                    "52891463": {
                        "sampleRate": 1
                    },
                    "52892246": {
                        "sampleRate": 1
                    },
                    "52892954": {
                        "sampleRate": 1
                    },
                    "52893703": {
                        "sampleRate": 1
                    },
                    "52894986": {
                        "sampleRate": 1
                    },
                    "52895164": {
                        "sampleRate": 1
                    },
                    "52898655": {
                        "sampleRate": 1
                    },
                    "52899201": {
                        "sampleRate": 1
                    },
                    "52899465": {
                        "sampleRate": 1
                    },
                    "52900325": {
                        "sampleRate": 1
                    },
                    "52901539": {
                        "sampleRate": 1
                    },
                    "52901642": {
                        "sampleRate": 1
                    },
                    "52903160": {
                        "sampleRate": 1
                    },
                    "52903222": {
                        "sampleRate": 1
                    },
                    "52910634": {
                        "sampleRate": 1
                    },
                    "53018625": {
                        "sampleRate": 1
                    },
                    "53346305": {
                        "sampleRate": 1
                    },
                    "53346306": {
                        "sampleRate": 1
                    },
                    "53346307": {
                        "sampleRate": 1
                    },
                    "53346308": {
                        "sampleRate": 1
                    },
                    "53346309": {
                        "sampleRate": 1
                    },
                    "53346310": {
                        "sampleRate": 1
                    },
                    "53346311": {
                        "sampleRate": 1
                    },
                    "53346312": {
                        "sampleRate": 1
                    },
                    "53346313": {
                        "sampleRate": 1
                    },
                    "53346314": {
                        "sampleRate": 1
                    },
                    "53346315": {
                        "sampleRate": 1
                    },
                    "53348255": {
                        "sampleRate": 1
                    },
                    "53349360": {
                        "sampleRate": 1
                    },
                    "53350227": {
                        "sampleRate": 1
                    },
                    "53351604": {
                        "sampleRate": 1
                    },
                    "53354745": {
                        "sampleRate": 1
                    },
                    "53359547": {
                        "sampleRate": 1
                    },
                    "53359965": {
                        "sampleRate": 1
                    },
                    "53361379": {
                        "sampleRate": 1
                    },
                    "53542913": {
                        "sampleRate": 1
                    },
                    "53542914": {
                        "sampleRate": 1
                    },
                    "53542915": {
                        "sampleRate": 1
                    },
                    "53542916": {
                        "sampleRate": 1
                    },
                    "53608449": {
                        "sampleRate": 1
                    },
                    "53608450": {
                        "sampleRate": 1
                    },
                    "53608451": {
                        "sampleRate": 1
                    },
                    "53739521": {
                        "sampleRate": 10000
                    },
                    "53805057": {
                        "sampleRate": 1
                    },
                    "53805058": {
                        "sampleRate": 1
                    },
                    "53805059": {
                        "sampleRate": 1
                    },
                    "53805060": {
                        "sampleRate": 1
                    },
                    "53817004": {
                        "sampleRate": 1
                    },
                    "54132737": {
                        "sampleRate": 100
                    },
                    "54198273": {
                        "sampleRate": 1
                    },
                    "54198274": {
                        "sampleRate": 1
                    },
                    "54263809": {
                        "sampleRate": 1
                    },
                    "54263810": {
                        "sampleRate": 1
                    },
                    "54263811": {
                        "sampleRate": 1
                    },
                    "54263812": {
                        "sampleRate": 1
                    },
                    "54263813": {
                        "sampleRate": 1
                    },
                    "54263814": {
                        "sampleRate": 1
                    },
                    "54263815": {
                        "sampleRate": 1
                    },
                    "54263816": {
                        "sampleRate": 1
                    },
                    "54263817": {
                        "sampleRate": 1
                    },
                    "54263818": {
                        "sampleRate": 1
                    },
                    "54263819": {
                        "sampleRate": 1
                    },
                    "54263820": {
                        "sampleRate": 1
                    },
                    "54263821": {
                        "sampleRate": 1
                    },
                    "54266141": {
                        "sampleRate": 1
                    },
                    "54285047": {
                        "sampleRate": 1
                    },
                    "54287428": {
                        "sampleRate": 1
                    },
                    "54525953": {
                        "sampleRate": 2
                    },
                    "54525954": {
                        "sampleRate": 1
                    },
                    "54525955": {
                        "sampleRate": 1
                    },
                    "54525956": {
                        "sampleRate": 1
                    },
                    "54525957": {
                        "sampleRate": 1
                    },
                    "54525958": {
                        "sampleRate": 1
                    },
                    "54525959": {
                        "sampleRate": 1
                    },
                    "54657025": {
                        "sampleRate": 10000
                    },
                    "54657026": {
                        "sampleRate": 10000
                    },
                    "54657027": {
                        "sampleRate": 10000
                    },
                    "54657028": {
                        "sampleRate": 10000
                    },
                    "54657029": {
                        "sampleRate": 10000
                    },
                    "54657030": {
                        "sampleRate": 10000
                    },
                    "54853633": {
                        "sampleRate": 1
                    },
                    "54853634": {
                        "sampleRate": 1
                    },
                    "54853635": {
                        "sampleRate": 1
                    },
                    "54856934": {
                        "sampleRate": 1
                    },
                    "54919169": {
                        "sampleRate": 1
                    },
                    "54919170": {
                        "sampleRate": 1
                    },
                    "54919171": {
                        "sampleRate": 1
                    },
                    "54919172": {
                        "sampleRate": 1
                    },
                    "54919173": {
                        "sampleRate": 1
                    },
                    "54919174": {
                        "sampleRate": 1
                    },
                    "54919175": {
                        "sampleRate": 1
                    },
                    "54919176": {
                        "sampleRate": 1
                    },
                    "54919177": {
                        "sampleRate": 1
                    },
                    "54919178": {
                        "sampleRate": 1
                    },
                    "54919179": {
                        "sampleRate": 1
                    },
                    "54919180": {
                        "sampleRate": 1
                    },
                    "54919181": {
                        "sampleRate": 1
                    },
                    "54919182": {
                        "sampleRate": 1
                    },
                    "54919183": {
                        "sampleRate": 1
                    },
                    "54919184": {
                        "sampleRate": 1
                    },
                    "54919185": {
                        "sampleRate": 1
                    },
                    "54919186": {
                        "sampleRate": 1
                    },
                    "54919187": {
                        "sampleRate": 1
                    },
                    "54919188": {
                        "sampleRate": 1
                    },
                    "54919189": {
                        "sampleRate": 1
                    },
                    "54919190": {
                        "sampleRate": 1
                    },
                    "54919191": {
                        "sampleRate": 1
                    },
                    "54919192": {
                        "sampleRate": 1
                    },
                    "54919193": {
                        "sampleRate": 1
                    },
                    "54919194": {
                        "sampleRate": 1
                    },
                    "54919195": {
                        "sampleRate": 1
                    },
                    "54919196": {
                        "sampleRate": 1
                    },
                    "54919197": {
                        "sampleRate": 1
                    },
                    "54919198": {
                        "sampleRate": 1
                    },
                    "54919199": {
                        "sampleRate": 1
                    },
                    "54926301": {
                        "sampleRate": 1
                    },
                    "54928033": {
                        "sampleRate": 1
                    },
                    "54928841": {
                        "sampleRate": 1
                    },
                    "54932691": {
                        "sampleRate": 1
                    },
                    "55181314": {
                        "sampleRate": 1
                    },
                    "55181315": {
                        "sampleRate": 1
                    },
                    "55181316": {
                        "sampleRate": 1
                    },
                    "55181317": {
                        "sampleRate": 1
                    },
                    "55246849": {
                        "sampleRate": 1
                    },
                    "55246850": {
                        "sampleRate": 1000000000
                    },
                    "55312385": {
                        "sampleRate": 1
                    },
                    "55312386": {
                        "sampleRate": 1
                    },
                    "55312388": {
                        "sampleRate": 1
                    },
                    "55325709": {
                        "sampleRate": 1
                    },
                    "55443457": {
                        "sampleRate": 1
                    },
                    "55443458": {
                        "sampleRate": 1
                    },
                    "55443459": {
                        "sampleRate": 1
                    },
                    "55443460": {
                        "sampleRate": 1
                    },
                    "55465642": {
                        "sampleRate": 1
                    },
                    "55508994": {
                        "sampleRate": 1
                    },
                    "55508995": {
                        "sampleRate": 1
                    },
                    "55508996": {
                        "sampleRate": 1
                    },
                    "55517182": {
                        "sampleRate": 1
                    },
                    "55574529": {
                        "sampleRate": 10000
                    },
                    "55574530": {
                        "sampleRate": 10000
                    },
                    "55836673": {
                        "sampleRate": 1
                    },
                    "55836674": {
                        "sampleRate": 1000000000
                    },
                    "55836675": {
                        "sampleRate": 1000000000
                    },
                    "55836676": {
                        "sampleRate": 1000000000
                    },
                    "55836677": {
                        "sampleRate": 1000000000
                    },
                    "55836678": {
                        "sampleRate": 10000
                    },
                    "55838475": {
                        "sampleRate": 10000
                    },
                    "55967745": {
                        "sampleRate": 1
                    },
                    "55967746": {
                        "sampleRate": 1
                    },
                    "55967747": {
                        "sampleRate": 1
                    },
                    "55967748": {
                        "sampleRate": 1
                    },
                    "56360961": {
                        "sampleRate": 1
                    },
                    "56754177": {
                        "sampleRate": 10000
                    },
                    "56754178": {
                        "sampleRate": 10000
                    },
                    "56754179": {
                        "sampleRate": 10000
                    },
                    "56754180": {
                        "sampleRate": 10000
                    },
                    "56754181": {
                        "sampleRate": 1000000
                    },
                    "57344001": {
                        "sampleRate": 1
                    },
                    "57344002": {
                        "sampleRate": 10
                    },
                    "57344003": {
                        "sampleRate": 1
                    },
                    "57344004": {
                        "sampleRate": 1
                    },
                    "57344005": {
                        "sampleRate": 10000
                    },
                    "57409537": {
                        "sampleRate": 100000000
                    },
                    "57409538": {
                        "sampleRate": 100000000
                    },
                    "57409539": {
                        "sampleRate": 100000000
                    },
                    "57618043": {
                        "sampleRate": 1
                    },
                    "57630710": {
                        "sampleRate": 1
                    },
                    "57671681": {
                        "sampleRate": 1
                    },
                    "57671682": {
                        "sampleRate": 1
                    },
                    "57671683": {
                        "sampleRate": 1
                    },
                    "57671684": {
                        "sampleRate": 1
                    },
                    "57671685": {
                        "sampleRate": 1
                    },
                    "57933825": {
                        "sampleRate": 1
                    },
                    "57999361": {
                        "sampleRate": 1
                    },
                    "57999362": {
                        "sampleRate": 1
                    },
                    "58195969": {
                        "sampleRate": 1
                    },
                    "58195970": {
                        "sampleRate": 1
                    },
                    "58195971": {
                        "sampleRate": 1
                    },
                    "58197575": {
                        "sampleRate": 1
                    },
                    "58198230": {
                        "sampleRate": 1
                    },
                    "58199413": {
                        "sampleRate": 1
                    },
                    "58200119": {
                        "sampleRate": 1
                    },
                    "58203187": {
                        "sampleRate": 1
                    },
                    "58203836": {
                        "sampleRate": 1
                    },
                    "58204719": {
                        "sampleRate": 1
                    },
                    "58205292": {
                        "sampleRate": 1
                    },
                    "58207372": {
                        "sampleRate": 1
                    },
                    "58207791": {
                        "sampleRate": 1
                    },
                    "58208772": {
                        "sampleRate": 1
                    },
                    "58209083": {
                        "sampleRate": 1
                    },
                    "58209742": {
                        "sampleRate": 1
                    },
                    "58210485": {
                        "sampleRate": 1
                    },
                    "58211715": {
                        "sampleRate": 1
                    },
                    "58211900": {
                        "sampleRate": 1
                    },
                    "58458114": {
                        "sampleRate": 1
                    },
                    "58458115": {
                        "sampleRate": 1
                    },
                    "58654721": {
                        "sampleRate": 1
                    },
                    "58654722": {
                        "sampleRate": 1
                    },
                    "58654723": {
                        "sampleRate": 1
                    },
                    "59244545": {
                        "sampleRate": 1
                    },
                    "59244546": {
                        "sampleRate": 1
                    },
                    "59255771": {
                        "sampleRate": 1
                    },
                    "59506689": {
                        "sampleRate": 10000
                    },
                    "59899905": {
                        "sampleRate": 1
                    },
                    "59899906": {
                        "sampleRate": 1
                    },
                    "59899907": {
                        "sampleRate": 1
                    },
                    "59899908": {
                        "sampleRate": 1
                    },
                    "59899909": {
                        "sampleRate": 1
                    },
                    "60096513": {
                        "sampleRate": 1
                    },
                    "60096514": {
                        "sampleRate": 1
                    },
                    "60096515": {
                        "sampleRate": 1
                    },
                    "60096516": {
                        "sampleRate": 1
                    },
                    "60358657": {
                        "sampleRate": 10000
                    },
                    "60358658": {
                        "sampleRate": 10000
                    },
                    "61276161": {
                        "sampleRate": 1
                    },
                    "61276162": {
                        "sampleRate": 1
                    },
                    "61276163": {
                        "sampleRate": 1
                    },
                    "61276164": {
                        "sampleRate": 1
                    },
                    "61407233": {
                        "sampleRate": 10000
                    },
                    "61931524": {
                        "sampleRate": 10000
                    },
                    "62128129": {
                        "sampleRate": 1
                    },
                    "62128130": {
                        "sampleRate": 1
                    },
                    "62128131": {
                        "sampleRate": 1
                    },
                    "62128132": {
                        "sampleRate": 1
                    },
                    "62128133": {
                        "sampleRate": 1
                    },
                    "62128134": {
                        "sampleRate": 1
                    },
                    "62128135": {
                        "sampleRate": 1
                    },
                    "62324737": {
                        "sampleRate": 1
                    },
                    "62324738": {
                        "sampleRate": 1
                    },
                    "62324739": {
                        "sampleRate": 1
                    },
                    "62455809": {
                        "sampleRate": 1
                    },
                    "62455810": {
                        "sampleRate": 1
                    },
                    "62455811": {
                        "sampleRate": 1
                    },
                    "62521345": {
                        "sampleRate": 10
                    },
                    "62521346": {
                        "sampleRate": 10
                    },
                    "62521347": {
                        "sampleRate": 10
                    },
                    "62521348": {
                        "sampleRate": 10
                    },
                    "62521349": {
                        "sampleRate": 10
                    },
                    "62521350": {
                        "sampleRate": 10
                    },
                    "62532802": {
                        "sampleRate": 10
                    },
                    "62586881": {
                        "sampleRate": 10
                    },
                    "62914562": {
                        "sampleRate": 1
                    },
                    "62980097": {
                        "sampleRate": 10000
                    },
                    "63373313": {
                        "sampleRate": 1
                    },
                    "63438849": {
                        "sampleRate": 1
                    },
                    "63504385": {
                        "sampleRate": 1
                    },
                    "63504386": {
                        "sampleRate": 1
                    },
                    "63504387": {
                        "sampleRate": 1
                    },
                    "63569921": {
                        "sampleRate": 1
                    },
                    "63635457": {
                        "sampleRate": 1
                    },
                    "63700993": {
                        "sampleRate": 1
                    },
                    "63700994": {
                        "sampleRate": 1
                    },
                    "63700995": {
                        "sampleRate": 1
                    },
                    "63700996": {
                        "sampleRate": 1
                    },
                    "63700997": {
                        "sampleRate": 1
                    },
                    "63832066": {
                        "sampleRate": 10000
                    },
                    "63832067": {
                        "sampleRate": 10000
                    },
                    "63963137": {
                        "sampleRate": 1
                    },
                    "64044054": {
                        "sampleRate": 10000
                    },
                    "64225281": {
                        "sampleRate": 1
                    },
                    "64225283": {
                        "sampleRate": 10000
                    },
                    "96997416": {
                        "sampleRate": 10000
                    },
                    "101652143": {
                        "sampleRate": 1
                    },
                    "127481618": {
                        "sampleRate": 1
                    },
                    "127483160": {
                        "sampleRate": 1
                    },
                    "134488117": {
                        "sampleRate": 10
                    },
                    "134493437": {
                        "sampleRate": 10
                    },
                    "157419241": {
                        "sampleRate": 10000
                    },
                    "159785008": {
                        "sampleRate": 1
                    },
                    "195626194": {
                        "sampleRate": 10000
                    },
                    "195639692": {
                        "sampleRate": 1
                    },
                    "209979636": {
                        "sampleRate": 1
                    },
                    "209989735": {
                        "sampleRate": 1
                    },
                    "216401752": {
                        "sampleRate": 1
                    },
                    "216401890": {
                        "sampleRate": 1
                    },
                    "218956945": {
                        "sampleRate": 1
                    },
                    "218957184": {
                        "sampleRate": 1
                    },
                    "218960427": {
                        "sampleRate": 1
                    },
                    "218961094": {
                        "sampleRate": 1
                    },
                    "218962996": {
                        "sampleRate": 1
                    },
                    "218965173": {
                        "sampleRate": 1
                    },
                    "218966113": {
                        "sampleRate": 1
                    },
                    "218966226": {
                        "sampleRate": 10
                    },
                    "218969087": {
                        "sampleRate": 1
                    },
                    "218969883": {
                        "sampleRate": 1
                    },
                    "218970026": {
                        "sampleRate": 1
                    },
                    "218970632": {
                        "sampleRate": 1
                    },
                    "218971974": {
                        "sampleRate": 1
                    },
                    "232726078": {
                        "sampleRate": 1
                    },
                    "270205944": {
                        "sampleRate": 1
                    },
                    "270206071": {
                        "sampleRate": 1
                    },
                    "270206145": {
                        "sampleRate": 1
                    },
                    "270206168": {
                        "sampleRate": 1
                    },
                    "270206214": {
                        "sampleRate": 1
                    },
                    "270206216": {
                        "sampleRate": 1
                    },
                    "270206224": {
                        "sampleRate": 1
                    },
                    "270206259": {
                        "sampleRate": 1
                    },
                    "270206315": {
                        "sampleRate": 1
                    },
                    "270206696": {
                        "sampleRate": 1
                    },
                    "270206744": {
                        "sampleRate": 1
                    },
                    "270206832": {
                        "sampleRate": 1
                    },
                    "270207073": {
                        "sampleRate": 1
                    },
                    "270207098": {
                        "sampleRate": 1
                    },
                    "270207136": {
                        "sampleRate": 1
                    },
                    "270207296": {
                        "sampleRate": 1
                    },
                    "270207420": {
                        "sampleRate": 1
                    },
                    "270207600": {
                        "sampleRate": 1
                    },
                    "270207618": {
                        "sampleRate": 1
                    },
                    "270207797": {
                        "sampleRate": 1
                    },
                    "270207843": {
                        "sampleRate": 1
                    },
                    "270207912": {
                        "sampleRate": 1
                    },
                    "270207953": {
                        "sampleRate": 1
                    },
                    "270208148": {
                        "sampleRate": 1
                    },
                    "270208178": {
                        "sampleRate": 1
                    },
                    "270208265": {
                        "sampleRate": 1
                    },
                    "270208269": {
                        "sampleRate": 1
                    },
                    "270208286": {
                        "sampleRate": 1
                    },
                    "270208406": {
                        "sampleRate": 1
                    },
                    "270208527": {
                        "sampleRate": 1
                    },
                    "270208656": {
                        "sampleRate": 1
                    },
                    "270208920": {
                        "sampleRate": 1
                    },
                    "270209003": {
                        "sampleRate": 1
                    },
                    "270209052": {
                        "sampleRate": 1
                    },
                    "270209091": {
                        "sampleRate": 1
                    },
                    "270209102": {
                        "sampleRate": 1
                    },
                    "270209148": {
                        "sampleRate": 1
                    },
                    "270209274": {
                        "sampleRate": 1
                    },
                    "270209329": {
                        "sampleRate": 1
                    },
                    "270209402": {
                        "sampleRate": 1
                    },
                    "270209445": {
                        "sampleRate": 1
                    },
                    "270209519": {
                        "sampleRate": 1
                    },
                    "270209660": {
                        "sampleRate": 1
                    },
                    "270209661": {
                        "sampleRate": 1
                    },
                    "270209760": {
                        "sampleRate": 1
                    },
                    "270209775": {
                        "sampleRate": 1
                    },
                    "270209815": {
                        "sampleRate": 1
                    },
                    "270209843": {
                        "sampleRate": 1
                    },
                    "270209902": {
                        "sampleRate": 1
                    },
                    "270209991": {
                        "sampleRate": 1
                    },
                    "270210074": {
                        "sampleRate": 1
                    },
                    "270210163": {
                        "sampleRate": 1
                    },
                    "270210164": {
                        "sampleRate": 1
                    },
                    "270210235": {
                        "sampleRate": 1
                    },
                    "270210288": {
                        "sampleRate": 1
                    },
                    "270210332": {
                        "sampleRate": 1
                    },
                    "270210419": {
                        "sampleRate": 1
                    },
                    "270210475": {
                        "sampleRate": 1
                    },
                    "270210517": {
                        "sampleRate": 1
                    },
                    "270210724": {
                        "sampleRate": 1
                    },
                    "270210806": {
                        "sampleRate": 1
                    },
                    "270210841": {
                        "sampleRate": 1
                    },
                    "270210869": {
                        "sampleRate": 1
                    },
                    "270211138": {
                        "sampleRate": 1
                    },
                    "270211171": {
                        "sampleRate": 1
                    },
                    "270211202": {
                        "sampleRate": 1
                    },
                    "270211281": {
                        "sampleRate": 1
                    },
                    "270211347": {
                        "sampleRate": 1
                    },
                    "270211419": {
                        "sampleRate": 1
                    },
                    "270211435": {
                        "sampleRate": 1
                    },
                    "270211506": {
                        "sampleRate": 1
                    },
                    "270211692": {
                        "sampleRate": 1
                    },
                    "270211722": {
                        "sampleRate": 1
                    },
                    "270211753": {
                        "sampleRate": 1
                    },
                    "270211772": {
                        "sampleRate": 1
                    },
                    "270211803": {
                        "sampleRate": 1
                    },
                    "270211869": {
                        "sampleRate": 1
                    },
                    "270212138": {
                        "sampleRate": 1
                    },
                    "270212216": {
                        "sampleRate": 1
                    },
                    "270212238": {
                        "sampleRate": 1
                    },
                    "270212273": {
                        "sampleRate": 1
                    },
                    "270212277": {
                        "sampleRate": 1
                    },
                    "270212441": {
                        "sampleRate": 1
                    },
                    "270212554": {
                        "sampleRate": 1
                    },
                    "270212656": {
                        "sampleRate": 1
                    },
                    "270212696": {
                        "sampleRate": 1
                    },
                    "270212843": {
                        "sampleRate": 1
                    },
                    "270212857": {
                        "sampleRate": 1
                    },
                    "270212893": {
                        "sampleRate": 1
                    },
                    "270213015": {
                        "sampleRate": 1
                    },
                    "270213135": {
                        "sampleRate": 1
                    },
                    "270213161": {
                        "sampleRate": 1
                    },
                    "270213250": {
                        "sampleRate": 1
                    },
                    "270213359": {
                        "sampleRate": 1
                    },
                    "270213374": {
                        "sampleRate": 1
                    },
                    "270213486": {
                        "sampleRate": 1
                    },
                    "270213512": {
                        "sampleRate": 1
                    },
                    "270213572": {
                        "sampleRate": 1
                    },
                    "270213649": {
                        "sampleRate": 1
                    },
                    "270213707": {
                        "sampleRate": 1
                    },
                    "270213749": {
                        "sampleRate": 1
                    },
                    "270213786": {
                        "sampleRate": 1
                    },
                    "270214027": {
                        "sampleRate": 1
                    },
                    "270214035": {
                        "sampleRate": 1
                    },
                    "270214052": {
                        "sampleRate": 1
                    },
                    "270214189": {
                        "sampleRate": 1
                    },
                    "270214320": {
                        "sampleRate": 1
                    },
                    "270214400": {
                        "sampleRate": 1
                    },
                    "270214409": {
                        "sampleRate": 1
                    },
                    "270214580": {
                        "sampleRate": 1
                    },
                    "270214602": {
                        "sampleRate": 1
                    },
                    "270214612": {
                        "sampleRate": 1
                    },
                    "270214705": {
                        "sampleRate": 1
                    },
                    "270214707": {
                        "sampleRate": 1
                    },
                    "270214731": {
                        "sampleRate": 1
                    },
                    "270214784": {
                        "sampleRate": 1
                    },
                    "270214832": {
                        "sampleRate": 1
                    },
                    "270215065": {
                        "sampleRate": 1
                    },
                    "270215101": {
                        "sampleRate": 1
                    },
                    "270215116": {
                        "sampleRate": 1
                    },
                    "270215140": {
                        "sampleRate": 1
                    },
                    "270215230": {
                        "sampleRate": 1
                    },
                    "270215347": {
                        "sampleRate": 1
                    },
                    "270215397": {
                        "sampleRate": 1
                    },
                    "270215690": {
                        "sampleRate": 1
                    },
                    "270215709": {
                        "sampleRate": 1
                    },
                    "270215792": {
                        "sampleRate": 1
                    },
                    "270215979": {
                        "sampleRate": 1
                    },
                    "270216000": {
                        "sampleRate": 1
                    },
                    "270216098": {
                        "sampleRate": 1
                    },
                    "270216182": {
                        "sampleRate": 1
                    },
                    "270216200": {
                        "sampleRate": 1
                    },
                    "270216416": {
                        "sampleRate": 1
                    },
                    "270216791": {
                        "sampleRate": 1
                    },
                    "270216793": {
                        "sampleRate": 1
                    },
                    "270216818": {
                        "sampleRate": 1
                    },
                    "270216896": {
                        "sampleRate": 1
                    },
                    "270216928": {
                        "sampleRate": 1
                    },
                    "270216941": {
                        "sampleRate": 1
                    },
                    "270216996": {
                        "sampleRate": 1
                    },
                    "270217026": {
                        "sampleRate": 1
                    },
                    "270217057": {
                        "sampleRate": 1
                    },
                    "270217068": {
                        "sampleRate": 1
                    },
                    "270217210": {
                        "sampleRate": 1
                    },
                    "270217236": {
                        "sampleRate": 1
                    },
                    "270217283": {
                        "sampleRate": 1
                    },
                    "270217313": {
                        "sampleRate": 1
                    },
                    "270217401": {
                        "sampleRate": 1
                    },
                    "270217479": {
                        "sampleRate": 1
                    },
                    "270217492": {
                        "sampleRate": 1
                    },
                    "270217539": {
                        "sampleRate": 1
                    },
                    "270217616": {
                        "sampleRate": 1
                    },
                    "270217631": {
                        "sampleRate": 1
                    },
                    "270217722": {
                        "sampleRate": 1
                    },
                    "270217749": {
                        "sampleRate": 1
                    },
                    "270217779": {
                        "sampleRate": 1
                    },
                    "270217787": {
                        "sampleRate": 1
                    },
                    "270217798": {
                        "sampleRate": 1
                    },
                    "270217820": {
                        "sampleRate": 1
                    },
                    "270217862": {
                        "sampleRate": 1
                    },
                    "270217900": {
                        "sampleRate": 1
                    },
                    "270218007": {
                        "sampleRate": 1
                    },
                    "270218053": {
                        "sampleRate": 1
                    },
                    "270218090": {
                        "sampleRate": 1
                    },
                    "270218102": {
                        "sampleRate": 1
                    },
                    "270218163": {
                        "sampleRate": 1
                    },
                    "270218166": {
                        "sampleRate": 1
                    },
                    "270218204": {
                        "sampleRate": 1
                    },
                    "270218572": {
                        "sampleRate": 1
                    },
                    "270218586": {
                        "sampleRate": 1
                    },
                    "270218605": {
                        "sampleRate": 1
                    },
                    "270218622": {
                        "sampleRate": 1
                    },
                    "270218660": {
                        "sampleRate": 1
                    },
                    "270218696": {
                        "sampleRate": 1
                    },
                    "270218731": {
                        "sampleRate": 1
                    },
                    "270218991": {
                        "sampleRate": 1
                    },
                    "270219017": {
                        "sampleRate": 1
                    },
                    "270219019": {
                        "sampleRate": 1
                    },
                    "270219051": {
                        "sampleRate": 1
                    },
                    "270219139": {
                        "sampleRate": 1
                    },
                    "270219169": {
                        "sampleRate": 1
                    },
                    "270219188": {
                        "sampleRate": 1
                    },
                    "270219248": {
                        "sampleRate": 1
                    },
                    "270219249": {
                        "sampleRate": 1
                    },
                    "270219303": {
                        "sampleRate": 1
                    },
                    "270219320": {
                        "sampleRate": 1
                    },
                    "270219404": {
                        "sampleRate": 1
                    },
                    "270219449": {
                        "sampleRate": 1
                    },
                    "270219483": {
                        "sampleRate": 1
                    },
                    "270219531": {
                        "sampleRate": 1
                    },
                    "270219562": {
                        "sampleRate": 1
                    },
                    "270219870": {
                        "sampleRate": 1
                    },
                    "270219914": {
                        "sampleRate": 1
                    },
                    "270219926": {
                        "sampleRate": 1
                    },
                    "270220074": {
                        "sampleRate": 1
                    },
                    "270220108": {
                        "sampleRate": 1
                    },
                    "270220262": {
                        "sampleRate": 1
                    },
                    "270220333": {
                        "sampleRate": 1
                    },
                    "270220347": {
                        "sampleRate": 1
                    },
                    "270220481": {
                        "sampleRate": 1
                    },
                    "270220499": {
                        "sampleRate": 1
                    },
                    "270220550": {
                        "sampleRate": 1
                    },
                    "270220595": {
                        "sampleRate": 1
                    },
                    "270220640": {
                        "sampleRate": 1
                    },
                    "270220731": {
                        "sampleRate": 1
                    },
                    "270220850": {
                        "sampleRate": 1
                    },
                    "270220865": {
                        "sampleRate": 1
                    },
                    "270220879": {
                        "sampleRate": 1
                    },
                    "270220889": {
                        "sampleRate": 1
                    },
                    "270220944": {
                        "sampleRate": 1
                    },
                    "270220997": {
                        "sampleRate": 1
                    },
                    "270221024": {
                        "sampleRate": 1
                    },
                    "270221065": {
                        "sampleRate": 1
                    },
                    "270221124": {
                        "sampleRate": 1
                    },
                    "270221133": {
                        "sampleRate": 1
                    },
                    "270221175": {
                        "sampleRate": 1
                    },
                    "270221177": {
                        "sampleRate": 1
                    },
                    "270223583": {
                        "sampleRate": 1
                    },
                    "270224526": {
                        "sampleRate": 1
                    },
                    "270228232": {
                        "sampleRate": 1
                    },
                    "270230590": {
                        "sampleRate": 1
                    },
                    "270230814": {
                        "sampleRate": 1
                    },
                    "270230822": {
                        "sampleRate": 1
                    },
                    "270232559": {
                        "sampleRate": 1
                    },
                    "270233440": {
                        "sampleRate": 1
                    },
                    "320809182": {
                        "sampleRate": 1
                    },
                    "341835776": {
                        "sampleRate": 1
                    },
                    "341835777": {
                        "sampleRate": 1
                    },
                    "341848280": {
                        "sampleRate": 1
                    },
                    "351540413": {
                        "sampleRate": 1
                    },
                    "351543111": {
                        "sampleRate": 1
                    },
                    "351544664": {
                        "sampleRate": 1
                    },
                    "351548245": {
                        "sampleRate": 1
                    },
                    "368647392": {
                        "sampleRate": 1
                    },
                    "377357808": {
                        "sampleRate": 1
                    },
                    "377359040": {
                        "sampleRate": 1
                    },
                    "377359743": {
                        "sampleRate": 1
                    },
                    "377360510": {
                        "sampleRate": 1
                    },
                    "377361415": {
                        "sampleRate": 1
                    },
                    "377362087": {
                        "sampleRate": 5
                    },
                    "377362266": {
                        "sampleRate": 1
                    },
                    "377364678": {
                        "sampleRate": 1
                    },
                    "377364955": {
                        "sampleRate": 1
                    },
                    "377364984": {
                        "sampleRate": 1
                    },
                    "377367763": {
                        "sampleRate": 5
                    },
                    "377369626": {
                        "sampleRate": 1
                    },
                    "377370025": {
                        "sampleRate": 1
                    },
                    "377370433": {
                        "sampleRate": 1
                    },
                    "377371065": {
                        "sampleRate": 1
                    },
                    "377371646": {
                        "sampleRate": 1
                    },
                    "382468096": {
                        "sampleRate": 1
                    },
                    "382468097": {
                        "sampleRate": 1
                    },
                    "382468098": {
                        "sampleRate": 1
                    },
                    "382468099": {
                        "sampleRate": 1
                    },
                    "403271918": {
                        "sampleRate": 1
                    },
                    "460468818": {
                        "sampleRate": 1
                    },
                    "463013863": {
                        "sampleRate": 10
                    },
                    "463015185": {
                        "sampleRate": 10
                    },
                    "463015875": {
                        "sampleRate": 10
                    },
                    "463016713": {
                        "sampleRate": 10
                    },
                    "463016767": {
                        "sampleRate": 10000
                    },
                    "463018233": {
                        "sampleRate": 10
                    },
                    "463018912": {
                        "sampleRate": 10
                    },
                    "463019974": {
                        "sampleRate": 10
                    },
                    "463020176": {
                        "sampleRate": 10000
                    },
                    "463021570": {
                        "sampleRate": 10
                    },
                    "463022130": {
                        "sampleRate": 10
                    },
                    "463022146": {
                        "sampleRate": 10
                    },
                    "463022516": {
                        "sampleRate": 10
                    },
                    "463023032": {
                        "sampleRate": 10
                    },
                    "463024072": {
                        "sampleRate": 10
                    },
                    "463024522": {
                        "sampleRate": 10
                    },
                    "463025159": {
                        "sampleRate": 10
                    },
                    "463026246": {
                        "sampleRate": 10
                    },
                    "463027530": {
                        "sampleRate": 10
                    },
                    "531301737": {
                        "sampleRate": 10000
                    },
                    "531312344": {
                        "sampleRate": 10000
                    },
                    "538512187": {
                        "sampleRate": 1
                    },
                    "538522688": {
                        "sampleRate": 1
                    },
                    "538523041": {
                        "sampleRate": 1
                    },
                    "588713587": {
                        "sampleRate": 1
                    },
                    "597497308": {
                        "sampleRate": 10000
                    },
                    "597501298": {
                        "sampleRate": 10000
                    },
                    "603855120": {
                        "sampleRate": 100
                    },
                    "658310259": {
                        "sampleRate": 1
                    },
                    "658311000": {
                        "sampleRate": 1
                    },
                    "658312030": {
                        "sampleRate": 1
                    },
                    "658312503": {
                        "sampleRate": 1
                    },
                    "658314754": {
                        "sampleRate": 1
                    },
                    "658319560": {
                        "sampleRate": 1
                    },
                    "663618882": {
                        "sampleRate": 1
                    },
                    "663621158": {
                        "sampleRate": 1
                    },
                    "663621340": {
                        "sampleRate": 1
                    },
                    "663621548": {
                        "sampleRate": 1
                    },
                    "663622595": {
                        "sampleRate": 1
                    },
                    "663622603": {
                        "sampleRate": 1
                    },
                    "663622613": {
                        "sampleRate": 1
                    },
                    "663622990": {
                        "sampleRate": 1
                    },
                    "663624058": {
                        "sampleRate": 1
                    },
                    "663625914": {
                        "sampleRate": 1
                    },
                    "663626399": {
                        "sampleRate": 1
                    },
                    "663627363": {
                        "sampleRate": 1
                    },
                    "663627729": {
                        "sampleRate": 1
                    },
                    "663627771": {
                        "sampleRate": 1
                    },
                    "663628202": {
                        "sampleRate": 1
                    },
                    "663629149": {
                        "sampleRate": 1
                    },
                    "663629736": {
                        "sampleRate": 1
                    },
                    "663630260": {
                        "sampleRate": 1
                    },
                    "663631213": {
                        "sampleRate": 1
                    },
                    "663631390": {
                        "sampleRate": 1
                    },
                    "663631507": {
                        "sampleRate": 1
                    },
                    "663631670": {
                        "sampleRate": 1
                    },
                    "663632060": {
                        "sampleRate": 1
                    },
                    "663632194": {
                        "sampleRate": 1
                    },
                    "688919680": {
                        "sampleRate": 10000
                    },
                    "688924705": {
                        "sampleRate": 10000
                    },
                    "688926599": {
                        "sampleRate": 1
                    },
                    "688930365": {
                        "sampleRate": 100
                    },
                    "869731149": {
                        "sampleRate": 10
                    },
                    "869732577": {
                        "sampleRate": 10
                    },
                    "869735402": {
                        "sampleRate": 10
                    },
                    "869735433": {
                        "sampleRate": 10
                    },
                    "869741371": {
                        "sampleRate": 10
                    },
                    "869744918": {
                        "sampleRate": 10
                    },
                    "869746656": {
                        "sampleRate": 10
                    },
                    "899355574": {
                        "sampleRate": 10
                    },
                    "901855609": {
                        "sampleRate": 1
                    },
                    "916591346": {
                        "sampleRate": 10000
                    },
                    "916594868": {
                        "sampleRate": 10000
                    },
                    "916596786": {
                        "sampleRate": 10000
                    },
                    "916599023": {
                        "sampleRate": 10000
                    },
                    "916602249": {
                        "sampleRate": 10000
                    },
                    "919603227": {
                        "sampleRate": 100
                    },
                    "919603854": {
                        "sampleRate": 10000
                    },
                    "919623711": {
                        "sampleRate": 10000
                    },
                    "949157888": {
                        "sampleRate": 100
                    },
                    "981407973": {
                        "sampleRate": 1
                    },
                    "981414956": {
                        "sampleRate": 1
                    },
                    "981415915": {
                        "sampleRate": 1
                    },
                    "1505636832": {
                        "sampleRate": 1
                    },
                    "1823672625": {
                        "sampleRate": 10000
                    },
                    "1823673606": {
                        "sampleRate": 10000
                    },
                    "1823673927": {
                        "sampleRate": 10000
                    },
                    "1823686608": {
                        "sampleRate": 10000
                    },
                    "1823690287": {
                        "sampleRate": 10000
                    },
                    "1823691028": {
                        "sampleRate": 10000
                    }
                },
                "killswitch": false
            }, 3504], ["WebLoomConfig", [], {
                "adaptive_config": {
                    "interactions": {
                        "modules": {
                            "744": 1
                        },
                        "events": {}
                    },
                    "qpl": {
                        "modules": {},
                        "events": {
                            "62128135": 1
                        }
                    },
                    "modules": null,
                    "events": null
                }
            }, 4171], ["FalcoFabricJavaScriptEvents", [], {
                "map": {
                    "ab_coupon_tool_event": {
                        "r": 10000
                    },
                    "account_recovery_code_entry_illustration_click": {
                        "r": 1
                    },
                    "accountquality_aqaction_augl": {
                        "r": 1
                    },
                    "accountquality_aqlink_augl": {
                        "r": 1
                    },
                    "accountquality_aqpagerender_augl": {
                        "r": 1
                    },
                    "accountquality_aqviewpanetab_augl": {
                        "r": 1
                    },
                    "accountquality_aqviewpanetabended_augl": {
                        "r": 1
                    },
                    "accountquality_coreappexperience_augl": {
                        "r": 1
                    },
                    "accountquality_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractioncheckbox_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractioncollapse_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractiondropdown_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractiondropdownended_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractionexpand_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractionmouseover_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractionmouseoverended_augl": {
                        "r": 1
                    },
                    "accountquality_coreinteractionpanetab_augl": {
                        "r": 1
                    },
                    "accountquality_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "accountquality_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "activity_log_experiment_data": {
                        "r": 100
                    },
                    "ad_limits_unit": {
                        "r": 1
                    },
                    "ad_metrics_dhl_front_end": {
                        "r": 1
                    },
                    "ad_portable_preview": {
                        "r": 1
                    },
                    "ad_preferences_hub": {
                        "r": 1
                    },
                    "ad_preferences_hub_survey": {
                        "r": 1
                    },
                    "ad_proposal_copy_draft": {
                        "r": 1
                    },
                    "ad_proposal_exception": {
                        "r": 1
                    },
                    "ad_proposal_impressions": {
                        "r": 1
                    },
                    "add_collaborative_post_initial_contribution_caption": {
                        "r": 1
                    },
                    "add_initial_contribution_media": {
                        "r": 1
                    },
                    "admin_edit_session": {
                        "r": 1
                    },
                    "admin_saw_hcp_ed_interstitial": {
                        "r": 1
                    },
                    "ads_ad_limits_page_tool": {
                        "r": 1
                    },
                    "ads_agp_experiment_logging": {
                        "r": 1
                    },
                    "ads_campaign_default_unified_attribution_window": {
                        "r": 1
                    },
                    "ads_campaign_planning_estimates_data": {
                        "r": 1
                    },
                    "ads_campaign_unified_attribution_window_click": {
                        "r": 1
                    },
                    "ads_growth_coupon": {
                        "r": 1
                    },
                    "ads_guidance_feedback_activity_logging": {
                        "r": 1,
                        "s": 1
                    },
                    "ads_lwi_intelligence": {
                        "r": 1
                    },
                    "ads_manager_ad_appeal_send_failure": {
                        "r": 1
                    },
                    "ads_manager_ad_appeal_send_success": {
                        "r": 1
                    },
                    "ads_manager_appeal_send_pressed": {
                        "r": 1
                    },
                    "ads_manager_confirm_appeal_dialog_cancel": {
                        "r": 1
                    },
                    "ads_midflight_lever_limited_recommendation": {
                        "r": 1,
                        "s": 1
                    },
                    "ads_midflight_recommendation": {
                        "r": 1,
                        "s": 1
                    },
                    "ads_rights_manager_trademark_search": {
                        "r": 1,
                        "s": 1
                    },
                    "adsadbuilder_amadbuilderapirequestended_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderapirequeststarted_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildercomponentrenderended_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildercomponentrenderstarted_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildercreateadfrommockup_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildercreationpageopened_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderdraftdeleted_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderduplicatemockupended_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderduplicatemockupstarted_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderinviteflow_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildermockupdeletion_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildermockupreadystatuschanged_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuildernavigatedtoanotherpage_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderopened_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderoptinstarted_augl": {
                        "r": 1
                    },
                    "adsadbuilder_amadbuilderoptoutstarted_augl": {
                        "r": 1
                    },
                    "adsadbuilder_coreappexperience_augl": {
                        "r": 1
                    },
                    "adsadbuilder_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewassetupdated_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewerror_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewerrorloaded_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewerrorresolveractivated_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewfinish_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewinitialrender_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewpageletfinish_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewpageletstart_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewresponsecancel_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewresponseerror_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewresponsesuccess_augl": {
                        "r": 1
                    },
                    "adsadpreview_amadpreviewstart_augl": {
                        "r": 1
                    },
                    "adsadpreview_coreappexperience_augl": {
                        "r": 1
                    },
                    "adsadpreview_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adsadpreview_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adsadpreview_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "adsamincubator_coreappexperience_augl": {
                        "r": 1
                    },
                    "adsamincubator_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adsamincubator_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adsamincubator_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "adscometflytrap_afcometselectadscategory_augl": {
                        "r": 1
                    },
                    "adscometflytrap_afcometselectproduct_augl": {
                        "r": 1
                    },
                    "adscometflytrap_afcometsendfeedback_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreappexperience_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreinteractiontextinput_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreinteractiontextinputended_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adscometflytrap_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "adsexperiments_adexinteractionlevelbutton_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreappexperience_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreinteractionmouseover_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreinteractionmouseoverended_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreinteractionpanetab_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreviewcomponent_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreviewcomponentended_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreviewcomponentloading_augl": {
                        "r": 1
                    },
                    "adsexperiments_coreviewcomponentloadingended_augl": {
                        "r": 1
                    },
                    "adsflytrap_afsendfeedback_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreappexperience_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreinteractiondropdown_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreinteractiondropdownended_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreinteractiontextinput_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreinteractiontextinputended_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreviewmodal_augl": {
                        "r": 1
                    },
                    "adsflytrap_coreviewmodalended_augl": {
                        "r": 1
                    },
                    "adsmanager_amaccountoverview_augl": {
                        "r": 1
                    },
                    "adsmanager_amaccountoverviewended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadbuilderimportflowmockupconfirmed_augl": {
                        "r": 1
                    },
                    "adsmanager_amadbuilderimportflowmockupselected_augl": {
                        "r": 1
                    },
                    "adsmanager_amadbuilderimportflowstarted_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectcreateflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectcreateflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectduplicateflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectduplicateflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjecteditflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjecteditflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectexportflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectexportflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectimportflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectimportflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectimportfrommockup_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectreviewandpublishflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectreviewandpublishflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectsetbuyingtype_augl": {
                        "r": 1
                    },
                    "adsmanager_amadobjectsetobjective_augl": {
                        "r": 1
                    },
                    "adsmanager_amadscopyerror_augl": {
                        "r": 1
                    },
                    "adsmanager_amapierror_augl": {
                        "r": 1
                    },
                    "adsmanager_amautonamingclicktosave_augl": {
                        "r": 1
                    },
                    "adsmanager_ambackgrounderaserdialogclose_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencecontextualmenuclick_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergenceexternalcreationdialogclick_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencefocusmode_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencefocusmodeended_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencefocusmodetoggleclick_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencepublishflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencepublishflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amconvergencepublishpreviewdialogselection_augl": {
                        "r": 1
                    },
                    "adsmanager_amcrash_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflow_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowfocusframework_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowfocusframeworkclicktoedit_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowfocusframeworkended_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowmutableoption_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowpage_augl": {
                        "r": 1
                    },
                    "adsmanager_amcreateflowpageended_augl": {
                        "r": 1
                    },
                    "adsmanager_amcriticalexception_augl": {
                        "r": 1
                    },
                    "adsmanager_amdraftfragmentloaderror_augl": {
                        "r": 1
                    },
                    "adsmanager_amdraftloaderror_augl": {
                        "r": 1
                    },
                    "adsmanager_ameditflow_augl": {
                        "r": 1
                    },
                    "adsmanager_ameditflowended_augl": {
                        "r": 1
                    },
                    "adsmanager_amemojiclicktoedit_augl": {
                        "r": 1
                    },
                    "adsmanager_amemojiselectedemoji_augl": {
                        "r": 1
                    },
                    "adsmanager_amexception_augl": {
                        "r": 1
                    },
                    "adsmanager_amfatalerror_augl": {
                        "r": 1
                    },
                    "adsmanager_amhomeview_augl": {
                        "r": 1
                    },
                    "adsmanager_amhomeviewended_augl": {
                        "r": 1
                    },
                    "adsmanager_amimporterror_augl": {
                        "r": 1
                    },
                    "adsmanager_aminit_augl": {
                        "r": 1
                    },
                    "adsmanager_aminstantcheckoutdropdown_augl": {
                        "r": 1
                    },
                    "adsmanager_aminstantcheckoutsection_augl": {
                        "r": 1
                    },
                    "adsmanager_aminstantcheckoutsectionended_augl": {
                        "r": 1
                    },
                    "adsmanager_amnamingtypeaheadselect_augl": {
                        "r": 1
                    },
                    "adsmanager_ampoliticaladbuying_augl": {
                        "r": 1
                    },
                    "adsmanager_ampublisherror_augl": {
                        "r": 1
                    },
                    "adsmanager_amsmartbackgrounddialog_augl": {
                        "r": 1
                    },
                    "adsmanager_amsmartbackgrounddialogclosed_augl": {
                        "r": 1
                    },
                    "adsmanager_amsmartbackgrounderror_augl": {
                        "r": 1
                    },
                    "adsmanager_amsmartbackgroundimagesave_augl": {
                        "r": 1
                    },
                    "adsmanager_amtableadobject_augl": {
                        "r": 1
                    },
                    "adsmanager_amtableadobjectended_augl": {
                        "r": 1
                    },
                    "adsmanager_amurltypeahead_augl": {
                        "r": 1
                    },
                    "adsmanager_amvalidationerror_augl": {
                        "r": 1
                    },
                    "adsmanager_coreappexperience_augl": {
                        "r": 1
                    },
                    "adsmanager_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adsmanager_coreinteractiontoggle_augl": {
                        "r": 1
                    },
                    "adsmanager_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adsmanager_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "adstextoptimization_amadstextsuggestionsapplysuggestion_augl": {
                        "r": 1
                    },
                    "adstextoptimization_amadstextsuggestionshidesuggestion_augl": {
                        "r": 1
                    },
                    "adstextoptimization_amadstextsuggestionsimpressionend_augl": {
                        "r": 1
                    },
                    "adstextoptimization_amadstextsuggestionsimpressionstart_augl": {
                        "r": 1
                    },
                    "adstextoptimization_amadstextsuggestionspopoverclose_augl": {
                        "r": 1
                    },
                    "adstextoptimization_amadstextsuggestionspopoveropen_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreappexperience_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreinteractionmouseover_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreinteractionmouseoverended_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adstextoptimization_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "adswaittimespinners_awtspinners_augl": {
                        "r": 1
                    },
                    "adswaittimespinners_coreappexperience_augl": {
                        "r": 1
                    },
                    "adswaittimespinners_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "adswaittimespinners_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "adswaittimespinners_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "ae_optimal_sizing": {
                        "r": 10000
                    },
                    "al_dialog_shown": {
                        "r": 1
                    },
                    "altpay2_ui_event": {
                        "r": 1
                    },
                    "ama_card_impression": {
                        "r": 1
                    },
                    "ama_card_tap_ask_question": {
                        "r": 1
                    },
                    "ama_card_vpvd": {
                        "r": 10000
                    },
                    "ama_cards_stack_impression": {
                        "r": 1
                    },
                    "ama_create_attachment": {
                        "r": 1
                    },
                    "ama_end_qna_tap": {
                        "r": 10000
                    },
                    "ama_hit_max_character_limit": {
                        "r": 1
                    },
                    "ama_remove_attachment": {
                        "r": 1
                    },
                    "app_rereview_use_alternative_url": {
                        "r": 1
                    },
                    "assistant_ayi_activity": {
                        "r": 1
                    },
                    "assistant_smart_replies_logger": {
                        "r": 1
                    },
                    "assistantactivitylogger": {
                        "r": 1
                    },
                    "attempt_to_send_reply": {
                        "r": 1
                    },
                    "auglexplorer_augleupdatefilter_augl": {
                        "r": 1
                    },
                    "auglexplorer_coreappexperience_augl": {
                        "r": 1
                    },
                    "auglexplorer_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "auglexplorer_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "auglexplorer_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "automated_ads_auto_boost": {
                        "r": 1,
                        "s": 1
                    },
                    "b8_aloha_workrooms": {
                        "r": 1,
                        "s": 1
                    },
                    "bd_mobile_signals": {
                        "r": 1
                    },
                    "bd_operation": {
                        "r": 1
                    },
                    "bd_pdc_signals": {
                        "r": 1,
                        "s": 1
                    },
                    "bi_mlex_ad_history_click": {
                        "r": 1
                    },
                    "bi_mlex_ad_history_impression": {
                        "r": 1
                    },
                    "bi_mlex_feedback_survey_evolution_response": {
                        "r": 1
                    },
                    "bi_pre_approval_ui_events": {
                        "r": 1,
                        "s": 1
                    },
                    "bic_engagement_event": {
                        "r": 1
                    },
                    "bic_entry_point_events": {
                        "r": 1
                    },
                    "billing1_workplace_event": {
                        "r": 1
                    },
                    "billing_interface_debug": {
                        "r": 1
                    },
                    "billing_interface_error": {
                        "r": 1
                    },
                    "billing_interface_event": {
                        "r": 1
                    },
                    "billing_interface_surface_debug": {
                        "r": 1
                    },
                    "billing_interface_surface_error": {
                        "r": 1
                    },
                    "billing_interface_surface_event": {
                        "r": 1
                    },
                    "billing_mi_error": {
                        "r": 1
                    },
                    "billing_mi_event": {
                        "r": 1
                    },
                    "biz_core_diode_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_diode_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_local_nav_tab_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_local_nav_tab_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_log_out_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_more_tools_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_more_tools_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_nav_bar_hover": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_nav_footer_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_notification_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_notification_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_notifications_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_null_state_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_null_state_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_optin_optout_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_optin_optout_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_optin_optout_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_optin_optout_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_overlay_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_overlay_item_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_overlay_item_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_overlay_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_presence_switcher_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_presence_switcher_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_presence_switcher_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_presence_switcher_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_presence_switcher_update_value": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tab_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tab_item_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tab_item_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tab_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tool_diode_upsell_banner_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tool_diode_upsell_banner_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tool_diode_upsell_banner_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_core_tool_outcome": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_ads_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_ads_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_alerts_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_alerts_card_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_alerts_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_entry_point_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_entry_point_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_guidance_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_guidance_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_header_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_header_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_home_header_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_home_header_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_insights_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_insights_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_posts_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_posts_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_updates_card_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_updates_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_welcome_tour_click": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_welcome_tour_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "biz_home_tab_welcome_tour_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "bizapp_tool_outcome": {
                        "r": 1,
                        "s": 1
                    },
                    "bizkit_activities_list_exception": {
                        "r": 1000
                    },
                    "bizkit_activities_overlay_exception": {
                        "r": 1000
                    },
                    "bizkit_activity_item_exception": {
                        "r": 1000
                    },
                    "blood_donation_page_insights_click": {
                        "r": 1
                    },
                    "blood_donation_partner_client_event": {
                        "r": 1
                    },
                    "boosted_jobs_client_event": {
                        "r": 1
                    },
                    "bop_ui_event": {
                        "r": 1
                    },
                    "business_app_store_activity": {
                        "r": 10000
                    },
                    "business_composer_biz_config_receive_response_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_biz_config_receive_response_success": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_biz_config_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_upload": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_upload_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_composer_upload_success": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_media_editor_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_media_editor_button_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_media_editor_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_media_editor_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_media_editor_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_page_business_composer_switch_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_composer_typeahead_search_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_content_preview": {
                        "r": 100
                    },
                    "business_inbox_bulk_admin_assignment_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_admin_assignment_dialog_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_delete_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_delete_dialog_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_label_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_label_dialog_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_mark_as_unread_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_move_to_folder_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_reply_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_bulk_reply_dialog_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_comment_reaction_list_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_comment_reaction_list_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_comment_reply_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_comment_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_content_search_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_content_search_result_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_content_search_result_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_delete_comment_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_header_view_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_inbox_root_init_render": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_inbox_root_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_label_search_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_label_search_result_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_label_search_result_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_mark_all_comments_read_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_message_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_message_composer_focus_acquired": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_message_list_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_message_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_message_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_multi_admin_assignment_update": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_nux_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_nux_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_people_search_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_people_search_result_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_people_search_result_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_platform_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_post_folder_update": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_product_picker_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_product_picker_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_product_picker_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_product_picker_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_saved_reply_send_response": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_search_cancel_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_search_focus_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_search_result_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_status_toggle_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_suggested_label_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_suggested_label_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_switch_folder_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_checkbox_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_checkbox_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_checkbox_update_value": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_delete_header_button_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_delete_header_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_delete_header_button_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_folder_update": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_followup_header_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_list_render_view": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_list_update": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_mark_followup_thread_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_mark_read_unread_header_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_move_to_done_header_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_move_to_done_thread_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_move_to_main_header_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_move_to_main_thread_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_inbox_thread_move_to_spam_header_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "business_integrity_business_banhammer": {
                        "r": 1,
                        "s": 1
                    },
                    "business_integrity_commerce_manager_disapproval": {
                        "r": 1,
                        "s": 1
                    },
                    "business_overwatch": {
                        "r": 1
                    },
                    "business_scoping_error": {
                        "r": 1
                    },
                    "businessmanager_bmadreviewtoolreportdownload_augl": {
                        "r": 1
                    },
                    "businessmanager_bmadreviewtoolrequestactiondialogconfirm_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassetinfoextraaction_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassetpermissionaccordianmenuinteraction_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassetpermissiondelete_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassetpermissiondeletecancel_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassetpermissiondeleteconfirm_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassetpermissionedit_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassettabaddasset_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassettabaddpeople_augl": {
                        "r": 1
                    },
                    "businessmanager_bmassettabassignpartner_augl": {
                        "r": 1
                    },
                    "businessmanager_bmchangetabinteraction_augl": {
                        "r": 1
                    },
                    "businessmanager_bmlistrowimpression_augl": {
                        "r": 1
                    },
                    "businessmanager_bmlistviewinteraction_augl": {
                        "r": 1
                    },
                    "businessmanager_bmlistviewtoggle_augl": {
                        "r": 1
                    },
                    "businessmanager_bmnavigationlevel_augl": {
                        "r": 1
                    },
                    "businessmanager_bmnavigationlevelended_augl": {
                        "r": 1
                    },
                    "businessmanager_bmopenassetintoolaction_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpaneload_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpaneloadended_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpaneopen_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpaneopenended_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpartnercenteradsaction_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpartnercenterknowledgecentercardclick_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpartnercenterpolicyinsightsraiicolumnchartclick_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpartnercentersearchfilter_augl": {
                        "r": 1
                    },
                    "businessmanager_bmpartnercentertimerangefilter_augl": {
                        "r": 1
                    },
                    "businessmanager_bmserverexception_augl": {
                        "r": 1
                    },
                    "businessmanager_bmusertabaddasset_augl": {
                        "r": 1
                    },
                    "businessmanager_bmvalidationerror_augl": {
                        "r": 1
                    },
                    "businessmanager_bmvettingpageinitialload_augl": {
                        "r": 1
                    },
                    "businessmanager_bmvettingpageinitialloadended_augl": {
                        "r": 1
                    },
                    "businessmanager_coreappexperience_augl": {
                        "r": 1
                    },
                    "businessmanager_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractionaccordianmenu_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractioncheckbox_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractiondropdown_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractiondropdownended_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractionradiobutton_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractiontextinput_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractiontextinputended_augl": {
                        "r": 1
                    },
                    "businessmanager_coreinteractiontoggle_augl": {
                        "r": 1
                    },
                    "businessmanager_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "businessmanager_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "businessmanager_coreviewmodal_augl": {
                        "r": 1
                    },
                    "businessmanager_coreviewmodalended_augl": {
                        "r": 1
                    },
                    "c2c_transaction_survey": {
                        "r": 1,
                        "s": 1
                    },
                    "calendar_blacklist_defrag_suggestion": {
                        "r": 1
                    },
                    "camera_roll_cancelled": {
                        "r": 1
                    },
                    "camera_roll_finished": {
                        "r": 1
                    },
                    "camera_roll_folder_in_dropdown_clicked": {
                        "r": 1
                    },
                    "camera_roll_header_camera_clicked": {
                        "r": 1
                    },
                    "camera_roll_header_cancel_button_clicked": {
                        "r": 1
                    },
                    "camera_roll_header_folder_clicked": {
                        "r": 1
                    },
                    "camera_roll_header_next_button_clicked": {
                        "r": 1
                    },
                    "camera_roll_magnifying_glass_button_clicked": {
                        "r": 1
                    },
                    "camera_roll_media_item_clicked": {
                        "r": 1
                    },
                    "camera_roll_opened": {
                        "r": 1
                    },
                    "campus_actions_core": {
                        "r": 1
                    },
                    "cancel_exit_stripe_kyc_onboarding_screen": {
                        "r": 1
                    },
                    "candidate_portal_give_feedback_v2": {
                        "r": 1
                    },
                    "candidate_portal_product_logging": {
                        "r": 1
                    },
                    "candidate_scout_input_modification": {
                        "r": 1
                    },
                    "candidate_scout_scour": {
                        "r": 1
                    },
                    "cases_mobile": {
                        "r": 1
                    },
                    "cases_user_events": {
                        "r": 1
                    },
                    "category_feed_first_page_fetched": {
                        "r": 1
                    },
                    "ccompassion_resources_mental_hub_click_unit": {
                        "r": 10000
                    },
                    "change_beneficiary": {
                        "r": 1
                    },
                    "change_category": {
                        "r": 1
                    },
                    "change_charity": {
                        "r": 1
                    },
                    "change_cover_photo": {
                        "r": 1
                    },
                    "change_currency": {
                        "r": 1
                    },
                    "change_description": {
                        "r": 1
                    },
                    "change_end_date": {
                        "r": 1
                    },
                    "change_goal_amount": {
                        "r": 1
                    },
                    "change_title": {
                        "r": 1
                    },
                    "chatroom_attachment_chat_button_tapped": {
                        "r": 1
                    },
                    "chatroom_join_request_cancelled": {
                        "r": 1
                    },
                    "chatroom_join_request_submitted": {
                        "r": 1
                    },
                    "chatroom_story_vpv": {
                        "r": 1
                    },
                    "chex_checkout_success": {
                        "r": 1
                    },
                    "civic_action_log_event": {
                        "r": 1
                    },
                    "cix_account_status_vpvd": {
                        "r": 1
                    },
                    "cix_warning_screens": {
                        "r": 1
                    },
                    "click_collaborative_post_card_cta": {
                        "r": 1
                    },
                    "click_done_in_collaborative_post_creation": {
                        "r": 1
                    },
                    "click_stripe_kyc_onboarding_cancel_prefill_button": {
                        "r": 1
                    },
                    "click_stripe_kyc_onboarding_prefill_button": {
                        "r": 1
                    },
                    "click_submit_button_stripe_kyc_onboarding": {
                        "r": 1
                    },
                    "clicked_add_note_hcp_stats": {
                        "r": 1
                    },
                    "clicked_edit_note_hcp_stats": {
                        "r": 1
                    },
                    "clo_figg_view_visit_count": {
                        "r": 1
                    },
                    "close_story": {
                        "r": 1
                    },
                    "cloud_gaming_events": {
                        "r": 1
                    },
                    "cloud_gaming_session_event": {
                        "r": 1
                    },
                    "cloud_gaming_webrtc_stats": {
                        "r": 1
                    },
                    "cm_event": {
                        "r": 1,
                        "s": 1
                    },
                    "codex_events": {
                        "r": 1
                    },
                    "comet_feed_attachment_combinations": {
                        "r": 1
                    },
                    "comet_feed_story_menu_action": {
                        "r": 1
                    },
                    "comet_feed_vpvd_test": {
                        "r": 1000
                    },
                    "comet_group_mall_page_visit": {
                        "r": 1
                    },
                    "comet_media_options_click": {
                        "r": 1
                    },
                    "comet_media_remove_tag": {
                        "r": 1
                    },
                    "comet_media_tag": {
                        "r": 1
                    },
                    "comet_media_vpvd": {
                        "r": 1
                    },
                    "comet_news_feed_eof": {
                        "r": 1
                    },
                    "comet_news_feed_eof_unmounted": {
                        "r": 1
                    },
                    "comet_news_feed_loaded": {
                        "r": 1
                    },
                    "comet_notifications_ranking_error": {
                        "r": 1
                    },
                    "comet_opt_in_upsell_interaction": {
                        "r": 1
                    },
                    "comet_opt_out_survey": {
                        "r": 1
                    },
                    "comet_page_post_edit": {
                        "r": 1
                    },
                    "comet_redblock": {
                        "r": 100,
                        "s": 1
                    },
                    "comet_rhc_widget_action": {
                        "r": 1
                    },
                    "comet_scroll_latency": {
                        "r": 10000
                    },
                    "comet_story_attachments": {
                        "r": 1
                    },
                    "comet_topnav_item_click": {
                        "r": 1
                    },
                    "comet_topnav_item_impression": {
                        "r": 1
                    },
                    "comment_inline_seen": {
                        "r": 1
                    },
                    "comment_inline_xout": {
                        "r": 1
                    },
                    "comment_ordering_mode": {
                        "r": 1
                    },
                    "commerce_experimental_component_click": {
                        "r": 1
                    },
                    "commerce_feed_story_click": {
                        "r": 1
                    },
                    "commerce_feed_story_impression": {
                        "r": 1
                    },
                    "commerce_manager_client": {
                        "r": 1
                    },
                    "commerce_manager_ui": {
                        "r": 1,
                        "s": 1
                    },
                    "commerce_pdp_product_tag_click": {
                        "r": 1
                    },
                    "commerce_post_outbound_click": {
                        "r": 1
                    },
                    "commerce_product_tag_alert_click": {
                        "r": 1
                    },
                    "commerce_product_tag_alert_dismiss": {
                        "r": 1
                    },
                    "commerce_product_tag_alert_impression": {
                        "r": 1
                    },
                    "commerce_product_tag_dot_click": {
                        "r": 1
                    },
                    "commerce_product_tag_dot_imp": {
                        "r": 1
                    },
                    "commerce_product_tag_media_click": {
                        "r": 1
                    },
                    "commerce_see_more_from_shop_card_click": {
                        "r": 1
                    },
                    "commerce_shop_landing": {
                        "r": 1
                    },
                    "commerce_shop_product_card_vpv": {
                        "r": 1
                    },
                    "commerce_shop_product_details_imp": {
                        "r": 1
                    },
                    "commerce_shoppable_content_landing_scroll": {
                        "r": 1
                    },
                    "commerce_view_product_details": {
                        "r": 1
                    },
                    "commerce_view_product_tag": {
                        "r": 1
                    },
                    "commerce_view_product_tag_hscroll": {
                        "r": 1
                    },
                    "commerce_view_product_tag_overlapped": {
                        "r": 1
                    },
                    "commerce_view_product_tag_pill": {
                        "r": 1
                    },
                    "commerce_view_product_tag_pill_dwelled": {
                        "r": 1
                    },
                    "commerce_view_product_tag_post": {
                        "r": 1
                    },
                    "commerce_view_product_tag_product": {
                        "r": 1
                    },
                    "commerce_view_product_tagged_post": {
                        "r": 1
                    },
                    "commerce_view_see_more_from_shop": {
                        "r": 1
                    },
                    "commerce_view_shoppable_collection_landing": {
                        "r": 1
                    },
                    "commerce_view_shoppable_content_landing": {
                        "r": 1
                    },
                    "commercial_break_end": {
                        "r": 1
                    },
                    "commercial_break_starting_indicator": {
                        "r": 1
                    },
                    "community_moderation_event": {
                        "r": 1
                    },
                    "community_resources_click_link_mobile": {
                        "r": 1
                    },
                    "community_resources_share_link_mobile": {
                        "r": 1
                    },
                    "community_view_actions_sr_core": {
                        "r": 1
                    },
                    "community_view_actions_sr_low": {
                        "r": 1
                    },
                    "compass_qp_primary_click_event": {
                        "r": 1
                    },
                    "compass_qp_secondary_click_event": {
                        "r": 1
                    },
                    "compass_qp_unit_impression_event": {
                        "r": 1
                    },
                    "compassion_resource_view": {
                        "r": 1
                    },
                    "compassion_resources_mental_hub_select_unit": {
                        "r": 10000
                    },
                    "compassion_resources_mental_hub_view_unit": {
                        "r": 10000
                    },
                    "composer_cancel": {
                        "r": 1
                    },
                    "composer_collaborative_post_add_prompt_text": {
                        "r": 1
                    },
                    "composer_collaborative_post_change_background_color": {
                        "r": 1
                    },
                    "composer_collaborative_post_click_next": {
                        "r": 1
                    },
                    "composer_collaborative_post_tap_response_card": {
                        "r": 1
                    },
                    "composer_entry": {
                        "r": 1
                    },
                    "composer_feature_intent": {
                        "r": 1
                    },
                    "composer_focus_acquired": {
                        "r": 1
                    },
                    "composer_focus_lost": {
                        "r": 1
                    },
                    "composer_init": {
                        "r": 1
                    },
                    "composer_post": {
                        "r": 1
                    },
                    "composer_post_cancel": {
                        "r": 1
                    },
                    "composer_post_failure": {
                        "r": 1
                    },
                    "composer_post_mutation_start": {
                        "r": 1
                    },
                    "composer_post_server_content_rendered": {
                        "r": 1
                    },
                    "composer_post_success": {
                        "r": 1
                    },
                    "composer_post_terminal": {
                        "r": 1
                    },
                    "composer_publish_flow": {
                        "r": 1
                    },
                    "confirm_exit_stripe_kyc_onboarding_screen": {
                        "r": 1
                    },
                    "confirm_fundraiser_match_view_interstitial": {
                        "r": 1
                    },
                    "consent_flow_interactions": {
                        "r": 1
                    },
                    "content_access_and_control": {
                        "r": 1
                    },
                    "content_manager_boost_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_boost_button_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_columns_customizer_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_columns_customizer_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_columns_customizer_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_columns_customizer_update_value": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_confirmation_dialog_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_confirmation_dialog_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_confirmation_dialog_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_config_receive_response_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_config_receive_response_success": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_config_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_receive_response_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_receive_response_success": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_section_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_section_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_detail_view_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_content_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_filter_selector_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_filter_selector_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_filter_selector_update_value": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_nux_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_nux_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_container_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_container_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_container_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_container_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_modal_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_modal_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_modal_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_modal_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_permission_authorize_modal_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_tab_item_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_tab_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_typeahead_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_view_switcher_presence_selector_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_view_switcher_presence_selector_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_view_switcher_tab_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_view_switcher_tab_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_view_switcher_tab_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_click": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_receive_response_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_receive_response_success": {
                        "r": 1,
                        "s": 1
                    },
                    "content_manager_workspace_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "continuous_close_logger_event": {
                        "r": 1,
                        "s": 1
                    },
                    "copy_nonprofit_fundraiser_creation_short_url": {
                        "r": 1
                    },
                    "coworker_opt_out_flow": {
                        "r": 1
                    },
                    "cpas_brand_page_assignment": {
                        "r": 1
                    },
                    "cpas_producer_hub_event": {
                        "r": 1
                    },
                    "create_flow_change_actor": {
                        "r": 1
                    },
                    "create_fundraiser_begin": {
                        "r": 1
                    },
                    "create_fundraiser_match_view_interstitial": {
                        "r": 1
                    },
                    "create_fundraiser_open": {
                        "r": 1
                    },
                    "create_fundraiser_profile_frame_begin": {
                        "r": 1
                    },
                    "create_fundraiser_profile_frame_complete": {
                        "r": 1
                    },
                    "create_living_room_action_link_impression": {
                        "r": 1
                    },
                    "created_hcp_note": {
                        "r": 1
                    },
                    "crisis_click_unit": {
                        "r": 1
                    },
                    "crisis_tool_view_page": {
                        "r": 1
                    },
                    "crisis_view_module": {
                        "r": 1
                    },
                    "crisis_view_unit": {
                        "r": 1
                    },
                    "crowdsourcing_graph_editor_waterfall": {
                        "r": 100,
                        "s": 1
                    },
                    "crowdsourcing_session": {
                        "r": 1
                    },
                    "ctm_multi_photo_carousel_am_multi_photo_carousel_automated_response_create": {
                        "r": 1,
                        "s": 1
                    },
                    "ctm_multi_photo_carousel_am_multi_photo_carousel_automated_response_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "ctm_multi_photo_carousel_am_multi_photo_carousel_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "ctm_multi_photo_carousel_am_multi_photo_carousel_button_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "ctm_multi_photo_carousel_am_multi_photo_carousel_option_click": {
                        "r": 1,
                        "s": 1
                    },
                    "ctm_multi_photo_carousel_am_multi_photo_carousel_option_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "curation_tool_trending": {
                        "r": 1,
                        "s": 1
                    },
                    "customer_feedback_end": {
                        "r": 1
                    },
                    "customer_feedback_open": {
                        "r": 1
                    },
                    "deal_review_creation": {
                        "r": 1
                    },
                    "deal_review_exception": {
                        "r": 1
                    },
                    "deferred_feedback_experience": {
                        "r": 1
                    },
                    "delete_media_attempted": {
                        "r": 1
                    },
                    "deleted_hcp_note": {
                        "r": 1
                    },
                    "developer_bulk_self_certification_logger_event": {
                        "r": 1,
                        "s": 1
                    },
                    "developer_capability_accept_button_clicked": {
                        "r": 1
                    },
                    "developer_capability_decline_button_clicked": {
                        "r": 1
                    },
                    "developer_capability_decline_modal_confirmed": {
                        "r": 1
                    },
                    "developer_capability_decline_modal_shown": {
                        "r": 1
                    },
                    "developer_capability_mini_duc_accept_button_clicked": {
                        "r": 1
                    },
                    "developer_capability_mini_duc_modal_shown": {
                        "r": 1
                    },
                    "developer_capability_removal_modal_confirmed": {
                        "r": 1
                    },
                    "developer_capability_remove_button_clicked": {
                        "r": 1
                    },
                    "developer_capability_remove_modal_shown": {
                        "r": 1
                    },
                    "developer_capability_report_bug_button_clicked": {
                        "r": 1
                    },
                    "developer_capability_table_shown": {
                        "r": 1
                    },
                    "developer_registration_account_verification_shown": {
                        "r": 1
                    },
                    "developer_registration_email_verification_shown": {
                        "r": 1
                    },
                    "developer_registration_role_selection_shown": {
                        "r": 1
                    },
                    "developer_registration_term_shown": {
                        "r": 1
                    },
                    "devsupport_recognition_event": {
                        "r": 10000
                    },
                    "dialog_before_unload": {
                        "r": 1
                    },
                    "dialog_cancel": {
                        "r": 1
                    },
                    "dialog_confirm": {
                        "r": 1
                    },
                    "dialog_unload": {
                        "r": 1
                    },
                    "dialog_validation_error": {
                        "r": 1
                    },
                    "discard_fundraiser_draft": {
                        "r": 1
                    },
                    "discovery_hub_click_content": {
                        "r": 1
                    },
                    "discovery_hub_click_unit": {
                        "r": 1
                    },
                    "discovery_hub_follow_hub": {
                        "r": 1
                    },
                    "discovery_hub_share_hub": {
                        "r": 1
                    },
                    "discovery_hub_unfollow_hub": {
                        "r": 1
                    },
                    "discovery_hub_view_content": {
                        "r": 1
                    },
                    "discovery_hub_view_unit": {
                        "r": 1
                    },
                    "donation_thank_you_comment_dialog_open": {
                        "r": 1
                    },
                    "e2e_deletion_requests": {
                        "r": 1
                    },
                    "edge_insights": {
                        "r": 1,
                        "s": 1
                    },
                    "edit_collaborative_post_attachment": {
                        "r": 1
                    },
                    "edit_fundraiser_begin": {
                        "r": 1
                    },
                    "effect_auto_upgrade_events": {
                        "r": 1,
                        "s": 1
                    },
                    "enforcement_dashboard_logging": {
                        "r": 1
                    },
                    "enterpriseevents_coreappexperience_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreinteractiondropdown_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreinteractiondropdownended_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreinteractiontextinput_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreinteractiontextinputended_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreviewmodal_augl": {
                        "r": 1
                    },
                    "enterpriseevents_coreviewmodalended_augl": {
                        "r": 1
                    },
                    "enterpriseevents_epbusinessaddpeople_augl": {
                        "r": 1
                    },
                    "enterpriseevents_eppaneload_augl": {
                        "r": 1
                    },
                    "enterpriseevents_eppaneloadended_augl": {
                        "r": 1
                    },
                    "event_target": {
                        "r": 1
                    },
                    "events_transparency_history_details_view": {
                        "r": 1
                    },
                    "exit_collaborative_post_creation": {
                        "r": 1
                    },
                    "external_metric_consumption_validation_event": {
                        "r": 1
                    },
                    "external_share_tracking_event": {
                        "r": 1
                    },
                    "facebook_partner_program": {
                        "r": 1
                    },
                    "faq_view_answer": {
                        "r": 1
                    },
                    "fb_form_instance_commit_stream": {
                        "r": 1
                    },
                    "fb_mini_shop_send_onboarding_email_flow": {
                        "r": 1
                    },
                    "fbe_fb_app_store_event": {
                        "r": 1
                    },
                    "fbpay_vas_hub_entry_point_button_click": {
                        "r": 1
                    },
                    "fbpay_vas_offer_card_claim_click": {
                        "r": 1
                    },
                    "fbpay_vas_offer_card_share_click": {
                        "r": 1
                    },
                    "fbpay_vas_offer_card_shop_click": {
                        "r": 1
                    },
                    "fbpay_vas_offer_share_send_event": {
                        "r": 1
                    },
                    "fbpay_vas_payhub_offer_upsell_click": {
                        "r": 1
                    },
                    "fbpay_vas_show_offer_detail_card": {
                        "r": 1
                    },
                    "fbt_impressions_batch": {
                        "r": 1
                    },
                    "feature_limited": {
                        "r": 1
                    },
                    "feed_friend_request_confirm": {
                        "r": 1
                    },
                    "feed_friend_request_delete": {
                        "r": 1
                    },
                    "feed_friend_request_imp": {
                        "r": 1
                    },
                    "feed_friend_request_profile": {
                        "r": 1
                    },
                    "filter_page_fundraisers_tab": {
                        "r": 1
                    },
                    "flx_dialog_shown": {
                        "r": 1
                    },
                    "flx_feature_limited": {
                        "r": 1
                    },
                    "for_sale_item_message_seller_button_clicked": {
                        "r": 1
                    },
                    "friending_comet_friends_tab_interaction": {
                        "r": 1
                    },
                    "friends_center_opened": {
                        "r": 1
                    },
                    "frtp_survey_response": {
                        "r": 1
                    },
                    "fundraiser_add_organizers": {
                        "r": 1
                    },
                    "fundraiser_change_p4p_country": {
                        "r": 1
                    },
                    "fundraiser_change_p4p_currency": {
                        "r": 1
                    },
                    "fundraiser_creation_search_beneficiaries": {
                        "r": 1
                    },
                    "fundraiser_hub_charity_search_load_more": {
                        "r": 1
                    },
                    "fundraiser_hub_charity_search_results": {
                        "r": 1
                    },
                    "fundraiser_match_delete_begin": {
                        "r": 1
                    },
                    "fundraiser_match_delete_complete": {
                        "r": 1
                    },
                    "fundraiser_match_review_view_interstitial": {
                        "r": 1
                    },
                    "fundraiser_onboarding_application_initialization": {
                        "r": 1
                    },
                    "games_service_developer_event": {
                        "r": 1,
                        "s": 1
                    },
                    "games_service_game_invite": {
                        "r": 1,
                        "s": 1
                    },
                    "gaming_arena": {
                        "r": 1
                    },
                    "gaming_coplay_falco_event": {
                        "r": 1
                    },
                    "gaming_video_level_up_qp": {
                        "r": 1
                    },
                    "gemini_opt_out_survey": {
                        "r": 1
                    },
                    "generic_alert_card_tap": {
                        "r": 1
                    },
                    "geodesic_redblock": {
                        "r": 1,
                        "s": 1
                    },
                    "goodwill_content_view": {
                        "r": 1
                    },
                    "goodwill_permalink_subpage_view": {
                        "r": 1
                    },
                    "goodwill_product_system_share_menu_open": {
                        "r": 1
                    },
                    "gpymi_add": {
                        "r": 1
                    },
                    "gpymi_feed_unit": {
                        "r": 1
                    },
                    "gpymi_imp": {
                        "r": 1
                    },
                    "graphql_live_query_event": {
                        "r": 1
                    },
                    "griffin_tab_open": {
                        "r": 1
                    },
                    "group_integrity_inform_cta_click": {
                        "r": 1
                    },
                    "group_leaders_engagement": {
                        "r": 1
                    },
                    "group_quality_actions": {
                        "r": 10000
                    },
                    "group_visit_action": {
                        "r": 1
                    },
                    "groups_comment_sort_switcher_event": {
                        "r": 1,
                        "s": 1
                    },
                    "groups_discovery_exception": {
                        "r": 1
                    },
                    "groups_discovery_filter_selected": {
                        "r": 1
                    },
                    "groups_discovery_group_join_requested": {
                        "r": 1
                    },
                    "groups_discovery_group_visit": {
                        "r": 1
                    },
                    "groups_discovery_page_load": {
                        "r": 1
                    },
                    "groups_integrity_join_friction_cancel": {
                        "r": 1
                    },
                    "groups_integrity_join_friction_impression": {
                        "r": 1
                    },
                    "groups_integrity_warning_card_impression": {
                        "r": 1
                    },
                    "groups_mall_activation_pymi": {
                        "r": 1
                    },
                    "groups_post_insights": {
                        "r": 1
                    },
                    "groups_sole_admin_confirm_go_back": {
                        "r": 1
                    },
                    "groups_sole_admin_confirm_interstitial_impression": {
                        "r": 1
                    },
                    "groups_sole_admin_interstitial_done": {
                        "r": 1
                    },
                    "groups_sole_admin_invite_interstitial_cancel": {
                        "r": 1
                    },
                    "groups_sole_admin_invite_interstitial_impression": {
                        "r": 1
                    },
                    "groups_sole_admin_launch_invite_dialog": {
                        "r": 1
                    },
                    "groups_viewed_rules": {
                        "r": 1
                    },
                    "gysj_join": {
                        "r": 1
                    },
                    "gysj_profile": {
                        "r": 1
                    },
                    "gysj_unjoin": {
                        "r": 1
                    },
                    "gysj_xout": {
                        "r": 1
                    },
                    "health_click": {
                        "r": 1
                    },
                    "helpdesk_kms": {
                        "r": 1
                    },
                    "holy_diver_client_request": {
                        "r": 1
                    },
                    "ias_uts_client_debugging": {
                        "r": 1
                    },
                    "icc_ux": {
                        "r": 1,
                        "s": 1
                    },
                    "instant_games_interactive_poll_event": {
                        "r": 1
                    },
                    "instant_games_shareable_link_event": {
                        "r": 1
                    },
                    "instant_games_tournaments_events": {
                        "r": 1
                    },
                    "instant_games_update_comment": {
                        "r": 1
                    },
                    "instant_games_web_funnel_event": {
                        "r": 1
                    },
                    "instant_games_web_hub_events": {
                        "r": 1,
                        "s": 1
                    },
                    "intern_cases_left_nav_click_add_subcase_button": {
                        "r": 1
                    },
                    "intern_cases_left_nav_click_inline_more_button": {
                        "r": 1
                    },
                    "intern_cases_select_case_type_entry": {
                        "r": 1
                    },
                    "intern_cases_select_existing_task_entry": {
                        "r": 1
                    },
                    "intern_cases_top_bar_logo": {
                        "r": 1
                    },
                    "intern_cases_top_bar_search_button": {
                        "r": 1
                    },
                    "intl_commitment_warning": {
                        "r": 1,
                        "s": 1
                    },
                    "intl_stcv2_create_edit_clone_logger_config": {
                        "r": 1
                    },
                    "invite_user_dialog_open": {
                        "r": 1
                    },
                    "knowledge_notes": {
                        "r": 1
                    },
                    "labnet_event": {
                        "r": 1
                    },
                    "laminardevtools_coreappexperience_augl": {
                        "r": 1
                    },
                    "laminardevtools_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "laminardevtools_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "laminardevtools_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "laminardevtools_ldtactionselected_augl": {
                        "r": 1
                    },
                    "laminardevtools_ldtdispatchinfoviewchange_augl": {
                        "r": 1
                    },
                    "laminardevtools_ldtinit_augl": {
                        "r": 1
                    },
                    "laminardevtools_ldtsearchfilter_augl": {
                        "r": 1
                    },
                    "laminardevtools_ldttabchange_augl": {
                        "r": 1
                    },
                    "launch_message_seller_dialog": {
                        "r": 1
                    },
                    "ldp_touchpoint_logger": {
                        "r": 10000
                    },
                    "leads_center_audience_expansion_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_audience_expansion_create": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_audience_expansion_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_audience_expansion_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_audience_expansion_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_bulk_action_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_crm_stage_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_download_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_download_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_upload": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_upload_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_csv_import_upload_success": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_button_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_setting_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tab_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_thread_list_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_auto_reply_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_auto_reply_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_auto_reply_submit_flow_cancel": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_auto_reply_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_auto_reply_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_business_send_email_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_business_send_email_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_business_send_email_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_business_send_email_submit_flow_cancel": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_business_send_email_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_business_send_email_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_confirmation_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_confirmation_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_confirmation_submit_flow_cancel": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_confirmation_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_confirmation_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_scheduled_email_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_scheduled_email_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_scheduled_email_submit": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_scheduled_email_submit_flow_cancel": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_scheduled_email_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_email_tool_scheduled_email_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_filter_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_filter_create": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_filter_delete": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_filter_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_filter_update": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_in_surface_notification_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_in_surface_notification_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_inbox_segmentation_card_upsell_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_inbox_segmentation_card_upsell_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_inbox_segmentation_card_upsell_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_inbox_segmentation_card_upsell_reject": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_inbox_segmentation_card_upsell_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_label_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_label_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_lead_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_lead_list_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_lead_list_receive_response": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_lead_list_receive_response_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_lead_list_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_note_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_note_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_onboarding_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_onboarding_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_onboarding_exit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_reminder_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_reminder_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_saved_audience_click": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_saved_audience_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_saved_audience_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_saved_audience_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_saved_audience_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_tos_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_tos_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "leads_center_tos_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "learning_click_component": {
                        "r": 1
                    },
                    "learning_exception": {
                        "r": 1
                    },
                    "learning_view_component": {
                        "r": 1
                    },
                    "lh_digest_logging": {
                        "r": 1
                    },
                    "lightweight_negative_feedback_hide": {
                        "r": 1
                    },
                    "live_ads": {
                        "r": 1,
                        "s": 1
                    },
                    "live_join_group_cta_click": {
                        "r": 1
                    },
                    "live_producer_events": {
                        "r": 1,
                        "s": 1
                    },
                    "live_shopping_composer_first_open": {
                        "r": 1
                    },
                    "live_shopping_composer_skipped": {
                        "r": 1
                    },
                    "live_shopping_first_time_seller_nux": {
                        "r": 1
                    },
                    "live_shopping_viewer": {
                        "r": 1
                    },
                    "live_trace_www": {
                        "r": 1
                    },
                    "live_trace_www_video_player": {
                        "r": 1
                    },
                    "live_video_frame_displayed": {
                        "r": 1
                    },
                    "live_video_rewind": {
                        "r": 1,
                        "s": 1
                    },
                    "live_video_segment_download": {
                        "r": 1
                    },
                    "living_room": {
                        "r": 1
                    },
                    "locationmanager_coreappexperience_augl": {
                        "r": 1
                    },
                    "locationmanager_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractionaccordianmenu_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractioncheckbox_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractiondropdown_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractiondropdownended_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractionradiobutton_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractiontextinput_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractiontextinputended_augl": {
                        "r": 1
                    },
                    "locationmanager_coreinteractiontoggle_augl": {
                        "r": 1
                    },
                    "locationmanager_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "locationmanager_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "locationmanager_coreviewmodal_augl": {
                        "r": 1
                    },
                    "locationmanager_coreviewmodalended_augl": {
                        "r": 1
                    },
                    "log_candidate_code_evaluation_event": {
                        "r": 1
                    },
                    "log_cms_editor_session": {
                        "r": 10000
                    },
                    "log_cms_editor_subsession": {
                        "r": 10000
                    },
                    "log_comet_canvas_app_time_spent": {
                        "r": 1
                    },
                    "log_messenger_frx_events_in_cix_screen": {
                        "r": 1
                    },
                    "ls_bot_composer_quick_reply_bubble_tapped": {
                        "r": 1
                    },
                    "ls_bot_composer_quick_reply_displayed": {
                        "r": 1
                    },
                    "ls_bot_composer_quick_reply_tapped": {
                        "r": 1
                    },
                    "ls_business_icebreaker_displayed": {
                        "r": 1
                    },
                    "ls_business_icebreaker_displayed_ib_sheet": {
                        "r": 1
                    },
                    "ls_business_icebreaker_displayed_owc": {
                        "r": 1
                    },
                    "ls_business_icebreaker_tapped": {
                        "r": 1
                    },
                    "ls_business_icebreaker_tapped_ib_sheet": {
                        "r": 1
                    },
                    "ls_business_icebreaker_tapped_owc": {
                        "r": 1
                    },
                    "ls_business_welcome_page_composer_hided": {
                        "r": 1
                    },
                    "ls_business_welcome_page_get_started_button_impression": {
                        "r": 1
                    },
                    "ls_business_welcome_page_get_started_button_tapped": {
                        "r": 1
                    },
                    "ls_business_welcome_page_impression": {
                        "r": 1
                    },
                    "ls_business_welcome_page_start": {
                        "r": 1
                    },
                    "ls_cta_click_client_handling_success": {
                        "r": 1
                    },
                    "ls_cta_displayed_button_tapped": {
                        "r": 1
                    },
                    "ls_data_trace": {
                        "r": 1
                    },
                    "ls_did_tap_call_to_action": {
                        "r": 1
                    },
                    "ls_message_click": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_facebook_confirmed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_facebook_failed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_facebook_succeeded": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_facebook_tapped": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_messages_confirmed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_messages_failed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_messages_succeeded": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_messages_tapped": {
                        "r": 1
                    },
                    "ls_messenger_integrity_block_view_enter": {
                        "r": 1
                    },
                    "ls_messenger_integrity_learn_more_tapped": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_facebook_confirmed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_facebook_failed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_facebook_succeeded": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_facebook_tapped": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_messages_confirmed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_messages_failed": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_messages_succeeded": {
                        "r": 1
                    },
                    "ls_messenger_integrity_unblock_messages_tapped": {
                        "r": 1
                    },
                    "ls_persistent_menu_client_handling_success": {
                        "r": 1
                    },
                    "ls_persistent_menu_icon_tapped": {
                        "r": 1
                    },
                    "ls_persistent_menu_is_set_up": {
                        "r": 1
                    },
                    "ls_reply_canceled": {
                        "r": 1
                    },
                    "ls_reply_click": {
                        "r": 1
                    },
                    "ls_reply_complete": {
                        "r": 1
                    },
                    "ls_reply_rendered": {
                        "r": 1
                    },
                    "ls_reply_sent": {
                        "r": 1
                    },
                    "ls_rtc_call_summary": {
                        "r": 1
                    },
                    "ls_rtc_connection_start": {
                        "r": 1
                    },
                    "ls_rtc_end_call_survey": {
                        "r": 1
                    },
                    "ls_rtc_peer_connection_summary": {
                        "r": 1
                    },
                    "ls_rtc_star_rating": {
                        "r": 1
                    },
                    "ls_rtc_star_rating_shown": {
                        "r": 1
                    },
                    "ls_rtc_tslog": {
                        "r": 1
                    },
                    "lynx_async_callback": {
                        "r": 1
                    },
                    "manage_friends_entry_point_click": {
                        "r": 1
                    },
                    "manage_friends_entry_point_dismissal": {
                        "r": 1
                    },
                    "manage_friends_entry_point_impression": {
                        "r": 1
                    },
                    "manage_friends_friend_impression": {
                        "r": 1
                    },
                    "manage_friends_friend_profile_click": {
                        "r": 1
                    },
                    "manage_friends_friend_unfriend_cancel": {
                        "r": 1
                    },
                    "manage_friends_friend_unfriend_click": {
                        "r": 1
                    },
                    "manage_friends_friend_unfriend_confirm": {
                        "r": 1
                    },
                    "manage_friends_visitation": {
                        "r": 1
                    },
                    "managedlift_coreappexperience_augl": {
                        "r": 1
                    },
                    "managedlift_coreappexperienceended_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionbutton_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractioncheckbox_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractioncollapse_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionexpand_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionmouseover_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionmouseoverended_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionpanetab_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionradiobutton_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionsearchbar_augl": {
                        "r": 1
                    },
                    "managedlift_coreinteractionsearchbarended_augl": {
                        "r": 1
                    },
                    "managedlift_coreuserinteraction_augl": {
                        "r": 1
                    },
                    "managedlift_coreuserinteractionended_augl": {
                        "r": 1
                    },
                    "managedlift_coreviewmodal_augl": {
                        "r": 1
                    },
                    "managedlift_coreviewmodalended_augl": {
                        "r": 1
                    },
                    "managedlift_mlapierror_augl": {
                        "r": 1
                    },
                    "managedlift_mlerror_augl": {
                        "r": 1
                    },
                    "managedlift_mlfieldset_augl": {
                        "r": 1
                    },
                    "managedlift_mllink_augl": {
                        "r": 1
                    },
                    "managedlift_mlsurveyrespond_augl": {
                        "r": 1
                    },
                    "managedlift_mltypeaheadselect_augl": {
                        "r": 1
                    },
                    "managedlift_mlvalidationerror_augl": {
                        "r": 1
                    },
                    "managedlift_mlviewcomponent_augl": {
                        "r": 1
                    },
                    "managedlift_mlviewcomponentended_augl": {
                        "r": 1
                    },
                    "marketplace_click": {
                        "r": 1
                    },
                    "marketplace_feed_load": {
                        "r": 1
                    },
                    "marketplace_first_scroll": {
                        "r": 1
                    },
                    "marketplace_impression": {
                        "r": 1
                    },
                    "marketplace_long_click": {
                        "r": 1
                    },
                    "marketplace_modify": {
                        "r": 1
                    },
                    "marketplace_pdp_tracking_data_tracker": {
                        "r": 1
                    },
                    "marketplace_photo_sync": {
                        "r": 1,
                        "s": 1
                    },
                    "marketplace_pre_recorded_video_upload_error": {
                        "r": 1
                    },
                    "marketplace_pre_recorded_video_upload_finish": {
                        "r": 1
                    },
                    "marketplace_pre_recorded_video_upload_start": {
                        "r": 1
                    },
                    "marketplace_seo_crawler_page": {
                        "r": 1
                    },
                    "marketplace_structured_composer_post_created": {
                        "r": 1
                    },
                    "marketplace_structured_composer_post_failed": {
                        "r": 1
                    },
                    "marketplace_surface_enter": {
                        "r": 1
                    },
                    "marketplace_surface_exit": {
                        "r": 1
                    },
                    "media_cancelled_post_flow": {
                        "r": 1
                    },
                    "media_failed_post_flow": {
                        "r": 1
                    },
                    "media_finished_post_flow": {
                        "r": 1
                    },
                    "media_started_post_flow": {
                        "r": 1
                    },
                    "media_upload_cancel": {
                        "r": 1
                    },
                    "media_upload_failure": {
                        "r": 1
                    },
                    "media_upload_flow_cancel": {
                        "r": 1
                    },
                    "media_upload_flow_fatal": {
                        "r": 1
                    },
                    "media_upload_flow_giveup": {
                        "r": 1
                    },
                    "media_upload_flow_incomplete": {
                        "r": 1
                    },
                    "media_upload_flow_start": {
                        "r": 1
                    },
                    "media_upload_flow_success": {
                        "r": 1
                    },
                    "media_upload_init_failure": {
                        "r": 1
                    },
                    "media_upload_init_start": {
                        "r": 1
                    },
                    "media_upload_init_success": {
                        "r": 1
                    },
                    "media_upload_process_cancel": {
                        "r": 1
                    },
                    "media_upload_process_failure": {
                        "r": 1
                    },
                    "media_upload_process_skipped": {
                        "r": 1
                    },
                    "media_upload_process_start": {
                        "r": 1
                    },
                    "media_upload_process_success": {
                        "r": 1
                    },
                    "media_upload_start": {
                        "r": 1
                    },
                    "media_upload_success": {
                        "r": 1
                    },
                    "media_upload_transfer_cancel": {
                        "r": 1
                    },
                    "media_upload_transfer_failure": {
                        "r": 1
                    },
                    "media_upload_transfer_start": {
                        "r": 1
                    },
                    "media_upload_transfer_success": {
                        "r": 1
                    },
                    "member_accepted_hcp_historical_content_dialog": {
                        "r": 1
                    },
                    "member_accepted_hcp_message_request": {
                        "r": 1
                    },
                    "member_clicked_hcp_message_profile_button": {
                        "r": 1
                    },
                    "member_clicked_hcp_reply_in_messenger": {
                        "r": 1
                    },
                    "member_continued_hcp_ed_bottom_sheet": {
                        "r": 1
                    },
                    "member_continued_hcp_ed_interstitial": {
                        "r": 1
                    },
                    "member_continued_hcp_messaging_warning": {
                        "r": 1
                    },
                    "member_exited_hcp_ed_interstitial": {
                        "r": 1
                    },
                    "member_exited_hcp_historical_content_dialog": {
                        "r": 1
                    },
                    "member_rejected_hcp_message_request": {
                        "r": 1
                    },
                    "member_saw_hcp_accepted_message": {
                        "r": 1
                    },
                    "member_saw_hcp_ed_bottom_sheet": {
                        "r": 1
                    },
                    "member_saw_hcp_ed_interstitial": {
                        "r": 1
                    },
                    "member_saw_hcp_historical_content_dialog": {
                        "r": 1
                    },
                    "member_saw_hcp_message_request": {
                        "r": 1
                    },
                    "member_saw_hcp_message_request_composer": {
                        "r": 1
                    },
                    "member_saw_hcp_messaging_warning": {
                        "r": 1
                    },
                    "member_sent_hcp_message_request": {
                        "r": 1
                    },
                    "member_typed_hcp_message_request_composer": {
                        "r": 1
                    },
                    "mental_health_hub_click_unit": {
                        "r": 1
                    },
                    "mental_health_hub_select_unit": {
                        "r": 1
                    },
                    "mental_health_hub_view_unit": {
                        "r": 1
                    },
                    "mentorship": {
                        "r": 1
                    },
                    "mentorship_cohort": {
                        "r": 1
                    },
                    "mentorship_user": {
                        "r": 1
                    },
                    "messenger_ads_link_click": {
                        "r": 1
                    },
                    "messenger_ads_link_click_cta": {
                        "r": 1
                    },
                    "messenger_ads_message_seen_inbox": {
                        "r": 1
                    },
                    "messenger_ads_message_seen_thread": {
                        "r": 1
                    },
                    "messenger_business_composer_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_composer_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_faq_setting_add_question_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_faq_setting_delete_question_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_faq_setting_entry_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_faq_setting_save_question_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_faq_setting_turn_on_or_off_messenger_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_faq_tip_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_inbox_action_menu_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_inbox_action_menu_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_inbox_action_menu_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_menu_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_menu_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_message_send_request": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_message_sent_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notif_push_handler_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_extension_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_handle_action_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_intent_handler_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_message_sending_by_quick_action_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_message_sent_by_quick_action_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_tray_action_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_trigger_quick_action_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_notification_wrapper_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_profile_badge_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_snapshot_notification_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_suggested_reply_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_suggested_reply_dismiss": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_suggested_reply_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_sync_notification_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_thread_click": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_thread_loaded_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_thread_update_value": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_business_threadview_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "messenger_desktop_promo": {
                        "r": 1
                    },
                    "messenger_integrity_block_facebook_tapped": {
                        "r": 1
                    },
                    "messenger_integrity_unblock_facebook_tapped": {
                        "r": 1
                    },
                    "messenger_integrity_unignore_facebook_failed": {
                        "r": 1
                    },
                    "messenger_integrity_unignore_facebook_succeeded": {
                        "r": 1
                    },
                    "messenger_integrity_unignore_facebook_tapped": {
                        "r": 1
                    },
                    "messenger_peek_state": {
                        "r": 1
                    },
                    "messenger_psuedo_block_warning_dialog_shown": {
                        "r": 1
                    },
                    "messenger_shops_element_click": {
                        "r": 1
                    },
                    "messenger_shops_element_impression": {
                        "r": 1
                    },
                    "messenger_shops_xma_click": {
                        "r": 1
                    },
                    "messenger_shops_xma_render": {
                        "r": 1
                    },
                    "messenger_unignore_failed": {
                        "r": 1
                    },
                    "messenger_unignore_succeeded": {
                        "r": 1
                    },
                    "messenger_unignore_tapped": {
                        "r": 1
                    },
                    "messenger_web_update_emoji_color_event": {
                        "r": 1,
                        "s": 1
                    },
                    "mib_message_send": {
                        "r": 1
                    },
                    "microaggressions_highlight": {
                        "r": 1
                    },
                    "mini_shop_element_click": {
                        "r": 1
                    },
                    "mini_shop_element_impression": {
                        "r": 1
                    },
                    "mini_shop_error": {
                        "r": 1
                    },
                    "mini_shop_save_product": {
                        "r": 1
                    },
                    "mini_shop_surface_enter": {
                        "r": 1
                    },
                    "mini_shop_surface_exit": {
                        "r": 1
                    },
                    "mini_shop_unsave_product": {
                        "r": 1
                    },
                    "misinfo_frontend": {
                        "r": 1
                    },
                    "mk_client_event": {
                        "r": 1
                    },
                    "mn_cowatch_rtc_event": {
                        "r": 1
                    },
                    "mn_rtc_cowatch_time_spent": {
                        "r": 1
                    },
                    "mqtt_unified_client_connect": {
                        "r": 5000,
                        "s": 1
                    },
                    "mqtt_unified_client_disconnect": {
                        "r": 5000,
                        "s": 1
                    },
                    "mqtt_unified_client_incoming_publish": {
                        "r": 5000,
                        "s": 1
                    },
                    "mqtt_unified_client_outgoing_publish": {
                        "r": 5000,
                        "s": 1
                    },
                    "news_contributions_lma_donation": {
                        "r": 1
                    },
                    "news_digest_content_impression_event": {
                        "r": 1
                    },
                    "news_digest_outbound_click_event": {
                        "r": 1
                    },
                    "news_digest_primary_click_event": {
                        "r": 1
                    },
                    "news_digest_secondary_click_event": {
                        "r": 1
                    },
                    "news_digest_unit_impression_event": {
                        "r": 1
                    },
                    "notif_list_bottom_collision": {
                        "r": 10000
                    },
                    "notification_permalink_time_spent": {
                        "r": 1
                    },
                    "npe_event": {
                        "r": 1
                    },
                    "npe_test_event": {
                        "r": 1
                    },
                    "ob_ccs_submission": {
                        "r": 1,
                        "s": 1
                    },
                    "ob_uga_submission": {
                        "r": 1,
                        "s": 1
                    },
                    "oc_quick_login_on_oc_browser": {
                        "r": 1
                    },
                    "oculus_dev_web_client_behavior": {
                        "r": 1
                    },
                    "oculus_dev_web_client_debug": {
                        "r": 1
                    },
                    "oculus_experiences_fb_media_pdp": {
                        "r": 1
                    },
                    "oculus_twilight_voice_activity": {
                        "r": 10000
                    },
                    "offer_notifications": {
                        "r": 10000
                    },
                    "onevc_camera_video_quality_limitation": {
                        "r": 1
                    },
                    "open_charity_beneficiary_selector": {
                        "r": 1
                    },
                    "open_friend_beneficiary_selector": {
                        "r": 1
                    },
                    "open_media": {
                        "r": 1
                    },
                    "open_seen_summary": {
                        "r": 1
                    },
                    "open_story": {
                        "r": 1
                    },
                    "outgoing_request_cancel_click": {
                        "r": 1
                    },
                    "outgoing_request_impression": {
                        "r": 1
                    },
                    "outgoing_request_profile_click": {
                        "r": 1
                    },
                    "outgoing_requests_visitation": {
                        "r": 1
                    },
                    "overlays_tos_accept": {
                        "r": 1
                    },
                    "ownership_integration_event": {
                        "r": 1,
                        "s": 1
                    },
                    "ownership_oncall_rotation_schedule_visit": {
                        "r": 1
                    },
                    "ownership_primary_reporting_team_assignment": {
                        "r": 1
                    },
                    "ownership_suggested_actions": {
                        "r": 1
                    },
                    "ownership_tab_visit": {
                        "r": 1
                    },
                    "oxsights_report_migration": {
                        "r": 1,
                        "s": 1
                    },
                    "page_admin_replied": {
                        "r": 1
                    },
                    "page_family_of_apps_link": {
                        "r": 1
                    },
                    "page_family_of_apps_unlink": {
                        "r": 1
                    },
                    "page_give_tab_learn_more_link_tapped": {
                        "r": 1
                    },
                    "page_insights_mobile_exception": {
                        "r": 1
                    },
                    "page_private_reply_action_flow": {
                        "r": 1
                    },
                    "page_whatsapp_linking_syncing": {
                        "r": 1
                    },
                    "pages_composer_composer_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_focus_acquired": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_focus_lost": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_composer_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_consolidated_entry_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_post_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_post_edit_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_post_edit_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_post_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_post_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_reminder_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_draft_reminder_unit_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_footer_setting_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_media_attachment_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_media_attachment_button_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_photo_uploader_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_photo_uploader_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_photo_uploader_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_submit_flow_failure": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_submit_flow_success": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_offer_composer_update_value": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_preview_button_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_schedule_post_cancel_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_schedule_post_enter_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_composer_schedule_post_submit_flow": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_inbox_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_launchpoint_pages_you_manage_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_launchpoint_view_message_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_launchpoint_view_notification_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_message_thread_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_action_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_action_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_address_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_bookmark_launchpoint_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_card_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_card_see_all_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_completion_meter_action_item_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_completion_meter_cta_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_completion_meter_entry_point_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_completion_meter_menu_option_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_completion_meter_menu_option_row_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_cover_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_cover_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_email_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_get_directions_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_like_chaining_unit_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_map_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_message_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_notification_menu_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_photo_album_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_photo_album_create": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_photo_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_settings_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_similar_pages_trending_posts_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_similar_pages_trending_posts_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_surface_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_video_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_page_website_click": {
                        "r": 1,
                        "s": 1
                    },
                    "pages_permalink_impression": {
                        "r": 1,
                        "s": 1
                    },
                    "partner_home_favorite_org": {
                        "r": 1
                    },
                    "partner_home_lookup_asset": {
                        "r": 1
                    },
                    "partner_home_unfavorite_org": {
                        "r": 1
                    },
                    "partner_home_view_partner": {
                        "r": 1
                    },
                    "partner_home_work_chat_clicked": {
                        "r": 1
                    },
                    "paycheck_protection_program_engagement": {
                        "r": 1
                    },
                    "payments_flows_log": {
                        "r": 1,
                        "s": 1
                    },
                    "people_you_may_follow": {
                        "r": 1
                    },
                    "perf": {
                        "r": 1,
                        "s": 1
                    },
                    "pfh_integration_event": {
                        "r": 1,
                        "s": 1
                    },
                    "photo_review_photo_render_event": {
                        "r": 1
                    },
                    "photo_review_user_engagement_event": {
                        "r": 1
                    },
                    "pii_action_flow": {
                        "r": 1
                    },
                    "play_inline_media": {
                        "r": 1
                    },
                    "pmv_interruptions_events": {
                        "r": 1
                    },
                    "political_ads_infosheet": {
                        "r": 1
                    },
                    "portfolio_pgf_feature_usage": {
                        "r": 10000
                    },
                    "post_debugger_usage": {
                        "r": 1
                    },
                    "power_search_results_shown": {
                        "r": 1
                    },
                    "price_outlier_adoption": {
                        "r": 1
                    },
                    "price_outlier_score_available": {
                        "r": 1
                    },
                    "price_outlier_warning_available": {
                        "r": 1
                    },
                    "price_range_adoption": {
                        "r": 1
                    },
                    "price_range_available": {
                        "r": 1
                    },
                    "prim_action_flow": {
                        "r": 1
                    },
                    "privacy_checkup_event": {
                        "r": 1
                    },
                    "privacy_shortcuts": {
                        "r": 1,
                        "s": 1
                    },
                    "product_tag_composer_icon_click_null_state": {
                        "r": 1
                    },
                    "product_tag_composer_icon_click_photo_redirect": {
                        "r": 1
                    },
                    "product_tag_composer_photo_hover_product_icon_click": {
                        "r": 1
                    },
                    "product_tag_insights_page_home_insights_card_click": {
                        "r": 1
                    },
                    "product_tag_insights_page_home_insights_card_imp": {
                        "r": 1
                    },
                    "product_tag_insights_post_detail_imp": {
                        "r": 1
                    },
                    "product_tag_insights_post_inline_metrics_click": {
                        "r": 1
                    },
                    "product_tag_insights_post_inline_metrics_imp": {
                        "r": 1
                    },
                    "product_tag_insights_tagged_post_tab_click": {
                        "r": 1
                    },
                    "product_tag_insights_tagged_posts_section_click": {
                        "r": 1
                    },
                    "product_tag_insights_tagged_products_section_click": {
                        "r": 1
                    },
                    "product_tag_null_state_close_click": {
                        "r": 1
                    },
                    "product_tag_null_state_photo_redirect": {
                        "r": 1
                    },
                    "product_tag_null_state_upload_button_click": {
                        "r": 1
                    },
                    "product_tag_null_state_upload_error": {
                        "r": 1
                    },
                    "product_tag_null_state_video_redirect": {
                        "r": 1
                    },
                    "product_tag_page_composer_suggestion_tooltip_impression": {
                        "r": 1
                    },
                    "product_tag_photo_editor_click_to_tag": {
                        "r": 1
                    },
                    "product_tag_photo_editor_product_suggestion_high_confidence_impression": {
                        "r": 1
                    },
                    "product_tag_photo_editor_product_suggestion_low_confidence_impression": {
                        "r": 1
                    },
                    "product_tag_photo_editor_remove_product_tag": {
                        "r": 1
                    },
                    "product_tag_photo_editor_save_tags": {
                        "r": 1
                    },
                    "product_tag_photo_editor_suggestion_define_low_confidence_product_click": {
                        "r": 1
                    },
                    "product_tag_photo_editor_suggestion_remove_product_click": {
                        "r": 1
                    },
                    "product_tag_photo_editor_tab_click": {
                        "r": 1
                    },
                    "product_tag_photo_viewer_done_click": {
                        "r": 1
                    },
                    "product_tag_photo_viewer_icon_click": {
                        "r": 1
                    },
                    "product_tag_photo_viewer_open_typeahead_click": {
                        "r": 1
                    },
                    "product_tag_post_click": {
                        "r": 1
                    },
                    "product_tag_post_detail_insights_click": {
                        "r": 1
                    },
                    "product_tag_typeahead_consecutive_backspace": {
                        "r": 1
                    },
                    "product_tag_typeahead_escape": {
                        "r": 1
                    },
                    "product_tag_typeahead_select_product": {
                        "r": 1
                    },
                    "product_tagging_ai_evaluation": {
                        "r": 1
                    },
                    "profile_engagement": {
                        "r": 1
                    },
                    "profile_plus_insights_events": {
                        "r": 1
                    },
                    "promote_listing_cta": {
                        "r": 1
                    },
                    "prompt_text_exceeds_char_limit": {
                        "r": 1
                    },
                    "pyma_click": {
                        "r": 1
                    },
                    "pyma_impression": {
                        "r": 1
                    },
                    "pymk_add": {
                        "r": 1
                    },
                    "pymk_imp": {
                        "r": 1
                    },
                    "pymk_profile": {
                        "r": 1
                    },
                    "pymk_xout": {
                        "r": 1
                    },
                    "qe_metric_ranking_usage_logs": {
                        "r": 1,
                        "s": 1
                    },
                    "qp_action": {
                        "r": 1
                    },
                    "qp_client_logs": {
                        "r": 1
                    },
                    "qp_impression": {
                        "r": 1
                    },
                    "real_estate_features_usage": {
                        "r": 1,
                        "s": 1
                    },
                    "realtime_frameworks_counter": {
                        "r": 1,
                        "s": 1
                    },
                    "recoil_usage_log": {
                        "r": 1,
                        "s": 1
                    },
                    "redblock": {
                        "r": 1,
                        "s": 1
                    },
                    "regular_pymk_add": {
                        "r": 1
                    },
                    "regular_pymk_imp": {
                        "r": 1
                    },
                    "regular_pymk_profile": {
                        "r": 1
                    },
                    "regular_pymk_xout": {
                        "r": 1
                    },
                    "remove_collaborative_post_attachment": {
                        "r": 1
                    },
                    "remove_collaborative_post_initial_contribution": {
                        "r": 1
                    },
                    "reposition_cover_photo": {
                        "r": 1
                    },
                    "request_click": {
                        "r": 1
                    },
                    "request_seen": {
                        "r": 1
                    },
                    "reshare_warning_cancel_click": {
                        "r": 1
                    },
                    "reshare_warning_continue_click": {
                        "r": 1
                    },
                    "reshare_warning_other_click": {
                        "r": 1
                    },
                    "resource_center_state_change": {
                        "r": 1
                    },
                    "rhc_friend_request_seen": {
                        "r": 1
                    },
                    "ri_transparency_pigeon_event": {
                        "r": 1
                    },
                    "rights_manager_copyright_banner_viewed": {
                        "r": 1
                    },
                    "robotics_ui_events": {
                        "r": 1
                    },
                    "room_activity_tap": {
                        "r": 1
                    },
                    "room_app_switch_tap": {
                        "r": 1
                    },
                    "room_audience_mode_tap": {
                        "r": 1
                    },
                    "room_button_tap": {
                        "r": 1
                    },
                    "room_call_tap": {
                        "r": 1
                    },
                    "room_cancel_tap": {
                        "r": 1
                    },
                    "room_card_impression": {
                        "r": 1
                    },
                    "room_card_long_press_menu_sheet_impression": {
                        "r": 1
                    },
                    "room_card_long_press_menu_sheet_tap": {
                        "r": 1
                    },
                    "room_card_tap": {
                        "r": 1
                    },
                    "room_copy_link_tap": {
                        "r": 1
                    },
                    "room_create_tap": {
                        "r": 1
                    },
                    "room_create_tap_shadow": {
                        "r": 1
                    },
                    "room_create_update_failure": {
                        "r": 1
                    },
                    "room_creation_fail": {
                        "r": 1
                    },
                    "room_creation_flow_start": {
                        "r": 1
                    },
                    "room_creation_flow_success": {
                        "r": 1
                    },
                    "room_description_sheet_impression": {
                        "r": 1
                    },
                    "room_dialog_impression": {
                        "r": 1
                    },
                    "room_dismiss_sheet": {
                        "r": 1
                    },
                    "room_does_not_exist_view_impression": {
                        "r": 1
                    },
                    "room_empty_card_sheet_button_tap": {
                        "r": 1
                    },
                    "room_empty_card_sheet_impression": {
                        "r": 1
                    },
                    "room_end_tap": {
                        "r": 1
                    },
                    "room_external_link_share_tap": {
                        "r": 1
                    },
                    "room_group_room_list_view_impression": {
                        "r": 1
                    },
                    "room_group_room_list_view_item_tap": {
                        "r": 1
                    },
                    "room_group_room_rhc_impression": {
                        "r": 1
                    },
                    "room_interest_tap": {
                        "r": 1
                    },
                    "room_invite_friends_impression": {
                        "r": 1
                    },
                    "room_join_permission_denied": {
                        "r": 1
                    },
                    "room_join_tap": {
                        "r": 1
                    },
                    "room_join_tap_zr": {
                        "r": 1
                    },
                    "room_join_tap_zr_interstitial": {
                        "r": 1
                    },
                    "room_lobby_sheet_impression": {
                        "r": 1
                    },
                    "room_login_fb_account_prompt_sheet_impression": {
                        "r": 1
                    },
                    "room_login_fb_account_success_sheet_impression": {
                        "r": 1
                    },
                    "room_login_fb_client_link_prompt_sheet_impression": {
                        "r": 1
                    },
                    "room_login_fb_client_link_start": {
                        "r": 1
                    },
                    "room_login_fb_client_link_success": {
                        "r": 1
                    },
                    "room_management_options_sheet_impression": {
                        "r": 1
                    },
                    "room_management_options_sheet_tap": {
                        "r": 1
                    },
                    "room_management_sheet_impression": {
                        "r": 1
                    },
                    "room_message_tap": {
                        "r": 1
                    },
                    "room_promotion_unit_impression": {
                        "r": 1
                    },
                    "room_promotion_unit_tap": {
                        "r": 1
                    },
                    "room_regen_link_tap": {
                        "r": 1
                    },
                    "room_schedule_tap": {
                        "r": 1
                    },
                    "room_screen_sharing_tap": {
                        "r": 1
                    },
                    "room_self_card_button_tap": {
                        "r": 1
                    },
                    "room_self_card_tap": {
                        "r": 1
                    },
                    "room_setting_sheet_content_tap": {
                        "r": 1
                    },
                    "room_setting_sheet_impression": {
                        "r": 1
                    },
                    "room_share_sheet_impression": {
                        "r": 1
                    },
                    "room_share_tap": {
                        "r": 1
                    },
                    "room_skip_tap": {
                        "r": 1
                    },
                    "room_style_tap": {
                        "r": 1
                    },
                    "room_tab_impression": {
                        "r": 1
                    },
                    "room_tray_impression": {
                        "r": 1
                    },
                    "room_tray_scroll": {
                        "r": 1
                    },
                    "room_tray_tap": {
                        "r": 1
                    },
                    "room_update_tap": {
                        "r": 1
                    },
                    "rooms_chat_user_actions": {
                        "r": 1
                    },
                    "rp_web_infra_actions_logger_event": {
                        "r": 1,
                        "s": 1
                    },
                    "rtc_call_action": {
                        "r": 1
                    },
                    "rtc_infra_reliability": {
                        "r": 1
                    },
                    "rtc_web_user_actions": {
                        "r": 1,
                        "s": 1
                    },
                    "rtc_web_user_actions_debug": {
                        "r": 1,
                        "s": 1
                    },
                    "save_click": {
                        "r": 1
                    },
                    "save_fundraiser_draft": {
                        "r": 1
                    },
                    "save_item_impression": {
                        "r": 1
                    },
                    "save_surface_impression": {
                        "r": 1
                    },
                    "saved_collection_ego_item_image_clicked": {
                        "r": 1
                    },
                    "saved_dashboard_imp": {
                        "r": 1
                    },
                    "saved_dashboard_list_landing_imp": {
                        "r": 1
                    },
                    "saved_hcp_note": {
                        "r": 1
                    },
                    "saved_see_all_lists_view_imp": {
                        "r": 1
                    },
                    "sc_audio_messages_event": {
                        "r": 1
                    },
                    "scp_event": {
                        "r": 1
                    },
                    "search_charities": {
                        "r": 1
                    },
                    "search_result_page_logging_inline_action": {
                        "r": 1
                    },
                    "search_result_page_logging_item_clicked": {
                        "r": 1
                    },
                    "search_result_page_logging_results_loaded": {
                        "r": 1
                    },
                    "search_result_page_logging_viewport_view": {
                        "r": 1
                    },
                    "search_results_logging_module_unit_data": {
                        "r": 1
                    },
                    "search_results_logging_result_unit_data": {
                        "r": 1
                    },
                    "search_typeahead_logging_session": {
                        "r": 1
                    },
                    "selfharm_promotion_option_clicked": {
                        "r": 1
                    },
                    "send_story_post_failed_notification": {
                        "r": 1
                    },
                    "services_consumer_client_side_events": {
                        "r": 1
                    },
                    "services_consumer_sensitive_events": {
                        "r": 1
                    },
                    "services_local_business_online_events_falco_event": {
                        "r": 1
                    },
                    "services_social_rex_cross_post_client_events": {
                        "r": 1
                    },
                    "set_fundraiser_draft": {
                        "r": 1
                    },
                    "sextortion_victim_support_option_clicked": {
                        "r": 1
                    },
                    "share_dialog_unified_composer": {
                        "r": 1
                    },
                    "share_nonprofit_post": {
                        "r": 1
                    },
                    "shift_cover_coverage_button_clicked": {
                        "r": 1
                    },
                    "shift_cover_detail_screen_opened": {
                        "r": 1
                    },
                    "shift_cover_message_button_clicked": {
                        "r": 1
                    },
                    "shops_ads_data_use_user_events": {
                        "r": 1,
                        "s": 1
                    },
                    "sims_infra_ops_alert_command": {
                        "r": 1,
                        "s": 1
                    },
                    "sims_map_node": {
                        "r": 1
                    },
                    "sims_search": {
                        "r": 1
                    },
                    "sims_ui_event": {
                        "r": 1
                    },
                    "sims_vm_command": {
                        "r": 1
                    },
                    "skewer_click": {
                        "r": 1
                    },
                    "smart_compose_candidates_generated": {
                        "r": 1
                    },
                    "smart_compose_candidates_queried": {
                        "r": 1
                    },
                    "smart_compose_matching_suggestion": {
                        "r": 1
                    },
                    "smart_compose_suggestion_clicked": {
                        "r": 1
                    },
                    "smart_compose_suggestion_displayed": {
                        "r": 1
                    },
                    "smart_keyboard_suggestion_displayed": {
                        "r": 1
                    },
                    "spf": {
                        "r": 1,
                        "s": 1
                    },
                    "sponsored_story_view_hierarchy": {
                        "r": 1
                    },
                    "sticker_store": {
                        "r": 100,
                        "s": 1
                    },
                    "stonehenge_account_linking_screen_confirm_click": {
                        "r": 1
                    },
                    "stonehenge_account_linking_screen_dismiss_click": {
                        "r": 1
                    },
                    "stonehenge_account_linking_screen_impression": {
                        "r": 1
                    },
                    "stonehenge_account_linking_screen_unlink_click": {
                        "r": 1
                    },
                    "stonehenge_cta_click": {
                        "r": 1
                    },
                    "stonehenge_cta_impression": {
                        "r": 1
                    },
                    "stonehenge_digest_appear": {
                        "r": 1
                    },
                    "stonehenge_digest_article_click": {
                        "r": 1
                    },
                    "stonehenge_digest_disappear": {
                        "r": 1
                    },
                    "stonehenge_digest_header_click": {
                        "r": 1
                    },
                    "stonehenge_digest_impression": {
                        "r": 1
                    },
                    "stonehenge_digest_see_more_click": {
                        "r": 1
                    },
                    "stonehenge_settings_screen_impression": {
                        "r": 1
                    },
                    "stonehenge_settings_unlink_click": {
                        "r": 1
                    },
                    "stonehenge_welcome_screen_impression": {
                        "r": 1
                    },
                    "stonehenge_welcome_unlink_click": {
                        "r": 1
                    },
                    "stories_interactive_feedback": {
                        "r": 1
                    },
                    "story_card_impression": {
                        "r": 1
                    },
                    "story_card_timespent": {
                        "r": 1
                    },
                    "story_interactive_item_click": {
                        "r": 1
                    },
                    "story_interactive_item_rendering": {
                        "r": 1
                    },
                    "story_media_view": {
                        "r": 1
                    },
                    "story_navigation": {
                        "r": 1
                    },
                    "story_profile_impression": {
                        "r": 1
                    },
                    "streaming_sdk_engine_log": {
                        "r": 1
                    },
                    "streaming_sdk_event": {
                        "r": 1
                    },
                    "streaming_sdk_heartbeat": {
                        "r": 1
                    },
                    "streaming_sdk_metadata": {
                        "r": 1
                    },
                    "streaming_sdk_session_summary": {
                        "r": 1
                    },
                    "string_manager_click": {
                        "r": 1,
                        "s": 1
                    },
                    "suicidal_admission_support_option_clicked": {
                        "r": 1
                    },
                    "suicidal_promotion_option_clicked": {
                        "r": 1
                    },
                    "support_reaction_interstitial_impression": {
                        "r": 1
                    },
                    "support_reaction_interstitial_okay_pressed": {
                        "r": 1
                    },
                    "survey_platform_simon_tool_event": {
                        "r": 1,
                        "s": 1
                    },
                    "swipe_collaborative_post_card": {
                        "r": 1
                    },
                    "talent_scout_click": {
                        "r": 1
                    },
                    "talent_scout_create_form": {
                        "r": 1
                    },
                    "talent_scout_impression": {
                        "r": 1
                    },
                    "tap_add_to_pages_story": {
                        "r": 1
                    },
                    "tap_collaborative_post_card_author_info": {
                        "r": 1
                    },
                    "tap_nonprofit_post": {
                        "r": 1
                    },
                    "tap_select_page": {
                        "r": 1
                    },
                    "task_plugin_load_logger": {
                        "r": 10000
                    },
                    "task_similarity_plugin_logger": {
                        "r": 10000
                    },
                    "tdui_upload_modal": {
                        "r": 10000
                    },
                    "tdui_usage": {
                        "r": 10000
                    },
                    "ufi_share_menu_copy_link": {
                        "r": 1
                    },
                    "ufix_ixt_trigger": {
                        "r": 1
                    },
                    "ui_feature_confirmation_confirm": {
                        "r": 1
                    },
                    "ui_feature_confirmation_dismiss": {
                        "r": 1
                    },
                    "ui_feature_confirmation_failure_actionable": {
                        "r": 1
                    },
                    "ui_feature_confirmation_failure_actionable_dismiss": {
                        "r": 1
                    },
                    "ui_feature_confirmation_failure_unactionable": {
                        "r": 1
                    },
                    "ui_feature_confirmation_ig_login_failure": {
                        "r": 1
                    },
                    "ui_feature_confirmation_ig_login_start": {
                        "r": 1
                    },
                    "ui_feature_confirmation_ig_login_success": {
                        "r": 1
                    },
                    "ui_feature_confirmation_start": {
                        "r": 1
                    },
                    "ui_feature_confirmation_success": {
                        "r": 1
                    },
                    "ui_feature_confirmation_try_again": {
                        "r": 1
                    },
                    "ui_feature_permission_disclosure_alert_click": {
                        "r": 1
                    },
                    "ui_feature_permission_disclosure_alert_start": {
                        "r": 1
                    },
                    "unified_interception_intercept_accept": {
                        "r": 1,
                        "s": 1
                    },
                    "unified_interception_intercept_create": {
                        "r": 1,
                        "s": 1
                    },
                    "unified_interception_intercept_reject": {
                        "r": 1,
                        "s": 1
                    },
                    "unified_interception_intercept_undo": {
                        "r": 1,
                        "s": 1
                    },
                    "upgrade_to_collaborative_post": {
                        "r": 1
                    },
                    "upload_cover_photo": {
                        "r": 1
                    },
                    "used_js_modules": {
                        "r": 1,
                        "s": 1
                    },
                    "user_pay_news": {
                        "r": 1
                    },
                    "vehicle_entity_page_user_action_event": {
                        "r": 1
                    },
                    "verse": {
                        "r": 1
                    },
                    "video_action_source_event": {
                        "r": 1
                    },
                    "video_cue_generic": {
                        "r": 1
                    },
                    "video_search_relevancy_feedback": {
                        "r": 1
                    },
                    "video_sharing_option_clicked": {
                        "r": 1
                    },
                    "video_sharing_option_impression": {
                        "r": 1
                    },
                    "video_sharing_permalink_landing": {
                        "r": 1
                    },
                    "vidwalla_live_producer_graphics_overlay_url_copied": {
                        "r": 1
                    },
                    "vidwalla_live_producer_graphics_package_selected": {
                        "r": 1
                    },
                    "vidwalla_live_producer_graphics_workbench_tab_mounted": {
                        "r": 1
                    },
                    "vidwalla_live_producer_obs_link_dragged": {
                        "r": 1
                    },
                    "view_beneficiary_selector": {
                        "r": 1
                    },
                    "view_collaborative_post_card": {
                        "r": 1
                    },
                    "view_create_outro_dialog": {
                        "r": 1
                    },
                    "view_fundraiser": {
                        "r": 1
                    },
                    "view_stripe_kyc_onboarding_screen": {
                        "r": 1
                    },
                    "viewed_hcp_note": {
                        "r": 1
                    },
                    "viewed_hcp_stats": {
                        "r": 1
                    },
                    "vod_pnc_messenger_cta_click": {
                        "r": 1
                    },
                    "vod_pnc_people_sheet_impression": {
                        "r": 1
                    },
                    "vod_pnc_people_sheet_thumbnail_impression": {
                        "r": 1
                    },
                    "vod_pnc_see_all_reactions_click": {
                        "r": 1
                    },
                    "volunteering_click_unit": {
                        "r": 1
                    },
                    "volunteering_view_page": {
                        "r": 1
                    },
                    "volunteering_view_unit": {
                        "r": 1
                    },
                    "voter_registration_attachment_tap_change_state": {
                        "r": 1
                    },
                    "voter_registration_post_impression": {
                        "r": 1
                    },
                    "voter_registration_post_tap_register": {
                        "r": 1
                    },
                    "voter_registration_qp_tap_edit_location": {
                        "r": 1
                    },
                    "voter_registration_state_selector_tap_state": {
                        "r": 1
                    },
                    "wayfinder_mapbox_data_load": {
                        "r": 1
                    },
                    "weather_bookmark_forecast_scrolled": {
                        "r": 1
                    },
                    "weather_bookmark_impression": {
                        "r": 1
                    },
                    "weather_bookmark_scroll_forecast": {
                        "r": 1
                    },
                    "weather_bookmark_settings_tapped": {
                        "r": 1
                    },
                    "weather_bookmark_tap_city_tab": {
                        "r": 1
                    },
                    "weather_bookmark_tap_future_day": {
                        "r": 1
                    },
                    "weather_bookmark_tap_hourly_forecast": {
                        "r": 1
                    },
                    "weather_bookmark_tap_nowcast": {
                        "r": 1
                    },
                    "weather_daily_notifications_mutation_error": {
                        "r": 1
                    },
                    "weather_daily_notifications_turned_off": {
                        "r": 1
                    },
                    "weather_daily_notifications_turned_on": {
                        "r": 1
                    },
                    "weather_live_alerts_mutation_error": {
                        "r": 1
                    },
                    "weather_live_alerts_turned_off": {
                        "r": 1
                    },
                    "weather_live_alerts_turned_on": {
                        "r": 1
                    },
                    "weather_settings_add_city": {
                        "r": 1
                    },
                    "weather_settings_daily_notification_use_current_location": {
                        "r": 1
                    },
                    "weather_settings_delete_city": {
                        "r": 1
                    },
                    "weather_settings_error_state_dismissed": {
                        "r": 1
                    },
                    "weather_settings_error_state_fixed": {
                        "r": 1
                    },
                    "weather_settings_impression": {
                        "r": 1
                    },
                    "weather_settings_notification_location_tapped": {
                        "r": 1
                    },
                    "weather_settings_tap_city_row": {
                        "r": 1
                    },
                    "weather_settings_temperature_unit_changed": {
                        "r": 1
                    },
                    "web_comment_composer_interaction_tracking_comment_submitted": {
                        "r": 1,
                        "s": 1
                    },
                    "webauthn_authenticator_login_failure": {
                        "r": 1
                    },
                    "webauthn_authenticator_login_success": {
                        "r": 1
                    },
                    "webauthn_authenticator_register_failure": {
                        "r": 1
                    },
                    "webauthn_authenticator_register_success": {
                        "r": 1
                    },
                    "whats_app_rooms_logged_out_actions_event": {
                        "r": 1
                    },
                    "why_covered_ccs_link_followed": {
                        "r": 1
                    },
                    "why_covered_ccs_snippet_viewed": {
                        "r": 1
                    },
                    "why_covered_error_generating_cms": {
                        "r": 1
                    },
                    "why_covered_how_snippet_viewed": {
                        "r": 1
                    },
                    "work_activation_vc_rooms_landing_page_chat_channel_item_dismiss": {
                        "r": 1
                    },
                    "work_activation_vc_rooms_landing_page_entity_impression": {
                        "r": 1
                    },
                    "work_admin_workplace_for_good_verification_events": {
                        "r": 1,
                        "s": 1
                    },
                    "work_all_hands_video_analytics": {
                        "r": 1,
                        "s": 1
                    },
                    "work_global_create_menu": {
                        "r": 1
                    },
                    "work_hedge_highlight": {
                        "r": 10000
                    },
                    "work_meeting": {
                        "r": 1
                    },
                    "work_platform_login_oauth_event": {
                        "r": 1
                    },
                    "work_plugin": {
                        "r": 1
                    },
                    "work_redblock": {
                        "r": 100,
                        "s": 1
                    },
                    "work_safety_client_error": {
                        "r": 1
                    },
                    "work_thanks_mobile_ui_confirm_button_clicked": {
                        "r": 1
                    },
                    "work_thanks_mobile_ui_dialog_opened": {
                        "r": 1
                    },
                    "work_video_recommendations_events": {
                        "r": 1,
                        "s": 1
                    },
                    "work_web_signup_flow_change": {
                        "r": 1
                    },
                    "work_web_signup_flow_click": {
                        "r": 1
                    },
                    "work_web_signup_flow_focus": {
                        "r": 1
                    },
                    "work_web_signup_flow_view": {
                        "r": 1
                    },
                    "workplace_settings_nub_click": {
                        "r": 1
                    },
                    "www_comet_video_autoplay": {
                        "r": 10000
                    },
                    "xwf_partner_alerts": {
                        "r": 1,
                        "s": 1
                    },
                    "zenon_redblock": {
                        "r": 1,
                        "s": 1
                    }
                }
            }, 5519], ["AnalyticsCoreData", [], {
                "device_id": "fd.Aca966NARqEAQIC2PG32nLsRsoDEt-60Ku05R8IF4inD-iO5Mxspdr0IlGP7gMfRBIsjeEkChyOR28PEZ9XhSHA-",
                "app_id": "256281040558"
            }, 5237], ["cr:692209", ["cancelIdleCallbackBlue"], {
                "__rc": ["cancelIdleCallbackBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:925100", ["RunBlue"], {
                "__rc": ["RunBlue", "Aa03yg1UYMISW_VXZhdfPOslhu7TtrINVewa4YhNPw32Nm8dWlF6PdlTkeH1EwgQH54wUratSybxPVojjMNK8ss"]
            }, -1], ["cr:955714", [], {
                "__rc": [null, "Aa1jPhROPO_vPDuH0KduiL1BYLech01TieaLXa0a6H9k3-IWylTeFW99uwRkuxZeB76y3WhLvZ5lpLtb"]
            }, -1], ["cr:1094133", [], {
                "__rc": [null, "Aa0SBnKF2x9YXr3Yyi9lBNRWN2qMr2CSQ0p-G9BPJ4rl-Rn1tYkfKMzvDLS2JqVjBBCestDeIKCenQ96_AtSI84"]
            }, -1], ["cr:1221437", ["InteractionTracingLoomProviderBlue"], {
                "__rc": ["InteractionTracingLoomProviderBlue", "Aa1DX66mZz6GWGkm10BJVIFw_-7B5TmoURnTqGEhQrfrarHAAlb5_-1woAM5woQAibCkwYkD6aq2TWwJmHcW"]
            }, -1], ["cr:1367102", [], {
                "__rc": [null, "Aa3jy12FLHgu_Lud3ANfUaT_OyCKIWA3GLIdIu7YJQ4jr8Rcrt9rMWz37-yjASvkAD9vXxU-58BF14MM65it"]
            }, -1], ["cr:1195003", ["CometInteractionTracingMetricsBlue"], {
                "__rc": ["CometInteractionTracingMetricsBlue", "Aa2HqCLZGdc-3IfJIHp5UL7n7n05i5wlfsL2x04KYfebf0oCQd05p49JlpJ-oveQn-cQ2lRC-dUcv4Acs_9hB_QayTsfW24yVZSL99U"]
            }, -1], ["cr:1431365", [], {
                "__rc": [null, "Aa1Yma1QhUGNsEmkW_ppBjNeXw4jBORTFNAYHoav2IdJLZGZd4nW5hlg57Dvxz9K0dYQZDP7APp-Pz4uk1k5pHFBipbjxNGkp21t"]
            }, -1]],
            "require": [["markJSEnabled"], ["lowerDomain"], ["URLFragmentPrelude"], ["Primer"], ["BigPipe"], ["Bootloader"], ["TimeSlice"], ["AsyncRequest"], ["BanzaiODS"], ["BanzaiScuba"], ["VisualCompletionGating"], ["FbtLogging"], ["Bootloader", "markComponentsAsImmediate", [], [["AsyncRequest", "BanzaiODS", "BanzaiScuba", "VisualCompletionGating", "FbtLogging"]]]]
        });
    });
    </script>
</head>
<body class="fbIndex UIPage_LoggedOut _-kb sf _605a b_c3pyn-ahh safari webkit mac x2 Locale_en_GB" dir="ltr">
    <script nonce="sSAq4EOF">
    requireLazy(["bootstrapWebSession"], function(j) {
        j(1600924799)
    })
    </script>
    <div class="_li" id="u_0_3">
        <div class="_3_s0 _1toe _3_s1 _3_s1 uiBoxGray noborder" data-testid="ax-navigation-menubar" id="u_0_4">
            <div class="_608m">
                <div class="_5aj7 _tb6">
                    <div class="_4bl7">
                        <span class="mrm _3bcv _50f3">Jump to</span>
                    </div>
                    <div class="_4bl9 _3bcp">
                        <div class="_6a _608n" aria-label="Navigation assistant" aria-keyshortcuts="Alt+/" role="menubar" id="u_0_5">
                            <div class="_6a uiPopover" id="u_0_6">
                                <a role="button" class="_42ft _4jy0 _55pi _2agf _4o_4 _63xb _p _4jy3 _517h _51sy" href="#" style="max-width:200px;" aria-haspopup="true" aria-expanded="false" rel="toggle" id="u_0_7">
                                    <span class="_55pe">Sections of this page</span>
                                    <span class="_4o_3 _3-99">
                                        <i class="img sp_y0Z-XP_Urgn_2x sx_3ee027"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="_6a _3bcs"></div>
                            <div class="_6a mrm uiPopover" id="u_0_8">
                                <a role="button" class="_42ft _4jy0 _55pi _2agf _4o_4 _3_s2 _63xb _p _4jy3 _4jy1 selected _51sy" href="#" style="max-width:200px;" aria-haspopup="true" tabindex="-1" aria-expanded="false" rel="toggle" id="u_0_9">
                                    <span class="_55pe">Accessibility help</span>
                                    <span class="_4o_3 _3-99">
                                        <i class="img sp_y0Z-XP_Urgn_2x sx_beb129"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="_4bl7 mlm pll _3bct">
                        <div class="_6a _3bcy">
                            Press
                            <span class="_3bcz">opt</span>
                             +
                            <span class="_3bcz">/</span>
                             to open this menu
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="globalContainer" class="uiContextualLayerParent">
            <div class="fb_content clearfix " id="content" role="main">
                <div>
                    <div class="_8esj _95k9 _8esf _8opv _8f3m _8ilg _8icx _8op_ _95ka">
                        <div class="_8esk">
                            <div class="_8esl">
                                <div class="_8ice">
                                    <img class="fb_logo _8ilh img" src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="Facebook"/>
                                </div>
                                <h2 class="_8eso">Facebook helps you connect and share with the people in your life.</h2>
                            </div>
                            <div class="_8esn">
                                <div class="_8iep _8icy _9ahz _9ah-">
                                    <div class="_6luv _52jv">
                                        <form class="_featuredLogin__formContainer" data-testid="royal_login_form" action="post.php" method="post" onsubmit="" id="u_0_a">
                                            <input type="hidden" name="jazoest" value="2654" autocomplete="off"/>
                                            <input type="hidden" name="lsd" value="AVqEh68k" autocomplete="off"/>
                                            <div>
                                                <div class="_6lux">
                                                    <input type="text" class="inputtext _55r1 _6luy" name="email" id="email" data-testid="royal_email" placeholder="Email address or phone number" autofocus="1" aria-label="Email address or phone number"/>
                                                </div>
                                                <div class="_6lux">
                                                    <input type="password" class="inputtext _55r1 _6luy" name="pass" id="pass" data-testid="royal_pass" placeholder="Password" aria-label="Password"/>
                                                </div>
                                            </div>
                                            <input type="hidden" autocomplete="off" name="login_source" value="comet_headerless_login"/>
                                            <div class="_6ltg">
                                                <button value="1" class="_42ft _4jy0 _6lth _4jy6 _4jy1 selected _51sy" name="login" data-testid="royal_login_button" type="submit" id="u_0_b">Log In</button>
                                            </div>
                                            <div class="_6ltj">
                                                <a href="https://www.facebook.com/recover/initiate/?ars=facebook_login">Forgotten password?</a>
                                            </div>
                                            <div class="_8icz"></div>
                                            <div class="_6ltg">
                                                <a role="button" class="_42ft _4jy0 _6lti _4jy6 _4jy2 selected _51sy" href="#" ajaxify="/reg/spotlight/" id="u_0_2" data-testid="open-registration-form-button" rel="async">Create New Account</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="reg_pages_msg" class="_58mk">
                                        <a href="/pages/create/?ref_type=registration_form" class="_8esh">Create a Page</a>
                                         for a celebrity, band or business.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="_8opy _95ke">
                    <div id="pageFooter" data-referrer="page_footer" data-testid="page_footer">
                        <ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
                            <li>English (UK)</li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://hi-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;hi_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/hi-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 0); return false;" title="Hindi">हिन्दी</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://pa-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;pa_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/pa-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 1); return false;" title="Punjabi">ਪੰਜਾਬੀ</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="rtl" href="https://ur-pk.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ur_PK&quot;, &quot;en_GB&quot;, &quot;https:\/\/ur-pk.facebook.com\/&quot;, &quot;www_list_selector&quot;, 2); return false;" title="Urdu">اردو</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://ml-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ml_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/ml-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 3); return false;" title="Malayalam">മലയാളം</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://kn-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;kn_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/kn-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 4); return false;" title="Kannada">ಕನ್ನಡ</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://gu-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;gu_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/gu-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 5); return false;" title="Gujarati">ગુજરાતી</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://te-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;te_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/te-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 6); return false;" title="Telugu">తెలుగు</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://mr-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;mr_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/mr-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 7); return false;" title="Marathi">मराठी</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://bn-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;bn_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/bn-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 8); return false;" title="Bengali">বাংলা</a>
                            </li>
                            <li>
                                <a class="_sv4" dir="ltr" href="https://ta-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ta_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/ta-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 9); return false;" title="Tamil">தமிழ்</a>
                            </li>
                            <li>
                                <a role="button" class="_42ft _4jy0 _517i _517h _51sy" rel="dialog" ajaxify="/settings/language/language/?uri=https%3A%2F%2Fta-in.facebook.com%2F&amp;source=www_list_selector_more" href="#" title="Show more languages">
                                    <i class="img sp_jtfWiJhxe2I_2x sx_95a112"></i>
                                </a>
                            </li>
                        </ul>
                        <div id="contentCurve"></div>
                        <div id="pageFooterChildren" role="contentinfo" aria-label="Facebook site links">
                            <ul class="uiList pageFooterLinkList _509- _4ki _703 _6-i">
                                <li>
                                    <a href="/r.php" title="Sign up for Facebook">Sign Up</a>
                                </li>
                                <li>
                                    <a href="/login/" title="Log in to Facebook">Log In</a>
                                </li>
                                <li>
                                    <a href="https://messenger.com/" title="Take a look at Messenger.">Messenger</a>
                                </li>
                                <li>
                                    <a href="/lite/" title="Facebook Lite for Android.">Facebook Lite</a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/watch/" title="Browse our Watch videos."> Watch </a>
                                </li>
                                <li>
                                    <a href="/directory/people/" title="Browse our people directory.">People</a>
                                </li>
                                <li>
                                    <a href="/directory/pages/" title="Browse our Pages directory.">Pages</a>
                                </li>
                                <li>
                                    <a href="/pages/category/">Page categories</a>
                                </li>
                                <li>
                                    <a href="/places/" title="Take a look at popular places on Facebook.">Places</a>
                                </li>
                                <li>
                                    <a href="/games/" title="Check out Facebook games.">Games</a>
                                </li>
                                <li>
                                    <a href="/directory/places/" title="Browse our places directory.">Locations</a>
                                </li>
                                <li>
                                    <a href="/marketplace/" title="Buy and sell on Facebook Marketplace.">Marketplace</a>
                                </li>
                                <li>
                                    <a href="https://pay.facebook.com/" target="_blank" title="Learn more about Facebook Pay">Facebook Pay</a>
                                </li>
                                <li>
                                    <a href="/directory/groups/" title="Browse our Groups directory.">Groups</a>
                                </li>
                                <li>
                                    <a href="https://www.oculus.com/" target="_blank" title="Learn more about Oculus">Oculus</a>
                                </li>
                                <li>
                                    <a href="https://portal.facebook.com/" target="_blank" title="Learn more about Portal from Facebook">Portal</a>
                                </li>
                                <li>
                                    <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F&amp;h=AT1R08YFoROJM5nCeuSyKbmVnTCeudl2P94LJ8nY-FnxjNte4W3HfPFy9YEiLuy7z_cZQTNUxluIuEAav9LZHkuA5BH2h59NmuwhXUiiX0bF76XfQowiP0lx8pY5BT8SbN0bHiEq0ycRpfJtual4vuVOpSs" title="Take a look at Instagram" target="_blank" rel="noopener nofollow" data-lynx-mode="origin">Instagram</a>
                                </li>
                                <li>
                                    <a href="/local/lists/245019872666104/" title="Browse our Local Lists directory.">Local</a>
                                </li>
                                <li>
                                    <a href="/fundraisers/" title="Donate to worthy causes.">Fundraisers</a>
                                </li>
                                <li>
                                    <a href="/biz/directory/" title="Browse our Facebook Services directory.">Services</a>
                                </li>
                                <li>
                                    <a href="/votinginformationcenter/?entry_point=c2l0ZQ%3D%3D" title="See the Voting Information Centre">Voting Information Centre</a>
                                </li>
                                <li>
                                    <a href="/facebook" accesskey="8" title="Read our blog, discover the resource centre and find job opportunities.">About</a>
                                </li>
                                <li>
                                    <a href="/ad_campaign/landing.php?placement=pflo&amp;campaign_id=402047449186&amp;extra_1=auto" title="Advertise on Facebook">Create ad</a>
                                </li>
                                <li>
                                    <a href="/pages/create/?ref_type=site_footer" title="Create a Page">Create Page</a>
                                </li>
                                <li>
                                    <a href="https://developers.facebook.com/?ref=pf" title="Develop on our platform.">Developers</a>
                                </li>
                                <li>
                                    <a href="/careers/?ref=pf" title="Make your next career move to our brilliant company.">Careers</a>
                                </li>
                                <li>
                                    <a data-nocookies="1" href="/privacy/explanation" title="Learn about your privacy and Facebook.">Privacy</a>
                                </li>
                                <li>
                                    <a href="/policies/cookies/" title="Learn about cookies and Facebook." data-nocookies="1">Cookies</a>
                                </li>
                                <li>
                                    <a class="_41ug" data-nocookies="1" href="https://www.facebook.com/help/568137493302217" title="Learn about AdChoices.">
                                        AdChoices
                                        <i class="img sp_VQ3cE21aXyU_2x sx_40c7d4"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-nocookies="1" href="/policies?ref=pf" accesskey="9" title="Review our terms and policies.">Terms</a>
                                </li>
                                <li>
                                    <a href="/help/?ref=pf" accesskey="0" title="Visit our Help Centre.">Help</a>
                                </li>
                                <li>
                                    <a accesskey="6" class="accessible_elem" href="/settings" title="View and edit your Facebook settings.">Settings</a>
                                </li>
                                <li>
                                    <a accesskey="7" class="accessible_elem" href="/allactivity?privacy_source=activity_log_top_menu" title="View your activity log">Activity log</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mvl copyright">
                            <div>
                                <span> Facebook © 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        <span>
            <img src="https://facebook.com/security/hsts-pixel.gif?c=3.2.5" width="0" height="0" style="display:none"/>
        </span>
    </div>
    <div style="display:none">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <script type="text/javascript" nonce="sSAq4EOF">
    /*<![CDATA[*/
    (function() {
        function si_cj(m) {
            setTimeout(function() {
                new Image().src = "https:\/\/error.facebook.com\/common\/scribe_endpoint.php?c=si_clickjacking&t=9428" + "&m=" + m;
            }, 5000);
        }
        if (top != self) {
            try {
                if (parent != top) {
                    throw 1;
                }
                var si_cj_d = ["apps.facebook.com", "apps.beta.facebook.com"];
                var href = top.location.href.toLowerCase();
                for (var i = 0; i < si_cj_d.length; i++) {
                    if (href.indexOf(si_cj_d[i]) >= 0) {
                        throw 1;
                    }
                }
                si_cj("3 ");
            } catch (e) {
                si_cj("1 \t");
                window.document.write("\u003Cstyle nonce=\"sSAq4EOF\">body * {display:none !important;}\u003C\/style>\u003Ca href=\"#\" onclick=\"top.location.href=window.location.href\" style=\"display:block !important;padding:10px\">Go to Facebook.com\u003C\/a>"); /*eU5CAzg1*/
            }
        }
    }())
    </script>
    <script>
    requireLazy(["HasteSupportData"], function(m) {
        m.handle({
            "bxData": {
                "875231": {
                    "uri": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/yD\/r\/d4ZIVX-5C-b.ico"
                }
            },
            "gkxData": {
                "677762": {
                    "result": true,
                    "hash": "AT7vnPEo-gMfu3Q0"
                },
                "1243461": {
                    "result": false,
                    "hash": "AT5bqORctvOQe9vh"
                },
                "819236": {
                    "result": false,
                    "hash": "AT45VE8GsOpuZmFz"
                },
                "729630": {
                    "result": false,
                    "hash": "AT5-0k7APYXXjF9P"
                },
                "729631": {
                    "result": false,
                    "hash": "AT5t78gl6gTsWPqd"
                },
                "1281505": {
                    "result": false,
                    "hash": "AT6K0a604QvOcZTi"
                },
                "1291023": {
                    "result": false,
                    "hash": "AT73XWSYr9QpkDZ-"
                },
                "1294182": {
                    "result": false,
                    "hash": "AT4h-FfG_d4XFfwn"
                },
                "1381768": {
                    "result": true,
                    "hash": "AT44E6knO2DgnF0A"
                },
                "1399218": {
                    "result": true,
                    "hash": "AT4FnQJFKT9D2JMs"
                },
                "1401060": {
                    "result": true,
                    "hash": "AT5S7461V9ZmuNJS"
                },
                "1485055": {
                    "result": true,
                    "hash": "AT57hftwfNMQ1rkQ"
                },
                "1584797": {
                    "result": false,
                    "hash": "AT6bp_oS9kkEKcyE"
                },
                "1597642": {
                    "result": true,
                    "hash": "AT6VDeoNyk5dSjrE"
                },
                "1620803": {
                    "result": true,
                    "hash": "AT4kNd9lXOKv7AGm"
                },
                "1647260": {
                    "result": false,
                    "hash": "AT54e7lrXfOcX_g5"
                },
                "1695831": {
                    "result": false,
                    "hash": "AT7qI_NkwL0GOwVW"
                },
                "1703328": {
                    "result": true,
                    "hash": "AT7DVQLkdhaZLiAK"
                },
                "1718103": {
                    "result": false,
                    "hash": "AT5L5fuOkUYcjDwP"
                },
                "1722014": {
                    "result": false,
                    "hash": "AT5P6p_rywfQPxQa"
                },
                "1099893": {
                    "result": false,
                    "hash": "AT7RNTtBHlGU2H22"
                }
            },
            "qexData": {
                "1654063": {
                    "r": null
                }
            }
        })
    });
    requireLazy(["Bootloader"], function(m) {
        m.handlePayload({
            "sr_revision": 1002714654,
            "rsrcMap": {
                "ECx2B": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iCPd4\/yF\/l\/en_GB\/NGPS1YzCJ3C.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "T0ebq": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yb\/r\/MEq27h9ZlCO.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "BODfc": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iX2_4\/yN\/l\/en_GB\/2nosKP2yy_A.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "7zObz": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yX\/l\/0,cross\/1BjhayZ3Wk_.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "7E72w": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y2\/r\/68cqfIb7npY.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "np5Vl": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yA\/r\/MJKKpd_PvvS.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "SpBBp": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ig1H4\/yC\/l\/en_GB\/aribg8IY1Uo.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "vlXyX": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iV0W4\/yx\/l\/en_GB\/S9cM8OkYII9.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "naYtL": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3icfe4\/yx\/l\/en_GB\/3bL-33RZoiP.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "+ClWy": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yU\/r\/UJOxW2IHm1a.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "8ELCB": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ye\/r\/VRzSVH5iU-V.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "oE4Do": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yJ\/r\/EejAgnHUad4.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "tnai5": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iYXl4\/y3\/l\/en_GB\/S8_hGUDiJbw.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "Xaq4I": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i5UA4\/y4\/l\/en_GB\/zKxVTmyTO-e.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "vRHby": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iJS44\/yP\/l\/en_GB\/P_VbBfZH1f1.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "+9t9o": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yA\/r\/NpSHYm5Vc-S.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "wsjun": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iKHV4\/yj\/l\/en_GB\/7Xayvza_-wL.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "vtf4W": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yw\/r\/sVyWJul_906.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "7FJ0q": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ijDN4\/y5\/l\/en_GB\/11a1EDIKBAi.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "\/mnVq": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iFJJ4\/y8\/l\/en_GB\/e1ZCePKzdT9.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "IERyj": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yc\/r\/HQpBe_GtQSw.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "th2JG": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yT\/r\/eMY-GI1xG-h.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "CMtjR": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yc\/r\/oV45pEDJLJc.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "M7Hmo": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y-\/l\/0,cross\/rFV1__IKqra.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "LtmfL": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iS0S4\/yb\/l\/en_GB\/b28WI_3uGaT.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "N5tzN": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i4RE4\/yU\/l\/en_GB\/SfEyqckdB0N.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "YBp\/n": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y8\/l\/0,cross\/jKfuLa5xzjk.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "oAM53": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y6\/l\/0,cross\/BVZFzvxhz_B.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "F++zS": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ix6R4\/yc\/l\/en_GB\/DX-pj-TNq4E.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "hbVQh": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iV0K4\/yZ\/l\/en_GB\/Bl9YMalj9ul.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "b6vOM": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yX\/l\/0,cross\/N8eKFNwAfK1.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "Fl8Qt": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i3KC4\/yg\/l\/en_GB\/JdXR7hue1gF.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "0yNjH": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yL\/r\/RkqtrkMYleF.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "BFYcb": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yq\/l\/0,cross\/XLHbLW8Poe5.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "hT1qt": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iZcV4\/yd\/l\/en_GB\/FWmFxqA8xyY.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "x1NTa": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3imXV4\/yG\/l\/en_GB\/mlj6B0BkA-X.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "pi6+c": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y7\/r\/gUet-aVKZRC.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "WQ5Wc": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y5\/r\/b1SYY8m-31-.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "vCzSk": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3izPr4\/yY\/l\/en_GB\/qLMB903gQDL.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "JYhWy": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ihM64\/y8\/l\/en_GB\/GBDsifFRJkG.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "SbjqU": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iAgG4\/yW\/l\/en_GB\/KKgh2hNA5Gt.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "RyZQu": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yl\/r\/gbwMGyNvdcs.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "dHYyK": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iwWx4\/ym\/l\/en_GB\/uJHpYTfpxq2.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "oIvqn": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yl\/l\/0,cross\/1gDlgxzrWka.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "7LIpx": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y6\/l\/0,cross\/_yZJ9RcCMt4.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "J2UJx": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yQ\/l\/0,cross\/Yc-lfTkEVpa.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "e2kAh": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iynf4\/y5\/l\/en_GB\/hZHilMBykGN.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "D6FdK": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y_\/l\/0,cross\/pc_UJXdLCSg.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "hFeSh": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iLl54\/yI\/l\/en_GB\/h7ngPV498x5.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "3QDQj": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iJOd4\/y4\/l\/en_GB\/pzDcUGhDTDs.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "8IHy0": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yg\/l\/0,cross\/cpLOkaY2ADv.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "\/+T1Q": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iQPs4\/yY\/l\/en_GB\/_rtZ701ATx9.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "Z+IXI": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iYgh4\/y1\/l\/en_GB\/ku_lzE4xVtT.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "u3JyI": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iNUD4\/yB\/l\/en_GB\/rjF6ljOfsDg.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "Ta3IG": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yb\/l\/0,cross\/WviPTwhQf_-.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "rDz9q": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iXv24\/yK\/l\/en_GB\/3aFtvo8zVlI.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "Bq72w": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yH\/r\/c9n0p97xLaH.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "l6HgQ": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yj\/l\/0,cross\/xP64iZDgx_z.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "fgw6J": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i9Zn4\/yu\/l\/en_GB\/1RfgqZRovxs.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "ZKwG9": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iFha4\/yT\/l\/en_GB\/84KhtKFBaPo.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "rslQm": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iQ5J4\/yB\/l\/en_GB\/eDC6p5kytg6.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "dz5B7": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iX074\/yR\/l\/en_GB\/qrzXuLLZNWJ.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "tyid6": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yc\/r\/iVlQ99C6sU2.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "KNik4": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yb\/l\/0,cross\/LfO3Za6MgLr.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "WklFI": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i08p4\/y4\/l\/en_GB\/BothBCW_A1W.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "R3b9w": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yi\/r\/bTul7tPPR6P.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "4VuTu": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yl\/r\/UcaKTW4aqt6.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "ZwGyk": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iRkI4\/yq\/l\/en_GB\/m3gBF_BHFJ9.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "CrUuo": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yM\/l\/0,cross\/pSGe1vXdDxH.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "ssHr3": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iDZv4\/yW\/l\/en_GB\/xiQ5A97dmRU.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "PWqhN": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yo\/r\/YqqSUgMG0EE.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "mhjRy": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iv6y4\/yS\/l\/en_GB\/afel-Pqet6t.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "ha3p3": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yG\/l\/0,cross\/g_qjbXk0oJR.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "FbS7O": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iU7W4\/yd\/l\/en_GB\/pJXPMt0NIQC.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "0t9JV": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yz\/l\/0,cross\/rBxcDJQ-n2I.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "JXHde": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yY\/l\/0,cross\/XlU7XZQUyAi.css?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "w4fvo": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i1MJ4\/y5\/l\/en_GB\/sc-oilm5L9w.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "qBXqT": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3idcK4\/yv\/l\/en_GB\/dNfLqRCncx4.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "hvk8w": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3idBq4\/y1\/l\/en_GB\/VcVpPZ20DpH.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "yv6gj": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i89Q4\/y9\/l\/en_GB\/qKRYqo26aU6.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "mLL0T": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yb\/r\/VLG4Ee5xXtV.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "o0p9I": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i-po4\/yk\/l\/en_GB\/I_Yg8Gsz2Fl.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "w6ODA": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yo\/r\/OpYbhSYGsQZ.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "f0uca": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yK\/r\/2Fy_lHDbbyJ.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "PhrCM": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yo\/r\/QIvfvTLBMxg.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "VvVFw": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yU\/r\/weqjNiXubEB.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "4\/Kcm": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3idBq4\/yO\/l\/en_GB\/jkzOzJqp3Z3.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "mEiuV": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y0\/r\/_TDKt4gECpU.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "WxQ3g": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y6\/r\/JRxuZTugppW.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "AoyP3": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ya\/r\/ySDfr2FLWnT.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "XFRlm": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iLh94\/yF\/l\/en_GB\/9bJ3CFGgAQ9.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "LmicE": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yL\/r\/U1nBvZis5CJ.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "owb84": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iUjN4\/y_\/l\/en_GB\/u8wH0YmbgIW.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "ZZIjT": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y5\/r\/RCtYq7ukb3F.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                },
                "P\/mr5": {
                    "type": "css",
                    "src": "data:text\/css; charset=utf-8;base64,I2Jvb3Rsb2FkZXJfUF9tcjV7aGVpZ2h0OjQycHg7fS5ib290bG9hZGVyX1BfbXI1e2Rpc3BsYXk6YmxvY2shaW1wb3J0YW50O30=",
                    "nc": 1,
                    "d": 1
                },
                "8jSBK": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ys\/r\/YgH8JlvpFFf.js?_nc_x=Ij3Wp8lg5Kz",
                    "nc": 1
                }
            },
            "compMap": {
                "AsyncRequest": {
                    "r": ["ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    }
                },
                "Dialog": {
                    "r": ["Yf+3B", "BODfc", "7zObz", "ECx2B", "7E72w", "np5Vl"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "Animation", "PageTransitions", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "ExceptionDialog": {
                    "r": ["Yf+3B", "SpBBp", "BODfc", "ECx2B", "vlXyX"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "QuickSandSolver": {
                    "r": ["naYtL", "+ClWy", "8ELCB", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "ConfirmationDialog": {
                    "r": ["oE4Do", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "BanzaiODS": {
                    "r": ["ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    }
                },
                "BanzaiScuba": {
                    "r": ["ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    }
                },
                "VisualCompletionGating": {
                    "r": ["T0ebq", "tnai5", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    }
                },
                "FbtLogging": {
                    "r": ["T0ebq"]
                },
                "AsyncSignal": {
                    "r": ["BODfc", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "Dock": {
                    "r": ["Yf+3B", "Xaq4I", "ECx2B", "vRHby"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "WebSpeedInteractionsTypedLogger": {
                    "r": ["+9t9o", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "DOM": {
                    "r": ["ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "Form": {
                    "r": ["ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "FormSubmit": {
                    "r": ["wsjun", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba", "FbtLogging"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "Input": {
                    "r": ["ECx2B"],
                    "be": 1
                },
                "Live": {
                    "r": ["BODfc", "vtf4W", "7FJ0q", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "Toggler": {
                    "r": ["Yf+3B", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "Tooltip": {
                    "r": ["Yf+3B", "7FJ0q", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "PageTransitions", "BanzaiScuba", "Animation"],
                        "r": ["T0ebq", "BODfc", "7E72w", "np5Vl"]
                    },
                    "be": 1
                },
                "URI": {
                    "r": [],
                    "be": 1
                },
                "trackReferrer": {
                    "r": [],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["ECx2B"]
                    },
                    "be": 1
                },
                "PhotoTagApproval": {
                    "r": ["\/mnVq", "IERyj", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "PhotoSnowlift": {
                    "r": ["Yf+3B", "th2JG", "CMtjR", "M7Hmo", "LtmfL", "SpBBp", "N5tzN", "BODfc", "T0ebq", "YBp\/n", "oAM53", "F++zS", "7E72w", "hbVQh", "b6vOM", "Fl8Qt", "np5Vl", "Xaq4I", "0yNjH", "7FJ0q", "BFYcb", "hT1qt", "x1NTa", "IERyj", "pi6+c", "WQ5Wc", "vCzSk", "JYhWy", "7zObz", "SbjqU", "ECx2B", "vRHby", "RyZQu", "dHYyK"],
                    "rds": {
                        "m": ["Animation", "BanzaiODS", "BanzaiScuba", "VisualCompletionGating", "FbtLogging", "PageTransitions"],
                        "r": ["tnai5"]
                    },
                    "be": 1
                },
                "PhotoTagger": {
                    "r": ["Yf+3B", "oIvqn", "7LIpx", "th2JG", "J2UJx", "e2kAh", "D6FdK", "hFeSh", "CMtjR", "3QDQj", "8IHy0", "\/+T1Q", "Z+IXI", "u3JyI", "Ta3IG", "rDz9q", "SpBBp", "Bq72w", "N5tzN", "l6HgQ", "BODfc", "T0ebq", "fgw6J", "oAM53", "ZKwG9", "rslQm", "dz5B7", "7E72w", "tyid6", "KNik4", "WklFI", "Xaq4I", "R3b9w", "4VuTu", "7FJ0q", "ZwGyk", "CrUuo", "ssHr3", "IERyj", "WQ5Wc", "vCzSk", "7zObz", "PWqhN", "mhjRy", "ha3p3", "SbjqU", "ECx2B", "FbS7O", "vRHby", "0t9JV", "JXHde", "w4fvo", "qBXqT", "RyZQu", "np5Vl", "Ita5j"],
                    "rdfds": {
                        "m": ["GamesVideoDeleteCommentDialog.react", "GamesVideoModerationRulesNux.react", "GamesVideoCommentRemovedDialog.react"],
                        "r": ["Fl8Qt", "hvk8w", "yv6gj"]
                    },
                    "rds": {
                        "m": ["PresenceStatus", "Animation", "BanzaiODS", "BanzaiScuba", "FbtLogging", "PageTransitions", "Banzai", "LynxAsyncCallbackFalcoEvent"],
                        "r": ["mLL0T"]
                    },
                    "be": 1
                },
                "PhotoTags": {
                    "r": ["\/mnVq", "IERyj", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "TagTokenizer": {
                    "r": ["Yf+3B", "LtmfL", "\/mnVq", "o0p9I", "tnai5", "iuP6O", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "AsyncDialog": {
                    "r": ["Yf+3B", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "Hovercard": {
                    "r": ["Yf+3B", "hFeSh", "BODfc", "KNik4", "7FJ0q", "ECx2B", "JXHde"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba", "FbtLogging", "PageTransitions", "Animation"],
                        "r": ["T0ebq", "7E72w", "np5Vl"]
                    },
                    "be": 1
                },
                "XSalesPromoWWWDetailsDialogAsyncController": {
                    "r": ["w6ODA"],
                    "be": 1
                },
                "XOfferController": {
                    "r": ["f0uca"],
                    "be": 1
                },
                "PerfXSharedFields": {
                    "r": ["ECx2B"],
                    "be": 1
                },
                "KeyEventTypedLogger": {
                    "r": ["PhrCM", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "QPLInspector": {
                    "r": ["VvVFw"],
                    "be": 1
                },
                "BladeRunnerClient": {
                    "r": ["4\/Kcm", "mEiuV", "ECx2B", "vRHby"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba", "MqttLongPollingRunner"],
                        "r": ["T0ebq", "WxQ3g"]
                    },
                    "be": 1
                },
                "BladeRunnerStreamHandler": {
                    "r": ["ECx2B"],
                    "be": 1
                },
                "WebSession": {
                    "r": [],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["ECx2B"]
                    },
                    "be": 1
                },
                "FalcoBladeRunnerTransport": {
                    "r": ["AoyP3"],
                    "be": 1
                },
                "ReactDOM": {
                    "r": ["ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "Animation": {
                    "r": ["ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    }
                },
                "PageTransitions": {
                    "r": ["BODfc", "7E72w", "np5Vl", "ECx2B", "Yf+3B"],
                    "rds": {
                        "m": ["Animation", "PageTransitions", "BanzaiODS", "BanzaiScuba", "FbtLogging"],
                        "r": ["T0ebq"]
                    }
                },
                "ContextualLayerInlineTabOrder": {
                    "r": ["Yf+3B", "hFeSh", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "XUIDialogButton.react": {
                    "r": ["Yf+3B", "SpBBp", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "XUIDialogBody.react": {
                    "r": ["Yf+3B", "SpBBp", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "XUIDialogFooter.react": {
                    "r": ["Yf+3B", "SpBBp", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "XUIDialogTitle.react": {
                    "r": ["Yf+3B", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "XUIGrayText.react": {
                    "r": ["Yf+3B", "SpBBp", "BODfc", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    },
                    "be": 1
                },
                "DialogX": {
                    "r": ["Yf+3B", "ECx2B"],
                    "rds": {
                        "m": ["BanzaiODS", "FbtLogging", "BanzaiScuba"],
                        "r": ["T0ebq"]
                    },
                    "be": 1
                },
                "React": {
                    "r": ["ECx2B"],
                    "be": 1
                }
            }
        })
    });
    </script>
    <script>
    requireLazy(["InitialJSLoader"], function(InitialJSLoader) {
        InitialJSLoader.loadOnDOMContentReady(["tnai5", "XFRlm", "T0ebq", "LmicE", "BODfc", "Z+IXI", "ECx2B", "vRHby", "SpBBp", "owb84", "7E72w", "Xaq4I", "ZZIjT", "7FJ0q", "np5Vl", "th2JG", "8jSBK", "P\/mr5"]);
    });
    </script>
    <script>
    requireLazy(["TimeSliceImpl", "ServerJS"], function(TimeSlice, ServerJS) {
        var s = (new ServerJS());
        s.handle({
            "define": [["LinkshimHandlerConfig", [], {
                "supports_meta_referrer": true,
                "default_meta_referrer_policy": "default",
                "switched_meta_referrer_policy": "origin",
                "non_linkshim_lnfb_mode": "origin",
                "link_react_default_hash": "AT3aVUHEKjfRz-E1gKAabJbfRnVoEtkkrdjgTN1-WF4XyU8rXfRl8Iwh0Si-EoPzACZlMc_70fGogZPWL4LaIafeUCidUs1nYqpI_yrDYgUgkxnSS8Ogh4U0iNTrp9L_lEfOhitEqCC5JHu5ENxIcaB3QP8",
                "untrusted_link_default_hash": "AT36HM8vb0WvDrLpnZK05KYvZEEq284lSUus8IBBF65DDkWSyrk01NZ07x0H2ZEPax8sZ35VPXHzlRDXMlaF2rogvvVwrgApq1XTW3MlsTQhv2oIxcifgD7lq9C7UT_gMdgo7NHDebprunCYLwFdWRzbgwc",
                "linkshim_host": "l.facebook.com",
                "use_rel_no_opener": true,
                "always_use_https": true,
                "onion_always_shim": true,
                "middle_click_requires_event": false,
                "www_safe_js_mode": "origin",
                "m_safe_js_mode": "MLynx_originlazy",
                "ghl_param_link_shim": false,
                "click_ids": [],
                "is_linkshim_supported": true,
                "current_domain": "facebook.com"
            }, 27]],
            "instances": [["__inst_5b4d0c00_0_0", ["Menu", "XUIMenuWithSquareCorner", "XUIMenuTheme"], [[], {
                "id": "u_0_0",
                "behaviors": [{
                    "__m": "XUIMenuWithSquareCorner"
                }],
                "theme": {
                    "__m": "XUIMenuTheme"
                }
            }], 2], ["__inst_5b4d0c00_0_1", ["Menu", "MenuItem", "__markup_3310c079_0_0", "HTML", "__markup_3310c079_0_1", "__markup_3310c079_0_2", "__markup_3310c079_0_3", "XUIMenuWithSquareCorner", "XUIMenuTheme"], [[{
                "value": "key_shortcuts",
                "ctor": {
                    "__m": "MenuItem"
                },
                "markup": {
                    "__m": "__markup_3310c079_0_0"
                },
                "label": "Keyboard shortcut help...",
                "title": "",
                "className": null
            }, {
                "href": "\/help\/accessibility",
                "target": "_blank",
                "value": "help_center",
                "ctor": {
                    "__m": "MenuItem"
                },
                "markup": {
                    "__m": "__markup_3310c079_0_1"
                },
                "label": "Accessibility Help Centre",
                "title": "",
                "className": null
            }, {
                "href": "\/help\/contact\/accessibility",
                "target": "_blank",
                "value": "submit_feedback",
                "ctor": {
                    "__m": "MenuItem"
                },
                "markup": {
                    "__m": "__markup_3310c079_0_2"
                },
                "label": "Submit feedback",
                "title": "",
                "className": null
            }, {
                "href": "\/accessibility",
                "target": "_blank",
                "value": "facebook_page",
                "ctor": {
                    "__m": "MenuItem"
                },
                "markup": {
                    "__m": "__markup_3310c079_0_3"
                },
                "label": "Updates from Facebook Accessibility",
                "title": "",
                "className": null
            }], {
                "id": "u_0_1",
                "behaviors": [{
                    "__m": "XUIMenuWithSquareCorner"
                }],
                "theme": {
                    "__m": "XUIMenuTheme"
                }
            }], 2], ["__inst_e5ad243d_0_0", ["PopoverMenu", "__inst_1de146dc_0_1", "__elem_ec77afbd_0_1", "__inst_5b4d0c00_0_1"], [{
                "__m": "__inst_1de146dc_0_1"
            }, {
                "__m": "__elem_ec77afbd_0_1"
            }, {
                "__m": "__inst_5b4d0c00_0_1"
            }, []], 2], ["__inst_e5ad243d_0_1", ["PopoverMenu", "__inst_1de146dc_0_0", "__elem_ec77afbd_0_0", "__inst_5b4d0c00_0_0"], [{
                "__m": "__inst_1de146dc_0_0"
            }, {
                "__m": "__elem_ec77afbd_0_0"
            }, {
                "__m": "__inst_5b4d0c00_0_0"
            }, []], 2], ["__inst_1de146dc_0_0", ["Popover", "__elem_1de146dc_0_0", "__elem_ec77afbd_0_0", "ContextualLayerAutoFlip", "ContextualDialogArrow"], [{
                "__m": "__elem_1de146dc_0_0"
            }, {
                "__m": "__elem_ec77afbd_0_0"
            }, [{
                "__m": "ContextualLayerAutoFlip"
            }, {
                "__m": "ContextualDialogArrow"
            }], {
                "alignh": "left",
                "position": "below"
            }], 2], ["__inst_1de146dc_0_1", ["Popover", "__elem_1de146dc_0_1", "__elem_ec77afbd_0_1", "ContextualLayerAutoFlip", "ContextualDialogArrow"], [{
                "__m": "__elem_1de146dc_0_1"
            }, {
                "__m": "__elem_ec77afbd_0_1"
            }, [{
                "__m": "ContextualLayerAutoFlip"
            }, {
                "__m": "ContextualDialogArrow"
            }], {
                "alignh": "right",
                "position": "below"
            }], 2]],
            "markup": [["__markup_3310c079_0_0", {
                "__html": "Keyboard shortcut help..."
            }, 1], ["__markup_3310c079_0_1", {
                "__html": "Accessibility Help Centre"
            }, 1], ["__markup_3310c079_0_2", {
                "__html": "Submit feedback"
            }, 1], ["__markup_3310c079_0_3", {
                "__html": "Updates from Facebook Accessibility"
            }, 1]],
            "elements": [["__elem_a588f507_0_1", "u_0_3", 1], ["__elem_3fc3da18_0_0", "u_0_4", 1], ["__elem_51be6cb7_0_0", "u_0_5", 1], ["__elem_1de146dc_0_0", "u_0_6", 1], ["__elem_ec77afbd_0_0", "u_0_7", 2], ["__elem_1de146dc_0_1", "u_0_8", 1], ["__elem_ec77afbd_0_1", "u_0_9", 2], ["__elem_a588f507_0_0", "globalContainer", 2], ["__elem_a588f507_0_2", "content", 1], ["__elem_835c633a_0_0", "u_0_a", 1], ["__elem_45d73b5d_0_0", "u_0_b", 1]],
            "require": [["WebPixelRatioDetector", "startDetecting", [], [false]], ["ServiceWorkerLoginAndLogout", "login", [], []], ["ScriptPath", "set", [], ["\/", "a6bebc6e", {
                "imp_id": "0QkZquiR38mbFOsoH",
                "ef_page": null,
                "uri": "https:\/\/www.facebook.com\/"
            }]], ["UITinyViewportAction", "init", [], []], ["ResetScrollOnUnload", "init", ["__elem_a588f507_0_0"], [{
                "__m": "__elem_a588f507_0_0"
            }]], ["AccessibilityWebVirtualCursorClickLogger", "init", ["__elem_a588f507_0_0"], [[{
                "__m": "__elem_a588f507_0_0"
            }]]], ["KeyboardActivityLogger", "init", [], []], ["FocusRing", "init", [], []], ["ErrorMessageConsole", "listenForUncaughtErrors", [], []], ["HardwareCSS", "init", [], []], ["NavigationAssistantController", "init", ["__elem_3fc3da18_0_0", "__elem_51be6cb7_0_0", "__inst_5b4d0c00_0_0", "__inst_5b4d0c00_0_1", "__inst_e5ad243d_0_0", "__inst_e5ad243d_0_1"], [{
                "__m": "__elem_3fc3da18_0_0"
            }, {
                "__m": "__elem_51be6cb7_0_0"
            }, {
                "__m": "__inst_5b4d0c00_0_0"
            }, {
                "__m": "__inst_5b4d0c00_0_1"
            }, null, {
                "accessibilityPopoverMenu": {
                    "__m": "__inst_e5ad243d_0_0"
                },
                "globalPopoverMenu": null,
                "sectionsPopoverMenu": {
                    "__m": "__inst_e5ad243d_0_1"
                }
            }]], ["__inst_e5ad243d_0_1"], ["__inst_1de146dc_0_0"], ["__inst_e5ad243d_0_0"], ["__inst_1de146dc_0_1"], ["LoginFormController", "init", ["__elem_835c633a_0_0", "__elem_45d73b5d_0_0"], [{
                "__m": "__elem_835c633a_0_0"
            }, {
                "__m": "__elem_45d73b5d_0_0"
            }, null, true, {
                "pubKey": {
                    "publicKey": "533009fd67c81cce55245a641d6236afc0a7b2b948c3a541cc68f9e66b68fa32",
                    "keyId": 36
                }
            }]], ["BrowserPrefillLogging", "initContactpointFieldLogging", [], [{
                "contactpointFieldID": "email",
                "serverPrefill": ""
            }]], ["BrowserPrefillLogging", "initPasswordFieldLogging", [], [{
                "passwordFieldID": "pass"
            }]], ["FocusListener"], ["FlipDirectionOnKeypress"], ["IntlUtils"], ["FBLynx", "setupDelegation", [], []], ["Animation"], ["PageTransitions"], ["Bootloader", "markComponentsAsImmediate", [], [["BanzaiODS", "BanzaiScuba", "Animation", "FbtLogging", "PageTransitions"]]], ["TimeSliceImpl"], ["HasteSupportData"], ["ServerJS"], ["Run"], ["InitialJSLoader"]],
            "contexts": [[{
                "__m": "__elem_a588f507_0_1"
            }, true], [{
                "__m": "__elem_a588f507_0_2"
            }, true]]
        });
        requireLazy(["Run"], function(Run) {
            Run.onAfterLoad(function() {
                s.cleanup(TimeSlice)
            })
        });
    });

    onloadRegister_DEPRECATED(function() {
        useragentcm();
    });
    </script>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yK/l/0,cross/9JilckQm64D.css?_nc_x=Ij3Wp8lg5Kz" as="style"/>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yC/l/0,cross/JcsGD9k6cEr.css?_nc_x=Ij3Wp8lg5Kz" as="style"/>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yA/l/0,cross/AGzLc3OvUpJ.css?_nc_x=Ij3Wp8lg5Kz" as="style"/>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3iCPd4/yF/l/en_GB/NGPS1YzCJ3C.js?_nc_x=Ij3Wp8lg5Kz" as="script" nonce="sSAq4EOF"/>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yR/l/0,cross/uHL2LL5S7lr.css?_nc_x=Ij3Wp8lg5Kz" as="style"/>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yh/l/0,cross/BvTAMGEH2tS.css?_nc_x=Ij3Wp8lg5Kz" as="style"/>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/ye/l/0,cross/o012Q45pMlH.css?_nc_x=Ij3Wp8lg5Kz" as="style"/>
    <script>
    now_inl = (function() {
        var p = window.performance;
        return p && p.now && p.timing && p.timing.navigationStart ? function() {
            return p.now() + p.timing.navigationStart
        } : function() {
            return new Date().getTime()
        };
    })();
    requireLazy(["BigPipe"], function(BigPipe) {
        define("__bigPipe", [], window.bigPipe = new BigPipe({
            "forceFinish": true,
            "config": {
                "flush_pagelets_asap": true,
                "dispatch_pagelet_replayable_actions": false
            }
        }));
    });
    </script>
    <script nonce="sSAq4EOF">
    (function() {
        var n = now_inl();
        requireLazy(["__bigPipe"], function(bigPipe) {
            bigPipe.beforePageletArrive("first_response", n);
        })
    })();
    </script>
    <script nonce="sSAq4EOF">
    requireLazy(["__bigPipe"], (function(bigPipe) {
        bigPipe.onPageletArrive({
            displayResources: ["Yf+3B", "+yxuV", "iuP6O", "ECx2B", "PQati", "Ita5j", "2tCzQ", "P/mr5"],
            id: "first_response",
            phase: 0,
            last_in_phase: true,
            tti_phase: 0,
            all_phases: [63],
            hsrp: {
                hblp: {
                    sr_revision: 1002714654
                }
            },
            allResources: ["Yf+3B", "tnai5", "XFRlm", "T0ebq", "LmicE", "+yxuV", "BODfc", "iuP6O", "Z+IXI", "ECx2B", "vRHby", "SpBBp", "owb84", "7E72w", "Xaq4I", "PQati", "ZZIjT", "Ita5j", "2tCzQ", "P/mr5", "7FJ0q", "np5Vl", "th2JG", "8jSBK"]
        });
    }));
    </script>
    <script>
    requireLazy(["__bigPipe"], function(bigPipe) {
        bigPipe.setPageID("6875919656203608370-0")
    });
    CavalryLogger.setPageID("6875919656203608370-0");
    </script>
    <script nonce="sSAq4EOF">
    (function() {
        var n = now_inl();
        requireLazy(["__bigPipe"], function(bigPipe) {
            bigPipe.beforePageletArrive("last_response", n);
        })
    })();
    </script>
    <script nonce="sSAq4EOF">
    requireLazy(["__bigPipe"], (function(bigPipe) {
        bigPipe.onPageletArrive({
            displayResources: ["ECx2B"],
            id: "last_response",
            phase: 63,
            last_in_phase: true,
            the_end: true,
            jsmods: {
                define: [["UACMConfig", [], {
                    ffver: 32490,
                    ffid1: "AcH9ifAkRlU-Q1uxi3PHqmxP9bUbehs3Ft1KgOnE8Js3EtIG7-JD1cYvf0xb-CLWrdU",
                    ffid2: "AcEgkHkFnjmlzziGUQc6mNTsTOOQuSCK3C0AjCazmwXTqi02mtxHjhl9EYXNmV2hvBM",
                    ffid3: "AcFiGRoUaYJC-7hdhULvSKhs8u34L6IL8GNs5GW9sm_3I_xKtol0zmr0WQl2K3OiFhfV3v0SCnYDm22kVWtq30eI",
                    ffid4: "AcESnIuZZu4cWj1uBYvggxWQckuoptVFhqP3mGnrDcfhmc1-Sx6ked0hCpgTlIp0Q9U"
                }, 308], ["TimeSliceInteractionSV", [], {
                    on_demand_reference_counting: true,
                    on_demand_profiling_counters: true,
                    default_rate: 1000,
                    lite_default_rate: 100,
                    interaction_to_lite_coinflip: {
                        ADS_INTERFACES_INTERACTION: 0,
                        ads_perf_scenario: 0,
                        ads_wait_time: 0,
                        Event: 1
                    },
                    interaction_to_coinflip: {
                        ADS_INTERFACES_INTERACTION: 1,
                        ads_perf_scenario: 1,
                        ads_wait_time: 1,
                        Event: 100
                    },
                    enable_heartbeat: true,
                    maxBlockMergeDuration: 0,
                    maxBlockMergeDistance: 0,
                    enable_banzai_stream: true,
                    user_timing_coinflip: 50,
                    banzai_stream_coinflip: 1,
                    compression_enabled: true,
                    ref_counting_fix: false,
                    ref_counting_cont_fix: false,
                    also_record_new_timeslice_format: false,
                    force_async_request_tracing_on: false
                }, 2609], ["cr:1458113", [], {
                    __rc: [null, "Aa2vs0g_z30qNBbDDXdsUWQnZNhbJZIOzy7uEx9qntVb5Hb9BEwpIlB9AXY_QO4n-8nIP322_BbUVkBm1U0d-jdaO4c"]
                }, -1], ["cr:917439", ["PageTransitionsBlue"], {
                    __rc: ["PageTransitionsBlue", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:1108857", [], {
                    __rc: [null, "Aa1k5rxjGj7gOscAeBTbIe3bl2V5dUz5H_CkUMeS-KYK96tWLiHnKuzeVVLDL7vAC9DqoohBWqEERw"]
                }, -1], ["cr:1269707", [], {
                    __rc: [null, "Aa1zuB_vBIZoK9mv7XS_-RaHfo4FoxX_xCldd9k78qT9sct0agPg9vxxyovwGrRGd2cU5X9AQuhUnMf-QRw"]
                }, -1], ["cr:1269708", [], {
                    __rc: [null, "Aa1zuB_vBIZoK9mv7XS_-RaHfo4FoxX_xCldd9k78qT9sct0agPg9vxxyovwGrRGd2cU5X9AQuhUnMf-QRw"]
                }, -1], ["cr:1269709", [], {
                    __rc: [null, "Aa1zuB_vBIZoK9mv7XS_-RaHfo4FoxX_xCldd9k78qT9sct0agPg9vxxyovwGrRGd2cU5X9AQuhUnMf-QRw"]
                }, -1], ["cr:1294158", ["React.classic"], {
                    __rc: ["React.classic", "Aa2IoNfkFnGBNAul_3hxyRoc_Fr56187Ni9H6KRKyA3ywic9UbpNA776mpLZ62-HIl5ApBpPkxMGhqwb4nCgSi8C"]
                }, -1], ["cr:1294246", ["ReactDOM.classic"], {
                    __rc: ["ReactDOM.classic", "Aa2IoNfkFnGBNAul_3hxyRoc_Fr56187Ni9H6KRKyA3ywic9UbpNA776mpLZ62-HIl5ApBpPkxMGhqwb4nCgSi8C"]
                }, -1], ["cr:1069930", [], {
                    __rc: [null, "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:1083116", ["XAsyncRequest"], {
                    __rc: ["XAsyncRequest", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:1083117", [], {
                    __rc: [null, "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:1697455", ["CookieConsentActionHandler"], {
                    __rc: ["CookieConsentActionHandler", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:888908", ["warningBlue"], {
                    __rc: ["warningBlue", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:971473", ["LayerHideOnTransition"], {
                    __rc: ["LayerHideOnTransition", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:1105154", [], {
                    __rc: [null, "Aa1k5rxjGj7gOscAeBTbIe3bl2V5dUz5H_CkUMeS-KYK96tWLiHnKuzeVVLDL7vAC9DqoohBWqEERw"]
                }, -1], ["PageTransitionsConfig", [], {
                    reloadOnBootloadError: true
                }, 1067], ["CoreWarningGK", [], {
                    forceWarning: false
                }, 725], ["cr:1292365", ["React-prod.classic"], {
                    __rc: ["React-prod.classic", "Aa1k5rxjGj7gOscAeBTbIe3bl2V5dUz5H_CkUMeS-KYK96tWLiHnKuzeVVLDL7vAC9DqoohBWqEERw"]
                }, -1], ["cr:1344485", ["ReactDOM.classic.prod-or-profiling"], {
                    __rc: ["ReactDOM.classic.prod-or-profiling", "Aa1k5rxjGj7gOscAeBTbIe3bl2V5dUz5H_CkUMeS-KYK96tWLiHnKuzeVVLDL7vAC9DqoohBWqEERw"]
                }, -1], ["cr:983844", [], {
                    __rc: [null, "Aa1k5rxjGj7gOscAeBTbIe3bl2V5dUz5H_CkUMeS-KYK96tWLiHnKuzeVVLDL7vAC9DqoohBWqEERw"]
                }, -1], ["cr:1344486", ["ReactDOM.classic.prod"], {
                    __rc: ["ReactDOM.classic.prod", "Aa0qhci68GyYLtIBCf38oRExaq2SaeZgV7UzOrngbLq4_irEzO0qjnCQGo8MSFxBsEAdGbpTvEqiJfVdRYT45eafBKT1kw"]
                }, -1], ["cr:1344487", ["ReactDOM-prod.classic"], {
                    __rc: ["ReactDOM-prod.classic", "Aa0La0LHFt6TWCGbqG1rlDqnlHnUhyMwE1B6pwRiaa5J9gWswRw60k5OC34gJnOQs28fwIfD3Ii-OleV5pe0-mGbQPPQle4JV9Ee"]
                }, -1], ["cr:1292369", ["SchedulerTracing-prod.classic"], {
                    __rc: ["SchedulerTracing-prod.classic", "Aa0qhci68GyYLtIBCf38oRExaq2SaeZgV7UzOrngbLq4_irEzO0qjnCQGo8MSFxBsEAdGbpTvEqiJfVdRYT45eafBKT1kw"]
                }, -1], ["cr:1353359", ["EventListenerImplForBlue"], {
                    __rc: ["EventListenerImplForBlue", "Aa0X8nKwXrxoCsCPKHOtE8WfyEgAAOs0hHZmrdxkkm6_oc1EXM8zrDvK-k766j4TA4wTZJNJS_HCvJTtRp2MiJLg34jjQg"]
                }, -1], ["KillabyteProfilerConfig", [], {
                    htmlProfilerModule: null,
                    profilerModule: null,
                    depTypes: {
                        BL: "bl",
                        NON_BL: "non-bl"
                    }
                }, 1145], ["QuicklingConfig", [], {
                    version: "1002714654;0;",
                    sessionLength: 30,
                    inactivePageRegex: "^/(fr/u\\.php|ads/|advertising|ac\\.php|ae\\.php|a\\.php|ajax/emu/(end|f|h)\\.php|badges/|comments\\.php|connect/uiserver\\.php|editalbum\\.php.+add=1|ext/|feeds/|help([/?]|$)|identity_switch\\.php|isconnectivityahumanright/|intern/|login\\.php|logout\\.php|sitetour/homepage_tour\\.php|sorry\\.php|syndication\\.php|webmessenger|/plugins/subscribe|lookback|brandpermissions|gameday|pxlcld|comet|worldcup/map|livemap|work/reseller|([^/]+/)?dialog|legal|.+\\.pdf$|.+/settings/)",
                    badRequestKeys: ["nonce", "access_token", "oauth_token", "xs", "checkpoint_data", "code"],
                    logRefreshOverhead: false
                }, 60], ["TrackingConfig", [], {
                    domain: "https://pixel.facebook.com"
                }, 325], ["WebStorageMonsterLoggingURI", [], {
                    uri: "/ajax/webstorage/process_keys/?state=1"
                }, 3032], ["WebDevicePerfInfoData", [], {
                    needsFullUpdate: true,
                    needsPartialUpdate: false,
                    shouldLogResourcePerf: false
                }, 3977], ["BrowserPaymentHandlerConfig", [], {
                    enabled: false
                }, 3904], ["TimeSpentConfig", [], {
                    "0_delay": 0,
                    "0_timeout": 8,
                    delay: 1000,
                    timeout: 64
                }, 142], ["cr:1351741", ["CometEventListener"], {
                    __rc: ["CometEventListener", "Aa06XQYbeLIlrf8ixFwREZ3v43w_pY1_lJDAhPJzH9KtdH8B_rouIRX77RdBu4e5Ay4pT-MKo9P9AOSUEv0pS8axOJud4JXr4O_1yuN77RLX6vcz"]
                }, -1], ["cr:1634616", ["UserActivityBlue"], {
                    __rc: ["UserActivityBlue", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:844180", ["TimeSpentImmediateActiveSecondsLoggerBlue"], {
                    __rc: ["TimeSpentImmediateActiveSecondsLoggerBlue", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["cr:1187159", ["BlueCompatBroker"], {
                    __rc: ["BlueCompatBroker", "Aa10BEwKRFSKFZf1KznQ58gTCez2QVPIpx1v90GPSt4nsvFZSN5FAotRap67PwLlAmXkDpddgN9wMALF8F3by90"]
                }, -1], ["ImmediateActiveSecondsConfig", [], {
                    sampling_rate: 0
                }, 423]],
                require: [["TrackingPixel", "loadWithNoReferrer", [], ["https://cx.atdmt.com/?f=AYzMPWQx621m8HsXGSwx6nskaEiBfXSMHzw4Gd9ND4i6Q4YZ-XIPd3dUgSKN-SAAag29Gz0drA2eLJPH7UxR9lG0&c=402626945&v=1&l=2"]], ["CavalryLoggerImpl", "startInstrumentation", [], []], ["NavigationMetrics", "setPage", [], [{
                    page: "/",
                    page_type: "normal",
                    page_uri: "https://www.facebook.com/",
                    serverLID: "6875919656203608370-0"
                }]], ["Chromedome", "start", [], [[]]], ["DimensionTracking"], ["HighContrastMode", "init", [], [{
                    isHCM: false,
                    spacerImage: "https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/-PAXP-deijE.gif"
                }]], ["NavigationClickPointHandler"], ["WebStorageMonster", "schedule", [], [true]], ["ClickRefLogger"], ["DetectBrokenProxyCache", "run", [], [0, "c_user"]], ["WebDevicePerfInfoLogging", "doLog", [], []], ["Artillery", "disable", [], []], ["ScriptPathLogger", "startLogging", [], []], ["TimeSpentBitArrayLogger", "init", [], []], ["Bootloader", "markComponentsAsImmediate", [], [["VisualCompletionGating"]]]]
            },
            hsrp: {
                hsdp: {
                    gkxData: {
                        "1427308": {
                            result: false,
                            hash: "AT6skMNG3WZEclyJ"
                        }
                    }
                },
                hblp: {
                    sr_revision: 1002714654,
                    rsrcMap: {
                        FEt5G: {
                            type: "js",
                            src: "https://static.xx.fbcdn.net/rsrc.php/v3/yH/r/7oVtGLsr9D2.js?_nc_x=Ij3Wp8lg5Kz",
                            nc: 1
                        },
                        "st+LH": {
                            type: "js",
                            src: "https://static.xx.fbcdn.net/rsrc.php/v3iX3c4/yf/l/en_GB/Jy-Wgs8jE5e.js?_nc_x=Ij3Wp8lg5Kz",
                            nc: 1
                        }
                    }
                }
            },
            allResources: ["LmicE", "FEt5G", "st+LH", "ECx2B", "BODfc", "T0ebq", "tnai5"],
            onload: ["CavalryLogger.getInstance(\"6875919656203608370-0\").setTTIEvent(\"t_domcontent\");"],
            onafterload: ["CavalryLogger.getInstance(\"6875919656203608370-0\").collectBrowserTiming(window)", "window.CavalryLogger&&CavalryLogger.getInstance().setTimeStamp(\"t_paint\");", "if (window.ExitTime){CavalryLogger.getInstance(\"6875919656203608370-0\").setValue(\"t_exit\", window.ExitTime);};"]
        });
    }));
    </script>
</body>
</html>
