<script src="{{ asset('/js/jquery.min.js') }}"></script>
<link href="{{ asset('/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/js/jquery.dataTables.min.js')}}"></script>
    <script>
           var table;
           var lang;
lang = "{{session()->get('applocale')??'en'}}";
        table = $('#my-table').DataTable({
            'columnDefs': [ {
    'targets': [0,1,2,3,4,], /* column index */
    'orderable': false, /* true or false */
 }],
 "language": {
"url": lang=='es' ? '/datatablelang/es-ES.json' : '',
}
        });
        </script>
<header class="title">
    <h1>{{ __('Invoice Category') }}</h1>
    <div><a href="{{ route('invoiceCategory.create') }}" class="btn btn-sm btn-primary">
        {{ __('Create') }}
    </a></div>
</header>
<div class="grid">
   
    <div class="grid-col">
        @if ($message = Session::get('success'))
            <div class="alert alert-success text-capitalize">
                {{ $message }}
            </div>
        @endif
        <div class="formwrap">
            <table class="table table-hover" id="my-table">
                <thead>
                    <tr class=" table-primary">
                        <th scope="col">{{ __('Invoice Category') }}</th>
                        <th scope="col">{{ __('Series') }}</th>                   
                        <th scope="col" width="150">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($invoiceCategory) and !empty($invoiceCategory))
                        @foreach ($invoiceCategory as $key => $inv)
                            <tr class="data-row">
                                <td>{{ $inv->title??'' }}</td>                                                  
                                <td>{{ $inv->series??'' }}</td>                                    
                                <td>
                                    <form method='POST' action="{{url('invoiceCategory/destroy/' . $inv->id)}}">
                                        <input name='_method' type='hidden' value='DELETE'><input name='_token' type='hidden' value='" . csrf_token() . "'>
                                    
                                        <a class='btn btn-primary btn-sm' href="{{url('invoiceCategory/edit/' . $inv->id)}}">Edit</a>
                                        <button type='submit' class='ms-1 btn btn-danger text-white btn-sm'>Delete</button>                                                                                                                                                                                                  
                                                                                            </form> 
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{$invoiceCategory->render()}}
    </div>
</div>






   
