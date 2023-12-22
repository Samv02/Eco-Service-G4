<?php

// src/Repository/ProduitRepository.php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Produit;

class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findByFilterCriteria($marque, $categorie, $produit)
    {
        $qb = $this->createQueryBuilder('p');
    
        if ($marque) {
            $qb->andWhere('p.id_marque = :marque')  // Mise à jour ici
               ->setParameter('marque', $marque);
        }
    
        if ($categorie) {
            $qb->andWhere('p.id_cat = :categorie')
               ->setParameter('categorie', $categorie);
        }
    
        if ($produit) {
            $qb->andWhere('p.nom_produit = :produit')
               ->setParameter('produit', $produit);
        }
    
        return $qb->getQuery()->getResult();
    }
}
