
function getAllEmployee() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("empShow").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getAllEmployee.php?",true);
    xmlhttp.send();
    return;
}


function showResultEmp(str) {

    if (str.length==0) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("empShow").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../controller/getAllEmployee.php?",true);
      xmlhttp.send();
      return;
    } else {

    document.getElementById("empShow").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("empShow").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","../controller/getEmployee.php?q="+str,true);
    xmlhttp.send();
  }
}


function deleteEmployee(str) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("empShow").innerHTML = this.responseText;
      getAllEmployee();
    }
  };
xmlhttp.open("GET","../controller/deleteDone.php?q="+str,true);
xmlhttp.send();

  
}

