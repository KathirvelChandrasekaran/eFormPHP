/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var sentences = [
    "Welcome to DEPARTMENT OF COMPUTING",
    "Lets digitise the Student Record",
    "Login for more details"
];

var part = 0;
var part_index = 0;
var interval_instance;
var elm = document.querySelector("#change");

function write() {
    var text = sentences[part].substring(0, part_index + 1);
    elm.innerHTML = text;
    part_index++;
    
    if(text == sentences[part]) {
        clearInterval(interval_instance);
        setTimeout(function () {
            interval_instance = setInterval(Delete, 25);
        }, 1000);
    }
}

function Delete() {
    var text = sentences[part].substring(0, part_index - 1);
    elm.innerHTML = text;
    part_index--;
    
    if(text == '') {
        clearInterval(interval_instance);
        
        if(part == (sentence.length - 1))
            part = 0;
        else
            part++;
        part_index = 0;
        setTimeout(function () {
            interval_instance = setInterval(write, 85);
        }, 400);
    }
}

interval_instance = setInterval(write, 85);