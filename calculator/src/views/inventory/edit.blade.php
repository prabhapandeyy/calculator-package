 
<script src="/js/jquery.min.js"></script>
<script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/ckfinder/ckfinder.js') }}"></script>

    <script>
         currencySelect($('#currency').val());

var currencytype = 'euroFormat';

function currencySelect(val) {
   
    if(val=='INR'){
        $('.euroFormat').addClass('inrFormat');
        $('.euroFormat').removeClass('euroFormat');
        currencytype = 'inrFormat';
    }else{
        $('.inrFormat').addClass('euroFormat');
        $('.inrFormat').removeClass('inrFormat');
        currencytype = 'euroFormat';
    }
}

$.validator.addMethod("euroFormat", function(value, element) {
            return this.optional(element) || /^(\d+|\d{1,3}(.\d{3})*)(\,\d{1,2})?$/.test(value);
        }, "Please enter a valid European currency format.");

        $.validator.addMethod("inrFormat", function(value, element) {
            return this.optional(element) || /^(\d+|\d{1,3}(,\d{3})*)(\.\d{1,2})?$/.test(value);
        }, "Please enter a valid Indian currency format.");

        $('#inventoryform').validate();
        </script>
 

 
    <header class="title">
        <h1>{{ __('Create Inventory') }} </h1>
        <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-primary">
            {{ __('Back') }}
        </a>
    </header>



    <div class="grid">
     
        <div class="grid-col">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @elseif ($message = Session::get('success'))
                <div class="alert alert-success text-capitalize">
                    {{ $message }}
                </div>
            @endif



            <form action="{{url('inventory/update',$inventory->id)}}" method="post">
                @csrf
            <div class="formwrap mb-4">
                <div class="panel">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class = "form-label">Name:</label>                           
                            <input type="text" placeholder="Enter name" name="name" value="{{$inventory->name}}" class="form-control">
                                                                              
                        </div>

                        <div class="form-group col-md">
                            <label for="currency">currency:</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="INR">INR</option>
                                <option value="€">€</option>
                               
                              </select>
                                                                      
                        </div>

                        <div class="form-group col-md">
                            <label for="price" class = "form-label">Price:</label>                           
                            <input type="text" placeholder="Enter price" name="price" value="{{$inventory->price}}" class="form-control euroFormat">
                                                                                
                        </div>
                        <div class="form-group col-md">
                            <label for="stock" class = "form-label">Stock:</label>                           
                            <input type="text" placeholder="Enter stock" name="stock" value="{{$inventory->stock}}" class="form-control">
                                                                      
                        </div>
                        <div class="form-group col-md">
                            <label for="tax" class = "form-label">Tax:</label>                           
                            <input type="text" placeholder="Enter nataxme" name="tax" value="{{$inventory->tax}}" class="form-control">
                                                                       
                        </div>
                    </div>
                </div>


            </div>
            <button type="submit" name="action" value="Update"
            class="btn btn-primary">{{ __('Update') }}</button>
</form>
            
        </div>
    </div>
 
