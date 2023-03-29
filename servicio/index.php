<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafío de ciberseguridad</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #f5f5f5;
}

h1 {
    color: #333;
    margin-top: 30px;
    margin-bottom: 20px;
}

#contador {
    font-size: 2em;
    font-weight: bold;
    color: #4caf50;
    margin-bottom: 20px;
}

#barra-porcentaje {
    width: 100%;
    height: 30px;
    background-color: #ddd;
    margin-bottom: 30px;
    position: relative;
}

#barra-porcentaje::before {
    content: '';
    position: absolute;
    height: 100%;
    width: 0;
    background-color: #4caf50;
}

button {
    font-size: 1.1em;
    padding: 10px 20px;
    margin: 0 10px 20px;
    border: none;
    background-color: #2196f3;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0d8aee;
}

button:active {
    background-color: #0b7cd5;
}

    </style>
</head>
<body>
    <h1>Desafío de ciberseguridad</h1>
    <div id="contador"></div>
    <div id="barra-porcentaje"></div>
    <button id="pausa">Pausa</button>
    <button id="detener">Detener</button>
    <button id="eliminar">Eliminar</button>
    <button id="acelerar">Acelerar</button>
    
    
    
<script>
let contador = 78 * 60 * 60;
let pausado = false;

function actualizarContador() {
    if (!pausado) {
        contador--;
        const horas = Math.floor(contador / 3600);
        const minutos = Math.floor((contador % 3600) / 60);
        const segundos = contador % 60;
        document.getElementById('contador').innerText = `${horas}h ${minutos}m ${segundos}s`;
    }
}

function actualizarBarraPorcentaje() {
    if (!pausado) {
        const porcentaje = (1 - (contador / (78 * 60 * 60))) * 100;
        document.getElementById('barra-porcentaje').style.width = `${porcentaje}%`;
    }
}

document.getElementById('pausa').addEventListener('click', () => {
    pausado = !pausado;
});

document.getElementById('detener').addEventListener('click', () => {
    pausado = true;
    contador = 78 * 60 * 60;
    actualizarContador();
    actualizarBarraPorcentaje();
});

document.getElementById('eliminar').addEventListener('click', () => {
    location.reload();
});

document.getElementById('acelerar').addEventListener('click', () => {
    pausado = true;
    contador = 0;
    actualizarContador();
    actualizarBarraPorcentaje();
    alert('Servidores de la preparatoria UAZ TOMADOS, A divertirnos, gracias por la ayuda!');
});

actualizarContador();
actualizarBarraPorcentaje();
setInterval(() => {
    actualizarContador();
    actualizarBarraPorcentaje();
}, 1000);

    </script>
</body>
</html>
