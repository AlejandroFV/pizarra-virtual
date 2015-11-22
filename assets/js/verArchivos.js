//JS de medioFile
function visualizar(id){
    //gets table
    var oTable = document.getElementById('tabla');

    var rowLength = oTable.rows.length;


    for (i = 1; i < rowLength; i++){

        oCells = oTable.rows.item(i).cells;
        if(oCells.item(0).innerHTML==id){
            break;
        }

    }


    var nombreArchivo=oCells.item(1).innerHTML;
    var tipoArchivo=oCells.item(2).innerHTML;

    var divContentMedia=document.getElementById("mediaDiv");
    divContentMedia.innerHTML="";
    switch(tipoArchivo){
        case "wmv":
        case "mp4":
        case "webm":
        case "ogg":
            divContentMedia.innerHTML="<video controls > <source src=\"../../assets/uploads/"+nombreArchivo+"."+tipoArchivo+" \"  type=\"video/"+tipoArchivo+"\"></video>";
            break;

        case "txt":
        case "pdf":
            divContentMedia.innerHTML="<iframe id=\"frame\" name=\"iframe_a\" src=\"../../assets/uploads/"+nombreArchivo+"."+tipoArchivo+" \" ></iframe>";
            break;

        case "png":
        case "jpg":
        case  "jpeg":
            divContentMedia="<img src=\"../../assets/uploads/"+nombreArchivo+"."+tipoArchivo+" \" >";
            break;

        default:
            divContentMedia.innerHTML="<H1>No se puede visualizar el archivo.</H1>";

            break;
    }
}