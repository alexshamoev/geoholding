$(function () {
    $("#select-option .selected-option").on("click", function () {
        $(this).next(".options-list").toggle();
    });

    $("#select-option .option").on("click", function () {
        var value = $(this).data("value");
        $("#select-option .selected-option").text($(this).text());
        $("#select-option .options-list").hide();

        // Do something with the selected value (e.g., submit form, update data, etc.)
        console.log("Selected Value:", value);
    });

    // Close the options list when clicking outside
    $(document).on("click", function (event) {
        if (!$(event.target).closest("#select-option").length) {
            $("#select-option .options-list").hide();
        }
    });
});
