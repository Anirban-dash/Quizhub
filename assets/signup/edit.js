let btn = document.getElementById("myBtn");
let firstele = document.getElementById("firstSkill");
let seconele = document.getElementById("secondSkill");
let thirdele = document.getElementById("thirdSkill");
let gen = document.getElementById("gen");
let fpreVal = 0;
let spreVal = 0;
let tpreVal = 0;
function firstSelect(val) {
    let secchild = seconele.getElementsByTagName("option");
    let thchide = thirdele.getElementsByTagName("option");
    for (let i = 0; i < secchild.length; i++) {
        if (secchild[i].value === val) {
            secchild[i].hidden = true;
        } else if (secchild[i].value === fpreVal) {
            secchild[i].hidden = false;
        }
        if (thchide[i].value === val) {
            thchide[i].hidden = true;
        } else if (thchide[i].value === fpreVal) {
            thchide[i].hidden = false;
        }
    }
    fpreVal = val;
}
function secondSelect(val) {
    let firchild = firstele.getElementsByTagName("option");
    let thchide = thirdele.getElementsByTagName("option");
    for (let i = 0; i < firchild.length; i++) {
        if (firchild[i].value === val) {
            firchild[i].hidden = true;
        } else if (firchild[i].value === spreVal) {
            firchild[i].hidden = false;
        }
        if (thchide[i].value === val) {
            thchide[i].hidden = true;
        } else if (thchide[i].value === spreVal) {
            thchide[i].hidden = false;
        }
    }
    spreVal = val;
}
function thirdSelect(val) {
    let firchild = firstele.getElementsByTagName("option");
    let secchild = seconele.getElementsByTagName("option");
    for (let i = 0; i < firchild.length; i++) {
        if (firchild[i].value === val) {
            firchild[i].hidden = true;
        } else if (firchild[i].value === tpreVal) {
            firchild[i].hidden = false;
        }
        if (secchild[i].value === val) {
            secchild[i].hidden = true;
        } else if (secchild[i].value === tpreVal) {
            secchild[i].hidden = false;
        }
    }
    tpreVal = val;
}
function genderClass(val) {
    let info = "fa-info-circle";
    let male = "fa-male";
    let female = "fa-female";
    let trans = "fa-transgender";
    if (val == "0") {
        gen.classList.add(info);
        gen.classList.remove(male);
        gen.classList.remove(female);
        gen.classList.remove(trans);
    } else if (val == "Male") {
        gen.classList.add(male);
        gen.classList.remove(info);
        gen.classList.remove(female);
        gen.classList.remove(trans);
    } else if (val == "Female") {
        gen.classList.add(female);
        gen.classList.remove(info);
        gen.classList.remove(male);
        gen.classList.remove(trans);
    } else {
        gen.classList.add(trans);
        gen.classList.remove(info);
        gen.classList.remove(male);
        gen.classList.remove(female);
    }

}