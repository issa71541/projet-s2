

/*une requette qui selectionne les dettes non soldés avec les info du client , le montant verser et le montant restant*/

SELECT d.*, cl.*, SUM(p.montantpay) AS verse, (
        d.montantd - SUM(p.montantpay)
    ) AS restant
FROM
    dette d
    JOIN client cl ON d.idcl = cl.idcl
    JOIN paiement p ON d.idd = p.idd
GROUP BY
    d.idd,
    cl.idcl
HAVING
    verse < d.montantd;

/*une requette qui filtre par tel*/
SELECT
    d.idd,
    cl.nom,
    cl.prenom,
    cl.email,
    cl.telephone,
    d.numero,
    d.dated,
    d.montantd AS montantd,
    SUM(p.montantpay) AS verse,
    (
        d.montantd - SUM(p.montantpay)
    ) AS restant
FROM
    dette d
    JOIN client cl ON d.idcl = cl.idcl
    LEFT JOIN paiement p ON d.idd = p.idd
GROUP BY
    d.idd,
    cl.idcl
HAVING
    restant > 0
    AND cl.telephone = '763048794';

/*une requette qui filtre par date*/
SELECT
    d.idd,
    cl.nom,
    cl.prenom,
    cl.email,
    cl.telephone,
    d.numero,
    d.dated,
    d.montantd AS montantd,
    SUM(p.montantpay) AS verse,
    (
        d.montantd - SUM(p.montantpay)
    ) AS restant
FROM
    dette d
    JOIN client cl ON d.idcl = cl.idcl
    LEFT JOIN paiement p ON d.idd = p.idd
GROUP BY
    d.idd,
    cl.idcl
HAVING
    restant > 0
    AND d.dated = '2024-07-20';

/*une requette qui affiche les detail dette*/

SELECT
    cl.idcl,
    cl.nom,
    cl.prenom,
    cl.email,
    cl.telephone,
    cl.adresse,
    d.idd,
    d.numero AS numero_dette,
    d.dated AS date_dette,
    d.montantd AS montant_det,
    a.idA,
    a.libelle AS libelle_article,
    a.prixU AS prix_unitaire,
    a.qtestock AS quantite_stock,
    p.idp,
    p.referencep AS reference_paiement,
    p.datep AS date_paiement,
    p.montantpay AS montant_paiement
FROM
    client cl
    JOIN dette d ON cl.idcl = d.idcl
    LEFT JOIN artDette ad ON d.idd = ad.idd
    LEFT JOIN article a ON ad.idA = a.idA
    LEFT JOIN paiement p ON d.idd = p.idd
WHERE
    cl.idcl = 1;

/* paiement par Id*/
SELECT * FROM paiement WHERE idp = 1;

/* Compte le nombre de client*/
SELECT COUNT(*) AS Client FROM `client`
