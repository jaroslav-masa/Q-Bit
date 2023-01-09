/*var formButtonAdmin = document.getElementById("formButtonAdmin");
formButtonAdmin.innerText = "Add";


var usernameField = document.getElementById('usernameForm');


usernameField.addEventListener('input', (event) => {
    const target = event.target;

    const table = document.querySelector('table');
    const cells = table.querySelectorAll('td');
    const values = Array.from(cells).map(cell => cell.innerText);

    
    if(values.includes(target.innerHTML) && target != null){
        formButtonAdmin.innerText = "Update";
    }else formButtonAdmin.innerText = "Add";
    console.log(`Text field value: ${target.value}`);
});*/

function returnValues(x){
    const table = document.querySelector('table');
    const cells = table.querySelectorAll('td');
    const values = Array.from(cells).map(cell => cell.innerText);
    var tableRow = document.getElementById("table").rows;
    var form = document.getElementById("form");
    const usernameField = document.getElementById('usernameForm');
    for (i = 0; i < tableRow.length; i++){
        let tableCells = tableRow[x].cells[i].innerHTML;
        form.elements[i].value = tableCells;
    }

    if(values.includes(usernameField.innerText)){
        formButtonAdmin.innerText = "Update";
    }
}