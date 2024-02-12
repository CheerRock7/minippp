<style>
.zoom {
  transition: transform .2s; /* Animation */
  margin: 20 auto;
  width: 20%;
  align-items: center;
}

.zoom:hover {
  transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
h1 {
    font-size: 60px;
    margin: 30px;
    text-align: center;
    text-shadow: 2px 2px gray;
}
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  text-align: center;
  height: 300px;
}

/* Clear floats after the columns */
.row1:after {
  content: "";
  display: flex;
  clear: both;
}
p{
    margin-top: 30px;
}
</style>

<h1>New Product</h1>

<div class="row1">
  <div class="column">    
    <a href="index.php"><img src="image/milk4.webp" alt="" class="zoom"></a>
    <p>Foremost Milk</p>
  </div>
  <div class="column">
    <a href="index.php"><img src="image/milk5.webp" alt="index.php" class="zoom"></a>
    <p>Almond Breeze</p>
  </div>
</div>
<div class="row1">
  <div class="column">    
    <a href="index.php"><img src="image/milk2.webp" alt="" class="zoom"></a>
    <p>Protein Milk Chocolate</p>
  </div>
  <div class="column">
    <a href="index.php"><img src="image/milk8.jpg" alt="index.php" class="zoom"></a>
    <p>Binggare Strawberry Milk</p>
  </div>
</div>

