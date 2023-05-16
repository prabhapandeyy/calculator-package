
    <header class="title">
        <h1>{{ __('Create Invoice') }} </h1>
        <div><a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">
                {{ __('Back') }}
            </a></div>
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
            <div class="formswrap pb-3">
                <form action="{{url('invoice/store')}}" method="post" id = "createinvoice">
                    @csrf
                
                <div class="panel">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                {{-- <div class="col-md-6">
                                  <div class="form-group mb-3">
                                         
                                        <label for="templates" class = "form-label">Template:</label>
                                        <select name="templates" id="templates" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($templates as $temp)
                                            <option value="{{$temp->id ??''}}">{{$temp->title ??''}}</option> 
                                            @endforeach                                                          
                                          </select>
                                      
                                    </div> 
                                </div> --}}
                                <div class="col-md">
                                    <div class="form-group mb-3">
                                       
                                        <label for="category" class = "form-label">Category:</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($invoicecategory as $invc)
                                            <option value="{{$invc->id ??''}}">{{$invc->title ??''}}</option> 
                                            @endforeach                                                          
                                          </select>
                                         
                                    </div>
                                </div>

                               <div class="col-md-2">
                                    <div class="form-group mb-3">
                                   
                                        <label for="currency" class = "form-label">Currency:</label>
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="INR">INR</option>
                                            <option value="€">€</option>                                                                                      
                                          </select>                                       
                                    </div>
                                </div>
                            </div>
                        {{--  <div class="form-group" id="select_customer_div">
                               
                                <label for="customer" class = "form-label">Select Customer:</label>
                                <select name="customer" id="customer" class="form-control" onchange="userDetail()">
                                    <option value="">Select</option>
                                    @foreach ($customer as $invc)
                                    <option value="{{$invc->id ??''}}">{{$invc->title ??''}}</option> 
                                    @endforeach                                                          
                                  </select>
                                
                            </div> --}}

                               <div class="form-group mt-2 small" id="customer_details_div"><img id="user-details-loading"
                                    src="/images/loader.gif" alt="loading" height="40px" width="40px"
                                    style="margin-left: 175px; display:none;"></div>

                            <div class="row newcustomer" style="display:none;"><a href=""
                                    onClick="remove()">{{ __('Back') }}</a>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                       
                                        <label for="customer_name" class = "form-label">Customer Name:</label>
                                        <input type="text" id="customer_name" placeholder="Enter Customer Name" name="customer_name" class="form-control">
                                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                       
                                        <label for="customer_email" class = "form-label">Customer Email:</label>
                                        <input type="text" id="customer_email" placeholder="Enter Customer Email" name="customer_email" class="form-control">
                                       
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        
                                        <label for="customer_cif" class = "form-label">Customer CIF:</label>
                                        <input type="text" id="customer_cif" placeholder="Enter Customer CIF" name="customer_cif" class="form-control">
                                         
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                       
                                        <label for="customer_address" class = "form-label">Customer Address:</label>
                                        <input type="text" id="customer_address" placeholder="Enter Customer Address" name="customer_address" class="form-control">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                       
                                        <label for="isuedate" class = "form-label">Issue Date:</label>
                                        <input type="date" id="isuedate" placeholder="Enter isuedate" name="isuedate" class="form-control">
                                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                     
                                        <label for="duedate" class = "form-label">Due Date:</label>
                                        <input type="date" id="duedate" placeholder="Enter duedate" name="duedate" class="form-control">
                                       
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">                      
                                        <label for="refnumber" class = "form-label">Ref Number:</label>
                                        <input type="text" id="refnumber" placeholder="Enter Ref Number" name="refnumber" class="form-control">                                       
                                    </div>
                                </div>
                               <div class="col-md-6">
                                    <div class="form-group mb-3">
                                         
                                        <label for="payment_method" class = "form-label">Payment Method:</label>
                                        <select name="payment_method" id="payment_method" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($paymentmethod as $payment)
                                            <option value="{{$payment->id ??''}}">{{$payment->paymentmethod ??''}}</option> 
                                            @endforeach                                                          
                                          </select>                                                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>{{ __('Product & Services') }}</h5>
                <div class="text-start alert alert-danger d-none col-2   message-item-exist">
                    {{ __('Item already Exist!!') }} </div>
                <div class="panel">
                    <div class="text-end">
                        <a href="javascript:void(0)" onclick="addmore();" class="btn btn-success text-white">
                            <i class="flaticon-plus"></i> {{ __('Add item') }}
                        </a>
                    </div>
                    <div class="table-responsive">
                       <table class="table">
                            <thead>
                                <tr class="table-light">
                                    <th class="item">{{ __('Items') }}</th>
                                    <th class="qty">{{ __('Quantity') }}</th>
                                    <th class="price">{{ __('Price') }}</th>
                                    <th class="discount">{{ __('Discount') }}</th>
                                    <th class="tax">{{ __('Tax (%)') }}</th>
                                    <th class="text-end">{{ __('Amount') }}<small>{{ __('with tax & discount') }}</small>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="row0"> 
                                
                                       <td class="form-group">
                                      {{--   <select name="items[0][name]" data-row="0" class="form-select item-select">
                                            <option value="">Select</option>
                                            @foreach ($items as $item)
                                            <option value="{{$item->id ??''}}">{{$item->title ??''}}</option> 
                                            @endforeach                                                          
                                          </select> --}}
                                       
                                        <div class="input-group d-none item-input-0">
                                            <input type="text" id="title" placeholder="Enter title" name="items[0][newitemname]" class="form-control new-item">
                                           
                                            <span class="input-group-text" onclick="show_item_select(0)"
                                                style="cursor: pointer">{{ __('Back') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" data-item="0" placeholder="Qty" name="items[0][quantity]" class="form-control calc">                                           
                                            <span class="input-group-text bg-transparent"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" data-item="0" id="item_price_0" placeholder="Price" name="items[0][price]" class="form-control calc euroFormat">
                                            
                                            <span class="input-group-text bg-transparent"><span
                                                    class="currencytype"></span></span>
                                        </div>
                                        <input type="hidden" name="items[0][itemQtyPrice]" class="form-control">                                     
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" data-item="0" placeholder="Discount" name="items[0][discount]" class="form-control calc euroFormat">
                                            
                                            <span class="input-group-text bg-transparent"><span
                                                    class="currencytype"></span></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" data-item="0" value="21" id="items[0][tax]" placeholder="Tax" name="title" class="form-control calc">
                                               
                                                <span class="input-group-text bg-transparent">%</span>
                                            </div>

                                            <div class="taxes"></div>
                                            <input type="hidden" name="items[0][itemTaxPrice]" class="form-control">                                          
                                        </div>
                                    </td>
                                    <td class="text-end ">
                                        <span class="amount">0,00</span>
                                        <input type="hidden" name="items[0][itemTaxDiscountPrice]" >                                      
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <input type="textarea" id="title" placeholder="Description" name="items[0][description]" class="form-control description" rows="2">
                                             
                                        </div>
                                    </td>
                                    <td colspan="5"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td><strong>{{ __('Sub Total') }} (<span class="currencytype"></span>)</strong></td>
                                    <td class="text-end"><span class="subTotal"> 0,00</span>
                                        <input type="hidden" name="subTotal" class="form-control">
                                      </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td><strong>{{ __('Discount') }} (<span class="currencytype"></span>)</strong></td>
                                    <td class="text-end"><span class="totalDiscount"> 0,00</span>
                                        <input type="hidden"  name="totalDiscount" class="form-control">
                                    
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td><strong>{{ __('Tax') }} (<span class="currencytype"></span>)</strong></td>
                                    <td class="text-end"><span class="totalTax"> 0,00</span>
                                        <input type="hidden"  name="totalTax" class="form-control">
                                     </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><strong>{{ __('Total Amount') }} (<span class="currencytype"></span>)</strong></td>
                                    <td class="text-end"><span class="totalAmount"> 0,00</span>
                                        <input type="hidden" name="finalamount" class="form-control">                          
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="text-end">
                    <button type="button" class="btn btn-light" onclick="reset()">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary" value="Create"
                        name="action">{{ __('Create') }}</button>
                  
                </div>  
                </form>
            </div>
        </div>
    </div>
     

