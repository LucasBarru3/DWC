// en este script enviamos los datos en un objeto
// el objeto hay que serializarlo antes de enviar
// hay que indicarle en headers el tipo de elemento que se envía


var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');
var inputs = document.getElementsByTagName('input');


formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('me diste un click')
    
    let datos = {
        usuario: inputs[0].value,
        pass: inputs[1].value
    }
    alert(datos.usuario+"  "+ datos.pass)
    alert("Envío de datos con objeto")

    fetch('post_Objeto.php',{
        method: 'POST',
        body: JSON.stringify(datos),
        /* headers: {
            'Content-Type': 'application/json'
          } */
        
    })
        .then( res => res.json())
        .then( data => {
            console.log(data)
            if(data === 'error'){
                respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Llena todos los campos
                </div>
                `
            }else{
                respuesta.innerHTML = `
                <div class="alert alert-primary" role="alert">
                    ${data}
                </div>
                `
            }
        } )


       
})