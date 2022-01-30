var divClickId = '';
(function () {
  window.requestAnimFrame = (function (callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function (callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 2;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function (e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function (e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function (e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile

  canvas.addEventListener("touchmove", function (e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function (e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      let extra = 0;
      if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // ctx.moveTo(lastPos.x, lastPos.y);
        // ctx.lineTo(mousePos.x, mousePos.y);

        ctx.moveTo(lastPos.y, 180 - lastPos.x + 50);
        ctx.lineTo(mousePos.y, 180 - mousePos.x + 50);
      } else {
        ctx.moveTo(lastPos.x, lastPos.y);
        ctx.lineTo(mousePos.x, mousePos.y);
      }
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();
  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sig-dataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  var clearBtn = document.getElementById("sig-clearBtn");



  if ($(window).width() < 768) {
    // var holder = document.querySelector('.canvas_holder');
    // var wd = holder.clientWidth;
    // var wh = holder.clientHeight;    
    // canvas.width = wd;
    // canvas.height = wh;

    // canvas.style.width = "100%";
    // canvas.style.height = "245px";
    if (/iPad/i.test(navigator.userAgent)) {
      var holder = document.querySelector('.canvas_holder');
      var wd = holder.clientWidth;
      var wh = holder.clientHeight;
      canvas.width = wd;
      canvas.height = wh;
    }
  } else {

    var holder = document.querySelector('.canvas_holder');
    var wd = holder.clientWidth;
    canvas.width = '620';
    canvas.height = '225';
  }
  
  // alert(wd);

  clearBtn.addEventListener("click", function (e) {
    var sigText = document.getElementById("sig_dataUrl" + divClickId);
    var sigImage = document.getElementById("sig-image" + divClickId);

    var abcdid = "abcd" + divClickId;
    // document.getElementById(abcdid).style.display = 'table-row';
    $("#" + abcdid).show();

    clearCanvas();
    $('.wholewhole').fadeOut();
    sigText.innerHTML = "";
    sigImage.setAttribute("src", "");
    $('#bodyoverflowwrapper').removeClass('overflowHidden');
    $('body').removeClass('overflowHidden');
    $('html ').removeClass('overflowHidden');
    // rotatebackScreen()
  }, false);
  submitBtn.addEventListener("click", function (e) {
    var sigText = document.getElementById("sig_dataUrl" + divClickId);
    var sigImage = document.getElementById("sig-image" + divClickId);
    $('.wholewhole').fadeOut();


    var abcdid = "abcd" + divClickId;
    // document.getElementById(abcdid).style.display = 'none';
    $("#" + abcdid).hide();
    sigImage.parentElement.style.border = "none";

    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    clearCanvas();
    sigImage.setAttribute("src", dataUrl);
    $('#bodyoverflowwrapper').removeClass('overflowHidden');
    $('body ').removeClass('overflowHidden');
    $('html ').removeClass('overflowHidden');

    // rotatebackScreen()

  }, false);

  function rotatebackScreen() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      if ($(window).width() < 769) {
        // true for mobile device
        document.exitFullscreen();
        var orientation = screen.orientation;
        setTimeout(() => {
          screen.orientation
            .lock("potrait-primary")
            .then(function () { })
            .catch(function (error) {
              // alert(error);
            });
        }, 100);
      }
    }

    $("#wholewhole").removeClass('rotatediv');

    $('body').removeClass('rotatebody');
  }

})();
