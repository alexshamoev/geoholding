$(function () {
    if ($(".const_info").data("const") == "ice-land") {
        $(".header__company_btn").eq(0).addClass("header__company_btn-active");
    }

    if ($(".const_info").data("const") == "bd-comp") {
        $(".header__company_btn").eq(1).addClass("header__company_btn-active");
    }

    if ($(".const_info").data("const") == "bd-plus") {
        $(".header__company_btn").eq(2).addClass("header__company_btn-active");
    }
});
