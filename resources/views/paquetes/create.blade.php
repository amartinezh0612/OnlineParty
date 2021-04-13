    @extends('layouts.admin')
    @section('contenido')
    <!DOCTYPE html>
    <html>

    <head>
        <title></title>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

        </script>
        <style>
            .btnatras {
                color: red;
            }

        </style>
            <div class="app-main__inner col">
            <div class="app-page-title">
                <div class="page-title-wrapper ">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-arielle-smile"> </i>
                        </div>
                        <div>PAQUETES
                            <div class="page-title-subheading">Sistema de Administración de Onine Party
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </head>

    <body>
        <div class="col-lg-12">
            <div class="main-card mb-4 card">
                <div class="card-body">
                    <h5 class="card-title">Online Party</h5>
                    <form class="needs-validation" novalidate method="POST" action="{{route('paquetes.store')}}">
                        @csrf
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="validationTooltip04">Paquete</label>
                                            <input type="text" name="nombre" min="1" class="form-control"
                                                id="nombre" placeholder="Ingrese Paquete" required>
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea type="text" class="form-control" placeholder="Ingrese Descripcion" id="descripcion_p" name="descripcion_p" rows="6"></textarea>
                                    <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                    </div>
                                    </div>

                                    
                                    <div class="col-md-3 mb-3">
                                            <label for="validationTooltip04">Costo</label>
                                            <input onchange="MASK(this,this.value,'-$##,###,##0.00',1)" type="" class="form-control" placeholder="Costo"
                                                id="costo_paquete" name="costo_paquete" min="1" required >
                                            <div class="invalid-feedback">
                                                Campo Obligatorio
                                            </div>
                                    </div>
                                </div>
                            <div>
                        <!-- Obtengo la sesión actual del usuario -->
                        {{ $message=Session::get('message') }}

                        <!-- Muestro el mensaje de validación -->
                        @include('alerts.request')
                    </div>
                                <div class="form-group" align="right">
                                    <div class="form-group">
                                        <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                        <a href="{{route('paquetes.index')}}">Volver a la lista</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </body>
    </html>
    @stop 
    @section('script')
    <script>
    function MASK(form, n, mask, format) {
        if (format == "undefined") format = false;
        if (format || NUM(n)) {
        dec = 0, point = 0;
        x = mask.indexOf(".")+1;
        if (x) { dec = mask.length - x; }

        if (dec) {
        n = NUM(n, dec)+"";
        x = n.indexOf(".")+1;
        if (x) { point = n.length - x; } else { n += "."; }
        } else {
        n = NUM(n, 0)+"";
        } 
        for (var x = point; x < dec ; x++) {
        n += "0";
        }
        x = n.length, y = mask.length, XMASK = "";
        while ( x || y ) {
        if ( x ) {
            while ( y && "#0.".indexOf(mask.charAt(y-1)) == -1 ) {
            if ( n.charAt(x-1) != "-")
                XMASK = mask.charAt(y-1) + XMASK;
            y--;
            }
            XMASK = n.charAt(x-1) + XMASK, x--;
        } else if ( y && "$0".indexOf(mask.charAt(y-1))+1 ) {
            XMASK = mask.charAt(y-1) + XMASK;
        }
        if ( y ) { y-- }
        }
    } else {
        XMASK="";
    }
    if (form) { 
        form.value = XMASK;
        if (NUM(n)<0) {
        form.style.color="#FF0000";
        } else {
        form.style.color="#000000";
        }
    }
    return XMASK;
    }

    // Convierte una cadena alfanumérica a numérica (incluyendo formulas aritméticas)
    //
    // s   = cadena a ser convertida a numérica
    // dec = numero de decimales a redondear
    //
    // La función devuelve el numero redondeado

    function NUM(s, dec) {
    for (var s = s+"", num = "", x = 0 ; x < s.length ; x++) {
        c = s.charAt(x);
        if (".-+/*".indexOf(c)+1 || c != " " && !isNaN(c)) { num+=c; }
    }
    if (isNaN(num)) { num = eval(num); }
    if (num == "")  { num=0; } else { num = parseFloat(num); }
    if (dec != undefined) {
        r=.5; if (num<0) r=-r;
        e=Math.pow(10, (dec>0) ? dec : 0 );
        return parseInt(num*e+r) / e;
    } else {
        return num;
    }
    }
    </script>

    @endsection


