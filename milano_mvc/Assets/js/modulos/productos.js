const frm = document.querySelector('#frmRegistro')
const btnAccion = document.querySelector('#btnAccion')
let tblProductos;

var firstTabEl = document.querySelector('#myTab li:last-child button')
var firstTab = new bootstrap.Tab(firstTabEl)

document.addEventListener("DOMContentLoaded", function () {
    tblProductos = $('#tblProductos').DataTable({
        ajax: {
            url: "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/productos/listar",
            dataSrc: ''
        },
        columns: [
            { data: 'cod_producto' },
            { data: 'nombre_producto' },
            { data: 'stock' },
            { data: 'precio' },
            { data: 'imagen' },
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
        const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/productos/registrar";
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(data);
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono = 'sucess') {
                    tblProductos.ajax.reload();
                    document.querySelector('#imagen').value = '';
                }
                Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
            }
        };

    });
});

function eliminarPro(idPro) {
    Swal.fire({
        title: 'Aviso',
        text: "Esta seguro de eliminar el producto?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/productos/delete/" + idPro;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.icono = 'sucess') {
                        tblProductos.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
                }
            };
        }
    })
}

function editPro(idPro) {
    const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/productos/edit/" + idPro;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#nombre_producto').value = res[0].nombre_producto;
            document.querySelector('#precio').value = res[0].precio;
            document.querySelector('#stock').value = res[0].stock;
            document.querySelector('#fecha_vencimiento').value = res[0].fecha_vencimiento;
            document.querySelector('#categoria').value = res[0].categoria;
            document.querySelector('#sabor').value = res[0].sabor;
            document.querySelector('#imagen_actual').value = res[0].imagen;
            const codInput = document.querySelector('#cod_producto');
            codInput.value = res[0].cod_producto;
            codInput.setAttribute('readonly', true); // Hacer el campo cod_producto solo lectura
            btnAccion.textContent = 'Actualizar';
            document.getElementById('nuevoProducto').click();
            firstTab.show();
        }
    }
}