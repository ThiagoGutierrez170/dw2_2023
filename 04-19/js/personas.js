//cargar personas
//listar personas
//agregar personas
//editar personas
//borar personas

/*
persona
id
nombre
apellido
cin -> num de documento
direcciones -> textbox
fecha de nacimiento
ciudadad
fecha_naz
*/
var personas =[];
var pdatos=[];
pdatos.push({
    id:1,
    nombre:"ivan",
    apellido:"davalos",
    cin:"55449165",
    direccion:"pacu cua",
    ciudad_id:1,
    fecha_nac:"2002-11-01"
});
pdatos.push({
    id:2,
    nombre:"thiago",
    apellido:"gutierrez",
    cin:"55117470",
    direccion:"bernandino caballero",
    ciudad_id:2,
    fecha_nac:"2004-04-25"
});
//console.log(pdatos)
function pcargar(){
    var data=localStorage.getItem("personas");
    if (!data || data==""){
        console.log("entro la condicion");
        let aux=JSON.stringify(pdatos);
        personas=JSON.parse(aux);
    }
    else{
        personas=JSON.parse(data);
    }
    console.log(personas);
    dibujartabla();
}
function dibujartabla(){
    console.log("dibujando");
    var lista= document.getElementById("lista");
    var thead='<table class="table table-dark "><thead><tr><th>id</th><th>Nombre</th><th>apellido</th><th>cin</th><th>direccion</th><th>ciudad_id</th><th>fecha de nacimiento</th><th colspan="2"><button id="btnew" class="btn btn-primary ">Nuevo</button></th></tr>';
    var tfoot='</tbody></table>';
    var tbody="";
    pdatos.forEach((e) => {
        tbody=tbody+'<tbody><tr><th>'+
        e.id+'</th><th>'+
        e.nombre+'</th><th>'+
        e.apellido+'</th><th>'+
        e.cin+'</th><th>'+
        e.direccion+'</th><th>'+
        e.ciudad_id+'</th><th>'+
        e.fecha_nac+'</th><th colspan="2"><button data-id="'+
        e.id+'" class="btn btn-warning btedit ">Editar</button></th><th colspan="2"><button data-id="'+
        e.id+'" class="btn btn-danger btdel ">Borrar</button></th></tr>';
    });
    lista.innerHTML = thead+tbody+tfoot;
    addEventosClk();
}

function addEventosClk(){
    var btnew=document.getElementById("btnew");
    btnew.addEventListener("click",clknuevo);
    var bteditar=document.getElementsByClassName('btedit');
    for(let i=0;i<bteditar.length;i++){
        bteditar[i]=addEventListener("click",clkeditar);
    }

}
function clkeditar(e){
    eid=e.target.getAttribute('data-id');
    console.log("clik editar");
    pdatos.forEach((item)=>{
        if (item.id==eid){
            console.log(item);
            document.getElementById("id").value=item.id;
            document.getElementById("nombre").value=item.nombre;
            document.getElementById("apellido").value=item.apellido;
            document.getElementById("cin").value=item.cin;
            document.getElementById("direccion").value=item.direccion;
            document.getElementById("ciudad_id").value=item.ciudad_id;
            document.getElementById("fecha_nac").value=item.fecha_nac;
        }
    });
}

function clknuevo(){
    console.log("nuevo");
    document.getElementById("id").value =-1;
    document.getElementById("nombre").value ="";
    document.getElementById("apellido").value ="";
    document.getElementById("cin").value ="";
    document.getElementById("direccion").value ="";
    document.getElementById("ciudad_id").value ="";
    document.getElementById("fecha_nac").value ="";
}

function pguardar(){
    var gid = document.getElementById("id").value;
    var gnombre = document.getElementById("nombre").value;
    var gapellido = document.getElementById("apellido").value;
    var gcin = document.getElementById("cin").value;
    var gdireccion = document.getElementById("direccion").value;
    var gciudad_id = document.getElementById("ciudad_id").value;
    var gfecha_nac = document.getElementById("fecha_nac").value;
    console.log(gid+" - "+gnombre+" - "+gapellido+" - "+gcin+" - "+gdireccion+" - "+gciudad_id+" - "+gfecha_nac);	
    if (gid==-1){
    //console.log("nuevo item");
    gid=pdatos[pdatos.length-1].id+1;
    pdatos.push({ 
        id: gid, 
        nombre: gnombre,
        apellido: gapellido,
        cin: gcin,
        direccion: gdireccion,
        ciudad_id: gciudad_id,
        fecha_nac: gfecha_nac
    });
    console.log("agregar")
    }
    else{
        console.log("editar item")
        pdatos.forEach((e) =>{
                if (gid==e.id){
                    e.nombre=gnombre;
                    e.apellido=gapellido;
                    e.cin=gcin;
                    e.direccion=gdireccion;
                    e.ciudad_id=gciudad_id;
                    e.fecha_nac=gfecha_nac;
                }
            })
    }
    dibujartabla();
    }