
<script src="/js/jquery.min.js"></script>
<script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/ckfinder/ckfinder.js') }}"></script>
    



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



  
            <form action="{{url('inventory/store')}}" method="post">
                @csrf
            <div class="formwrap mb-4">
                <div class="panel">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class = "form-label">Name:</label>
                            <input type="text" id="name"  placeholder="Enter name"  name="name" class="form-control">
                                                                                
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
                            <input type="text" id="price"  placeholder="Enter price"  name="price" class="form-control euroFormat">
                                                                                 
                        </div>
                        <div class="form-group col-md">
                            <label for="stock" class = "form-label">Stock:</label>
                            <input type="text" id="stock" placeholder="Enter stock"  name="stock" class="form-control">
                                                                             
                        </div>
                        <div class="form-group col-md">
                            <label for="tax" class = "form-label">Tax:</label>
                            <input type="text" id="tax" placeholder="Enter tax"  name="tax" class="form-control">
                                                                                 
                        </div>
                    </div>
                </div>


            </div>
            <input type="submit" value="Create" name="action" class="btn  btn-primary">
            
            </form>
        </div>
    </div>
 
