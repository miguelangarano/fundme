<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Products - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=a3874c079d9898c366d121f0967a0fca">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=545e0db46bd559c76b740dfa81d31323">

    <style>
    .center {
    margin: 0;
    position: absolute;
    top: 40%;
    left: 78%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    </style>
</head>

<body style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('assets/img/bg.jpg?h=1a9398b8c353a8cdf63d59f5136160b1');">
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3">elige tu favorito</span><span class="site-heading-lower">PROYECTOS</span></h1>
    @include('header')
    <section class="page-section">
        <div class="container">
            @if(session('status'))
                <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Exitoso: </strong> {{session('status')}}
                </div>
            @endif
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex mr-auto bg-faded p-5 rounded">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper"></span><span class="section-heading-lower">cafetería Coffees &amp; Teas</span></h2>
                    </div>
                    <div class="center">
                    <a href="{{url('/paypal/pay')}}" class="btn btn-primary btn-xl text-uppercase" role="button" style="margin-top: 50px;">PAYPAL</a>
                </div>
                </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/products-01.jpg?h=e08020951d9f0872748127a17fd95e90">
                <div class="bg-faded p-5 rounded">
                    <p class="mb-0">Nos enorgullecemos de nuestro trabajo, y se nota. Cada vez que nos solicita una bebida, le garantizamos que será una experiencia que vale la pena tener. Ya sea nuestro mundialmente famoso capuchino venezolano, un refrescante té de
                        hierbas helado o algo tan simple como una taza de café negro de especialidad, volverá por más.<br><br></p>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex ml-auto bg-faded p-5 rounded">
                        <h2 class="section-heading mb-0"><span class="section-heading-lower">PANADERÍA Bakeky<br></span></h2>
                    </div>
                </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/products-02.jpg?h=6645de8e6e1220a00c1397b89848c941">
                <div class="bg-faded p-5 rounded">
                    <p class="mb-0">Nuestro menú estacional ofrece deliciosos refrigerios, productos horneados e incluso comidas completas perfectas para el desayuno o el almuerzo. Siempre que sea posible, obtenemos nuestros ingredientes de granjas locales y orgánicas,
                        junto con proveedores premium de productos especializados.<br><br></p>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex mx-auto bg-faded p-5 rounded">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper">producto de exportación</span><span class="section-heading-lower">MEZCLAS DE ESPECIALIDAD&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; "A GRANEL"<br></span></h2>
                    </div>
                </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/products-03.jpg?h=34416dc82645c271192a15e593c35312">
                <div class="bg-faded p-5 rounded">
                    <p class="mb-0">Viajar por el mundo en busca de café de la mejor calidad es algo de lo que enorgullecerse. Cuando nos visite, siempre encontrará nuevas mezclas de todo el mundo, principalmente de regiones de América Central y del Sur. Vendemos nuestras
                        mezclas en pequeñas y grandes cantidades a granel.&nbsp;<br><br></p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small"></p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=eb8cf3b765438a48682c36c340975333"></script>
    <script>
        let data = {
            "ex": "hola"
        };
        function getProjects(){
            $.post({
                type: "POST",
                url: "http://localhost:8000/api/get-projects",
                data: data
            }, function(response){
                response = JSON.parse(response.toString());
                console.log(response);
                
            }).fail(function(error) {
                console.log(error);
            });
        }
        getProjects();
    </script>
</body>

</html>