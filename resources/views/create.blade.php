<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Crear Proyecto</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=6e0d3deefbcaae36dda366a7b3fd30d7">
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
                            <h2 class="section-heading mb-4"><span class="text-center section-heading-lower">&nbsp;CREAR PROYECTO</span></h2>
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
                                        <form id="contactForm" name="contactForm" novalidate="novalidate">
                                            <div class="form-group">
                                                <input class="form-control" type="text" id="name" placeholder="Nombre *" required="">
                                                <input class="form-control" type="text" id="description" placeholder="Descripción *" required="">
                                                <input class="form-control" type="number" id="expectedincome" placeholder="Ingreso esperado *" required="">
                                                <ul class="list-group" id="urlList">
                                                    <li class="list-group-item">
                                                        <span>Videos del Proyecto
                                                            <input class="form-control" type="url" id="url0" placeholder="Video URL *" required="">
                                                        </span>
                                                    </li>
                                                </ul>
                                                <button class="btn btn-primary" id="addurl" type="button" onClick="addUrl()">AGREGAR URL</button>
                                                <input class="form-control" type="text" id="address" placeholder="Dirección *" required="">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">ETAPA DEL PROYECTO</button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" role="presentation" onClick="setSelectedStatus(0)">IDEA</a>
                                                        <a class="dropdown-item" role="presentation" onClick="setSelectedStatus(1)">IMPLEMENTADO</a>
                                                        <a class="dropdown-item" role="presentation" onClick="setSelectedStatus(2)">EN CRECIMIENTO</a>
                                                        <a class="dropdown-item" role="presentation" onClick="setSelectedStatus(3)">CONSOLIDADO</a>
                                                    </div>
                                                </div>
                                                <ul class="list-group" id="emailList">
                                                    <li class="list-group-item"><span>Fundadores<input class="form-control" type="url" id="email0" placeholder="Correo *" required=""></span></li>
                                                </ul>
                                                <button class="btn btn-primary" id="addemail" type="button" onClick="addEmail()">AGREGAR CORREO</button>
                                                <input class="form-control" type="text" id="sriid" placeholder="RUC o RISE *" required="">
                                                <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="button" onClick="submitProject()" style="margin-top: 30px;">CREAR CUENTA</button></div>
                                        </form>
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
        let urlIndex = 0;
        let emailIndex = 0;
        let selectedStatus = -1;
        function addUrl(){
            urlIndex++;
            $("#urlList").append('<li class="list-group-item"><span><input class="form-control" type="url" id="url'+urlIndex+'" placeholder="Video URL *" required=""></span></li>');
        }
        function addEmail(){
            emailIndex++;
            $("#emailList").append('<li class="list-group-item"><span><input class="form-control" type="url" id="email'+emailIndex+'" placeholder="Correo *" required=""></span></li>');
        }
        function submitProject(){
            let urlList = [$("#url0").val()];
            let emailList = [$("#email0").val()];
            for(let i=0; i<urlIndex; i++){
                urlList.push($("#url"+i).val());
            }
            for(let i=0; i<emailIndex; i++){
                emailList.push($("#email"+i).val());
            }
            let data = {
                "name": $("#name").val(),
                "description": $("#description").val(),
                "expectedIncome": $("#expectedincome").val(),
                "videoUrl": urlList,
                "address": $("#address").val(),
                "projectPhase": selectedStatus,
                "founders": emailList,
                "sriId": $("#sriid").val()
            }
            if(data.name!=="" && data.description!=="" && data.expectedincome!=="" && data.videoUrl[0]!=="" && data.projectphase!==-1 && data.founders[0]!=="" && data.sriid!=="" && data.address!==""){
                $("#spinnerModal").modal('show');
                $.post({
                    type: "POST",
                    url: "http://localhost:8000/api/create-project",
                    data: data
                }, function(response){
                    response = JSON.parse(response.toString());
                    console.log(response);
                    if(response.code==0){
                        $("#alertTitle").text("Éxito");
                        $("#alertBody").text(response.message);
                        $("#alertModal").modal('show');
                        $("#spinnerModal").modal('hide');
                        //sessionStorage.setItem('user', JSON.stringify(response.body));
                        //window.location.replace("http://localhost:8000/home");
                    }else{
                        $("#alertTitle").text("Error");
                        $("#alertBody").text(response.message);
                        $("#alertModal").modal('show');
                        $("#spinnerModal").modal('hide');
                    }
                }).fail(function() {
                    $("#alertTitle").text("Error");
                    $("#alertBody").text("Hubo un error en la conexión.");
                    $("#alertModal").modal('show');
                    $("#spinnerModal").modal('hide');
                });
            }else{
                $("#alertTitle").text("Error");
                $("#alertBody").text("Debe llenar todos los campos");
                $("#alertModal").modal('show');
                $("#spinnerModal").modal('hide');
            }
        }
        function setSelectedStatus(value){
            selectedStatus = value;
        }
    </script>
</body>

</html>