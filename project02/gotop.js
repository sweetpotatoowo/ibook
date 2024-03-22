(function($){
    $("body").append("<img id='goTopButton' style='display:none;z-index: 5; cursor: pointer;' title='回到頂端'/>");
    var img = "lolGoTop2.png",
        location = 0.7,
        right = 30,
        opacity = 0.5,
        speed = 800,
        //  transforms不同變化效果的數組
        transforms = [
          "perspective(100px) rotateX(45deg)",
          "scale(1.5, 0.8)",
          "matrix(1, 0.5, -0.5, 1, 0, 0)",
          "rotate3d(1, 1, 1, 180deg)",
          "skewX(30deg)",
          "scaleY(0.5)",
          "translateY(-50px)",
          "translateX(50px)",
          "scaleX(1.5)",
          "rotateY(-360deg)",
          "rotateZ(360deg)",
          "rotateX(-720deg)",
          "skew(180deg, 0deg)"
        ],
        $button = $("#goTopButton"),
        $body = $(document),
        $win = $(window),
        transformIndex = 0;
  
    $button.attr("src", img);
  
    window.goTopMove = function () {
      var scrollH = $body.scrollTop(),
          winH = $win.height(),
          css = {
            "top": winH * location + "px",
            "position": "fixed",
            "right": right,
            "opacity": opacity
          };
  
      if (scrollH > 20) {
        $button.css(css);
        $button.fadeIn("slow");
      } else {
        $button.fadeOut("slow");
        css = {
          "transform": "none",
          "transition": "none"
        };
        $button.css(css);
      }
    };
  
    $win.on({
      scroll: function () { goTopMove(); },
      resize: function () { goTopMove(); }
    });
  
    $button.on({
      mouseover: function () { $button.css("opacity", 1); },
      mouseout: function () { $button.css("opacity", opacity); },
      click: function () {
        var css = {
          "transform": transforms[transformIndex],
          "transition": "all 1s ease 0s"
        };
        $button.css(css);
        $("html,body").animate({ scrollTop: 0 }, speed);
  
        /* 切换到下一个特效
        transforms.length=transforms組數
        (transformIndex + 1) % transforms.length結果為0時回到組數開頭
        */
        transformIndex = (transformIndex + 1) % transforms.length;
      }
    });
  })(jQuery);