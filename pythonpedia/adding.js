alert("thisworks");
var table = document.getElementById("thisWeirdTable");
if(table == null)
    alert("but this does not");
var row = table.insertRow();
var titleCell = row.insertCell(0);
var x = sessionStorage.getItem("titleMain");
alert(x);
titleCell.innerHTML = x;
