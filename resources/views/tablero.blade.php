@extends('layouts.app')
@section('titulo', 'Tablero')

@section('contenido')

    <div class="container-fluid e">
        <div class="row">
            <div class="col-3">
                <h1 class="nombre">Nombre Tablero</h1>
            </div>
            <div class="col-8 text-end">
                <button type="button" class="b" title="@colaborador"><i class="bi bi-person-lines-fill"></i></button>
                <button type="button" class="b" title="@colaborador"><i class="bi bi-person-lines-fill"></i></button>
                <button type="button" class="b" title="@colaborador"><i class="bi bi-person-lines-fill"></i></button>
            </div>
            <div class="col-1 text-end">
                <button type="button" class="btn btn-outline-light" style="border: transparent;">
                    <i class="bi bi-three-dots-vertical" style="font-size: 20px;"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <div class="col-3">
                <!------->
                <div class="tablero">
                    <h1 class="lista">Titulo lista</h1>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-dark mLaunch w-100" data-bs-toggle="modal"
                        data-bs-target="#EditTarjeta">
                        Añadir Tarjeta
                    </button>
                </div>
            <!------->
            </div>
            <div class="col-3">
             <div class="tablero">
                    <h1 class="lista">Titulo lista</h1>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-dark mLaunch w-100" data-bs-toggle="modal"
                        data-bs-target="#EditTarjeta">
                        Añadir Tarjeta
                    </button>
                </div>
            </div>
            <div class="col-3">
 <div class="tablero">
                    <h1 class="lista">Titulo lista</h1>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <button type="button" class="btn btn-dark mLaunch w-100" data-bs-toggle="modal"
                        data-bs-target="#EditTarjeta">
                        Añadir Tarjeta
                    </button>
                </div>
            </div>
            <div class="col-3">
                 <div class="tablero">
                    <h1 class="lista">Titulo lista</h1>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <!------->
                    <button type="button" class="btn btn-outline-secondary elemento">
                        <span class="placeholder col-12"></span>
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="placeholder col-5"></span>
                            </h5>
                            <p class="card-text">
                                <span class="placeholder col-1"></span>
                                <span class="placeholder col-8"></span>
                            </p>
                        </div>
                    </button>
                    <button type="button" class="btn btn-dark mLaunch w-100" data-bs-toggle="modal"
                        data-bs-target="#EditTarjeta">
                        Añadir Tarjeta
                    </button>
                </div>
        </div>
            <button type="button" class="btn-flotante-circular" title="Nuevo Tablero">
                <i class="bi bi-plus-lg"></i>
            </button>


            <div class="modal fade" id="EditTarjeta" tabindex="-1" aria-labelledby="EditTarjetalbl" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content tarjeta">
                        <div class="modal-header tarjeta">
                            <h1 class="modal-title fs-5 lista" id="EditTarjetalbl">Titulo tarjeta</h1>

                        </div>
                        <div class="modal-body tarjeta">
                            <div class="container-fluid tarjeta"></div>
                            <div class="row">
                                <div class="col-8">
                                    <span class="placeholder col-10"></span> <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span> <span class="placeholder col-8"></span>
                                </div>
                                <div class="col-4">
                                    <span class="placeholder col-10"></span> <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span> <span class="placeholder col-8"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer tarjeta">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
            @if(session('login_success_name'))
    <script>
        // Esto crea la ventana emergente en el navegador usando el nombre real de la BD
        alert("¡Conexión Exitosa con la Base de Datos!\nUsuario logueado: {{ session('login_success_name') }}");
    </script>
@endif

@endsection

        @push('styles')
            <style>
                body {
                    /* background-image: url("https://i.pinimg.com/736x/41/96/be/4196bead6752ff583cb54ce6f7387b8b.jpg"); */
                    background-size: cover;
                    background-position: center;
                    background-attachment: fixed;
                    position: relative;
                }

.b {
   

                    background: $colorPrincipal;
                    border: 3px solid rgba(255,255,255,0.5);
                    color: rgb(0, 0, 0);

                    height: 50px;
                    width: 50px;         
                    border-radius: 50%;   
                    
                    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                
                
                
                    justify-content: center;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    
                    i {
                        font-size: 24px;    
                        margin: 0;          
                    }
                    span {
                        display: none;
                    }
                    
                    &::before {
                        content: '';
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        border-radius: 50%;
                        background: $colorPrincipal;
                        opacity: 0.5;
                        z-index: 1;
                        transition: all 0.3s;
                    }
                    
                    &::after {
                        content: '';
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        border-radius: 50%;
                        background: $colorPrincipal;
                        opacity: 0.3;
                        z-index: 0;
                        transition: all 0.3s;
                    }
                    
                    &:hover {
                        transform: scale(1.1);
                        
                        &::before {
                            transform: scale(1.3);
                            opacity: 0.3;
                        }
                        
                        &::after {
                            transform: scale(1.6);
                            opacity: 0.1;
                        }
                    }
                    
                    &:active {
                        transform: scale(0.95);
                    }
}
                


                .e {
                    background: linear-gradient(to bottom, #1a1a1a, transparent);
                    padding: 10px 0;
                }

                .tablero {
                    background-color: #1a1a1a;
                    border-radius: 12px;
                    padding: 15px;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
                    margin-top: 20px;
                    margin-bottom: 10px;
                    min-height: 100px;
                }

                .elemento {
                    background-color: #2d2d2d;
                    border-radius: 8px;
                    color: white;
                    padding: 12px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                    margin-top: 15px;
                    width: 100%;
                    border: 1px solid #404040;
                    text-align: left;
                }

                .lista {
                    font-size: 24px;
                    color: white;
                    margin-bottom: 15px;
                    font-weight: 600;
                }

                .nombre {
                    font-size: 25px;
                    color: white;
                    margin-left: 20px;
                }


                .placeholder {
                    background-color: #4a4a4a;
                    border-radius: 4px;
                }


                .card {
                    background-color: transparent;
                    border: none;
                }

                .card-body {
                    color: white;
                    padding: 0;
                }

                .card-title {
                    color: #e0e0e0;
                    font-weight: 500;
                }

                .mLaunch {
                    background-color: transparent;
                    border-color: transparent;
                    text-align: center;
                    padding: 5px;
                    margin-top: 10px;
                    margin-bottom: 10px
                }

                .tarjeta {
                    background-color: #1a1a1a;
                    border-color: transparent;
                    padding: 10px;


                }
            </style>
        @endpush