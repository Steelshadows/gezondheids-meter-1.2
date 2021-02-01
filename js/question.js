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
        inputs = document.querySelectorAll(".question")[questionIndex].querySelectorAll('input');
        
        console.log(inputs[0].name)
        console.log(inputs[0].type)
        questionIndex++;
        revealQuestion(questionIndex);
    }
    if(questionIndex + 1  == document.querySelectorAll(".question").length){
        document.querySelector(".submit").style.display = "inline";
        document.querySelector("button.plus").style.display = "none";
        document.querySelector("button.min").style.display = "none";
    }

}
function questionMin(){
    if(questionIndex != 0){
        questionIndex--;
        revealQuestion(questionIndex);
    }
}