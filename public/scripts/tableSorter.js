
var table = document.getElementById('classesTable');

// convert contents of tag to lowercase
function innerLower(tag) {
    return tag.innerHTML.toLowerCase();
}
// not actually working as intended, sorry!
function moveBefore(object, element){
    return object[element].parentNode.insertBefore(object[element+1],object)
}

// a practice in circular logic
function returnElement(elementId) {
    document.getElementById(elementId);
}

// allows the filtering to operate on a specific column
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

//inspired by https://www.w3schools.com/howto/howto_js_sort_table.asp
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
        // implementing bubble sorting very slowly
        if (shouldSwitch){
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