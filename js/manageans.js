const questions = document.getElementsByClassName("question");
for(let i=0;i<questions.length;i++){
    let ans = questions[i].dataset.answer;
    const options = questions[i].querySelectorAll(".list-group-item");
    for (let j=0;j<options.length;j++){
        options[j].setAttribute('value',ans);
        options[j].setAttribute("onclick", "optionSelected(this)")
    }
}
const correct = '<i class="ti-check" style="float: right;"></i>';
const incorrect = '<i class="ti-close" style="float: right;"></i>'
function optionSelected(ans){
    let cor_ans = ans.value;
    let user_ans = ans.dataset.option;
    let opParent = ans.parentElement;
    let opLength=opParent.children.length;
    if(cor_ans==user_ans){
        ans.classList.add("text-black-50");
        ans.classList.add("bg-success");
        ans.insertAdjacentHTML("beforeend", correct); 
    }else{
        ans.classList.add("text-black-50");
        ans.classList.add("bg-danger");
        ans.insertAdjacentHTML("beforeend", incorrect);
        for(let x=0;x<opLength;x++){
            if(opParent.children[x].dataset.option==cor_ans){
                opParent.children[x].classList.add("text-black-50");
                opParent.children[x].classList.add("bg-success");
                opParent.children[x].insertAdjacentHTML("beforeend", correct);
                
            }
        }
    }
    for(let x=0;x<opLength;x++){
        opParent.children[x].classList.add("optionDisable");
    }
}