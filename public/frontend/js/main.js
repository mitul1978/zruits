function checkMobileNumber(e) {
    var t = e.value;
    return /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[56789]\d{9}$/.test(t) ? -1 !== jQuery.inArray(t, ["1111111111", "2222222222", "3333333333", "4444444444", "5555555555", "6666666666", "7777777777", "8888888888", "9999999999"]) ? (alert("Invalid Mobile Number"), e.value = "", !1) : void 0 : (alert("Invalid Mobile Number"), console.log("Numbers do not start from 7- 9"), e.value = "", !1)
}
 $(document).ready(function() {
$("#state_id").val('4030');
    $("#state_id").change();

    var state = $("#state_id option:selected").text();

    $('body').on('change','#city_id', function() {
       var cityval = '';
       var city1 = '';
        var city = $("#city_id option:selected").text();
        var cityval = $("#city_id option:selected").val();
         var state = $("#state_id option:selected").text();


        if(cityval >= 0){
          var city1 = '&city='+city;
        }
        //window.location.href = baseURL+"/reach-us?state="+state+'&city='+city;
         //var new_URl=baseURL+'/reach-us?state='+state+city1;
        //window.history.pushState('page2', "", new_URl);
    });

var x=document.getElementById("demo");
function getLocation1() {

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);

  }
  else{
    x.innerHTML="Geolocation is not supported by this browser.";
  }
}
function showPosition(position)
{
 x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;

            //     var ajax_data = {
            //     Latitude : position.coords.latitude,
            //     Longitude : position.coords.longitude,
            // };
            var ajax_data = {
                Latitude : position.coords.latitude,
                Longitude : position.coords.longitude,
            };

            $.ajaxSetup({
                      headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });
            $.ajax({
                type: "POST",
                url: '/fetch-latlng',
                data: ajax_data,
                success: function(result) {
                    //console.log(result);return false;
                   var a = JSON.parse(result);
                   var state = parseInt(a[0].state_id);
                   var city = parseInt(a[0].city_id);

                    $.when($("select#state_id").val(state).change()).then(function() {
                        setTimeout(function(){
                         $("#city_id").val(city);
                         $("#city_id").change();
                        },4000);
                    });


                },
                error: function() {


                }
            });
}
getLocation1();


     $(".sldm-submenu > a").on("click", function(e) {
        e.preventDefault(), $(this).toggleClass("sldm-open"), $(this).parent().find(">ul").slideToggle(450)
    }), $(".sldm-widget-toggle").on("click", function(e) {
        e.preventDefault(), $($(this).data("target")).slideToggle(300)
    }), $(".toggle-features").click(function() {
        $(".product-assets-mobile ").slideToggle()
    }), $(".close-chara").click(function() {
        $(".toggle-features").click()
    }), $(".sel-option").click(function() {
        $("#right-sidebar-fix").addClass("display-right-sidebar")
    }), $(".close-right-sidebar").click(function() {
        $("#right-sidebar-fix").removeClass("display-right-sidebar")
    }), $("#archi-line").click(function() {
        $("#right-form-block").addClass("open")
    }), $(".close-form-block").click(function() {
        $("#right-form-block").removeClass("open")
    });
    let e = .01 * window.innerHeight;
    document.documentElement.style.setProperty("--vh", `${e}px`), window.addEventListener("resize", () => {
        let e = .01 * window.innerHeight;
        document.documentElement.style.setProperty("--vh", `${e}px`)
    });
    var t = function(e, t) {
        this.el = e || {}, this.multiple = t || !1, this.el.find(".link").on("click", {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown)
    };
    t.prototype.dropdown = function(e) {
        var t = e.data.el;
        $this = $(this), $next = $this.next(), $next.slideToggle(), $this.parent().toggleClass("open"), e.data.multiple || t.find(".submenu").not($next).slideUp().parent().removeClass("open")
    }, new t($("#accordion"), !1);
    for (var o = new ScrollMagic.Controller, i = document.getElementsByClassName("product-details__item"), n = 0; n < i.length; n++) new ScrollMagic.Scene({
        triggerElement: i[n],
        offset: 50,
        triggerHook: .9
    }).setClassToggle(i[n], "move").addTo(o);

    function s(e, t, o,ee) {
        for (var i = /(\&|\?)utm_[A-Za-z]+=[A-Za-z0-9_\-]+/gi, n = document.getElementsByTagName("a"), s = ["utm_medium=" + t, "utm_source=" + e, "utm_campaign=" + o,"gclid=" + ee], a = 0; a < n.length; a += 1) {
            var l, r = n[a].href;
            r.indexOf("royaletouche.com") > 0 && ((l = (r = r.replace(i, "")).split("#"))[0].indexOf("?") < 0 ? l[0] += "?" + s.join("&") : l[0] += "&" + s.join("&"), r = l.join("#")), n[a].href = r
        }
    }
    $(".grid").innerHeight() < 700 && $("footer").addClass("fixed-footer"), setTimeout(function() {
        ! function(e) {
            var t = window.location.toString().split("?");
            if (t.length > 1) {
                var o = t[1].split("&");
                for (m in o) {
                    var i = o[m].split("=");
                    if ("utm_source" == i[0] || "utm_medium" == i[0] || "utm_campaign" == i[0] || "gclid" == i[0]) {

                        if("gclid" == i[0]){
                          $.ajax({
                                    type: "POST",
                                    url: '/save_gclid_to_crm',
                                    data: {
                                        'gclid':decodeURIComponent(i[1])
                                    },
                                    success: function(result) {
                                        console.log(result);
                                        return false;
                                     },
                                    error: function() {

                                     console.log('error');
                                    }
                                });
                        }

                        sessionStorage.setItem(i[0], decodeURIComponent(i[1]));
                        var n = sessionStorage.getItem("utm_source"),
                            a = sessionStorage.getItem("utm_medium"),
                            l = sessionStorage.getItem("utm_campaign"),
                            ll = sessionStorage.getItem("gclid");
                        l && n && a && ll && s(n, a, l,ll)
                    }
                }
            }
            for (var r = document.querySelectorAll("input[type=hidden]"), m = 0; m < r.length; m++)
                if ("utm_source" == r[m].name || "utm_medium" == r[m].name || "utm_campaign" == r[m].name || "gclid" == r[m].name) {
                    var c = sessionStorage.getItem(r[m].name);
                    c && (document.getElementsByName(r[m].name)[0].value = c)
                }
        }()
    }, 3e3);
    var a = sessionStorage.getItem("utm_source"),
        l = sessionStorage.getItem("utm_medium"),
        r = sessionStorage.getItem("utm_campaign"),
        mm = sessionStorage.getItem("gclid");
    r && a && l && mm && s(a, l, r,mm), $(document).ajaxSuccess(function() {
        var e = sessionStorage.getItem("utm_source"),
            t = sessionStorage.getItem("utm_medium"),
            o = sessionStorage.getItem("utm_campaign"),
            tt = sessionStorage.getItem("gclid");
        o && e && t && tt && s(e, t, o,tt)
    }), setTimeout(function() {
    $("div.alert").remove()
}, 5e3), $("#search").prop("disabled", !0), $(".search-btn").click(function(e) {
    $("#term").val().length > 0 ? ($("#search").prop("disabled", !1), $("#searchform").submit()) : ($("#search").prop("disabled", !0), e.preventDefault())
}), $("#term").keypress(function(e) {
    if (13 == e.which) return $("#searchform").submit(), !1
}),  AOS.init();
var owl1 = $(".product-carousel");
owl1.owlCarousel({
    loop: !0,
    margin: 10,
    animateIn: "fadeIn",
    animateOut: "fadeOut",
    nav: !0,
    mouseDrag: !1,
    touchDrag: !1,
    smartSpeed: 3e4,
    autoplayHoverPause: !0,
    mouseDrag: !1,
    dotsData: !0,
    dots: !0,
    autoplay: !0,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
}), $(".product-carousel .owl-dot").click(function() {
    owl1.trigger("to.owl.carousel", [$(this).index()], 200)
}), $(".sidebar-right-filters-item").click(function() {
    $(".sidebar").addClass("open");
}), $(".sidebar-right-valid").click(function() {
    $(".sidebar").removeClass("open");
})
});
function getXMLHTTP() {
    var xmlhttp = false;
    try {
        xmlhttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e1) {
                xmlhttp = false;
            }
        }
    }
    return xmlhttp;
}


function getcity(strURL) {
    var req4 = getXMLHTTP();
    if (req4) {
        req4.onreadystatechange = function() {
            if (req4.readyState == 4) {
                if (req4.status == 200) {
                    document.getElementById('citydiv').innerHTML = req4.responseText;

                } else {
                    // alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
                }
            }
        }
        req4.open("GET", strURL, true);
        req4.send(null);
    }
}
