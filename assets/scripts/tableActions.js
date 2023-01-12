function returnValues(x){
    const table = document.querySelector('table');
    const cells = table.querySelectorAll('td');
    const values = Array.from(cells).map(cell => cell.innerText);
    const tableRow = document.getElementById("table").rows;
    const form = document.getElementById("form");
    const usernameField = document.getElementById('usernameForm');
    for (let i = 0; i < tableRow.length; i++){
        let tableCells = tableRow[x].cells[i].innerHTML;
        form.elements[i].value = tableCells;
    }

    if(values.includes(usernameField.innerText)){
        formButtonAdmin.innerText = "Update";
    }
}
