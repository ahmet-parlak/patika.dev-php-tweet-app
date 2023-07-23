/* tweet-chars */
const tweetTextArea = document.querySelector("textarea[name='tweet']");
const tweetCharsDiv = document.querySelector("div[class='chars']");


tweetTextArea.addEventListener("input", function (event) {
    let currentLength = tweetTextArea.value.length;
    tweetCharsDiv.textContent = currentLength+"/180";

    if (currentLength == 0) {
        tweetCharsDiv.classList.add("hidden");
    }else{
        tweetCharsDiv.classList.remove("hidden");
    }
});