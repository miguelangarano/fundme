<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=3f1aa6c6e324632c781e16283356b528">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=545e0db46bd559c76b740dfa81d31323">
</head>

<body style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('/assets/img/bg.jpg?h=1a9398b8c353a8cdf63d59f5136160b1');">
    <h1 class="text-center text-white d-none d-lg-block site-heading"></h1>
    @include('header')
    <section class="page-section about-heading">
        <div class="container" style="padding-top: 100px;">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 offset-sm-7 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4"><span class="text-center section-heading-lower">&nbsp;registro</span></h2>
                            <div class="card text-center">
                                <div class="card-body text-center">
                                    <div class="btn-toolbar">
                                        <div class="btn-group" role="group"></div>
                                        <div class="btn-group" role="group"></div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                    </div>
                                    <div class="col-lg-12">
                                    <div class="form-group"><input class="form-control" type="text" id="name" placeholder="Nombre *" required=""><input class="form-control" type="email" id="email" placeholder="Correo *" required=""><input class="form-control" type="password"
                                                    id="password" placeholder="Contraseña *" required=""><input class="form-control" id="birthday" type="date" placeholder="Fecha de nacimiento *" required=""><input class="form-control" type="text" id="phone" placeholder="Teléfono *"
                                                    required=""><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="button" onClick="submitRegister()" style="margin-top: 30px;">CREAR CUENTA</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small"></p>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertTitle">Texto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 id="alertBody">Texto</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="spinnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="text-center">
                <div class="spinner-border text-info" role="status">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/script.min.js?h=eb8cf3b765438a48682c36c340975333"></script>
    <script>
        function submitRegister(){
            
            let data = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
                'birthday': new Date($('#birthday').val()).getTime() / 1000,
                'phone': $('#phone').val(),
            }
            if(data.name!=="" && data.email!=="" && data.password!=="" && data.birthday!=="" && data.phone!==""){
                $("#spinnerModal").modal('show');
                $.post({
                    type: "POST",
                    url: "http://localhost:8000/api/create-user",
                    data: data,
                }, function(response){
                    response = JSON.parse(response.toString());
                    if(response.code==0){
                        $("#alertTitle").text("Éxito");
                        $("#alertBody").text(response.message);
                        $("#alertModal").modal('show');
                        $("#spinnerModal").modal('hide');
                        window.location.replace("http://localhost:8000/login");
                    }else{
                        $("#alertTitle").text("Error");
                        $("#alertBody").text(response.message);
                        $("#alertModal").modal('show');
                        $("#spinnerModal").modal('hide');
                    }
                });
            }else{
                $("#alertTitle").text("Error");
                $("#alertBody").text("Debe llenar todos los campos");
                $("#alertModal").modal('show');
                $("#spinnerModal").modal('hide');
            }
        }
    </script>
</body>

</html>