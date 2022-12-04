//inspired by https://www.w3schools.com/howto/howto_js_sort_table.asp
var table = document.getElementById('classesTable');

function innerLower(tag) {
    return tag.innerHTML.toLowerCase();
}
function moveBefore(object, element){
    return object[element].parentNode.insertBefore(object[element+1],object)
}

function returnElement(elementId) {
    document.getElementById(elementId);
}

function filterTable(inputID, column) {
    var inputElement = document.getElementById(inputID);
    var filtering = inputElement.value.toUpperCase();
    var tableRows = table.getElementsByTagName("tr");
    for (i=1; i < tableRows.length; i++ ){
        
        tableDatum = tableRows[i].getElementsByTagName("td")[column];
        
        if (tableDatum) {
            var textValue = tableDatum.innerText;
            if (textValue.toUpperCase().indexOf(filtering) > -1) {
                tableRows[i].style.display = "";
            } else {
                tableRows[i].style.display = "none";
            }
        }
    }
}

function sortTable(columnNumber) {
    var direction = "ascending";
    var switchCounter = 0;
    var switching = true;
    
    while (switching) {
        switching = false;
        var rows = table.rows;
        for (i=1;i<(rows.length-1);i++){
            shouldSwitch = false;
            var x = rows[i].getElementsByTagName("td")[columnNumber];
            var y = rows[i+1].getElementsByTagName("td")[columnNumber];
            if (direction == "ascending"){
                if (innerLower(x)>innerLower(y)){
                shouldSwitch=true;
                break;
            }
            } else if (direction == "descending") {
                if (innerLower(x)<innerLower(y)){
                shouldSwitch=true;
                break;
            }
            }
        }
        if (shouldSwitch){
            // moveBefore(rows,i);
            rows[i].parentNode.insertBefore(rows[i+1], rows[i]);
            switching=true;
            switchCounter++;
        } else {
        if (direction == "ascending" && switchCounter == 0){
            direction = "descending";
            switching=true;
        }
        }
    }
}