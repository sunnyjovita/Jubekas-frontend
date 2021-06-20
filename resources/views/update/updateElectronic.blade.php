@extends('master')
@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web app project new/sell/add_product.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>Update product</title>

  </head>
  <body>
   @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif


              @if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('success') }}
              </div>
              @endif
    

 
<!--body-->
<section>
    <div class="container">
      <div class="user singupBx">
        <div class="formBx">
      <form action="" method="POST" enctype="multipart/form-data">
             @csrf

            <h2>Update product</h2>
            <br>
            <div>
                <input type="hidden" name="id" value="{{$electronic['id']}}">
                  <input type="hidden" name="owner" value="{{$electronic['owner']}}">
                      <input type="hidden" name="categories" value="{{$electronic['categories']}}">
                       <input type="hidden" name="phoneNumber" value="{{$electronic['phoneNumber']}}">
            <h6>Title</h6><p style="font-size: 12px">*max 75 characters</p></div>
            <input type="text" name="title" value="{{$electronic['title']}}">
             <h6>Type</h6>
             <select id="drop-down" name="type" class="browser-default custom-select">
                <option selected="{{$electronic['type']}}" >{{$electronic['type']}}</option>
                <option value="Phone/Tablet">Phone/Tablet</option>
                <option value="Laptop/PC">Laptop/PC</option>
                <option value="Appliances">Appliances</option>
                <option value="Others">Others</option>
                <!-- <option value="3">Category</option> -->
              </select>

              <h6>Brand</h6>
          <input type="text" name="brand" value="{{$electronic['brand']}}">
          <!-- <option value="3">Category</option> -->
        </select>

             <h6>Condition</h6>
             <select id="drop-down" name="condition" class="browser-default custom-select">
              <option selected="{{$electronic['condition']}}" >{{$electronic['condition']}}</option>
              <option value="1">New</option>
              <option value="2">Used</option>
              <!-- <option value="3">Category</option> -->
            </select>
            <h6>Location</h6>
            <select id="drop-down" name="location" class="browser-default custom-select">
             <option selected="{{$electronic['location']}}" >{{$electronic['location']}}</option>
             <option value="1">Jabodetabek</option>
             <option value="2">Denpasar</option>
             <option value="2">Surabaya</option>
             <!-- <option value="3">Category</option> -->
           </select>
            <h6>Description</h6>
            <textarea rows="2" cols="25" name="description" placeholder="Description">{{$electronic['description']}}</textarea>
          <div class="form-group">
            <h6>Price</h6>
            <div class="price">
  <h6>IDR (Indonesian rupiah)</h6>
  <input class="pricetag input-currency" type="text" type-currency="IDR" name="price" value="{{$electronic['price']}}">
  <!-- <input class="input-currency" type="text" type-currency="IDR" placeholder="Rp" /> -->
</div>
</div>
            @livewireScripts
            <script>
  document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
  element.addEventListener('keyup', function(e) {
  let cursorPostion = this.selectionStart;
    let value = parseInt(this.value.replace(/[^,\d]/g, ''));
    let originalLenght = this.value.length;
    if (isNaN(value)) {
      this.value = "";
    } else {    
      this.value = value.toLocaleString('id-ID', {
        currency: 'IDR',
        style: 'currency',
        minimumFractionDigits: 0
      });
      cursorPostion = this.value.length - originalLenght + cursorPostion;
      this.setSelectionRange(cursorPostion, cursorPostion);
    }
  });
});
</script>
           

                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" id="image">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
            <input type="submit" name="" value="Sell it">
          
          </form>
        </div>
      </div>
    </div>
  </section>

 


</body>
</html>

@endsection