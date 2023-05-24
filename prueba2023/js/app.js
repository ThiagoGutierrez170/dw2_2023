var datos=[];
var correo=[];
datos.push({id: 1,nombre: "Thiago", email: "thiago168@gmail.com",fecha: "15/05/2023", mensaje: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur aliquam quod id quidem delectus incidunt, ea enim, nihil corrupti animi ab eaque sunt rerum perferendis, reprehenderit at harum? Blanditiis?"});
datos.push({id: 2,nombre: "Daniel", email: "daniel595@gmail.com",fecha: "16/05/2023", mensaje: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur aliquam quod id quidem delectus incidunt, ea enim, nihil corrupti animi ab eaque sunt rerum perferendis, reprehenderit at harum? Blanditiis?"});
datos.push({id: 3,nombre: "Esteban", email: "esteban156@gmail.com",fecha: "17/05/2023", mensaje: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur aliquam quod id quidem delectus incidunt, ea enim, nihil corrupti animi ab eaque sunt rerum perferendis, reprehenderit at harum? Blanditiis?"});

function cargar(){
    var mensajes=localStorage.getItem("mensajes");
    if (!mensajes || mensajes==""){     
        console.log("entro la condicion");
        let aux=JSON.stringify(datos);  
        correo=JSON.parse(aux);       
    }
    else{
        correo=JSON.parse(mensajes);  
        console.log("no hay datos");
    }
    dibujartabla();
}

function dibujartabla(){
    console.log("dibujando");
    var lista= document.getElementById("lista");
    var thead='<table class="table table-dark">';
    var tfoot='</table>';
    var tbody="";
    correo.forEach((e)=>{
        tbody=tbody+'<tr><th><b>Nombre: </b><br> '+
        e.nombre+'<br><b> Email: </b><br> '+
        e.email+'<br><b> Fecha: </b><br> '+
        e.fecha+' <br><button data-id="'+
        e.id+'" class="btn btn-danger btdel " style="align-items: center;">borrar</button></th><th><b>Mensaje </b><br>'+
        e.mensaje+'</th></tr>';
    });
    lista.innerHTML=thead+tbody+tfoot;
    eventosclck();
}

function eventosclck(){
    var btnenviar=document.getElementById("btnenviar");
    btnenviar.addEventListener("click", guardar);
    var btnborrar = document.getElementsByClassName("btdel");
	for (let i = 0; i < btnborrar.length; i++) {
		btnborrar[i].addEventListener("click", borrar);
		// console.log(btnEditar[i]);
	}
}

function guardar(){
    var gid =correo[correo.length-1].id+1;
    var gnombre = document.getElementById("nombre").value;
    var gemail = document.getElementById("email").value;
    var gmensaje = document.getElementById("mensaje").value;
    if (gnombre=="" ||  gemail=="" || gmensaje==""){
        document.getElementById("nombre").innerHTML="error";
    }
    else{
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth();
    var curr_year = d.getFullYear();
    var gfecha =curr_date + "-" + curr_month + "-" + curr_year;
    console.log(gid+" - "+gnombre+" - "+gemail+" - "+gmensaje+" - "+gfecha);	
    correo.push({ id: gid, nombre: gnombre, email: gemail, fecha: gfecha, mensaje: gmensaje});

    dibujartabla();
    persistir();
    }
}

function borrar(e){
    eid=e.target.getAttribute("data-id");
    correo.forEach((item,idx)=>{
        if (item.id==eid){
            correo.splice(idx,1);
            dibujartabla();
            persistir();
        }
    });
}

function persistir(){
    localStorage.setItem("mensajes",JSON.stringify(correo)); //conbierto ciudades a texto y lo subo al navegador
}

window.addEventListener("load",cargar);