window.onload = function () {
    showFiles();
    showFilesN();
    showFilesA();
};
function showPdfTest(fileName) {

    var pdfContent = '<div class="card border-0"><div class="card-body "><button class="btn btn-danger btn-lg mb-3 " type="button" onclick="showPDF(\'' + fileName + '\')"><i class="fa-solid fa-file-pdf fa-lg"></i> ' + fileName + ' </button><br>' +
        '<button id="HacerTest" class="btn btn-danger btn-lg mb-3 " type="button" onclick="empezar(\'' + fileName + '\')"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Hacer Test</button> </div></div>';

    console.log(fileName);
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


function showPDF(archivo) {

    var pdfPath = './public/docs/reglas/' + archivo;
    window.open(pdfPath, '_blank');

}
var preguntas = [];
var elegida = '';
var correcta = '';
var contador = 0;
var correctas = 0;
var opciones = [2, 3, 4, 5];

function empezar(regla) {
document.getElementById("fin").innerHTML="";
    preguntas = [];
    contador = 0;
    correctas = 0;
    elegida = '';
    let sections = document.getElementsByTagName("section");
    for (let i = 0; i < sections.length; i++) {
        sections[i].innerHTML = '';
    }
    document.getElementById("HacerTest").style.display = "none";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            preguntas = JSON.parse(this.responseText);
            console.log(preguntas);
            cargarPregunta();
        }
    };
    xhttp.open("POST", "./src/reglasTest.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("regla=" + encodeURIComponent(regla));
}

function reordenarOpciones() {
    let n = opciones.length;
    let m = 0;
    let p = 0;
    let q = 0;
    while (n > 0) {
        m = parseInt(Math.random() * n);
        p = opciones[n - 1];
        q = opciones[m];
        opciones[m] = p;
        opciones[n - 1] = q;
        n--;
    }
}

function cargarPregunta() {
    let datos = preguntas[contador];
    correcta = datos['success'];
    elegida = '';
    document.getElementById("pregunta").innerHTML = datos["pregunta"];
    reordenarOpciones();
    document.getElementById("respuestas").innerHTML = '';
    let list = document.createElement("ul");
    list.setAttribute("class", "list-group");
    for (let i = 0; i < opciones.length; i++) {

        let op = document.createElement("li");
        op.setAttribute("class", "list-group-item list-group-item-danger")
        let radio = document.createElement("input");
        radio.setAttribute("type", "radio");
        radio.setAttribute("class", "form-check-input me-1");
        radio.setAttribute("name", "respuesta");
        radio.setAttribute("onclick", "elegir('" + datos[opciones[i]] + "')");
        op.appendChild(radio);
        op.appendChild(document.createTextNode(datos[opciones[i]]));
        list.appendChild(op);
        document.getElementById("respuestas").appendChild(list);
    }
    let botonResponder = document.createElement("button");

    botonResponder.setAttribute("onclick", "responder()");
    botonResponder.setAttribute("class", "btn btn-danger my-3 ");
    botonResponder.setAttribute("id", "respondertest");
    botonResponder.innerHTML = "Responder";
    document.getElementById("respuestas").appendChild(botonResponder);
}

function elegir(valor) {
    elegida = valor;
}

function responder() {
    document.getElementById("ultima").setAttribute("class", "badge text-bg-warning");

    let ultima = 'Respuesta Incorrecta';
    if (elegida == correcta) {
        document.getElementById("ultima").setAttribute("class", "badge text-bg-success");
        ultima = 'Respuesta Correcta';
        correctas++;
    }
    contador++;

    document.getElementById("ultima").innerHTML = ultima;

    document.getElementById("puntos").setAttribute("class", "text-primary my-3  text-center");

    document.getElementById("puntos").innerHTML = "<i class='fa-solid fa-circle-info fa-lg'></i> Puntuación: " + correctas + " de " + contador + ".";
    if (contador < 5) {
        cargarPregunta();
    }
    else {

        finalizar();
        
    }
}

function finalizar() {
    // VER CÓmo hacer test de nuevo?¿?¿
    // document.getElementById("HacerTest").innerHTML = '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Hacer Test de Nuevo';

    document.getElementById("respondertest").style.display = "none";
    let p1 = document.createElement("p");
    p1.setAttribute("class", "alert alert-success text-center");
    p1.innerHTML = "<i class='fa-solid fa-flag-checkered fa-xl'></i> El test ha finalizado. Falta mejorar <i class='fa-solid fa-face-sad-cry fa-xl'></i>";
    document.getElementById("fin").appendChild(p1);
    if (correctas == 5) {
        let p2 = document.createElement("p");
        p2.setAttribute("class", "alert-heading text-success");
        p2.innerHTML = "Puntuación perfecta, enhorabuena. <i class='fa-solid fa-trophy fa-xl'></i>";
        document.getElementById("fin").appendChild(p2);
    }
    
    

}

/********************************************** -- NORMATIVA -- ***************************************** */
function showFilesN() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("listaN").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "./src/get_filesN.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}
function showPdfTestN(fileName) {

    var pdfContent = '<div class="card border-0"><div class="card-body "><button class="btn btn-danger btn-lg mb-3 " type="button" onclick="showPDFN(\'' + fileName + '\')"><i class="fa-solid fa-file-pdf fa-lg"></i> ' + fileName + ' </button><br>' +
        '<button id="HacerTest" class="btn btn-danger btn-lg mb-3 " type="button" onclick="empezar(\'' + fileName + '\')"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Hacer Test</button> </div></div>';

    console.log(fileName);
    var contenedor = document.getElementById("contenedor2");

    contenedor.innerHTML = pdfContent;


}
function showPDFN(archivo) {

    var pdfPath = './public/docs/normativa/' + archivo;
    window.open(pdfPath, '_blank');

}
/********************************************** -- ACTAS -- ***************************************** */
function showFilesA() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("listaA").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "./src/get_filesA.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}
function showPdfTestA(fileName) {

    var pdfContent = '<div class="card border-0"><div class="card-body "><button class="btn btn-danger btn-lg mb-3 " type="button" onclick="showPDFA(\'' + fileName + '\')"><i class="fa-solid fa-file-pdf fa-lg"></i> ' + fileName + ' </button><br>' +
        '<button id="HacerTest" class="btn btn-danger btn-lg mb-3 " type="button" onclick="empezar(\'' + fileName + '\')"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Hacer Test</button> </div></div>';

    console.log(fileName);
    var contenedor = document.getElementById("contenedor2");

    contenedor.innerHTML = pdfContent;


}
function showPDFA(archivo) {

    var pdfPath = './public/docs/actas/' + archivo;
    window.open(pdfPath, '_blank');

}