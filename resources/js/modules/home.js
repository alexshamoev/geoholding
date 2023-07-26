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

    var sentenceElement = $(".home__why_us_title");
    var sentenceTextSec = sentenceElement.text();
    var words = sentenceTextSec.split(" ");

    // Remove the last three words from the array
    var lastThreeWords = words.splice(-3);

    // Join the remaining words to form the updated sentence
    var updatedSentence = words.join(" ");

    // Add the last three words with a different color
    var coloredWords = lastThreeWords.join(" ");
    var coloredSpan =
        '<span class="home__title_different_part p-2 ms-sm-2 mt-sm-0 mt-3 py-1 rounded text-nowrap">' +
        coloredWords +
        "</span>";

    // Update the sentence content
    sentenceElement.html(updatedSentence + " " + coloredSpan);
});
