
<script src="/js/jquery.min.js"></script>
<script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/ckfinder/ckfinder.js') }}"></script>
    



    <header class="title">
        <h1>{{ __('Create Invoice Category') }} </h1>
        <a href="{{ route('invoiceCategory.index') }}" class="btn btn-sm btn-primary">
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



  
            <form action="{{url('invoiceCategory/store')}}" method="post">
                @csrf
            <div class="formwrap mb-4">
                <div class="panel">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title" class = "form-label">Title:</label>
                            <input type="text" id="title" placeholder="Enter title" name="title" class="form-control">
                                                                                
                        </div>
                     
                        <div class="form-group col-md">
                            <label for="series" class = "form-label">Series:</label>
                            <input type="text" id="series" placeholder="Enter series" name="series" class="form-control">
                                                                                 
                        </div>
                    </div>
                </div>


            </div>
            <input type="submit" value="Create" name="action" class="btn  btn-primary">
            
            </form>
        </div>
    </div>
 
