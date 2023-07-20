$(function () {
    const sentenceText = $(".home__title").text();
    const wordsArray = sentenceText.split(/\s+/);
    const lastWord = wordsArray.pop();

    $(".home__title").html(
        wordsArray.join(" ") +
            ' <span class="home__title_different_part p-2 ms-2 py-1 rounded text-nowrap">' +
            lastWord +
            "</span>"
    );
});
