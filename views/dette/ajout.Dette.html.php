<?php

//fonction pour calculer le montant total
function MontantTotalDette(){
    $montantTotal=0;
    if (isset($_SESSION["tabArticle"])) {
        foreach ($_SESSION["tabArticle"] as $article) {
        $montantTotal+=$article["total"];
    }
    }
    
    return $montantTotal;
}


$total=MontantTotalDette();
$errors = [];
$client = [];
$article=[];
$tabArticle=[];

if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    unset($_SESSION["errors"]);
}
if (isset($_SESSION["client"])) {
    $client = $_SESSION["client"];  
    // var_dump($client);
    // die;
}
if (isset($_SESSION["article"])) {
    $article = $_SESSION["article"];  
}
if (isset($_SESSION["tabArticle"])) {
    $tabArticle = $_SESSION["tabArticle"];  
}

//  var_dump($client);
//     die;


?>
       <div class="p-6 sm:ml-48 ">
    <div class="p-4 rounded-lg bg-white  mt-5">
       
        <div class="flex justify-between mb-6">
           
            <div class="w-1/2 h-auto p-4 border border-gray-200 rounded-lg shadow-lg bg-white">
                <form action="<?=WEBROOT?>" method="post" class="flex items-center space-x-4">
                    <label for="tel" class="text-gray-700 font-semibold">Tel</label>
                    <div class="relative w-60">
                        <input type="text" id="simple-search" name="tel"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <input type="hidden" name="controller" value="dette">
                    <button type="submit" name="action" value="addDette"
                        class="bg-gray-700 hover:bg-blue-800 text-white p-2.5 rounded-lg text-sm">
                        OK
                    </button>
                </form>

                <div class="mt-4  space-y-4">
                    <div class="flex items-center space-x-4">
                        <label for="prenom" class="text-gray-700 font-semibold">Prenom</label>
                        <input type="text" name="prenom" value="<?= $client->prenom ?? ''; ?>"
                            class="bg-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5" disabled />
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="nom" class="text-gray-700 font-semibold">Nom</label>
                        <input type="text" name="nom" value="<?= $client->nom ?? ''; ?>"
                            class="bg-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5" disabled />
                    </div>
                </div>
            </div>

          
            <div class="w-1/2 h-auto p-4 border border-gray-200 rounded-lg shadow-lg bg-white mx-5">
                <form action="<?= WEBROOT; ?>" method="post" class="flex items-center space-x-4">
                    <label for="ref" class="text-gray-700 font-semibold">Ref</label>
                    <div class="relative w-60">
                        <input type="text" id="simple-search" name="ref"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                    <input type="hidden" name="controller" value="dette">
                    <button type="submit" name="action" value="addDette"
                        class="bg-gray-700 hover:bg-blue-800 text-white p-2.5 rounded-lg text-sm">
                        OK
                    </button>
                </form>

                <div class="mt-4 space-y-4">
                    <div class="flex items-center space-x-4">
                        <label for="libelle" class="text-gray-700 font-semibold">Libelle</label>
                        <input type="text" name="libelle" value="<?php echo $article->libelle ?? ''; ?>"
                            class="bg-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5" disabled />
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="PrixU" class="text-gray-700 font-semibold">P.Untaire</label>
                        <input type="text" name="PrixU" value="<?php echo $article->prixU ?? ''; ?>"
                            class="bg-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5" disabled />
                    </div>
                    <div class="flex items-center space-x-4">
                        <label for="qteStock" class="text-gray-700 font-semibold">QteStock</label>
                        <input type="text" name="qteStock" value="<?php echo $article->qtestock ?? ''; ?>"
                            class="bg-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5" disabled />
                    </div>
                    <form action="<?= WEBROOT; ?>" method="post" class="flex items-center space-x-4">
                    <label for="qte" class="text-gray-700 font-semibold">Quantité</label>
                    <div class="relative w-96">
                        <input type="text" name="qte"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                    <input type="hidden" name="controller" value="dette">
                    <button type="submit" name="action" value="addDette"
                        class="bg-gray-700 hover:bg-blue-800 text-white p-2.5 rounded-lg text-sm">
                        OK
                    </button>
                </form>
                </div>
            </div>
        </div>

   
       
        <div class="flex mb-6">
            <div class="w-full p-4 border border-gray-200 rounded-lg shadow-lg bg-white">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-3">Libelle</th>
                                <th scope="col" class="px-6 py-3">Prix</th>
                                <th scope="col" class="px-6 py-3">Quantité</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tabArticle as $article): ?>
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="px-6 py-3"><?= $article['libelle'] ?></td>
                                <td class="px-6 py-3"><?= $article['prixU'] ?></td>
                                <td class="px-6 py-3"><?= $article['qte'] ?></td>
                                <td class="px-6 py-3"><?= $article['total'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

           
                <div class="flex justify-between items-center mt-4">
                    <form action="<?=WEBROOT?>" method="post">
                       
                        <button type="submit" name="action" value="SaveDette"
                            class="bg-green-800 hover:bg-blue-800 text-white p-2.5   rounded-lg" >
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

