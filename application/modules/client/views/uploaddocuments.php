
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/uploaddocuments.css') ?>">
</head>

<body>
<div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
            <div class="text-center">
</body>

    <div id="document-form" class="document-box">
    <h2>Create New Document</h2>
    <form action="create_document.php" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="type">Type:</label><br>
        <select class="form-control" id="type" name="type">
            <option value="New">New Application</option>
            <option value="Followup">For Follow Up</option>
            <option value="Additional">Additional Requirements</option>
        </select><br>
        <div>
            <label for="fileupload">Upload File:</label><br>
            <input type="file" id="fileupload" name="fileupload"><br><br>
        </div>
        <label for="content">Remarks:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Create Document">
    </form>
</div>


    <!-- <div id="document-list">
        <h2>Document List</h2>
        <ul>
            <!-- <?php foreach ($documents as $document) : ?> -->
                <li>
                    <strong>Title:</strong> <?php echo $document['title']; ?><br>
                    <strong>Author:</strong> <?php echo $document['author']; ?><br>
                    <strong>Content:</strong> <?php echo $document['content']; ?><br>
                    <form action="update_document.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $document['id']; ?>">
                        <label for="title">New Title:</label>
                        <input type="text" id="title" name="title">
                        <label for="author">New Author:</label>
                        <input type="text" id="author" name="author">
                        <label for="content">New Content:</label>
                        <textarea id="content" name="content" rows="4" cols="50"></textarea>
                        <input type="submit" value="Update">
                    </form>
                    <form action="delete_document.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $document['id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div> -->


</html>
