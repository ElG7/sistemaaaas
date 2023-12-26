const frm = document.querySelector('#frmRegistro')
const btnAccion = document.querySelector('#btnAccion')
let tblIngredientes;

var firstTabEl = document.querySelector('#myTab li:last-child button')
var firstTab = new bootstrap.Tab(firstTabEl)
document.addEventListener("DOMContentLoaded", function () {
    tblIngredientes = $('#tblIngredientes').DataTable({
        ajax: {
            url: "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ingredientes/listar",
            dataSrc: ''
        },
        columns: [
            { data: 'cod_ingrediente' },
            { data: 'nombre_ingrediente' },
            { data: 'stock' },
            { data: 'detalle' },
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
        const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ingredientes/registrar";
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        console.log(data)
        http.send(data);
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono = 'sucess') {
                    tblIngredientes.ajax.reload();
                }
                Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
            }
        };

    });
});

function eliminarIngre(idIngre) {
    Swal.fire({
        title: 'Aviso',
        text: "Esta seguro de eliminar el ingrediente?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ingredientes/delete/" + idIngre;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.icono = 'sucess') {
                        tblIngredientes.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
                }
            };
        }
    })
}

function editIngre(idIngre) {
    const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/ingredientes/edit/" + idIngre;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#nombre_ingrediente').value = res[0].nombre_ingrediente;
            document.querySelector('#detalle').value = res[0].detalle;
            document.querySelector('#stock').value = res[0].stock;
            document.querySelector('#fecha_vencimiento').value = res[0].fecha_vencimiento;
            document.querySelector('#producto_cod_producto').value = res[0].producto_cod_producto;
            const codInput = document.querySelector('#cod_ingrediente');
            codInput.value = res[0].cod_ingrediente;
            codInput.setAttribute('readonly', true); // Hacer el campo cod_producto solo lectura
            btnAccion.textContent = 'Actualizar';
            firstTab.show();
        }
    }
}