
        <div class="p-4 sm:ml-48">
            <div class="p-2  rounded-lg dark:border-gray-700 mt-9 h-full">
                <h5 class="font-medium text-lg">Listes Clients</h5>
            </div>
            <div class="w-full flex justify-end mb-2">
                <a href="<?= WEBROOT ?>/?controller=client&action=ajoutClient">

                    <button
                        class="block text-white bg-gray-900  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ajouter
                    </button>
                </a>
            </div>
            <div class="w-full h-20 flex align-center justify-around border border-gray-200 rounded-lg shadow mb-2 ">
                <div class="w-80 h-10  mt-3">
                    <form action="<?= WEBROOT?>"  method="post" class="flex items-center max-w-sm mx-auto">
                        <label for="" class="text-black-900 mx-2">Tel</label>
                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="telSearch" value="<?= isset($_POST['telSearch']) ? ($_POST['telSearch']) : '' ?>"
                                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search branch name..." />
                        </div>
                        <input type="hidden" name="controller" value="client">
                        <button type="submit" name="action" value="client"
                            class="bg-gray-900 p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <span class="sr-only">Search</span>OK
                        </button>
                    </form>
                </div>
                <div class="w-80 h-10  mt-3">
                    <form class="flex items-center max-w-sm mx-auto">
                        <label for="" class="text-black-900 mx-2">Categorie</label>
                        <div class="relative w-full">
                            <select name="etat" class="form-select border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " id="type">
                                <option value="All" select> All </option>
                                <option value="Nouveau" select> Nouveau </option>
                                <option value="Fidéle"> Fidéle </option>
                                <option value="Soldé"> Soldé </option>
                                <option value="Non Soldé"> Non Soldé </option>
                            </select>
                        </div>
                        <input type="hidden" name="controller" value="client">
                        <button type="submit" name="action" value="categorie"
                            class="bg-gray-900 p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <span class="sr-only">Search</span>OK
                        </button>
                    </form>
                </div>

            </div>
            <div class="w-full h-72 border border-gray-200 rounded-lg shadow mb-2 mt-8 ">
                <div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Client
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Telephone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Adresse
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Catégorie
                                    </th>
                                    <th scope="col" class="px-7 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datas as $data):?>
                                <tr
                                    class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <img class="w-8 h-8" src="../public/assets/user.png" alt=""> -->
                                        <?=$data->Image?>
                                    </th>
                                    <td class="px-6 py-1 ">
                                        <?=$data->prenom ."  " .$data->nom ?>
                                    </td>
                                    <td class="px-6 py-1">
                                        <?=$data->telephone?>
                                    </td>
                                    <td class="px-6 py-1">
                                        <?=$data->email?>
                                    </td>
                                    <td class="px-6 py-1">
                                        <?=$data->adresse?>
                                    </td>
                                    <td class="px-6 py-1">
                                        <?=$data->libelleC?>
                                    </td>
                                    <td class="px-6 py-1 flex">
                                       
                                        <a href="<?= WEBROOT ?>/?controller=client&action=detailClient&idcl=<?= $data->idcl ?>&idd=<?= $data->idd ?>"
                                            class=" mx-2 mt-1  font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>  
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full mt-2 flex align-center justify-center">
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex -space-x-px text-base h-10 ">
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

