<html>
    <head>
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <title>Is It Stolen</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <img src="images/lego.png" class="logo">
                <nav>
                    <ul>
                        <li><a href="#"> HOME <i class="fa fa-home"></i></a></li>
                        <li><a href=""> ABOUT <i class="fa fa-bicycle"></i></a></li>
                        <li><a href=""> LOGIN <i class="fa fa-user"></i></a></li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col">
                    <h1>Is your bike stolen?</h1>
                    <p>You can search through our network, with more than 200.000 records of bikes, e-scooters and other things. Use the form on the right.</p>
                </div>
                <div class="searchbox">
                <form>
                    <!--<h2 class="title">Find everything you want</h2>-->
                    <div class="form-box">
                        <!--<input type="text" class="search-field obj" placeholder="everything..">-->
                        <select  id="objects" class="search-field obj">
                            <option value="bicycle">Bicycle</option>
                            <option value="e-scooter">E-Scooter</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" class="search-field serial" placeholder="Enter Serial Number">
                        <button class="search-btn" type="button">Search</button>
                </form>
            </div>
            </div>
            

        </div>
        
    </body>
</html>