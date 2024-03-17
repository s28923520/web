function getTableData() {
    var selectedTable = document.forms["tableForm"]["table"].value;

    fetch("get.php?table=" + selectedTable)
        .then(response => response.text())
        .then(data => {
            document.getElementById("tableDataContainer").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}