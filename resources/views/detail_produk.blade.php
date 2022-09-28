@extends('layouts.template')
@section('content')
<style>
    .checked {
        color: orange;
    }
    body{
        background-color: #ecedee;
    }
    .card{
        border: none;
        overflow: hidden;
    }
    .thumbnail_images ul{
        list-style: none;
        justify-content: center;
        display: flex;
        align-items: center;
        margin-top: 10px;
    }
    .thumbnail_images ul li{
        margin: 5px;
        padding: 10px;
        border: 2px solid #eee;
        cursor: pointer;
        transition: all 0.5s;
    }
    .thumbnail_images ul li:hover{
        border: 2px solid #000;
    }
    .main_image{
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #eee;
        height: 400px;
        width: 100%;
        overflow: hidden;
    }
    .content p{
        font-size: 14px;
    }
    .ratings span{
        font-size: 14px;
    }
    .colors{
        margin-top: 5px;
    }
    .colors ul{
        list-style: none;
        display: flex;
        padding-left: 0px;
    }
    .colors ul li{
        height: 20px;
        width: 20px;
        display: flex;
        border-radius: 50%;
        margin-right: 10px;
        cursor: pointer;
    }
    .colors ul li:nth-child(1){
        background-color: #6c704d;
    }
    .colors ul li:nth-child(2){
        background-color: #96918b;
    }
    .colors ul li:nth-child(3){
        background-color: #68778e;
    }
    .colors ul li:nth-child(4){
        background-color: #263f55;
    }
    .colors ul li:nth-child(5){
        background-color: black;
    }
    .right-side{
        position: relative;
    }
    .input-group .form-select:focus{
        border-color: #0f3c4c;
        box-shadow: 0 0 0 0.2rem rgba(147, 147, 147, 0.8);
    }
</style>

<div class="container mt-5 mb-5">	
    <div class="card">	
        <div class="row g-0">	
            <div class="col-md-6 border-end">	
                <div class="d-flex flex-column justify-content-center">	
                    <div class="main_image">	
                        <img src="img/photo2.png" id="main_product_image" width="350">	
                    </div>	
                    <div class="thumbnail_images">	
                        <ul id="thumbnail">	
                            <li>
                                <img onclick="changeImage(this)" src="img/photo2.png" width="70">
                            </li>	
                            <li>
                                <img onclick="changeImage(this)" src="img/photo1.png" width="70">
                            </li>	
                            <li>
                                <img onclick="changeImage(this)" src="img/photo3.jpg" width="70">
                            </li>	
                            <li>
                                <img onclick="changeImage(this)" src="img/photo4.jpg" width="70">
                            </li>	
                        </ul>	
                    </div>	
                </div>	
            </div>	
            <div class="col-md-6 bg-dark text-white">	
                <div class="p-3 right-side">	
                    <div class="d-flex justify-content-between align-items-center">	
                        <h3>Judul</h3>
                    </div>	
                    <div class="mt-2 pr-3 content">	
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>	
                    </div>	
                    <h3>$430.99</h3>	
                    <div class="ratings d-flex flex-row align-items-center">	
                        <div class="d-flex flex-row">	
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>	
                    </div>	
                    <div class="mt-5">	
                        <span class="fw-bold">Color</span>	
                        <div class="colors">	
                            <ul id="marker">	
                                <li id="marker-1"></li>	
                                <li id="marker-2"></li>	
                                <li id="marker-3"></li>	
                                <li id="marker-4"></li>	
                                <li id="marker-5"></li>	
                            </ul>	
                        </div>	
                    </div>	
                    <div class="quantity">
                        <span class="fw-bold">Quantity</span>
                        <div class="input-group input-group-sm mb-3" style="width: 21.5%;">
                            <label class="input-group-text" for="inputGroupSelect01">Qty</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="buttons d-flex flex-row mt-5 gap-3">	
                        <button class="btn btn-outline-light">Buy Now</button>	
                        <button class="btn btn-light">Add to Basket</button>	
                    </div>
                </div>	
            </div>	
        </div>	
    </div> 
</div>
<script>
function changeImage(element) {
    var main_prodcut_image = document.getElementById('main_product_image');
    main_prodcut_image.src = element.src;
}
</script>
@endsection