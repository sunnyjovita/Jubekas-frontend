@extends('master')
@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web app project new/sell/add_product_property.css">
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

            <h2>Update property</h2>
            <br>
            <div>
              <input type="hidden" name="id" value="{{$property['id']}}">
                  <input type="hidden" name="owner" value="{{$property['owner']}}">
                      <input type="hidden" name="categories" value="{{$property['categories']}}">
                        <input type="hidden" name="phoneNumber" value="{{$property['phoneNumber']}}">
            <h6>Title</h6><p style="font-size: 12px">*max 75 characters</p></div>
            <input type="text" name="title" value="{{$property['title']}}">
             <h6>Type</h6>
             <select id="drop-down" name="type" class="browser-default custom-select">
                <option selected="{{$property['type']}}">{{$property['type']}}</option>
                <option value="Lot">Lot</option>
                <option value="House">House</option>
                <option value="Apartment">Apartment</option>
                <option value="Villa">Villa</option>
                <option value="Others">Others</option>
              </select>
              <h6>Land Size</h6>
            <input class="size" type="text" name="landSize" value="{{$property['landSize']}}">
            <h6>Building Size</h6>
            <input class="size" type="text" name="buildingSize" value="{{$property['buildingSize']}}">
            <h6>Addres</h6>
            <input type="text" name="address" placeholder="Address" value="{{$property['address']}}">
            <h6>Bedrooms</h6>
            <input type="text" name="bedrooms" placeholder="Bedrooms" value="{{$property['bedrooms']}}">
            <h6>Bathrooms</h6>
            <input type="text" name="bathrooms" placeholder="Bathrooms" value="{{$property['bathrooms']}}">
            <h6>Year</h6>
            <input type="text" name="year" placeholder="Year" value="{{$property['year']}}">
            <h6>Certificate</h6>
            <select id="drop-down" name="certificate" class="browser-default custom-select">
             <option selected="{{$property['certificate']}}" >{{$property['certificate']}}</option>
             <option value="Sertifikat Hak Milik (SHM)">Sertifikat Hak Milik (SHM)</option>
             <option value="Sertifikat Hak Guna Bangunan (SHGB)">Sertifikat Hak Guna Bangunan (SHGB)</option>
             <option value="Sertifikat Hak Milik Satuan Rumah Susun (SHMSRS)">Sertifikat Hak Milik Satuan Rumah Susun (SHMSRS)
            </option>
            <option value="Girik (Tanah Adat)">Girik (Tanah Adat)</option>
            <option value="Akta Jual Beli (AJB)">Akta Jual Beli (AJB)</option>
             <!-- <option value="3">Category</option> -->
           </select>
            <h6>Location</h6>
            <select id="drop-down" name="location" class="browser-default custom-select">
             <option selected="{{$property['location']}}" >{{$property['location']}}</option>
             <option value="Jabodetabek">Jabodetabek</option>
             <option value="Denpasar">Denpasar</option>
             <option value="Surabaya">Surabaya</option>
             <!-- <option value="3">Category</option> -->
           </select>
            <h6>Description</h6>
            <textarea rows="2" cols="25" name="description">{{$property['description']}}</textarea>

            <div class="form-group">
            <h6>Price</h6>
            <div class="price">
  <h6>IDR (Indonesian rupiah)</h6>
  <input class="pricetag input-currency" type="text" type-currency="IDR" name="price" value="{{$property['price']}}">
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
                <input style="padding-bottom: 30px" type="file" name="image" class="form-control" placeholder="image" value="{{ asset('storage/'.$property['image']) }}">
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