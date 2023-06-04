window.onload = function () {
    showFiles();
};
function showPdfTest(fileName) {

    var pdfContent = '<div class="card"><div class="card-body"><button class="btn btn-danger btn-lg mb-3 " type="button" onclick="showPDF(\'' + fileName + '\')"><i class="fa-solid fa-file-pdf fa-lg"></i> ' + fileName + ' </button><br>' +
        '<button class="btn btn-danger btn-lg mb-3 " type="button" onclick="doTest()"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Hacer Test</button> </div></div>';


    var contenedor = document.getElementById("contenedor2");

    contenedor.innerHTML = pdfContent;


}

function showFiles() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lista").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "./src/get_files.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function showPDF(folderName) {
    var pdfPath = './public/docs/reglas/' + folderName;
    window.open(pdfPath, '_blank');
    //ARREGLAR RESPONSIVE SI QUIERO IFRAME 
    // var ifr = document.createElement("iframe");
    // ifr.setAttribute("src", pdfPath);
    // ifr.setAttribute("type", "application/pdf")
    // ifr.setAttribute("width", "500");
    // ifr.setAttribute("height", "600");
    // document.getElementById("contenedor2").innerHTML = "";
    // document.getElementById("contenedor2").appendChild(ifr);
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             console.log(folderName);
    //             var pdfPath = this.responseText;
    //             //window.open(pdfPath, "_blank");
    //             var ifr=document.createElement("iframe");
    //             ifr.setAttribute("src", './public/docs/reglas/'.folderName);
    //             ifr.setAttribute("type", "application/pdf")
    //             ifr.setAttribute("width", "500");
    //             ifr.setAttribute("height", "700");
    //             document.getElementById("contenedor2").innerHTML = "";
    // document.getElementById("contenedor2").appendChild(ifr);
    // //console.log(folderName);

    //             //<iframe src="docs/Regla 1.pdf" type="application/pdf" width="500" height="700">
    //         }
    //     };
    //     xhttp.open("GET", "./src/get_pdf.php?folder=" + folderName, true);
    //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhttp.send();
}