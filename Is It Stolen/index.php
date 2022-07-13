<?php include("header.php")?>

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
            
<?php include("footer.php"); ?>