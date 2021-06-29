
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home</title>


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<style>
.split {
    height: 100%;
    width: 49.5%;
    position: fixed;
    z-index: 1;
    top: 60px; /* 100 before*/
    overflow-x: hidden;
    padding-top: 20px;
  
  }
  
  .left {
    left: 0;  /*50 before*/
    
    background-color: #FAEBD7;
  }
  
  .right {
    right: 0;
    background-color: #F5F5DC;
  }

  .button {
    border-radius: 4px;
    background-color: #DEB887;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 20px;
    padding: 5px;
    width: 200px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
  }
  
  .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }
  
  .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
  }
  
  .button:hover span {
    padding-right: 25px;
  }
  
  .button:hover span:after {
    opacity: 1;
    right: 0;
  }


  * {box-sizing: border-box;}
/* Button used to open the contact form - fixed at the bottom of the page */


/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  top: 50px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

a {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

a:link {
  color: #265301;
}

a:visited {
  color: #265301;
}

a:focus {
  border-bottom: 1px solid;
  background: #FAEBD7;
}

a:hover {
  border-bottom: 1px solid;
  background: #FAEBD7;
}

a:active {
  background: #265301;
  color: #FAEBD7;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
 
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 2px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

</style>


</head>
<body bgcolor="#F5F5F5">

<div class="header">
@foreach($admin as $a)
 <b> Admin : {{$a->name}} </b>
  <div class="header-right">
  <!-- <button width = "500px" padding="20px" onclick="edit_form()"><span>Edit profile </span></button> -->
    <a class="active" href="logout">Logout</a>
@endforeach
  </div>
</div>



<div class="split left">
    <center><h3>Users</h3></center>
<table id="user" border="2px" width="99%">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name </th>
            <th>email</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
    
    @foreach($users as $u)
    <tr>
    <td>{{$u->id}}</td>
    <td>{{$u->name}}</td>
    <td>{{$u->email}}</td>
    <td>{{$u->status}}</td>

    </tr>
    @endforeach
    </tbody>
</table>

</div><!-- left end  -->


<div class="split right">
   <center> <h3> Products </h3></center>
   <!-- <button class="button"><span>Add new </span></button> -->
   <button class="button" onclick="openForm()"><span>Add new </span></button>

   <br><br>
    <table id="product" border="2px" width="99%">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name </th>
            <th>Colour</th>
            <th>quantity (click to sort)</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
    
    @foreach($products as $p)
    <tr>
   
    <td>{{$p->pid}}</td>
    <td>{{$p->name}}</td>
    <td>{{$p->colour}}</td>
    <td>{{$p->quantity}}</td>
    <td><?php 
		 echo '<img src=data:image/jpeg;base64,'.base64_encode($p->image).' style="width:128px;height:128px;"/><br>';
		 ?>
         <br><a href="edit_product?pid={{$p->pid}}" >Edit</a>
         <br><a href="delete_product?pid={{$p->pid}}" >Delete</a>
        </td>  
    </tr>
    @endforeach
    </tbody>
</table>

<!-- add form -->

<div class="form-popup" id="myForm" >
  <form action="add_product" method="POST" class="form-container" enctype="multipart/form-data">
      @csrf
    <h1>Product details</h1>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="colour"><b>Colour</b></label>
    <input type="text" placeholder="Enter Colour" name="colour" required>

    <label for="quantity"><b>Quantity</b></label>
    <input type="text" placeholder="Enter quantity" name="quantity" required>

    <label for="image"><b>Image</b></label>
    <input type="file"  name="image" id="image" required><br><br>

    <button type="submit" name="product_submit" class="btn">submit</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>



</div>
</div> <!-- right end -->

<div class="form-popup" id="edit_form" >
  <form action="edit_admin" method="POST" class="form-container" >
  {{csrf_field()}}
    <h1>Admin details</h1>
    @foreach($admin as $a)
    <label for="name"><b>Name</b></label>
    <input type="hidden" value="{{$a->id}}" name="id">
    <input type="text" value="{{$a->name}}" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" value="{{$a->email}}" name="email" required>

    <label for="Passowrd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="quantity" required>

    <button type="submit" name="admin_submiy" class="btn">submit</button>
    <button type="button" class="btn cancel" onclick="close_edit_form()">Close</button>
    @endforeach
  </form>




<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function edit_form() {
  document.getElementById("edit_form").style.display = "block";
}

function close_edit_form() {
  document.getElementById("edit_form").style.display = "none";
}

</script>

<script>
    $(document).ready(function () {
        $('#user').DataTable({
        "order": [[ 0, "desc" ]]
    });
        $('#product').DataTable({
        "order": [[ 3, "desc" ]]
    });
    });
</script>

</body>
</html>