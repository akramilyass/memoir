


var elements = document.querySelectorAll('[data-id]');

// Loop through each element
elements.forEach(function(element) {
    element.addEventListener('click', ()=>{
        var dateId = element.getAttribute('data-id');
        console.log(dateId);   

        document.cookie = 'id=' + dateId;

        window.location.href = 'notes.php';     
    })
   

});
var adddevbtn = document.querySelector('.adddev');

// Loop through each element
    adddevbtn.addEventListener('click', ()=>{
        var dateId = adddevbtn.getAttribute('data-id');

        document.cookie = 'id=' + dateId;

        window.location.href = 'adddev.php';     
    })
   



//____________________________________________________________________________________________________________
let mainDashLabel = document.querySelector('.main-dash-label');
let DashLabel = document.querySelector('.dash-label');
let dash = document.querySelector('.dash');
mainDashLabel.addEventListener('click', () => {
    nav.style.left="-100vw"
    dash.style.left="0vw"
    
});


let mainNavLabel = document.querySelector('.main-nav-label');
let NavLabel = document.querySelector('.nav-label');
let nav = document.querySelector('nav');
mainNavLabel.addEventListener('click', () => {

    nav.style.left="0vw"
    dash.style.left="-100vw"
    
});

let maingroup = document.querySelector('.maingroup');
let maingroupcontact = document.querySelector('.main');

let secondgroup = document.querySelector('.secondgroup');
let secondgroupcontact = document.querySelector('.second');


maingroup.addEventListener('click', () => {
    dash.style.left="-100vw"
    nav.style.left="-100vw"
    maingroupcontact.classList.remove('show'); 
    if (secondgroupcontact) {
        secondgroupcontact.classList.add('show');
    }
});




secondgroup.addEventListener('click', () => {
    dash.style.left="-100vw"
    nav.style.left="-100vw"
    if (secondgroupcontact) {
        secondgroupcontact.classList.remove('show');
    }
    maingroupcontact.classList.add('show');
});

//____________________________________________________________________













let  btnformaingroup= document.querySelector('.btnformaingroup');
let btnforsecondgroup = document.querySelector('.btnforsecondgroup');


maingroup.addEventListener('click', () => {
    btnformaingroup.classList.add('activee'); // Use parentheses to call the method
    btnforsecondgroup.classList.remove('activee');
});




btnforsecondgroup.addEventListener('click', () => {
    btnformaingroup.classList.remove('activee'); // Use parentheses to call the method
    btnforsecondgroup.classList.add('activee');
});
//_______group in adn out ading AM and PM

