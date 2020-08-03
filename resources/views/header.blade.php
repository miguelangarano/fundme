<nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
    <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">FOUNDME</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav mx-auto">
                <li id="projects" class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/proyectos') }}">VER PROYECTOS</a></li>
                <li id="createproject" class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/crear') }}">CREA UN PROYECTO</a></li>
                <li id="register" class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/registro') }}">REGÍSTRATE</a></li>
                <li id="login" class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/ingreso') }}">INGRESA</a></li>
                <li id="account" class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/cuenta') }}">CUENTA</a></li>
                <li id="signout" class="nav-item" role="presentation"><a class="nav-link" onClick="signOut()">CERRAR SESIÓN</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="signOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Listo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Sesión cerrada con éxito</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>
            </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let user = sessionStorage.getItem('user');
    if(user!==undefined && user!==null){
        $("#register").hide();
        $("#login").hide();
    }else{
        $("#account").hide();
        $("#signout").hide();
        $("#createproject").hide();
    }
    function signOut(){
        let user = sessionStorage.getItem('user');
        if(user!==undefined && user!==null){
            $("#register").show();
            $("#login").show();
            $("#createproject").hide();
            $("#account").hide();
            $("#signout").hide();
            sessionStorage.clear()
            window.location.replace("http://localhost:8000/home");
            $("#signOutModal").modal("show");
        }
    }
</script>