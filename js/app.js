const formulario = document.getElementById("form");

const validar = ()=>{
    const nombre =  document.getElementById("nombre").value;
    const correo =  document.getElementById("Email").value;
    const area =  document.getElementById("area-select").value;
    const descripcion =  document.getElementById("Des-Textarea").value;
    const role1 =  document.getElementById("femenino").value;
    let valido = false;
    const radios = document.getElementsByName('sexo');

    console.log(nombre+' '+correo+' '+area+' '+ descripcion+' ');

    if (nombre != '' && correo != '' && area != '' && descripcion != ''  ) {
        valido = true;
    }else{
        valido = false;
    }


   // return valido;
}

const data = new FormData(formulario);

formulario.addEventListener("submit", (e) => {
    e.preventDefault();
    console.log(data.get('sexo'));
    console.log(data.get('correo'));
    console.log(data.get('nombre'));
    const valido = validar();

    
    if (valido == true) {
        fetch('./app/main.php', {
            method: 'POST',
            body: data
         })
         .then(res =>res.text())
         .then(res => console.log(res))
         .catch(err => console.error(err));    
         alert('hola mundo!')
    } 
    
});

