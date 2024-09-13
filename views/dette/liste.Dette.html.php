



    <div class="p-4 sm:ml-48">
            <div class="p-2  rounded-lg dark:border-gray-700 mt-9 h-full">
                <h5 class="font-bold text-lg">Listes Dettes Non soldées</h5>
            </div>
            <div class="w-full flex justify-end mb-2">
                <a href="<?= WEBROOT ?>/?controller=dette&action=addDette">
                    <button
                        class="block text-white bg-gray-900  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Ajouter +
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
                        <input type="hidden" name="controller" value="dette">
                        <button type="submit" name="action" value="dette"
                            class="bg-gray-900 p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            OK
                        </button>
                    </form>
                </div>
              
                <div class="w-80 h-10  mt-3">
                    <form action="<?= WEBROOT?>"  method="post"  class="flex items-center max-w-sm mx-auto">
                        <label for="" class="text-black-900 mx-2">Date</label>
                        <div class="relative w-full">
                            <input type="date" id="simple-search"  name="dateSearch" value="<?= isset($_POST['dateSearch']) ? ($_POST['dateSearch']) : '' ?>"
                                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <input type="hidden" name="controller" value="dette">
                        <button type="submit" name="action" value="dette"
                            class="bg-gray-900 p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                OK
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
                                        Telephone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        numero dette
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                   
                                    <th scope="col" class="px-6 py-3">
                                        Montant
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        M.Verse
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        M.Due
                                    </th>
                                    <th scope="col" class="px-7 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datas as $data):?>
                                <tr
                                    class=" hover:bg-gray-100 even:bg-gray-50 ">
                                   
                                    <td class="px-6 py-1.5 ">
                                        <?=$data->telephone?>
                                    </td>
                                    <td class="px-6 py-1.5 ">
                                        <?=$data->numerod?>
                                    </td>
                                    <td class="px-6 py-1.5">
                                    <?=$data->dated?>
                                    </td>
                                   
                                    <td class="px-6 py-1.5">
                                        <?=$data->montantd?>
                                    </td>
                                    <td class="px-6 py-1.5">
                                    <?=$data->verse?>
                                    </td>
                                    <td class="px-6 py-1.5">
                                    <?=$data->restant?>
                                    </td>
                                    <td class="px-6 py-1.5 flex">
                                       
                                        <a href="<?= WEBROOT ?>/?controller=dette&action=detail&idcl=<?= $data->idcl ?>&idd=<?= $data->idd ?>"
                                            class=" mx-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>  
                            </tbody>
                        </table>
                        <!-- Main modal -->
                        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Page Paiement
                                        </h3>
                                        <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form class="space-y-4" action="#">
                                            <div>
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Montant
                                                </label>
                                                <input type="email" name="email" id="email"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                                            </div>
                                            <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Envoyer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="w-full mt-2 flex align-center justify-center">
                        <!-- <nav aria-label="Page navigation example">
                            <ul class="inline-flex -space-x-px text-base h-10 ">
                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                </li>
                                <?php for ($i=1; $i <=$nombre_page ; $i++):?>
                                <li>
                                    <a href="<?=WEBROOT;?>/?controller=dette&action=dette&page=<?= $i?>"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
                                </li>
                                <?php endfor?>

                                <li>
                                    <a href="#"
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                </li>
                            </ul>
                        </nav> -->
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
                                        <a href="#" aria-current="page"
                                            class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
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


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

