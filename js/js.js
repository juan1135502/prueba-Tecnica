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
        $('#staticBackdrop').modal('hide');
        usuarios();

    })
    .catch((e)=>console.log('el error:'+ e))
})

const filtroBoletin = (boletin)=>{

    switch (boletin) {
        case '0':
            return 'No';

        case '1':
            return 'Si';
    
        default:
            return 'No';
    }
}

const filtroArea = (area)=>{

    switch (area) {
        case '5':
            return 'Desarrollo de Negocio';

        case '2':
            return 'Ingenieria';
        case '7':
            return 'Servicios';

        case '8':
            return 'Calidad';

        case '1':
            return 'admin y financiera';
    
        default:
            return ' ';
    }
}

const fullTable =(id,nombre,correo,sexo,area,boletin)=>{
    
    boletin = filtroBoletin(boletin);
    area = filtroArea(area);
    const tb = document.getElementById('tab');
    const tr= document.createElement('tr'); 
    const tdnombre = document.createElement('td');
    const tdcorreo = document.createElement('td');  
    const tdsexo = document.createElement('td'); 
    const tdarea = document.createElement('td');
    const tdboletin = document.createElement('td'); 

    const modify = document.createElement('svg');
    modify.setAttribute('xmlns','http://www.w3.org/2000/svg');
    modify.setAttribute('width','16');
    modify.setAttribute('height','16');
    modify.setAttribute('fill','currentColor');
    modify.setAttribute('class','bi bi-pencil-square boton');
    modify.setAttribute('viewBox','0 0 16 16');

    const path1 = document.createElement('path');
    path1.setAttribute('d','M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z');

    const path2 = document.createElement('path');
    path2.setAttribute('fill-rule','evenodd');
    path2.setAttribute('d','M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z');

    modify.appendChild(path1);
    modify.appendChild(path2);
    
    tdnombre.innerText = nombre;
    tdnombre.setAttribute('class','row');
    tdcorreo.innerText = correo;
    tdsexo.innerText = sexo;
    tdarea.innerText = area;
    tdboletin.innerText = boletin;

    /*
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg>
    */

    tb.appendChild(tr);
    tr.appendChild(tdnombre);
    tr.appendChild(tdcorreo);
    tr.appendChild(tdsexo);
    tr.appendChild(tdarea);
    tr.appendChild(tdboletin);
    tr.appendChild(modify);



} 


const arreglo = (user)=>{
    for (let i = 0; i < user.length; i++) {
        fullTable(user[i].id,user[i].nombre,user[i].email,user[i].sexo,user[i].area_id,user[i].boletin);
       
    }
}


const usuarios = async () => {
    const url = './app/main.php';
    const res = await fetch(url)
    .then(res =>  res.json())
    .then(response=>arreglo(response))
    .catch(err => console.log(err));

}

usuarios();

/*
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
}*/






