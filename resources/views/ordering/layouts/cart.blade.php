<div class="float">
	<a href="#" ><span class="badge badge-pill badge-danger badge-count float-left pill-value"></span>
	<i class="fa fa-cart-plus float-left my-4 my-float"></i>
	</a>
</div>



<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content"  style="border-radius: 0;">
      
        <!-- Modal Header --> 
        <div class="modal-header ">         
          	<img src="{{asset('assets/img/logo-png-dark.png')}}" class="head">		
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">          
        	<table class="table table-hover">
		    	<thead class="thead-dark">
		      		<tr>
		        		<th class="text-left" width="60%">Dish Name</th>
				        <th class="text-right" width="15%">Price</th>
				        <th width="25%">Quantity</th>
				      </tr>				     
		    	</thead>

		    	<tbody class="items">	      
		    	</tbody>
		  	</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info place-order" data-dismiss="modal"><i class="fa fa-cart-plus"></i>&nbsp;Order</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
        </div>
        
      </div>
    </div>
  </div>