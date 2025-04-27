<?php
    include __DIR__ . '/../components/header.php';

?>
 <main class="p-4 md:ml-64 h-auto pt-20"style="height:100vh">
 <h1><?= $titleH1 ?></h1>
 <?php var_dump($userList);?>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-4">id</th>
                            <th scope="col" class="px-4 py-3">Login</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3"></th>
                            <th scope="col" class="px-4 py-3"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($userList as $user) : ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?=$user['id'] ?></th>
                                    <td class="px-4 py-3"><?=$user['name'] ?></td>
                                    <td class="px-4 py-3"><?=$user['login'] ?></td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate"></td>
                                    <td class="px-4 py-3"></td>
                                </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                
            </nav>
        </div>



</main>

<?php include __DIR__ . '/../components/footer.php'; ?>