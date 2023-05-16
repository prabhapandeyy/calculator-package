 
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

        $('#paymentMethodform').validate();
        </script>
 

 
    <header class="title">
        <h1>{{ __('Create Payment Method') }} </h1>
        <a href="{{ route('paymentMethod.index') }}" class="btn btn-sm btn-primary">
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



            <form action="{{url('paymentMethod/update',$paymentMethod->id)}}" method="post">
                @csrf
            <div class="formwrap mb-4">
                <div class="panel">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="paymentmethod" class = "form-label">Payment Method:</label>                           
                            <input type="text" placeholder="Enter paymentmethod" name="paymentmethod" value="{{$paymentMethod->paymentmethod}}" class="form-control">
                                                                              
                        </div>

                        

                        <div class="form-group col-md">
                            <label for="paymentdetails" class = "form-label">Payment Detail:</label>                           
                            <input type="text" placeholder="Enter paymentdetails" name="paymentdetails" value="{{$paymentMethod->paymentdetails}}" class="form-control euroFormat">
                                                                                
                        </div>
                         
                    </div>
                </div>


            </div>
            <button type="submit" name="action" value="Update"
            class="btn btn-primary">{{ __('Update') }}</button>
</form>
            
        </div>
    </div>
 
