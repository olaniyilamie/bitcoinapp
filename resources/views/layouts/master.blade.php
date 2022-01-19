<!DOCTYPE html>
    <html>
        <head>
            <meta charset ="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{{ config('app.name', 'Laravel') }}</title>
            <link rel="stylesheet" href="{{ asset('bootstrap.css') }}">
            <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('appcss.css') }}">
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-light p-0 nav-bg ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{url('biglogo.png')}}" class="img"><span>DasCoins</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse md-d-flex justify-content-between" id="navbarSupportedContent">
                        <div class="d-flex justify-content-start">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link navfontcolor" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                Crypto 
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('show_bit')}}">Bitcoins</a></li>
                                    <li><a class="dropdown-item" href="">USDT</a></li>
                                    <li><a class="dropdown-item" href="#">Perfect Money</a></li>
                                    <li><a class="dropdown-item" href="{{route('show_eth')}}">Ethereum </a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                Giftcard
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('show_giftcards')}}">All cards</a></li>
                                    <li><a class="dropdown-item" href="#">Apple</a></li>
                                    <li><a class="dropdown-item" href="#">Itunes</a></li>
                                    <li><a class="dropdown-item" href="#">Ebay, Amex, Macy, Vanilla</a></li>
                                    <li><a class="dropdown-item" href="#">Googleplay</a></li>
                                    <li><a class="dropdown-item" href="#">Sephora/NordStrom/Nike</a></li>
                                    <li><a class="dropdown-item" href="#">Steam</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                Trade History
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Ebay, Amex, Macy, Vanilla</a></li>
                                    <li><a class="dropdown-item" href="#">Googleplay</a></li>
                                    <li><a class="dropdown-item" href="#">Sephora/NordStrom/Nike</a></li>
                                    <li><a class="dropdown-item" href="#">Steam</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                Contact Us
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-envelope-open mx-2"></i><span>info@dascoin.com</span></a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="fas fa-phone-alt mx-2"></i><span>+2347000001234<span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                        </ul>
                        <div class="border rounded border-dark p-0">
                            <form class="d-flex">
                                <input class="form-control me-2 border-0" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        </div>
                        <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"  data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-sign-in-alt"></i> Login/Sign Up  
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="" data-toggle="modal" data-target="#signup">Sign up</a></li>
                                    <li><a class="dropdown-item" href="{" data-toggle="modal" data-target="#login">login</a></li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                @yield('content')
                <footer class="row d-flex justify-content-between py-3" id="footer">
                    <div class="col-6 text-center">
                        <img src="{{url('biglogo.png')}}" class="img"><h2 class="d-inline-block">DasCoins</h2>
                        <p>We are a Digital Currency Exchange Company committed in providing seamless and easy trading experience
                         with fast payout. We offer best Market rates and a nice user interface for comfortability.</p>
                         <p class="font-weight-bolder">
                            <a href="" target="_blank" class="links"><i class="fab fa-facebook-square"></i></a>
                            <a href="" target="_blank" class="links"><i class="fab fa-twitter-square"></i></a>
                            <a href="" target="_blank" class="links"><i class="fab fa-instagram"></i></a>
                         </p>
                    </div>
                    <div class="col-3">
                        <h3>Quick Links</h3>
                        <ul class="ullink">
                            <li><a href="" class="ullink">Home</a></li>
                            <li><a href="" class="ullink">Bitcoins</a></li>
                            <li><a href="" class="ullink">Ethereum</a></li>
                            <li><a href="" class="ullink">Apple</a></li>
                            <li><a href="" class="ullink">Itunes</a></li>
                            <li><a href="" class="ullink">Blog</a></li>
                            <li><a href="" class="ullink">Login </a></li>
                            <li><a href="" class="ullink">Sign up </a></li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h3 class="pb-4">Get in Touch</h3>
                        <p><i class="fas fa-phone"></i> +234901-999-888-3242</p>
                        <p><i class="fas fa-envelope-open-text"></i> dascoin@bitcoin.com</p>
                        <p><i class="fab fa-whatsapp"> <a href="" class="text-light">Send a message</a></i></p>
                    </div>
                    <hr>
                </footer>
            </div>


  <!-- Login Modal -->
  <div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body card">
                <div class="row d-flex justify-content-around my-5">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-12 p-0">
                                <p class="font-weight-bold py-2 text-center rounded"> DASCOIN <img src="{{url('logo.png')}}" class="img-fluid"> </p>
                            </div>
                            <div class="col-12 py-2">
                                <label class="text-right small font-weight-bold" for="email-address">Email or Username</label>
                                <input id="username" type="text" class="form-control rounded" required placeholder="Enter your email address or username">        
                            </div>
                            <div class="col-12 py-0 my-0">
                                <label class="text-right my-0 small font-weight-bold" for="email-address">Password</label>
                            </div>
                            <div class="col-12 py-2 input-group">
                                <input id="pwd" type="password" class="form-control rounded" required placeholder="Enter your passcode">
                                <span class="input-group-text" id="changeIcon"><i class="fas fa-eye btn btn-sm" id="showpwd"></i></span>
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-dim btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold">LOGIN</button>
                                <small> New to DasCoin ?</small><a class="float-right small">Create Account</a>
                            </div>
                            <div class="col-12 text-center">
                                <small class="font-weight-bold text-muted">--- OR ---</small>
                            </div>
                            <div class="col-12 text-center">
                                <a href=""><span class="px-3 giftlink font-weight-bold">Facebook</span></i></a> 
                                <a href=""><span class="px-3 giftlink font-weight-bold">Google</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Login Modal -->
  <div class="modal fade " id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body card">
                <div class="row d-flex justify-content-around my-5">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-12 p-0 mt-0">
                                <p class="font-weight-bold py-2 text-center rounded"> DASCOIN <img src="{{url('logo.png')}}" class="img-fluid"> </p>
                            </div>
                            <div class="col-12 py-2">
                                <label class="text-right small font-weight-bold" for="email-address">PhoneNumber</label>
                                <input id="number" type="text" class="form-control rounded" required placeholder="Phone number with country code e.g +2347045554345">        
                            </div>
                            <div class="col-12 py-2">
                                <label class="text-right small font-weight-bold" for="email-address">Username</label>
                                <input id="email" type="text" class="form-control rounded" required placeholder="Username">        
                            </div>
                            <div class="col-12 py-2">
                                <label class="text-right small font-weight-bold" for="email-address">Email</label>
                                <input id="username" type="email" class="form-control rounded" required placeholder="Email">        
                            </div>
                            <div class="col-12 py-0 my-0">
                                <label class="text-right my-0 small font-weight-bold" for="email-address">Password</label>
                            </div>
                            <div class="col-12 py-2">
                                <input id="pwd" type="password" class="form-control rounded" required placeholder="Password">
                            </div>
                            <div class="col-12 py-2">
                                <input id="pwd" type="password" class="form-control rounded" required placeholder="Confirm Password">
                            </div>
                            <div class="col-12 mb-2">
                                <button class="btn btn-dim btn-block btn-lg sellnowBtn py-2 mt-0 font-weight-bold">SIGN UP</button>
                                <small> Already have an account?</small><a href="{{route('login')}}" class="float-right small">Login</a>
                            </div>
                            <div class="col-12 text-center">
                                <small class="font-weight-bold text-muted">--- OR ---</small>
                            </div>
                            <div class="col-12 text-center">
                                <a href=""><span class="px-3 giftlink font-weight-bold">Facebook</span></i></a> 
                                <a href=""><span class="px-3 giftlink font-weight-bold">Google</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
        </body>
    </html>