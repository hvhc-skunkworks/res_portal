<?php /* Template Name: resources */ ?>

    <?php get_header(); ?>

        <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "resources";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

if ( is_user_logged_in() ) {
    $sql = "SELECT title, url, descr, rtype, src FROM rtable";
} else {
    $sql = "SELECT title, url, descr, rtype, src FROM rtable WHERE public=1";
}


$result = $conn->query($sql);
?>




            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
                    <?php comments_template( '', true ); ?>
                        <?php endwhile; // end of the loop. ?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Resource Category
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="tools.php">Knowledge</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Culture</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Processes</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="http://localhost:8888/wordpress/tools/">Tools</a>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Source System
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">DH</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Mayo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">BIDMC</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Prov</a>
                                </div>
                            </div>

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-xs-4">Title</th>
                                        <th class="col-xs-4">Description</th>
                                        <th class="col-xs-2">Resource Category</th>
                                        <th class="col-xs-2">Source System</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<td><a href=\"" . $row["url"] . "\" download>" . $row["title"] . "</a></td><td>" . $row["descr"]. "</td><td>" . $row["rtype"] . "</td><td>" . $row["src"] . "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

                                </tbody>
                            </table>

                            </div>


                            </div>
                            <!-- #content -->
                            <!-- #primary -->


                            <?php get_footer(); ?>
