var datos=[];
var blog=[];
/*
datos.push({id: 1,titulo: "Thiago", contenido: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur aliquam quod id quidem delectus incidunt, ea enim, nihil corrupti animi ab eaque sunt rerum perferendis, reprehenderit at harum? Blanditiis?"});
datos.push({id: 2,titulo: "Daniel", contenido: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur aliquam quod id quidem delectus incidunt, ea enim, nihil corrupti animi ab eaque sunt rerum perferendis, reprehenderit at harum? Blanditiis?"});
datos.push({id: 3,titulo: "Esteban", contenido: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur aliquam quod id quidem delectus incidunt, ea enim, nihil corrupti animi ab eaque sunt rerum perferendis, reprehenderit at harum? Blanditiis?"});
*/
 function xcargar(){
    //console.log("xcargar");
    var recurso = "http://localhost:81/dw21_gutierrez/proces/api.php?mod=notas";
     fetch(recurso)
		.then((response) => response.json())
		.then((data) => {
            console.log(data);
            let aux = JSON.stringify(data);
            blog=JSON.parse(aux);
            persistir();
			dibujartabla();    
        });
}

function cargar(){
    var blog_notas=localStorage.getItem("blog_notas");
    if (!blog_notas || blog_notas==""){     
        //console.log("entro la condicion");
        let aux=JSON.stringify(datos);  
        blog=JSON.parse(aux);       
    }
    else{
        blog=JSON.parse(blog_notas);  
        //console.log("no hay datos");
    }
    dibujartabla();
}

function dibujartabla(){
    //console.log("dibujando");
    var estilo;
    
    var lista= document.getElementById("lista");
    var thead='<div style=" margin-right: auto;margin-left: auto;">';
    var tfoot='</div>';
    var tbody="";
    blog.forEach((e)=>{
        if (e.gru_id==1){
            estilo="card bg-ligth";
        }
        else if(e.gru_id==2){
            estilo="card bg-warning";
        }
        else{
            estilo="card bg-success";
        }
        tbody=tbody+'<div class="'+
        estilo+'" style="max-width: 18rem;"><div class="card-header">'+
        e.titulo+'</div><div class="card-body"><p class="card-text">'+
        e.contenido+'</p></div></div>';
    });
    lista.innerHTML=thead+tbody+tfoot;
    eventosclck();
}

function eventosclck(){
    var btnenviar=document.getElementById("btnenviar");
    btnenviar.addEventListener("click", guardar);
}

async function guardar()
    {
        var ggru_id = document.getElementById("gru_id").value;
        var gtitulo = document.getElementById("titulo").value;
        var gcontenido = document.getElementById("contenido").value;
        var datos={ titulo:gtitulo, contenido:gcontenido, gru_id:ggru_id};
        var recurso ="http://localhost:81/dw21_gutierrez/proces/api.php?mod=notas&action=guardar";
		console.log(recurso);
        var config = {
					method: "POST", // or 'PUT'
					body: JSON.stringify(datos), // data can be `string` or {object}!
					headers: {
						"Content-Type": "application/json",
					},
				};
        await fetch(recurso, config)
					.then((response) =>  response.json())
					.then((data) => {
						console.log(data);
						xcargar();
					}); 
                           
    }

function persistir(){
    localStorage.setItem("blog_notas",JSON.stringify(blog)); //conbierto blog a texto y lo subo al navegador
}

window.addEventListener("load",xcargar);