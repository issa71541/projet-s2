

        <div class="p-4 sm:ml-48">
            <div class="p-2  rounded-lg dark:border-gray-700 mt-10 h-full">
            

            </div>
            <div class="flex align-center justify-around  w-full ">
                <div class="w-1/2 h-48 border border-gray-200 rounded-lg shadow flex-col align-center justify-around ">
                <div class="flex align-center justify-around w-full h-24">
    
    <div class="w-64 h-24 mt-2 flex-col font-bold">
        <h5>Prenom : <?=$datas[0]->prenom?></h5>
        <h5>Nom:  <?=$datas[0]->nom?> </h5>
        <h5>Tel: <?=$datas[0]->telephone?></h5>
        <h5>Adresse: <?=$datas[0]->adresse?></h5>
        <h5>Date Dette: <?=$datas[0]->date_dette?></h5> 
        <h5>Montant Dette: <?=$datas[0]->montant_det?></h5> 
    </div>
</div>

                    <!-- <div class="w-64 h-24 mt-5 mx-3 flex-col">
                        <h5 class="font-medium">Total Dette: 25.000 </h5>
                        <h5 class="font-medium">Total Verse: 10.000 </h5>
                        <h5 class="font-medium text-lime-700">Montant Du: 15.000 </h5>
                    </div> -->


                </div>
                <div class="w-1/2 h-48 border border-gray-200 rounded-lg shadow mx-3 flex-col ">
                    <!-- <h5 class="font-bold mx-5">Faire un paiement</h5> -->
                    <form action="<?= WEBROOT?>" method="post" class="flex items-center px-5 py-0 flex-col">
                     
                        <div class="flex w-full align-center justify-center mt-2">
                            <label for="" class="text-black-900 px-6 mt-3 mx-3">Montant</label>
                            <div class="relative w-64 mt-2">
                                <input type="text" id="simple-search" name="montantpay"
                                    class=" border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                        </div>
                        <input type="hidden" name="idd" value="<?=$_REQUEST["idd"]?>" >
                        <input type="hidden" name="idcl" value="<?=$_REQUEST["idcl"]?>" >
                        <input type="hidden" name="controller" value="paiement">
                        <div class="w-full flex align-center justify-center py-3">
                            <button type="submit" name="action" value="paiement"
                                class="w-48  text-white bg-gray-900  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 ">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex align-center justify-around  w-full mt-5 ">
                <div class="w-1/2 h-60 border border-gray-200 rounded-lg shadow flex">
                    <div class="relative w-full overflow-x-auto sm:rounded-lg mx-3 mt-2">
                        <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Article
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Prix
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantite
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datas as $data):?>
                                <tr
                                    class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?=$data->libelle?>
                                    </th>
                                    <td class="px-6 py-1.5 ">
                                    <?=$data->prix_unitaire?>
                                    </td>
                                    <td class="px-6 py-1.5">
                                    <?=$data->qtecmd?>
                                    </td>
                                   
                                </tr>
                                <?php endforeach;?>  
                            </tbody>
                        </table>

                        <div class="w-full flex py-3 px-6 mt-3">
                            <button type="button"
                                class="w-48  text-white bg-sky-900  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Somme
                                Total:</button>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 h-60 border border-gray-200 rounded-lg shadow  flex-col ">
                    <div class="relative w-full overflow-x-auto sm:rounded-lg mt-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        Reference
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Montant
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($paiements as $data):?>
                                <tr
                                    class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?=$data->referencep?>
                                    </th>
                                    <td class="px-4 py-1.5 ">
                                        <?=$data->datep?>
                                    </td>
                                    <td class="px-4 py-1.5">
                                        <?=$data->montantpay?>
                                    </td>
                                    <td class="px-6 py-1.5">
                                        <a href="#"
                                        class=" mx-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>  

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
