<!DOCTYPE html>
<?php
include './Connection.php';
include './Blog.php';
include './User.php';

$post = new Blog();
$user = new User();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
     
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    body{
        background-color: whitesmoke;
    }
    input{
        background-color: none;
    }
    .flex-container {		
            display: flex;
            background: #eee;
            }
            .item {
                padding: 10px;
            }
            .ml-auto {
                margin-left: auto;
        }
        .card{
            background-color: gray;
            color: white;
            padding: 40px;
            margin: 2%;
        }
    </style>
</head>
<body >

<div class="flex-container">
        <div class="item"><a href="#">Bawash</a></div>
        <div class="item ml-auto"><a href="#"><h4 style="color:blue">
                <?php session_start();
                if($_SESSION){
                    echo "Hi " . $_SESSION['username'];
                }
                ?>
            </h4></a></div>
    </div>
    
    <?php $blog = $post->getPostBySlug($_GET['id']); ?>
    
    
    <h2 class="row justify-content-center mt-3">Admin : EDIT- <?php echo $blog['slug']; ?></h2>
    <div class="container">
        <div class="row justify-content-center m-3">
            <div class="col-md-12">
                <h1>Create Blog</h1>
                <form action="useraction.php" method="post" class="form m-auto justify-content-center" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $blog['slug']; ?>" name="slug">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $blog['title'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required>
                            <?php echo $blog['content'] ?>"
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control img" id="image" name="image" placeholder="Click to upload image">
                    </div>
                    
                    <div class="form-group">
                        <label for="url">Video Url</label>
                        <input type="url" class="form-control link" id="url" name="url" placeholder="https://www.youtube.com/abX..." value="<?php echo $blog['video_url'] ?>">
                    </div>

                    <div class="row justify-content-center">
                         <button type="submit" class="row btn btn-primary mt-5 col-md-5 justify-content-center" name="edit-blog-submit">Submit</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>

</body>
</html>