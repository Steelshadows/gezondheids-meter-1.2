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
    checkval = null;
    checkval2 = null;
    if(questionIndex < document.querySelectorAll(".question").length - 1 ){
        inputs = document.querySelectorAll(".question")[questionIndex].querySelectorAll('input');
        inputs.forEach((item)=>{
            if (item.checked){
                checkval = item.value;
            }
        });
        console.log(checkval);
        nextQ = document.querySelectorAll(".question")[questionIndex+1];
        if(nextQ.getAttribute("vervolg") != 0){
            checkQuestion = document.querySelector(".question[questionid='"+nextQ.getAttribute("vervolg")+"']");
            checkInputs = checkQuestion.querySelectorAll('input')
            checkInputs.forEach((item)=>{
                if (item.checked){
                    checkval2 = parseInt (item.value);
                }    
            });
        }           
        if(checkval != null){
            if(checkval2 != nextQ.getAttribute("trigger")){
                questionIndex++;
            }
            questionIndex++;
            revealQuestion(questionIndex);
        }
        else{
            alert('selecteer een keuze');
        }
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