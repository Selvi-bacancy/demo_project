<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form action="edit_product_submit" method="POST" class="form-container" enctype="multipart/form-data">
      @csrf
    <h1>Product details</h1>
    
    @foreach($product as $p)
    <?php 
		 echo '<img src=data:image/jpeg;base64,'.base64_encode($p->image).' style="width:128px;height:128px;"/><br>';
		 ?><br>
     <table>
    <tr>
    <th>Field</th>
    <th>Value</th>
    </tr>
    <tr>
    <input type="hidden" value="{{$p->pid}}" name="pid" required><br>
    <td>
    <label for="name"><b>Name</b></label>
    </td>
    <td>
    <input type="text" value="{{$p->name}}" name="name" required><br>
    </td>
    </tr>

    <tr>
    <td>
    <label for="colour"><b>Colour</b></label>
    </td>
    <td>
    <input type="text" value="{{$p->colour}}" name="colour" required><br>
    </td>
    </tr>

    <tr>
    <td>
    <label for="quantity"><b>Quantity</b></label>
    </td>
    <td>
    <input type="text" value="{{$p->quantity}}" name="quantity" required><br>
    </td>
    </tr>

    <tr>
    <td>
    <label for="image"><b>Image</b></label>
    </td>
    <td>
    <input type="file"  name="image" id="image" required>
    </td>
    </tr>
    </table>
    
    <br><br>
    <button type="submit" name="product_submit" class="btn">submit</button>
    @endforeach
</body>
</html>