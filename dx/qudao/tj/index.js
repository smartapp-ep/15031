
function Marquee(target, l_btn, r_btn, p_w, c_n, c_T) {
    this.target = target,
    this.l_btn = l_btn,
    this.r_btn = r_btn,
    this.p_w = p_w,
    this.c_n = c_n,
    this.movement = null,
    this.c_T = c_T,
    this.init = function() {
        this.animate();
    },
    this.animate = function(direction) {
        var that = this;
        var p_w = that.p_w;
        var c_n = that.c_n;
        var c_T = that.c_T;
        var target = that.target;
        var moveElems = $(that.target).children();
        var l_moveElems = moveElems.splice(0, c_n);
        var r_moveElems = moveElems.splice(moveElems.length - 1, c_n);
        $(that.l_btn).click(function() {
            $(target).prepend($(r_moveElems)).css({
                "left": "-" + (p_w * c_n) + "px"
            });
            $(target).animate({
                "left": "0px"
            },
            c_T,
            function() {
                moveElems = $(target).children();
                l_moveElems = moveElems.splice(0, c_n);
                r_moveElems = moveElems.splice(moveElems.length - 1, c_n);
            });
        });
        $(that.r_btn).click(function() {
            $(target).animate({
                "left": "-" + (p_w * c_n) + "px"
            },
            c_T,
            function() {
                $(target).append($(l_moveElems)).css({
                    "left": "0px"
                });
                moveElems = $(target).children();
                l_moveElems = moveElems.splice(0, c_n);
                r_moveElems = moveElems.splice(moveElems.length - 1, c_n);
            });
        });
    }
}


function complexMarquee(target, l_c, r_c, c_T, width) {
    this.target = target,
    this.l_c = l_c,
    this.r_c = r_c,
    this.movement = null,
    this.c_T = c_T,
    this.width = width,
    this.init = function() {
        var str = '<span class="dot">';
        for (var i = 0; i < $(this.target).find("li").length; i++) {
            if (i == 0) {
                str += '<span class="active"></span>';
            } else {
                str += '<span class="default"></span>';
            }
        }
        str += '</span>';
        $(this.target).parent().append(str);
        $(this.target).find("li").not($(this.target).find("li").eq(0)).css({
            "left": "-" + this.width + "px",
            "display": "block"
        });
        this.dotHoverBind($(this.target).parent().find(".dot span"));
        this.clickChange();
    },
    this.animate = function(prev, curr) {
        var block = $(this.target).find("li");
        var dot = $(this.target).parent().find(".dot");
        var len = block.length;
        var tmp_curr = (curr + len) % len;
        $(dot).find("span").removeClass("active").addClass("default");
        $(dot).find("span").eq(tmp_curr).removeClass("default").addClass("active");
        var sign = "";
        if (prev < curr) {
            sign = "-";
            $(block).eq(tmp_curr).css({
                "left": this.width + "px"
            });
        } else {
            sign = "+";
            $(block).eq(tmp_curr).css({
                "left": "-" + this.width + "px"
            });
        }
        $(block).eq(prev).animate({
            left: sign + this.width + "px"
        },
        c_T);
        $(block).eq(tmp_curr).animate({
            left: 0
        },
        c_T);
    },
    this.dotHoverBind = function(elems) {
        var that = this;
        $(elems).each(function() {
            var thatt = $(this);
            thatt.hoverDelay({
                hoverDuring: 100,
                hoverEvent: function() {
                    if ($(thatt).hasClass("active")) {
                        return;
                    } else {
                        var prev = $(".dot .active").prevAll().length;
                        var curr = $(thatt).prevAll().length;
                        that.animate(prev, curr)
                    }
                },
                outEvent: function() {}
            })
        })
    },
    this.clickChange = function() {
		
    }
}


function AnimateBanner(parent, bg_d_T, i_d_T, o_d_T, c_T) {
    this.parent = parent,
    this.bg_d_T = bg_d_T,
    this.i_d_T = i_d_T,
    this.o_d_T = o_d_T,
    this.c_T = c_T,
    this.movement = null,
    this.init = function() {
        this.ifIE6Init();
    },
    this.ifIE6Init = function() {
        $("#index .pr-info li .i-o").add("#index .bg li").css({
            "opacity": "1"
        });
    },
	
	
    this.hoverBanner = function() {
    }
	
}
ubo.index = {
    min_width: 320,
    min_height: 240,
    win_height: $(window).height() < this.min_height ? this.min_height: $(window).height(),
    win_width: $(window).width() < this.min_width ? this.min_width: $(window).width(),
    bannerAction: new AnimateBanner($("#index"), 500, 800, 800, 7000),
    init: function() {
        this.showCont();
        this.resize();
        this.posHeader();
        $(window).bind("scroll",
        function() {
            ubo.index.gotoTop();
            ubo.index.resize();
            ubo.index.posHeader();
        });
        this.bannerAction.init();
    },

	
    showCont: function() {
        $("#content").add("#footer").css({
            "display": "block"
        });
    },
    resize: function() {
        var that = ubo.index;
        var scroll_len = $(window).scrollTop();
        if ($(window).height() < (that.min_height + 100)) {
            $("#index .scroll").css({
                "display": "none"
            });
        } else {
            $("#index .scroll").css({
                "display": "block"
            });
        }
        that.win_height = $(window).height() < that.min_height ? that.min_height: $(window).height();
        that.win_width = $(window).width() < that.min_width ? that.min_width: $(window).width();
        $("#home").css({
            "width": that.win_width + "px"
        });
        $("#index").css({
            "height": that.win_height + "px"
        });
        $("#header").css({
            "width": that.win_width + "px"
        });
    },
    posHeader: function() {
        var scroll_len = $(window).scrollTop();
        var stop_len = $(window).scrollTop() - 80;
        var that = ubo.index;
        var s_T = 500;
        if (scroll_len >= (that.win_height - 80) && $(window).width() < that.min_width) {
            $("#header").addClass("down");
            $("#header").css({
                "position": "absolute",
                "top": scroll_len + "px"
            });
        } else if (scroll_len >= (that.win_height - 80) && $(window).width() >= that.min_width) {
            if ($("#header").hasClass("down")) {
                return;
            }
            $("#header").addClass("down");
            $("#header").css({
                "position": "fixed",
                "top": "-80px"
            }).animate({
                "top": "0"
            },
            s_T);
        } else {
            $("#header").removeClass("down");
            $("#header").css({
                "position": "absolute",
                "top": "0"
            });
        }
    },
		




};