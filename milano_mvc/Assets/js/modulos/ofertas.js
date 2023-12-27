const frm = document.querySelector('#frmRegistro')
const btnAccion = document.querySelector('#btnAccion')
let tblOfertas;

var firstTabEl = document.querySelector('#myTab li:last-child button')
var firstTab = new bootstrap.Tab(firstTabEl)
document.addEventListener("DOMContentLoaded", function () {
    tblOfertas = $('#tblOfertas').DataTable({
        ajax: {
            url: "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ofertas/listar",
            dataSrc: ''
        },
        columns: [
            { data: 'cod_oferta' },
            { data: 'descripcion' },
            { data: 'tiempo_inicio' },
            { data: 'tiempo_fin' },
            { data: 'producto_cod_producto' },
            { data: 'accion' },
        ],
        language,
        dom,
        buttons,
    });
    //submit usuarios
    frm.addEventListener('submit', function (e) {
        e.preventDefault();
        let data = new FormData(this);
        const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ofertas/registrar";
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        console.log(data)
        http.send(data);
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono = 'sucess') {
                    tblOfertas.ajax.reload();
                }
                Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
            }
        };

    });
});

function eliminarOfert(idOfert) {
    Swal.fire({
        title: 'Aviso',
        text: "Esta seguro de eliminar el oferta?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ofertas/delete/" + idOfert;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.icono = 'sucess') {
                        tblOfertas.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
                }
            };
        }
    })
}

function editOfert(idOfert) {
    const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ofertas/edit/" + idOfert;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#descripcion').value = res[0].descripcion;
            document.querySelector('#descuento').value = res[0].descuento;
            document.querySelector('#tiempo_inicio').value = res[0].tiempo_inicio;
            document.querySelector('#tiempo_fin').value = res[0].tiempo_fin;
            document.querySelector('#producto_cod_producto').value = res[0].producto_cod_producto;
            const codInput = document.querySelector('#cod_oferta');
            codInput.value = res[0].cod_oferta;
            codInput.setAttribute('readonly', true); // Hacer el campo cod_oferta solo lectura
            btnAccion.textContent = 'Actualizar';
            document.getElementById('nuevoOferta').click();
            firstTab.show();
        }
    }
}