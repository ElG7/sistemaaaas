let tblPendiente;
let tblCompletados;

var firstTabEl = document.querySelector('#myTab li:last-child button')
var firstTab = new bootstrap.Tab(firstTabEl)

document.addEventListener("DOMContentLoaded", function () {
    tblPendientes = $('#tblPendientes').DataTable({
        ajax: {
            url: "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/pedidos/listarPendientes",
            dataSrc: "",
        },
        columns: [
            { data: 'cod_pedido' },
            { data: 'monto' },
            { data: 'fecha_pedido' },
            { data: 'cliente_rut' },
            { data: 'estado' },
            { data: 'accion' },
        ],
        language,
        dom,
        buttons,
    });
    tblCompletados = $('#tblCompletados').DataTable({
        ajax: {
            url: "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/pedidos/listarCompletados",
            dataSrc: "",
        },
        columns: [
            { data: 'cod_pedido' },
            { data: 'monto' },
            { data: 'fecha_pedido' },
            { data: 'cliente_rut' },
            { data: 'estado' },
            { data: 'accion' },
        ],
        language,
        dom,
        buttons,
    });
});

function cambiarProceso(idPedido) {
    Swal.fire({
        title: 'Aviso',
        text: "Esta seguro de cambiar el estado?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Cambiar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/pedidos/update/" + idPedido;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.icono = 'sucess') {
                        tblPendientes.ajax.reload();
                        tblCompletados.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
                }
            };
        }
    })
}
