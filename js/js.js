let formulario = document.getElementById('cliente');

const limpiar = ()=>{
    document.getElementById("nombre").value = '';
    document.getElementById("Email").value = '';
    document.getElementById("descripcion").value = '';
    document.getElementById("boletin").checked = false;
    document.getElementById("profesion").checked = false;
    document.getElementById("gerente").checked = false;
    document.getElementById("aux").checked = false;
    
}

formulario.addEventListener('submit',(e)=> {
    e.preventDefault();
    let datos = new FormData(formulario);

    fetch('./app/main.php',{
        method:'POST',
        body:datos
    }).then(res => res.text())
    .then(data => {
        console.log(data);
        limpiar();

    })
    .catch((e)=>console.log('el error:'+ e))
})


const arreglo = (user)=>{
    console.log(user);
}


const usuarios = async () => {
    const url = './app/main.php';
    console.log(url);
    const res = await fetch(url)
    .then(res =>  res.json())
    .then(response=>arreglo(response))
    .catch(err => console.log(err));

}

usuarios();



