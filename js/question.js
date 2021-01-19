var questionIndex = 0;
function hideQuestions(){
    document.querySelectorAll(".question").forEach( item => {
        item.style.display = 'none';
    });
};
function revealQuestion(index){
    hideQuestions();
    document.querySelectorAll(".question")[index].style.display = "block"
}
function questionPlus(){
    if(questionIndex < document.querySelectorAll(".question").length - 1 ){
        questionIndex++;
        revealQuestion(questionIndex);
    }
    if(questionIndex < document.querySelectorAll(".question").length ){
        document.querySelector(".submit").style.display = "block";
    }

}
function questionMin(){
    if(questionIndex != 0){
        questionIndex--;
        revealQuestion(questionIndex);
    }
}