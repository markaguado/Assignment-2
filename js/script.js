//
//
// Coded by Keite Gularte
//
//

// JavaScript code 
function searchFunction() {

    let input = document.getElementById('searchInput').value

    input = input.toLowerCase();

    let cards = document.getElementsByClassName('cards-container');

    for (i = 0; i < cards.length; i++) {

        if (!cards[i].innerHTML.toLowerCase().includes(input)) {

            cards[i].style.display = "none";
        }

        else {

            cards[i].style.display = "block";

        }

    }
}


// filter
filterSelection("all")
function filterSelection(c) {
    let x, i;
    x = document.getElementsByClassName("cards-container");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        removeClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
    }
}

function addClass(element, name) {
    let i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) { element.className += " " + arr2[i]; }
    }
}

function removeClass(element, name) {
    let i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
let btnContainer = document.getElementById("courseLevelContainer");
let btns = btnContainer.getElementsByClassName("btn");
for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        let current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}