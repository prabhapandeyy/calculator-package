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
            <form action="{{url('invoiceCategory/update',$invoiceCategory->id)}}" method="post">
                @csrf            
            <div class="formwrap mb-4">
                <div class="panel">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title" class = "form-label">Title:</label>                           
                            <input type="text" placeholder="Enter title" name="title" value="{{$invoiceCategory->title}}" class="form-control">
                                                                             
                        </div>
                        <div class="form-group col-md">
                            <label for="series" class = "form-label">Series:</label>                           
                            <input type="text" placeholder="Enter series" name="series" value="{{$invoiceCategory->series}}" class="form-control">                                                                      
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="action" value="Update"
            class="btn btn-primary">{{ __('Update') }}</button>
          </form>
            
        </div>
    </div>
 
