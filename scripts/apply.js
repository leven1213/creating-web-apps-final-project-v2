/**
 * Author: Levenspeil Sangalang 104328146
 * Target: apply.php
 * Purpose: This file is for Creating Web Applications Assign Part 3
 * Created: 20 Apr 2023
 * Last updated: 25 May 2023
 * Credits: Creating Web Applications course
 */ 

"use strict";

function getRefNum(){
    if (localStorage.jobrefnum != undefined){ 
        document.getElementById("jobrefnum").value = localStorage.jobrefnum;
    }
}

function submitForm(){
    var jobForm = document.getElementById("jobform");  
    jobForm.onsubmit = validateApp;
}

function storeData(){   // function that stores in sessionStorage
    sessionStorage.givenname = document.getElementById("givenname").value;
    sessionStorage.familyname = document.getElementById("familyname").value;
    sessionStorage.birthday = document.getElementById("dob").value;
     
    var storeGender = "";   // ##### For gender radio button : individually
    if(document.getElementById("male").checked)
        storeGender = "m";
    if(document.getElementById("female").checked)
        storeGender = "f";
    if(document.getElementById("nonbin").checked)
        storeGender = "nb";
    if(document.getElementById("other").checked)
        storeGender = "o";
    if(document.getElementById("none").checked)
        storeGender = "n";
    sessionStorage.setItem("gender", storeGender);

    sessionStorage.street = document.getElementById("street").value;
    sessionStorage.town = document.getElementById("town").value;
    sessionStorage.email = document.getElementById("email").value;
    sessionStorage.postcode = document.getElementById("postcode").value;
    sessionStorage.phonenum = document.getElementById("phonenum").value;

    var storeSkill = "";    // ##### For skills checkbox : string
    if(document.getElementById("html").checked)
        storeSkill += "html";
    if(document.getElementById("css").checked)
        storeSkill += "css";
    if(document.getElementById("js").checked)
        storeSkill += "js";
    if(document.getElementById("php").checked)
        storeSkill += "php";
    if(document.getElementById("mysql").checked)
        storeSkill += "mysql";
    if(document.getElementById("otherskills").checked)
        storeSkill += "otherskills";
    sessionStorage.setItem("skill", storeSkill);

    sessionStorage.commentskills = document.getElementById("commentskills").value; 
}

function setForm(){     // function that gathers data from form Ids
    // We use the first Id in form which is givenname
    if(sessionStorage.givenname != undefined){ 
        //document.getElementById("set_jobrefnum").textContent = sessionStorage.jobrefnum;
        document.getElementById("givenname").value = sessionStorage.givenname;
        document.getElementById("familyname").value = sessionStorage.familyname;
        document.getElementById("dob").value = sessionStorage.birthday;
        var storeGender = sessionStorage.getItem("gender");
        if(storeGender == "m")
            document.getElementById("male").checked = true;
        if(storeGender == "f")
            document.getElementById("female").checked = true;
        if(storeGender == "nb")
            document.getElementById("nonbin").checked = true;
        if(storeGender == "o")
            document.getElementById("other").checked = true;
        if(storeGender == "n")
            document.getElementById("none").checked = true;
        document.getElementById("street").value = sessionStorage.street;
        document.getElementById("town").value = sessionStorage.town;
        document.getElementById("email").value = sessionStorage.email;
        document.getElementById("postcode").value = sessionStorage.postcode;
        document.getElementById("phonenum").value = sessionStorage.phonenum;
        var storeSkill = sessionStorage.getItem("skill"); 
        document.getElementById("html").checked = (storeSkill.indexOf("html") != -1); 
        document.getElementById("css").checked = (storeSkill.indexOf("css") != -1);  
        document.getElementById("js").checked = (storeSkill.indexOf("js") != -1);  
        document.getElementById("php").checked = (storeSkill.indexOf("php") != -1); 
        document.getElementById("mysql").checked = (storeSkill.indexOf("mysql") != -1); 
        document.getElementById("otherskills").checked = (storeSkill.indexOf("otherskills") != -1); 
        document.getElementById("commentskills").value = sessionStorage.commentskills; 
    } 
}

// This is the function used to validate Job app form
function validateApp(){
    var result = true; 
    var postalInput = document.getElementById("postcode").value;
    var postalError = document.getElementById("postal-error"); 
    var skillsInput = document.getElementById("commentskills").value; 
    var skillsError = document.getElementById("skills-error");  

    // Validates state according to first digit user input
    if(document.getElementById("state").value == "vic" && !postalInput.match(/^[3|8]+/)){ 
        postalError.innerHTML = '<i class="ri-error-warning-line"></i> Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
    }

    if(document.getElementById("state").value == "nsw" && !postalInput.match(/^[1|2]+/)){ 
        postalError.innerHTML = '<i class="ri-error-warning-line"></i> Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
    }

    if(document.getElementById("state").value == "qld" && !postalInput.match(/^[4|9]+/)){ 
        postalError.innerHTML = '<i class="ri-error-warning-line"></i> Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
    }

    // Validates NT and ACT states where both first digit is set to 0
    if(document.getElementById("state").value == "nt" || document.getElementById("state").value == "act" ){ 
        if(!postalInput.match(/^[0]+/)){
        postalError.innerHTML = '<i class="ri-error-warning-line"></i>Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
        }
    }

    if(document.getElementById("state").value == "wa" && !postalInput.match(/^[6]+/)){ 
        postalError.innerHTML = '<i class="ri-error-warning-line"> </i> Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
    }

    if(document.getElementById("state").value == "sa" && !postalInput.match(/^[5]+/)){ 
        postalError.innerHTML = '<i class="ri-error-warning-line"> </i> Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
    }

    if(document.getElementById("state").value == "tas" && !postalInput.match(/^[7]+/)){ 
        postalError.innerHTML = '<i class="ri-error-warning-line"> </i> Please enter state code accordingly'; 
        document.getElementById("street").scrollIntoView();
        return false;
    } 

    // If 'Other skills' is ticked, this checks if there is user input in textArea        
    if (document.getElementById("otherskills").checked == true && skillsInput == ""){ 
        skillsError.innerHTML = '<i class="ri-error-warning-line"> </i> Please input other IT skills'; 
        return false;
    } 

    if (result){
        storeData();
    }
    
    else {
        return false;
    }

    return result;
}    

window.onload = init;

function init(){   
    submitForm(); 
    getRefNum();
    setForm(); 
}