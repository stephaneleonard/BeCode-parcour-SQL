<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <header class="bg-gray-300">
        <ul class="flex p-5">
            <li class="mr-3">
                <a class="inline-block border <?= $_GET['Page'] != 'write' ?  "border-blue-500 rounded py-1 px-3 bg-blue-500 text-white" : "border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3" ?>" href="?Page=read">Read</a>
            </li>
            <li class="mr-3">
                <a class="inline-block <?= $_GET['Page'] == 'write' ?  "border-blue-500 rounded py-1 px-3 bg-blue-500 text-white" : "border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3" ?>" href="?Page=write">Write</a>
            </li>
        </ul>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
    </footer>
</body>

</html>