$(function () {
    $(".languages__dropdown").on("click", function () {
        $(".dropdown-menu").slideToggle();
        $(".languages__dropdown").html($(".languages__block--active").html());
    });
    $(".languages__dropdown").html($(".languages__block--active").html());
});
