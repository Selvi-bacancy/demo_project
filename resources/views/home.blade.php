
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User home</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<style>


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
@foreach($user as $u)
 <b> User : {{$u->name}} </b>
  <div class="header-right">
  <!-- <button width = "500px" padding="20px" onclick="edit_form()"><span>Edit profile </span></button> -->
    <a class="active" href="logout">Logout</a>
@endforeach
  </div>
</div>



   <center> <h3> Products </h3></center>
   <!-- <button class="button"><span>Add new </span></button> -->

   <br><br><center>
    <table id="product" border="2px" width="80%">
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
		 echo '<img src=data:image/jpeg;base64,'.base64_encode($p->image).' style="width:128px;height:128px;" onClick="zoomImg(this)"/><br>';
		 ?>
         click on image to zoom!
         <br>
           
        </td>  
    </tr>
    @endforeach
    </tbody>
</table>


<!-- The Modal -->
<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
  <div class="w3-modal-content w3-animate-zoom">
    <img id="img01" style="width:100%">
  </div>
</div>


<script>
function zoomImg(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>

<script>

function edit_form() {
  document.getElementById("edit_form").style.display = "block";
}

function close_edit_form() {
  document.getElementById("edit_form").style.display = "none";
}

</script>

<script>
        $('#product').DataTable({
        "order": [[ 3, "desc" ]]
    });
   
</script>

</body>
</html>
