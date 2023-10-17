let value = localStorage.getItem("screen");
let light_dark = localStorage.getItem("light_dark");
let loading = localStorage.getItem("loading");
let scrollTop = localStorage.getItem("scrollTop");
// let scrollProductDetail = localStorage.getItem("scrollProduct");

document.getElementById("sidebar-content").scrollTo(0, scrollTop);
// document.getElementById("list-product-detail").scrollTo(0, scrollProductDetail);
// Kiểm tra nếu có click xem toàn màn hình thì hiện toàn màn hình khi reload
if(value == "yes")
{
    document.getElementsByClassName('sidebar-main')[0].classList.add("sidebar-main-resized");
}
// Kiểm tra nếu có click xem toàn màn hình thì hiện toàn màn hình khi reload
if(light_dark == "yes")
{
    $("#sc_s_secondary").prop('checked', false);
    document.getElementsByClassName('sidebar-main')[0].classList.remove("sidebar-dark");
    document.getElementsByClassName('sidebar-main')[0].classList.add("sidebar-light");
}
if(loading == "yes")
{
    $("#sc_s_dark2").prop('checked', true);
}

// Khi click vào nút toàn màn hình
$("#btn-transmit").click(function() {
    let val = localStorage.getItem("screen");
    if(val == null || val == "no")
    {
        console.log(val);
        localStorage.setItem("screen", "yes");
    }
    else
    {
        console.log(val);
        localStorage.setItem("screen", "no");
    }
});

// Khi scroll thanh menu
function scrollMenu(a)
{
    localStorage.setItem("scrollTop", a.scrollTop);
}
// function scrollProduct(a)
// {
//     localStorage.setItem("scrollProduct", a.scrollTop);
// }

// Khi nhấn vào đổi màu menu
$("#sc_s_secondary").click(function() {
    let val = localStorage.getItem("light_dark");
    if(val == null || val == "no")
    {
        localStorage.setItem("light_dark", "yes");
        document.getElementsByClassName('sidebar-main')[0].classList.remove("sidebar-dark");
        document.getElementsByClassName('sidebar-main')[0].classList.add("sidebar-light");
    }
    else
    {
        localStorage.setItem("light_dark", "no");
        document.getElementsByClassName('sidebar-main')[0].classList.remove("sidebar-light");
        document.getElementsByClassName('sidebar-main')[0].classList.add("sidebar-dark");
    }
});

$("#sc_s_dark2").click(function() {
    let val = localStorage.getItem("loading");
    if(val == null || val == "no") localStorage.setItem("loading", "yes");
    else localStorage.setItem("loading", "no");
});
/* ------------------------------------------------------------------------------
 *
 *  # BlockUI extension
 *
 *  Demo JS code for extension_blockui.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

let BlockUi1 = function() {
    // BlockUI
    let _componentBlockUi = function() {
        if (!$().block) {
            console.warn('Warning - blockui.min.js is not loaded.');
            return;
        }
        // Overlay callback
        if(localStorage.getItem("loading")=="yes")
        {
            $('.nav-loading').on('click', function() {
                $.blockUI({ 
                    message: '<i class="icon-spinner4 spinner" style="font-size:30px"></i>',
                    timeout: 3000,
                    overlayCSS: {
                        backgroundColor: '#1b2024',
                        opacity: 0.8,
                        zIndex: 1200,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        color: '#fff',
                        padding: 0,
                        zIndex: 1201,
                        backgroundColor: 'transparent'
                    },
                    //onOverlayClick: $.unblockUI
                });
            });
        }

    };

    return {
        init: function() {
            _componentBlockUi();
        }
    }
}();

// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    BlockUi1.init();
});
