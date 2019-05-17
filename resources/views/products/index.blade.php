@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-4">
            <div class="form-group row">
                <div class="col-sm-4">
                <label class="text-light">Sort By :</label>
                </div>
            <div class="col-sm-9">
                <select id="order_field" class="form-control">
                    <option value="" disabled selected>Urutkan</option>
                    <option value="best_seller">Best seller</option>
                    <option value="terbaik">Terbaik (Berdasarkan Rating)</option>
                    <option value="termurah">Termurah</option>
                    <option value="termahal">Termahal</option>
                    <option value="terbaru">Terbaru</option>
                </select></div>
            </div>
        </div>
    </div> 
    <div id="product-list">
     @foreach($products as $idx => $product)
     @if ($idx == 0 || $idx % 4 == 0)
    <div class="row mt-4">
        @endif

        <div class="col">
            <div class="card">
                <br>
                <?php
                $product=App\Models\Product::find($product->id)
                ?>
                <div class="text-center">
                    <a href="{{ route('products.show', ['id' => $product['id']]) }}"> 
                    <image src="{{ asset('/images/'.$product->images()->get()[0]->image_src) }}" class="img-thumbnail img-fluid" style="width: 150px; height: 200px;"></image>
                </a>
                </div>
                    <div class="card-body text-center"> 
                        <h5 class="card-title">
                            <a class="nav-link text-dark" href="{{ route('products.show', ['id' => $product['id']]) }}">
                                {{ $product->name }}
                            </a>
                            <hr>
                        </h5>
                        <p class="card-text">
                           <a class="nav-link text-dark font-weight-bold" href="{{ route('products.show', ['id' => $product['id']]) }}">
                           $ {{ $product->price }}
                       </a>
                        </p>
                    </a>
                        <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-dark btn-sm "><i class="fa fa-baby-carriage" aria-hidden="true"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
            @if ($idx > 0 && $idx % 4 == 3)
        </div>
        @endif
    @endforeach
</div>
</div>
<!-- <br>
<footer class="py-lg-5 py-3" style="background-color:#0F0F0F">
        <div class="container-fluid px-lg-5 px-1">
            <div class="row footer-top-w3layouts">
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title text-light">
                        <h3>About Us</h3>
                    </div>
                    <div class="footer-text" style="color:#505050">
                        <p>Curabitur non nulla sit amet nislinit tempus convallis quis ac lectus. lac inia eget consectetur sed, convallis at
                            tellus. Nulla porttitor accumsana tincidunt.</p>
                        <ul class="footer-social text-left mt-lg-4 mt-3">

                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-google-plus-g"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fas fa-rss"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-vk"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title text-light">
                        <h3>Get in touch</h3>
                    </div>
                    <div class="contact-info">
                        <h4 style="color:#E86012">Location :</h4>
                        <p style="color:#505050">Bandung, Indonesia.</p>
                        <div class="phone">
                            <h4 style="color:#E86012">Contact :</h4>
                            <p style="color:#505050">Phone : +6285321383506</p>
                            <p style="color:#505050">Email :
                                <a href="mailtrap.io@example.com" style="color:#505050">yogiilyas08@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid-w3ls">
                    <div class="footer-title text-light">
                        <h3>Quick Links</h3>
                    </div>
                    <ul class="links" style="color:#505050">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li>
                            <a href="shop.html">Shop</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title text-light">
                        <h3>Sign up for your offers</h3>
                    </div>
                    <div class="input-group" style="color:#505050">
                        <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                            <input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
                            <button class="btn btn-secondary btn-sm" type="submit">
                                <i class="far fa-envelope" aria-hidden="true"></i>
                            </button>
                            <div class="clearfix"> </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright-mt-4">
                <p class="copy-right text-center ">&copy; 2019 Books. All Rights Reserved | Design by
                    <a href="" style="color:#E86012"> Yogiilyas </a>
                </p>
            </div>
        </div>
    </footer> -->

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#order_field').change(function(){
            // window.location.href = '/?order_by=' + $(this).val();
            $.ajax({
                type: 'GET', 
                url: '/products',
                data: {
                    order_by: $(this).val(),
                },
                dataType: 'json',
                success: function(data) {
                    var products = '';
                    $.each(data, function(idx, product) {
                        if(idx == 0 || idx % 4 == 0) {
                            products += '<div class="row mt-4">';
                        }
                        products += '<div class="col">' +
                        '<div class="card">' +
                        '<br>' +
                        '<div class="text-center">' +
                        '<img src="/images/' + product.image_src + '" class="img-thumbnail img-fluid" style="width: 150px; height: 200px;" alt="">' +
                        '<div class="card-body">' +
                        '<h5 class="card-title">' +
                        '<a class="nav-link text-dark" href="/products/' + product.id + '">' +
                        product.name +
                        '</a>' +
                        '<hr>' +
                        '</h5>' +
                        '<p class="card-text">' +
                        product.price +
                        '</p>' +
                        '<a href="/card/add/' + product.id + '" class="btn btn-success">Buy</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                        if(idx > 0 && idx % 4 == 3) {
                            products += '</div>';
                        }
                    });
                    // update element
                    $('#product-list').html(products);
                },
                error: function(data) {
                    alert('Unable to handle request');
                }
            });
        });
    });
</script>
@endsection
