<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}
.about-team{
  padding: 50px;
  text-align: center;
 
  
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
.content{
display:flex;
align-items: center;
justify-content: center;
background-color: #00FF00;
}
.img{
max-width: 100%;

}
.text{
color:#CD5C5C;
padding-right: 20px;
 font: italic 20px "Fira Sans", serif;
}
</style>
</head>


<body>


<div class="text">   <p><a href='information.php'>Home</a></p></div>
<div class="about-section">
  <h1>About Us</h1>
  <p>Please send your opinion, how we help you and how we improve our service?</p>
  <p>We respect your opinion and take warmly your advice.</p>
  <p>Give blood and save life.</p>
</div>


<div  class="text">
<h1 align="center"> OUR GOLDEN CIRCLES</h1>
</div>

<div class="content">
<div class="img">
     <img src="circles.png" >
</div>
<div class="text">
<h1>WHY</h1>
<p>We believe in bringing about change and excellence in ourselves and our community! </p>
<h1> WHAT </h1>
<p>We call it tabling. Tables are local. We meet regularly. We plan and organize meetings and events for ourselves and others that focus on personal development, fun & fellowship and community service. Together we form an international network of bright young men. </p>
<h1>HOW</h1>
<p> Our motto is Adopt, Adapt, Improve. We bring together talented guys aged between 18 and 40 [or 18 and 45], to challenge, inspire and learn from each other. We share ideas openly with trust, and empower each individual to make a positive impact at home, work and in his community.</p>
 </div>
</div>


<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
     
      <div class="container">
        <h2>Junaki</h2>
        <p class="title">CEO & Founder</p>
        <p>Contact number: 01xxxxxxxx</p>
        <p>junaki@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Marjiya</h2>
        <p class="title">Art Director</p>
        <p>Contact number: 01xxxxxxxx</p>
        <p>marjiya@.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Nishu</h2>
        <p class="title">Designer</p>
        <p>Contact number: 01xxxxxxxx</p>
        <p>nishu@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
