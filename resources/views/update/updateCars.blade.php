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
          <!-- <form> -->
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Update product</h2>
            <br>

            <div class="form-group">
                <input type="hidden" name="id" value="{{$cars['id']}}">
                  <input type="hidden" name="owner" value="{{$cars['owner']}}">
                      <input type="hidden" name="categories" value="{{$cars['categories']}}">
                       <input type="hidden" name="phoneNumber" value="{{$cars['phoneNumber']}}">
            <h6>Title</h6><p style="font-size: 12px">*max 75 characters</p>
            <input type="text" name="title" value="{{$cars['title']}}">
             </div>

             <div class="form-group">
            <h6 style="margin-bottom: 0">Brand</h6>
            <select id="drop-down" name="brand" class="browser-default custom-select">        
        <option selected="{{$cars['brand']}}">{{$cars['brand']}}</option>
        <option value="Toyota">Toyota</option>
        <option value="Honda">Honda</option>
        <option value="Suzuki">Suzuki</option>
        <option value="Mitsubishi">Mitsubishi</option>
        <option value="Daihatsu">Daihatsu</option>
        <option value="Nissan">Nissan</option>
        <!-- <option value="3">Category</option> -->
      </select>
    </div>

      <div class="form-group">
      <h6>Year</h6>
             <select id="drop-down" name="year" class="browser-default custom-select">
              <option selected="{{$cars['year']}}">{{$cars['year']}}</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
              <option value="2016">2016</option>
              <option value="2015">2015</option>
              <option value="&lt; 2014">&lt; 2014</option>
              <!-- <option value="3">Category</option> -->
            </select>
          </div>

            <div class="form-group">
             <h6>Condition</h6>
             <select id="drop-down" name="condition" class="browser-default custom-select">
              <option selected="{{$cars['condition']}}" >{{$cars['condition']}}</option>
              <option value="New">New</option>
              <option value="Used">Used</option>
              <!-- <option value="3">Category</option> -->
            </select>
          </div>
                <!-- <br><br> -->
             <!-- <h6>Title</h6> -->
             <div class="form-group">
             <h6>Distance</h6>
             <select id="drop-down" name="distance" class="browser-default custom-select">
              <option selected="{{$cars['distance']}}" >{{$cars['distance']}}</option>
              <option value="&lt; 5000 Km">&lt; 5000 Km </option>
              <option value="5000 Km - 10.000 Km">5000 Km - 10.000 Km</option>
              <option value="12.000 Km - 25.000 Km">12.000 Km - 25.000 Km</option>
              <option value="12.000 Km - 25.000 Km">12.000 Km - 25.000 Km</option>
              <option value="&gt; 25.000 Km">&gt; 25.000 Km</option>
              <!-- <option value="3">Category</option> -->
            </select>
          </div>


            <div class="form-group">
            <h6>Location</h6>
            <select id="drop-down" name="location" class="browser-default custom-select">
             <option selected="{{$cars['location']}}" >{{$cars['location']}}</option>
             <option value="Jabodetabek">Jabodetabek</option>
             <option value="Denpasar">Denpasar</option>
             <option value="Surabaya">Surabaya</option>
             <!-- <option value="3">Category</option> -->
           </select>
         </div>

         <div class="form-group">
            <h6>Description</h6>
            <textarea rows="2" cols="25" name="description">{{$cars['description']}}</textarea>
          </div>


            <div class="form-group">
            <h6>Price</h6>
            <div class="price">
  <h6>IDR (Indonesian rupiah)</h6>
  <input class="pricetag input-currency" type="text" type-currency="IDR" name="price" value="{{$cars['price']}}">
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
                <input type="file" name="image" class="form-control" value="{{ asset('storage/'.$cars['image']) }}">
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