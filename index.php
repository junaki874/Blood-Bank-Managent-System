<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="register.php">
  
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href='index.php' class="blood">Blood Bank Management System</a>
            </div>
            <nav>
                <ul id='MenuItems'>
               
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto; color:rgb(4, 70, 4);">Login</button></li>
                   <li><a href='admin.php'>Admin</a></li>
                </ul>
            </nav>
        </div>

        
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>



                <form id='login' class='input-group-login' method="post" enctype="multipart/form-data" action='login.php'>
                    <input type='text'class='input-field'name='Email'placeholder='Email address' required >
		    <input type='password'class='input-field'name='Password' placeholder='Enter Password' required>
		    <input type='checkbox'class='check-box'><span>Remember Password</span>
		    <button type='submit'name='save' class='submit-btn'>Log in</button>
		 </form>


		 
		 <form id='register' class='input-group-register'  method="post" action="register.php">
		     <input type='text'class='input-field'name="User_Name" placeholder='User Name' required>
		     <input type='email'class='input-field'name="Email" placeholder='Email address' required>
		     <input type='password'class='input-field'name="Password" placeholder='Enter Password' required>
		     <input type='password'class='input-field'name="Confirm_Password"  placeholder='Confirm Password'  required>
		     <input type='checkbox'class='check-box'><span>I agree to the terms and conditions</span>
                    <button name="save" type='submit'class='submit-btn'>Register</button>
	         </form>
            </div>
        </div>
    </div>
   <br> <br>

    <div class="homepage">
        <div class="tex">
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero labore omnis iste provident perspiciatis aspernatur fugiat, quisquam quasi sequi ipsum quis commodi maiores tempora esse, exercitationem tempore delectus explicabo molestiae sapiente cumque temporibus deleniti facilis! Tenetur error, obcaecati natus in nobis repellat laborum deleniti sunt fugiat ab, voluptate ipsam. Esse voluptatem cumque autem maiores molestias dolorem animi aliquam labore quaerat porro nulla illo mollitia culpa iste quia neque quisquam, molestiae deserunt ad. Quasi tempora exercitationem unde veritatis amet, itaque, odit laboriosam, natus suscipit quas ipsam reprehenderit optio quia beatae! Voluptate nobis molestiae excepturi totam? Nobis enim libero ea. Esse quo veniam vitae, recusandae atque aut accusantium minima iure impedit sint perspiciatis ea eaque magni obcaecati laboriosam quas omnis possimus! Impedit, deserunt quisquam cumque sunt illo maxime et vitae fugit nesciunt harum nostrum, laborum reiciendis. Debitis ab sint voluptatibus, officiis ducimus nesciunt impedit doloribus nobis quos inventore fuga ea quidem eum et consequuntur praesentium cum nostrum. Omnis sequi est accusantium dolorem. Porro nobis ab similique voluptatem nesciunt molestiae quidem esse amet ipsum eius, obcaecati quod dolorum doloribus vero labore tempore blanditiis saepe voluptas, molestias facere ullam modi odio quia veniam. Rerum consectetur neque ad error in. Earum quod quisquam perspiciatis quam?
                
            </h3>
        </div>

        <div class="hompik">
            <img src="bldpic.jpeg" alt="">
        </div>
    </div>

    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
</body>
</html>
