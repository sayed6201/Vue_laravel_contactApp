<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Contact APP</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/css/mdb.min.css" rel="stylesheet">
</head>
<body>
	<div id="vue_app">
		<<input class="btn btn-primary" type="button" @click="clicker()" value="click me">
		<div class="container">
			<!--Section: Contact v.2-->
			<section class="mb-4 w-75 mx-auto">

		        <!--Grid column-->
			        <div class="mx-auto mb-md-0 mb-5">

			        	 <p class="text-center alert alert-danger"
		                    v-bind:class="{ hidden: true }">Please fill all fields!</p>
		                 
			            <form id="contact-form" name="contact-form">

			                <!--Grid row-->
			                <div class="row">

			                    <!--Grid column-->
			                    <div class="col-md-6">
			                        <div class="md-form mb-0">
			                            <input type="text" id="name" name="name" class="form-control" required v-model="newItem.name" >
			                            <label for="name" class="">Enter name</label>
			                        </div>
			                    </div>
			                    <!--Grid column-->

			                    <!--Grid column-->
			                    <div class="col-md-6">
			                        <div class="md-form mb-0">
			                            <input type="text" id="email" name="email" class="form-control" required v-model="newItem.email" >
			                            <label for="email" class="">Enter email</label>
			                        </div>
			                    </div>
			                    <!--Grid column-->

			                </div>
			                <!--Grid row-->

			                <!--Grid row-->
			                <div class="row">
			                    <div class="col-md-12">
			                        <div class="md-form mb-0">
			                            <input type="number" id="phone" name="phone" class="form-control" required v-model="newItem.phone" >
			                            <label for="phone" class="">Enter phone</label>
			                        </div>
			                    </div>
			                </div>
			                <!--Grid row-->

			                <!--Grid row-->
			                <div class="row">

			                    <!--Grid column-->
			                    <div class="col-md-12">

			                        <div class="md-form">
			                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required v-model="newItem.info" ></textarea>
			                            <label for="message">Information</label>
			                        </div>

			                    </div>
			                </div>
			                <!--Grid row-->
			            </form>
			            <div class="text-center text-md-left">
			                <a class="btn btn-primary" @click.prevent="addContact()" >Save</a>
			            </div>
			            <div class="status"></div>
			        </div>
			        <!--Grid column-->
			    </div>
			</section>
	<!--Section: Contact v.2-->

	<!--Data table-->
			<table class="table">
			  <thead class="grey lighten-2">
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Phone</th>
			      <th scope="col">Info</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr v-for="item in items">
			    	<td>@{{item.id}}</td>
			      <td>@{{item.name}}</td>
			      <td>@{{item.email}}</td>
			      <td>@{{item.phone}}</td>
			      <td>@{{item.info}}</td>
			      <td @click.prevent="deleteItem(item)" class="btn btn-danger">
			      	<span class="glyphicon glyphicon-trash">Delete</span>
                  </td>
                  <!-- data-toggle="modal" data-target="#modalLoginForm" -->
			      <td id="show-modal" @click="editItem()"  class="btn btn-info" >
			      	<span class="glyphicon glyphicon-pencil">Edit</span>
			      </td>
			    </tr>		  
			  </tbody>
			</table>
	<!--Data Table-->

<!--Edit Modeal starts here-->
			<!-- <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
				  aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header text-center">
				        <h4 class="modal-title w-100 font-weight-bold">Edit Contact</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body mx-3">

				      	<div class="md-form mb-5">
				          <i class="fas fa-envelope prefix "></i>
				          <input type="text"  class="form-control validate" required  :value="this.e_id">
				          <label data-error="wrong" data-success="right" for="defaultForm-email">Id</label>
				        </div>

						<div class="md-form mb-5">
				          <i class="fas fa-envelope prefix "></i>
				          <input type="text" id="name" class="form-control validate" required  :value="this.e_name">
				          <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
				        </div>

				        <div class="md-form mb-5">
				          <i class="fas fa-envelope prefix "></i>
				          <input type="email" id="defaultForm-email" class="form-control validate" required  :value="this.e_email">
				          <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
				        </div>

				        <div class="md-form mb-4">
				          <i class="fas fa-lock prefix "></i>
				          <input type="number" id="defaultForm-pass" class="form-control validate" required  :value="this.e_phone">
				          <label data-error="wrong" data-success="right" for="defaultForm-pass">Phone</label>
				        </div>

						<div class="md-form">
						  <i class="fas fa-pencil-alt prefix"></i>
						  <textarea type="text" id="form10" class="md-textarea form-control" rows="3" required :value="this.e_info"></textarea>
						  <label for="form10">Info</label>
						</div>

				      </div>
				      <div class="modal-footer d-flex justify-content-center">
				        <button class="btn btn-default"  @click="editItem()">Save</button>
				      </div>
				    </div>
				  </div>
			</div> -->
<!--Edit Modeal starts here-->

			<modal v-if="showModal" @close="showModal=false">
                    <h3 slot="header">Edit Item</h3>
                    <div slot="body">
                        
                        <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                required  :value="this.e_id">
                        Name: <input type="text" class="form-control" id="e_name" name="name"
                                required  :value="this.e_name">
                        Age: <input type="number" class="form-control" id="e_age" name="age"
                        required  :value="this.e_age">
                        Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                        required  :value="this.e_profession">
                        
                      
                    </div>
                    <div slot="footer">
                        <button class="btn btn-default" @click="showModal = false">
                        Cancel
                      </button>
                      
                      <button class="btn btn-info" @click="editItem()">
                        Update
                      </button>
                    </div>
                </modal>


		</div>

	</div>
	<script type="text/javascript" src="js/app.js"></script>
	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/js/mdb.min.js"></script>
</body>
</html>