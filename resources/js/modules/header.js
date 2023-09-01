$(function () {
    if ($(".alias_info").data("alias") == "ice-land-georgia") {
        $(".header__company_btn").eq(0).addClass("header__company_btn-active");
    }

    if ($(".alias_info").data("alias") == "bd-company") {
        $(".header__company_btn").eq(1).addClass("header__company_btn-active");
    }

    if ($(".alias_info").data("alias") == "bd-plus") {
        $(".header__company_btn").eq(2).addClass("header__company_btn-active");
    }
});
