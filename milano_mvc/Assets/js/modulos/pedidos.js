let tblPendientes, tblAceptados, tblCompletados;

const myModal = new bootstrap.Modal(document.getElementById("modalPedidos"));

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
    tblAceptados = $('#tblAceptados').DataTable({
        ajax: {
            url: "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/pedidos/listarAceptados",
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

    // // Evento para ajustar las columnas cuando una pestaña se hace visible
    // $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
    //     $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    // });

});

function cambiarProceso(idPedido, proceso) {
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
            const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/pedidos/update/" + idPedido + "/" + proceso;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res.icono = 'sucess') {
                        tblPendientes.ajax.reload();
                        tblProceso.ajax.reload();
                        tblCompletados.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
                }
            };
        }
    })
}

function verPedido(cod_pedido) {
    const url = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/clientes/verPedido/" + cod_pedido;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            console.log(this.responseText);
            let html = "";
            if (res && res.producto && Array.isArray(res.producto)) {
                res.producto.forEach(row => {
                    let subTotal = row.precio * row.cantidad;
                    html += `<tr>
                     <td>${row.producto}</td>
                     <td><span class="badge bg-custom-orange text-white">${"$" + row.precio}</span></td>
                     <td><span class="badge bg-custom-orange text-white">${row.cantidad}</span></td>
                     <td>${subTotal}</td>
                 </tr>`;
                });
                document.querySelector('#tablePedidos tbody').innerHTML = html;
                myModal.show();
            } else {
                console.error("La respuesta no tiene la estructura esperada:", res);
            }
        }
    };
}
